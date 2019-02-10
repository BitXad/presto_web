<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Cliente_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get cliente by cliente_id
     */
    function get_cliente($cliente_id)
    {
        $cliente = $this->db->query("
            SELECT
                *

            FROM
                `cliente`

            WHERE
                `cliente_id` = ?
        ",array($cliente_id))->row_array();

        return $cliente;
    }
        
    /*
     * Get all cliente
     */
    function get_all_cliente()
    {
        $cliente = $this->db->query("
            SELECT
                *

            FROM
                `cliente`

            WHERE
                1 = 1

            ORDER BY `cliente_id` DESC
        ")->result_array();

        return $cliente;
    }
        
    /*
     * function to add new cliente
     */
    function add_cliente($params)
    {
        $this->db->insert('cliente',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update cliente
     */
    function update_cliente($cliente_id,$params)
    {
        $this->db->where('cliente_id',$cliente_id);
        return $this->db->update('cliente',$params);
    }
    
    /*
     * function to delete cliente
     */
    function delete_cliente($cliente_id)
    {
        return $this->db->delete('cliente',array('cliente_id'=>$cliente_id));
    }
}
