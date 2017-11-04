<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rol extends ERP_Controller {

	public function __construct()
	{
		parent::__construct();	

		$this->load->model('seguridad/modelorol','',true);

		$this->moduleAccess = $this->validateModuleAccess(1,$this->session->id_usuario);
		$this->validateRoleAccess($this->moduleAccess,1,3,$this->session->id_usuario);
	}

	public function listarRoles()
	{
		$roles = $this->modelorol->getRoles();

		$data['roles'] = "";

		foreach ($roles as $rol) {
			if($rol->estado_num == 1){
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

			$data['roles'] .=	"	<tr>
										<td>{$rol->nombre_rol}</td>
										<td>{$rol->descrip_rol}</td>
										<td>{$rol->nombre}</td>
										<td>{$rol->link_menu}</td>
										<td>
											<label class='label {$estado}'>{$rol->estado}</label>
										</td>
										<td>
											<button class='btn $tipo_btn btn-xs fa $icono estado_rol' name='$action' id='{$rol->id_rol}'></button>
											<button class='btn btn-default btn-xs fa fa-edit edit_rol' id='{$rol->id_rol}'></button>
										</td>
									</tr>"; 			
		}
		
		$this->load->view('template/header',$this->header);
		$this->load->view('seguridad/roles', $data);
		$this->load->view('template/footer');
	}

	public function listarRolesAjax()
	{
		$roles = $this->modelorol->getRoles();

		$data['response'] = false;
		$data['roles'] = '';

		if($roles){
			$data['response'] = true;

			foreach ($roles as $rol) {
				if($rol->estado_num == 1){
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

				$estado = ($rol->estado_num == 1) ? "label-success" : "label-danger";

				$data['roles'] .=	"	<tr>
											<td>{$rol->nombre_rol}</td>
											<td>{$rol->descrip_rol}</td>
											<td>{$rol->nombre}</td>
											<td>{$rol->link_menu}</td>
											<td>
												<label class='label {$estado}'>{$rol->estado}</label>
											</td>
											<td>
												<button class='btn $tipo_btn btn-xs fa $icono estado_rol' name='$action' id='{$rol->id_rol}'></button>
												<button class='btn btn-default btn-xs fa fa-edit edit_rol' id='{$rol->id_rol}'></button>
											</td>
										</tr>"; 			
			}			
		}else{

		}


		echo json_encode($data);
	}


	public function saveRol()
	{	
		$data = Array(
					'response' => false,
					'result_db' => true,
					'message' => ''
				);

        $this->form_validation->set_rules('nombre_rol', 'Nombre del rol', 'trim|required|regex_match[/^[a-zA-ZñÑ ]+$/]');
        $this->form_validation->set_rules('descrip_rol', 'Descripción del rol', 'trim|regex_match[/^[a-zA-ZñÑ.,; ]+$/]|required');

        if($this->input->post('check_item_menu',true) === 'on'){
			$this->form_validation->set_rules('nombre_item', 'Nombre del item', 'trim|required|regex_match[/^[a-zA-ZñÑ ]+$/]');
        	$this->form_validation->set_rules('link_submenu', 'Link del item', 'trim|regex_match[/^[a-z\/]+$/]|required');        	
        }

        if($this->form_validation->run() === true){
        	if($this->input->post('id_rol',true) > 0){
        		$save = $this->modelorol->editRol(
        									$this->input->post('id_rol',true),
        									$this->input->post('nombre_rol',true),
        									$this->input->post('descrip_rol',true));

        		if($this->input->post('check_item_menu',true) == 'on'){
        			$save = $this->modelorol->editSubmenuItem(
        													$this->input->post('nombre_item',true),
        													$this->input->post('link_submenu',true),
        													$this->input->post('id_rol',true));
        		}

        		$accion = "editado";
        		$msg_accion = "editar";
			}else{
        		$save = $this->modelorol->saveRol(
        									$this->input->post('nombre_rol',true),
        									$this->input->post('descrip_rol',true));

        		if($this->input->post('check_item_menu',true) == 'on'){
        			$save = $this->modelorol->saveSubmenuItem($this->input->post('nombre_item',true),$this->input->post('link_submenu',true),$save);
        		}

        		$accion = "creado";
        		$msg_accion = "guardar";
			}

        	if($save){
        		$data['response'] = true;
        		$data['message'] = "rol {$accion} correctamente.";
        	}else{
        		$data['result_db'] = false;
        		$data['message'] = "No se ha podido {$msg_accion} la información.";
        	}
        }else{
        	$data['message'] = validation_errors('<li>','</li>');
        }

        echo json_encode($data);
	}

	public function changeStateRol()
	{
		$data = Array(
					'response' => false,
					'result_db' => true,
					'message' => ''
				);

		$estado = ($this->input->post('accion') == 'enabled') ? 1 : 0;

		$changeState = $this->modelorol->enabledDisabledRol($this->input->post('id_rol',true),$estado);

		if($changeState){
			$data['response'] = true;
			$data['message'] = "Se ha cambiado el estado del rol seleccionado correctamente.";
		}else{
			$data['message'] = "No se ha podido cambiar el estado del rol.";
		}

		echo json_encode($data);
	}

	public function getRolInfo()
	{

		$getRol = $this->modelorol->getRolById($this->input->post('id_rol',true));

		if($getRol){
			echo json_encode($getRol);
		}else{
			return false;
		}
	}
}