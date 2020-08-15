<!-- Modal -->
 <div id="myModal" class="modal fade" role="dialog">
   <div class="modal-dialog">
     <!-- konten modal-->
     <div class="modal-content">
       <!-- heading modal -->
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Tambah Poliklinik</h4>
       </div>
       <!-- body modal -->
       <div class="modal-body">
<div class="bootbox-body row">
           <form action="<?php echo site_url('app/tambah_poli') ?>" method="post">
            
               <div class="form-group col-md-12">
                   <label>Nama Poliklinik</label>
                      <input type="text" name="nama_poli" class="form-control" placeholder="Nama Poliklinik.." required/>
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
