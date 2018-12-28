<?php
/* 
 * Desenvolvido por Marcelo Motta
 * www.marcelomotta.com
 */
 
class Projeto_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get projeto by id_projeto
     */
    function get_projeto($id_projeto)
    {
        return $this->db->get_where('projetos',array('id_projeto'=>$id_projeto))->row_array();
    }
    
    /*
     * Get all projetos count
     */
    function get_all_projetos_count()
    {
        $this->db->from('projetos');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all projetos
     */
    function get_all_projetos($params = array())
    {
        $this->db->order_by('id_projeto', 'desc');
        $this->db->join('clientes','projetos.cliente_id = clientes.id_cliente');
        $this->db->join('moedas','clientes.moeda_id = moedas.id_moeda');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('projetos')->result_array();
    }
        
    /*
     * function to add new projeto
     */
    function add_projeto($params)
    {
        $this->db->insert('projetos',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update projeto
     */
    function update_projeto($id_projeto,$params)
    {
        $this->db->where('id_projeto',$id_projeto);
        return $this->db->update('projetos',$params);
    }
    
    /*
     * function to delete projeto
     */
    function delete_projeto($id_projeto)
    {
        return $this->db->delete('projetos',array('id_projeto'=>$id_projeto));
    }
}
