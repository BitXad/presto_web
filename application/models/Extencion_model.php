<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Extencion_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get extencion by cliente_extencionci
     */
    function get_extencion($cliente_extencionci)
    {
        $extencion = $this->db->query("
            SELECT
                *

            FROM
                `extencion`

            WHERE
                `cliente_extencionci` = ?
        ",array($cliente_extencionci))->row_array();

        return $extencion;
    }
        
    /*
     * Get all extencion
     */
    function get_all_extencion()
    {
        $extencion = $this->db->query("
            SELECT
                *

            FROM
                `extencion`

            WHERE
                1 = 1

            ORDER BY `cliente_extencionci` DESC
        ")->result_array();

        return $extencion;
    }
        
    /*
     * function to add new extencion
     */
    function add_extencion($params)
    {
        $this->db->insert('extencion',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update extencion
     */
    function update_extencion($cliente_extencionci,$params)
    {
        $this->db->where('cliente_extencionci',$cliente_extencionci);
        return $this->db->update('extencion',$params);
    }
    
    /*
     * function to delete extencion
     */
    function delete_extencion($cliente_extencionci)
    {
        return $this->db->delete('extencion',array('cliente_extencionci'=>$cliente_extencionci));
    }
}
