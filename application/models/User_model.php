<?php if (!defined('BASEPATH')) exit ('No direct script access allowed');

class User_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	function get_login_user($nombre, $clave)
	{
		$query = $this->db->where('nombre', $nombre)
		->where('clave',$clave)->get('usuario');

		if($query->num_rows() > 0)
		{
			foreach($query->result() as $row)
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
}
