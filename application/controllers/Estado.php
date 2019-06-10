<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Estado extends CI_Controller{
    private $session_data = "";
    function __construct()
    {
        parent::__construct();
        $this->load->model('Estado_model');
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
     * Listing of estado
     */
    function index()
    {
        if($this->acceso(8)){
            $data['estado'] = $this->Estado_model->get_all_estado();
            $data['_view'] = 'estado/index';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new estado
     */
    function add()
    {
        if($this->acceso(8)){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('estado_descripcion','Descripción','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            $this->form_validation->set_rules('estado_tipo','Tipo','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            if($this->form_validation->run())     
            {   
                $params = array(
                    'estado_descripcion' => $this->input->post('estado_descripcion'),
                    'estado_tipo' => $this->input->post('estado_tipo'),
                    'estado_color' => $this->input->post('estado_color'),
                );

                $estado_id = $this->Estado_model->add_estado($params);
                redirect('estado');
            }
            else
            {            
                $data['_view'] = 'estado/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }  

    /*
     * Editing a estado
     */
    function edit($estado_id)
    {
        if($this->acceso(8)){
            // check if the estado exists before trying to edit it
            $data['estado'] = $this->Estado_model->get_estado($estado_id);

            if(isset($data['estado']['estado_id']))
            {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('estado_descripcion','Descripción','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                $this->form_validation->set_rules('estado_tipo','Tipo','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                if($this->form_validation->run())     
                {    
                    $params = array(
                        'estado_descripcion' => $this->input->post('estado_descripcion'),
                        'estado_tipo' => $this->input->post('estado_tipo'),
                        'estado_color' => $this->input->post('estado_color'),
                    );

                    $this->Estado_model->update_estado($estado_id,$params);            
                    redirect('estado');
                }
                else
                {
                    $data['_view'] = 'estado/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The estado you are trying to edit does not exist.');
        }
    }
    /*
     * Deleting Estado
     */
    function remove($estado_id)
    {
        if($this->acceso(8)){
            $estado = $this->Estado_model->get_estado($estado_id);
            // check if the programa exists before trying to delete it
            if(isset($estado['estado_id']))
            {
                $this->Estado_model->delete_estado($estado_id);
                redirect('estado');
            }
            else
                show_error('El Estado que intentas eliminar no existe.');
        }
    }
}
