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
         <form action="<?= base_url('data/ibu_hamil/kehamilan') ?>" method="post">
            <div class="modal-body">
               <input type="hidden" name="updateData" id="updateData" value="true">
               <input type="hidden" name="id" id="edit_id">
               <div class="form-group">
                  <label for="edit_bidan_id">Nama</label>
                  <select name="bidan_id" id="edit_bidan_id" class="form-control" required>
                     <option value="">-- Pilih Bidan --</option>
                     <?php foreach ($bidan as $field) : ?>
                        <option value="<?= $field['id'] ?>" <?= set_select('bidan_id', $field['id'], (!empty($_POST['bidan_id']) && $_POST['bidan_id'] == $field['id'])); ?>><?= $field['n_ibu'] ?></option>
                     <?php endforeach; ?>
                  </select>
                  <?= form_error('bidan_id', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_hamil_ke">Hamil Ke</label>
                  <input type="text" class="form-control" name="hamil_ke" id="edit_hamil_ke" value="<?= set_value('hamil_ke'); ?>" required>
                  <?= form_error('hamil_ke', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_hpht">HPHT</label>
                  <input type="date" class="form-control" name="hpht" id="edit_hpht" value="<?= set_value('hpht'); ?>" required>
                  <?= form_error('hpht', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_htp">HTP</label>
                  <input type="date" class="form-control" name="htp" id="edit_htp" value="<?= set_value('htp'); ?>" required>
                  <?= form_error('htp', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_jml_persalinan">Jumlah Persalinan</label>
                  <input type="text" class="form-control" name="jml_persalinan" id="edit_jml_persalinan" value="<?= set_value('jml_persalinan'); ?>" required>
                  <?= form_error('jml_persalinan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_jml_keguguran">Jumlah Keguguran</label>
                  <input type="text" class="form-control" name="jml_keguguran" id="edit_jml_keguguran" value="<?= set_value('jml_keguguran'); ?>" required>
                  <?= form_error('jml_keguguran', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_jml_anak_hidup">Jumlah Anak Hidup</label>
                  <input type="text" class="form-control" name="jml_anak_hidup" id="edit_jml_anak_hidup" value="<?= set_value('jml_anak_hidup'); ?>" required>
                  <?= form_error('jml_anak_hidup', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_jml_lahir_mati">Jumlah Lahir Mati</label>
                  <input type="text" class="form-control" name="jml_lahir_mati" id="edit_jml_lahir_mati" value="<?= set_value('jml_lahir_mati'); ?>" required>
                  <?= form_error('jml_lahir_mati', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_jarak_persalinan_terakhir">Jarak Persalinan Terakhir</label>
                  <input type="text" class="form-control" name="jarak_persalinan_terakhir" id="edit_jarak_persalinan_terakhir" value="<?= set_value('jarak_persalinan_terakhir'); ?>" required>
                  <?= form_error('jarak_persalinan_terakhir', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_tinggi_badan">Tinggi Badan</label>
                  <input type="text" class="form-control" name="tinggi_badan" id="edit_tinggi_badan" value="<?= set_value('tinggi_badan'); ?>" required>
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
      document.getElementById('edit_bidan_id').value = data['bidan_id'];
      document.getElementById('edit_hamil_ke').value = data['hamil_ke'];
      document.getElementById('edit_hpht').value = data['hpht'];
      document.getElementById('edit_htp').value = data['htp'];
      document.getElementById('edit_jml_persalinan').value = data['jml_persalinan'];
      document.getElementById('edit_jml_keguguran').value = data['jml_keguguran'];
      document.getElementById('edit_jml_anak_hidup').value = data['jml_anak_hidup'];
      document.getElementById('edit_jml_lahir_mati').value = data['jml_lahir_mati'];
      document.getElementById('edit_jarak_persalinan_terakhir').value = data['jarak_persalinan_terakhir'];
      document.getElementById('edit_tinggi_badan').value = data['tinggi_badan'];
   }
</script>