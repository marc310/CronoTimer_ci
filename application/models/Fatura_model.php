<?php
/* 
 * Desenvolvido por Marcelo Motta
 * www.marcelomotta.com
 */
 
class Fatura_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get fatura by id_fatura
     */
    function get_fatura($id_fatura)
    {
        return $this->db->get_where('fatura',array('id_fatura'=>$id_fatura))->row_array();
    }
    
    /*
     * Get all fatura count
     */
    function get_all_fatura_count()
    {
        $this->db->from('fatura');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all fatura
     */
    function get_all_fatura($params = array())
    {
        $this->db->order_by('id_fatura', 'desc');
        $this->db->join('clientes','fatura.cliente_fatura = clientes.id_cliente');
        #
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('fatura')->result_array();
    }
        
    /*
     * function to add new fatura
     */
    function add_fatura($params)
    {
        $this->db->insert('fatura',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update fatura
     */
    function update_fatura($id_fatura,$params)
    {
        $this->db->where('id_fatura',$id_fatura);
        return $this->db->update('fatura',$params);
    }
    
    /*
     * function to delete fatura
     */
    function delete_fatura($id_fatura)
    {
        return $this->db->delete('fatura',array('id_fatura'=>$id_fatura));
    }
}
