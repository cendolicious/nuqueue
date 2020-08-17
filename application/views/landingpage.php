<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistem Antrian RS Sinar Kasih Toraja</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assetslanding/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url(); ?>assetslanding/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Cabin:700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assetslanding/css/grayscale.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assetslanding/bsvalidator/bootstrapValidator.css" rel="stylesheet">
    <style type="text/css">
        .inmodal{
            color:black;
        }
    </style>
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Sistem Antrian RS Sinar Kasih Toraja</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Intro Header -->
    <header class="masthead">
      <div class="intro-body">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <h1 class="brand-heading"></h1>
              <p class="intro-text"></p>
              <div class="row">
          <div class="col-lg-8 mx-auto">
            <ul class="list-inline banner-social-buttons">
             <!--  <li data-toggle="modal" data-target="#ModalRegister" class="list-inline-item">
                <a class="btn btn-default btn-lg">
                  <i class="fa fa-user-plus fa-fw"></i>
                  <span class="network-name">Daftar Mitra</span>
                </a>
              </li>-->
              <li data-toggle="modal" data-target="#ModalLogin" id="btnmasuk" class="list-inline-item">
                <a class="btn btn-default btn-lg">
                  <i class="fa fa-sign-in fa-fw"></i>
                  <span class="network-name">Masuk</span>
                </a>
              </li>
              
            </ul>
          </div>
        </div>
              <a href="#about" class="btn btn-circle js-scroll-trigger">
                <i class="fa fa-angle-double-down animated"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Modal Register
<div id="ModalRegister" class="modal fade inmodal" role="dialog">
  <div class="modal-dialog modal-lg">
 
    <div class="modal-content">
      <div class="modal-header modal-lg">
        <h5 class="modal-title">Daftar sebagai mitra NuQueue</h5>
      </div>
      <div class="modal-body">
        <div class="panel panel-default">
                <div class="panel-heading" align="center">
                </div>
                <div class="panel-body">
                <form id="formRegist" role="form" action="<?php echo site_url('app/daftar_rs'); ?>" method="post">

                   <strong><label>Nama Rumah Sakit</label></strong>
                <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Nama Rumah Sakit.." required/>
                    </div>
                    <strong><label>Alamat</label></strong>
                    <div class="form-group">
                        <input type="text" name="address" class="form-control" placeholder="Alamat.." required/>
                    </div>
                    <strong><label>Telepon</label></strong>
                    <div class="form-group">
                        <input type="text" name="phone" class="form-control" placeholder="Telepon.." required/>
                    </div>
                    <strong><label>Email</label></strong>
                 <div class="form-group">
                        <input id="emailrs" type="text" name="email" class="form-control" placeholder="Email.." required/>
                </div>
                    <strong><label>Kata Sandi</label></strong>
                     <div class="form-group">
                        <input type="password" name="password" class="form-control"  placeholder="Kata Sandi.." required/>
                        </div>
                        <input type="hidden" name="tipemasuk" value="pendaftaran">
                    <div class="form-group input-group">
                        <input data-dismiss="modal" name="" value="Batal" class="btn btn-danger col-md-6">
                        <input type="submit" name="" value="Daftar" class="btn btn-primary col-md-6">
                    </div>
                    

                    
                </form>
                </div>
            </div>
      </div>  -->
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default inmodal" data-dismiss="modal">Close</button>
      </div> 
    </div>
  </div>
</div>
      -->
<!-- Modal Login-->
<div id="ModalLogin" class="modal fade inmodal" role="dialog">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header modal-lg">
        <h5 id="ketlogin" class="modal-title">Masuk..</h5>
      </div>
      <div class="modal-body inmodal">
    
        <!-- <div class="col-lg-12 text-center">
            <ul class="list-inline banner-social-buttons">
              <li id="loginadminrs" class="list-inline-item">
                <a class="btn btn-default btn-lg">
                  <i class="fa fa-user-md fa-fw"></i>
                  <span class="network-name">Admin RS</span>
                </a>
              </li>
              <li id="logincs"  class="list-inline-item">
                <a class="btn btn-default btn-lg">
                  <i class="fa fa-user fa-fw"></i>
                  <span class="network-name">Customer Service</span>
                </a>
              </li>
              
            </ul>
          </div> -->

          <div class="text-center">
            <div id="formloginadminrs">
              <div class="panel panel-default">
                <div class="panel-heading" align="center">
                </div>
                <div class="panel-body">
                <form role="form" action="<?php echo site_url('auth/login'); ?>" method="post">
                   
                <strong><div class="text-left"><label>Email</label></div></strong>
                 <div class="form-group input-group">
                        <input type="text" name="email" class="form-control" placeholder="Email.." required/>
                    </div>
                    <strong><div class="text-left"><label>Kata Sandi</label></div></strong>
                     <div class="form-group input-group">
                        <input type="password" name="password" class="form-control"  placeholder="Kata Sandi.." required/>
                        </div>
                         <input type="hidden" name="tipemasuk" value="login">
<div class="form-group input-group">
                        <input data-dismiss="modal" name="" value="Batal" class="btn btn-danger col-md-6">
                    <input type="submit" name="" value="Masuk" class="btn btn-primary col-md-6">
                </div>
                </form>
                </div>
            </div>
          </div>
          <div id="formlogincs">
              <div class="panel panel-default">
                <div class="panel-heading" align="center">
                </div>
                <div class="panel-body">
                <form role="form" action="<?php echo site_url('auth/login'); ?>" method="post">
                   
<strong><div class="text-left"><label>Username CS</label></div></strong>
                 <div class="form-group input-group">
                        <input type="text" name="username_cs" class="form-control" placeholder="Username CS.." required/>
                    </div>
                    <strong><div class="text-left"><label>Kata Sandi</label></div></strong>
                     <div class="form-group input-group">
                        <input type="password" name="password_cs" class="form-control"  placeholder="Kata Sandi.." required/>
                        </div>
<div class="form-group input-group">
                        <input data-dismiss="modal" name="" value="Batal" class="btn btn-danger col-md-6">
                    <input type="submit" name="" value="Masuk" class="btn btn-success col-md-6">
                </div>
                </form>
                </div>
            </div>
          </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>


    <!-- Footer -->
    <footer>
      <div class="container text-center">
        <p>Copyright 2020</p>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url(); ?>assetslanding/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assetslanding/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo base_url(); ?>assetslanding/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="<?php echo base_url(); ?>assetslanding/js/grayscale.min.js"></script>
    <script src="<?php echo base_url(); ?>assetslanding/bsvalidator/bootstrapValidator.js"></script>

    <script type="text/javascript">
    $(document).ready(function() {

    $('.modal').on('hidden.bs.modal', function(){
        $(this).find('form')[0].reset();
     });

        $('#formlogincs').hide();
        // $('#formloginadminrs').hide();
        $('#ketlogincs').hide();
        $('#ketloginrs').hide();
        
        $('#loginadminrs').click(function(){
            $('#formlogincs').slideUp();
            $('#ketlogin').text("Masuk sebagai Admin RS");
            // $('#formloginadminrs').slideDown();
            $('#loginadminrs').removeClass("btn-default");
            $('#logincs').removeClass("btn-success");
            $('#loginadminrs').addClass("btn-primary");
        });
        $('#logincs').click(function(){
            // $('#formloginadminrs').slideUp();
            $('#ketlogin').text("Masuk sebagai CS");
            $('#formlogincs').slideDown();
            $('#logincs').removeClass("btn-default");
            $('#loginadminrs').removeClass("btn-primary");
            $('#logincs').addClass("btn-success");
        });

         $('#formRegist').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name: {
              validators: {
                notEmpty: {
                        message: 'Please fill out this field.'
                    }
              }
            },
            address: {
              validators: {
                notEmpty: {
                        message: 'Please fill out this field.'
                    }
              }
            },
            phone: {
              validators: {
                notEmpty: {
                        message: 'Please fill out this field.'
                    }
              }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Please fill out this field.'
                    },
                    emailAddress: {
                        message: 'Email is not valid.'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Please fill out this field.'
                    },
                    stringLength: {
                        min: 7,
                        message: 'The password must have at least 7 characters'
                    }
                }
            }
        }
    });


    });
    </script>

  </body>

</html>
