<?php
/**
 * summary
 */
class crud_m extends CI_model
{
    public function ceklogin($tbl,$where){
      return $this->db->get_where($tbl,$where);
    }

    public function ambilSemua($tbl)
    {
    	return $this->db->get($tbl);
    }

    public function ambilData($tbl, $where = null)
    {
    	if ($where) {
    		$this->db->where($where);
    	}
    	return $this->db->get($tbl);
    }

    public function insertData($tbl,$data)
    {
    	$this->db->insert($tbl, $data);
    }

    public function updateData($tbl, $data, $where)
    {
    	$this->db->update($tbl, $data, $where);
    }

    public function deleteData($tbl, $where)
    {
    	$this->db->delete($tbl,$where);
    }

    public function getAllRS()
    {
        $where = array('email_rs !=' => 'admin@nuqueue.com');
        return $this->db->get_where('rumahsakit',$where);
    }

    public function getRSPending()
    {
        $where = array(
            'status_rs' => 3
        );
        return $this->db->get_where('rumahsakit',$where);
    }

    public function getRSVerified()
    {
        $where = "email_rs != 'admin@nuqueue.com' AND (status_rs = 1 OR status_rs = 2)";
        $this->db->where($where);
        return $this->db->get_where('rumahsakit',$where);
    }

    public function getRSBanned()
    {
        $where = array(
            'status_rs' => 0
        );
        return $this->db->get_where('rumahsakit',$where);
    }

    public function getAllPolilByIDRS($id_rs)
    {
        $where = array('id_rs' => $id_rs);
        return $this->db->get_where('poliklinik',$where);
    }

     public function getAllDoctorByIDRS($id_rs)
    {
        $query = "SELECT d.*,p.nama_poli 
                    FROM dokter as d 
                    INNER JOIN poliklinik as p ON d.id_poli = p.id_poli";
        return $this->db->query($query);
    }

    public function getAllJadwalByIDRS($id_rs)
    {
        $query = "SELECT j.*,p.nama_poli,d.nama_dokter 
                    FROM (jadwal as j 
                    INNER JOIN dokter as d ON j.id_dokter = d.id_dokter) 
                    INNER JOIN poliklinik as p ON p.id_poli = j.id_poli";
        return $this->db->query($query);
    }

    public function getJadwalByID($id_jadwal)
    {
        $query = "SELECT j.*,p.nama_poli,d.nama_dokter FROM (jadwal as j INNER JOIN dokter as d ON j.id_dokter = d.id_dokter) INNER JOIN poliklinik as p ON p.id_poli = j.  id_poli WHERE j.id_jadwal = $id_jadwal";
        return $this->db->query($query);
    }

    public function getJmlAntrian($id_poli,$id_jadwal)
    {
        date_default_timezone_set('Asia/Jakarta');
        $today_date = date("Y-m-d");
        $query = "SELECT COUNT(*) as jml_antrian FROM `tbl_antrian` WHERE  id_poli = $id_poli AND id_jadwal = $id_jadwal AND tgl_periksa LIKE '$today_date%'";
        return $this->db->query($query);
    }

    public function listDataAntrian($id_jadwal)
    {
        date_default_timezone_set('Asia/Jakarta');
        $today_date = date("Y-m-d");
        $query = "SELECT DISTINCT a.no_antrian,n.nama_pasien 
                    FROM tbl_antrian as a 
                    INNER JOIN tbl_user as n ON a.nik = n.nik 
                    WHERE a.status_antrian = 2 AND a.id_jadwal = $id_jadwal AND a.tgl_periksa LIKE '$today_date%' ORDER BY a.tgl_periksa";
        return $this->db->query($query);
    }

    public function antrianSaatIni($id_jadwal)
    {
        date_default_timezone_set('Asia/Jakarta');
        $today_date = date("Y-m-d");
        $query = "SELECT a.no_antrian, n.nama_pasien 
                    FROM tbl_antrian as a 
                    INNER JOIN tbl_user as n ON a.nik = n.nik 
                    WHERE a.status_antrian = 1 AND a.id_jadwal = $id_jadwal AND a.tgl_periksa LIKE '$today_date%' ";
        return $this->db->query($query);
    }


    public function cekAntrianSaatIni($id_jadwal)
    {
        date_default_timezone_set('Asia/Jakarta');
        $today_date = date("Y-m-d");
        $query  = "SELECT * FROM tbl_antrian WHERE status_antrian = 1 AND id_jadwal = $id_jadwal AND tgl_periksa LIKE '$today_date%'";
        return $this->db->query($query);
    }

    public function getJadwalWithDokter($id_poli)
    {
        date_default_timezone_set('Asia/Jakarta');
        $datename=date('D');
        $query = "SELECT * 
                    FROM tbl_jadwal_praktek_dokter as j 
                    INNER JOIN tbl_dokter as d ON j.kode_dokter = d.kode_dokter 
                    WHERE j.id_poliklinik = $id_poli 
                        AND hari = '$datename'" ;
        return $this->db->query($query);
    }

    public function getJadwalWithDokterAndPoli($id_poli,$id_jadwal)
    {
        $query = "SELECT * FROM tbl_jadwal_praktek_dokter as j 
                   INNER JOIN tbl_dokter as d ON j.kode_dokter = d.kode_dokter 
                   WHERE j.id_poliklinik = $id_poli AND j.id_jadwal = $id_jadwal" ;
        return $this->db->query($query);
    }

    public function getPoliWithDokter($id_rs)
    {
        $query = "SELECT p.id_poli,p.nama_poli,d.id_dokter,d.nama_dokter,p.id_rs FROM poliklinik as p INNER JOIN dokter as d ON p.id_poli=d.id_poli WHERE p.id_rs = $id_rs";
        return $this->db->query($query);
    }

}
?>
