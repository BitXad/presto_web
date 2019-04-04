<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Reunion extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Reunion_model');
    } 

    /*
     * Listing of reunion
     */
    function index()
    {
        $data['reunion'] = $this->Reunion_model->get_all_reunion();
        
        $data['_view'] = 'reunion/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new reunion
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'grupo_id' => $this->input->post('grupo_id'),
				'reunion_fecha' => $this->input->post('reunion_fecha'),
				'reunion_hora' => $this->input->post('reunion_hora'),
            );
            
            $reunion_id = $this->Reunion_model->add_reunion($params);
            redirect('reunion/index');
        }
        else
        {
			$this->load->model('Grupo_model');
			$data['all_grupo'] = $this->Grupo_model->get_all_grupo();
            
            $data['_view'] = 'reunion/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a reunion
     */
    function edit($reunion_id)
    {   
        // check if the reunion exists before trying to edit it
        $data['reunion'] = $this->Reunion_model->get_reunion($reunion_id);
        
        if(isset($data['reunion']['reunion_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'grupo_id' => $this->input->post('grupo_id'),
					'reunion_fecha' => $this->input->post('reunion_fecha'),
					'reunion_hora' => $this->input->post('reunion_hora'),
                );

                $this->Reunion_model->update_reunion($reunion_id,$params);            
                redirect('reunion/index');
            }
            else
            {
				$this->load->model('Grupo_model');
				$data['all_grupo'] = $this->Grupo_model->get_all_grupo();

                $data['_view'] = 'reunion/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The reunion you are trying to edit does not exist.');
    } 

    /*
     * Deleting reunion
     */
    function remove($reunion_id)
    {
        $reunion = $this->Reunion_model->get_reunion($reunion_id);

        // check if the reunion exists before trying to delete it
        if(isset($reunion['reunion_id']))
        {
            $this->Reunion_model->delete_reunion($reunion_id);
            redirect('reunion/index');
        }
        else
            show_error('The reunion you are trying to delete does not exist.');
    }
    /* Genera la asistencia a una reunion!!*/
    function genasistencia($reunion_id)
    {
        $integrantes = $this->Reunion_model->get_idintegrantes($reunion_id);
        $existe = $this->Reunion_model->registrado_ya_asistencia($reunion_id, $integrantes[0]['integrante_id']);
        $res = count($existe);
        if($res<=0){
            foreach ($integrantes as $integrante) {
                $params = array(
                    'reunion_id' => $reunion_id,
                    'integrante_id' => $integrante['integrante_id'],
                    'asistencia_pagado' => '0',
                    'asistencia_ahorro' => '0',
                    'asistencia_retraso' => '0',
                    'asistencia_falta' => '0',
                );
                 $this->load->model('Asistencia_model');
                $this->Asistencia_model->add_asistencia($params);
            }
        }
       redirect('reunion/lareunion/'.$reunion_id);
    }
    /* Reunion de un grupo; agarra el ID de una reunion!!*/
    function lareunion($reunion_id)
    {
        //$reunion_id = 1;
        $data['reunion'] = $this->Reunion_model->get_this_reunion($reunion_id);
       // $data['all_clientes'] = $this->Reunion_model->get_this_clientesgrupo($data['reunion']['grupo_id']);
        
        $data['_view'] = 'reunion/lareunion';
        $this->load->view('layouts/main',$data);
    }
    /*
     * registra una reunion
     */
    function registrareunion()
    {
        if(isset($_POST) && count($_POST) > 0)     
        {
            $multa_monto = 0;
            $multa_detalle = "";
            $usuario_id =1;
            $num_clientes = $this->input->post('numclientes');
            $reunion_id = $this->input->post('idreunion_id');
            $multa_fecha = date("Y-m-d");
            $multa_hora = date("H:i:s");
            $multa_numrec = 0;
            //$observacion = "";
            for ($cont = 0; $cont < $num_clientes; $cont++) {
                $integrante_id = $this->input->post('integrante_id'.$cont);
                $retraso = $this->input->post('retraso'.$cont);
                $falta   = $this->input->post('falta'.$cont);
                //$observacion   = $this->input->post('observacion'.$cont);
               /* if(isset($retraso)){
                    $multa_monto = $retraso;
                    $multa_detalle = "Retraso";
                    $multa_numrec = $this->input->post('multa_numrecr'.$cont);
                    $params = array(
                        'reunion_id' => $reunion_id,
                        'usuario_id' => $usuario_id,
                        'multa_monto' => $multa_monto,
                        'multa_fecha' => $multa_fecha,
                        'multa_hora' => $multa_hora,
                        'multa_detalle' => $multa_detalle,
                        'multa_numrec' => $multa_numrec,
                );
                $this->load->model('Multa_model');
                $multa_id = $this->Multa_model->add_multa($params);
                }elseif(isset($falta)){
                    $multa_monto = $falta;
                    $multa_detalle = "Falta";
                    $multa_numrec = $this->input->post('multa_numrecf'.$cont);
                    $params = array(
                        'reunion_id' => $reunion_id,
                        'usuario_id' => $usuario_id,
                        'multa_monto' => $multa_monto,
                        'multa_fecha' => $multa_fecha,
                        'multa_hora' => $multa_hora,
                        'multa_detalle' => $multa_detalle,
                        'multa_numrec' => $multa_numrec,
                );
                $this->load->model('Multa_model');
                $multa_id = $this->Multa_model->add_multa($params);
                } */
                
                $param = array(
                        'asistencia_pagado' => $this->input->post('asistencia_pagado'.$cont),
                        'asistencia_ahorro' => $this->input->post('asistencia_ahorro'.$cont),
                        'asistencia_retraso' => $this->input->post('asistencia_retraso'.$cont),
                        'asistencia_falta' => $this->input->post('asistencia_falta'.$cont),
                        'asistencia_recibor' => $this->input->post('asistencia_recibor'.$cont),
                        'asistencia_recibof' => $this->input->post('asistencia_recibof'.$cont),
                        'asistencia_observacion' => $this->input->post('observacion'.$cont),
                );
                $this->load->model('Asistencia_model');
                $this->Asistencia_model->update_this_asistencia($integrante_id, $reunion_id, $param);
            }
            redirect('reunion');
        }
        else
        {
			$this->load->model('Grupo_model');
			$data['all_grupo'] = $this->Grupo_model->get_all_grupo();
            
            $data['_view'] = 'reunion/add';
            $this->load->view('layouts/main',$data);
        }
    }
    /*
    * buscar clientes limite 50
    */
    function registrar_asistencia()
    {
        if ($this->input->is_ajax_request())
        {
            $this->load->model('Asistencia_model');
            
            $asistencia = $this->input->post('asistencia');
            $integrante_id = $this->input->post('integrante_id');
            $reunion_id = $this->input->post('reunion_id');
            $asistencia_id = $this->Asistencia_model->get_this_asistencia($integrante_id, $reunion_id);
            $reunion_fecha = date("Y-m-d");
            $reunion_hora = date("H:i:s");
            if($asistencia_id >0){
                $params = array(
                                'asistencia_fecha' => $reunion_fecha,
                                'asistencia_hora' => $reunion_hora,
                                'asistencia_registro' => $asistencia,
                                'asistencia_observacion' => $this->input->post('asistencia_observacion'),
                );
                $this->Asistencia_model->update_asistencia($asistencia_id, $params);
            }else{
                $params = array(
                                'reunion_id' => $reunion_id,
                                'integrante_id' => $integrante_id,
                                'asistencia_fecha' => $reunion_fecha,
                                'asistencia_hora' => $reunion_hora,
                                'asistencia_registro' => $asistencia,
                                'asistencia_observacion' => $this->input->post('asistencia_observacion'),
                );

                $asistencia_id = $this->Asistencia_model->add_asistencia($params);
            }
            $datos = "ok";
            echo json_encode($datos);
        }
        else
        {                 
            show_404();
        }
        
    }
    /*
    * get REUNION
    */
    function getreunion()
    {
        if ($this->input->is_ajax_request())
        {
            $reunion_id = $this->input->post('reunion_id');
            $grupo_id = $this->input->post('grupo_id');
            
            //$data['reunion'] = $this->Reunion_model->get_this_reunion($reunion_id);
            $datos = $this->Reunion_model->get_this_clientesgrupo($reunion_id, $grupo_id);
            
            echo json_encode($datos);
        }
        else
        {                 
            show_404();
        }
        
    }
    /* Reunion de un grupo; agarra el ID de una reunion!!*/
    function lareunionprint($reunion_id)
    {
        $data['reunion'] = $this->Reunion_model->get_this_reunion($reunion_id);
        if(isset($data['reunion']['reunion_id']))
        {
            $data['_view'] = 'reunion/lareunionprint';
            $this->load->view('layouts/main',$data);
        }else{ echo "La reunión que intenta imorimir no existe!.";}
    }
}
