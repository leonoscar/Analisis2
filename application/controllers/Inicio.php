<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index()
	{
		$this->load->view("core/template/header2");
		$this->load->view("cuentasxcobrar/prueba");
		$this->load->view("core/template/footer2");
	}
}
?>