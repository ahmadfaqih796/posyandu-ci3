<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit Posyandu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('management/posyandu') ?>" method="post">
            <div class="modal-body">
               <!-- Hidden input for storing user ID -->
               <input type="hidden" name="updateData" id="updateData" value="true">
               <input type="hidden" name="id" id="edit_id">
               <div class="form-group">
                  <label for="edit_n_posyandu">Nama</label>
                  <input type="text" class="form-control" name="n_posyandu" id="edit_n_posyandu" value="<?= set_value('n_posyandu'); ?>">
                  <?= form_error('n_posyandu', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_alamat">Alamat</label>
                  <input type="text" class="form-control" name="alamat" id="edit_alamat" value="<?= set_value('alamat'); ?>">
                  <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_keterangan">Keterangan</label>
                  <input type="text" class="form-control" name="keterangan" id="edit_keterangan" value="<?= set_value('keterangan'); ?>">
                  <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>

            </div>
            <div class="modal-footer">
               <button type="reset" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
               <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>

<script>
   function getData(data) {
      document.getElementById('edit_id').value = data['id'];
      document.getElementById('edit_n_posyandu').value = data['n_posyandu'];
      document.getElementById('edit_alamat').value = data['alamat'];
      document.getElementById('edit_keterangan').value = data['keterangan'];
   }
</script>