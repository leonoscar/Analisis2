<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends ERP_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->moduleAccess = $this->validateModuleAccess(1,$this->session->id_usuario);
	}

	public function listarClientes()
	{
		$this->validateRoleAccess($this->moduleAccess,1,1,$this->session->id_usuario);

		$this->load->view('template/header', $this->header);
		$this->load->view('template/content');
		$this->load->view('template/footer');
	}
}
?>