<?php if (!defined('BASEPATH')) exit('No direct script access alloweb');
	/**
	* 
	*/
	class Chalets_model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function insertar($_data)
		{
			$data = array(

				'codigo'      => $_data->post('codigo'),
				'nombre'      => $_data->post('nombre'),
				'estado'      => $_data->post('estado'),
				'ubicacion'   => $_data->post('ubicacion'),
				 );
			if($this->db->insert('chalet', $data))
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

			if($this->db->where('id',$_data->post('id'))->update('chalet', $data))
			{
				return TRUE;
			}
			{
				return FALSE;
			}
		}

		public function get_all()
		{
			$query = $this->db->get('chalet');
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
			$query = $this->db->where('id',$_id)->get('chalet');

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
				'id'          => $_data->post('id'),
				'codigo'      => $_data->post('codigo'),
				'nombre'      => $_data->post('nombre'),
				'estado'      => $_data->post('estado'),
				'ubicacion'   => $_data->post('ubicacion'),
				 );
			if($this->db->where('id',$_data->post('id'))->update('chalet', $data))
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
			if($this->db->where('id',$_id)->delete('chalet'))
			{
				return TRUE;
			}
			{
				return FALSE;
			}
		}

	}


 ?>