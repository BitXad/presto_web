<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Grupo_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get grupo by grupo_id
     */
    function get_grupo($grupo_id)
    {
        $grupo = $this->db->query("
            SELECT
                *

            FROM
                `grupo`

            WHERE
                `grupo_id` = ?
        ",array($grupo_id))->row_array();

        return $grupo;
    }
        
    /*
     * Get all grupo
     */
    function get_all_grupo()
    {
        $grupo = $this->db->query("
            SELECT
                *

            FROM
                `grupo`

            WHERE
                1 = 1

            ORDER BY `grupo_id` DESC
        ")->result_array();

        return $grupo;
    }
        
    /*
     * Get all grupo
     */
    function get_all_grupos()
    {
        $sql = "select * from grupo g
                left join asesor a on a.asesor_id = g.asesor_id
                left join usuario u on u.usuario_id = g.usuario_id
                left join estado e on e.estado_id = g.estado_id";

        $grupo = $this->db->query($sql)->result_array();
        return $grupo;
    }
        
    /*
     * function to add new grupo
     */
    function add_grupo($params)
    {
        $this->db->insert('grupo',$params);
        return $this->db->insert_id();
    }
    
    /*
     * function to update grupo
     */
    function update_grupo($grupo_id,$params)
    {
        $this->db->where('grupo_id',$grupo_id);
        return $this->db->update('grupo',$params);
    }
    
    /*
     * function to delete grupo
     */
    function delete_grupo($grupo_id)
    {
        return $this->db->delete('grupo',array('grupo_id'=>$grupo_id));
    }
    
    /*
     * funcion para agregar grupo
     */
    function agregar_integrante_grupo($grupo_id, $cliente_id,$integrante_cargo,$integrante_montosolicitado)
    {
        $integrante_fechareg =  date('Y-m-d');
        $integrante_horareg =  date('H-i-s');
                
        $sql = "insert integrante(cliente_id, grupo_id, integrante_fechareg, integrante_horareg,integrante_cargo, integrante_montosolicitado) value(".
                $cliente_id.",".$grupo_id.",'".$integrante_fechareg."','".$integrante_horareg."', '".$integrante_cargo."',".$integrante_montosolicitado.")";
        return $this->db->query($sql);
        
    }
}
