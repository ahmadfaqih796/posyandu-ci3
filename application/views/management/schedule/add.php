<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel">Add Jadwal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('management/schedule') ?>" method="post">
            <div class="modal-body">
               <input type="hidden" name="user_id" id="user_id" value="<?= $this->session->userdata('user_id'); ?>">
               <input type="hidden" name="addData" id="addData" value="true">
               <div class="form-group">
                  <label for="posyandu_id">Posyandu</label>
                  <select name="posyandu_id" id="posyandu_id" class="form-control">
                     <?php foreach ($posyandu as $field) : ?>
                        <option value="<?= $field['id'] ?>" <?= set_select('posyandu_id', $field['id'], (!empty($_POST['posyandu_id']) && $_POST['posyandu_id'] == $field['id'])); ?>><?= $field['n_posyandu'] ?></option>
                     <?php endforeach; ?>
                  </select>
                  <?= form_error('posyandu_id', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="tanggal">tanggal</label>
                  <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= set_value('tanggal'); ?>">
                  <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="jam_buka">Jam Buka</label>
                  <input type="time" class="form-control" name="jam_buka" id="jam_buka" value="<?= set_value('jam_buka'); ?>">
                  <?= form_error('jam_buka', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="jam_tutup">Jam Tutup</label>
                  <input type="time" class="form-control" name="jam_tutup" id="jam_tutup" value="<?= set_value('jam_tutup'); ?>">
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