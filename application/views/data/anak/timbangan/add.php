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
         <form action="<?= base_url('data/anak/timbangan') ?>" method="post">
            <div class="modal-body">
               <input type="hidden" name="addData" id="addData" value="true">
               <input type="hidden" name="created_by" id="created_by" value="<?= $this->session->userdata('fullname'); ?>">
               <div class="form-group">
                  <label for="anak_id">Nama Anak</label>
                  <select name="anak_id" id="anak_id" class="form-control" required>
                     <option value="">-- Pilih Anak --</option>
                     <?php foreach ($anak as $field) : ?>
                        <option value="<?= $field['user_id'] ?>" <?= set_select('anak_id', $field['user_id'], (!empty($_POST['anak_id']) && $_POST['anak_id'] == $field['user_id'])); ?>><?= $field['name'] . " - " . $field['nik'] . " - " . $field['n_posyandu'] ?></option>
                     <?php endforeach; ?>
                  </select>
                  <?= form_error('anak_id', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="tgl_ukur">Tanggal Ukur</label>
                  <input type="date" class="form-control" name="tgl_ukur" id="tgl_ukur" value="<?= set_value('tgl_ukur'); ?>" required>
                  <?= form_error('tgl_ukur', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="umur">Umur (Bulan)</label>
                  <input type="number" class="form-control" name="umur" id="umur" value="<?= set_value('umur'); ?>" required>
                  <?= form_error('umur', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="lingkar_kepala">Lingkar Kepala (cm)</label>
                  <input type="text" class="form-control" name="lingkar_kepala" id="lingkar_kepala" value="<?= set_value('lingkar_kepala'); ?>" required>
                  <?= form_error('lingkar_kepala', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="berat_badan">Berat Badan (kg)</label>
                  <input type="text" class="form-control" name="berat_badan" id="berat_badan" value="<?= set_value('berat_badan'); ?>" required>
                  <?= form_error('berat_badan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="tinggi_badan">Tinggi Badan (cm)</label>
                  <input type="text" class="form-control" name="tinggi_badan" id="tinggi_badan" value="<?= set_value('tinggi_badan'); ?>" required>
                  <?= form_error('tinggi_badan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="keterangan">Keterangan</label>
                  <input type="text" class="form-control" name="keterangan" id="keterangan" value="<?= set_value('keterangan'); ?>" required>
                  <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="photo" id="photoLabel">Photo</label>
                  <div id="cameraFeed" style="width: 100%;"></div>
                  <input type="hidden" class="form-control" name="photo" id="photo" value="<?= set_value('photo'); ?>">
                  <?= form_error('photo', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <button type="button" class="btn btn-primary" id="btnPhoto">Ambil Foto</button>

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
   document.addEventListener("DOMContentLoaded", function() {
      var video = document.createElement('video');
      var canvas = document.createElement('canvas');
      var photoInput = document.getElementById('photo');
      var cameraFeed = document.getElementById('cameraFeed');
      var btnPhoto = document.getElementById('btnPhoto');
      var labelPhoto = document.getElementById('photoLabel');

      labelPhoto.style.display = 'none';
      video.style.display = 'block';
      video.style.width = "300px";
      video.style.margin = "0 auto";

      btnPhoto.addEventListener('click', function() {
         // Mengakses kamera menggunakan getUserMedia API
         navigator.mediaDevices.getUserMedia({
               video: true
            })
            .then(function(stream) {
               labelPhoto.style.display = 'block';
               btnPhoto.style.display = 'none';
               video.srcObject = stream;
               video.play();
               cameraFeed.appendChild(video);
            })
            .catch(function(err) {
               console.error('Tidak dapat mengakses kamera:', err);
            });
      });

      video.addEventListener('click', function() {
         canvas.width = video.videoWidth;
         canvas.height = video.videoHeight;
         canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);

         var imageDataURL = canvas.toDataURL('image/jpeg');
         var imgPreview = document.createElement('img');
         imgPreview.style.display = 'block';
         imgPreview.style.width = "300px";
         imgPreview.style.margin = "0 auto";
         imgPreview.src = imageDataURL;
         photoInput.value = imageDataURL;
         // Menghapus video dan canvas setelah mengambil gambar
         video.srcObject.getTracks().forEach(track => track.stop());
         video.remove();
         canvas.remove();
         cameraFeed.appendChild(imgPreview);
      });
   });
</script>