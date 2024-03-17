<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit <?= $title ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('monitoring/gizi_ibu_hamil') ?>" method="post">
            <div class="modal-body">
               <!-- Hidden input for storing user ID -->
               <input type="hidden" name="updateData" id="updateData" value="true">
               <input type="hidden" name="id" id="edit_id">
               <input type="hidden" name="bumil_id" id="edit_bumil_id">

               <div class="form-group">
                  <label for="edit_trimester">Status</label>
                  <select name="trimester" id="edit_trimester" class="form-control">
                     <option value="Trimester 1" <?= set_select('trimester', 'Trimester 1', (!empty($_POST['trimester']) && $_POST['trimester'] == "Trimester 1")); ?>>Trimester 1</option>
                     <option value="Trimester 2" <?= set_select('trimester', 'Trimester 2', (!empty($_POST['trimester']) && $_POST['trimester'] == "Trimester 2")); ?>>Trimester 2</option>
                     <option value="Trimester 3" <?= set_select('trimester', 'Trimester 3', (!empty($_POST['trimester']) && $_POST['trimester'] == "Trimester 3")); ?>>Trimester 3</option>
                  </select>
                  <?= form_error('trimester', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_sesi">Sesi</label>
                  <select name="sesi" id="edit_sesi" class="form-control" required>
                     <?php for ($i = 1; $i <= 8; $i++) { ?>
                        <option value="<?= $i ?>" <?= set_select('sesi', "$i", (!empty($_POST['sesi']) && $_POST['sesi'] == "$i")); ?>><?= $i ?></option>
                     <?php } ?>
                  </select>
                  <?= form_error('sesi', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_berat_badan">Berat Badan</label>
                  <input type="text" class="form-control" name="berat_badan" id="edit_berat_badan" value="<?= set_value('berat_badan'); ?>">
                  <?= form_error('berat_badan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_tinggi_badan">Tinggi Badan</label>
                  <input type="text" class="form-control" name="tinggi_badan" id="edit_tinggi_badan" value="<?= set_value('tinggi_badan'); ?>">
                  <?= form_error('tinggi_badan', '<small class="text-danger pl-3">', '</small>'); ?>
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
      document.getElementById('edit_bumil_id').value = data['bumil_id'];
      document.getElementById('edit_trimester').value = data['trimester'];
      document.getElementById('edit_sesi').value = data['sesi'];
      document.getElementById('edit_berat_badan').value = data['berat_badan'];
      document.getElementById('edit_tinggi_badan').value = data['tinggi_badan'];
   }
</script>