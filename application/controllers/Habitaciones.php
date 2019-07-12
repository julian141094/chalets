<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Habitaciones extends CI_Controller {

	public function inicio()
	{
		//echo "string";
		$data['index'] = 'habitaciones';
		$this->load->view('backend/base/head.php');
		$this->load->view('backend/base/leftnav.php');
		$this->load->view('backend/tablas/huespedes/huespedes');
		$this->load->view('backend/base/footer.php');
		$this->load->view('backend/base/controlsidebar.php');
		$this->load->view('backend/base/cierre.php', $data);
	}

	public function insertar($path=1)
	{
		if ($path==1) {
			$data['index'] = 'habitaciones';
			$this->load->view('backend/base/head.php');
			$this->load->view('backend/base/leftnav.php');
			$this->load->view('backend/formularios/huespedes/insertar');
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
