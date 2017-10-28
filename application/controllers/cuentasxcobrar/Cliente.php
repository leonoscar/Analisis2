<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends ERP_Controller {

	public function index()
	{
		$this->load->view('template/header', $this->header);
		$this->load->view('template/content');
		$this->load->view('template/footer');
	}
}
?>