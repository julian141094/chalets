<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include_once 'backend.php';

class Products extends Backend
{

	public function __construct()
	{
		parent:: __construct();
		$this->load->model('products_model');
		$this->load->model('image_model');
		$this->session->set_flashdata('menu', 'content');
	}

	public function index()
	{
		$this->check_session();

		$data['rows']  = $this->products_model->get_all();
		if($data['rows'] != 0):
		foreach ($data['rows'] as $value) {
			$data['images'][$value->code] = $this->image_model->get_first_image_by_product($value->code);
		}
		endif;

		$_data['view'] = 'other';
		$data_['view'] = 'other1';
		$this->load->view('backend/base/header',$data_);
		$this->load->view('backend/products/products' ,$data);
		$this->load->view('backend/base/footer',$_data);

	}

	public function view_products($id)
	{
		$this->check_session();

		$row = $this->products_model->get_by_id($id);

		if($row == 0)
		{
			$this->session->set_flashdata('Something is wrong! You are trying to access to a unexisting article.');
			redirect('/products/' , 'refresh');
		}

		$row = $row[0];
		$images = $this->image_model->get_by_product($row->code);
		$_data['view'] = 'view';
		$data_['view'] = 'view';
		$this->load->view('backend/base/header', $data_);
		$this->load->view('backend/products/view_products',compact('row','images'));
		$this->load->view('backend/base/footer', $_data);
	}


	public function add_products($phase=0)
	{
		$this->check_session();

		if (!$phase) 
		{
			$_data['view'] = 'other';
			$data_['view'] = 'other1';
			$this->load->view('backend/base/header', $data_);
			$this->load->view('backend/products/add_products');
			$this->load->view('backend/base/footer',$_data);
		}
		else
		{
			$this->form_validation->set_rules('code', 'Code', 'trim|required');
			$this->form_validation->set_rules('name', 'Name', 'trim|required' );
			$this->form_validation->set_rules('description', 'Description' , 'trim|required');

			$this->form_validation->set_message('required' , '{field} This field is required');



			if($this->form_validation->run() == FALSE)
			{

				$this->session->set_flashdata('error','Something is wrong! Check your information to continue');
				redirect('/products/add_products', 'refresh');
			}
			else
			{
				if(!$this->products_model->insert($this->input))
				{

					$this->session->set_flashdata('error','Something is wrong! Call your Manager');
					redirect('/products/add_products' , 'refresh');
				}

				$_POST['product'] = $this->input->post('code');

				if ( $_FILES['file']['name'] != '')
				{
					$this->load->helper('path');
					$this->load->helper('string');
					$this->load->library('image_lib');
					$this->load->library('upload');

					$config['file_name'] = 'a'.random_string('numeric', 5);
					$_POST['name']      = $config['file_name'];


					$base_dir = $this->path.$this->input->post('code')."/";

					echo $base_dir;

					@mkdir(set_realpath($base_dir, false), 0777, true);

					$config['upload_path'] = './'.$base_dir;
					$config['allowed_types'] = 'gif|png|jpg';
					$config['max_size'] = '2000';

					print_r($config);

					$this->upload->initialize($config);

					if( ! $this->upload->do_upload('file'))
					{
						$this->session->set_flashdata('error','Error on Upload file'. $this->upload->display_errors());
						echo $this->upload->display_errors();
						redirect('/products/insert_image/', 'refresh');
					}
					else
					{
						$upload_data = $this->upload->data();
						$_POST['name'] .= $upload_data['file_ext'];

						if(!$this->image_model->insert($this->input))
						{
							$this->session->set_flashdata('error','Something is wrong! Call your manager.');
							redirect('/products/add_products', 'refresh');
						}
					}
				}

				$this->session->set_flashdata('success','Success!');
				redirect('/products/', 'refresh');
			}
		}
	}

	public function update_products($code, $phase=0)
	{
		$this->check_session();

		if(!$phase)
        {
            $row = $this->products_model->get_by_id($code);

            if($row == 0)
            {
                $this->session->set_flashdata('Error','Something is wrong! This product does not exist!','error');
                redirect('/products/', 'refresh');
            }
            else
            {
                $row = $row[0];
                $_data['view'] = 'other';
				$data_['view'] = 'other1';
				$this->load->view('backend/base/header', $data_);
                $this->load->view('backend/products/update_products',compact('row'));
				$this->load->view('backend/base/footer',$_data);
            }
        }
        else
        {
           
            $this->form_validation->set_rules('description'   ,'description'   ,'trim|required');
            

            
            if ($this->form_validation->run()==false)
            {
                $this->session->set_flashdata('Error','Check your information to continue','error');
                redirect('/products/update_products/'.$this->input->post('code'), 'refresh');
            }
            else
            {
                if($this->products_model->update($this->input))
                {
                    $this->session->set_flashdata('Success','Product updated','success');
                    redirect('/products/', 'refresh');
                }
                else
                {
                    $this->session->set_flashdata('Error','Something is wrong! Call your manager','error');
                    redirect('/products/update_products/'.$this->input->post('code'), 'refresh');
                }
            }
        }
    }

    public function delete_products($code)
    {
        $this->check_session();
        if($this->products_model->delete($code))
        {
            $this->session->set_flashdata('Success','Product deleted','success');
        }
        else
        {
            $this->session->set_flashdata('Error','Somethingis wrong!','error');
        }
        redirect('/products/', 'refresh');
    }

	public function insert_image($code, $phase=0)
	{
		$this->check_session();

		$row = $this->products_model->get_by_id($code);

		if($row == 0)
		{
		    $this->session->set_flashdata('Error','Something is wrong! This product does not exist!','error');
		    redirect('/products/', 'refresh');
		}

		if (!$phase) 
		{
			$row = $this->products_model->get_by_id($code);

			$_data['view'] = 'other';
			$data_['view'] = 'other1';
			$this->load->view('backend/base/header', $data_);
			$this->load->view('backend/products/insert_image', compact('row'));
			$this->load->view('backend/base/footer',$_data);
		}
		else
		{
			if ( $_FILES['file']['name'] != '')
			{
				$this->load->helper('path');
				$this->load->helper('string');
				$this->load->library('image_lib');
				$this->load->library('upload');

				$config['file_name'] = 'a'.random_string('numeric', 5);
				$_POST['name']      = $config['file_name'];


				$base_dir = $this->path.$code."/";


				@mkdir(set_realpath($base_dir, false), 0777, true);

				$config['upload_path'] = './'.$base_dir;
				$config['allowed_types'] = 'gif|png|jpg';
				$config['max_size'] = '2000';

				

				$this->upload->initialize($config);

				if( ! $this->upload->do_upload('file'))
				{
					$this->session->set_flashdata('error','Error on Upload file'. $this->upload->display_errors());
					echo $this->upload->display_errors();
					//redirect('/products/insert_image/', 'refresh');
				}
				else
				{
					$upload_data = $this->upload->data();
					$_POST['name'] .= $upload_data['file_ext'];
					$_POST['product'] = $code;

					if(!$this->image_model->insert($this->input))
					{
						$this->session->set_flashdata('error','Something is wrong! Call your manager.');
						redirect('/products/insert_image', 'refresh');
					}
				}

				$this->session->set_flashdata('success','Success!');
				redirect('/products/', 'refresh');
			}
		}
	}
}

?>


 
        

    
