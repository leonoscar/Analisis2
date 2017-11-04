<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ERP_Controller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if(!$this->session->logged_in){
			print "no";
			die();
		}/*else{
print 'erp controller<br/><pre>';
	/*print_r($this->session->userdata);
	print '<br>'. $this->session->nombre_usuario;
	die();	
		}*/
        
	}

}