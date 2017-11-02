<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modulo extends ERP_Controller {

	public function __construct()
	{
		parent::__construct();	

		$this->load->model('seguridad/modelomodulo','',true);

		$this->moduleAccess = $this->validateModuleAccess(2,$this->session->id_usuario);
		$this->validateRoleAccess($this->moduleAccess,2,2,$this->session->id_usuario);
	}

	public function listarModulos()
	{
		$modulos = $this->modelomodulo->getModules();

		$data['modulos'] = "";

		foreach ($modulos as $modulo) {
			if($modulo->estado_num == 1){
				$estado = "label-success";
				$tipo_btn = "btn-danger";
				$icono = "fa-times";
				$action = "disabled";
			}else{
				$estado = "label-danger";
				$tipo_btn = "btn-success";
				$icono = "fa-check";
				$action = "enabled";
			}

			$data['modulos'] .=	"	<tr>
										<td>{$modulo->nombre_modulo}</td>
										<td>{$modulo->descrip_modulo}</td>
										<td>
											<label class='label {$estado}'>{$modulo->estado}</label>
										</td>
										<td>
											<button class='btn $tipo_btn btn-xs fa $icono estado_modulo' name='$action' id='{$modulo->id_modulo}'></button>
											<button class='btn btn-default btn-xs fa fa-edit edit_modulo' id='{$modulo->id_modulo}'></button>
										</td>
									</tr>"; 			
		}
		
		$this->load->view('template/header',$this->header);
		$this->load->view('seguridad/modulos', $data);
		$this->load->view('template/footer');
	}

	public function listarModulosAjax()
	{
		$modulos = $this->modelomodulo->getModules();

		$data['response'] = false;
		$data['modulos'] = '';

		if($modulos){
			$data['response'] = true;

			foreach ($modulos as $modulo) {
				if($modulo->estado_num == 1){
					$estado = "label-success";
					$tipo_btn = "btn-danger";
					$icono = "fa-times";
					$action = "disabled";
				}else{
					$estado = "label-danger";
					$tipo_btn = "btn-success";
					$icono = "fa-check";
					$action = "enabled";
				}

				$estado = ($modulo->estado_num == 1) ? "label-success" : "label-danger";

				$data['modulos'] .=	"	<tr>
											<td>{$modulo->nombre_modulo}</td>
											<td>{$modulo->descrip_modulo}</td>
											<td>
												<label class='label {$estado}'>{$modulo->estado}</label>
											</td>
											<td>
												<button class='btn $tipo_btn btn-xs fa $icono estado_modulo' name='$action' id='{$modulo->id_modulo}'></button>
												<button class='btn btn-default btn-xs fa fa-edit edit_modulo' id='{$modulo->id_modulo}'></button>
											</td>
										</tr>"; 			
			}			
		}else{

		}


		echo json_encode($data);
	}


	public function saveModulo()
	{	
		$data = Array(
					'response' => false,
					'result_db' => true,
					'message' => ''
				);


        $this->form_validation->set_rules('nombre_modulo', 'Nombre del modulo', 'trim|required|regex_match[/^[a-zA-ZñÑ ]+$/]');
        $this->form_validation->set_rules('descrip_modulo', 'Descripción del modulo', 'trim|regex_match[/^[a-zA-ZñÑ.,; ]+$/]|required');

        if($this->form_validation->run() === true){
        	if($this->input->post('id_modulo',true) > 0){
        		$save = $this->modelomodulo->editModule(
        									$this->input->post('id_modulo',true),
        									$this->input->post('nombre_modulo',true),
        									$this->input->post('descrip_modulo',true));
        		$accion = "editado";
        		$msg_accion = "editar";
			}else{
        		$save = $this->modelomodulo->saveModule(
        									$this->input->post('nombre_modulo',true),
        									$this->input->post('descrip_modulo',true));
        		$accion = "creado";
        		$msg_accion = "guardar";
			}

        	if($save){
        		$data['response'] = true;
        		$data['message'] = "Modulo {$accion} correctamente.";
        	}else{
        		$data['result_db'] = false;
        		$data['message'] = "No se ha podido {$msg_accion} la información.";
        	}
        }else{
        	$data['message'] = validation_errors('<li>','</li>');
        }

        echo json_encode($data);
	}

	public function changeStateModule()
	{
		$data = Array(
					'response' => false,
					'result_db' => true,
					'message' => ''
				);

		$estado = ($this->input->post('accion') == 'enabled') ? 1 : 0;

		$changeState = $this->modelomodulo->enabledDisabledModule($this->input->post('id_modulo',true),$estado);

		if($changeState){
			$data['response'] = true;
			$data['message'] = "Se ha cambiado el estado del modulo seleccionado correctamente.";
		}else{
			$data['message'] = "No se ha podido cambiar el estado del modulo.";
		}

		echo json_encode($data);
	}

	public function getModuleInfo()
	{

		$getModule = $this->modelomodulo->getModuleById($this->input->post('id_modulo',true));

		if($getModule){
			echo json_encode($getModule);
		}else{
			return false;
		}
	}
}