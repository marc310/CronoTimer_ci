<?php
/* 
 * Desenvolvido por Marcelo Motta
 * www.marcelomotta.com
 */
 
class Trabalho_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get trabalho by id_trabalho
     */
    function get_trabalho($id_trabalho)
    {
        return $this->db->get_where('itenstrabalho',array('id_trabalho'=>$id_trabalho))->row_array();
    }
    
    /*
     * Get all trabalhos count
     */
    function get_all_trabalhos_count()
    {
        $this->db->from('itenstrabalho');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all trabalhos
     */
    function get_all_trabalhos($params = array())
    {
        $this->db->order_by('id_trabalho', 'desc');
        $this->db->join('projetos','itenstrabalho.projeto_id = projetos.id_projeto');
        $this->db->join('tarefas','itenstrabalho.tarefa_id = tarefas.id_tarefa');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('itenstrabalho')->result_array();
    }
        
    /*
     * function to add new trabalho
     */
    function add_trabalho($params)
    {
        $this->db->insert('itenstrabalho',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update trabalho
     */
    function update_trabalho($id_trabalho,$params)
    {
        $this->db->where('id_trabalho',$id_trabalho);
        return $this->db->update('itenstrabalho',$params);
    }
    
    /*
     * function to delete trabalho
     */
    function delete_trabalho($id_trabalho)
    {
        return $this->db->delete('itenstrabalho',array('id_trabalho'=>$id_trabalho));
    }
}
