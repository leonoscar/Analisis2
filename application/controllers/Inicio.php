<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends ERP_Controller {

	public function index()
	{
		$this->load->view('template/header', $this->header);
		$this->load->view('inicio');
		$this->load->view('template/footer');
	}
}
?>