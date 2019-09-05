<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Galeria_cliente_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get galeria_cliente by galeria_cliente_id
     */
    function get_galeria_cliente($galeria_cliente_id)
    {
        $galeria_cliente = $this->db->query("
            SELECT
                *

            FROM
                `galeria_cliente`

            WHERE
                `galeria_id` = ?
        ",array($galeria_cliente_id))->row_array();

        return $galeria_cliente;
    }
        
    /*
     * Get all galeria_cliente
     */
    function get_all_galeria_cliente($cliente_id)
    {
        $galeria_cliente = $this->db->query("
            SELECT
                *

            FROM
                `galeria_cliente`

            WHERE
                cliente_id=".$cliente_id."

            ORDER BY `galeria_id` DESC
        ")->result_array();

        return $galeria_cliente;
    }
        
    /*
     * function to add new galeria_cliente
     */
    function add_galeria_cliente($params)
    {
        $this->db->insert('galeria_cliente',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update galeria_cliente
     */
    function update_galeria_cliente($galeria_cliente_id,$params)
    {
        $this->db->where('galeria_cliente_id',$galeria_cliente_id);
        return $this->db->update('galeria_cliente',$params);
    }
    
    /*
     * function to delete galeria_cliente
     */
    function delete_galeria_cliente($galeria_id)
    {
        return $this->db->delete('galeria_cliente',array('galeria_id'=>$galeria_id));
    }
}
