<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	public function index()
	{
		//echo "string";
		$data['index'] = 'usuarios';
		$this->load->view('backend/base/head.php');
		$this->load->view('backend/base/leftnav.php');
		$this->load->view('backend/tablas/users/usuarios');
		$this->load->view('backend/base/footer.php');
		$this->load->view('backend/base/controlsidebar.php');
		$this->load->view('backend/base/cierre.php', $data);
	}

	public function insertar($path=1)
	{
		if ($path==1) {
			$data['index'] = 'usuarios';
			$this->load->view('backend/base/head.php');
			$this->load->view('backend/base/leftnav.php');
			$this->load->view('backend/formularios/users/insert');
			$this->load->view('backend/base/footer.php');
			$this->load->view('backend/base/controlsidebar.php');
			$this->load->view('backend/base/cierre.php', $data);
		}
		else
		{
			$hola = $this->input->post();
			print_r($hola);
			//redirect('Chalets/inicio');
		}
		
	}

	
}
