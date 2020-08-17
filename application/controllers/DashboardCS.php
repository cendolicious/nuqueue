<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Makassar');

class DashboardCS extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		is_login();
		$this->load->model('crud_m');
	}

	public function index()
	{
		$this->load->view('dashboard_cs');
	}

	public function dashboard_cs()
	{
		$where = array(
			'id_users' => $this->session->userdata('id_users')
		);
		$where2 = array(
			'id' => 1
		);
		$data['data_cs'] = $this->crud_m->ambilData('tbl_user', $where);
		$data['data_rs'] = $this->crud_m->ambilData('tbl_profil_rumah_sakit', $where2);
		$this->load->view('dashboard_cs', $data);
	}

	public function kelola_antrian()
	{
		$data['data_poli'] = $this->crud_m->ambilData('tbl_poliklinik');

		$this->load->view('kelola_antrian_pilih_poli', $data);
	}

	public function kelola_antrian_poli($id_poli)
	{
		$data['id_poli'] = $id_poli;
		$this->session->set_userdata('id_poli', $id_poli);
		$where = array(
			'id_poli' => $id_poli
		);
		$data['data_poli'] = $this->crud_m->ambilData('tbl_poliklinik');
		$data['data_jadwal'] = $this->crud_m->getJadwalWithDokter($id_poli);

		$where2 = array(
			'id' => 1
		);
		$data['data_rs'] = $this->crud_m->ambilData('tbl_profil_rumah_sakit', $where2);
		$this->load->view('kelola_antrian_pilih_jadwal', $data);
	}

	public function kelola_antrian_jadwal($id_poli, $id_jadwal, $after = NULL)
	{

		if ($after != NULL) {
			$query = "SELECT * FROM tbl_antrian ORDER BY id_antrian DESC LIMIT 1";
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
				$pdf->SetFont($family, $style, $size);

				$html = '<br><h1 style="color:black;text-align:center;">TIKET ANTRIAN</h1>';
				$query2 = "SELECT * FROM tbl_profil_rumah_sakit WHERE id = 1";
				$resultquery2 = $this->db->query($query2);
				foreach ($resultquery2->result() as $row2) {
					$html .= '<div style="color:black;text-align:center;">' . $row2->nama_rumah_sakit . ' - ';
				}
				$query3 = "SELECT * FROM tbl_poliklinik WHERE id_poliklinik = " . $row->id_poli;
				$resultquery3 = $this->db->query($query3);
				foreach ($resultquery3->result() as $row2) {
					$html .= 'Poli ' . $row2->nama_poliklinik . ' - ';
				}
				$html .= '' . $row->tgl_periksa . '</div>';
				$html .= '<hr><hr><hr>';
				$html .= '<br><br><h6 style="color:black;text-align:center;">Pasien dengan NIK ' . $row->nik . ' telah terdaftar dengan </h6>';
				$html .= '<br><br><h2 style="color:black;text-align:center;"> No. Antrian : ' . $row->no_antrian . '</h2>';


				$html .= '<br><hr><hr><hr><br>';
				$html .= '<br><br><h6 style="color:black;text-align:center;">*Tiket ini hanya berlaku selama 1 hari*</h6>';
				$html .= '<br><br><h4 style="color:black;text-align:center;">--------------</h4>';
				$html .= '<h5 style="color:black;text-align:center;">Sistem Informasi Antrian Terintegrasi</h5>';

				$ln = true;
				$fill = false;
				$reseth = false;
				$cell = false;
				$align = '';

				$pdf->writeHTML($html, $ln, $fill, $reseth, $cell, $align);

				//$pdf->Output();
				$name = '/TIKET-' . $row->no_antrian . '.pdf';
				$dest = 'I'; //'I','F','D'
				$pdf->Output($name, $dest);
			}
		}


		$where = array(
			'id_jadwal' => $id_jadwal
		);
		$data['data_antrian'] = $this->crud_m->ambilData('tbl_antrian', $where);

		$where2 = array(
			'id_poliklinik' => $id_poli
		);
		$data['data_poli'] = $this->crud_m->ambilData('tbl_poliklinik', $where2);

		$data['data_jadwal'] = $this->crud_m->getJadwalWithDokterAndPoli($id_poli, $id_jadwal);

		$data['jml_antrian'] = $this->crud_m->getJmlAntrian($id_poli, $id_jadwal);

		$data['data_list_antrian'] = $this->crud_m->listDataAntrian($id_jadwal);
		$data['data_antrian_saat_ini'] = $this->crud_m->antrianSaatIni($id_jadwal);

		$where2 = array(
			'id' => 1
		);
		$data['data_rs'] = $this->crud_m->ambilData('tbl_profil_rumah_sakit', $where2);

		$this->load->view('kelola_antrian', $data);
	}

	public function tampil_antrian()
	{


		$data['data_poli'] = $this->crud_m->ambilData('tbl_poliklinik');

		$this->load->view('tampil_antrian_pilih_poli', $data);
	}

	public function tampil_antrian_poli($id_poli)
	{
		$data['id_poli'] = $id_poli;
		$this->session->set_userdata('id_poli', $id_poli);
		$where = array(
			'id_poliklinik' => $id_poli
		);
		$data['data_poli'] = $this->crud_m->ambilData('tbl_poliklinik', $where);
		$data['data_jadwal'] = $this->crud_m->getJadwalWithDokter($id_poli);


		$where2 = array(
			'id' => 1
		);
		$data['data_rs'] = $this->crud_m->ambilData('tbl_profil_rumah_sakit', $where2);
		$this->load->view('tampil_antrian_pilih_jadwal', $data);
	}

	public function tampil_antrian_jadwal($id_poli, $id_jadwal)
	{
		$where = array(
			'id_jadwal' => $id_jadwal
		);
		$data['data_antrian'] = $this->crud_m->ambilData('tbl_antrian', $where);

		$where2 = array(
			'id_poliklinik' => $id_poli
		);
		$data['data_poli'] = $this->crud_m->ambilData('tbl_poliklinik', $where2);

		$where3 = array(
			'id' => 1
		);
		$data['data_rs'] = $this->crud_m->ambilData('tbl_profil_rumah_sakit', $where3);

		$data['data_jadwal'] = $this->crud_m->getJadwalWithDokterAndPoli($id_poli, $id_jadwal);

		$data['jml_antrian'] = $this->crud_m->getJmlAntrian($ $id_poli, $id_jadwal);

		$data['data_list_antrian'] = $this->crud_m->listDataAntrian($id_jadwal);
		$data['data_antrian_saat_ini'] = $this->crud_m->antrianSaatIni($id_jadwal);

		$this->load->view('tampil_antrian', $data);
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
	// 		"nama_pasien" => $nama_pasien,
	// 		"tgllahir_pasien" => $tgllhr_pasien,
	// 		"alamat_pasien" => $alamat_pasien,
	// 		"telepon_pasien" => $telepon_pasien,
	// 		"jk_pasien" => $jk_pasien,
	// 		"goldar_pasien" => $goldar_pasien,
	// 		"no_nik" => $nik_pasien
	// 	);
	// 	$this->crud_m->insertData('nqtemp', $data);

	// 	$id_rs = $this->input->post('id_rs');
	// 	$id_poli = $this->input->post('id_poli');
	// 	$id_jadwal = $this->input->post('id_jadwal');
	// 	$tipe_daftar = $this->input->post('tipe_daftar');

	// 	$getJmlAntrian = $this->crud_m->getJmlAntrian($id_rs, $id_poli, $id_jadwal);
	// 	foreach ($getJmlAntrian->result() as $key) {
	// 		if ($key->jml_antrian == 0) {
	// 			$no_antrian = 1;
	// 		} else {
	// 			$no_antrian = $key->jml_antrian + 1;
	// 		}
	// 	}

	// 	$data2 = array(
	// 		"id_rs" => $id_rs,
	// 		"id_poli" => $id_poli,
	// 		"id_jadwal" => $id_jadwal,
	// 		"no_antrian" => date(ymd) . '-' . $id_rs . $id_poli . $id_jadwal . '-' . $no_antrian,
	// 		"tipe_daftar" => $tipe_daftar,
	// 		"no_nik" => $nik_pasien
	// 	);
	// 	$this->crud_m->insertData('antrian', $data2);



	// 	redirect('app/kelola_antrian_jadwal/' . $id_poli . '/' . $id_jadwal);
	// }

	public function pasien_lama_onsite()
	{
		$nik_pasien = $this->input->post('nik_pasien');

		$id_poli = $this->input->post('id_poli');
		$id_jadwal = $this->input->post('id_jadwal');
		$kode_poli = $this->input->post('kode_poli');
		$tipe_daftar = $this->input->post('tipe_daftar');

		$getJmlAntrian = $this->crud_m->getJmlAntrian($id_poli, $id_jadwal);
		foreach ($getJmlAntrian->result() as $key) {
			if ($key->jml_antrian == 0) {
				$no_antrian = 1;
			} else {
				$no_antrian = $key->jml_antrian + 1;
			}
		}
		date_default_timezone_set('Asia/Jakarta');
		$today = date('ymd');

		$data2 = array(
			"id_poli" => $id_poli,
			"id_jadwal" => $id_jadwal,
			"no_antrian" => $kode_poli . '-' . $no_antrian,
			"tipe_daftar" => $tipe_daftar,
			"nik" => $nik_pasien
		);
		$this->crud_m->insertData('tbl_antrian', $data2);

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
		redirect('dashboardCS/kelola_antrian_jadwal/' . $id_poli . '/' . $id_jadwal . '/1');
	}


	public function panggil_antrian()
	{

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
			$this->crud_m->updateData('tbl_antrian', $data, $where);
		} else {
			foreach ($cekAntrianSaatIni->result() as $key) {
				$antrian_saat_ini = $key->no_antrian;
			}
			$data2 = array(
				'status_antrian' => 3
			);
			$where2 = array(
				'no_antrian' => $antrian_saat_ini
			);
			$this->crud_m->updateData('tbl_antrian', $data2, $where2);
			$this->crud_m->updateData('tbl_antrian', $data, $where);
		}


		redirect('dashboardCS/kelola_antrian_jadwal/' . $id_poli . '/' . $id_jadwal);
	}
}
