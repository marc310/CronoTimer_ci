<?php
/* 
 * Desenvolvido por Marcelo Motta
 * www.marcelomotta.com
 */
 
class Moeda extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Moeda_model');
    } 

    /*
     * Listing of moedas
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('moeda/index?');
        $config['total_rows'] = $this->Moeda_model->get_all_moedas_count();
        $this->pagination->initialize($config);

        $data['moedas'] = $this->Moeda_model->get_all_moedas($params);
        
        $data['_view'] = 'moeda/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new moeda
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('codigo','Codigo','required');
		$this->form_validation->set_rules('simbolo','Simbolo','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'codigo' => $this->input->post('codigo'),
				'simbolo' => $this->input->post('simbolo'),
				'descricao' => $this->input->post('descricao'),
            );
            
            $moeda_id = $this->Moeda_model->add_moeda($params);
            redirect('moeda/index');
        }
        else
        {            
            $data['_view'] = 'moeda/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a moeda
     */
    function edit($id_moeda)
    {   
        // check if the moeda exists before trying to edit it
        $data['moeda'] = $this->Moeda_model->get_moeda($id_moeda);
        
        if(isset($data['moeda']['id_moeda']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('codigo','Codigo','required');
			$this->form_validation->set_rules('simbolo','Simbolo','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'codigo' => $this->input->post('codigo'),
					'simbolo' => $this->input->post('simbolo'),
					'descricao' => $this->input->post('descricao'),
                );

                $this->Moeda_model->update_moeda($id_moeda,$params);            
                redirect('moeda/index');
            }
            else
            {
                $data['_view'] = 'moeda/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The moeda you are trying to edit does not exist.');
    } 

    /*
     * Deleting moeda
     */
    function remove($id_moeda)
    {
        $moeda = $this->Moeda_model->get_moeda($id_moeda);

        // check if the moeda exists before trying to delete it
        if(isset($moeda['id_moeda']))
        {
            $this->Moeda_model->delete_moeda($id_moeda);
            redirect('moeda/index');
        }
        else
            show_error('The moeda you are trying to delete does not exist.');
    }
    
}
