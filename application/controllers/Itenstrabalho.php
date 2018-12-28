<?php
/* 
 * Desenvolvido por Marcelo Motta
 * www.marcelomotta.com
 */
 
class Itenstrabalho extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Itenstrabalho_model');
    } 

    /*
     * Listing of itenstrabalho
     */
    function index()
    {
        $params['limit'] = 20; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('itenstrabalho/index?');
        $config['total_rows'] = $this->Itenstrabalho_model->get_all_itenstrabalho_count();
        $config['per_page'] = 20; 

        $this->pagination->initialize($config);
        $data['itenstrabalho'] = $this->Itenstrabalho_model->get_all_itenstrabalho($params);

        $data['_view'] = 'itenstrabalho/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new itenstrabalho
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'livre' => $this->input->post('livre'),
				'faturado' => $this->input->post('faturado'),
				'nota' => $this->input->post('nota'),
				'data_inicio' => $this->input->post('data_inicio'),
				'data_final' => $this->input->post('data_final'),
				'inicio' => $this->input->post('inicio'),
				'final' => $this->input->post('final'),
				'projeto_id' => $this->input->post('projeto_id'),
				'tarefa_id' => $this->input->post('tarefa_id'),
				'horas' => $this->input->post('horas'),
				'horaInt' => $this->input->post('horaInt'),
				'moeda' => $this->input->post('moeda'),
				'rendimento' => $this->input->post('rendimento'),
				'fatura_id' => $this->input->post('fatura_id'),
            );
            
            $itenstrabalho_id = $this->Itenstrabalho_model->add_itenstrabalho($params);
            redirect('itenstrabalho/index');
        }
        else
        {            
            $data['_view'] = 'itenstrabalho/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a itenstrabalho
     */
    function edit($id_trabalho)
    {   
        // check if the itenstrabalho exists before trying to edit it
        $data['itenstrabalho'] = $this->Itenstrabalho_model->get_itenstrabalho($id_trabalho);
        
        if(isset($data['itenstrabalho']['id_trabalho']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'livre' => $this->input->post('livre'),
					'faturado' => $this->input->post('faturado'),
					'nota' => $this->input->post('nota'),
					'data_inicio' => $this->input->post('data_inicio'),
					'data_final' => $this->input->post('data_final'),
					'inicio' => $this->input->post('inicio'),
					'final' => $this->input->post('final'),
					'projeto_id' => $this->input->post('projeto_id'),
					'tarefa_id' => $this->input->post('tarefa_id'),
					'horas' => $this->input->post('horas'),
					'horaInt' => $this->input->post('horaInt'),
					'moeda' => $this->input->post('moeda'),
					'rendimento' => $this->input->post('rendimento'),
					'fatura_id' => $this->input->post('fatura_id'),
                );

                $this->Itenstrabalho_model->update_itenstrabalho($id_trabalho,$params);            
                redirect('itenstrabalho/index');
            }
            else
            {
                $data['_view'] = 'itenstrabalho/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The itenstrabalho you are trying to edit does not exist.');
    } 

    /*
     * Deleting itenstrabalho
     */
    function remove($id_trabalho)
    {
        $itenstrabalho = $this->Itenstrabalho_model->get_itenstrabalho($id_trabalho);

        // check if the itenstrabalho exists before trying to delete it
        if(isset($itenstrabalho['id_trabalho']))
        {
            $this->Itenstrabalho_model->delete_itenstrabalho($id_trabalho);
            redirect('itenstrabalho/index');
        }
        else
            show_error('The itenstrabalho you are trying to delete does not exist.');
    }
    
}
