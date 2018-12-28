<?php
/* 
 * Desenvolvido por Marcelo Motta
 * www.marcelomotta.com
 */
 
class Pagamento_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get pagamento by id_pagamento
     */
    function get_pagamento($id_pagamento)
    {
        return $this->db->get_where('itenspagamento',array('id_pagamento'=>$id_pagamento))->row_array();
    }
    
    /*
     * Get all pagamentos count
     */
    function get_all_pagamentos_count()
    {
        $this->db->from('itenspagamento');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all pagamentos
     */
    function get_all_pagamentos($params = array())
    {
        $this->db->order_by('id_pagamento', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('itenspagamento')->result_array();
    }
        
    /*
     * function to add new pagamento
     */
    function add_pagamento($params)
    {
        $this->db->insert('itenspagamento',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update pagamento
     */
    function update_pagamento($id_pagamento,$params)
    {
        $this->db->where('id_pagamento',$id_pagamento);
        return $this->db->update('itenspagamento',$params);
    }
    
    /*
     * function to delete pagamento
     */
    function delete_pagamento($id_pagamento)
    {
        return $this->db->delete('itenspagamento',array('id_pagamento'=>$id_pagamento));
    }
}
