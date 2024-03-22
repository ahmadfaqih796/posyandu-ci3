<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel">Add <?= $title ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('data/ibu_hamil/kematian') ?>" method="post">
            <div class="modal-body">
               <input type="hidden" name="addData" id="addData" value="true">
               <div class="form-group">
                  <label for="bumil_id">Nama</label>
                  <select name="bumil_id" id="bumil_id" class="form-control" required>
                     <option value="">-- Pilih Ibu Hamil --</option>
                     <?php foreach ($bidan as $field) : ?>
                        <option value="<?= $field['id'] ?>" <?= set_select('bumil_id', $field['id'], (!empty($_POST['bumil_id']) && $_POST['bumil_id'] == $field['id'])); ?>><?= $field['n_ibu'] ?></option>
                     <?php endforeach; ?>
                  </select>
                  <?= form_error('bumil_id', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="tgl_kematian">Tanggal kematian</label>
                  <input type="date" class="form-control" name="tgl_kematian" id="tgl_kematian" value="<?= set_value('tgl_kematian'); ?>" required>
                  <?= form_error('tgl_kematian', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="usia">Usia</label>
                  <input type="text" class="form-control" name="usia" id="usia" value="<?= set_value('usia'); ?>" required>
                  <?= form_error('usia', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="penyebab">Penyebab Kematian</label>
                  <input type="text" class="form-control" name="penyebab" id="penyebab" value="<?= set_value('penyebab'); ?>" required>
                  <?= form_error('penyebab', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="jenis">jenis Kematian</label>
                  <input type="text" class="form-control" name="jenis" id="jenis" value="<?= set_value('jenis'); ?>" required>
                  <?= form_error('jenis', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="meninggal_di">Meninggal di</label>
                  <input type="text" class="form-control" name="meninggal_di" id="meninggal_di" value="<?= set_value('meninggal_di'); ?>" required>
                  <?= form_error('meninggal_di', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="keterangan">Keterangan</label>
                  <input type="text" class="form-control" name="keterangan" id="keterangan" value="<?= set_value('keterangan'); ?>" required>
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