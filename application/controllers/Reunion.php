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
    
}
