<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permiso extends ERP_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('seguridad/modelopermiso','',true);
	}

	public function gestionarPermisos()
	{
		$this->load->view('template/header',$this->header);
		$this->load->view('seguridad/permisos');
		$this->load->view('template/footer');
	}

	public function loadPerfiles()
	{
		$data['asignacion_perfiles'] = "";
		$perfilesAsignacion = $this->modelopermiso->getPerfilesAsignacion($this->input->post('codusuario'));

		foreach ($perfilesAsignacion as $perfil) {
			if(!is_null($perfil->id_asignaperfil)){
				if($perfil->estado == 1){
					$estado = "label-success";
					$tipo_btn = "btn-danger";
					$icono = "fa-times";
					$action = "no_asignar";				
				}else{
					$estado = "label-danger";
					$tipo_btn = "btn-success";
					$icono = "fa-check";
					$action = "asignar";
				}
			}else{
				$estado = "label-danger";
				$tipo_btn = "btn-success";
				$icono = "fa-check";
				$action = "asignar";				
			}

			$data["asignacion_perfiles"] .= "	<tr>
										<td>{$perfil->nombre_perfil}</td>
										<td>
											<label class='label {$estado}'>{$perfil->estado_asignacion}</label>
										</td>
										<td>
											<button class='btn $tipo_btn btn-xs fa $icono asignar_noasignar' name='$action' id='{$perfil->id_perfil}'></button>
										</td>
									</tr>";
		}

		echo json_encode($data);
	}

	public function getUser()
	{
		$data = Array(
			'response' => false,
			'result_db' => false,
			'datos' => '',
			'message' => ''
		);

		$usuario = $this->modelopermiso->getUserById($this->input->post('codusuario',true));

		if($usuario){
			$data['response'] = true;
			$data['datos'] = $usuario;
		}else{
			$data['message'] = "Usuario no encontrado o inactivo.";
		}

		echo json_encode($data);
	}

	public function asignarDesasignarPerfil()
	{
		$data = Array(
					'response' => false,
					'result_db' => true,
					'message' => ''
				);

		$estado = ($this->input->post('action')) ? 1 : 0;

		$changeState = $this->modelopermiso->asignarDesasignarPerfil(
																	$this->input->post('codusuario',true),
																	$this->input->post('id_perfil',true),
																	$estado);

		if($changeState){
			$data['response'] = true;
			$data['message'] = "El permiso se ha asignado correctamente.";
		}else{
			$data['message'] = "No ha sido posible asignar el permiso.";
		}

		echo json_encode($data);
	}
}