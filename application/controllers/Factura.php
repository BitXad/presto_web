<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Factura extends CI_Controller{
    private $session_data = "";
    function __construct()
    {
        parent::__construct();
        $this->load->model('Factura_model');
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
     * Listing of factura
     */
    function index()
    {
        if($this->acceso(10)){
            $data['factura'] = $this->Factura_model->get_all_factura();

            $data['_view'] = 'factura/index';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new factura
     */
    function add()
    {
        if($this->acceso(10)){
            if(isset($_POST) && count($_POST) > 0)     
            {
                $params = array(
                    'usuario_id' => $this->input->post('usuario_id'),
                    'cuota_id' => $this->input->post('cuota_id'),
                );

                $factura_id = $this->Factura_model->add_factura($params);
                redirect('factura/index');
            }
            else
            {            
                $data['_view'] = 'factura/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }  

    /*
     * Editing a factura
     */
    function edit($factura_id)
    {
        if($this->acceso(10)){
            // check if the factura exists before trying to edit it
            $data['factura'] = $this->Factura_model->get_factura($factura_id);

            if(isset($data['factura']['factura_id']))
            {
                if(isset($_POST) && count($_POST) > 0)     
                {   
                    $params = array(
                        'usuario_id' => $this->input->post('usuario_id'),
                        'cuota_id' => $this->input->post('cuota_id'),
                    );

                    $this->Factura_model->update_factura($factura_id,$params);            
                    redirect('factura/index');
                }
                else
                {
                    $data['_view'] = 'factura/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The factura you are trying to edit does not exist.');
        }
    } 

    /*
     * Deleting factura
     */
    function remove($factura_id)
    {
        if($this->acceso(10)){
            $factura = $this->Factura_model->get_factura($factura_id);

            // check if the factura exists before trying to delete it
            if(isset($factura['factura_id']))
            {
                $this->Factura_model->delete_factura($factura_id);
                redirect('factura/index');
            }
            else
                show_error('The factura you are trying to delete does not exist.');
        }
    }
    
}
