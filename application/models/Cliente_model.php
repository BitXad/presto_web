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
     * Get all integrantes
     */
    function get_all_integrantes($grupo_id)
    {
        $sql = "select * from cliente c, integrante i 
                where i.cliente_id = c.cliente_id and 
                i.grupo_id = ".$grupo_id;
        $cliente = $this->db->query($sql)->result_array();
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
    /*
     * Verifica si ya hay un cliente registrado con un nombre y apellido
     */
    function es_cliente_registrado($nombre, $apellido)
    {
        $sql = "SELECT
                      count(c.cliente_id) as resultado
                  FROM
                      cliente c
                 WHERE
                      c.cliente_nombre = '".$nombre."'
                      and c.cliente_apellido = '".$apellido."'";

        $cliente = $this->db->query($sql)->row_array();
        return $cliente['resultado'];
    }
    /*
     * Funcion que busca clientes limitado a 50 clientes
     */
    function get_all_cliente_param($parametro, $categoriaestado, $limit)
    {
        $sql = "SELECT
                c.*, e.estado_color, e.`estado_descripcion`,
                cc.categoria_nombre, concat(a.asesor_nombre, ' ', a.asesor_apellido) as miasesor,
                a.asesor_telefono, a.asesor_celular, a.asesor_foto, ec.estadocivil_nombre
            FROM
                cliente c
            LEFT JOIN estado e on c.estado_id = e.estado_id
            LEFT JOIN categoria cc on c.categoria_id = cc.categoria_id
            LEFT JOIN asesor a on c.asesor_id = a.asesor_id
            LEFT JOIN estado_civil ec on c.estadocivil_id = ec.estadocivil_id
            WHERE
                c.estado_id = e.estado_id
                and(c.cliente_nombre like '%".$parametro."%' or c.cliente_apellido like '%".$parametro."%'
                or c.cliente_codigo like '%".$parametro."%'
                or c.cliente_ci like '%".$parametro."%' or c.cliente_nit like '%".$parametro."%'
                or c.cliente_razon like '%".$parametro."%') 
                ".$categoriaestado."
            GROUP BY
                c.cliente_id
            ORDER By c.cliente_id DESC ".$limit;

        $cliente = $this->db->query($sql)->result_array();
        return $cliente;

    }
}
