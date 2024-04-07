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
         <form action="<?= base_url('monitoring/kegiatan_posyandu') ?>" method="post">
            <div class="modal-body">
               <input type="hidden" name="addData" id="addData" value="true">
               <input type="hidden" class="form-control" name="n_posyandu" id="n_posyandu" value="<?= $kader['n_posyandu'] ?>">
               <input type="hidden" class="form-control" name="kader_id" id="kader_id" value="<?= $kader['user_id'] ?>">
               <div class="form-group">
                  <label for="n_kegiatan">Nama Posyandu</label>
                  <input disabled type="text" class="form-control" value="<?= $kader['n_posyandu'] ?>">
                  <?= form_error('n_kegiatan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="n_kegiatan">Nama Kegiatan</label>
                  <input type="text" class="form-control" name="n_kegiatan" id="n_kegiatan" value="<?= set_value('n_kegiatan'); ?>">
                  <?= form_error('n_kegiatan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="tujuan">Tujuan</label>
                  <input type="text" class="form-control" name="tujuan" id="tujuan" value="<?= set_value('tujuan'); ?>">
                  <?= form_error('tujuan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="sasaran">Sasaran</label>
                  <input type="text" class="form-control" name="sasaran" id="sasaran" value="<?= set_value('sasaran'); ?>">
                  <?= form_error('sasaran', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="parameter_keberhasilan">Parameter Keberhasilan</label>
                  <input type="text" class="form-control" name="parameter_keberhasilan" id="parameter_keberhasilan" value="<?= set_value('parameter_keberhasilan'); ?>">
                  <?= form_error('parameter_keberhasilan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="tujuan">Tujuan</label>
                  <input type="text" class="form-control" name="tujuan" id="tujuan" value="<?= set_value('tujuan'); ?>">
                  <?= form_error('tujuan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="j1">1. Adanya pemberitahuan lewat media mana saja saat H-1 pelaksanaan posyandu</label>
                  <select name="j1" id="j1" class="form-control" required>
                     <option value="">--Pilih Jawaban--</option>
                     <option value="ya" <?= set_select('j1', 'ya', (!empty($_POST['j1']) && $_POST['j1'] == "ya")); ?>>ya</option>
                     <option value="tidak" <?= set_select('j1', 'tidak', (!empty($_POST['j1']) && $_POST['j1'] == "tidak")); ?>>tidak</option>
                  </select>
                  <?= form_error('j1', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="j2">2. Lokasi pelaksanaan posyandu tetap.</label>
                  <select name="j2" id="j2" class="form-control" required>
                     <option value="">--Pilih Jawaban--</option>
                     <option value="ya" <?= set_select('j2', 'ya', (!empty($_POST['j2']) && $_POST['j2'] == "ya")); ?>>ya</option>
                     <option value="tidak" <?= set_select('j2', 'tidak', (!empty($_POST['j2']) && $_POST['j2'] == "tidak")); ?>>tidak</option>
                  </select>
                  <?= form_error('j2', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="j3">3. Pelaksanaan sesuai dengan jadwal yang ditentukan.</label>
                  <select name="j3" id="j3" class="form-control" required>
                     <option value="">--Pilih Jawaban--</option>
                     <option value="ya" <?= set_select('j3', 'ya', (!empty($_POST['j3']) && $_POST['j3'] == "ya")); ?>>ya</option>
                     <option value="tidak" <?= set_select('j3', 'tidak', (!empty($_POST['j3']) && $_POST['j3'] == "tidak")); ?>>tidak</option>
                  </select>
                  <?= form_error('j3', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="j4">4. Tim pelaksana hadir tepat sebelum dimulainya kegiatan.</label>
                  <select name="j4" id="j4" class="form-control" required>
                     <option value="">--Pilih Jawaban--</option>
                     <option value="ya" <?= set_select('j4', 'ya', (!empty($_POST['j4']) && $_POST['j4'] == "ya")); ?>>ya</option>
                     <option value="tidak" <?= set_select('j4', 'tidak', (!empty($_POST['j4']) && $_POST['j4'] == "tidak")); ?>>tidak</option>
                  </select>
                  <?= form_error('j4', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="j5">5. Hari ini dilaksanakan penyuluhan.</label>
                  <select name="j5" id="j5" class="form-control" required>
                     <option value="">--Pilih Jawaban--</option>
                     <option value="ya" <?= set_select('j5', 'ya', (!empty($_POST['j5']) && $_POST['j5'] == "ya")); ?>>ya</option>
                     <option value="tidak" <?= set_select('j5', 'tidak', (!empty($_POST['j5']) && $_POST['j5'] == "tidak")); ?>>tidak</option>
                  </select>
                  <?= form_error('j5', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="j6">6. Ada kunjungan rumah yang dilakukan untuk kegiatan hari ini.</label>
                  <select name="j6" id="j6" class="form-control" required>
                     <option value="">--Pilih Jawaban--</option>
                     <option value="ya" <?= set_select('j6', 'ya', (!empty($_POST['j6']) && $_POST['j6'] == "ya")); ?>>ya</option>
                     <option value="tidak" <?= set_select('j6', 'tidak', (!empty($_POST['j6']) && $_POST['j6'] == "tidak")); ?>>tidak</option>
                  </select>
                  <?= form_error('j6', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="j7">7. Masukan jumlah anak yang hadir langsung ke tempat posyandu :</label>
                  <input type="number" class="form-control" name="j7" id="j7" value="<?= set_value('j7'); ?>">
                  <?= form_error('j7', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="j8">8. Jumlah anak yang tidak datang :</label>
                  <input type="number" class="form-control" name="j8" id="j8" value="<?= set_value('j8'); ?>">
                  <?= form_error('j8', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="j9">9. Jumlah anak yang di imunisasi ditempat :</label>
                  <input type="number" class="form-control" name="j9" id="j9" value="<?= set_value('j9'); ?>">
                  <?= form_error('j9', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="j10">10. Jumlah anak yang dilakukan kunjungan rumah :</label>
                  <input type="number" class="form-control" name="j10" id="j10" value="<?= set_value('j10'); ?>">
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