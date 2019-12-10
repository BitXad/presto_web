<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Dashboard_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    

    function get_clientes()
    {
        $clientes = $this->db->query("
            SELECT
                cliente_id

            FROM
                cliente

            WHERE
                estado_id=1

            
        ")->result_array();

        return $clientes;
    }

    function get_creditos()
    {
        $creditos = $this->db->query("
            SELECT
                credito_id

            FROM
                credito

            WHERE
                estado_id=9

            
        ")->result_array();

        return $creditos;
    }

    function get_grupos()
    {
        $grupos = $this->db->query("
            SELECT
                grupo_id

            FROM
                grupo


            
        ")->result_array();

        return $grupos;
    }

    function get_grupos20()
    {
        $grupos = $this->db->query("
            SELECT
                g.*, e.*

            FROM
                grupo g, estado e
            WHERE
                g.estado_id=e.estado_id

            ORDER BY grupo_id ASC limit 20
            
        ")->result_array();

        return $grupos;
    }

    function get_asesores()
    {
        $asesores = $this->db->query("
            SELECT
                asesor_id

            FROM
                asesor

            WHERE
                estado_id=1

            
        ")->result_array();

        return $asesores;
    }
    /*
     * Get dashboard by cliente_dashboardci
     */
    function get_dashboard($cliente_dashboardci)
    {
        $dashboard = $this->db->query("
            SELECT
                *

            FROM
                `dashboard`

            WHERE
                `cliente_dashboardci` = ?
        ",array($cliente_dashboardci))->row_array();

        return $dashboard;
    }
        
    /*
     * Get all dashboard
     */
    function get_all_dashboard()
    {
        $dashboard = $this->db->query("
            SELECT
                *

            FROM
                `dashboard`

            WHERE
                1 = 1

            ORDER BY `cliente_dashboardci` DESC
        ")->result_array();

        return $dashboard;
    }
        
    /*
     * function to add new dashboard
     */
    function add_dashboard($params)
    {
        $this->db->insert('dashboard',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update dashboard
     */
    function update_dashboard($cliente_dashboardci,$params)
    {
        $this->db->where('cliente_dashboardci',$cliente_dashboardci);
        return $this->db->update('dashboard',$params);
    }
    
    /*
     * function to delete dashboard
     */
    function delete_dashboard($cliente_dashboardci)
    {
        return $this->db->delete('dashboard',array('cliente_dashboardci'=>$cliente_dashboardci));
    }
}
