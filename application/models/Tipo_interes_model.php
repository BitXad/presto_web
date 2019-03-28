<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Tipo_interes_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get tipo_interes by tipoint_id
     */
    function get_tipo_interes($tipoint_id)
    {
        $tipo_interes = $this->db->query("
            SELECT
                *

            FROM
                `tipo_interes`

            WHERE
                `tipoint_id` = ?
        ",array($tipoint_id))->row_array();

        return $tipo_interes;
    }
        
    /*
     * Get all tipo_interes
     */
    function get_all_tipo_interes()
    {
        $tipo_interes = $this->db->query("
            SELECT
                *

            FROM
                `tipo_interes`

            WHERE
                1 = 1

            ORDER BY `tipoint_id` DESC
        ")->result_array();

        return $tipo_interes;
    }
        
    /*
     * function to add new tipo_interes
     */
    function add_tipo_interes($params)
    {
        $this->db->insert('tipo_interes',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update tipo_interes
     */
    function update_tipo_interes($tipoint_id,$params)
    {
        $this->db->where('tipoint_id',$tipoint_id);
        return $this->db->update('tipo_interes',$params);
    }
    
    /*
     * function to delete tipo_interes
     */
    function delete_tipo_interes($tipoint_id)
    {
        return $this->db->delete('tipo_interes',array('tipoint_id'=>$tipoint_id));
    }
}
