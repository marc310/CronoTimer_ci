<?php
/* 
 * Desenvolvido por Marcelo Motta
 * www.marcelomotta.com
 */
 
class Usuario extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Usuario_model');
    } 

    /*
     * Listing of usuarios
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('usuario/index?');
        $config['total_rows'] = $this->Usuario_model->get_all_usuarios_count();
        $this->pagination->initialize($config);

        $data['usuarios'] = $this->Usuario_model->get_all_usuarios($params);
        
        $data['_view'] = 'usuario/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new usuario
     */
    function add()
    {   
        $now = new DateTime();
        $hoje = $now->format('Y-m-d H:i:s');
        #
        $this->load->library('form_validation');

		$this->form_validation->set_rules('password','Password','required|min_length[6]|max_length[25]');
		$this->form_validation->set_rules('password_conf','Password Conf','matches[password]');
        $this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');
		$this->form_validation->set_rules('tipo','Tipo','required');
		$this->form_validation->set_rules('status','Status','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'tipo' => $this->input->post('tipo'),
				//'cliente_id' => $this->input->post('cliente_id'),
				'status' => $this->input->post('status'),
				'password' => $this->input->post('password'),
				'password_conf' => $this->input->post('password_conf'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'data_cadastro' => $hoje,
            );
            
            $usuario_id = $this->Usuario_model->add_usuario($params);
            redirect('usuario/index');
        }
        else
        {
            //TODO..
			$this->load->model('Cliente_model');
			$data['all_clientes'] = $this->Cliente_model->get_all_clientes();
            
            $data['_view'] = 'usuario/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a usuario
     */
    function edit($user_id)
    {   
        // check if the usuario exists before trying to edit it
        $data['usuario'] = $this->Usuario_model->get_usuario($user_id);
        

        if(isset($data['usuario']['user_id']))
        {
            $now = new DateTime();
            $hoje = $now->format('Y-m-d H:i:s'); 
            #
            $this->load->library('form_validation');

			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('password_conf','Password Conf','matches[password]');
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('tipo','Tipo','required');
			$this->form_validation->set_rules('status','Status','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'tipo' => $this->input->post('tipo'),
					//'cliente_id' => $this->input->post('cliente_id'),
					'status' => $this->input->post('status'),
					'password' => $this->input->post('password'),
					'password_conf' => $this->input->post('password_conf'),
					'username' => $this->input->post('username'),
					'email' => $this->input->post('email'),
					'alterado_em' => $hoje,
                );

                $this->Usuario_model->update_usuario($user_id,$params);            
                redirect('usuario/index');
            }
            else
            {
				$this->load->model('Cliente_model');
				$data['all_clientes'] = $this->Cliente_model->get_all_clientes();

                $data['_view'] = 'usuario/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The usuario you are trying to edit does not exist.');
    } 

    /*
     * Deleting usuario
     */
    function remove($user_id)
    {
        $usuario = $this->Usuario_model->get_usuario($user_id);

        // check if the usuario exists before trying to delete it
        if(isset($usuario['user_id']))
        {
            $this->Usuario_model->delete_usuario($user_id);
            redirect('usuario/index');
        }
        else
            show_error('The usuario you are trying to delete does not exist.');
    }
    
}
