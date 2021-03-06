<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Cliente extends CI_Controller{
    private $session_data = "";
    function __construct()
    {
        parent::__construct();
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
     * Listing of cliente
     */
    function index()
    {
        if($this->acceso(4)){
            $this->load->model('Estado_civil_model');
            $data['all_estadocivil'] = $this->Estado_civil_model->get_all_estado_civil();

            $this->load->model('Categoria_model');
            $data['all_categoria'] = $this->Categoria_model->get_all_categoria();

            $this->load->model('Asesor_model');
            $data['all_asesor'] = $this->Asesor_model->get_all_asesor();

            $this->load->model('Estado_model');
            $data['all_estado'] = $this->Estado_model->get_all_estado();

            $data['_view'] = 'cliente/index';
            $this->load->view('layouts/main',$data);
        }
    }

    /*
     * Adding a new cliente
     */
    function add()
    {
        if($this->acceso(4)){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('cliente_nombre','Cliente Nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));
            $this->form_validation->set_rules('cliente_apellido','Cliente Apellido','trim|required', array('required' => 'Este Campo no debe ser vacio'));

            if($this->form_validation->run())     
            {
                    $nombre = $this->input->post('cliente_nombre');
                    $apellido = $this->input->post('cliente_apellido');
                    $resultado = $this->Cliente_model->es_cliente_registrado($nombre, $apellido);
                    if($resultado > 0){
                        $this->load->model('Estado_civil_model');
                        $data['all_estado_civil'] = $this->Estado_civil_model->get_all_estado_civil();

                        $this->load->model('Extencion_model');
                        $data['all_extencion'] = $this->Extencion_model->get_all_extencion();

                        $this->load->model('Categoria_model');
                        $data['all_categoria'] = $this->Categoria_model->get_all_categoria();

                        $this->load->model('Asesor_model');
                        $data['all_asesor'] = $this->Asesor_model->get_all_asesor();
                        $data['resultado'] = 1;

                        $data['_view'] = 'cliente/add';
                        $this->load->view('layouts/main',$data);

                    }else{
                    /* *********************INICIO imagen***************************** */
                    $foto="";
                    if (!empty($_FILES['cliente_foto']['name'])){
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
                            $this->upload->do_upload('cliente_foto');

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
                            $confi['new_image'] = './resources/images/clientes/'."thumb_".$new_name.$extension;
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
                        $estado_id = 1;
                $params = array(
                        'estadocivil_id' => $this->input->post('estadocivil_id'),
                        'estado_id' => $estado_id,
                        'categoria_id' => $this->input->post('categoria_id'),
                        'cliente_extencionci' => $this->input->post('cliente_extencionci'),
                        'asesor_id' => $this->input->post('asesor_id'),
                        'cliente_nombre' => $this->input->post('cliente_nombre'),
                        'cliente_apellido' => $this->input->post('cliente_apellido'),
                        'cliente_apcasado' => $this->input->post('cliente_apcasado'),
                        'cliente_sexo' => $this->input->post('cliente_sexo'),
                        'cliente_tipodoc' => $this->input->post('cliente_tipodoc'),
                        'cliente_ci' => $this->input->post('cliente_ci'),
                        'cliente_fechavenc' => $this->input->post('cliente_fechavenc'),
                        'cliente_codigo' => $this->input->post('cliente_codigo'),
                        'cliente_telefono' => $this->input->post('cliente_telefono'),
                        'cliente_celular' => $this->input->post('cliente_celular'),
                        'cliente_direccion' => $this->input->post('cliente_direccion'),
                        'cliente_conyuge' => $this->input->post('cliente_conyuge'),
                        'conyuge_ci' => $this->input->post('conyuge_ci'),
                        'conyuge_telef' => $this->input->post('conyuge_telef'),
                        'cliente_latitud' => $this->input->post('cliente_latitud'),
                        'cliente_longitud' => $this->input->post('cliente_longitud'),
                        'cliente_referencia' => $this->input->post('cliente_referencia'),
                        'cliente_foto' => $foto,
                        'cliente_email' => $this->input->post('cliente_email'),
                        'cliente_fechanac' => $this->input->post('cliente_fechanac'),
                        'cliente_nit' => $this->input->post('cliente_nit'),
                        'cliente_razon' => $this->input->post('cliente_razon'),
                        'cliente_tipovivienda' => $this->input->post('cliente_tipovivienda'),
                        'cliente_pertenenciadom' => $this->input->post('cliente_pertenenciadom'),
                        'cliente_numhijos' => $this->input->post('cliente_numhijos'),
                        'cliente_pertenenciatiempo' => $this->input->post('cliente_pertenenciatiempo'),
                        'cliente_referencia1' => $this->input->post('cliente_referencia1'),
                        'cliente_reftelef1' => $this->input->post('cliente_reftelef1'),
                        'cliente_referencia2' => $this->input->post('cliente_referencia2'),
                        'cliente_reftelef2' => $this->input->post('cliente_reftelef2'),
                        'cliente_actividadeconomica' => $this->input->post('cliente_actividadeconomica'),
                        'cliente_montomax' => $this->input->post('cliente_montomax'),
                );

                $cliente_id = $this->Cliente_model->add_cliente($params);
                redirect('cliente/index');
                }
            }
            else
            {
                $this->load->model('Estado_civil_model');
                $data['all_estado_civil'] = $this->Estado_civil_model->get_all_estado_civil();

                $this->load->model('Extencion_model');
                $data['all_extencion'] = $this->Extencion_model->get_all_extencion();

                $this->load->model('Categoria_model');
                $data['all_categoria'] = $this->Categoria_model->get_all_categoria();

                $this->load->model('Asesor_model');
                $data['all_asesor'] = $this->Asesor_model->get_all_asesor();
                $data['resultado'] = 0;

                $data['_view'] = 'cliente/add';
                $this->load->view('layouts/main',$data);
            }
        }
    }

    /*
     * Editing a cliente
     */
    function edit($cliente_id)
    {
        if($this->acceso(4)){
            // check if the cliente exists before trying to edit it
            $data['cliente'] = $this->Cliente_model->get_cliente($cliente_id);

            if(isset($data['cliente']['cliente_id']))
            {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('cliente_nombre','Cliente Nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                $this->form_validation->set_rules('cliente_apellido','Cliente Apellido','trim|required', array('required' => 'Este Campo no debe ser vacio'));

                if($this->form_validation->run())     
                {
                    /* *********************INICIO imagen***************************** */
                    $foto="";
                    $foto1= $this->input->post('cliente_foto1');
                    if (!empty($_FILES['cliente_foto']['name']))
                    {
                        $config['upload_path'] = './resources/images/clientes/';
                        $config['allowed_types'] = 'gif|jpeg|jpg|png';
                        $config['max_size'] = 0;
                        $config['max_width'] = 8900;
                        $config['max_height'] = 8900;

                        $new_name = time(); //str_replace(" ", "_", $this->input->post('proveedor_nombre'));
                        $config['file_name'] = $new_name; //.$extencion;
                        $config['file_ext_tolower'] = TRUE;

                        $this->load->library('image_lib');
                        $this->image_lib->initialize($config);

                        $this->load->library('upload', $config);
                        $this->upload->do_upload('cliente_foto');

                        $img_data = $this->upload->data();
                        $extension = $img_data['file_ext'];
                        /* ********************INICIO para resize***************************** */
                        if($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                            $conf['image_library'] = 'gd2';
                            $conf['source_image'] = $img_data['full_path'];
                            $conf['new_image'] = './resources/images/clientes/';
                            $conf['maintain_ratio'] = TRUE;
                            $conf['create_thumb'] = FALSE;
                            $conf['width'] = 800;
                            $conf['height'] = 600;

                            $this->image_lib->initialize($conf);
                            if(!$this->image_lib->resize()){
                                echo $this->image_lib->display_errors('','');
                            }
                            $this->image_lib->clear();
                        }
                        /* ********************F I N  para resize***************************** */
                        //$directorio = base_url().'resources/imagenes/';
                        $directorio = $_SERVER['DOCUMENT_ROOT'].'/presto_web/resources/images/clientes/';
                        if(isset($foto1) && !empty($foto1)){
                          if(file_exists($directorio.$foto1)){
                              unlink($directorio.$foto1);
                              $mimagenthumb = "thumb_".$foto1;
                              unlink($directorio.$mimagenthumb);
                          }
                      }
                        $confi['image_library'] = 'gd2';
                        $confi['source_image'] = './resources/images/clientes/'.$new_name.$extension;
                        $confi['new_image'] = './resources/images/clientes/'."thumb_".$new_name.$extension;
                        $confi['maintain_ratio'] = TRUE;
                        $confi['create_thumb'] = FALSE;
                        $confi['width'] = 50;
                        $confi['height'] = 50;

                        $this->image_lib->clear();
                        $this->image_lib->initialize($confi);
                        $this->image_lib->resize();

                        $foto = $new_name.$extension;
                    }else{
                        $foto = $foto1;
                    }
                /* *********************FIN imagen***************************** */
                    $params = array(
                            'estadocivil_id' => $this->input->post('estadocivil_id'),
                            'estado_id' => $this->input->post('estado_id'),
                            'categoria_id' => $this->input->post('categoria_id'),
                            'cliente_extencionci' => $this->input->post('cliente_extencionci'),
                            'asesor_id' => $this->input->post('asesor_id'),
                            'cliente_nombre' => $this->input->post('cliente_nombre'),
                            'cliente_apellido' => $this->input->post('cliente_apellido'),
                            'cliente_apcasado' => $this->input->post('cliente_apcasado'),
                            'cliente_sexo' => $this->input->post('cliente_sexo'),
                            'cliente_tipodoc' => $this->input->post('cliente_tipodoc'),
                            'cliente_ci' => $this->input->post('cliente_ci'),
                            'cliente_fechavenc' => $this->input->post('cliente_fechavenc'),
                            'cliente_codigo' => $this->input->post('cliente_codigo'),
                            'cliente_telefono' => $this->input->post('cliente_telefono'),
                            'cliente_celular' => $this->input->post('cliente_celular'),
                            'cliente_direccion' => $this->input->post('cliente_direccion'),
                            'cliente_conyuge' => $this->input->post('cliente_conyuge'),
                            'conyuge_ci' => $this->input->post('conyuge_ci'),
                            'conyuge_telef' => $this->input->post('conyuge_telef'),
                            'cliente_latitud' => $this->input->post('cliente_latitud'),
                            'cliente_longitud' => $this->input->post('cliente_longitud'),
                            'cliente_referencia' => $this->input->post('cliente_referencia'),
                            'cliente_foto' => $foto,
                            'cliente_email' => $this->input->post('cliente_email'),
                            'cliente_fechanac' => $this->input->post('cliente_fechanac'),
                            'cliente_nit' => $this->input->post('cliente_nit'),
                            'cliente_razon' => $this->input->post('cliente_razon'),
                            'cliente_tipovivienda' => $this->input->post('cliente_tipovivienda'),
                            'cliente_pertenenciadom' => $this->input->post('cliente_pertenenciadom'),
                            'cliente_numhijos' => $this->input->post('cliente_numhijos'),
                            'cliente_pertenenciatiempo' => $this->input->post('cliente_pertenenciatiempo'),
                            'cliente_referencia1' => $this->input->post('cliente_referencia1'),
                            'cliente_reftelef1' => $this->input->post('cliente_reftelef1'),
                            'cliente_referencia2' => $this->input->post('cliente_referencia2'),
                            'cliente_reftelef2' => $this->input->post('cliente_reftelef2'),
                            'cliente_actividadeconomica' => $this->input->post('cliente_actividadeconomica'),
                            'cliente_edadhijos' => $this->input->post('cliente_edadhijos'),
                            'cliente_montomax' => $this->input->post('cliente_montomax'),
                    );

                    $this->Cliente_model->update_cliente($cliente_id,$params);            
                    redirect('cliente/index');
                }
                else
                {
                    $this->load->model('Estado_civil_model');
                    $data['all_estado_civil'] = $this->Estado_civil_model->get_all_estado_civil(
                            );
                    $this->load->model('Estado_model');
                    $data['all_estado'] = $this->Estado_model->get_all_estado();

                    $this->load->model('Extencion_model');
                    $data['all_extencion'] = $this->Extencion_model->get_all_extencion();

                    $this->load->model('Categoria_model');
                    $data['all_categoria'] = $this->Categoria_model->get_all_categoria();

                    $this->load->model('Asesor_model');
                    $data['all_asesor'] = $this->Asesor_model->get_all_asesor();

                    $data['_view'] = 'cliente/edit';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The cliente you are trying to edit does not exist.');
        }
    }
    /*
    * buscar clientes limite 50
    */
    function buscarclientesparam()
    {
        if ($this->input->is_ajax_request())
        {
            $parametro       = $this->input->post('parametro');
            $categoriaestado = $this->input->post('categoriaestado');
            $limit           = $this->input->post('limit');
            $datos = $this->Cliente_model->get_all_cliente_param($parametro, $categoriaestado, $limit);
            echo json_encode($datos);
        }
        else
        {                 
            show_404();
        }
        
    }
    /*
     * declaracion jurada de un cliente
     */
    function declaracionj($cliente_id)
    {
        if($this->acceso(22)){
            // check if the cliente exists before trying to mostrar la declaracion juarada
            $data['cliente'] = $this->Cliente_model->get_inf_cliente($cliente_id);
            if(isset($data['cliente']['cliente_id']))
            {
                $this->load->model('Integrante_model');
                $integrante_id = $this->Integrante_model->get_integrante_cliente($cliente_id);
                if($integrante_id >0){
                    $this->load->model('Garantia_model');
                    $data['garantias'] = $this->Garantia_model->get_allgarantiaintegrante($integrante_id);
                    $data['deudas'] = $this->Cliente_model->get_alldeuda($cliente_id);
                }
                /*
                $this->load->model('Estado_model');
                $data['all_estado'] = $this->Estado_model->get_all_estado();

                $this->load->model('Extencion_model');
                $data['all_extencion'] = $this->Extencion_model->get_all_extencion();

                $this->load->model('Categoria_model');
                $data['all_categoria'] = $this->Categoria_model->get_all_categoria();

                $this->load->model('Asesor_model');
                $data['all_asesor'] = $this->Asesor_model->get_all_asesor();
                */
                $data['_view'] = 'cliente/declaracionj';
                $this->load->view('layouts/main',$data);
            }
            else
                show_error('El cliente no esta registrado, y por lo tanto no muestra la declaracion jurada.');
        }
    }
    /* Editing a cliente desde grupos */
    function editar2($cliente_id, $grupo_id)
    {
        //if($this->acceso(4)){
            // check if the cliente exists before trying to edit it
            $data['cliente'] = $this->Cliente_model->get_cliente($cliente_id);
            $data['integrante'] = $this->Cliente_model->get_integrante($cliente_id,$grupo_id);
            $data['grupo_id'] = $grupo_id;

            if(isset($data['cliente']['cliente_id']))
            {
                $this->load->library('form_validation');
                $this->form_validation->set_rules('cliente_nombre','Cliente Nombre','trim|required', array('required' => 'Este Campo no debe ser vacio'));
                $this->form_validation->set_rules('cliente_apellido','Cliente Apellido','trim|required', array('required' => 'Este Campo no debe ser vacio'));

                if($this->form_validation->run())     
                {
                    /* *********************INICIO imagen***************************** */
                    $foto="";
                    $foto1= $this->input->post('cliente_foto1');
                    if (!empty($_FILES['cliente_foto']['name']))
                    {
                        $config['upload_path'] = './resources/images/clientes/';
                        $config['allowed_types'] = 'gif|jpeg|jpg|png';
                        $config['max_size'] = 0;
                        $config['max_width'] = 8900;
                        $config['max_height'] = 8900;

                        $new_name = time(); //str_replace(" ", "_", $this->input->post('proveedor_nombre'));
                        $config['file_name'] = $new_name; //.$extencion;
                        $config['file_ext_tolower'] = TRUE;

                        $this->load->library('image_lib');
                        $this->image_lib->initialize($config);

                        $this->load->library('upload', $config);
                        $this->upload->do_upload('cliente_foto');

                        $img_data = $this->upload->data();
                        $extension = $img_data['file_ext'];
                        /* ********************INICIO para resize***************************** */
                        if($img_data['file_ext'] == ".jpg" || $img_data['file_ext'] == ".png" || $img_data['file_ext'] == ".jpeg" || $img_data['file_ext'] == ".gif") {
                            $conf['image_library'] = 'gd2';
                            $conf['source_image'] = $img_data['full_path'];
                            $conf['new_image'] = './resources/images/clientes/';
                            $conf['maintain_ratio'] = TRUE;
                            $conf['create_thumb'] = FALSE;
                            $conf['width'] = 800;
                            $conf['height'] = 600;

                            $this->image_lib->initialize($conf);
                            if(!$this->image_lib->resize()){
                                echo $this->image_lib->display_errors('','');
                            }
                            $this->image_lib->clear();
                        }
                        /* ********************F I N  para resize***************************** */
                        //$directorio = base_url().'resources/imagenes/';
                        $directorio = $_SERVER['DOCUMENT_ROOT'].'/presto_web/resources/images/clientes/';
                        if(isset($foto1) && !empty($foto1)){
                          if(file_exists($directorio.$foto1)){
                              unlink($directorio.$foto1);
                              $mimagenthumb = "thumb_".$foto1;
                              unlink($directorio.$mimagenthumb);
                          }
                      }
                        $confi['image_library'] = 'gd2';
                        $confi['source_image'] = './resources/images/clientes/'.$new_name.$extension;
                        $confi['new_image'] = './resources/images/clientes/'."thumb_".$new_name.$extension;
                        $confi['maintain_ratio'] = TRUE;
                        $confi['create_thumb'] = FALSE;
                        $confi['width'] = 50;
                        $confi['height'] = 50;

                        $this->image_lib->clear();
                        $this->image_lib->initialize($confi);
                        $this->image_lib->resize();

                        $foto = $new_name.$extension;
                    }else{
                        $foto = $foto1;
                    }
                /* *********************FIN imagen***************************** */
                    $params = array(
                            'estadocivil_id' => $this->input->post('estadocivil_id'),
                            'estado_id' => $this->input->post('estado_id'),
                            'categoria_id' => $this->input->post('categoria_id'),
                            'cliente_extencionci' => $this->input->post('cliente_extencionci'),
                            'asesor_id' => $this->input->post('asesor_id'),
                            'cliente_nombre' => $this->input->post('cliente_nombre'),
                            'cliente_apellido' => $this->input->post('cliente_apellido'),
                            'cliente_apcasado' => $this->input->post('cliente_apcasado'),
                            'cliente_sexo' => $this->input->post('cliente_sexo'),
                            'cliente_tipodoc' => $this->input->post('cliente_tipodoc'),
                            'cliente_ci' => $this->input->post('cliente_ci'),
                            'cliente_fechavenc' => $this->input->post('cliente_fechavenc'),
                            'cliente_codigo' => $this->input->post('cliente_codigo'),
                            'cliente_telefono' => $this->input->post('cliente_telefono'),
                            'cliente_celular' => $this->input->post('cliente_celular'),
                            'cliente_direccion' => $this->input->post('cliente_direccion'),
                            'cliente_conyuge' => $this->input->post('cliente_conyuge'),
                            'conyuge_ci' => $this->input->post('conyuge_ci'),
                            'conyuge_telef' => $this->input->post('conyuge_telef'),
                            'cliente_latitud' => $this->input->post('cliente_latitud'),
                            'cliente_longitud' => $this->input->post('cliente_longitud'),
                            'cliente_referencia' => $this->input->post('cliente_referencia'),
                            'cliente_foto' => $foto,
                            'cliente_email' => $this->input->post('cliente_email'),
                            'cliente_fechanac' => $this->input->post('cliente_fechanac'),
                            'cliente_nit' => $this->input->post('cliente_nit'),
                            'cliente_razon' => $this->input->post('cliente_razon'),
                            'cliente_tipovivienda' => $this->input->post('cliente_tipovivienda'),
                            'cliente_pertenenciadom' => $this->input->post('cliente_pertenenciadom'),
                            'cliente_numhijos' => $this->input->post('cliente_numhijos'),
                            'cliente_pertenenciatiempo' => $this->input->post('cliente_pertenenciatiempo'),
                            'cliente_referencia1' => $this->input->post('cliente_referencia1'),
                            'cliente_reftelef1' => $this->input->post('cliente_reftelef1'),
                            'cliente_referencia2' => $this->input->post('cliente_referencia2'),
                            'cliente_reftelef2' => $this->input->post('cliente_reftelef2'),
                            'cliente_actividadeconomica' => $this->input->post('cliente_actividadeconomica'),
                            'cliente_refactividad' => $this->input->post('cliente_refactividad'),
                            'cliente_edadhijos' => $this->input->post('cliente_edadhijos'),
                            'cliente_montomax' => $this->input->post('cliente_montomax'),
                    );

                    $this->Cliente_model->update_cliente($cliente_id,$params);            
                    redirect('grupo/integrantes/'.$grupo_id);
                }
                else
                {
                    $this->load->model('Estado_civil_model');
                    $data['all_estado_civil'] = $this->Estado_civil_model->get_all_estado_civil(
                            );
                    $this->load->model('Estado_model');
                    $data['all_estado'] = $this->Estado_model->get_all_estado();

                    $this->load->model('Extencion_model');
                    $data['all_extencion'] = $this->Extencion_model->get_all_extencion();

                    $this->load->model('Categoria_model');
                    $data['all_categoria'] = $this->Categoria_model->get_all_categoria();

                    $this->load->model('Asesor_model');
                    $data['all_asesor'] = $this->Asesor_model->get_all_asesor();

                    $data['_view'] = 'cliente/editar2';
                    $this->load->view('layouts/main',$data);
                }
            }
            else
                show_error('The cliente you are trying to edit does not exist.');
        //}
    }
}
