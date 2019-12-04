<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Grupo extends CI_Controller{
    private $session_data = "";
    function __construct()
    {
        parent::__construct();
        $this->load->model('Grupo_model');
        $this->load->model('Integrante_model');
        if ($this->session->userdata('logged_in')) {
            $this->session_data = $this->session->userdata('logged_in');
        }else {
            redirect('', 'refresh');
        }
    }
    /* *****Funcion que verifica el acceso al sistema**** */
    private function acceso($id_rol){
        $rolusuario = $this->session_data['rol'];
        if($rolusuario[$id_rol-1]['rolusuario_asignado'] == 1){
            return true;
        }else{
            $data['_view'] = 'login/mensajeacceso';
            $this->load->view('layouts/main',$data);
        }
    }
    /*
     * Listing of grupo
     */
    function index()
    {
        if($this->acceso(13)){
            date_default_timezone_set("America/La_Paz");
            $tipousuario_id  = $this->session_data['tipousuario_id'];
            if($tipousuario_id == 3){
                $usuario_id  = $this->session_data['usuario_id'];
                
                $this->load->model('Asesor_model');
                $asesor_id = $this->Asesor_model->get_asesorusuario($usuario_id);
                $data['grupo'] = $this->Grupo_model->get_all_gruposasesor($asesor_id);
            }else{
                $data['grupo'] = $this->Grupo_model->get_all_grupos();
            }

            $data['_view'] = 'grupo/index';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new grupo
     */
    function add()
    {
        if($this->acceso(13)){
            $usuario_id  = $this->session_data['usuario_id'];
            $estado_id = 4;
            if(isset($_POST) && count($_POST) > 0)     
            {
                date_default_timezone_set('America/La_Paz');
                $grupo_fechahora = date("Y-m-d H:i:s");
                $params = array(
                    'asesor_id' => $this->input->post('asesor_id'),
                    'usuario_id' => $usuario_id,
                    'estado_id' => $estado_id,
                    'grupo_fecha' => $this->input->post('grupo_fecha'),
                    'grupo_hora' => $this->input->post('grupo_hora'),
                    'grupo_nombre' => $this->input->post('grupo_nombre'),
                    'grupo_codigo' => $this->input->post('grupo_codigo'),
                    'grupo_iniciosolicitud' => $this->input->post('grupo_iniciosolicitud'),
                    'grupo_monto' => $this->input->post('grupo_monto'),
                    'grupo_integrantes' => $this->input->post('grupo_integrantes'),
                    'grupo_departamento' => $this->input->post('grupo_departamento'),
                    'grupo_municipio' => $this->input->post('grupo_municipio'),
                    'grupo_provincia' => $this->input->post('grupo_provincia'),
                    'grupo_zona' => $this->input->post('grupo_zona'),
                    'grupo_fechahora' => $grupo_fechahora,
                    'grupo_multaretraso' => $this->input->post('grupo_multaretraso'),
                    'grupo_multaenvio' => $this->input->post('grupo_multaenvio'),
                    'grupo_numlicencia' => $this->input->post('grupo_numlicencia'),
                    'grupo_multafalta' => $this->input->post('grupo_multafalta'),
                    'grupo_multamora' => $this->input->post('grupo_multamora'),
                    'grupo_diareunion' => $this->input->post('grupo_diareunion'),
                    'grupo_horareunion' => $this->input->post('grupo_horareunion'),
                    'grupo_tiemporeunion' => $this->input->post('grupo_tiemporeunion'),
                    'grupo_multaretrasodetalle' => $this->input->post('grupo_multaretrasodetalle'),
                    'grupo_tiempotolerancia' => $this->input->post('grupo_tiempotolerancia'),
                    'grupo_ciclo' => 1,
                );

                $grupo_id = $this->Grupo_model->add_grupo($params);
                //redirect('grupo/index');
                redirect('grupo/integrantes/'.$grupo_id);
            }
            else
            {
                $data['tipousuario_id']  = $this->session_data['tipousuario_id'];
                $data['usuario_id']  = $this->session_data['usuario_id'];
                $this->load->model('Asesor_model');
                $data['all_asesor'] = $this->Asesor_model->get_all_asesoractivo();

                $this->load->model('Usuario_model');
                $data['all_usuario'] = $this->Usuario_model->get_all_usuario();

                $this->load->model('Estado_model');
                $data['all_estado'] = $this->Estado_model->get_all_estado();

                $data['_view'] = 'grupo/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }  

    /*
     * Editing a grupo
     */
    function edit($grupo_id)
    {
        if($this->acceso(13)){
            // check if the grupo exists before trying to edit it
            $data['grupo'] = $this->Grupo_model->get_grupo($grupo_id);

            if(isset($data['grupo']['grupo_id']))
            {
                if(isset($_POST) && count($_POST) > 0)     
                {
                    $params = array(
                        'asesor_id' => $this->input->post('asesor_id'),
                        'usuario_id' => $this->input->post('usuario_id'),
                        'estado_id' => $this->input->post('estado_id'),
                        'grupo_fecha' => $this->input->post('grupo_fecha'),
                        'grupo_hora' => $this->input->post('grupo_hora'),
                        'grupo_nombre' => $this->input->post('grupo_nombre'),
                        'grupo_codigo' => $this->input->post('grupo_codigo'),
                        'grupo_iniciosolicitud' => $this->input->post('grupo_iniciosolicitud'),
                        'grupo_monto' => $this->input->post('grupo_monto'),
                        'grupo_integrantes' => $this->input->post('grupo_integrantes'),
                        'grupo_departamento' => $this->input->post('grupo_departamento'),
                        'grupo_municipio' => $this->input->post('grupo_municipio'),
                        'grupo_provincia' => $this->input->post('grupo_provincia'),
                        'grupo_zona' => $this->input->post('grupo_zona'),
                        //'grupo_fechahora' => $this->input->post('grupo_fechahora'),
                        'grupo_multaretraso' => $this->input->post('grupo_multaretraso'),
                        'grupo_multaenvio' => $this->input->post('grupo_multaenvio'),
                        'grupo_numlicencia' => $this->input->post('grupo_numlicencia'),
                        'grupo_multafalta' => $this->input->post('grupo_multafalta'),
                        'grupo_multamora' => $this->input->post('grupo_multamora'),
                        'grupo_diareunion' => $this->input->post('grupo_diareunion'),
                        'grupo_horareunion' => $this->input->post('grupo_horareunion'),
                        'grupo_tiemporeunion' => $this->input->post('grupo_tiemporeunion'),
                        'grupo_multaretrasodetalle' => $this->input->post('grupo_multaretrasodetalle'),
                        'grupo_tiempotolerancia' => $this->input->post('grupo_tiempotolerancia'),
                        'grupo_ciclo' => $this->input->post('grupo_ciclo'),
                    );

                    $this->Grupo_model->update_grupo($grupo_id,$params);            
                    redirect('grupo/index');
                }
                else
                {
                    $this->load->model('Asesor_model');
                    $data['all_asesor'] = $this->Asesor_model->get_all_asesor();

                    $this->load->model('Usuario_model');
                    $data['all_usuario'] = $this->Usuario_model->get_all_usuario();

                    $this->load->model('Estado_model');
                    $data['all_estado'] = $this->Estado_model->get_all_estado();

                    $data['_view'] = 'grupo/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The grupo you are trying to edit does not exist.');
        }
    } 
    /*
     * Editing a grupo
     */
    function integrantes($grupo_id)
    {
        if($this->acceso(13)){
            // check if the grupo exists before trying to edit it
            $data['grupo'] = $this->Grupo_model->get_grupo($grupo_id);

            if(isset($data['grupo']['grupo_id']))
            {
                if(isset($_POST) && count($_POST) > 0)     
                {   
                    $params = array(
                        'asesor_id' => $this->input->post('asesor_id'),
                        'usuario_id' => $this->input->post('usuario_id'),
                        'estado_id' => $this->input->post('estado_id'),
                        'grupo_fecha' => $this->input->post('grupo_fecha'),
                        'grupo_hora' => $this->input->post('grupo_hora'),
                        'grupo_nombre' => $this->input->post('grupo_nombre'),
                        'grupo_codigo' => $this->input->post('grupo_codigo'),
                        'grupo_iniciosolicitud' => $this->input->post('grupo_iniciosolicitud'),
                        'grupo_monto' => $this->input->post('grupo_monto'),
                        'grupo_integrantes' => $this->input->post('grupo_integrantes'),
                    );

                    $this->Grupo_model->update_grupo($grupo_id,$params);            
                    redirect('grupo/index');
                }
                else
                {
                    //$this->load->model('Grupo_model');
                    $data['grupo'] = $this->Grupo_model->get_grupo($grupo_id);

                    $this->load->model('Cliente_model');
                    $data['all_cliente'] = $this->Cliente_model->get_all_clientelibres();

                    $this->load->model('Cliente_model');
                    $data['integrantes'] = $this->Cliente_model->get_all_integrantes($grupo_id);
    //
    //              $this->load->model('Estado_model');
    //              $data['all_estado'] = $this->Estado_model->get_all_estado();

                    $data['_view'] = 'grupo/integrantes';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The grupo you are trying to edit does not exist.');
        }
    } 

    /*
     * Deleting grupo
     */
    function remove($grupo_id)
    {
        if($this->acceso(13)){
            $grupo = $this->Grupo_model->get_grupo($grupo_id);
            // check if the grupo exists before trying to delete it
            if(isset($grupo['grupo_id']) && $grupo['estado_id']<=5)
            {
                $this->Grupo_model->delete_grupo($grupo_id);
                $this->Grupo_model->delete_integrantes($grupo_id);
                redirect('grupo/index');
            }
            else
                show_error('The grupo you are trying to delete does not exist.');
        }
    }

    /*
     * Agregando integrantes al grupo JSON
     */
    function agregar_integrante()
    {
        //if($this->acceso(13)){
            if ($this->input->is_ajax_request()) {
                //$this->load->model('Cliente_model');
                
                $this->load->library('form_validation');
                $this->form_validation->set_rules('cliente_id','Cliente','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                $this->form_validation->set_rules('integrante_monto','Monto','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                if($this->form_validation->run())
                {
                    $cliente_id = $this->input->post('cliente_id');
                    $integrante_cargo = $this->input->post('integrante_cargo');
                    $integrante_monto = $this->input->post('integrante_monto');
                    $grupo_id    = $this->input->post('grupo_id');
                    $grupo_monto = $this->input->post('grupo_monto');
                    $origen = $this->input->post('origen');

                    $monto_maximo = $this->Integrante_model->get_monto_maximo($cliente_id);
                    
                    
                    $this_grupo = $this->Grupo_model->get_grupo($grupo_id);
                    //$this->load->model('Cliente_model');
                    
                    $num_integrantes = $this->Integrante_model->get_numintegrantes_grupo($grupo_id);
                    
                    $existe_integrante = $this->Integrante_model->get_existeintegrante($grupo_id, $cliente_id);
                    if($existe_integrante == 0){
                        $num_integrantes = $this->Integrante_model->get_numintegrantes_grupo($grupo_id);
                        if($num_integrantes < $this_grupo['grupo_integrantes']){
                            $suma_monto = $this->Integrante_model->get_montototal_grupo($grupo_id);
                            $totalmonto = $suma_monto+$integrante_monto;
                            if(($suma_monto+$integrante_monto) <= $grupo_monto){
                              //   comprara con el monto maximo del cliente
                              if ($integrante_monto <= $monto_maximo+1500) {
                             
                                $integrante_fechareg =  date('Y-m-d');
                                $integrante_horareg =  date('H-i-s');
                                $params = array(
                                        'cliente_id' => $cliente_id,
                                        'grupo_id'   => $grupo_id,
                                        'integrante_fechareg' => $integrante_fechareg,
                                        'integrante_horareg'  => $integrante_horareg,
                                        'integrante_cargo'    => $integrante_cargo,
                                        'integrante_montosolicitado' => $integrante_monto,
                                        );
                                $integrante_id = $this->Integrante_model->add_integrante($params);
                                
                                //$datos = $this->Cliente_model->get_all_integrantes($grupo_id);
                                echo json_encode("ok");
                              }else{
                                 echo json_encode("monto_maximos");
                              }
                            }else{
                                echo json_encode("monto_excedido");
                            }
                        }else{
                            echo json_encode("grupo_lleno");
                        }
                    }else{
                        echo json_encode("existe_integrante");
                    }
                }else{
                    echo json_encode(null);
                }
            }
            else
            {                 
                show_404();
            }
        /*
            $grupo_id = $this->input->post('grupo_id');
            $cliente_id = $this->input->post('cliente_id');
            $integrante_cargo = $this->input->post('integrante_cargo');
            $integrante_montosolicitado = $this->input->post('integrante_monto');

            // check if the grupo exists before trying to delete it
            $this->Grupo_model->agregar_integrante_grupo($grupo_id,$cliente_id,$integrante_cargo,$integrante_montosolicitado);
            redirect('grupo/integrantes/'.$grupo_id);*/
        //}
    }
    
    /*
     * Mostrar integrantes de un grupo
     */
    function buscar_integrantes($grupo_id)
    {
        $this->load->model('Grupo_model');
        $integrantes = $this->Grupo_model->get_integrantes_grupo($grupo_id);
        echo json_encode($integrantes);
    
    }
    
    /* * añadir nuevo cliente */
    function aniadir_newcliente()
    {
        //if($this->acceso(103)) {
            if ($this->input->is_ajax_request()) {
                $this->load->model('Cliente_model');
                $cliente_nombre = $this->input->post('cliente_nombre');
                $cliente_apellido = $this->input->post('cliente_apellido');
                $resultado = $this->Cliente_model->es_cliente_registrado($cliente_nombre, $cliente_apellido);
                
                $this->load->library('form_validation');
                $this->form_validation->set_rules('cliente_nombre','Nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                $this->form_validation->set_rules('cliente_apellido','Apellido','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                $this->form_validation->set_rules('integrante_monto1','Monto','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                if($this->form_validation->run())     
                {
                    $estado_id = 1;
                    $categoria_id = 0;
                    $subnombre = substr($cliente_nombre,0,2);
                    $subapellido = substr($cliente_apellido,-1,1);
                    $time = time();
                    $rand = rand (1000,9999);
                    $cad1 = $rand*$time;
                    $cad2 = substr($cad1,0,3);
                    $cad = $subnombre.$subapellido.$cad2;
                    if($resultado == 0){
                        $params = array(
                        'estado_id' => $estado_id,
                        'categoria_id' => $categoria_id,
                        'cliente_nombre' => $cliente_nombre,
                        'cliente_apellido' => $cliente_apellido,
                        'cliente_codigo' => $cad,
                        'cliente_montomax' => 500,

                        );
                        $cliente_id = $this->Cliente_model->add_cliente($params);
                        $datos = $this->Cliente_model->get_cliente($cliente_id);
                        echo json_encode($datos);
                    }else{
                        echo json_encode("existe");
                    }
                }else{
                    echo json_encode(null);
                }
            }
            else
            {                 
                show_404();
            }
        //}
    }
    
    /*
     * Adding a new grupo
     */
    function add_new($grupo_id)
    {
        //if($this->acceso(13)){
            $usuario_id = 1;
            $estado_id = 4;
            $this_grupo = $this->Grupo_model->get_grupo($grupo_id);
            $sql = "UPDATE grupo SET estado_id=14 WHERE grupo_id=".$grupo_id." ";
            $this->db->query($sql);
            date_default_timezone_set('America/La_Paz');
            $grupo_fechahora = date("Y-m-d H:i:s");
            $cod1 = substr($this_grupo['grupo_codigo'], 0, 3);
            $cod2 = date("ymdi");
            
            $params = array(
                'asesor_id' => $this_grupo['asesor_id'],
                'usuario_id' => $usuario_id,
                'estado_id' => $estado_id,
                'grupo_fecha' => $this_grupo['grupo_fecha'],
                'grupo_hora' => $this_grupo['grupo_hora'],
                'grupo_nombre' => $this_grupo['grupo_nombre'],
                'grupo_codigo' => $cod1.$cod2,
                'grupo_iniciosolicitud' => $this_grupo['grupo_iniciosolicitud'],
                'grupo_monto' => $this_grupo['grupo_monto'],
                'grupo_integrantes' => $this_grupo['grupo_integrantes'],
                'grupo_departamento' => $this_grupo['grupo_departamento'],
                'grupo_municipio' => $this_grupo['grupo_municipio'],
                'grupo_provincia' => $this_grupo['grupo_provincia'],
                'grupo_zona' => $this_grupo['grupo_zona'],
                'grupo_fechahora' => $grupo_fechahora,
                'grupo_multaretraso' => $this_grupo['grupo_multaretraso'],
                'grupo_multaenvio' => $this_grupo['grupo_multaenvio'],
                'grupo_numlicencia' => $this_grupo['grupo_numlicencia'],
                'grupo_multafalta' => $this_grupo['grupo_multafalta'],
                'grupo_multamora' => $this_grupo['grupo_multamora'],
                'grupo_diareunion' => $this_grupo['grupo_diareunion'],
                'grupo_horareunion' => $this_grupo['grupo_horareunion'],
                'grupo_tiemporeunion' => $this_grupo['grupo_tiemporeunion'],
                'grupo_multaretrasodetalle' => $this_grupo['grupo_multaretrasodetalle'],
                'grupo_tiempotolerancia' => $this_grupo['grupo_tiempotolerancia'],
                'grupo_ciclo' => $this_grupo['grupo_ciclo']+1,
            );

            $grupo_idnew = $this->Grupo_model->add_grupo($params);
            $integrantes = $this->Grupo_model->get_integrantes_grupo($grupo_id);
            foreach ($integrantes as $integrante) {
                $param = array(
                    'cliente_id' => $integrante['cliente_id'],
                    'tipointeg_id' => $integrante['tipointeg_id'],
                    //'garantia_id' => $integrante['garantia_id'],
                    'grupo_id' => $grupo_idnew,
                    'integrante_fechareg' => $integrante['integrante_fechareg'],
                    'integrante_horareg' => $integrante['integrante_horareg'],
                    'integrante_cargo' => $integrante['integrante_cargo'],
                    'integrante_montosolicitado' => $integrante['integrante_montosolicitado'],
                );
                $this->load->model('Integrante_model');
                $integrante_id = $this->Integrante_model->add_integrante($param);
            }
            //redirect('grupo/index');
            redirect('grupo/integrantes/'.$grupo_idnew);
        //}
    }
}
