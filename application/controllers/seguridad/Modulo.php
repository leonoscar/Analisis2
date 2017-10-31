<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modulo extends ERP_Controller {

	public function __construct()
	{
		parent::__construct();	

		$this->load->model('seguridad/modelomodulo','',true);
	}

	public function listarModulos()
	{
		$modulos = $this->modelomodulo->getModules();

		$data['modulos'] = "";

		foreach ($modulos as $modulo) {
			$estado = ($modulo->estado_num == 1) ? "label-success" : "label-danger";

			$data['modulos'] .=	"	<tr>
										<td>{$modulo->nombre_modulo}</td>
										<td>{$modulo->descrip_modulo}</td>
										<td>
											<label class='label {$estado}'>{$modulo->estado}</label>
										</td>
										<td>
											<button class='btn btn-default btn-xs fa fa-times'></button>
											<button class='btn btn-default btn-xs fa fa-edit'></button>
										</td>
									</tr>"; 			
		}
		
		$this->load->view('template/header',$this->header);
		$this->load->view('seguridad/modulos', $data);
		$this->load->view('template/footer');
	}

	public function listarModulosAjax()
	{
		$modulos = $this->modelomodulo->getModules();

		$data['response'] = false;
		$data['modulos'] = '';

		if($modulos){
			$data['response'] = true;

			foreach ($modulos as $modulo) {
				$estado = ($modulo->estado_num == 1) ? "label-success" : "label-danger";

				$data['modulos'] .=	"	<tr>
											<td>{$modulo->nombre_modulo}</td>
											<td>{$modulo->descrip_modulo}</td>
											<td>
												<label class='label {$estado}'>{$modulo->estado}</label>
											</td>
											<td>
												<button class='btn btn-default btn-xs fa fa-times'></button>
												<button class='btn btn-default btn-xs fa fa-edit'></button>
											</td>
										</tr>"; 			
			}			
		}else{

		}


		echo json_encode($data);
	}


	public function saveModulo()
	{
        $this->form_validation->set_rules('correo', 'correo', 'trim|required');
        $this->form_validation->set_rules('contrasena', 'contrasena', 'trim|required');

        if($this->form_validation->run() == FALSE)
        {

		
		$this->modelomodulo->saveModule($nombre,$descripcion);
		echo "si llego la informacion" . " " . $_POST['descrip_modulo'];
	}
}