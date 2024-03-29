<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel">Add Perkembangan Anak</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('management/perkembangan_anak') ?>" method="post">
            <div class="modal-body">
               <input type="hidden" name="addData" id="addData" value="true">
               <div class="form-group">
                  <label for="anak_id">Nama</label>
                  <select name="anak_id" id="anak_id" class="form-control" required>
                     <option value="">-- Pilih Anak --</option>
                     <?php foreach ($anak as $field) : ?>
                        <option value="<?= $field['user_id'] ?>" <?= set_select('anak_id', $field['user_id'], (!empty($_POST['anak_id']) && $_POST['anak_id'] == $field['user_id'])); ?>><?= $field['name'] ?></option>
                     <?php endforeach; ?>
                  </select>
                  <?= form_error('anak_id', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="usia">Usia</label>
                  <input type="text" class="form-control" name="usia" id="usia" value="<?= set_value('usia'); ?>">
                  <?= form_error('usia', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="tanggal_periksa">Tanggal Periksa</label>
                  <input type="date" class="form-control" name="tanggal_periksa" id="tanggal_periksa" value="<?= set_value('tanggal_periksa'); ?>">
                  <?= form_error('tanggal_periksa', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="berat_badan">Berat Badan</label>
                  <input type="text" class="form-control" name="berat_badan" id="berat_badan" value="<?= set_value('berat_badan'); ?>">
                  <?= form_error('berat_badan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="tinggi_badan">Tinggi Badan</label>
                  <input type="text" class="form-control" name="tinggi_badan" id="tinggi_badan" value="<?= set_value('tinggi_badan'); ?>">
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