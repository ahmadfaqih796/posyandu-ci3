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
         <form action="<?= base_url('monitoring/kegiatan_posyandu') ?>" method="post">
            <div class="modal-body">
               <!-- Hidden input for storing user ID -->
               <input type="hidden" name="updateData" id="updateData" value="true">
               <input type="hidden" name="id" id="edit_id">
               <input type="hidden" class="form-control" name="posyandu_id" id="edit_posyandu_id">
               <input type="hidden" class="form-control" name="kader_id" id="edit_kader_id">
               <input type="hidden" class="form-control" name="photo" id="edit_photo" value="<?= set_value('photo'); ?>">

               <div class="form-group">
                  <label>Nama Posyandu</label>
                  <input disabled type="text" id="edit_n_posyandu" class="form-control">
                  <?= form_error('n_kegiatan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_n_kegiatan">Nama Kegiatan</label>
                  <input type="text" class="form-control" name="n_kegiatan" id="edit_n_kegiatan" value="<?= set_value('n_kegiatan'); ?>">
                  <?= form_error('n_kegiatan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_kehadiran">Kehadiran</label>
                  <select name="kehadiran" id="edit_kehadiran" class="form-control" required>
                     <option value="">--Pilih Kehadiran--</option>
                     <option value="1" <?= set_select('kehadiran', '1', (!empty($_POST['kehadiran']) && $_POST['kehadiran'] == "1")); ?>>hadir</option>
                     <option value="0" <?= set_select('kehadiran', '0', (!empty($_POST['kehadiran']) && $_POST['kehadiran'] == "0")); ?>>tidak hadir / kunjungan rumah</option>
                  </select>
                  <?= form_error('kehadiran', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_tujuan">Tujuan</label>
                  <input type="text" class="form-control" name="tujuan" id="edit_tujuan" value="<?= set_value('tujuan'); ?>">
                  <?= form_error('tujuan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_sasaran">Sasaran</label>
                  <input type="text" class="form-control" name="sasaran" id="edit_sasaran" value="<?= set_value('sasaran'); ?>">
                  <?= form_error('sasaran', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_parameter_keberhasilan">Parameter Keberhasilan</label>
                  <input type="text" class="form-control" name="parameter_keberhasilan" id="edit_parameter_keberhasilan" value="<?= set_value('parameter_keberhasilan'); ?>">
                  <?= form_error('parameter_keberhasilan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_j1">1. Adanya pemberitahuan lewat media mana saja saat H-1 pelaksanaan posyandu</label>
                  <select name="j1" id="edit_j1" class="form-control" required>
                     <option value="">--Pilih Jawaban--</option>
                     <option value="ya" <?= set_select('j1', 'ya', (!empty($_POST['j1']) && $_POST['j1'] == "ya")); ?>>ya</option>
                     <option value="tidak" <?= set_select('j1', 'tidak', (!empty($_POST['j1']) && $_POST['j1'] == "tidak")); ?>>tidak</option>
                  </select>
                  <?= form_error('j1', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_j2">2. Lokasi pelaksanaan posyandu tetap.</label>
                  <select name="j2" id="edit_j2" class="form-control" required>
                     <option value="">--Pilih Jawaban--</option>
                     <option value="ya" <?= set_select('j2', 'ya', (!empty($_POST['j2']) && $_POST['j2'] == "ya")); ?>>ya</option>
                     <option value="tidak" <?= set_select('j2', 'tidak', (!empty($_POST['j2']) && $_POST['j2'] == "tidak")); ?>>tidak</option>
                  </select>
                  <?= form_error('j2', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_j3">3. Pelaksanaan sesuai dengan jadwal yang ditentukan.</label>
                  <select name="j3" id="edit_j3" class="form-control" required>
                     <option value="">--Pilih Jawaban--</option>
                     <option value="ya" <?= set_select('j3', 'ya', (!empty($_POST['j3']) && $_POST['j3'] == "ya")); ?>>ya</option>
                     <option value="tidak" <?= set_select('j3', 'tidak', (!empty($_POST['j3']) && $_POST['j3'] == "tidak")); ?>>tidak</option>
                  </select>
                  <?= form_error('j3', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_j4">4. Tim pelaksana hadir tepat sebelum dimulainya kegiatan.</label>
                  <select name="j4" id="edit_j4" class="form-control" required>
                     <option value="">--Pilih Jawaban--</option>
                     <option value="ya" <?= set_select('j4', 'ya', (!empty($_POST['j4']) && $_POST['j4'] == "ya")); ?>>ya</option>
                     <option value="tidak" <?= set_select('j4', 'tidak', (!empty($_POST['j4']) && $_POST['j4'] == "tidak")); ?>>tidak</option>
                  </select>
                  <?= form_error('j4', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_j5">5. Hari ini dilaksanakan penyuluhan.</label>
                  <select name="j5" id="edit_j5" class="form-control" required>
                     <option value="">--Pilih Jawaban--</option>
                     <option value="ya" <?= set_select('j5', 'ya', (!empty($_POST['j5']) && $_POST['j5'] == "ya")); ?>>ya</option>
                     <option value="tidak" <?= set_select('j5', 'tidak', (!empty($_POST['j5']) && $_POST['j5'] == "tidak")); ?>>tidak</option>
                  </select>
                  <?= form_error('j5', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_j6">6. Ada kunjungan rumah yang dilakukan untuk kegiatan hari ini.</label>
                  <select name="j6" id="edit_j6" class="form-control" required>
                     <option value="">--Pilih Jawaban--</option>
                     <option value="ya" <?= set_select('j6', 'ya', (!empty($_POST['j6']) && $_POST['j6'] == "ya")); ?>>ya</option>
                     <option value="tidak" <?= set_select('j6', 'tidak', (!empty($_POST['j6']) && $_POST['j6'] == "tidak")); ?>>tidak</option>
                  </select>
                  <?= form_error('j6', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_j7">7. Masukan jumlah anak yang hadir langsung ke tempat posyandu :</label>
                  <input type="number" class="form-control" name="j7" id="edit_j7" value="<?= set_value('j7'); ?>">
                  <?= form_error('j7', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_j8">8. Jumlah anak yang tidak datang :</label>
                  <input type="number" class="form-control" name="j8" id="edit_j8" value="<?= set_value('j8'); ?>">
                  <?= form_error('j8', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_j9">9. Jumlah anak yang di imunisasi ditempat :</label>
                  <input type="number" class="form-control" name="j9" id="edit_j9" value="<?= set_value('j9'); ?>">
                  <?= form_error('j9', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_j10">10. Jumlah anak yang dilakukan kunjungan rumah :</label>
                  <input type="number" class="form-control" name="j10" id="edit_j10" value="<?= set_value('j10'); ?>">
                  <?= form_error('j10', '<small class="text-danger pl-3">', '</small>'); ?>
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
      document.getElementById('edit_posyandu_id').value = data['posyandu_id'];
      document.getElementById('edit_kader_id').value = data['kader_id'];
      document.getElementById('edit_n_posyandu').value = data['n_posyandu'];
      document.getElementById('edit_n_kegiatan').value = data['n_kegiatan'];
      document.getElementById('edit_tujuan').value = data['tujuan'];
      document.getElementById('edit_sasaran').value = data['sasaran'];
      document.getElementById('edit_parameter_keberhasilan').value = data['parameter_keberhasilan'];
      document.getElementById('edit_j1').value = data['j1'];
      document.getElementById('edit_j2').value = data['j2'];
      document.getElementById('edit_j3').value = data['j3'];
      document.getElementById('edit_j4').value = data['j4'];
      document.getElementById('edit_j5').value = data['j5'];
      document.getElementById('edit_j6').value = data['j6'];
      document.getElementById('edit_j7').value = data['j7'];
      document.getElementById('edit_j8').value = data['j8'];
      document.getElementById('edit_j9').value = data['j9'];
      document.getElementById('edit_j10').value = data['j10'];
      document.getElementById('edit_photo').value = data['photo'];
   }
</script>