<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Galeria_cliente extends CI_Controller{
    private $session_data = "";
    function __construct()
    {
        parent::__construct();
        $this->load->model('Galeria_cliente_model');
        $this->load->model('Cliente_model');
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
     * Listing of galeria_cliente
     */
    function index($cliente_id)
    {
        if($this->acceso(4)){
            $data['galeria_cliente'] = $this->Galeria_cliente_model->get_all_galeria_cliente($cliente_id);
            $data['cliente'] = $this->Cliente_model->get_cliente($cliente_id);
            $data['_view'] = 'galeria_cliente/index';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new galeria_cliente
     */
    function add($cliente_id)
    {
        if($this->acceso(4)){
            $this->load->library('form_validation');
            
                $foto="";
                    if (!empty($_FILES['galeria_imagen']['name'])){
                            $this->load->library('image_lib');
                            $config['upload_path'] = './resources/images/clientes/';
                            $img_full_path = $config['upload_path'];

                            $config['allowed_types'] = 'gif|jpeg|jpg|png';
                            $config['max_size'] = 0;
                            $config['max_width'] = 8900;
                            $config['max_height'] = 8900;

                            $new_name = time(); //str_replace(" ", "_", $this->input->post('proveedor_nombre'));
                            $config['file_name'] = $new_name; //.$extencion;
                            $config['file_ext_tolower'] = TRUE;

                            $this->load->library('upload', $config);
                            $this->upload->do_upload('galeria_imagen');

                            $img_data = $this->upload->data();
                            $extension = $img_data['file_ext'];
                            /* ********************INICIO para resize***************************** */
                            if ($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                                $conf['image_library'] = 'gd2';
                                $conf['source_image'] = $img_data['full_path'];
                                $conf['new_image'] = './resources/images/clientes/';
                                $conf['maintain_ratio'] = TRUE;
                                $conf['create_thumb'] = FALSE;
                                $conf['width'] = 800;
                                $conf['height'] = 600;
                                $this->image_lib->clear();
                                $this->image_lib->initialize($conf);
                                if(!$this->image_lib->resize()){
                                    echo $this->image_lib->display_errors('','');
                                }
                            }
                            /* ********************F I N  para resize***************************** */
                            $confi['image_library'] = 'gd2';
                            $confi['source_image'] = './resources/images/clientes/'.$new_name.$extension;
                            $confi['new_image'] = './resources/images/clientes/'.$new_name."_thumb".$extension;
                            $confi['maintain_ratio'] = TRUE;
                            $confi['create_thumb'] = FALSE;
                            $confi['width'] = 50;
                            $confi['height'] = 50;

                            $this->image_lib->clear();
                            $this->image_lib->initialize($confi);
                            $this->image_lib->resize();

                            $foto = $new_name.$extension;
                        }
                /* *********************FIN imagen***************************** */
                $params = array(
                    'cliente_id' => $cliente_id,
                    'galeria_nombre' => $this->input->post('galeria_nombre'),
                    'galeria_imagen' => $foto,
                );

                $galeria_cliente_id = $this->Galeria_cliente_model->add_galeria_cliente($params);
                redirect('galeria_cliente/index/'.$cliente_id);
            
        }
    }  

    /*
     * Editing a galeria_cliente
     */
    function edit($estadocivil_id)
    {
        if($this->acceso(4)){
            // check if the galeria_cliente exists before trying to edit it
            $data['galeria_cliente'] = $this->Galeria_cliente_model->get_galeria_cliente($estadocivil_id);

            if(isset($data['galeria_cliente']['estadocivil_id']))
            {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('estadocivil_descripcion','Estadocivil Descripcion','required');
                if($this->form_validation->run())     
                {   
                    $params = array(
                        'estadocivil_descripcion' => $this->input->post('estadocivil_descripcion'),
                    );
                    $this->Galeria_cliente_model->update_galeria_cliente($estadocivil_id,$params);            
                    redirect('galeria_cliente/index');
                }
                else
                {
                    $data['_view'] = 'galeria_cliente/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The galeria_cliente you are trying to edit does not exist.');
        }
    } 

    /*
     * Deleting galeria_cliente
     */
    function remove($galeria_id,$cliente_id)
    {
        if($this->acceso(4)){
            $galeria_cliente = $this->Galeria_cliente_model->get_galeria_cliente($galeria_id);
            $directorio = $_SERVER['DOCUMENT_ROOT'].'/presto_web/resources/images/clientes/';
            $foto1 = $galeria_cliente["galeria_imagen"];          
                              unlink($directorio.$foto1);
                              $mimagenthumb = str_replace(".", "_thumb.", $foto1);
                              unlink($directorio.$mimagenthumb);
            // check if the galeria_cliente exists before trying to delete it
            if(isset($galeria_cliente['galeria_id']))
            {
                $this->Galeria_cliente_model->delete_galeria_cliente($galeria_id);
                redirect('galeria_cliente/index/'.$cliente_id);
            }
            else
                show_error('The galeria_cliente you are trying to delete does not exist.');
        }
    }
    
}
