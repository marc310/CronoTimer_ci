<?php
/* 
 * Desenvolvido por Marcelo Motta
 * www.marcelomotta.com
 */
 
class Cliente_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get cliente by id_cliente
     */
    function get_cliente($id_cliente)
    {
        return $this->db->get_where('clientes',array('id_cliente'=>$id_cliente))->row_array();
    }

    // get data by id
    function get_by_id($id_cliente)
    {
        $this->db->where($this->id_cliente, $id_cliente);
        return $this->db->get($this->table)->row();
    }
        
    
    /*
     * Get all clientes count
     */
    function get_all_clientes_count()
    {
        $this->db->from('clientes');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all clientes
     */
    function get_all_clientes($params = array())
    {
        $this->db->order_by('id_cliente', 'desc');
        $this->db->join('moedas','clientes.moeda_id = moedas.id_moeda');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('clientes')->result_array();
    }
        
    /*
     * function to add new cliente
     */
    function add_cliente($params)
    {
        $this->db->insert('clientes',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update cliente
     */
    function update_cliente($id_cliente,$params)
    {
        $this->db->where('id_cliente',$id_cliente);
        return $this->db->update('clientes',$params);
    }
    
    /*
     * function to delete cliente
     */
    function delete_cliente($id_cliente)
    {
        return $this->db->delete('clientes',array('id_cliente'=>$id_cliente));
    }
}
