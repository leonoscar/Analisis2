<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permiso extends ERP_Controller {

	public function gestionarPermisos()
	{
		$this->load->view('template/header',$this->header);
		$this->load->view('seguridad/permisos');
		$this->load->view('template/footer');
	}
}