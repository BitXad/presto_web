<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Garantia extends CI_Controller{
    private $session_data = "";
    function __construct()
    {
        parent::__construct();
        $this->load->model('Garantia_model');
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
     * Listing of garantia
     */
    function index()
    {
        if($this->acceso(12)){
            $data['garantia'] = $this->Garantia_model->get_all_garantia();

            $data['_view'] = 'garantia/index';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new garantia
     */
    function add()
    {
        if($this->acceso(12)){
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
                    'estado_id' => $this->input->post('estado_id'),
                    'garantia_descripcion' => $this->input->post('garantia_descripcion'),
                    'garantia_codigo' => $this->input->post('garantia_codigo'),
                    'garantia_cantidad' => $this->input->post('garantia_cantidad'),
                    'garantia_precio' => $this->input->post('garantia_precio'),
                    'garantia_observacion' => $this->input->post('garantia_observacion'),
                );

                $garantia_id = $this->Garantia_model->add_garantia($params);
                redirect('garantia/index');
            }
            else
            {
                $this->load->model('Estado_model');
                $data['all_estado'] = $this->Estado_model->get_all_estado();

                $data['_view'] = 'garantia/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }  

    /*
     * Editing a garantia
     */
    function edit($garantia_id)
    {
        if($this->acceso(12)){
            // check if the garantia exists before trying to edit it
            $data['garantia'] = $this->Garantia_model->get_garantia($garantia_id);
            if(isset($data['garantia']['garantia_id']))
            {
                if(isset($_POST) && count($_POST) > 0)     
                {   
                    $params = array(
                        'estado_id' => $this->input->post('estado_id'),
                        'garantia_descripcion' => $this->input->post('garantia_descripcion'),
                        'garantia_codigo' => $this->input->post('garantia_codigo'),
                        'garantia_cantidad' => $this->input->post('garantia_cantidad'),
                        'garantia_precio' => $this->input->post('garantia_precio'),
                        'garantia_observacion' => $this->input->post('garantia_observacion'),
                    );

                    $this->Garantia_model->update_garantia($garantia_id,$params);            
                    redirect('garantia/index');
                }
                else
                {
                    $this->load->model('Estado_model');
                    $data['all_estado'] = $this->Estado_model->get_all_estado();

                    $data['_view'] = 'garantia/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The garantia you are trying to edit does not exist.');
        }
    } 

    /*
     * Deleting garantia
     */
    function remove($garantia_id)
    {
        if($this->acceso(12)){
            $garantia = $this->Garantia_model->get_garantia($garantia_id);
            // check if the garantia exists before trying to delete it
            if(isset($garantia['garantia_id']))
            {
                $this->Garantia_model->delete_garantia($garantia_id);
                redirect('garantia/index');
            }
            else
                show_error('The garantia you are trying to delete does not exist.');
        }
    }
    
    /* * añadir nueva garantia */
    function registrargarantia()
    {
        //if($this->acceso(103)) {
            if ($this->input->is_ajax_request()) {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('descripcion','Descripcion','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                $this->form_validation->set_rules('cantidad','Cantidad','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                $this->form_validation->set_rules('precio','Precio','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                if($this->form_validation->run())     
                {
                    $estado = 1;
                    $params = array(
                        'estado_id'     => $estado,
                        'integrante_id' => $this->input->post('integrante_id'),
                        'garantia_descripcion' => $this->input->post('descripcion'),
                        'garantia_cantidad'    => $this->input->post('cantidad'),
                        'garantia_precio'      => $this->input->post('precio'),
                        'garantia_total'       => $this->input->post('total'),
                        'garantia_observacion' => $this->input->post('observacion'),
                    );
                    $garantia_id = $this->Garantia_model->add_garantia($params);
                    echo json_encode("ok");
                }else{
                    echo json_encode(null);
                }
            }else{                 
                show_404();
            }
        //}
    }

    /* * get garatias de un integrante */
    function get_garantiaintegrante()
    {
        //if($this->acceso(103)) {
            if ($this->input->is_ajax_request()) {
                $integrante_id = $this->input->post('integrante_id');
                $datos = $this->Garantia_model->get_allgarantiaintegrante($integrante_id);
                echo json_encode($datos);
            }else{                 
                show_404();
            }
        //}
    }
    
}

