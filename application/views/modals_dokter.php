<!-- Modal -->
 <div id="myModal" class="modal fade" role="dialog">
   <div class="modal-dialog">
     <!-- konten modal-->
     <div class="modal-content">
       <!-- heading modal -->
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Tambah Dokter</h4>
       </div>
       <!-- body modal -->
       <div class="modal-body">
<div class="bootbox-body row">
           <form action="<?php echo site_url('dashboardCS/tambah_dokter') ?>" method="post">
            
               <div class="form-group col-md-12">
                   <label>Nama Dokter</label>
                      <input type="text" name="nama_dokter" class="form-control" placeholder="Nama Dokter.." required/>
               </div>
               <div class="form-group col-md-12">
        <label class="control-label">Poliklinik</label>
         <div class="selectContainer">
             <select class="form-control" name="id_poli">
                <?php
                foreach ($data_poli->result() as $key) {
                 ?>
                 <option value="<?php echo $key->id_poli;?>"><?php echo $key->nama_poli;?></option>
                 <?php
                }
                ?>
             </select>
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
