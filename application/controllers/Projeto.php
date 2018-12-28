<?php
/* 
 * Desenvolvido por Marcelo Motta
 * www.marcelomotta.com
 */
 
class Projeto extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Projeto_model');
    } 

    /***************************************************/
    /* list projetos
    /***************************************************/
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('projeto/index?');
        $config['total_rows'] = $this->Projeto_model->get_all_projetos_count();
        $this->pagination->initialize($config);

        $data['projetos'] = $this->Projeto_model->get_all_projetos($params);
        
        $data['_view'] = 'projeto/index';
        $this->load->view('layouts/main',$data);
    }

    /***************************************************/
    /* add a new projeto
    /***************************************************/
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('preco_projeto','Preco Projeto','decimal');
		$this->form_validation->set_rules('nome_projeto','Nome Projeto','required');
		$this->form_validation->set_rules('cliente_id','Cliente Id','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'cliente_id' => $this->input->post('cliente_id'),
				'nome_projeto' => $this->input->post('nome_projeto'),
				'descricao_projeto' => $this->input->post('descricao_projeto'),
				'preco_projeto' => $this->input->post('preco_projeto'),
            );
            
            $projeto_id = $this->Projeto_model->add_projeto($params);
            redirect('projeto/index');
        }
        else
        {
			$this->load->model('Cliente_model');
			$data['all_clientes'] = $this->Cliente_model->get_all_clientes();
            
            $data['_view'] = 'projeto/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a projeto
     */
    function edit($id_projeto)
    {   
        // check if the projeto exists before trying to edit it
        $data['projeto'] = $this->Projeto_model->get_projeto($id_projeto);
        
        if(isset($data['projeto']['id_projeto']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('preco_projeto','Preco Projeto','decimal');
			$this->form_validation->set_rules('nome_projeto','Nome Projeto','required');
			$this->form_validation->set_rules('cliente_id','Cliente Id','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'cliente_id' => $this->input->post('cliente_id'),
					'nome_projeto' => $this->input->post('nome_projeto'),
					'descricao_projeto' => $this->input->post('descricao_projeto'),
					'preco_projeto' => $this->input->post('preco_projeto'),
                );

                $this->Projeto_model->update_projeto($id_projeto,$params);            
                redirect('projeto/index');
            }
            else
            {
				$this->load->model('Cliente_model');
				$data['all_clientes'] = $this->Cliente_model->get_all_clientes();

                $data['_view'] = 'projeto/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The projeto you are trying to edit does not exist.');
    } 

    /*
     * Deleting projeto
     */
    function remove($id_projeto)
    {
        $projeto = $this->Projeto_model->get_projeto($id_projeto);

        // check if the projeto exists before trying to delete it
        if(isset($projeto['id_projeto']))
        {
            $this->Projeto_model->delete_projeto($id_projeto);
            redirect('projeto/index');
        }
        else
            show_error('The projeto you are trying to delete does not exist.');
    }
    
}
