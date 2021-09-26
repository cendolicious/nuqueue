<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
    {
		parent::__construct();
		$this->load->model('crud_m');
    }

    /////////////////////////
	//LANDINGPAGE PLAYGROUND
	////////////////////////

	public function index()
	{
		$this->load->view('landingpage');
	}

	public function login()
	{

		$email_rs = $this->input->post('email');
		$pass_rs  = $this->input->post('password');
		$getDataRS = $this->db->get_where('tbl_user',array('email' => $email_rs, 'password' => md5($pass_rs)))->row();
		
		$failed =  $this->session->userdata('failed_login_'+$email_rs);

		if(!$failed){
			$this->session->set_userdata('failed_login_'+$email_rs, 0);
		} 
		

		if (empty($getDataRS)) {
		
			if ($failed<=3){
				$failed += 1;
				$this->session->set_userdata('failed_login_'+$email_rs, $failed);
			}

			$this->load->view('landingpage');
			if($failed>=3) {
				echo "<div style='padding-top:1cm;color:white;'><b><center>Gagal Login 3 Kali! Silahkan coba lagi dalam beberapa saat.</center></b></div>";
			}
			echo "<div style='padding-top:1cm;color:white;'><b><center>Email/Password salah!</center></b></div>";

		}else{ 
			$this->session->set_userdata('email_rs',$getDataRS->email);
			// $this->session->set_userdata('nama_rs',$getDataRS->nama_rs);
			$this->session->set_userdata('id_users',$getDataRS->id_users);
			$this->session->set_userdata('fullname',$getDataRS->full_name);
			// $this->session->set_userdata('alamat_rs',$getDataRS->alamat_rs);
			// $this->session->set_userdata('telepon_rs',$getDataRS->telepon_rs);
			redirect('dashboardCS/dashboard_cs');
		}
		
	}

	public function keluar()
	{
		session_destroy();
		redirect('');
	}

	public function daftar_rs()
	{
		$nama_rs = $this->input->post('name');
		$alamat_rs = $this->input->post('address');
		$telepon_rs = $this->input->post('phone');
		$email_rs = $this->input->post('email');
		$pass_rs  = $this->input->post('password');

		$data = array(
		"nama_rs" => $nama_rs,
		"alamat_rs" => $alamat_rs,
		"telepon_rs" => $telepon_rs,
		"email_rs" => $email_rs,
		"password_rs" => $pass_rs
		);
		$this->crud_m->insertData('rumahsakit',$data);

		$getDataRS = $this->db->get_where('rumahsakit',array('email_rs' => $email_rs, 'password_rs' => $pass_rs))->row();

		$this->session->set_userdata('email_rs',$getDataRS->email_rs);
		$this->session->set_userdata('nama_rs',$getDataRS->nama_rs);
		$this->session->set_userdata('id_rs',$getDataRS->id_rs);
		$this->session->set_userdata('alamat_rs',$getDataRS->alamat_rs);
		$this->session->set_userdata('telepon_rs',$getDataRS->telepon_rs);

		redirect('dashboardCS/dashboard_rs');
	}

	//////////////////
	//ADMIN PLAYGROUND
	//////////////////

	public function dashboard_admin()
	{
		$where = array(
				'email_rs' => $this->session->userdata('email_rs')
			);
			$data['user_rs'] = $this->crud_m->ambilData('rumahsakit',$where);
			$data['jml_pending'] = $this->crud_m->getRSPending();
			$data['jml_ban'] = $this->crud_m->getRSBanned();
			$data['jml_verified'] = $this->crud_m->getRSVerified();
			$this->load->view('dashboard_admin',$data);
	}


	public function kelola_rs()
	{
		$data['jml_pending'] = $this->crud_m->getRSPending();
		$data['jml_ban'] = $this->crud_m->getRSBanned();
		$data['jml_verified'] = $this->crud_m->getRSVerified();
		$data['rumahsakit'] = $this->crud_m->getAllRS();
		$this->load->view('kelolars_admin',$data);
	}

	public function blokir_rs($id)
	{
		$data = array(
		          'status_rs' => 0
		          );
		$where = array(
		          'id_rs' => $id
		          );
		      $this->crud_m->updateData('rumahsakit',$data,$where);
		      redirect('dashboardCS/kelola_rs');
	}

	public function aktivasi_rs($id)
	{
		$data = array(
		          'status_rs' => 1
		          );
		$where = array(
		          'id_rs' => $id
		          );
		      $this->crud_m->updateData('rumahsakit',$data,$where);
		      redirect('dashboardCS/kelola_rs');
	}


	//////////////////
	//RS PLAYGROUND
	//////////////////

	public function dashboard_rs()
	{
		$where = array(
				'id_rs' => $this->session->userdata('id_rs')
			);
		// $data['user_rs'] = $this->crud_m->ambilData('rumahsakit',$where);
		$data['data_poli'] = $this->crud_m->ambilData('tbl_poli',$where);
		$data['data_dokter'] = $this->crud_m->ambilData('tbl_dokter',$where);
		$data['data_jadwal'] = $this->crud_m->ambilData('tbl_jadwal_praktek_dokter',$where);
		$data['data_cs']= $this->crud_m->ambilData('tbl_user',$where);
 		$this->load->view('dashboard_rs',$data);
	}

	public function buka_rs()
	{
		$data = array(
		          'status_rs' => 1
		          );
		$where = array(
		          'id_rs' => $this->session->userdata('id_rs')
		          );
		      $this->crud_m->updateData('rumahsakit',$data,$where);
		      redirect('dashboardCS/dashboard_rs');
	}

	public function tutup_rs()
	{
		$data = array(
		          'status_rs' => 2
		          );
		$where = array(
		          'id_rs' => $this->session->userdata('id_rs')
		          );
		      $this->crud_m->updateData('rumahsakit',$data,$where);
		      redirect('dashboardCS/dashboard_rs');
	}

	public function edit_api($id_rs)
	{

		$where = array(
				'id_rs' => $this->session->userdata('id_rs')
			);

		$data['data_poli'] = $this->crud_m->ambilData('poliklinik',$where);
		$data['data_dokter'] = $this->crud_m->ambilData('dokter',$where);
		$data['data_jadwal'] = $this->crud_m->ambilData('jadwal',$where);
		$data['data_cs']= $this->crud_m->ambilData('cs',$where);

		$where2 = array(
			'id_rs' => $id_rs
		);
		$data['detail_rs'] = $this->crud_m->ambilData('rumahsakit',$where2);
		$this->load->view('edit_api',$data);
	}

	public function aksi_edit_api()
	{

		$url_api = $this->input->post('url_api');
		$id_rs = $this->session->userdata('id_rs');

		$data = array(
		          'url_api' => $url_api
		          );
		$where = array(
		          'id_rs' => $id_rs
		          );

		$this->crud_m->updateData('rumahsakit',$data,$where);
		redirect('dashboardCS/dashboard_rs');
	}

	public function kelola_poli()
	{
		$where = array(
				'id_rs' => $this->session->userdata('id_rs')
			);

		$data['data_poli'] = $this->crud_m->ambilData('poliklinik',$where);
		$data['data_dokter'] = $this->crud_m->ambilData('dokter',$where);
		$data['data_jadwal'] = $this->crud_m->ambilData('jadwal',$where);
		$data['data_cs']= $this->crud_m->ambilData('cs',$where);

		$data['poliklinik'] = $this->crud_m->getAllPolilByIDRS($this->session->userdata('id_rs'));
		$this->load->view('kelola_poli',$data);
	}

	public function tambah_poli()
	{
		$nama_poli = $this->input->post('nama_poli');
		$id_rs = $this->session->userdata('id_rs');

		$data = array(
		"nama_poli" => $nama_poli,
		"id_rs" => $id_rs
		);
		$this->crud_m->insertData('poliklinik',$data);

		redirect('dashboardCS/kelola_poli');
	}

	public function hapus_poli($id_poli)
	{
		$where = array(
			'id_poli' => $id_poli
		);
		$this->crud_m->deleteData('poliklinik',$where);
		redirect('dashboardCS/kelola_poli');
	}

	public function edit_poli($id_poli)
	{

		$where = array(
				'id_rs' => $this->session->userdata('id_rs')
			);

		$data['data_poli'] = $this->crud_m->ambilData('poliklinik',$where);
		$data['data_dokter'] = $this->crud_m->ambilData('dokter',$where);
		$data['data_jadwal'] = $this->crud_m->ambilData('jadwal',$where);
		$data['data_cs']= $this->crud_m->ambilData('cs',$where);

		$where2 = array(
			'id_poli' => $id_poli
		);
		$data['detail_poli'] = $this->crud_m->ambilData('poliklinik',$where2);
		$this->load->view('edit_poli',$data);
	}

	public function aksi_edit_poli()
	{

		$nama_poli = $this->input->post('nama_poli');
		$id_poli = $this->input->post('id_poli');

		$data = array(
		          'nama_poli' => $nama_poli
		          );
		$where = array(
		          'id_poli' => $id_poli
		          );

		$this->crud_m->updateData('poliklinik',$data,$where);
		redirect('dashboardCS/kelola_poli');
	}

	public function kelola_dokter()
	{
		$where = array(
				'id_rs' => $this->session->userdata('id_rs')
			);

		$data['data_poli'] = $this->crud_m->ambilData('poliklinik',$where);
		$data['data_dokter'] = $this->crud_m->ambilData('dokter',$where);
		$data['data_jadwal'] = $this->crud_m->ambilData('jadwal',$where);
		$data['data_cs']= $this->crud_m->ambilData('cs',$where);

		$data['dokter'] = $this->crud_m->getAllDoctor();
		$this->load->view('kelola_dokter',$data);
	}

	public function tambah_dokter()
	{
		$nama_dokter = $this->input->post('nama_dokter');
		$id_poli = $this->input->post('id_poli');
		$id_rs = $this->session->userdata('id_rs');

		$data = array(
		"nama_dokter" => $nama_dokter,
		"id_poli" => $id_poli,
		"id_rs" => $id_rs
		);
		$this->crud_m->insertData('dokter',$data);

		redirect('dashboardCS/kelola_dokter');
	}

	public function hapus_dokter($id_dokter)
	{
		$where = array(
			'id_dokter' => $id_dokter
		);
		$this->crud_m->deleteData('dokter',$where);
		redirect('dashboardCS/kelola_dokter');
	}

	public function edit_dokter($id_dokter)
	{

		$where = array(
				'id_rs' => $this->session->userdata('id_rs')
			);

		$data['data_poli'] = $this->crud_m->ambilData('poliklinik',$where);
		$data['data_dokter'] = $this->crud_m->ambilData('dokter',$where);
		$data['data_jadwal'] = $this->crud_m->ambilData('jadwal',$where);
		$data['data_cs']= $this->crud_m->ambilData('cs',$where);

		$where2 = array(
			'id_dokter' => $id_dokter
		);
		$data['detail_dokter'] = $this->crud_m->ambilData('dokter',$where2);
		$this->load->view('edit_dokter',$data);
	}

	public function aksi_edit_dokter()
	{
		$nama_dokter = $this->input->post('nama_dokter');
		$id_poli = $this->input->post('id_poli');
		$id_dokter = $this->input->post('id_dokter');

		$data = array(
		          'nama_dokter' => $nama_dokter,
		          'id_poli' => $id_poli
		          );
		$where = array(
		          'id_dokter' => $id_dokter
		          );

		$this->crud_m->updateData('dokter',$data,$where);
		redirect('dashboardCS/kelola_dokter');
	}

	public function kelola_jadwal()
	{
		$where = array(
				'id_rs' => $this->session->userdata('id_rs')
			);

		$data['data_poli'] = $this->crud_m->ambilData('poliklinik',$where);
		$data['data_dokter'] = $this->crud_m->ambilData('dokter',$where);
		$data['data_jadwal'] = $this->crud_m->ambilData('jadwal',$where);
		$data['data_cs']= $this->crud_m->ambilData('cs',$where);
		$data['poli_with_dokter'] = $this->crud_m->getPoliWithDokter($this->session->userdata('id_rs'));

		$data['jadwal'] = $this->crud_m->getAllJadwalByIDRS($this->session->userdata('id_rs'));
		$this->load->view('kelola_jadwal',$data);
	}

	public function hapus_jadwal($id_jadwal)
	{
		$where = array(
			'id_jadwal' => $id_jadwal
		);
		$this->crud_m->deleteData('jadwal',$where);
		redirect('dashboardCS/kelola_jadwal');
	}

	public function tambah_jadwal()
	{
		$jammulai_poli = $this->input->post('jammulai_poli');
		$jamselesai_poli = $this->input->post('jamselesai_poli');
		$jadwal_poli = $this->input->post('jadwal_poli');
		$id_dokter = $this->input->post('id_dokter');

		$where = array(
				'id_dokter' => $id_dokter
			);

		$data_dokter = $this->crud_m->ambilData('dokter',$where)->row();
		$id_poli = $data_dokter->id_poli;


		$id_rs = $this->session->userdata('id_rs');

		$data = array(
		"jadwal_poli" => $jadwal_poli,
		"jammulai_poli" => $jammulai_poli,
		"jamselesai_poli" => $jamselesai_poli,
		"id_poli" => $id_poli,
		"id_rs" => $id_rs,
		"id_dokter" => $id_dokter
		);
		$this->crud_m->insertData('jadwal',$data);

		redirect('dashboardCS/kelola_jadwal');
	}

	public function edit_jadwal($id_jadwal)
	{

		$where = array(
				'id_rs' => $this->session->userdata('id_rs')
			);

		$data['data_poli'] = $this->crud_m->ambilData('poliklinik',$where);
		$data['data_dokter'] = $this->crud_m->ambilData('dokter',$where);
		$data['data_jadwal'] = $this->crud_m->ambilData('jadwal',$where);
		$data['data_cs']= $this->crud_m->ambilData('cs',$where);

		$data['detail_jadwal'] = $this->crud_m->getJadwalByID($id_jadwal);
		$this->load->view('edit_jadwal',$data);
	}

	public function aksi_edit_jadwal()
	{
		$id_jadwal = $this->input->post('id_jadwal');
		$id_poli = $this->input->post('id_poli');
		$id_dokter = $this->input->post('id_dokter');
		$jadwal_poli = $this->input->post('jadwal_poli');
		$jammulai_poli = $this->input->post('jammulai_poli');
		$jamselesai_poli = $this->input->post('jamselesai_poli');

		$data = array(
		          'id_dokter' => $id_dokter,
		          'id_poli' => $id_poli,
       	          'jadwal_poli' => $jadwal_poli,
		          'jammulai_poli' => $jammulai_poli,
		          'jamselesai_poli' => $jamselesai_poli
		          );
		$where = array(
		          'id_jadwal' => $id_jadwal
		          );

		$this->crud_m->updateData('jadwal',$data,$where);
		redirect('dashboardCS/kelola_jadwal');
	}


	public function kelola_cs()
	{
		$where = array(
				'id_rs' => $this->session->userdata('id_rs')
			);

		$data['data_poli'] = $this->crud_m->ambilData('poliklinik',$where);
		$data['data_dokter'] = $this->crud_m->ambilData('dokter',$where);
		$data['data_jadwal'] = $this->crud_m->ambilData('jadwal',$where);
		$data['data_cs']= $this->crud_m->ambilData('cs',$where);

		$this->load->view('kelola_cs',$data);
	}

	public function tambah_cs()
	{
		$nama_cs = $this->input->post('nama_cs');
		$pass_cs = $this->input->post('password_cs');
		$username_cs = $this->input->post('username_cs');
		$id_rs = $this->session->userdata('id_rs');

		$data = array(
		"nama_cs" => $nama_cs,
		"username_cs" => $username_cs,
		"password_cs" => $pass_cs,
		"id_rs" => $id_rs
		);
		$this->crud_m->insertData('cs',$data);

		redirect('dashboardCS/kelola_cs');
	}

	public function edit_cs($id_cs)
	{

		$where = array(
				'id_rs' => $this->session->userdata('id_rs')
			);

		$data['data_poli'] = $this->crud_m->ambilData('poliklinik',$where);
		$data['data_dokter'] = $this->crud_m->ambilData('dokter',$where);
		$data['data_jadwal'] = $this->crud_m->ambilData('jadwal',$where);
		$data['data_cs']= $this->crud_m->ambilData('cs',$where);

		$where2 = array(
			'id_cs' => $id_cs
		);
		$data['detail_cs'] = $this->crud_m->ambilData('cs',$where2);
		$this->load->view('edit_cs',$data);
	}

	public function aksi_edit_cs()
	{
		$id_cs = $this->input->post('id_cs');
		$nama_cs = $this->input->post('nama_cs');
		$pass_cs = $this->input->post('password_cs');
		$username_cs = $this->input->post('username_cs');

		$data = array(
		          'nama_cs' => $nama_cs,
       	          'username_cs' => $username_cs,
		          'password_cs' => $pass_cs
		          );
		$where = array(
		          'id_cs' => $id_cs
		          );

		$this->crud_m->updateData('cs',$data,$where);
		redirect('dashboardCS/kelola_cs');
	}

	public function filter()
	{
		$nama_kab = $this->input->post('kabupaten');
		$tipe_media = $this->input->post('media');
		$data['data_filter'] = $this->crud_m->filter($nama_kab,$tipe_media);
		$this->load->view('hasil_filter',$data);
	}

	public function profil_rs()
	{
		$where = array(
				'id_rs' => $this->session->userdata('id_rs')
			);

		$data['data_rs'] = $this->crud_m->ambilData('rumahsakit',$where);
		$data['data_poli'] = $this->crud_m->ambilData('poliklinik',$where);
		$data['data_dokter'] = $this->crud_m->ambilData('dokter',$where);
		$data['data_jadwal'] = $this->crud_m->ambilData('jadwal',$where);
		$data['data_cs']= $this->crud_m->ambilData('cs',$where);

		$this->load->view('profil_rs',$data);
	}

	public function edit_profil_rs()
	{

		$where = array(
				'id_rs' => $this->session->userdata('id_rs')
			);

		$data['data_poli'] = $this->crud_m->ambilData('poliklinik',$where);
		$data['data_dokter'] = $this->crud_m->ambilData('dokter',$where);
		$data['data_jadwal'] = $this->crud_m->ambilData('jadwal',$where);
		$data['data_cs']= $this->crud_m->ambilData('cs',$where);
		$data['data_rs']= $this->crud_m->ambilData('rumahsakit',$where);

		$this->load->view('edit_profil_rs',$data);
	}

	public function aksi_edit_profil()
	{

		$id_rs = $this->input->post('id_rs');
		$nama_rs = $this->input->post('nama_rs');
		$password_rs = $this->input->post('password_rs');
		$alamat_rs = $this->input->post('alamat_rs');
		$telepon_rs = $this->input->post('telepon_rs');
		$deskripsi_rs = $this->input->post('deskripsi_rs');
		$email_rs = $this->input->post('email_rs');
		$lat_rs = $this->input->post('lat_rs');
		$lon_rs = $this->input->post('lon_rs');

		$data = array(
		          'nama_rs' => $nama_rs,
		          'password_rs' => $password_rs,
       	          'alamat_rs' => $alamat_rs,
		          'telepon_rs' => $telepon_rs,
		          'email_rs' => $email_rs,
		          'lat_rs' => $lat_rs,
		          'lon_rs' => $lon_rs,
		          'deskripsi_rs' => $deskripsi_rs
		          );
		$where = array(
		          'id_rs' => $id_rs
		          );

		$this->crud_m->updateData('rumahsakit',$data,$where);
		redirect('dashboardCS/profil_rs');
	}

	//////////////////
	//CS PLAYGROUND
	//////////////////

	// public function login_cs()
	// {
	// 	$username_cs = $this->input->post('username_cs');
	// 	$pass_cs  = $this->input->post('password_cs');
	// 	$getDataCS = $this->db->get_where('cs',array('username_cs' => $username_cs, 'password_cs' => $pass_cs))->row();

	// 	if (empty($getDataCS)) {
	// 			$this->load->view('landingpage');
	// 	echo "<div style='padding-top:1cm;color:white;'><b><center>Username/Password salah!</center></b></div>";
	// 	}else{
	// 		$this->session->set_userdata('id_cs',$getDataCS->id_cs);
	// 		$this->session->set_userdata('nama_cs',$getDataCS->nama_cs);
	// 		$this->session->set_userdata('username_cs',$getDataCS->username_cs);
	// 		$this->session->set_userdata('password_cs',$getDataCS->password_cs);
	// 		$this->session->set_userdata('id_rs',$getDataCS->id_rs);
	
	// 		redirect('dashboardCS/dashboard_cs');
	// 	}
		
	// }

	public function dashboard_cs()
	{
		$where = array(
		 		'id_users' => $this->session->userdata('id_users')
		);
		$where2 = array(
			'id' => 1 
		);
		$data['data_cs'] = $this->crud_m->ambilData('tbl_user', $where);
 		$data['data_rs'] = $this->crud_m->ambilData('tbl_profil_rumah_sakit',$where2);
 		$this->load->view('dashboard_cs',$data);
	}

	public function kelola_antrian()
	{
		$where = array(
				'id_rs' => $this->session->userdata('id_rs')
			);

		$data['data_poli'] = $this->crud_m->ambilData('poliklinik',$where);

		$this->load->view('kelola_antrian_pilih_poli',$data);
	}

	public function kelola_antrian_poli($id_poli)
	{
		$data['id_poli'] = $id_poli;
		$this->session->set_userdata('id_poli',$id_poli);
		$where = array(
				'id_poli' => $id_poli
			);
		$data['data_poli'] = $this->crud_m->ambilData('poliklinik',$where);
		$data['data_jadwal'] = $this->crud_m->getJadwalWithDokter($id_poli);


		$where2 = array(
				'id_rs' => $this->session->userdata('id_rs')
			);
		$data['data_rs'] = $this->crud_m->ambilData('rumahsakit',$where2);	
		$this->load->view('kelola_antrian_pilih_jadwal',$data);
	}

	public function kelola_antrian_jadwal($id_poli,$id_jadwal,$after = NULL)
	{

		if ($after != NULL) {
			$query = "SELECT * FROM antrian ORDER BY id_antrian DESC LIMIT 1";
			$resultquery = $this->db->query($query);
		foreach ($resultquery->result() as $row) {

			$this->load->library('tcpdf/tcpdf');

		$pdf = new tcpdf();
		$orientation = 'L'; //'L';
		$format = 'A6';
		$keepmargins = false;
		$tocpage = false;

		$pdf->AddPage($orientation, $format, $keepmargins, $tocpage);

		$family = 'dejavusans';
		$style = '';
		$size = '12';
		$pdf->SetFont($family,$style,$size);

		$html = '<br><h1 style="color:black;text-align:center;">TIKET ANTRIAN</h1>';
		$query2 = "SELECT * FROM rumahsakit WHERE id_rs = ".$row->id_rs;
			$resultquery2 = $this->db->query($query2);
		foreach ($resultquery2->result() as $row2) {
			$html .= '<div style="color:black;text-align:center;">'.$row2->nama_rs.' - ';
		}
		$query3 = "SELECT * FROM poliklinik WHERE id_poli = ".$row->id_poli;
			$resultquery3 = $this->db->query($query3);
		foreach ($resultquery3->result() as $row2) {
			$html .= ''.$row2->nama_poli.' - ';
		}
		$html .= ''.$row->tgl_antrian.'</div>';
		$html .= '<hr><hr><hr>';
		$html .= '<br><br><h6 style="color:black;text-align:center;">Pasien dengan NIK '.$row->no_nik.' telah terdaftar dengan </h6>';
		$html .= '<br><br><h2 style="color:black;text-align:center;"> No. Antrian : '.$row->no_antrian.'</h2>';
		

		$html .= '<br><hr><hr><hr><br>';
		$html .= '<br><br><h6 style="color:black;text-align:center;">*Tiket ini hanya berlaku selama 1 hari*</h6>';
		$html .= '<br><br><h4 style="color:black;text-align:center;">-------NUQUEUE-------</h4>';
		$html .= '<h5 style="color:black;text-align:center;">Sistem Informasi Antrian Terintegrasi</h5>';

		$ln = true;
		$fill = false;
		$reseth = false;
		$cell = false;
		$align = '';
		
		$pdf->writeHTML($html, $ln, $fill, $reseth, $cell,$align);

		//$pdf->Output();
		$name = '/TIKET-'.$row->no_antrian.'.pdf';
		$dest = 'I'; //'I','F','D'
		$pdf->Output($name,$dest);
		}
		}
		

		$where = array(
				'id_jadwal' => $id_jadwal
			);
		$data['data_antrian'] = $this->crud_m->ambilData('antrian',$where);

		$where2 = array(
				'id_poli' => $id_poli
			);
		$data['data_poli'] = $this->crud_m->ambilData('poliklinik',$where2);

		$where3 = array(
				'id_rs' => $this->session->userdata('id_rs')
			);
		$data['data_rs'] = $this->crud_m->ambilData('rumahsakit',$where3);

		$data['data_jadwal'] = $this->crud_m->getJadwalWithDokterAndPoli($id_poli,$id_jadwal);

		$data['jml_antrian'] = $this->crud_m->getJmlAntrian($this->session->userdata('id_rs'),$id_poli,$id_jadwal);

		$data['data_list_antrian'] = $this->crud_m->listDataAntrian($id_jadwal);
		$data['data_antrian_saat_ini'] = $this->crud_m->antrianSaatIni($id_jadwal);
		
		$this->load->view('kelola_antrian',$data);
	}

	public function tampil_antrian()
	{
		$where = array(
				'id_rs' => $this->session->userdata('id_rs')
			);

		$data['data_poli'] = $this->crud_m->ambilData('poliklinik',$where);

		$this->load->view('tampil_antrian_pilih_poli',$data);
	}

	public function tampil_antrian_poli($id_poli)
	{
		$data['id_poli'] = $id_poli;
		$this->session->set_userdata('id_poli',$id_poli);
		$where = array(
				'id_poli' => $id_poli
			);
		$data['data_poli'] = $this->crud_m->ambilData('poliklinik',$where);
		$data['data_jadwal'] = $this->crud_m->getJadwalWithDokter($id_poli);


		$where2 = array(
				'id_rs' => $this->session->userdata('id_rs')
			);
		$data['data_rs'] = $this->crud_m->ambilData('rumahsakit',$where2);	
		$this->load->view('tampil_antrian_pilih_jadwal',$data);
	}

	public function tampil_antrian_jadwal($id_poli,$id_jadwal)
	{
		$where = array(
				'id_jadwal' => $id_jadwal
			);
		$data['data_antrian'] = $this->crud_m->ambilData('antrian',$where);

		$where2 = array(
				'id_poli' => $id_poli
			);
		$data['data_poli'] = $this->crud_m->ambilData('poliklinik',$where2);

		$where3 = array(
				'id_rs' => $this->session->userdata('id_rs')
			);
		$data['data_rs'] = $this->crud_m->ambilData('rumahsakit',$where3);

		$data['data_jadwal'] = $this->crud_m->getJadwalWithDokterAndPoli($id_poli,$id_jadwal);

		$data['jml_antrian'] = $this->crud_m->getJmlAntrian($this->session->userdata('id_rs'),$id_poli,$id_jadwal);

		$data['data_list_antrian'] = $this->crud_m->listDataAntrian($id_jadwal);
		$data['data_antrian_saat_ini'] = $this->crud_m->antrianSaatIni($id_jadwal);
		
		$this->load->view('tampil_antrian',$data);
	}

	// public function pasien_baru_onsite()
	// {
	// 	$nik_pasien = $this->input->post('nik_pasien');
	// 	$nama_pasien = $this->input->post('nama_pasien');
	// 	$tgllhr_pasien = $this->input->post('tgllhr_pasien');
	// 	$alamat_pasien = $this->input->post('alamat_pasien');
	// 	$telepon_pasien = $this->input->post('telepon_pasien');
	// 	$jk_pasien = $this->input->post('jk_pasien');
	// 	$goldar_pasien = $this->input->post('goldar_pasien');

	// 	$data = array(
	// 	"nama_pasien" => $nama_pasien,
	// 	"tgllahir_pasien" => $tgllhr_pasien,
	// 	"alamat_pasien" => $alamat_pasien,
	// 	"telepon_pasien" => $telepon_pasien,
	// 	"jk_pasien" => $jk_pasien,
	// 	"goldar_pasien" => $goldar_pasien,
	// 	"no_nik" => $nik_pasien
	// 	);
	// 	$this->crud_m->insertData('nqtemp',$data);

	// 	$id_rs = $this->input->post('id_rs');
	// 	$id_poli = $this->input->post('id_poli');
	// 	$id_jadwal = $this->input->post('id_jadwal');
	// 	$tipe_daftar = $this->input->post('tipe_daftar');

	// 	$getJmlAntrian = $this->crud_m->getJmlAntrian($id_rs,$id_poli,id_jadwal);
	// 	foreach ($getJmlAntrian->result() as $key) {
	// 		if ($key->jml_antrian == 0) {
	// 			$no_antrian = 1;
	// 		}else{
	// 			$no_antrian = $key->jml_antrian+1;
	// 		}
	// 	}

	// 	$data2 = array(
	// 	"id_rs" => $id_rs,
	// 	"id_poli" => $id_poli,
	// 	"id_jadwal" => $id_jadwal,
	// 	"no_antrian" => date(ymd).'-'.$id_rs.$id_poli.$id_jadwal.'-'.$no_antrian,
	// 	"tipe_daftar" => $tipe_daftar,
	// 	"no_nik" => $nik_pasien
	// 	);
	// 	$this->crud_m->insertData('antrian',$data2);



	// 	redirect('dashboardCS/kelola_antrian_jadwal/'.$id_poli.'/'.$id_jadwal);
		
	// }

	public function pasien_lama_onsite()
	{
		$nik_pasien = $this->input->post('nik_pasien');

		$id_rs = $this->input->post('id_rs');
		$id_poli = $this->input->post('id_poli');
		$id_jadwal = $this->input->post('id_jadwal');
		$tipe_daftar = $this->input->post('tipe_daftar');

		$getJmlAntrian = $this->crud_m->getJmlAntrian($id_rs,$id_poli,$id_jadwal);
		foreach ($getJmlAntrian->result() as $key) {
			if ($key->jml_antrian == 0) {
				$no_antrian = 1;
			}else{
				$no_antrian = $key->jml_antrian+1;
			}
		}
		date_default_timezone_set('Asia/Jakarta');
		$today = date('ymd');

		$data2 = array(
		"id_rs" => $id_rs,
		"id_poli" => $id_poli,
		"id_jadwal" => $id_jadwal,
		"no_antrian" => $today.'-'.$id_rs.$id_poli.$id_jadwal.'-'.$no_antrian,
		"tipe_daftar" => $tipe_daftar,
		"no_nik" => $nik_pasien
		);
		$this->crud_m->insertData('antrian',$data2);

		/*$this->load->library('tcpdf/tcpdf');

		$pdf = new tcpdf();
		$orientation = 'L'; //'L';
		$format = 'A6';
		$keepmargins = false;
		$tocpage = false;

		$pdf->AddPage($orientation, $format, $keepmargins, $tocpage);

		$family = 'dejavusans';
		$style = '';
		$size = '12';
		$pdf->SetFont($family,$style,$size);

		$html = '<br><h1 style="color:black;text-align:center;">TIKET ANTRIAN</h1>';
		$html .= '<br><hr><hr><hr><br>';
		$html .= '<br><hr><hr><hr><br>';
		$query = $this->crud_m->ambilData('rumahsakit',$id_rs);
		foreach ($query->result() as $row) {
			$html .= '<br><br><h4 style="color:black;text-align:center;">'.$row->nama_rs.'</h4>';
		}
		$query2 = $this->crud_m->ambilData('poliklinik',$id_poli);
		foreach ($query2->result() as $row) {
			$html .= '<br><br><h5 style="color:black;text-align:center;">'.$row->nama_poli.'</h5>';
		}
		$html .= '<br><br><h2 style="color:black;text-align:center;">'.$today.'-'.$id_rs.$id_poli.$id_jadwal.'-'.$no_antrian.'</h2>';
		$html .= '<br><br><h5 style="color:black;text-align:center;">Pasien dengan NIK '.$nik_pasien.' telah terdaftar</h5>';

$html .= '<br><hr><hr><hr><br>';
$html .= '<br><br><h4 style="color:black;text-align:center;">-------NUQUEUE-------</h4>';
$html .= '<h5 style="color:black;text-align:center;">Sistem Informasi Antrian Terintegrasi</h5>';

		$ln = true;
		$fill = false;
		$reseth = false;
		$cell = false;
		$align = '';
		
		$pdf->writeHTML($html, $ln, $fill, $reseth, $cell,$align);

		//$pdf->Output();
		$name = '/TIKET-'.$today.'-'.$id_rs.$id_poli.$id_jadwal.'-'.$no_antrian.'.pdf';
		$dest = 'I'; //'I','F','D'
		$pdf->Output($name,$dest);*/
		redirect('dashboardCS/kelola_antrian_jadwal/'.$id_poli.'/'.$id_jadwal.'/1');
		
	}


	public function panggil_antrian()
	{

		$id_rs = $this->input->post('id_rs');
		$id_poli = $this->input->post('id_poli');
		$id_jadwal = $this->input->post('id_jadwal');
		$no_antrian_selanjutnya = $this->input->post('no_antrian_selanjutnya');

		$data = array(
		          'status_antrian' => 1
		          );
		$where = array(
		          'no_antrian' => $no_antrian_selanjutnya
		          );

		$cekAntrianSaatIni = $this->crud_m->cekAntrianSaatIni($id_jadwal);

		if (empty($cekAntrianSaatIni->result())) {
			$this->crud_m->updateData('antrian',$data,$where);
		}else{
			foreach ($cekAntrianSaatIni->result() as $key) {
				$antrian_saat_ini = $key->no_antrian;
			}
			$data2 = array(
		          'status_antrian' => 3
		          );
		$where2 = array(
		          'no_antrian' => $antrian_saat_ini
		          );
			$this->crud_m->updateData('antrian',$data2,$where2);
			$this->crud_m->updateData('antrian',$data,$where);
		}

		
		redirect('dashboardCS/kelola_antrian_jadwal/'.$id_poli.'/'.$id_jadwal);
	}



}
