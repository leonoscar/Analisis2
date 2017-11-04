<?php
class DashboardCompras extends ERP_Controller {
	//LLAMDA A VISTA PRINCIPAL
	public function index()
	{
		$this->load->view('template/header', $this->header);
		$this->load->view('compras/indexcompras');
		$this->load->view('template/footer');
	}

	//LLAMADA A VISTAS SECUNDARIAS
	public function requisicion()
	{
		$this->load->view('template/header', $this->header);
		$this->load->view('compras/requisiciones');
		$this->load->view('template/footer');	
	}

	public function autoriza_requisicion()
	{
		$this->load->view('template/header', $this->header);
		$this->load->view('compras/autorizaciones_requisicion');
		$this->load->view('template/footer');	
	}

	public function cotizaciones()
	{
		$this->load->view('template/header', $this->header);
		$this->load->view('compras/cotizaciones');
		$this->load->view('template/footer');		
	}

	public function OrdenCompras()
	{
		$this->load->view('template/header', $this->header);
		$this->load->view('compras/OrdenCompras');
		$this->load->view('template/footer');			
	}

	public function productos()
	{
		$this->load->view('template/header', $this->header);
		$this->load->view('compras/Productos');
		$this->load->view('template/footer');				
	}

	//LLAMDA A ACTION DE FUNCIONES DE EJECUCION
	public function SalvarRequisiscion()
	{
		echo "Procedimineto Salvar requisision";
	}
}