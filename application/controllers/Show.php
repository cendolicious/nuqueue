<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Makassar');

class Show extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('crud_m');
	}

	public function index()
	{
		$data['data_poli'] = $this->crud_m->ambilData('tbl_poliklinik');

		$where = array(
			'status_antrian' => 1,
		);

		$data['data_antrian'] = $this->crud_m->ambilData('tbl_antrian', $where);

		$this->load->view('tampil_antrian_pilih_poli', $data);
	}
}
