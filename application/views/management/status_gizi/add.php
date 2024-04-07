<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel"><?= $title ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('management/status_gizi') ?>" method="post">
            <input type="hidden" name="addData" id="addData" value="true">
            <div class="modal-body">
               <div class="form-group">
                  <label for="umur">Umur (Bulan)</label>
                  <input type="text" class="form-control" name="umur" id="umur" value="<?= set_value('umur'); ?>" required>
                  <?= form_error('umur', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="jk">Jenis Kelamin</label>
                  <select name="jk" id="jk" class="form-control" required>
                     <option value="">--Pilih Jenis Kelamin--</option>
                     <option value="L" <?= set_select('jk', 'L', (!empty($_POST['jk']) && $_POST['jk'] == "L")); ?>>Laki - laki</option>
                     <option value="P" <?= set_select('jk', 'P', (!empty($_POST['jk']) && $_POST['jk'] == "P")); ?>>Perempuan</option>
                  </select>
                  <?= form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="g_min">Gizi Minimum</label>
                  <input type="text" class="form-control" name="g_min" id="g_min" value="<?= set_value('g_min'); ?>" required>
                  <?= form_error('g_min', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="g_middle">Gizi Middle</label>
                  <input type="text" class="form-control" name="g_middle" id="g_middle" value="<?= set_value('g_middle'); ?>" required>
                  <?= form_error('g_middle', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="g_max">Gizi Maximum</label>
                  <input type="text" class="form-control" name="g_max" id="g_max" value="<?= set_value('g_max'); ?>" required>
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