<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends ERP_Controller {

	public function index()
	{
		$this->load->view("template/header");
		$this->load->view("cuentasxcobrar/prueba");
		$this->load->view("template/footer");
	}
}
?>