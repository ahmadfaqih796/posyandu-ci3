<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel"><?= $title ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('management/status_gizi') ?>" method="post">
            <div class="modal-body">
               <!-- Hidden input for storing user ID -->
               <input type="hidden" name="updateData" id="updateData" value="true">
               <input type="hidden" name="id" id="edit_id">
               <div class="form-group">
                  <label for="edit_umur">Umur (Bulan)</label>
                  <input type="text" class="form-control" name="umur" id="edit_umur" value="<?= set_value('umur'); ?>" required>
                  <?= form_error('umur', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_jk">Jenis Kelamin</label>
                  <select name="jk" id="edit_jk" class="form-control" required>
                     <option value="">--Pilih Jenis Kelamin--</option>
                     <option value="L" <?= set_select('jk', 'L', (!empty($_POST['jk']) && $_POST['jk'] == "L")); ?>>Laki - laki</option>
                     <option value="P" <?= set_select('jk', 'P', (!empty($_POST['jk']) && $_POST['jk'] == "P")); ?>>Perempuan</option>
                  </select>
                  <?= form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_g_min">Gizi Minimum</label>
                  <input type="text" class="form-control" name="g_min" id="edit_g_min" value="<?= set_value('g_min'); ?>" required>
                  <?= form_error('g_min', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_g_middle">Gizi Middle</label>
                  <input type="text" class="form-control" name="g_middle" id="edit_g_middle" value="<?= set_value('g_middle'); ?>" required>
                  <?= form_error('g_middle', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_g_max">Gizi Maximum</label>
                  <input type="text" class="form-control" name="g_max" id="edit_g_max" value="<?= set_value('g_max'); ?>" required>
                  <?= form_error('g_max', '<small class="text-danger pl-3">', '</small>'); ?>
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
      document.getElementById('edit_umur').value = data['umur'];
      document.getElementById('edit_jk').value = data['jk'];
      document.getElementById('edit_g_min').value = data['g_min'];
      document.getElementById('edit_g_middle').value = data['g_middle'];
      document.getElementById('edit_g_max').value = data['g_max'];
   }
</script>