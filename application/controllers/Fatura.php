<?php
/* 
 * Desenvolvido por Marcelo Motta
 * www.marcelomotta.com
 */
 
class Fatura extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Fatura_model');
    } 

    /*
     * Listing of fatura
     */
    function index()
    {
        $params['limit'] = 10; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('fatura/index?');
        $config['total_rows'] = $this->Fatura_model->get_all_fatura_count();
        $config['per_page'] = 10; 

        $this->pagination->initialize($config);

        $data['fatura'] = $this->Fatura_model->get_all_fatura($params);
        
        $data['_view'] = 'fatura/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new fatura
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('valor_hora','Valor Hora','decimal');
		$this->form_validation->set_rules('total_fatura','Total Fatura','decimal|required');
		$this->form_validation->set_rules('total_pendente','Total Pendente','decimal');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'cliente_fatura' => $this->input->post('cliente_fatura'),
				'status_fatura' => $this->input->post('status_fatura'),
				'data_emissao' => $this->input->post('data_emissao'),
				'data_vencimento' => $this->input->post('data_vencimento'),
				'moeda' => $this->input->post('moeda'),
				'valor_hora' => $this->input->post('valor_hora'),
				'total_fatura' => $this->input->post('total_fatura'),
				'total_pendente' => $this->input->post('total_pendente'),
            );
            
            $fatura_id = $this->Fatura_model->add_fatura($params);
            redirect('fatura/index');
        }
        else
        {
			$this->load->model('Cliente_model');
			$data['all_clientes'] = $this->Cliente_model->get_all_clientes();
            
            $data['_view'] = 'fatura/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a fatura
     */
    function edit($id_fatura)
    {   
        // check if the fatura exists before trying to edit it
        $data['fatura'] = $this->Fatura_model->get_fatura($id_fatura);
        
        if(isset($data['fatura']['id_fatura']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('valor_hora','Valor Hora','decimal');
			$this->form_validation->set_rules('total_fatura','Total Fatura','decimal|required');
			$this->form_validation->set_rules('total_pendente','Total Pendente','decimal');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'cliente_fatura' => $this->input->post('cliente_fatura'),
					'status_fatura' => $this->input->post('status_fatura'),
					'data_emissao' => $this->input->post('data_emissao'),
					'data_vencimento' => $this->input->post('data_vencimento'),
					'moeda' => $this->input->post('moeda'),
					'valor_hora' => $this->input->post('valor_hora'),
					'total_fatura' => $this->input->post('total_fatura'),
					'total_pendente' => $this->input->post('total_pendente'),
                );

                $this->Fatura_model->update_fatura($id_fatura,$params);            
                redirect('fatura/index');
            }
            else
            {
				$this->load->model('Cliente_model');
				$data['all_clientes'] = $this->Cliente_model->get_all_clientes();

                $data['_view'] = 'fatura/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The fatura you are trying to edit does not exist.');
    } 

    /*
     * Deleting fatura
     */
    function remove($id_fatura)
    {
        $fatura = $this->Fatura_model->get_fatura($id_fatura);

        // check if the fatura exists before trying to delete it
        if(isset($fatura['id_fatura']))
        {
            $this->Fatura_model->delete_fatura($id_fatura);
            redirect('fatura/index');
        }
        else
            show_error('The fatura you are trying to delete does not exist.');
    }
    
}
