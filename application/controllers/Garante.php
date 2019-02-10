<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Garante extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Garante_model');
    } 

    /*
     * Listing of garante
     */
    function index()
    {
        $data['garante'] = $this->Garante_model->get_all_garante();
        
        $data['_view'] = 'garante/index';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new garante
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'cliente_id' => $this->input->post('cliente_id'),
				'garantia_id' => $this->input->post('garantia_id'),
				'credito_id' => $this->input->post('credito_id'),
				'garante_fecha' => $this->input->post('garante_fecha'),
				'garante_hora' => $this->input->post('garante_hora'),
            );
            
            $garante_id = $this->Garante_model->add_garante($params);
            redirect('garante/index');
        }
        else
        {            
            $data['_view'] = 'garante/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a garante
     */
    function edit($garante_id)
    {   
        // check if the garante exists before trying to edit it
        $data['garante'] = $this->Garante_model->get_garante($garante_id);
        
        if(isset($data['garante']['garante_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'cliente_id' => $this->input->post('cliente_id'),
					'garantia_id' => $this->input->post('garantia_id'),
					'credito_id' => $this->input->post('credito_id'),
					'garante_fecha' => $this->input->post('garante_fecha'),
					'garante_hora' => $this->input->post('garante_hora'),
                );

                $this->Garante_model->update_garante($garante_id,$params);            
                redirect('garante/index');
            }
            else
            {
                $data['_view'] = 'garante/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The garante you are trying to edit does not exist.');
    } 

    /*
     * Deleting garante
     */
    function remove($garante_id)
    {
        $garante = $this->Garante_model->get_garante($garante_id);

        // check if the garante exists before trying to delete it
        if(isset($garante['garante_id']))
        {
            $this->Garante_model->delete_garante($garante_id);
            redirect('garante/index');
        }
        else
            show_error('The garante you are trying to delete does not exist.');
    }
    
}
