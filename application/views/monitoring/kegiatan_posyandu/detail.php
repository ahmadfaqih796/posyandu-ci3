<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="detailModalLabel">Edit <?= $title ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('monitoring/kegiatan_posyandu') ?>" method="post">
            <div class="modal-body">
               <!-- Hidden input for storing user ID -->
               <input disabled type="hidden" name="updateData" id="updateData" value="true">
               <input disabled type="hidden" name="id" id="detail_id">
               <input disabled type="hidden" class="form-control" name="posyandu_id" id="detail_posyandu_id">
               <input disabled type="hidden" class="form-control" name="kader_id" id="detail_kader_id">
               <input disabled type="hidden" class="form-control" name="photo" id="detail_photo" value="<?= set_value('photo'); ?>">

               <div class="form-group">
                  <label>Nama Posyandu</label>
                  <input disabled type="text" id="detail_n_posyandu" class="form-control">
                  <?= form_error('n_kegiatan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="detail_n_kegiatan">Nama Kegiatan</label>
                  <input disabled type="text" class="form-control" name="n_kegiatan" id="detail_n_kegiatan" value="<?= set_value('n_kegiatan'); ?>">
                  <?= form_error('n_kegiatan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="detail_tujuan">Tujuan</label>
                  <input disabled type="text" class="form-control" name="tujuan" id="detail_tujuan" value="<?= set_value('tujuan'); ?>">
                  <?= form_error('tujuan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="detail_sasaran">Sasaran</label>
                  <input disabled type="text" class="form-control" name="sasaran" id="detail_sasaran" value="<?= set_value('sasaran'); ?>">
                  <?= form_error('sasaran', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="detail_parameter_keberhasilan">Parameter Keberhasilan</label>
                  <input disabled type="text" class="form-control" name="parameter_keberhasilan" id="detail_parameter_keberhasilan" value="<?= set_value('parameter_keberhasilan'); ?>">
                  <?= form_error('parameter_keberhasilan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="detail_j1">1. Adanya pemberitahuan lewat media mana saja saat H-1 pelaksanaan posyandu</label>
                  <select disabled name="j1" id="detail_j1" class="form-control" required>
                     <option value="">--Pilih Jawaban--</option>
                     <option value="ya" <?= set_select('j1', 'ya', (!empty($_POST['j1']) && $_POST['j1'] == "ya")); ?>>ya</option>
                     <option value="tidak" <?= set_select('j1', 'tidak', (!empty($_POST['j1']) && $_POST['j1'] == "tidak")); ?>>tidak</option>
                  </select>
                  <?= form_error('j1', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="detail_j2">2. Lokasi pelaksanaan posyandu tetap.</label>
                  <select disabled name="j2" id="detail_j2" class="form-control" required>
                     <option value="">--Pilih Jawaban--</option>
                     <option value="ya" <?= set_select('j2', 'ya', (!empty($_POST['j2']) && $_POST['j2'] == "ya")); ?>>ya</option>
                     <option value="tidak" <?= set_select('j2', 'tidak', (!empty($_POST['j2']) && $_POST['j2'] == "tidak")); ?>>tidak</option>
                  </select>
                  <?= form_error('j2', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="detail_j3">3. Pelaksanaan sesuai dengan jadwal yang ditentukan.</label>
                  <select disabled name="j3" id="detail_j3" class="form-control" required>
                     <option value="">--Pilih Jawaban--</option>
                     <option value="ya" <?= set_select('j3', 'ya', (!empty($_POST['j3']) && $_POST['j3'] == "ya")); ?>>ya</option>
                     <option value="tidak" <?= set_select('j3', 'tidak', (!empty($_POST['j3']) && $_POST['j3'] == "tidak")); ?>>tidak</option>
                  </select>
                  <?= form_error('j3', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="detail_j4">4. Tim pelaksana hadir tepat sebelum dimulainya kegiatan.</label>
                  <select disabled name="j4" id="detail_j4" class="form-control" required>
                     <option value="">--Pilih Jawaban--</option>
                     <option value="ya" <?= set_select('j4', 'ya', (!empty($_POST['j4']) && $_POST['j4'] == "ya")); ?>>ya</option>
                     <option value="tidak" <?= set_select('j4', 'tidak', (!empty($_POST['j4']) && $_POST['j4'] == "tidak")); ?>>tidak</option>
                  </select>
                  <?= form_error('j4', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="detail_j5">5. Hari ini dilaksanakan penyuluhan.</label>
                  <select disabled name="j5" id="detail_j5" class="form-control" required>
                     <option value="">--Pilih Jawaban--</option>
                     <option value="ya" <?= set_select('j5', 'ya', (!empty($_POST['j5']) && $_POST['j5'] == "ya")); ?>>ya</option>
                     <option value="tidak" <?= set_select('j5', 'tidak', (!empty($_POST['j5']) && $_POST['j5'] == "tidak")); ?>>tidak</option>
                  </select>
                  <?= form_error('j5', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="detail_j6">6. Ada kunjungan rumah yang dilakukan untuk kegiatan hari ini.</label>
                  <select disabled name="j6" id="detail_j6" class="form-control" required>
                     <option value="">--Pilih Jawaban--</option>
                     <option value="ya" <?= set_select('j6', 'ya', (!empty($_POST['j6']) && $_POST['j6'] == "ya")); ?>>ya</option>
                     <option value="tidak" <?= set_select('j6', 'tidak', (!empty($_POST['j6']) && $_POST['j6'] == "tidak")); ?>>tidak</option>
                  </select>
                  <?= form_error('j6', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="detail_j7">7. Masukan jumlah anak yang hadir langsung ke tempat posyandu :</label>
                  <input disabled type="number" class="form-control" name="j7" id="detail_j7" value="<?= set_value('j7'); ?>">
                  <?= form_error('j7', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="detail_j8">8. Jumlah anak yang tidak datang :</label>
                  <input disabled type="number" class="form-control" name="j8" id="detail_j8" value="<?= set_value('j8'); ?>">
                  <?= form_error('j8', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="detail_j9">9. Jumlah anak yang di imunisasi ditempat :</label>
                  <input disabled type="number" class="form-control" name="j9" id="detail_j9" value="<?= set_value('j9'); ?>">
                  <?= form_error('j9', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="detail_j10">10. Jumlah anak yang dilakukan kunjungan rumah :</label>
                  <input disabled type="number" class="form-control" name="j10" id="detail_j10" value="<?= set_value('j10'); ?>">
                  <?= form_error('j10', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
            </div>
            <div class="modal-footer">
               <button type="reset" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
         </form>
      </div>
   </div>
</div>

<script>
   function getDetailData(data) {
      document.getElementById('detail_id').value = data['id'];
      document.getElementById('detail_posyandu_id').value = data['posyandu_id'];
      document.getElementById('detail_kader_id').value = data['kader_id'];
      document.getElementById('detail_n_posyandu').value = data['n_posyandu'];
      document.getElementById('detail_n_kegiatan').value = data['n_kegiatan'];
      document.getElementById('detail_tujuan').value = data['tujuan'];
      document.getElementById('detail_sasaran').value = data['sasaran'];
      document.getElementById('detail_parameter_keberhasilan').value = data['parameter_keberhasilan'];
      document.getElementById('detail_j1').value = data['j1'];
      document.getElementById('detail_j2').value = data['j2'];
      document.getElementById('detail_j3').value = data['j3'];
      document.getElementById('detail_j4').value = data['j4'];
      document.getElementById('detail_j5').value = data['j5'];
      document.getElementById('detail_j6').value = data['j6'];
      document.getElementById('detail_j7').value = data['j7'];
      document.getElementById('detail_j8').value = data['j8'];
      document.getElementById('detail_j9').value = data['j9'];
      document.getElementById('detail_j10').value = data['j10'];
      document.getElementById('detail_photo').value = data['photo'];
      document.getElementById('detail_is_verified').value = data['is_verified'];
   }
</script>