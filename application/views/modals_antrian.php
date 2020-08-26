<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- konten modal-->
    <div class="modal-content">
      <!-- heading modal -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Daftar Antrian</h4>
      </div>
      <!-- body modal -->
      <div class="modal-body">
        <div class="bootbox-body row">

          <!-- <div class="col-lg-12 text-center">
            <ul class="list-inline">
              <li id="pasienlama" class="list-inline-item">
                <a class="btn btn-default btn-lg">
                  <span class="network-name">Pasien Lama</span>
                </a>
              </li>
              <li id="pasienbaru"  class="list-inline-item">
                <a class="btn btn-default btn-lg">
                  <span class="network-name">Pasien Baru</span>
                </a>
              </li>
              
            </ul>
          </div> -->


          <!-- <div id="formpasienbaru">
            
           <form action="<?php echo site_url('dashboardCS/pasien_baru_onsite') ?>" method="post">
            <input type="hidden" name="tipe_daftar" value="2"/>
              <input type="hidden" name="id_poli" value="<?php echo $id_poli; ?>"/>
              <input type="hidden" name="id_jadwal" value="<?php echo $id_jadwal; ?>"/>

               <div class="form-group col-md-12">
                <h5 class="text-center" id="messagebaru">Silahkan masukan No. NIK</h5>
                    <h5 class="text-center" id="datajsonbaru"></h5>
                   <label>NIK Pasien</label>
                      <input type="number" id="no_nik_baru" name="nik_pasien" class="form-control" placeholder="NIK Pasien.." required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "16"/>
               </div>
               <div class="form-group col-md-12">
                   <label>Nama Pasien</label>
                      <input type="text" name="nama_pasien" class="form-control" placeholder="Nama Pasien.." required/>
               </div>
               <div class="form-group col-md-12">
                   <label>Tanggal Lahir Pasien</label>
                      <input type="text" id="tgllahir_pasien" name="tgllhr_pasien" class="form-control" placeholder="Tanggal Lahir Pasien.." required />
               </div>
                <div class="form-group col-md-12">
                   <label>Alamat Pasien</label>
                      <input type="text" name="alamat_pasien" class="form-control" placeholder="Alamat Pasien.." required/>
               </div>

                <div class="form-group col-md-4">
                   <label>Telepon Pasien</label>
                      <input type="text" name="telepon_pasien" class="form-control" placeholder="Telepon Pasien.." required/>
               </div>
                <div class="form-group col-md-4">
                   <label>Jenis Kelamin Pasien</label>
                      <select class="form-control" name="jk_pasien">
                 <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
             </select>
               </div>
               <div class="form-group col-md-4">
                   <label>Golongan Darah Pasien</label>
                      <select class="form-control" name="goldar_pasien">
                 <option value="A">A</option>
                <option value="B">B</option>
                <option value="AB">AB</option>
                <option value="O">O</option>
             </select>
               </div>
               
             <div class="form-row">
               <div class="form-group col-md-12">
                 <button id="btnPasienBaru" type="submit" class="btn btn-primary col-md-12">Daftar</button></div>
             </div>
         </form>
       </div> -->

          <div id="formpasienlama">
            <form id="submit" action="<?php echo site_url('dashboardCS/pasien_lama_onsite') ?>" method="post" target="_blank">
              <input type="hidden" name="tipe_daftar" value="2" />
              <input type="hidden" name="id_poli" value="<?php echo $id_poli; ?>" />
              <input type="hidden" name="kode_poli" value="<?php echo $kode_poli; ?>" />
              <input type="hidden" name="id_jadwal" value="<?php echo $id_jadwal; ?>" />
              <div class="text-center p-3 mb-2 bg-warning text-dark" id="message">Pastikan pasien sudah terdaftar sebagai di pasien dan memiliki NIK di <a href="https://simrs.rssinarkasih.com">SIMRS</a> </div>
              <h5 class="text-center" id="message">Silahkan masukan No. NIK</h5>
              <h5 class="text-center" id="datajson"></h5>
              <div class="form-group col-md-12">
                <label>NIK Pasien</label>
                <input type="number" name="nik_pasien" id="no_nik_lama" class="form-control" placeholder="NIK Pasien.." required oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="16" />
              </div>
              <div class="hide form-group col-md-12 alert alert-info " id="nama_pasien"></div>

              <div class="form-row">
                <div class="form-group col-md-12">
                  <button disabled onClick="$('#submit').submit(); window.location = '<?php echo site_url('dashboardCS/kelola_antrian_jadwal/' . $id_poli . '/' . $id_jadwal . '/') ?>'" id="btnPasienLama" type="submit" class="btn btn-primary col-md-12">Daftar</button></div>
              </div>
            </form>

          </div>

        </div>
      </div>
      <!-- footer modal -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $("#no_nik_lama").focus(function() {
      if ($(this).val().length == 8 || (this).val().length == 16) {
        $("#btnPasienLama").attr('disabled', false);
      }
    });
  });
</script>
<!-- End Modals-->