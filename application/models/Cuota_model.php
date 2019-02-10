<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Cuota_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get cuota by cuota_id
     */
    function get_cuota($cuota_id)
    {
        $cuota = $this->db->query("
            SELECT
                *

            FROM
                `cuota`

            WHERE
                `cuota_id` = ?
        ",array($cuota_id))->row_array();

        return $cuota;
    }
        
    /*
     * Get all cuota
     */
    function get_all_cuota()
    {
        $cuota = $this->db->query("
            SELECT
                *

            FROM
                `cuota`

            WHERE
                1 = 1

            ORDER BY `cuota_id` DESC
        ")->result_array();

        return $cuota;
    }
        
    /*
     * function to add new cuota
     */
    function add_cuota($params)
    {
        $this->db->insert('cuota',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update cuota
     */
    function update_cuota($cuota_id,$params)
    {
        $this->db->where('cuota_id',$cuota_id);
        return $this->db->update('cuota',$params);
    }
    
    /*
     * function to delete cuota
     */
    function delete_cuota($cuota_id)
    {
        return $this->db->delete('cuota',array('cuota_id'=>$cuota_id));
    }
}
