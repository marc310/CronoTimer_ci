<?php
/* 
 * Desenvolvido por Marcelo Motta
 * www.marcelomotta.com
 */
 
class Tarefa extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Tarefa_model');
    } 

    /*
     * Listing of tarefas
     */
    function index()
    {
        $params['limit'] = 10; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');

        $config['base_url'] = site_url('tarefa/index?');
        $config['total_rows'] = $this->Tarefa_model->get_all_tarefas_count();
        $config['per_page'] = 10; 
        $this->pagination->initialize($config);

        $data['tarefas'] = $this->Tarefa_model->get_all_tarefas($params);
        
        $data['_view'] = 'tarefa/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new tarefa
     */
    function add()
    {   
        $this->load->library('form_validation');

		$this->form_validation->set_rules('nome_tarefa','Nome Tarefa','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'nome_tarefa' => $this->input->post('nome_tarefa'),
				'descricao_tarefa' => $this->input->post('descricao_tarefa'),
            );
            
            $tarefa_id = $this->Tarefa_model->add_tarefa($params);
            redirect('tarefa/index');
        }
        else
        {            
            $data['_view'] = 'tarefa/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a tarefa
     */
    function edit($id_tarefa)
    {   
        // check if the tarefa exists before trying to edit it
        $data['tarefa'] = $this->Tarefa_model->get_tarefa($id_tarefa);
        
        if(isset($data['tarefa']['id_tarefa']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('nome_tarefa','Nome Tarefa','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'nome_tarefa' => $this->input->post('nome_tarefa'),
					'descricao_tarefa' => $this->input->post('descricao_tarefa'),
                );

                $this->Tarefa_model->update_tarefa($id_tarefa,$params);            
                redirect('tarefa/index');
            }
            else
            {
                $data['_view'] = 'tarefa/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The tarefa you are trying to edit does not exist.');
    } 

    /*
     * Deleting tarefa
     */
    function remove($id_tarefa)
    {
        $tarefa = $this->Tarefa_model->get_tarefa($id_tarefa);

        // check if the tarefa exists before trying to delete it
        if(isset($tarefa['id_tarefa']))
        {
            $this->Tarefa_model->delete_tarefa($id_tarefa);
            redirect('tarefa/index');
        }
        else
            show_error('The tarefa you are trying to delete does not exist.');
    }
    
}
