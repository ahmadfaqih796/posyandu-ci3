<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit Imunisasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('laporan/imunisasi') ?>" method="post">
            <div class="modal-body">
               <!-- Hidden input for storing user ID -->
               <input type="hidden" name="updateData" id="updateData" value="true">
               <input type="hidden" name="id" id="edit_id">
               <div class="form-group">
                  <label for="edit_anak_id">Nama Anak</label>
                  <select name="anak_id" id="edit_anak_id" class="form-control" required>
                     <option value="">-- Pilih Anak --</option>
                     <?php foreach ($anak as $field) : ?>
                        <option value="<?= $field['user_id'] ?>" <?= set_select('anak_id', $field['user_id'], (!empty($_POST['anak_id']) && $_POST['anak_id'] == $field['user_id'])); ?>><?= $field['name'] ?></option>
                     <?php endforeach; ?>
                  </select>
                  <?= form_error('anak_id', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_tanggal_imunisasi">Tanggal Imunisasi</label>
                  <input type="date" class="form-control" name="tanggal_imunisasi" id="edit_tanggal_imunisasi" value="<?= set_value('tanggal_imunisasi'); ?>">
                  <?= form_error('tanggal_imunisasi', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_tipe_imunisasi_id">Nama Imunisasi</label>
                  <select name="tipe_imunisasi_id" id="edit_tipe_imunisasi_id" class="form-control" required>
                     <option value="">-- Pilih Imunisasi --</option>
                     <?php foreach ($imunisasi as $field) : ?>
                        <option value="<?= $field['id'] ?>" <?= set_select('tipe_imunisasi_id', $field['id'], (!empty($_POST['tipe_imunisasi_id']) && $_POST['tipe_imunisasi_id'] == $field['id'])); ?>><?= $field['n_imunisasi'] ?></option>
                     <?php endforeach; ?>
                  </select>
                  <?= form_error('tipe_imunisasi_id', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_status">Status</label>
                  <select name="status" id="edit_status" class="form-control" required>
                     <option value="">--Pilih Status--</option>
                     <option value="1" <?= set_select('status', '0', (!empty($_POST['status']) && $_POST['status'] == "1")); ?>>Sudah</option>
                     <option value="2" <?= set_select('status', '1', (!empty($_POST['status']) && $_POST['status'] == "2")); ?>>Belum</option>
                  </select>
                  <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>
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
      document.getElementById('edit_anak_id').value = data['anak_id'];
      document.getElementById('edit_tanggal_imunisasi').value = data['tanggal_imunisasi'];
      document.getElementById('edit_tipe_imunisasi_id').value = data['tipe_imunisasi_id'];
      document.getElementById('edit_status').value = data['status'];
   }
</script>