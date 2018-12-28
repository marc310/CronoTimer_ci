<?php
/* 
 * Desenvolvido por Marcelo Motta
 * www.marcelomotta.com
 */
 
class Itenspagamento_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get itenspagamento by id_pagamento
     */
    function get_itenspagamento($id_pagamento)
    {
        return $this->db->get_where('itenspagamento',array('id_pagamento'=>$id_pagamento))->row_array();
    }
        
    /*
     * Get all itenspagamento
     */
    function get_all_itenspagamento()
    {
        $this->db->order_by('id_pagamento', 'desc');
        return $this->db->get('itenspagamento')->result_array();
    }
        
    /*
     * function to add new itenspagamento
     */
    function add_itenspagamento($params)
    {
        $this->db->insert('itenspagamento',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update itenspagamento
     */
    function update_itenspagamento($id_pagamento,$params)
    {
        $this->db->where('id_pagamento',$id_pagamento);
        return $this->db->update('itenspagamento',$params);
    }
    
    /*
     * function to delete itenspagamento
     */
    function delete_itenspagamento($id_pagamento)
    {
        return $this->db->delete('itenspagamento',array('id_pagamento'=>$id_pagamento));
    }
}
