<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Multa extends CI_Controller{
    private $session_data = "";
    function __construct()
    {
        parent::__construct();
        $this->load->model('Multa_model');
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
     * Listing of multa
     */
    function index()
    {
        if($this->acceso(15)){
            $data['multa'] = $this->Multa_model->get_all_multa();

            $data['_view'] = 'multa/index';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new multa
     */
    function add()
    {
        if($this->acceso(15)){
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
                    'reunion_id' => $this->input->post('reunion_id'),
                    'usuario_id' => $this->input->post('usuario_id'),
                    'multa_monto' => $this->input->post('multa_monto'),
                    'multa_fecha' => $this->input->post('multa_fecha'),
                    'multa_hora' => $this->input->post('multa_hora'),
                    'multa_detalle' => $this->input->post('multa_detalle'),
                    'multa_numrec' => $this->input->post('multa_numrec'),
                );
                $multa_id = $this->Multa_model->add_multa($params);
                redirect('multa/index');
            }
            else
            {
                $this->load->model('Reunion_model');
                $data['all_reunion'] = $this->Reunion_model->get_all_reunion();

                $this->load->model('Usuario_model');
                $data['all_usuario'] = $this->Usuario_model->get_all_usuario();

                $data['_view'] = 'multa/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }  

    /*
     * Editing a multa
     */
    function edit($multa_id)
    {
        if($this->acceso(15)){
            // check if the multa exists before trying to edit it
            $data['multa'] = $this->Multa_model->get_multa($multa_id);

            if(isset($data['multa']['multa_id']))
            {
                if(isset($_POST) && count($_POST) > 0)     
                {   
                    $params = array(
                        'reunion_id' => $this->input->post('reunion_id'),
                        'usuario_id' => $this->input->post('usuario_id'),
                        'multa_monto' => $this->input->post('multa_monto'),
                        'multa_fecha' => $this->input->post('multa_fecha'),
                        'multa_hora' => $this->input->post('multa_hora'),
                        'multa_detalle' => $this->input->post('multa_detalle'),
                        'multa_numrec' => $this->input->post('multa_numrec'),
                    );

                    $this->Multa_model->update_multa($multa_id,$params);            
                    redirect('multa/index');
                }
                else
                {
                    $this->load->model('Reunion_model');
                    $data['all_reunion'] = $this->Reunion_model->get_all_reunion();

                    $this->load->model('Usuario_model');
                    $data['all_usuario'] = $this->Usuario_model->get_all_usuario();

                    $data['_view'] = 'multa/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The multa you are trying to edit does not exist.');
        }
    }

    /*
     * Deleting multa
     */
    function remove($multa_id)
    {
        if($this->acceso(15)){
            $multa = $this->Multa_model->get_multa($multa_id);

            // check if the multa exists before trying to delete it
            if(isset($multa['multa_id']))
            {
                $this->Multa_model->delete_multa($multa_id);
                redirect('multa/index');
            }
            else
                show_error('The multa you are trying to delete does not exist.');
        }
    }
    function mismultas($cliente_id)
    {
        if($this->acceso(15)){
            // check if the multa exists before trying to edit it
            $data['multas'] = $this->Multa_model->get_all_multa_fromcliente($cliente_id);
                /*if(isset($_POST) && count($_POST) > 0)     
                {   
                    $params = array(
                        'reunion_id' => $this->input->post('reunion_id'),
                        'usuario_id' => $this->input->post('usuario_id'),
                        'multa_monto' => $this->input->post('multa_monto'),
                        'multa_fecha' => $this->input->post('multa_fecha'),
                        'multa_hora' => $this->input->post('multa_hora'),
                        'multa_detalle' => $this->input->post('multa_detalle'),
                        'multa_numrec' => $this->input->post('multa_numrec'),
                    );

                    $this->Multa_model->update_multa($multa_id,$params);            
                    redirect('multa/mismultas');
                }
                else
                {*/
            /*
                    $this->load->model('Reunion_model');
                    $data['all_reunion'] = $this->Reunion_model->get_all_reunion();

                    $this->load->model('Usuario_model');
                    $data['all_usuario'] = $this->Usuario_model->get_all_usuario();
                    */
            $data['_view'] = 'multa/mismultas';
            $this->load->view('layouts/main',$data);
               // }
        }
    }
    
}
