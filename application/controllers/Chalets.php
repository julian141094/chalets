<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'Backend.php';


class Chalets extends Backend {

	public function __construct()
	{
		
		parent::__construct();
		$this->load->model('Chalets_model');
		$this->session->set_flashdata('menu','content');
	} 
	public function inicio()
	{
		$leftnav = 'Chalet';
		//echo "string";
		$this->check_session();
		$controller    = 'Chalets';
		$rows          = $this->Chalets_model->get_all();
		$data['index'] = 'chalets';


		$this->load->view('backend/base/head.php');
		$this->load->view('backend/base/leftnav.php', compact('leftnav'));
		$this->load->view('backend/tablas/chalets/chalets', compact('controller','rows'));
		$this->load->view('backend/base/footer.php');
		$this->load->view('backend/base/controlsidebar.php');
		$this->load->view('backend/base/cierre.php', $data);
	}

	public function ver($id)
	{
		$this->check_session();

		$row = $this->Chalets_model->get_by_id($id);

		if ($row ==0) {
			$this->session->set_flashdata('Error','Oh oh, algo ah salido mal, estas intentando acceder a un articulo que');
			redirect('Chalets','refresh');
		}

		$row = $row[0];

			$data['index'] = 'chalets';
			$this->load->view('backend/base/head.php');
			$this->load->view('backend/base/leftnav.php');
			$this->load->view('backend/formularios/chalets/insertar',compact('row'));
			$this->load->view('backend/base/footer.php');
			$this->load->view('backend/base/controlsidebar.php');
			$this->load->view('backend/base/cierre.php', $data);
	}


	public function insertar($phase=0)
	{
		$this->check_session();
		//esta es una libreria para validar que ya esta creada en codeigniter, aqui la invocamos
		
		if (!$phase) 
		{
			$data['index'] = 'chalets';
			$this->load->view('backend/base/head.php');
			$this->load->view('backend/base/leftnav.php');
			$this->load->view('backend/formularios/chalets/insertar');
			$this->load->view('backend/base/footer.php');
			$this->load->view('backend/base/controlsidebar.php');
			$this->load->view('backend/base/cierre.php', $data);
		}
		else
		{
			
			//print_r($this->input->post());
			//exit();
			$this->form_validation->set_rules('codigo'    , 'Codigo'    , 'trim|required');
			$this->form_validation->set_rules('nombre'    , 'Nombre'    , 'trim|required');
			$this->form_validation->set_rules('estado'    , 'Estado'    , 'trim|required');
			$this->form_validation->set_rules('ubicacion' , 'ubicacion' , 'trim|required');

			$this->form_validation->set_message('required', '{field} es requerido para guardar el Chalet');

			if ($this->form_validation->run() == FALSE) 
			{
				$this->session->set_flashdata('error','Verifique los campos finalizar el proceso');
				redirect('/Chalets/insertar','refresh');
			}
			else
			{
				if (!$this->Chalets_model->insertar($this->input)) 
				{
					$this->session->set_flashdata('error','Verifique los campos finalizar el proceso');
					redirect('/Chalets/insertar','refresh');
				}

				$_POST['id'] = $this->db->insert_id();

				if ($_FILES['file']['name'] != '')
				{

					$this->load->helper('path');
					$this->load->helper('string');
					$this->load->library('image_lib');
					$this->load->library('upload');

					$config['file_name'] = 'a'.random_string('numeric',5);
					$_POST['image']      = $config['file_name'];

					$base_dir            = $this->path.'chalets'.'/'.$this->input->post('codigo')."/";

					@mkdir(set_realpath($base_dir,false),0777, true);
					@mkdir(set_realpath($base_dir,false),0777, true);

					$config['upload_path']      =  './'.$base_dir;
					$config['allowed_types']    =  'gif|png|jpg';
					$config['max_size']         =  '2000';

					$this->upload->initialize($config);

					if ( ! $this->upload->do_upload('file')) 
					{
						print_r($this->upload->display_errors());
						exit();
						$this->session->set_flashdata('error','Errors on Upload File'.$this->upload->display_errors());
						redirect('/Chalets/insertar/'.$this->input->post('id'), 'refresh');
						exit;
					}
					else
					{
						$upload_data     =$this->upload->data();
						$_POST['image'] .=$upload_data['file_ext'];

						if(!$this->Chalets_model->update_image($this->input))
						{
							$this->session->set_flashdata('error','Oh oh, algo salio mal, te recomendamos que contactes al administrador del sistema');
							redirect('/Chalet/insertar', 'refresh');
						}
					}
				}
			
			$this->session->set_flashdata('succes', 'Se ha completado el proceso de guardar');
			redirect('/Chalets/inicio', 'refresh');	
			}

				
		}
		
	}

	public function update($id,$phase = 0)
	{
	    $this->check_session();

	    if(!$phase)
	    {
	        $row = $this->Chalets_model->get_by_id($id);

	        if($row == 0)
	        {
	        	
	            $this->session->set_flashdata('Error','Oh oh, algo ah salido mal, estas intentando acceder a un Chalet que no Existe','error');
	            redirect('/Chalet/insertar/', 'refresh');
	        }
	        else
	        {
	            $row = $row[0];
	            $data['index'] = 'chalets';
	            $this->load->view('backend/base/head.php');
	            $this->load->view('backend/base/leftnav.php');
	            $this->load->view('backend/formularios/chalets/modificar',compact('row'));
	            $this->load->view('backend/base/footer.php');
	            $this->load->view('backend/base/controlsidebar.php');
	            $this->load->view('backend/base/cierre.php', $data);
	        }
	    }
	    else
	    {
	        $this->form_validation->set_rules('id'        , 'Id'        , 'trim|required');
			$this->form_validation->set_rules('codigo'    , 'Codigo'    , 'trim|required');
			$this->form_validation->set_rules('nombre'    , 'Nombre'    , 'trim|required');
			$this->form_validation->set_rules('estado'    , 'Estado'    , 'trim|required');
			$this->form_validation->set_rules('ubicacion' , 'ubicacion' , 'trim|required');

			$this->form_validation->set_message('required', '{field} es requerido para guardar el Chalet');

	        if ($this->form_validation->run()==false)
	        {
	        	print_r('llego a la validacion fallida');
	            $this->session->set_flashdata('Error al Guardar','Verifique los campos para finalizar el proceso','error');
	            redirect('/Chalets/update/'.$this->input->post('id'), 'refresh');
	        }
	        else
	        {
	            if($this->Chalets_model->update($this->input))
	            {
	            	//print_r($this->db->last_query());
	                $this->session->set_flashdata('Éxito','Se ha completado el proceso de actualizar','success');
	                redirect('/Chalets/inicio/', 'refresh');
	            }
	            else
	            {
	                $this->session->set_flashdata('Error','Oh oh, algo ah salido mal, te recomendamos contactar al administrador del sistema','error');
	                redirect('/Chalets/update/'.$this->input->post('id'), 'refresh');
	            }
	        }
	    }
	}


	public function delete($id)
	{
	    $this->check_session();
	    if($this->Chalets_model->delete($id))
	    {
	        $this->session->set_flashdata('Éxito','El Articulo ha sido eliminado exitosamente','success');
	    }
	    else
	    {
	        $this->session->set_flashdata('Error','Oh oh, algo ah salido mal con el eliminar','error');
	    }
	    redirect('/Chalets/inicio', 'refresh');
	}
	
}
