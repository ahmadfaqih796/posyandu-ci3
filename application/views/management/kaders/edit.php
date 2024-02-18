<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit Kader</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('management/kaders') ?>" method="post">
            <div class="modal-body">
               <input type="hidden" name="updateData" id="updateData" value="true">
               <input type="hidden" name="id" id="edit_id">
               <div class="form-group">
                  <label for="edit_nik">NIK</label>
                  <input type="text" class="form-control" name="nik" id="edit_nik" value="<?= set_value('nik'); ?>">
                  <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_tempat_lahir">Tempat Lahir</label>
                  <input type="text" class="form-control" name="tempat_lahir" id="edit_tempat_lahir" value="<?= set_value('tempat_lahir'); ?>">
                  <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_tanggal_lahir">Tanggal Lahir</label>
                  <input type="date" class="form-control" name="tanggal_lahir" id="edit_tanggal_lahir" value="<?= set_value('tanggal_lahir'); ?>">
                  <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_jabatan">Jabatan</label>
                  <input type="text" class="form-control" name="jabatan" id="edit_jabatan" value="<?= set_value('jabatan'); ?>">
                  <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_alamat">Alamat</label>
                  <input type="text" class="form-control" name="alamat" id="edit_alamat" value="<?= set_value('alamat'); ?>">
                  <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_pendidikan_terakhir">Pendidikan Terakhir</label>
                  <input type="text" class="form-control" name="pendidikan_terakhir" id="edit_pendidikan_terakhir" value="<?= set_value('pendidikan_terakhir'); ?>">
                  <?= form_error('pendidikan_terakhir', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_telepon">Telepon</label>
                  <input type="text" class="form-control" name="telepon" id="edit_telepon" value="<?= set_value('telepon'); ?>">
                  <?= form_error('telepon', '<small class="text-danger pl-3">', '</small>'); ?>
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
      document.getElementById('edit_nik').value = data['nik'];
      document.getElementById('edit_tempat_lahir').value = data['tempat_lahir'];
      document.getElementById('edit_tanggal_lahir').value = data['tanggal_lahir'];
      document.getElementById('edit_jabatan').value = data['jabatan'];
      document.getElementById('edit_alamat').value = data['alamat'];
      document.getElementById('edit_pendidikan_terakhir').value = data['pendidikan_terakhir'];
      document.getElementById('edit_telepon').value = data['telepon'];
   }
</script>