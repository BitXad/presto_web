<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Cuota extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Cuota_model');
        $this->load->model('Credito_model');
    } 

    /*
     * Listing of cuota
     */
    function index()
    {
        $data['cuota'] = $this->Cuota_model->get_all_cuota();
        
        $data['_view'] = 'cuota/index';
        $this->load->view('layouts/main',$data);
    }

    function individual($credito_id)
    {
        $data['credito'] = $this->Credito_model->get_este_credito($credito_id);
        $data['cuota'] = $this->Cuota_model->get_all_cuotas($credito_id);
        $data['_view'] = 'cuota/individual';
        $this->load->view('layouts/main',$data);
    }

     function sintiempo($credito_id)
    {
        $data['credito'] = $this->Credito_model->get_este_credito($credito_id);
        $data['cuota'] = $this->Cuota_model->get_all_cuotas($credito_id);
        $data['_view'] = 'cuota/sintiempo';
        $this->load->view('layouts/main',$data);
    }

    /*
     * Adding a new cuota
     */
    function add()
    {   
        if(isset($_POST) && count($_POST) > 0)     
        {   
            $params = array(
				'credito_id' => $this->input->post('credito_id'),
				'usuario_id' => $this->input->post('usuario_id'),
				'estado_id' => $this->input->post('estado_id'),
				'cuota_numero' => $this->input->post('cuota_numero'),
				'cuota_capital' => $this->input->post('cuota_capital'),
				'cuota_interes' => $this->input->post('cuota_interes'),
				'cuota_descuento' => $this->input->post('cuota_descuento'),
				'cuota_monto' => $this->input->post('cuota_monto'),
				'cuota_fechalimite' => $this->input->post('cuota_fechalimite'),
				'cuota_montocancelado' => $this->input->post('cuota_montocancelado'),
				'cuota_fechapago' => $this->input->post('cuota_fechapago'),
				'cuota_horapago' => $this->input->post('cuota_horapago'),
				'cuota_saldocapital' => $this->input->post('cuota_saldocapital'),
				'cuota_numrecibo' => $this->input->post('cuota_numrecibo'),
				'cuota_banco' => $this->input->post('cuota_banco'),
				'cuota_glosa' => $this->input->post('cuota_glosa'),
            );
            
            $cuota_id = $this->Cuota_model->add_cuota($params);
            redirect('cuota/index');
        }
        else
        {
			$this->load->model('Credito_model');
			$data['all_credito'] = $this->Credito_model->get_all_credito();

			$this->load->model('Usuario_model');
			$data['all_usuario'] = $this->Usuario_model->get_all_usuario();

			$this->load->model('Estado_model');
			$data['all_estado'] = $this->Estado_model->get_all_estado();
            
            $data['_view'] = 'cuota/add';
            $this->load->view('layouts/main',$data);
        }
    }  

    /*
     * Editing a cuota
     */
    function edit($cuota_id)
    {   
        // check if the cuota exists before trying to edit it
        $data['cuota'] = $this->Cuota_model->get_cuota($cuota_id);
        
        if(isset($data['cuota']['cuota_id']))
        {
            if(isset($_POST) && count($_POST) > 0)     
            {   
                $params = array(
					'credito_id' => $this->input->post('credito_id'),
					'usuario_id' => $this->input->post('usuario_id'),
					'estado_id' => $this->input->post('estado_id'),
					'cuota_numero' => $this->input->post('cuota_numero'),
					'cuota_capital' => $this->input->post('cuota_capital'),
					'cuota_interes' => $this->input->post('cuota_interes'),
					'cuota_descuento' => $this->input->post('cuota_descuento'),
					'cuota_monto' => $this->input->post('cuota_monto'),
					'cuota_fechalimite' => $this->input->post('cuota_fechalimite'),
					'cuota_montocancelado' => $this->input->post('cuota_montocancelado'),
					'cuota_fechapago' => $this->input->post('cuota_fechapago'),
					'cuota_horapago' => $this->input->post('cuota_horapago'),
					'cuota_saldocapital' => $this->input->post('cuota_saldocapital'),
					'cuota_numrecibo' => $this->input->post('cuota_numrecibo'),
					'cuota_banco' => $this->input->post('cuota_banco'),
					'cuota_glosa' => $this->input->post('cuota_glosa'),
                );

                $this->Cuota_model->update_cuota($cuota_id,$params);            
                redirect('cuota/index');
            }
            else
            {
				$this->load->model('Credito_model');
				$data['all_credito'] = $this->Credito_model->get_all_credito();

				$this->load->model('Usuario_model');
				$data['all_usuario'] = $this->Usuario_model->get_all_usuario();

				$this->load->model('Estado_model');
				$data['all_estado'] = $this->Estado_model->get_all_estado();

                $data['_view'] = 'cuota/edit';
                $this->load->view('layouts/main',$data);
            }
        }
        else
            show_error('The cuota you are trying to edit does not exist.');
    }
}
