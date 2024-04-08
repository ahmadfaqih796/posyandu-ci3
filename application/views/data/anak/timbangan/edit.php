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
         <form action="<?= base_url('data/anak/timbangan') ?>" method="post">
            <div class="modal-body">
               <input type="hidden" name="updateData" id="updateData" value="true">
               <input type="hidden" name="id" id="edit_id">
               <input type="hidden" name="anak_id" id="edit_anak_id">
               <input type="hidden" name="created_by" id="edit_created_by">
               <div class="form-group">
                  <label for="edit_tgl_ukur">Tanggal Ukur</label>
                  <input type="date" class="form-control" name="tgl_ukur" id="edit_tgl_ukur" value="<?= set_value('tgl_ukur'); ?>" required>
                  <?= form_error('tgl_ukur', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_umur">Umur (Bulan)</label>
                  <input type="number" class="form-control" name="umur" id="edit_umur" value="<?= set_value('umur'); ?>" required>
                  <?= form_error('umur', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_lingkar_kepala">Lingkar Kepala (cm)</label>
                  <input type="number" class="form-control" name="lingkar_kepala" id="edit_lingkar_kepala" value="<?= set_value('lingkar_kepala'); ?>" required>
                  <?= form_error('lingkar_kepala', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_berat_badan">Berat Badan (kg)</label>
                  <input type="number" class="form-control" name="berat_badan" id="edit_berat_badan" value="<?= set_value('berat_badan'); ?>" required>
                  <?= form_error('berat_badan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_tinggi_badan">Tinggi Badan (cm)</label>
                  <input type="number" class="form-control" name="tinggi_badan" id="edit_tinggi_badan" value="<?= set_value('tinggi_badan'); ?>" required>
                  <?= form_error('tinggi_badan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_keterangan">Keterangan</label>
                  <input type="text" class="form-control" name="keterangan" id="edit_keterangan" value="<?= set_value('keterangan'); ?>" required>
                  <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <input type="hidden" class="form-control" name="photo" id="edit_photo" value="<?= set_value('photo'); ?>">

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
      console.log("dataaaaaaaa", data)
      document.getElementById('edit_id').value = data['table_id'];
      document.getElementById('edit_anak_id').value = data['anak_id'];
      document.getElementById('edit_created_by').value = data['created_by'];
      document.getElementById('edit_umur').value = data['umur'];
      document.getElementById('edit_tgl_ukur').value = data['tgl_ukur'];
      document.getElementById('edit_lingkar_kepala').value = data['lingkar_kepala'];
      document.getElementById('edit_berat_badan').value = data['berat_badan'];
      document.getElementById('edit_tinggi_badan').value = data['tinggi_badan'];
      document.getElementById('edit_keterangan').value = data['keterangan'];
      document.getElementById('edit_photo').value = data['photo'];

   }
</script>