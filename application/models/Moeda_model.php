<?php
/* 
 * Desenvolvido por Marcelo Motta
 * www.marcelomotta.com
 */
 
class Moeda_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get moeda by id_moeda
     */
    function get_moeda($id_moeda)
    {
        return $this->db->get_where('moedas',array('id_moeda'=>$id_moeda))->row_array();
    }
    
    /*
     * Get all moedas count
     */
    function get_all_moedas_count()
    {
        $this->db->from('moedas');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all moedas
     */
    function get_all_moedas($params = array())
    {
        $this->db->order_by('id_moeda', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('moedas')->result_array();
    }
        
    /*
     * function to add new moeda
     */
    function add_moeda($params)
    {
        $this->db->insert('moedas',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update moeda
     */
    function update_moeda($id_moeda,$params)
    {
        $this->db->where('id_moeda',$id_moeda);
        return $this->db->update('moedas',$params);
    }
    
    /*
     * function to delete moeda
     */
    function delete_moeda($id_moeda)
    {
        return $this->db->delete('moedas',array('id_moeda'=>$id_moeda));
    }
}
