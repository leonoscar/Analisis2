<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
        if($this->session->userdata('logged_in')){
            redirect('inicio', 'refresh');
        }else{
            $this->session->sess_destroy();
        }

        $this->load->view('template/login');		
	}

    public function __construct()
    {
        parent::__construct();

        $this->load->model('usuario', '', true);
    }

    public function getAccess()
    {
        redirect('inicio', 'refresh');

        /*
        $this->form_validation->set_rules('correo', 'correo', 'trim|required');
        $this->form_validation->set_rules('contrasena', 'contrasena', 'trim|required');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('template/login');
        }
        else{
            if($this->validateUser()){
                redirect('inicio', 'refresh');
            }else{
                $this->load->view('template/login');       
            }
        }*/
    }

    private function validateUser()
    {
        $email = $this->input->post('correo', true);
        $password = $this->input->post('contrasena', true);

        $usuario = $this->usuario->getUser($password, $email);

        if($usuario){
            $this->session->set_userdata('id_usuario', $usuario->id_usuario);
            $this->session->set_userdata('nombre_usuario', $usuario->correoe);
            $this->session->set_userdata('logged_in', true);
            return true;
        }else{
            $this->form_validation->set_message('validaUsuario', 'Usuario o contraseña incorrecta.');
        
            return false;
        }
    }

    public function logOut()
    {
        $this->session->sess_destroy();
        redirect('login', 'refresh');        
    }
}