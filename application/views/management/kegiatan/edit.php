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
         <form action="<?= base_url('management/kegiatan') ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
               <!-- Hidden input for storing user ID -->
               <input type="hidden" name="updateData" id="updateData" value="true">
               <input type="hidden" name="id" id="edit_id">
               <input type="hidden" name="old_image" id="edit_old_image">
               <div class="form-group">
                  <label for="edit_judul">Judul</label>
                  <input type="text" class="form-control" name="judul" id="edit_judul" value="<?= set_value('judul'); ?>">
                  <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_kategori">Kategori</label>
                  <select name="kategori" id="edit_kategori" class="form-control" required>
                     <option value="">--Pilih Kategori--</option>
                     <option value="anak" <?= set_select('kategori', 'anak', (!empty($_POST['kategori']) && $_POST['kategori'] == "anak")); ?>>Anak</option>
                     <option value="bumil" <?= set_select('kategori', 'bumil', (!empty($_POST['kategori']) && $_POST['kategori'] == "bumil")); ?>>Bumil</option>
                  </select>
                  <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_deskripsi">Deskripsi</label>
                  <input type="text" class="form-control" name="deskripsi" id="edit_deskripsi" value="<?= set_value('deskripsi'); ?>">
                  <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <!-- <div class="form-group">
                  <label for="deskripsi">Deskripsi</label>
                  <input type="hidden" name="deskripsi" value="<?= set_value('deskripsi') ?>">
                  <div id="editorEdit" style="min-height: 160px;"><?= set_value('deskripsi') ?></div>
               </div> -->
               <div class="form-group">
                  <label for="edit_waktu">Waktu</label>
                  <input type="date" class="form-control" name="waktu" id="edit_waktu" value="<?= set_value('waktu'); ?>">
                  <?= form_error('waktu', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <!-- <div class="form-group">
                  <label for="edit_image">Upload Gambar</label>
                  <input type="file" class="form-control" name="image" id="edit_image">
                  <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
               </div> -->
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
      document.getElementById('edit_judul').value = data['judul'];
      document.getElementById('edit_deskripsi').value = data['deskripsi']; // Jika Anda masih memerlukan input teks biasa
      document.getElementById('edit_kategori').value = data['kategori']; // Jika Anda masih memerlukan input teks biasa
      document.getElementById('edit_waktu').value = data['waktu'];
   }
</script>