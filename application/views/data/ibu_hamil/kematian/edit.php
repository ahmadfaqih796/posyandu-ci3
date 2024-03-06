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
         <form action="<?= base_url('data/ibu_hamil/kematian') ?>" method="post">
            <div class="modal-body">
               <input type="hidden" name="updateData" id="updateData" value="true">
               <input type="hidden" name="id" id="edit_id">
               <input type="hidden" name="bidan_id" id="edit_bidan_id">
               <div class="form-group">
                  <label for="edit_tgl_kematian">Tanggal kematian</label>
                  <input type="date" class="form-control" name="tgl_kematian" id="edit_tgl_kematian" value="<?= set_value('tgl_kematian'); ?>" required>
                  <?= form_error('tgl_kematian', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_usia">Usia</label>
                  <input type="text" class="form-control" name="usia" id="edit_usia" value="<?= set_value('usia'); ?>" required>
                  <?= form_error('usia', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_penyebab">Penyebab Kematian</label>
                  <input type="text" class="form-control" name="penyebab" id="edit_penyebab" value="<?= set_value('penyebab'); ?>" required>
                  <?= form_error('penyebab', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_jenis">jenis Kematian</label>
                  <input type="text" class="form-control" name="jenis" id="edit_jenis" value="<?= set_value('jenis'); ?>" required>
                  <?= form_error('jenis', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_meninggal_di">Meninggal di</label>
                  <input type="text" class="form-control" name="meninggal_di" id="edit_meninggal_di" value="<?= set_value('meninggal_di'); ?>" required>
                  <?= form_error('meninggal_di', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_keterangan">Keterangan</label>
                  <input type="text" class="form-control" name="keterangan" id="edit_keterangan" value="<?= set_value('keterangan'); ?>" required>
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

<script>
   function getData(data) {
      document.getElementById('edit_id').value = data['id'];
      document.getElementById('edit_bidan_id').value = data['bidan_id'];
      document.getElementById('edit_tgl_kematian').value = data['tgl_kematian'];
      document.getElementById('edit_usia').value = data['usia'];
      document.getElementById('edit_penyebab').value = data['penyebab'];
      document.getElementById('edit_jenis').value = data['jenis'];
      document.getElementById('edit_meninggal_di').value = data['meninggal_di'];
      document.getElementById('edit_keterangan').value = data['keterangan'];
   }
</script>