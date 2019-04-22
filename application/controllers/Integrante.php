<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Integrante extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Integrante_model');
    } 

    /*
     * Listing of integrante
     */
    function index()
    {
        $data['integrante'] = $this->Integrante_model->get_all_integrante();
        
        $data['_view'] = 'integrante/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new integrante
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
                'cliente_id' => $this->input->post('cliente_id'),
                'tipointeg_id' => $this->input->post('tipointeg_id'),
                'garantia_id' => $this->input->post('garantia_id'),
                'grupo_id' => $this->input->post('grupo_id'),
                'integrante_fechareg' => $this->input->post('integrante_fechareg'),
                'integrante_horareg' => $this->input->post('integrante_horareg'),
                'integrante_horareg' => $this->input->post('integrante_horareg'),
                'integrante_cargo' => $this->input->post('integrante_cargo'),
            );
            
            $integrante_id = $this->Integrante_model->add_integrante($params);
            redirect('integrante/index');
        }
        else
        {
			$this->load->model('Cliente_model');
			$data['all_cliente'] = $this->Cliente_model->get_all_cliente();

			$this->load->model('Tipo_integrante_model');
			$data['all_tipo_integrante'] = $this->Tipo_integrante_model->get_all_tipo_integrante();

			$this->load->model('Garantia_model');
			$data['all_garantia'] = $this->Garantia_model->get_all_garantia();

			$this->load->model('Grupo_model');
			$data['all_grupo'] = $this->Grupo_model->get_all_grupo();
            
            $data['_view'] = 'integrante/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a integrante
     */
    function edit($integrante_id)
    {   
        // check if the integrante exists before trying to edit it
        $data['integrante'] = $this->Integrante_model->get_integrante($integrante_id);
        
        if(isset($data['integrante']['integrante_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
                    'cliente_id' => $this->input->post('cliente_id'),
                    'tipointeg_id' => $this->input->post('tipointeg_id'),
                    'garantia_id' => $this->input->post('garantia_id'),
                    'grupo_id' => $this->input->post('grupo_id'),
                    'integrante_fechareg' => $this->input->post('integrante_fechareg'),
                    'integrante_horareg' => $this->input->post('integrante_horareg'),
                    'integrante_cargo' => $this->input->post('integrante_cargo'),
                );

                $this->Integrante_model->update_integrante($integrante_id,$params);            
                redirect('integrante/index');
            }
            else
            {
				$this->load->model('Cliente_model');
				$data['all_cliente'] = $this->Cliente_model->get_all_cliente();

				$this->load->model('Tipo_integrante_model');
				$data['all_tipo_integrante'] = $this->Tipo_integrante_model->get_all_tipo_integrante();

				$this->load->model('Garantia_model');
				$data['all_garantia'] = $this->Garantia_model->get_all_garantia();

				$this->load->model('Grupo_model');
				$data['all_grupo'] = $this->Grupo_model->get_all_grupo();

                $data['_view'] = 'integrante/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The integrante you are trying to edit does not exist.');
    } 

    /*
     * Deleting integrante
     */
    function remove($integrante_id,$grupo_id)
    {
        $integrante = $this->Integrante_model->get_integrante($integrante_id);

        // check if the integrante exists before trying to delete it
        if(isset($integrante['integrante_id']))
        {
            $this->Integrante_model->delete_integrante($integrante_id);
            redirect('grupo/integrantes/'.$grupo_id);
        }
        else
            show_error('The integrante you are trying to delete does not exist.');
    }
    
}
