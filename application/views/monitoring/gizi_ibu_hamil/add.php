<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel">Add Posyandu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('monitoring/gizi_ibu_hamil') ?>" method="post">
            <div class="modal-body">
               <input type="hidden" name="user_id" id="user_id" value="<?= $this->session->userdata('user_id'); ?>">
               <input type="hidden" name="addData" id="addData" value="true">
               <div class="form-group">
                  <label for="bidan_id">Nama</label>
                  <select name="bidan_id" id="bidan_id" class="form-control" required>
                     <option value="">-- Pilih Bidan --</option>
                     <?php foreach ($bidan as $field) : ?>
                        <option value="<?= $field['id'] ?>" <?= set_select('bidan_id', $field['id'], (!empty($_POST['bidan_id']) && $_POST['bidan_id'] == $field['id'])); ?>><?= $field['n_ibu'] ?></option>
                     <?php endforeach; ?>
                  </select>
                  <?= form_error('bidan_id', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="trimester">Kunjungan</label>
                  <select name="trimester" id="trimester" class="form-control" required>
                     <option value="">--Pilih Kunjungan--</option>
                     <option value="Trimester 1" <?= set_select('trimester', 'Trimester 1', (!empty($_POST['trimester']) && $_POST['trimester'] == "Trimester 1")); ?>>Trimester 1</option>
                     <option value="Trimester 2" <?= set_select('trimester', 'Trimester 2', (!empty($_POST['trimester']) && $_POST['trimester'] == "Trimester 2")); ?>>Trimester 2</option>
                     <option value="Trimester 3" <?= set_select('trimester', 'Trimester 3', (!empty($_POST['trimester']) && $_POST['trimester'] == "Trimester 3")); ?>>Trimester 3</option>
                  </select>
                  <?= form_error('trimester', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="sesi">Sesi</label>
                  <select name="sesi" id="sesi" class="form-control" required>
                     <option value="">--Pilih Sesi--</option>
                     <?php for ($i = 1; $i <= 8; $i++) { ?>
                        <option value="<?= $i ?>" <?= set_select('sesi', "$i", (!empty($_POST['sesi']) && $_POST['sesi'] == "$i")); ?>><?= $i ?></option>
                     <?php
                     } ?>
                  </select>
                  <?= form_error('sesi', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="berat_badan">Berat Badan</label>
                  <input type="number" class="form-control" name="berat_badan" id="berat_badan" value="<?= set_value('berat_badan'); ?>">
                  <?= form_error('berat_badan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="tinggi_badan">Tinggi Badan</label>
                  <input type="number" class="form-control" name="tinggi_badan" id="tinggi_badan" value="<?= set_value('tinggi_badan'); ?>">
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