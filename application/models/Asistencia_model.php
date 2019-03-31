<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Asistencia_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get asistencia by aistencia_id
     */
    function get_asistencia($asistencia_id)
    {
        $asistencia = $this->db->query("
            SELECT
                *

            FROM
                `asistencia`

            WHERE
                `asistencia_id` = ?
        ",array($asistencia_id))->row_array();

        return $asistencia;
    }
        
    /*
     * Get all asistencia
     */
    function get_all_asistencia()
    {
        $asistencia = $this->db->query("
            SELECT
                *

            FROM
                `asistencia`

            WHERE
                1 = 1

            ORDER BY `asistencia_id` DESC
        ")->result_array();

        return $asistencia;
    }
        
    /*
     * function to add new asistencia
     */
    function add_asistencia($params)
    {
        $this->db->insert('asistencia',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update asistencia
     */
    function update_asistencia($asistencia_id,$params)
    {
        $this->db->where('asistencia_id',$asistencia_id);
        return $this->db->update('asistencia',$params);
    }
    
    /*
     * function to delete asistencia
     */
    function delete_asistencia($asistencia_id)
    {
        return $this->db->delete('asistencia',array('asistencia_id'=>$asistencia_id));
    }
    /*
     * Get this asistencia by cliente_id and reunion_id
     */
    function get_this_asistencia($cliente_id, $reunion_id)
    {
        $asistencia = $this->db->query("
            SELECT
                a.asistencia_id
            FROM
                asistencia a
            WHERE
                a.reunion_id = $reunion_id
                and a.cliente_id = $cliente_id
        ")->row_array();

        return $asistencia['asistencia_id'];
    }
    /*
     * function to update asistencia
     */
    function update_this_asistencia($cliente_id, $reunion_id, $params)
    {
        $this->db->where('cliente_id',$cliente_id);
        $this->db->where('reunion_id',$reunion_id);
        return $this->db->update('asistencia',$params);
    }
    
}
