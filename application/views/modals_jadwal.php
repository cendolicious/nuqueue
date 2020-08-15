<!-- Modal -->
 <div id="myModal" class="modal fade" role="dialog">
   <div class="modal-dialog">
     <!-- konten modal-->
     <div class="modal-content">
       <!-- heading modal -->
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Tambah Jadwal</h4>
       </div>
       <!-- body modal -->
       <div class="modal-body">
<div class="bootbox-body row">
           <form action="<?php echo site_url('app/tambah_jadwal') ?>" method="post">
            
               <div class="form-group col-md-12">
        <label class="control-label">Dokter</label>
         <div class="selectContainer">
             <select class="form-control" name="id_dokter">
                <?php
                foreach ($poli_with_dokter->result() as $key) {
                 ?>
                 <option value="<?php echo $key->id_dokter;?>"><?php echo $key->nama_dokter.' - '.$key->nama_poli;?></option>
                 <?php
                }
                ?>
             </select>
         </div>
     </div>
     
     <div class="form-group col-md-4">
        <label class="control-label">Jadwal</label>
         <div class="selectContainer">
             <select class="form-control" name="jadwal_poli">
                <option value="Mon">Senin</option>
                <option value="Tue">Selasa</option>
                <option value="Wed">Rabu</option>
                <option value="Thu">Kamis</option>
                <option value="Fri">Jumat</option>
                <option value="Sat">Sabtu</option>
                <option value="Sun">Minggu</option>
             </select>
         </div>
     </div>
     <div class="form-group col-md-4">
        <label class="control-label">Jam Mulai</label>
         <input id="jammulai_poli" type="text" name="jammulai_poli" class="form-control" placeholder="Jam Mulai Poliklinik.." required/>
     </div>
     <div class="form-group col-md-4">
        <label class="control-label">Jam Selesai</label>
         <div class="selectContainer">
             <input id="jamselesai_poli" type="text" name="jamselesai_poli" class="form-control" placeholder="Jam Selesai Poliklinik.." required/>
         </div>
     </div>
             <div class="form-row">
               <div class="form-group col-md-12">
                 <button type="submit" class="btn btn-primary col-md-12">Tambah</button></div>
             </div>
         </form>
       </div>
       </div>
       <!-- footer modal -->
       <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
       </div>
     </div>
   </div>
 </div>
<!-- End Modals-->