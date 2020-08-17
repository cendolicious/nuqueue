<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Dashboard CS</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #2 for statistics, charts, recent events and reports" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url(); ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url(); ?>assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?php echo base_url(); ?>assets/layouts/layout2/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/layouts/layout2/css/themes/blue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?php echo base_url(); ?>assets/layouts/layout2/css/custom.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/global/foundation-datepicker-master/css/foundation-datepicker.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <img src="<?php echo base_url(); ?>assets/layouts/layout2/img/asda.png" alt="logo" class="logo-default" />
                    <div class="menu-toggler sidebar-toggler">
                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN PAGE ACTIONS -->
                <!-- DOC: Remove "hide" class to enable the page header actions -->
                <!-- END PAGE ACTIONS -->
                <!-- BEGIN PAGE TOP -->
                <div class="page-top">
                    <!-- BEGIN HEADER SEARCH BOX -->
                    <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
                    <!-- END HEADER SEARCH BOX -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class below "dropdown-extended" to change the dropdown styte -->
                            <!-- DOC: Apply "dropdown-hoverable" class after below "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                            <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
                            <!-- END NOTIFICATION DROPDOWN -->
                            <!-- BEGIN INBOX DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <!-- END INBOX DROPDOWN -->
                            <!-- BEGIN TODO DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <!-- END TODO DROPDOWN -->
                            <!-- BEGIN USER LOGIN DROPDOWN -->



                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <span class="username username-hide-on-mobile"> <?php
                                    $nama_cs = $this->session->userdata('fullname');
                                    echo $nama_cs;
                                    ?> </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="<?php echo site_url('auth/keluar');?>">
                                            <i class="icon-key"></i>Keluar</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END PAGE TOP -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- END SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <?php require_once('sidebar_cs.php');?>

                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->

                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->
                    <!-- END THEME PANEL -->
                  <?php
                    foreach ($data_poli->result() as $key) {
                        $nama_poli = $key->nama_poliklinik;
                        $id_poli = $key->id_poliklinik;
                        $kode_poli = $key->BPJS_kode_poli;
                    }

                    foreach ($data_rs->result() as $key) {
                        $nama_rs = $key->nama_rumah_sakit;
                    }

                    foreach ($data_jadwal->result() as $key) {
                        $id_jadwal = $key->id_jadwal;
                        $jammulai_poli = $key->jam_mulai;
                        $jamselesai_poli = $key->jam_selesai;
                        $nama_dokter = $key->nama_dokter;
                    }
                  ?>
                    
                    <h3 style="margin-top:0px;">Kelola Antrian <?php echo $nama_poli;?> (<?php echo $jammulai_poli.' - '.$jamselesai_poli?>) di <?php echo $nama_rs ?> oleh <?php echo $nama_dokter?></h3>
                    
                   
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="<?php echo site_url('app/dashboard_rs');?>">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="<?php echo site_url('app/kelola_antrian');?>">Pilih Poliklinik</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <a href="<?php echo site_url('app/kelola_antrian_poli');?>/<?php echo $id_poli?>">Pilih Jadwal Poliklinik</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>Kelola Antrian <?php echo $nama_poli;?></span>
                            </li>
                        </ul>

                    </div>

                    <?php require_once('modals_antrian.php');?>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-lg-6 col-xs-12 col-sm-12">
                            <div class="portlet light tasks-widget ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-share font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Daftar Antrian</span>
                                    </div>
                                    <div class="actions">
                                    </div>
                                </div>
                                <div class="portlet-body">
                                    <div class="task-content">
                                        <div class="scroller" style="height: 312px;" data-always-visible="1" data-rail-visible1="1">
                                            <!-- START TASK LIST -->
                                            <ul class="task-list">
                                                <?php
                                                
                                                
                                                if (empty($data_list_antrian->result())) {
                                                    echo "Antrian Kosong";
                                                }else{
                                                    $statAntrian = false;
                                                    foreach ($data_list_antrian->result() as $key) {
                                                    if ($statAntrian == false) {
                                                        $antrian_selanjutnya = $key->no_antrian;
                                                        $statAntrian = true;
                                                    }
                                                

                                                ?>
                                                <li>
                                                    <div class="task-title">
                                                        <span class="task-title-sp"> <?php echo $key->no_antrian.' '.$key->nama_pasien?></span>
                                                    </div>
                                                </li>
                                                <?php
                                                 }
                                             }
                                                ?>
                                                
                                            </ul>
                                            <!-- END START TASK LIST -->
                                        </div>
                                    </div>
                                    <div class="task-footer">
                                    </div>
                                </div>
                            </div>
                        </div>
                         <div class="col-lg-6 col-xs-12 col-sm-12">
                            <div class="portlet light tasks-widget ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="icon-share font-dark hide"></i>
                                        <span class="caption-subject font-dark bold uppercase">Sedang Diperiksa : <?php
                                        if (empty($data_antrian_saat_ini->result())) {
                                            echo "-";
                                        }else{
                                            foreach ($data_antrian_saat_ini->result() as $key) {
                                            echo $key->no_antrian.' '.$key->nama_pasien;
                                            }
                                        }
                                        ?> </span>
                                    </div>
                                    <div class="actions">
                                        <div class="btn-group">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="portlet-body text-center">
                                     <form action="<?php echo site_url('dashboardCS/panggil_antrian') ?>" method="post">
                                        <input type="hidden" name="id_poli" value="<?php echo $id_poli;?>"/>
                                        <input type="hidden" name="id_jadwal" value="<?php echo $id_jadwal;?>"/>

                                        <input type="hidden" name="no_antrian_selanjutnya" value="<?php if(!empty($antrian_selanjutnya))
                                        echo $antrian_selanjutnya;?>"/>

                                         <button type="submit" role="button" class="btn btn-lg btn-warning">Panggil Antrian Selanjutnya</button>
                                    </form>
                                   <br><br>
                                       <button type="button" name="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary"><div class="glyphicon glyphicon-plus"></div> Daftar Antrian</button>
                                    </div>
                                </div>
                        </div>
                    </div>

                <!-- END CONTENT BODY -->
            </div>
           
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner"> RS Sinar Kasih, 2020
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
            <!-- END FOOTER -->
            <!-- BEGIN QUICK NAV -->
            <!-- END QUICK NAV -->
            <!--[if lt IE 9]>
<script src="<?php echo base_url(); ?>assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/excanvas.min.js"></script>
<script src="<?php echo base_url(); ?>assets/global/plugins/ie8.fix.min.js"></script>
<![endif]-->
            <!-- BEGIN CORE PLUGINS -->

            <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
            <!-- END CORE PLUGINS -->
            <!-- BEGIN PAGE LEVEL PLUGINS -->
            <script src="<?php echo base_url(); ?>assets/global/plugins/moment.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/amcharts/radar.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/amcharts/themes/patterns.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/amcharts/themes/chalk.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/ammap/ammap.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/ammap/maps/js/worldLow.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/amcharts/amstockcharts/amstock.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/horizontal-timeline/horizontal-timeline.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN THEME GLOBAL SCRIPTS -->
            <script src="<?php echo base_url(); ?>assets/global/scripts/app.min.js" type="text/javascript"></script>
            <!-- END THEME GLOBAL SCRIPTS -->
            <!-- BEGIN PAGE LEVEL SCRIPTS -->
            <script src="<?php echo base_url(); ?>assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
            <!-- END PAGE LEVEL SCRIPTS -->
            <!-- BEGIN THEME LAYOUT SCRIPTS -->
            <script src="<?php echo base_url(); ?>assets/layouts/layout2/scripts/layout.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/layouts/layout2/scripts/demo.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
             <script src="<?php echo base_url(); ?>assets/global/foundation-datepicker-master/js/foundation-datepicker.min.js" type="text/javascript"></script>
            <!-- END THEME LAYOUT SCRIPTS -->
            <script type="text/javascript">
    $(document).ready(function() {

    $('.modal').on('hidden.bs.modal', function(){
        $(this).find('form')[0].reset();
     });

        $('#formpasienbaru').hide();
        $('#formpasienlama').hide();
        $('#ketlogincs').hide();
        $('#ketloginrs').hide();
        
        $('#pasienlama').click(function(){
            $('#formpasienbaru').slideUp();
            $('#ketlogin').text("Masuk sebagai Admin RS");
            $('#formpasienlama').slideDown();
            $('#pasienlama').removeClass("btn-default");
            $('#pasienbaru').removeClass("btn-primary");
            $('#pasienlama').addClass("btn-primary");
        });
        $('#pasienbaru').click(function(){
            $('#formpasienlama').slideUp();
            $('#ketlogin').text("Masuk sebagai CS");
            $('#formpasienbaru').slideDown();
            $('#pasienbaru').removeClass("btn-default");
            $('#pasienlama  ').removeClass("btn-primary");
            $('#pasienbaru').addClass("btn-primary");
        });

        $('#tgllahir_pasien').fdatepicker({
            format: 'yyyy-mm-dd', 
        });


        var no_nik = window.document.getElementById('no_nik_lama');
        var no_nik_baru = window.document.getElementById('no_nik_baru');
        var message = window.document.getElementById('message');
        var messagebaru = window.document.getElementById('messagebaru');
        var btnPasienLama = window.document.getElementById('btnPasienLama');

        $('#btnPasienLama').prop('disabled', true);
        $('#btnPasienBaru').prop('disabled', true);
        $('#no_nik_lama').keyup(function(){
            if ($('#no_nik_lama').val().length != 16) {
                message.innerHTML = "NIK harus berjumlah 16 digit";
            }else{
            $.ajax({
              type: 'POST',
              url: '<?php echo site_url('api/cekstatusantrian'); ?>',
              data: {'no_nik':no_nik.value},
              success: function(result){
                if (result.message == 'data ditemukan') {
                        message.innerHTML = "No. NIK sedang terdaftar pada suatu antrian, silahkan selesaikan antrian terlebih dahulu";
                    }else{
                        $.ajax({
                        type: 'GET',
                        url: '<?php echo site_url('api/cekPasienLamaLocal?no_nik='); ?>'.concat(no_nik.value),
                        success: function(result){
                            if (result.message == 'data ditemukan') {
                                $('#btnPasienLama').prop('disabled', false);
                                $('#message').prop('style','color:blue;');
                                message.innerHTML = "No. NIK terdaftar, silahkan daftar sebagai pasien lama.";
                            }else{
                                $.ajax({
                                type: 'POST',
                                url: '<?php echo $url_api.'cekpasien'; ?>',
                                data: {'no_nik':no_nik.value},
                                success: function(result){
                                    if (result.message == 'data ditemukan') {
                                        $('#btnPasienLama').prop('disabled', false);
                                        $('#message').prop('style','color:blue;');
                                        message.innerHTML = "No. NIK terdaftar, silahkan daftar sebagai pasien lama.";
                                        var nama_pasien;
                                        var tgllahir_pasien;
                                        var alamat_pasien;
                                        var telepon_pasien;
                                        var jk_pasien;
                                        var goldar_pasien;
                                        var no_nik;

                                        console.log(result.result);

                                        $.each(result.result, function(index, value){
                                        nama_pasien  = value.nama_pasien;
                                        tgllahir_pasien  = value.tgllahir_pasien;
                                        alamat_pasien  = value.alamat_pasien;
                                        telepon_pasien  = value.telepon_pasien;
                                        jk_pasien  = value.jk_pasien;
                                        goldar_pasien  = value.goldar_pasien;
                                        no_nik  = value.no_nik;
                                        });

                                        var data_pasien = {
                                            "nama_pasien":nama_pasien,
                                            "tgllahir_pasien":tgllahir_pasien,
                                            "alamat_pasien":alamat_pasien,
                                            "telepon_pasien":telepon_pasien,
                                            "jk_pasien":jk_pasien,
                                            "goldar_pasien":goldar_pasien,
                                            "no_nik":no_nik
                                        };

                                        $('#datajson').html(function(){
                                            return "Nama Pasien : "+nama_pasien;
                                        });

                                        $('#btnPasienLama').click(function(){
                                        $.ajax({
                                            type: 'POST',
                                            url: '<?php echo site_url('api/insertPasienTemp'); ?>',
                                            data: data_pasien,
                                            success: function(result){
                                                console.log(result.status);
                                            },
                                            error: function(jqXHR, error, errorThrown){console.log(jqXHR.status);}
                                            });
                                        });
                                    }
                                    else{
                            
                                        $('#btnPasienLama').prop('disabled', true);
                                        $('#message').prop('style','color:red;');
                                        $('#datajson').html('');
                                        message.innerHTML = "No. NIK tidak ditemukan!";
                                    }
                                },
                                error: function(jqXHR, error, errorThrown){console.log(jqXHR.status);}
                                });

                            }
                        },
              error: function(jqXHR, error, errorThrown){console.log(jqXHR.status);}
            });
                    }
              },
              error: function(jqXHR, error, errorThrown){console.log(jqXHR.status);}
            });

            }
        });
        $('#no_nik_baru').keyup(function(){
            if ($('#no_nik_baru').val().length != 16) {
                messagebaru.innerHTML = "NIK harus berjumlah 16 digit";
            }else{
                $.ajax({
              type: 'POST',
              url: '<?php echo site_url('api/cekstatusantrian'); ?>',
              data: {'no_nik':no_nik_baru.value},
              success: function(result){
                if (result.message == 'data ditemukan') {
                        messagebaru.innerHTML = "No. NIK sedang terdaftar pada suatu antrian, silahkan selesaikan antrian terlebih dahulu";
                    }else{
                        $.ajax({
                        type: 'GET',
                        url: '<?php echo site_url('api/cekPasienLamaLocal?no_nik='); ?>'.concat(no_nik_baru.value),
                        success: function(result){
                            if (result.message == 'data ditemukan') {
                                $('#btnPasienBaru').prop('disabled', true);
                                        $('#messagebaru').prop('style','color:red;');
                                        $('#datajsonbaru').html('');
                                        messagebaru.innerHTML = "No. NIK telah terdaftar sebagai pasien lama, silahkan daftar sebagai pasien lama";
                            }else{
                                $.ajax({
                                type: 'POST',
                                url: '<?php echo $url_api.'cekpasien'; ?>',
                                data: {'no_nik':no_nik_baru.value},
                                success: function(result){
                                    if (result.message == 'data ditemukan') {
                                        $('#btnPasienBaru').prop('disabled', true);
                                        $('#messagebaru').prop('style','color:red;');
                                        $('#datajsonbaru').html('');
                                        messagebaru.innerHTML = "No. NIK telah terdaftar sebagai pasien lama, silahkan daftar sebagai pasien lama";
                                        

                                        $('#datajsonbaru').html(function(){
                                            return "Nama Pasien : "+nama_pasien;
                                        });

                                    }
                                    else{
                        

                                        $('#btnPasienBaru').prop('disabled', false);
                                $('#messagebaru').prop('style','color:blue;');
                                messagebaru.innerHTML = "No. NIK belum terdaftar, silahkan menddaftar sebagai pasien baru.";
                                    }
                                },
                                error: function(jqXHR, error, errorThrown){console.log(jqXHR.status);}
                                });

                            }
                        },
              error: function(jqXHR, error, errorThrown){console.log(jqXHR.status);}
            });
                    }
              },
              error: function(jqXHR, error, errorThrown){console.log(jqXHR.status);}
            });
        }
            
        });

        $( "#btnPasienLama" ).click(function() {
         location.reload(true)
        });

        
        $('#myModal').on('hidden.bs.modal', function () {
 location.reload(true);
})

            
        
    });
    </script>
    </body>

</html>
