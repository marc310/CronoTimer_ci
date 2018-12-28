<?php
/* 
 * Desenvolvido por Marcelo Motta
 * www.marcelomotta.com
 */
 
class Cliente extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Cliente_model');
    } 

    /*
     * Listing of clientes
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('cliente/index?');
        $config['total_rows'] = $this->Cliente_model->get_all_clientes_count();
        $this->pagination->initialize($config);

        $data['clientes'] = $this->Cliente_model->get_all_clientes($params);
        
        $data['_view'] = 'cliente/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new cliente
     */
    function add()
    {   
        $now = new DateTime();
        $hoje = $now->format('Y-m-d'); 

        $this->load->library('form_validation');

		$this->form_validation->set_rules('preco_hora','Preco Hora','decimal');
		$this->form_validation->set_rules('email','Email','valid_email');
		$this->form_validation->set_rules('nome','Nome','required');
		
		if($this->form_validation->run())     
        {   
            $params = array(
				'moeda_id' => $this->input->post('moeda_id'),
				'status' => $this->input->post('status'),
				'nome' => $this->input->post('nome'),
				'telefone' => $this->input->post('telefone'),
				'celular' => $this->input->post('celular'),
				'email' => $this->input->post('email'),
				'preco_hora' => $this->input->post('preco_hora'),
				'data_cadastro' => $hoje,
            );
            
            $cliente_id = $this->Cliente_model->add_cliente($params);
            redirect('cliente/index');
        }
        else
        {
			$this->load->model('Moeda_model');
			$data['all_moedas'] = $this->Moeda_model->get_all_moedas();
            
            $data['_view'] = 'cliente/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a cliente
     */
    function edit($id_cliente)
    {   
        // check if the cliente exists before trying to edit it
        $data['cliente'] = $this->Cliente_model->get_cliente($id_cliente);
        
        if(isset($data['cliente']['id_cliente']))
        {
            $now = new DateTime();
            $hoje = $now->format('Y-m-d H:i:s');
            #
            $this->load->library('form_validation');

			$this->form_validation->set_rules('preco_hora','Preco Hora','decimal');
			$this->form_validation->set_rules('email','Email','valid_email');
			$this->form_validation->set_rules('nome','Nome','required');
		
			if($this->form_validation->run())     
            {   
                $params = array(
					'moeda_id' => $this->input->post('moeda_id'),
					'status' => $this->input->post('status'),
					'nome' => $this->input->post('nome'),
					'telefone' => $this->input->post('telefone'),
					'celular' => $this->input->post('celular'),
					'email' => $this->input->post('email'),
					'preco_hora' => $this->input->post('preco_hora'),
					'alterado_em' => $hoje,
                );
                
                $this->Cliente_model->update_cliente($id_cliente,$params);            
                redirect('cliente/index');
            }
            else
            {
				$this->load->model('Moeda_model');
				$data['all_moedas'] = $this->Moeda_model->get_all_moedas();

                $data['_view'] = 'cliente/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The cliente you are trying to edit does not exist.');
    } 

    /*
    * Ler produto
    */
    // public function read($id) 
    // {
    //     $row = $this->Cliente_model->get_by_id($id);
    //     if ($row) {
    //         $data = array(
    //             'id' => $row->id,
    //     'nome' => $row->nome,
    //     'descricao' => $row->descricao,
    //     'modeloID' => $row->modeloID,
    //     'categoriaID' => $row->categoriaID,
    //     );
    //     $this->load->view('produto/produto_read', $data);
    //     } else {
    //         $this->session->set_flashdata('message', 'Record Not Found');
    //         redirect(site_url('produtos'));
    //     }
    // }

    /*
     * Deleting cliente
     */
    function remove($id_cliente)
    {
        $cliente = $this->Cliente_model->get_cliente($id_cliente);

        // check if the cliente exists before trying to delete it
        if(isset($cliente['id_cliente']))
        {
            $this->Cliente_model->delete_cliente($id_cliente);
            redirect('cliente/index');
        }
        else
            show_error('The cliente you are trying to delete does not exist.');
    }
    
}
