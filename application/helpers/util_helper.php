<?php
function cmb_dinamis($name,$table,$field,$pk,$selected=null){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control'>";
    $data = $ci->db->get($table)->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}

function select2_dinamis($name,$table,$field,$placeholder){
    $ci = get_instance();
    $select2 = '<select name="'.$name.'" class="form-control select2 select2-hidden-accessible" multiple="" 
               data-placeholder="'.$placeholder.'" style="width: 100%;" tabindex="-1" aria-hidden="true">';
    $data = $ci->db->get($table)->result();
    foreach ($data as $row){
        $select2.= ' <option>'.$row->$field.'</option>';
    }
    $select2 .='</select>';
    return $select2;
}

function datalist_dinamis($name,$table,$field,$value=null){
    $ci = get_instance();
    $string = '<input value="'.$value.'" name="'.$name.'" list="'.$name.'" class="form-control">
    <datalist id="'.$name.'">';
    $data = $ci->db->get($table)->result();
    foreach ($data as $row){
        $string.='<option value="'.$row->$field.'">';
    }
    $string .='</datalist>';
    return $string;
}

function rename_string_is_aktif($string){
        return $string=='y'?'Aktif':'Tidak Aktif';
    }

function is_login(){
    $ci = get_instance();
    if(empty($ci->session->userdata('id_users'))){
        redirect('auth');
    }
}

function can_access($url){

    $realUrl = $url;

    $urlSplitted = explode("/", $url);

    if(sizeof($urlSplitted) > 2||strpos($url, "json") !== false||strpos($url, "create") !== false||strpos($url, "create_action") !== false||
    strpos($url, "update") !== false||strpos($url, "update_action") !== false|| strpos($url, "delete") !== false || strpos($url, "index") !== false){
        
        $url = implode("/", array($urlSplitted[0], $urlSplitted[1]));
    }
 
    $ci = get_instance();
    $url = ltrim($url, '/');
    $akses = $ci->session->userdata('akses');
    $query = "SELECT id_menu FROM tbl_menu WHERE url='$url'";
    $data = $ci->db->query($query)->result();

    if (((strpos($realUrl, "profile") !== false) && in_array(33, $akses))||
    ((strpos($realUrl, "pendaftaran") !== false || strpos($realUrl, "dataobat") !== false) && in_array(22, $akses) && in_array(23, $akses )&& in_array(24, $akses)&& in_array(43, $akses)&& in_array(44, $akses))||
    ((strpos($realUrl, "sub_periksa_labor") !== false || strpos($realUrl, "periksalabor") !== false)   && in_array(38, $akses))||
    ((strpos($realUrl, "pengadaan") !== false || strpos($realUrl, "supplier") !== false)   && in_array(31, $akses) && in_array(34, $akses))||
    ((strpos($realUrl, "penjualan") !== false || strpos($realUrl, "supplier") !== false)   && in_array(32, $akses) && in_array(34, $akses))||
    (strpos($realUrl, "autocomplete") !== false)){

    } else {
        if (!$data || !in_array($data[0]->id_menu, $akses)){    
            redirect('welcome');
        }
    }
}


function alert($class,$title,$description){
    return '<div class="alert '.$class.' alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> '.$title.'</h4>
                '.$description.'
              </div>';
}

function noRekemedisOtomatis(){
    $ci = get_instance();
    $ci->db->flush_cache();
    // mencari kode barang dengan nilai paling besar
    $query = "SELECT no_rekamedis FROM tbl_pasien";
    $data = $ci->db->query($query)->result();
    $dataClone = [];
    $maxIndex = 0;
    $maxValue = "00.01.01";

    for ($i = 0; $i < count($data); $i++) {
        $components = explode(".", $data[$i]->no_rekamedis);

        $dataClone[$i] = intval($components[2]."".$components[1]."".$components[0]);
        if ($dataClone[$i]<=$dataClone[$maxIndex]) {
            $maxIndex = $i;
            $maxValue = $data[$i]->no_rekamedis;
        }
    }

    $components = explode(".", $maxValue);
    $components[0]= (int) $components[0];
    $components[1]= (int) $components[1];
    $components[2]= (int) $components[2];

    if ($components[0]==99){
        $components[0] = 0;
        $components[1] += 1;
    } else {
        $components[0] += 1;
    }
    

    if ($components[1]==99){
        $components[0] = 0;
        $components[1] = 0;
        $components[2] += 1;
    } 
    
    $kodeBaru = sprintf("%02d.%02d.%02d", $components[0], $components[1], $components[2]);
    return $kodeBaru;
}

function noRegOtomatis(){
    $ci = get_instance();
    $today = date('Y-m-d');
    // mencari kode barang dengan nilai paling besar
    $query = "SELECT max(no_rawat) as maxKode FROM tbl_pendaftaran where date(tanggal_daftar)='$today'";
    $data = $ci->db->query($query)->row_array();
    $noUrut = 0;
    if ($data['maxKode']){
        $kode = $data['maxKode'];
        $noUrut = (int) explode("/", $kode)[3];
        $noUrut++;
    }
    $kodeBaru = sprintf("%04s", $noUrut);
    return $kodeBaru;
}

function autocomplete_json($table,$field){
    $ci = get_instance();
    $ci->db->like($field, $_GET['term']);
    $ci->db->select($field);
    $collections = $ci->db->get($table)->result();
    foreach ($collections as $collection) {
        $return_arr[] = $collection->$field;
    }
    echo json_encode($return_arr);
}