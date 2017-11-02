<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil extends ERP_Controller {

	public function __construct()
	{
		parent::__construct();	

		$this->load->model('seguridad/modeloperfil','',true);

		$this->moduleAccess = $this->validateModuleAccess(2,$this->session->id_usuario);
		$this->validateRoleAccess($this->moduleAccess,2,3,$this->session->id_usuario);
	}

	public function listarPerfiles()
	{
		$perfiles = $this->modeloperfil->getPerfiles();

		$data['perfiles'] = "";

		foreach ($perfiles as $perfil) {
			if($perfil->estado_num == 1){
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

			$data['perfiles'] .=	"	<tr>
										<td>{$perfil->nombre_perfil}</td>
										<td>{$perfil->descrip_perfil}</td>
										<td>
											<label class='label {$estado}'>{$perfil->estado}</label>
										</td>
										<td>
											<button class='btn $tipo_btn btn-xs fa $icono estado_perfil' name='$action' id='{$perfil->id_perfil}'></button>
											<button class='btn btn-default btn-xs fa fa-edit edit_perfil' id='{$perfil->id_perfil}'></button>
										</td>
									</tr>"; 			
		}
		
		$this->load->view('template/header',$this->header);
		$this->load->view('seguridad/perfiles', $data);
		$this->load->view('template/footer');
	}

	public function listarPerfilesAjax()
	{
		$perfiles = $this->modeloperfil->getPerfiles();

		$data['response'] = false;
		$data['perfiles'] = '';

		if($perfiles){
			$data['response'] = true;

			foreach ($perfiles as $perfil) {
				if($perfil->estado_num == 1){
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

				$estado = ($perfil->estado_num == 1) ? "label-success" : "label-danger";

				$data['perfiles'] .=	"	<tr>
											<td>{$perfil->nombre_perfil}</td>
											<td>{$perfil->descrip_perfil}</td>
											<td>
												<label class='label {$estado}'>{$perfil->estado}</label>
											</td>
											<td>
												<button class='btn $tipo_btn btn-xs fa $icono estado_perfil' name='$action' id='{$perfil->id_perfil}'></button>
												<button class='btn btn-default btn-xs fa fa-edit edit_perfil' id='{$perfil->id_perfil}'></button>
											</td>
										</tr>"; 			
			}			
		}else{

		}


		echo json_encode($data);
	}


	public function savePerfil()
	{	
		$data = Array(
					'response' => false,
					'result_db' => true,
					'message' => ''
				);


        $this->form_validation->set_rules('nombre_perfil', 'Nombre del perfil', 'trim|required|regex_match[/^[a-zA-ZñÑ ]+$/]');
        $this->form_validation->set_rules('descrip_perfil', 'Descripción del perfil', 'trim|regex_match[/^[a-zA-ZñÑ.,; ]+$/]|required');

        if($this->form_validation->run() === true){
        	if($this->input->post('id_perfil',true) > 0){
        		$save = $this->modeloperfil->editPerfil(
        									$this->input->post('id_perfil',true),
        									$this->input->post('nombre_perfil',true),
        									$this->input->post('descrip_perfil',true));
        		$accion = "editado";
        		$msg_accion = "editar";
			}else{
        		$save = $this->modeloperfil->savePerfil(
        									$this->input->post('nombre_perfil',true),
        									$this->input->post('descrip_perfil',true));
        		$accion = "creado";
        		$msg_accion = "guardar";
			}

        	if($save){
        		$data['response'] = true;
        		$data['message'] = "perfil {$accion} correctamente.";
        	}else{
        		$data['result_db'] = false;
        		$data['message'] = "No se ha podido {$msg_accion} la información.";
        	}
        }else{
        	$data['message'] = validation_errors('<li>','</li>');
        }

        echo json_encode($data);
	}

	public function changeStatePerfil()
	{
		$data = Array(
					'response' => false,
					'result_db' => true,
					'message' => ''
				);

		$estado = ($this->input->post('accion') == 'enabled') ? 1 : 0;

		$changeState = $this->modeloperfil->enabledDisabledPerfil($this->input->post('id_perfil',true),$estado);

		if($changeState){
			$data['response'] = true;
			$data['message'] = "Se ha cambiado el estado del perfil seleccionado correctamente.";
		}else{
			$data['message'] = "No se ha podido cambiar el estado del perfil.";
		}

		echo json_encode($data);
	}

	public function getPerfilInfo()
	{

		$getPerfil = $this->modeloperfil->getPerfilById($this->input->post('id_perfil',true));

		if($getPerfil){
			echo json_encode($getPerfil);
		}else{
			return false;
		}
	}
}