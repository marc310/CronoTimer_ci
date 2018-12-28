<?php
/* 
 * Desenvolvido por Marcelo Motta
 * www.marcelomotta.com
 */
 
class Itenstrabalho_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get itenstrabalho by id_trabalho
     */
    function get_itenstrabalho($id_trabalho)
    {
        return $this->db->get_where('itenstrabalho',array('id_trabalho'=>$id_trabalho))->row_array();
    }
        
    /*
     * Get all itenstrabalho
     */
    function get_all_itenstrabalho()
    {
        $this->db->order_by('id_trabalho', 'desc');
        return $this->db->get('itenstrabalho')->result_array();
    }
        
    /*
     * function to add new itenstrabalho
     */
    function add_itenstrabalho($params)
    {
        $this->db->insert('itenstrabalho',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update itenstrabalho
     */
    function update_itenstrabalho($id_trabalho,$params)
    {
        $this->db->where('id_trabalho',$id_trabalho);
        return $this->db->update('itenstrabalho',$params);
    }
    
    /*
     * function to delete itenstrabalho
     */
    function delete_itenstrabalho($id_trabalho)
    {
        return $this->db->delete('itenstrabalho',array('id_trabalho'=>$id_trabalho));
    }
}
