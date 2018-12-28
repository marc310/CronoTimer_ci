<?php
/* 
 * Desenvolvido por Marcelo Motta
 * www.marcelomotta.com
 */
 
class Pagamento extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pagamento_model');
    } 

    /*
     * Listing of pagamentos
     */
    function index()
    {
        $params['limit'] = RECORDS_PER_PAGE; 
        $params['offset'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
        
        $config = $this->config->item('pagination');
        $config['base_url'] = site_url('pagamento/index?');
        $config['total_rows'] = $this->Pagamento_model->get_all_pagamentos_count();
        $this->pagination->initialize($config);

        $data['pagamentos'] = $this->Pagamento_model->get_all_pagamentos($params);
        
        $data['_view'] = 'pagamento/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new pagamento
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'fatura_id' => $this->input->post('fatura_id'),
				'tipo_pagamento' => $this->input->post('tipo_pagamento'),
				'valor_pago' => $this->input->post('valor_pago'),
				'descricao_pagamento' => $this->input->post('descricao_pagamento'),
				'data_pagamento' => $this->input->post('data_pagamento'),
            );
            
            $pagamento_id = $this->Pagamento_model->add_pagamento($params);
            redirect('pagamento/index');
        }
        else
        {
			$this->load->model('Fatura_model');
			$data['all_fatura'] = $this->Fatura_model->get_all_fatura();
            
            $data['_view'] = 'pagamento/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a pagamento
     */
    function edit($id_pagamento)
    {   
        // check if the pagamento exists before trying to edit it
        $data['pagamento'] = $this->Pagamento_model->get_pagamento($id_pagamento);
        
        if(isset($data['pagamento']['id_pagamento']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'fatura_id' => $this->input->post('fatura_id'),
					'tipo_pagamento' => $this->input->post('tipo_pagamento'),
					'valor_pago' => $this->input->post('valor_pago'),
					'descricao_pagamento' => $this->input->post('descricao_pagamento'),
					'data_pagamento' => $this->input->post('data_pagamento'),
                );

                $this->Pagamento_model->update_pagamento($id_pagamento,$params);            
                redirect('pagamento/index');
            }
            else
            {
				$this->load->model('Fatura_model');
				$data['all_fatura'] = $this->Fatura_model->get_all_fatura();

                $data['_view'] = 'pagamento/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The pagamento you are trying to edit does not exist.');
    } 

    /*
     * Deleting pagamento
     */
    function remove($id_pagamento)
    {
        $pagamento = $this->Pagamento_model->get_pagamento($id_pagamento);

        // check if the pagamento exists before trying to delete it
        if(isset($pagamento['id_pagamento']))
        {
            $this->Pagamento_model->delete_pagamento($id_pagamento);
            redirect('pagamento/index');
        }
        else
            show_error('The pagamento you are trying to delete does not exist.');
    }
    
}
