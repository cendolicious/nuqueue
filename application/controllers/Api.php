<?php

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

	class Api extends REST_Controller{

		public function __construct()
    {
		parent::__construct();
		$this->load->model('crud_m');
    }

		
		
		public function index_get(){
			$id_rs = $this->get('id_rs');
			
			if(empty($id_rs)){
				$rumahsakit = $this->db->get('rumahsakit')->result();
				$this->response($rumahsakit,200);
			}
			else{
				$this->db->where('id_rs',$id_rs);
				$rumahsakit = $this->db->get('rumahsakit')->result();
				
				if(empty($rumahsakit)){
					$this->response(array('message' => "data tidak ditemukan"),200);
				}
				else{
					$this->response($rumahsakit,200);
				}
			}
		}

		public function cekPasienLamaLocal_get(){
				$no_nik = $this->get('no_nik');

				$this->db->where('no_nik',$no_nik);
				$result = $this->db->get('nqtemp')->result();
				
				if(empty($result)){
					$this->response(array('message' => "data tidak ditemukan"));
				}
				else{
					$this->response(
						array(
							'message' => "data ditemukan",
							'result' => $result
					));
				}
		}

		public function cekStatusAntrian_post(){
				date_default_timezone_set('Asia/Jakarta');
       			$today_date = date("Y-m-d");
				$no_nik = $this->post('no_nik');

				$query = "SELECT * FROM antrian WHERE no_nik = $no_nik AND status_antrian = 2 AND tgl_antrian LIKE '$today_date%'";
				$result = $this->db->query($query)->result();
				

				if(empty($result)){
					$this->response(array('message' => "data tidak ditemukan"));
				}
				else{
					$this->response(
						array(
							'message' => "data ditemukan",
							'result' => $result
					));
				}
		}


		public function insertPasienTemp_post()
		{
			$data = array(
				'nama_pasien' => $this->post('nama_pasien'),
				'tgllahir_pasien' => $this->post('tgllahir_pasien'),
				'alamat_pasien' => $this->post('alamat_pasien'),
				'telepon_pasien' => $this->post('telepon_pasien'),
				'jk_pasien' => $this->post('jk_pasien'),
				'goldar_pasien' => $this->post('goldar_pasien'),
				'no_nik' => $this->post('no_nik'),
			);
			$insert = $this->db->insert('nqtemp',$data);
			if ($insert) {
				$this->response(array('status' => "success"));
			} else {
				$this->response(array('status' => "fail"));
			}
		}

		public function insertAntrian_post()
		{
			$getJmlAntrian = $this->crud_m->getJmlAntrian($this->post('id_rs'),$this->post('id_poli'),$this->post('id_jadwal'));
			foreach ($getJmlAntrian->result() as $key) {
				if ($key->jml_antrian == 0) {
					$no_antrian = 1;
				}else{
					$no_antrian = $key->jml_antrian+1;
				}
			}

			$id_user = $this->post('id_user');
			$no_nik = $this->post('no_nik');
			$id_rs = $this->post('id_rs');
			$this->db->where('id_user',$id_user);
			$this->db->where('no_nik',$no_nik);
			$ceknik = $this->db->get('nik')->result();
			if (empty($ceknik)) {
				$datanik = array(
					'id_user' => $id_user,
					'no_nik' => $no_nik,
					'id_rs' => $id_rs
				);
				$this->db->insert('nik',$datanik);
			}

			date_default_timezone_set('Asia/Jakarta');
			$data = array(
				'id_user' => $this->post('id_user'),
				'id_rs' => $this->post('id_rs'),
				'id_poli' => $this->post('id_poli'),
				'id_jadwal' => $this->post('id_jadwal'),
				'no_antrian' => date("ymd").'-'.$this->post('id_rs').$this->post('id_poli').$this->post('id_jadwal').'-'.$no_antrian,
				'tipe_daftar' => $this->post('tipe_daftar'),
				'no_nik' => $this->post('no_nik'),
			);
			$insert = $this->db->insert('antrian',$data);
			if ($insert) {
				$this->response(array('status' => "success"));
			} else {
				$this->response(array('status' => "fail"));
			}
		}
		
		/*Mobile Playgrounds*/

		public function getRumahSakit_post(){
				$id_rs = $this->post('id_rs');
				$this->db->where('status_rs',1);
				$this->db->where('url_api IS NOT NULL', NULL, FALSE);
				if (!empty($id_rs)) {
					$this->db->where('id_rs',$id_rs);
				}else{
					$this->db->where('id_rs !=',1);
				}
				$result = $this->db->get('rumahsakit')->result();

				
				if(empty($result)){
					$this->response(array('message' => "data tidak ditemukan"));
				}
				else{
					$this->response(
						array(
							'message' => "data ditemukan",
							'result' => $result
					));
				}
		}

		public function getPoli_post(){
				$id_rs = $this->post('id_rs');
				$this->db->where('id_rs',$id_rs);
				$result = $this->db->get('poliklinik')->result();

				
				if(empty($result)){
					$this->response(array('message' => "data tidak ditemukan"));
				}
				else{
					$this->response(
						array(
							'message' => "data ditemukan",
							'result' => $result
					));
				}
		}

		public function getNIK_post(){
				$id_user = $this->post('id_user');
				$this->db->where('id_user',$id_user);
				$result = $this->db->get('nik')->result();

				
				if(empty($result)){
					$this->response(array('message' => "data tidak ditemukan"));
				}
				else{
					$this->response(
						array(
							'message' => "data ditemukan",
							'result' => $result
					));
				}
		}

		public function getJadwal_post(){
				$id_poli = $this->post('id_poli');
				date_default_timezone_set('Asia/Jakarta');
        $datename=date('D');

				$this->db->where('id_poli',$id_poli);
				$query = "SELECT j.*,d.nama_dokter,(SELECT COUNT(*) FROM antrian WHERE id_jadwal = j.id_jadwal AND status_antrian = 2) as jml_antrian FROM jadwal as j INNER JOIN dokter as d ON j.id_dokter=d.id_dokter WHERE j.id_poli = $id_poli AND j.jadwal_poli = '$datename'";
				$result = $this->db->query($query)->result();

				
				if(empty($result)){
					$this->response(array('message' => "data tidak ditemukan"));
				}
				else{
					$this->response(
						array(
							'message' => "data ditemukan",
							'result' => $result
					));
				}
		}

		public function getListAntrian_post(){
				date_default_timezone_set('Asia/Jakarta');
       			$today_date = date("Y-m-d");
				$id_user = $this->post('id_user');
				$query = "SELECT a.id_antrian,r.nama_rs,p.nama_poli,d.nama_dokter,a.no_antrian,a.tgl_antrian,n.nama_pasien,(SELECT COUNT(*) FROM antrian WHERE id_jadwal = j.id_jadwal AND status_antrian = 2) as jml_antrian FROM (((((antrian as a INNER JOIN rumahsakit as r ON a.id_rs = r.id_rs) INNER JOIN poliklinik as p ON a.id_poli = p.id_poli) INNER JOIN dokter as d ON d.id_poli = p.id_poli) INNER JOIN jadwal as j ON a.id_jadwal = j.id_jadwal) INNER JOIN nqtemp as n ON a.no_nik = n.no_nik) WHERE a.status_antrian = 2 AND a.id_user = $id_user AND a.tgl_antrian LIKE '$today_date%' ";
				$result = $this->db->query($query)->result();
				if(empty($result)){
					$this->response(array('message' => "data tidak ditemukan"));
				}
				else{
					$this->response(
						array(
							'message' => "data ditemukan",
							'result' => $result
					));
				}
		}

		public function getHistoryAntrian_post(){
				$id_user = $this->post('id_user');
				$query = "SELECT r.nama_rs,p.nama_poli,d.nama_dokter,a.no_antrian,a.tgl_antrian,n.nama_pasien FROM (((((antrian as a INNER JOIN rumahsakit as r ON a.id_rs = r.id_rs) INNER JOIN poliklinik as p ON a.id_poli = p.id_poli) INNER JOIN dokter as d ON d.id_poli = p.id_poli) INNER JOIN jadwal as j ON a.id_jadwal = j.id_jadwal) INNER JOIN nqtemp as n ON a.no_nik = n.no_nik) WHERE a.status_antrian = 3 AND a.id_user = $id_user ORDER BY a.tgl_antrian DESC";		
				$result = $this->db->query($query)->result();
				
				if(empty($result)){
					$this->response(array('message' => "data tidak ditemukan"));
				}
				else{
					$this->response(
						array(
							'message' => "data ditemukan",
							'result' => $result
					));
				}
		}

		public function getProfilUser_post(){
				$id_user = $this->post('id_user');
				$this->db->where('id_user',$id_user);
				$result = $this->db->get('user')->result();	

				
				if(empty($result)){
					$this->response(array('message' => "data tidak ditemukan"));
				}
				else{
					$this->response(
						array(
							'message' => "data ditemukan",
							'result' => $result
					));
				}
		}

		public function postEditProfilUser_post()
		{
			$id_user = $this->post('id_user');
			$data = array(
				'nama_user' => $this->post('nama_user'),
				'tgllahir_user' => $this->post('tgllahir_user'),
				'alamat_user' => $this->post('alamat_user'),
				'telepon_user' => $this->post('telepon_user'),
				'jk_user' => $this->post('jk_user'),
				'goldar_user' => $this->post('goldar_user'),
				'no_nik' => $this->post('no_nik')
			);
			$this->db->where('id_user',$id_user);
			$update = $this->db->update('user',$data);
			if ($update) {
				$this->response(array('status' => 'success'));
			} else {
				$this->response(array('status' => 'fail'));
			}
		}

		public function batalkanantrian_post()
		{
			$id_antrian = $this->post('id_antrian');
			$data = array(
				'status_antrian' => 4
			);
			$this->db->where('id_antrian',$id_antrian);
			$update = $this->db->update('antrian',$data);
			if ($update) {
				$this->response(array('status' => 'success'));
			} else {
				$this->response(array('status' => 'fail'));
			}
		}

		public function login_post(){
				$email_user = $this->post('email_user');
				$password_user = $this->post('password_user');
				$this->db->where('email_user',$email_user);
				$this->db->where('password_user',$password_user		);
				$result = $this->db->get('user')->result();	

				
				if(empty($result)){
					$this->response(array('message' => "data tidak ditemukan"));
				}
				else{
					$this->response(
						array(
							'message' => "data ditemukan",
							'result' => $result
					));
				}
		}

		public function register_post()
		{
			$email_user = $this->post('email_user');
			$this->db->where('email_user',$email_user);
			$result = $this->db->get('user')->result();

			if (!empty($result)) {
				$this->response(array('status' => 'email sudah terdaftar'));
			}else{
				$data = array(
				'nama_user' => $this->post('nama_user'),
				'email_user' => $this->post('email_user'),
				'telepon_user' => $this->post('telepon_user'),
				'password_user' => $this->post('password_user')
				);
				$insert = $this->db->insert('user',$data);
				$this->response(array('status' => 'success'));
			}
			
		}

		public function cekpasienlama_post(){
				$no_nik = $this->post('no_nik');

				$this->db->where('no_nik',$no_nik);
				$result = $this->db->get('nqtemp')->result();
				
				if(empty($result)){
					$this->response(array('message' => "data tidak ditemukan"));
				}
				else{
					$this->response(
						array(
							'message' => "data ditemukan",
							'result' => $result
					));
				}
		}
		
	}
?>