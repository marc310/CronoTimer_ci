<?php
/* 
 * Desenvolvido por Marcelo Motta
 * www.marcelomotta.com
 */
 
class Usuario_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get usuario by user_id
     */
    function get_usuario($user_id)
    {
        return $this->db->get_where('usuarios',array('user_id'=>$user_id))->row_array();
    }
    
    /*
     * Get all usuarios count
     */
    function get_all_usuarios_count()
    {
        $this->db->from('usuarios');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all usuarios
     */
    function get_all_usuarios($params = array())
    {
        $this->db->order_by('user_id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('usuarios')->result_array();
    }

    /*
     * Get all users
     */
    function get_all_users($params = array())
    {
        $this->db->order_by('id', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('users')->result_array();
    }
        
    /*
     * function to add new usuario
     */
    function add_usuario($params)
    {
        $this->db->insert('usuarios',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update usuario
     */
    function update_usuario($user_id,$params)
    {
        $this->db->where('user_id',$user_id);
        return $this->db->update('usuarios',$params);
    }
    
    /*
     * function to delete usuario
     */
    function delete_usuario($user_id)
    {
        return $this->db->delete('usuarios',array('user_id'=>$user_id));
    }
}
