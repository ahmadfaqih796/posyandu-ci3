<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit Kader</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('management/anak') ?>" method="post">
            <div class="modal-body">
               <input type="hidden" name="updateData" id="updateData" value="true">
               <input type="hidden" name="id" id="edit_id">
               <div class="form-group">
                  <label for="edit_nik">NIK</label>
                  <input type="text" class="form-control" name="nik" id="edit_nik" value="<?= set_value('nik'); ?>">
                  <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_kms">KMS</label>
                  <input type="text" class="form-control" name="id_kms" id="edit_kms" value="<?= set_value('id_kms'); ?>">
                  <?= form_error('id_kms', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_posyandu_id">Posyandu</label>
                  <select name="posyandu_id" id="edit_posyandu_id" class="form-control">
                     <?php foreach ($posyandu as $field) : ?>
                        <option value="<?= $field['id'] ?>" <?= set_select('posyandu_id', $field['id'], (!empty($_POST['posyandu_id']) && $_POST['posyandu_id'] == $field['id'])); ?>><?= $field['n_posyandu'] ?></option>
                     <?php endforeach; ?>
                  </select>
                  <?= form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_jk">Status</label>
                  <select name="jk" id="edit_jk" class="form-control">
                     <option value="L" <?= set_select('jk', 'L', (!empty($_POST['jk']) && $_POST['jk'] == "L")); ?>>Laki - Laki</option>
                     <option value="P" <?= set_select('jk', 'P', (!empty($_POST['jk']) && $_POST['jk'] == "P")); ?>>Perempuan</option>
                  </select>
                  <?= form_error('jk', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_tempat_lahir">Tempat Lahir</label>
                  <input type="text" class="form-control" name="tempat_lahir" id="edit_tempat_lahir" value="<?= set_value('tempat_lahir'); ?>">
                  <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_tanggal_lahir">Tanggal Lahir</label>
                  <input type="date" class="form-control" name="tanggal_lahir" id="edit_tanggal_lahir" value="<?= set_value('tanggal_lahir'); ?>">
                  <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_alamat">Alamat</label>
                  <input type="text" class="form-control" name="alamat" id="edit_alamat" value="<?= set_value('alamat'); ?>">
                  <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_golongan_darah">Golongan Darah</label>
                  <input type="text" class="form-control" name="golongan_darah" id="edit_golongan_darah" value="<?= set_value('golongan_darah'); ?>">
                  <?= form_error('golongan_darah', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_anak_ke">Anak ke</label>
                  <input type="text" class="form-control" name="anak_ke" id="edit_anak_ke" value="<?= set_value('anak_ke'); ?>">
                  <?= form_error('anak_ke', '<small class="text-danger pl-3">', '</small>'); ?>
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
      document.getElementById('edit_nik').value = data['nik'];
      document.getElementById('edit_kms').value = data['id_kms'];
      document.getElementById('edit_posyandu_id').value = data['posyandu_id'];
      document.getElementById('edit_tempat_lahir').value = data['tempat_lahir'];
      document.getElementById('edit_tanggal_lahir').value = data['tanggal_lahir'];
      document.getElementById('edit_golongan_darah').value = data['golongan_darah'];
      document.getElementById('edit_jk').value = data['jk'];
      document.getElementById('edit_alamat').value = data['alamat'];
      document.getElementById('edit_anak_ke').value = data['anak_ke'];
      document.getElementById('edit_telepon').value = data['telepon'];
   }
</script>