<?php
/* 
 * Desenvolvido por Marcelo Motta
 * www.marcelomotta.com
 */
 
class Itenspagamento extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Itenspagamento_model');
    } 

    /*
     * Listing of itenspagamento
     */
    function index()
    {
        $data['itenspagamento'] = $this->Itenspagamento_model->get_all_itenspagamento();
        
        $data['_view'] = 'itenspagamento/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new itenspagamento
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'fatura_id' => $this->input->post('fatura_id'),
				'valor_pago' => $this->input->post('valor_pago'),
				'tipo_pagamento' => $this->input->post('tipo_pagamento'),
				'descricao_pagamento' => $this->input->post('descricao_pagamento'),
				'data_pagamento' => $this->input->post('data_pagamento'),
            );
            
            $itenspagamento_id = $this->Itenspagamento_model->add_itenspagamento($params);
            redirect('itenspagamento/index');
        }
        else
        {            
            $data['_view'] = 'itenspagamento/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a itenspagamento
     */
    function edit($id_pagamento)
    {   
        // check if the itenspagamento exists before trying to edit it
        $data['itenspagamento'] = $this->Itenspagamento_model->get_itenspagamento($id_pagamento);
        
        if(isset($data['itenspagamento']['id_pagamento']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'fatura_id' => $this->input->post('fatura_id'),
					'valor_pago' => $this->input->post('valor_pago'),
					'tipo_pagamento' => $this->input->post('tipo_pagamento'),
					'descricao_pagamento' => $this->input->post('descricao_pagamento'),
					'data_pagamento' => $this->input->post('data_pagamento'),
                );

                $this->Itenspagamento_model->update_itenspagamento($id_pagamento,$params);            
                redirect('itenspagamento/index');
            }
            else
            {
                $data['_view'] = 'itenspagamento/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The itenspagamento you are trying to edit does not exist.');
    } 

    /*
     * Deleting itenspagamento
     */
    function remove($id_pagamento)
    {
        $itenspagamento = $this->Itenspagamento_model->get_itenspagamento($id_pagamento);

        // check if the itenspagamento exists before trying to delete it
        if(isset($itenspagamento['id_pagamento']))
        {
            $this->Itenspagamento_model->delete_itenspagamento($id_pagamento);
            redirect('itenspagamento/index');
        }
        else
            show_error('The itenspagamento you are trying to delete does not exist.');
    }
    
}
