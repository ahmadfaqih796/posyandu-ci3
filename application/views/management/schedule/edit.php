<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit Jadwal Posyandu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('management/schedule') ?>" method="post">
            <div class="modal-body">
               <!-- Hidden input for storing user ID -->
               <input type="hidden" name="updateData" id="updateData" value="true">
               <input type="hidden" name="id" id="edit_id">
               <div class="form-group">
                  <label for="edit_posyandu_id">Posyandu</label>
                  <select name="posyandu_id" id="edit_posyandu_id" class="form-control">
                     <?php foreach ($posyandu as $field) : ?>
                        <option value="<?= $field['id'] ?>" <?= set_select('posyandu_id', $field['id'], (!empty($_POST['posyandu_id']) && $_POST['posyandu_id'] == $field['id'])); ?>><?= $field['n_posyandu'] ?></option>
                     <?php endforeach; ?>
                  </select>
                  <?= form_error('posyandu_id', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_tanggal">tanggal</label>
                  <input type="date" class="form-control" name="tanggal" id="edit_tanggal" value="<?= set_value('tanggal'); ?>">
                  <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_jam_buka">Jam Buka</label>
                  <input type="time" class="form-control" name="jam_buka" id="edit_jam_buka" value="<?= set_value('jam_buka'); ?>">
                  <?= form_error('jam_buka', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_jam_tutup">Jam Tutup</label>
                  <input type="time" class="form-control" name="jam_tutup" id="edit_jam_tutup" value="<?= set_value('jam_tutup'); ?>">
                  <?= form_error('jam_tutup', '<small class="text-danger pl-3">', '</small>'); ?>
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
      document.getElementById('edit_posyandu_id').value = data['posyandu_id'];
      document.getElementById('edit_tanggal').value = data['tanggal'];
      document.getElementById('edit_jam_buka').value = data['jam_buka'];
      document.getElementById('edit_jam_tutup').value = data['jam_tutup'];
   }
</script>