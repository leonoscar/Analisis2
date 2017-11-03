<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends ERP_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('cuentasxcobrar/modelocliente','',true);
		$this->moduleAccess = $this->validateModuleAccess(4,$this->session->id_usuario);
		$this->validateRoleAccess($this->moduleAccess,4,6,$this->session->id_usuario);
	}

	public function listarClientes()
	{
		$clientes = $this->modelocliente->getClientes();

		$data['clientes'] = "";

		foreach ($clientes as $cliente) {
			$data['clientes'] .= "
									<tr>
										<td>{$cliente->nombrecliente}</td>
										<td>{$cliente->direccion_cliente}</td>
										<td>{$cliente->nit_cliente}</td>
										<td>{$cliente->telefono_cliente}</td>
										<td>{$cliente->correo_cliente}</td>
									</tr>
								";
		}

		$this->load->view('template/header', $this->header);
		$this->load->view('cuentasxcobrar/listadoclientes',$data);
		$this->load->view('template/footer');
	}

	public function nuevoCliente()
	{
		$this->load->view('template/header', $this->header);
		$this->load->view('cuentasxcobrar/form_nuevo_cliente');
		$this->load->view('template/footer');
	}

	public function guardarCliente()
	{
		#print_r($_POST);
		$this->form_validation->set_rules('nombre_cliente', 'Nombre del cliente', 'trim|required|regex_match[/^[a-zA-ZñÑ ]+$/]');
		$this->form_validation->set_rules('apellido_cliente', 'Apellido del cliente', 'trim|required|regex_match[/^[a-zA-ZñÑ ]+$/]');
		$this->form_validation->set_rules('direccion_cliente', 'Direccion del cliente', 'trim|required|regex_match[/^[a-zA-ZñÑ0-9- ]+$/]');
		$this->form_validation->set_rules('nit_cliente', 'Nit del cliente', 'trim|required|regex_match[/^[a-z0-9-]+$/]');
		$this->form_validation->set_rules('telefono_cliente', 'Telefono del Cliente', 'trim|required|regex_match[/^[0-9 ]+$/]|min_length[8]|max_length[8]');
		$this->form_validation->set_rules('correo_cliente', 'Correo del Cliente', 'trim|required|regex_match[/^[a-zA-Z.@0-9_]+$/]');

		if ($this->form_validation->run()===true)
		 {
			$guardarCliente = $this->modelocliente->saveCliente(
											$this->input->post('nombre_cliente',true),
											$this->input->post('apellido_cliente',true),
											$this->input->post('direccion_cliente',true),
											$this->input->post('nit_cliente',true),
											$this->input->post('telefono_cliente',true),
											$this->input->post('correo_cliente',true));
			if ($guardarCliente){
				redirect('/cuentasxcobrar/cliente/listarClientes','refresh');
			}
		}else {
				$this->load->view('template/header', $this->header);
				$this->load->view('cuentasxcobrar/form_nuevo_cliente');
				$this->load->view('template/footer');

		}

	}
}
?>