<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller 
{
	var $path;

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('America/Caracas');
		$this->load->model('user_model');
		$this->load->library('form_validation');
		$this->path = 'uploads/';
	}

	public function index()
	{
		if ($this->session->userdata('manager')) {
			
		
			$data['index'] = 'index';
			//echo "string";
			$this->load->view('backend/base/head.php');
			$this->load->view('backend/base/leftnav.php');
			$this->load->view('backend/index');
			$this->load->view('backend/base/footer.php');
			$this->load->view('backend/base/controlsidebar.php');
			$this->load->view('backend/base/cierre.php',$data);		
		}
		else
		{
			$data['index'] = 'index';
			$this->load->view('backend/base/head.php');
			$this->load->view('backend/login');
			//$this->load->view('backend/base/footer.php');
			//$this->load->view('backend/base/controlsidebar.php');
			$this->load->view('backend/base/cierre.php',$data);
		}
	}

	public function login()
	{
		$this->form_validation->set_rules('nombre', 'Usuario', 'trim|required');
		$this->form_validation->set_rules('clave' , 'Clave'  , 'trim|required|sha1|callback_check_login');
		$this->form_validation->set_message('required', '{field} es requerido para entrar');
		$this->form_validation->run();
		//redirect('backend', 'refresh');
		$this->index();

		/*$data['index'] = 'index';
		$this->load->view('backend/base/head.php');
		$this->load->view('backend/login');
		//$this->load->view('backend/base/footer.php');
		//$this->load->view('backend/base/controlsidebar.php');
		$this->load->view('backend/base/cierre.php',$data);*/
	}
	
	function check_login($clave)
	{
		$username = $this->input->post('nombre');
		$users = $this->user_model->get_login_user($username,$clave);

		$this->form_validation->set_message('check_login', 'Usuario o contraseña incorrecta');

		if ($users != 0)
		{
			foreach ($users as $usuario) 
			{
				if ($usuario->clave == sha1($this->input->post('clave'))) 
				{
					$this->session->userdata('manager');
					$sess_array = array();

					$sess_array = array(
						'id'       => $usuario->id,
						'nombre'   => $usuario->nombre,
						'apellido' => $usuario->apellido,

					);

					$this->session->set_userdata('manager', $sess_array);
					redirect('/backend/', 'refresh');
				}
			}
			return false;
		}
		else
		{
			return false;
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('manager');
		redirect('/backend/', 'refresh');
	}

	protected function check_session()
	{
		if (!$this->session->userdata('manager'))
		{
			redirect('/backend/','refresh');
		}
	}

}