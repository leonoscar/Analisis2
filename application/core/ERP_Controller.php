<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ERP_Controller extends CI_Controller {

	public $header;
	protected $moduleAccess;

	public function __construct()
	{
		parent::__construct();

		if(!$this->session->logged_in){
			redirect('login', 'refresh');
		}else{
			$this->header['nombre_usuario'] = $this->session->nombre_usuario;
			$this->load->model('seguridad/usuario', '', true);

			if($this->session->modulos != false){
				$this->createMenu();
			}
		}
        
	}

	protected function validateModuleAccess($id_modulo,$id_usuario)
	{
		$validateModule = $this->usuario->validateAccessModule($id_usuario,$id_modulo);

		if($validateModule){
			return true;
		}else{
			redirect('inicio', 'refresh');
		}
	}

	protected function validateRoleAccess($module_access,$id_modulo,$id_role,$id_usuario)
	{
		if($module_access){
			$validateRole = $this->usuario->validateRoleAccess($id_modulo,$id_role,$id_usuario);

			if($validateRole){
				return true;
			}else{
				redirect('inicio', 'refresh');
			}			
		}else{
			redirect('inicio', 'refresh');
		}
	}

	private function createMenu()
	{
		$this->header['menu'] = "";

		foreach ($this->session->modulos as $modulo) {
			if($modulo->roles == false){
				$this->header['menu'] .= "<li><a href='{$modulo->link_menu}'>{$modulo->nombre}</a></li>";
			}else{
				$this->header['menu'] .= "
					<li class='dropdown'>
                  		<a href='#'' class='dropdown-toggle' data-toggle='dropdown'>{$modulo->nombre} <span class='caret'></span></a>
                  			<ul class='dropdown-menu' role='menu'>";

                foreach ($modulo->roles as $rol) {
                	$this->header['menu'] .= "<li><a href='/{$rol->link_menu}'>{$rol->nombre}</a></li>";
                }
				
                $this->header['menu'] .= " </ul>
                						</li>";
			}
		}
	}

}