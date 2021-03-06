<?php
/* 
 * Desenvolvido por Marcelo Motta
 * www.marcelomotta.com
 */
 
class Trabalho extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Trabalho_model');
    } 

    /*
     * Listing of trabalhos
     */
    function index()
    {
        $params['limit'] = 100; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('trabalho/index?');
        $config['total_rows'] = $this->Trabalho_model->get_all_trabalhos_count();
        $config['per_page'] = 100; 

        $this->pagination->initialize($config);

        $data['trabalhos'] = $this->Trabalho_model->get_all_trabalhos($params);

        $this->load->model('Projeto_model');
        $data['all_projetos'] = $this->Projeto_model->get_all_projetos();

        $this->load->model('Tarefa_model');
        $data['all_tarefas'] = $this->Tarefa_model->get_all_tarefas();
        
        $data['_view'] = 'trabalho/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new trabalho
     */
    function add()
    {   
        //converte valores de data pra salvar no banco
        $v_data_in = str_replace("/", "-", $this->input->post('data_inicio'));
        $v_data_fn = str_replace("/", "-", $this->input->post('data_final'));
        //
        if ($v_data_in!='')
        {
        $d_inicio = new DateTime($v_data_in);
        $inicio_t = $d_inicio->format('Y-m-d H:i:s');
        }
        if ($v_data_fn!='')
        {
        $d_final = new DateTime($v_data_fn);
        $final_t = $d_final->format('Y-m-d H:i:s');
        }
        //
        $this->load->library('form_validation');

		$this->form_validation->set_rules('data_inicio','Data Inicio','required');
		$this->form_validation->set_rules('projeto_id','Projeto Id','required');
		$this->form_validation->set_rules('tarefa_id','Tarefa Id','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
                'faturado' => $this->input->post('faturado'),
				'projeto_id' => $this->input->post('projeto_id'),
				'tarefa_id' => $this->input->post('tarefa_id'),
				'nota' => $this->input->post('nota'),
				'data_inicio' => $inicio_t,
				'data_final' => $final_t,
				'inicio' => $this->input->post('inicio'),
				'final' => $this->input->post('final'),
				'horas' => $this->input->post('horas'),
				'horaInt' => $this->input->post('horaInt'),
				'moeda' => $this->input->post('moeda'),
				'rendimento' => $this->input->post('rendimento'),
				'fatura_id' => $this->input->post('fatura_id'),
				'livre' => $this->input->post('livre'),
            );
            
            $trabalho_id = $this->Trabalho_model->add_trabalho($params);
            redirect('trabalho/index');
        }
        else
        {
            $this->load->model('Moeda_model');
            $data['all_moedas'] = $this->Moeda_model->get_all_moedas();
            
            $this->load->model('Cliente_model');
            $data['all_clientes'] = $this->Cliente_model->get_all_clientes();

			$this->load->model('Projeto_model');
			$data['all_projetos'] = $this->Projeto_model->get_all_projetos();

			$this->load->model('Tarefa_model');
			$data['all_tarefas'] = $this->Tarefa_model->get_all_tarefas();
            
            //$data['_view'] = 'trabalho/add';
            $this->load->view('trabalho/add',$data);
            
        }
    }  

    /*
     * Editing a trabalho
     */
    function edit($id_trabalho)
    {   
        //converte valores de data pra salvar no banco
        
        
        //
        // check if the trabalho exists before trying to edit it
        $data['trabalho'] = $this->Trabalho_model->get_trabalho($id_trabalho);
        
        if(isset($data['trabalho']['id_trabalho']))
        {
            $this->load->library('form_validation');

			$this->form_validation->set_rules('data_inicio','Data Inicio','required');
			$this->form_validation->set_rules('projeto_id','Projeto Id','required');
			$this->form_validation->set_rules('tarefa_id','Tarefa Id','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'livre' => $this->input->post('livre'),
					'faturado' => $this->input->post('faturado'),
					'projeto_id' => $this->input->post('projeto_id'),
					'tarefa_id' => $this->input->post('tarefa_id'),
					'nota' => $this->input->post('nota'),
					'data_inicio' => $this->input->post('data_inicio'),
					'data_final' => $this->input->post('data_final'),
					'inicio' => $this->input->post('inicio'),
					'final' => $this->input->post('final'),
					'horas' => $this->input->post('horas'),
					'horaInt' => $this->input->post('horaInt'),
					'moeda' => $this->input->post('moeda'),
					'rendimento' => $this->input->post('rendimento'),
					'fatura_id' => $this->input->post('fatura_id'),
                );

                $this->Trabalho_model->update_trabalho($id_trabalho,$params);            
                redirect('trabalho/index');
            }
            else
            {
				$this->load->model('Projeto_model');
				$data['all_projetos'] = $this->Projeto_model->get_all_projetos();

				$this->load->model('Tarefa_model');
				$data['all_tarefas'] = $this->Tarefa_model->get_all_tarefas();

                $this->load->view('trabalho/edit',$data);
            }
        }
        else
            show_error('The trabalho you are trying to edit does not exist.');
    } 

    /*
     * Deleting trabalho
     */
    function remove($id_trabalho)
    {
        $trabalho = $this->Trabalho_model->get_trabalho($id_trabalho);

        // check if the trabalho exists before trying to delete it
        if(isset($trabalho['id_trabalho']))
        {
            $this->Trabalho_model->delete_trabalho($id_trabalho);
            redirect('trabalho/index');
        }
        else
            show_error('The trabalho you are trying to delete does not exist.');
    }

    /***************************************************/
    /* Lista de Funções cronoTimer
    /***************************************************/
    // TODO ..
    // IMPLEMENTAR HELP ** 
    // HELP LINK: https://www.youtube.com/watch?v=bxA6M9LYrPk&list=WL&index=14&t=0s
    // UMA SITUAÇÃO SIMILAR ONDE O COUNTRY SELECIONA O STATE 
    // 
    // CONTROLLER FUNCTION
    // function fetch_state()
    // {
    //     if($this->input->post('country_id'))
    //     {
    //     echo $this->dynamic_dependent_model->fetch_state($this->input->post('country_id'));
    //     }
    // }
    //
    // MODEL FUNCTION
    // function fetch_state($country_id)
    // {
    // $this->db->where('country_id', $country_id);
    // $this->db->order_by('state_name', 'ASC');
    // $query = $this->db->get('state');
    // $output = '<option value="">Select State</option>';
    // foreach($query->result() as $row)
    // {
    // $output .= '<option value="'.$row->state_id.'">'.$row->state_name.'</option>';
    // }
    // return $output;
    // }


    public function inicia_cronometro()
    {
        // $datestring = 'Year: %Y Month: %m Day: %d - %h:%i %a';
        // //$time = time();
        // $time = $this->input->post('data_inicio');
        // //echo mdate($datestring, $time);
        $now = time();
        // $human = unix_to_human($now);
        // $unix = human_to_unix($human);
        $dataUnix = date('Y-m-d H:i:s', $now);

        //echo $now . " e a assim com strtotime: " . $dataUnix;

        //$data['_view'] = 'trabalho/add';
        //$this->load->view('layouts/main',$data);
        //return $data;

        //$this->data['agora'] = $dataUnix;

        $data['_view'] = 'trabalho/add';
        $this->load->view('trabalho/add', $this->$data);

        
    }

    
}
