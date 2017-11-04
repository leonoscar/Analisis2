<?php
class Dasboardcompras extends CI_Controller 
{
	//LLAMDA A VISTA PRINCIPAL
	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('compras/indexcompras');
		$this->load->view('template/footer');
	}

	//LLAMADA A VISTAS SECUNDARIAS
	public function requisision()
	{
		$this->load->view('template/header');
		$this->load->view('compras/requisiciones');
		$this->load->view('template/footer');	
	}

	public function aurotiza_requisicion()
	{
		$this->load->view('template/header');
		$this->load->view('compras/autorizacones_requisision');
		$this->load->view('template/footer');	
	}

	public function cotizaciones()
	{
		$this->load->view('template/header');
		$this->load->view('compras/cotizaciones');
		$this->load->view('template/footer');		
	}

	public function OrdenCompras()
	{
		$this->load->view('template/header');
		$this->load->view('compras/OrdenCompras');
		$this->load->view('template/footer');			
	}

	public function productos()
	{
		$this->load->view('template/header');
		$this->load->view('compras/Productos');
		$this->load->view('template/footer');				
	}

	//LLAMDA A ACTION DE FUNCIONES DE EJECUCION
	public function SalvarRequisiscion()
	{
		echo "Procedimineto Salvar requisision";
	}
}