<?php if (!defined('BASEPATH')) exit('No direct script access alloweb');
	/**
	* 
	*/
	class Blog_model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function insert($_data)
		{
			$data = array(

				'codigo'      	   => $_data->post('codigo'),
				'titulo'	       => $_data->post('titulo'),
				'descripcion'      => $_data->post('descripcion'),
				'autor' 		   => $_data->post('autor'),
				 );
			if($this->db->insert('blog', $data))
			{
				return TRUE;
			}
			{
				return FALSE;
			}
		}

		public function update_image($_data)
		{
			$data = array(
			'image'      => $_data->post('image')
			);

			if($this->db->where('id',$_data->post('id'))->update('blog', $data))
			{
				return TRUE;
			}
			{
				return FALSE;
			}
		}

		public function get_all()
		{
			$query = $this->db->get('blog');
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $row) 
				{
					$data[] = $row;
				}
				return $data;
			}
			else
			{
				return 0;
			}
		}

		function get_by_id($_id)
		{
			$query = $this->db->where('id',$_id)->get('blog');

			if ($query->num_rows() > 0) 
			{
				foreach ($query->result() as $row) 
				{
					$data[] = $row;
				}
				return $data;
			}
				else
				{
					return 0;
				}
		}
		
		function update($_data)
		{
			$data = array(
				'codigo'      	   => $_data->post('codigo'),
				'titulo'	       => $_data->post('titulo'),
				'descripcion'      => $_data->post('descripcion'),
				'autor' 		   => $_data->post('autor'),
				 );
			if($this->db->where('id',$_data->post('id'))->update('blog', $data))
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}

		function delete($_id)
		{
			if($this->db->where('id',$_id)->delete('blog'))
			{
				return TRUE;
			}
			{
				return FALSE;
			}
		}

	}


 ?>