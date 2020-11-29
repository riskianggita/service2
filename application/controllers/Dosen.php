<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Dosen extends RestController
{

	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->load->model("dosen_model");
	}

	public function dosen_get()
	{
		$list_dosen = $this->dosen_model->get_dosen_all();

		if ($list_dosen->num_rows() > 0) {
			// Set the response and exit
			$this->response([
				'status' => true,
				'data' => $list_dosen->result(),
				'message' => 'data has been loaded'
			], 200);
		} else {
			// Set the response and exit
			$this->response([
				'status' => false,
				'data' => '',
				'message' => 'No Dosen were found'
			], 404);
		}
	}

	public function dosen_one_get($nip)
	{
		$list_dosen = $this->dosen_model->get_dosen_one($nip);

		if ($list_dosen->num_rows() > 0) {
			// Set the response and exit
			$this->response([
				'status' => true,
				'data' => $list_dosen->row(),
				'message' => 'data has been loaded'
			], 200);
		} else {
			// Set the response and exit
			$this->response([
				'status' => false,
				'data' => '',
				'message' => 'No Dosen were found'
			], 404);
		}
	}

	public function dosen_post()
	{
		$data = array(
			'nama' => $this->input->post('nama'),
			'nip' => $this->input->post('nip')

		);

		if ($this->dosen_model->post($data)) {
			// Set the response and exit
			$this->response([
				'status' => true,
				'data' => $data,
				'message' => 'data has been inserted'
			], 200);
		} else {
			// Set the response and exit
			$this->response([
				'status' => false,
				'data' => '',
				'message' => 'Dosen has not been inserted'
			], 404);
		}
	}

	public function dosen_delete($nip)
	{
		if ($this->dosen_model->delete($nip)) {
			// Set the response and exit
			$this->response([
				'status' => true,
				'data' => $nip,
				'message' => 'data has been deleted'
			], 200);
		} else {
			// Set the response and exit
			$this->response([
				'status' => false,
				'data' => '',
				'message' => 'Dosen has not been deleted'
			], 404);
		}
	}

	public function dosen_all_delete()
	{
		if ($this->dosen_model->delete_all()) {
			// Set the response and exit
			$this->response([
				'status' => true,
				'data' => "All dosen",
				'message' => 'data has been deleted'
			], 200);
		} else {
			// Set the response and exit
			$this->response([
				'status' => false,
				'data' => '',
				'message' => 'Dosen has not been deleted'
			], 404);
		}
	}

	public function dosen_update_post($nip)
	{
		$data = array(
			'nama' => $this->input->post('nama'),

		);

		if ($this->dosen_model->put($data, $nip)) {
			// Set the response and exit
			$this->response([
				'status' => true,
				'data' => $data,
				'message' => 'data has been updated'
			], 200);
		} else {
			// Set the response and exit
			$this->response([
				'status' => false,
				'data' => '',
				'message' => 'Dosen has not been updated'
			], 404);
		}
	}
}
