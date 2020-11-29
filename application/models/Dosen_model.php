<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_dosen_all()
	{
		$query = $this->db->query("SELECT * FROM dosen");
		return $query;
	}

	public function get_dosen_one($nip)
	{
		$query = $this->db->query("SELECT * FROM dosen WHERE nip='$nip'");
		return $query;
	}

	public function post($data)
	{
		return ($this->db->insert('dosen', $data)) ? TRUE : FALSE;
	}

	public function put($data, $id)
	{
		return ($this->db->update('dosen', $data, "nip = '$id'")) ? TRUE : FALSE;
	}

	public function delete($id)
	{
		return ($this->db->delete('dosen', array('nip' => $id))) ? TRUE : FALSE;
	}

	public function delete_all()
	{
		return ($this->db->delete('dosen', array('0' => 0))) ? TRUE : FALSE;
	}
}
