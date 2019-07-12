<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chalets extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Chalets_model');
	} 
	public function inicio()
	{
		//echo "string";
		$data['index'] = 'chalets';
		$this->load->view('backend/base/head.php');
		$this->load->view('backend/base/leftnav.php');
		$this->load->view('backend/tablas/chalets/chalets');
		$this->load->view('backend/base/footer.php');
		$this->load->view('backend/base/controlsidebar.php');
		$this->load->view('backend/base/cierre.php', $data);
	}

	public function insertar($path=1)
	{
		//esta es una libreria para validar que ya esta creada en codeigniter, aqui la invocamos
		$this->load->library('form_validation');
		if ($path==1) {
			$this->load->view('backend/base/head.php');
			$this->load->view('backend/base/leftnav.php');
			$this->load->view('backend/formularios/chalets/insertar');
			$this->load->view('backend/base/footer.php');
			$this->load->view('backend/base/controlsidebar.php');
			$this->load->view('backend/base/cierre.php');
		}
		else
		{
			$this->form_validation->set_rules('id', 'Id', 'required');
			$this->form_validation->set_rules('nombre', 'Nombre', 'required');
			$this->form_validation->set_rules('estado', 'Estado', 'required');
			$this->form_validation->set_rules('hubicacion', 'Hubicacion', 'required');
			if ($this->form_validation->run() == FALSE) 
			{
				//echo('mal');
				$this->load->view('backend/base/head.php');
				$this->load->view('backend/base/leftnav.php');
				$this->load->view('backend/formularios/chalets/insertar');
				$this->load->view('backend/base/footer.php');
				$this->load->view('backend/base/controlsidebar.php');
				$this->load->view('backend/base/cierre.php');
			}
			else
			{
				if ($this->Chalets_model->insert($this->input))
				{
					//redirect('Chalets/inicio','refresh');
				}


			}
		}
		
	}

	
}
