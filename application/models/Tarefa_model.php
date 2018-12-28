<?php
/* 
 * Desenvolvido por Marcelo Motta
 * www.marcelomotta.com
 */
 
class Tarefa_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get tarefa by id_tarefa
     */
    function get_tarefa($id_tarefa)
    {
        return $this->db->get_where('tarefas',array('id_tarefa'=>$id_tarefa))->row_array();
    }
    
    /*
     * Get all tarefas count
     */
    function get_all_tarefas_count()
    {
        $this->db->from('tarefas');
        return $this->db->count_all_results();
    }
        
    /*
     * Get all tarefas
     */
    function get_all_tarefas($params = array())
    {
        $this->db->order_by('id_tarefa', 'desc');
        if(isset($params) && !empty($params))
        {
            $this->db->limit($params['limit'], $params['offset']);
        }
        return $this->db->get('tarefas')->result_array();
    }
        
    /*
     * function to add new tarefa
     */
    function add_tarefa($params)
    {
        $this->db->insert('tarefas',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update tarefa
     */
    function update_tarefa($id_tarefa,$params)
    {
        $this->db->where('id_tarefa',$id_tarefa);
        return $this->db->update('tarefas',$params);
    }
    
    /*
     * function to delete tarefa
     */
    function delete_tarefa($id_tarefa)
    {
        return $this->db->delete('tarefas',array('id_tarefa'=>$id_tarefa));
    }
}
