<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Credito_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get credito by credito_id
     */
    function get_credito($credito_id)
    {
        $credito = $this->db->query("
            SELECT
                *

            FROM
                `credito`

            WHERE
                `credito_id` = ?
        ",array($credito_id))->row_array();

        return $credito;
    }
    function buscar_cliente($cliente_ci)
    {

        $sql = "select * from cliente where cliente_ci = ".$cliente_ci;        
        $resultado = $this->db->query($sql)->result_array();
        
        return $resultado;
    } 

    function mostrar_garantias($usuario_id)
    {

        $sql = "select * from garantia_aux where usuario_id = ".$usuario_id;        
        $resultado = $this->db->query($sql)->result_array();
        
        return $resultado;
    } 

    function crear_garantiaaux($cantidad,$descripcion,$precio,$usuario_id)
    {
        $caracteristica = "'".$descripcion."'";
        $sql = "insert into garantia_aux (estado_id,garantia_cantidad,garantia_descripcion,garantia_precio,garantia_total,usuario_id) VALUES (1,".$cantidad.",".$caracteristica.",". $precio.",".$precio * $cantidad.",".$usuario_id.")";     
        $resultado = $this->db->query($sql);
        
        return $resultado;
    } 
    /*
     * Get all credito
     */
    function get_all_credito()
    {
        $credito = $this->db->query("
            SELECT
                *

            FROM
                `credito`

            WHERE
                1 = 1

            ORDER BY `credito_id` DESC
        ")->result_array();

        return $credito;
    }
        
    /*
     * function to add new credito
     */
    function add_credito($params)
    {
        $this->db->insert('credito',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update credito
     */
    function update_credito($credito_id,$params)
    {
        $this->db->where('credito_id',$credito_id);
        return $this->db->update('credito',$params);
    }
    
    /*
     * function to delete credito
     */
    function delete_credito($credito_id)
    {
        return $this->db->delete('credito',array('credito_id'=>$credito_id));
    }
}
