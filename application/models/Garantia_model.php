<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Garantia_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get garantia by garantia_id
     */
    function get_garantia($garantia_id)
    {
        $garantia = $this->db->query("
            SELECT
                *

            FROM
                `garantia`

            WHERE
                `garantia_id` = ?
        ",array($garantia_id))->row_array();

        return $garantia;
    }
        
    /*
     * Get all garantia
     */
    function get_all_garantia()
    {
        $garantia = $this->db->query("
            SELECT
                g.*, e.estado_color, e.estado_descripcion

            FROM
                garantia g, estado e

            WHERE
                g.estado_id=e.estado_id

            ORDER BY `garantia_id` DESC
        ")->result_array();

        return $garantia;
    }

    function get_garantia_credito($credito_id)
    {
        $garantia = $this->db->query("
            SELECT
                g.*

            FROM
                garantia g

            WHERE
                g.credito_id=".$credito_id."

            ORDER BY `garantia_id` DESC
        ")->result_array();

        return $garantia;
    }
        
    /*
     * function to add new garantia
     */
    function add_garantia($params)
    {
        $this->db->insert('garantia',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update garantia
     */
    function update_garantia($garantia_id,$params)
    {
        $this->db->where('garantia_id',$garantia_id);
        return $this->db->update('garantia',$params);
    }
    
    /*
     * function to delete garantia
     */
    function delete_garantia($garantia_id)
    {
        return $this->db->delete('garantia',array('garantia_id'=>$garantia_id));
    }
    
    function get_allgarantiaintegrante($integrante_id)
    {
        $garantia = $this->db->query("
            SELECT
                g.*
            FROM
                garantia g
            WHERE
                g.integrante_id=".$integrante_id."
            ORDER BY `garantia_descripcion`
        ")->result_array();
        return $garantia;
    }
}
