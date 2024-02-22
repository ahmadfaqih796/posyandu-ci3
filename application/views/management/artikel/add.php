<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel">Add Artikel</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('management/artikel') ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
               <input type="hidden" name="addData" id="addData" value="true">
               <div class="form-group">
                  <label for="judul">Judul</label>
                  <input type="text" class="form-control" name="judul" id="judul" value="<?= set_value('judul'); ?>">
                  <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="deskripsi">Deskripsi</label>
                  <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?= set_value('deskripsi'); ?>">
                  <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="kategori">Kategori</label>
                  <select name="kategori" id="kategori" class="form-control" required>
                     <option value="">--Pilih Kategori--</option>
                     <option value="1" <?= set_select('kategori', '1', (!empty($_POST['kategori']) && $_POST['kategori'] == "1")); ?>>Berat Badan Normal</option>
                     <option value="2" <?= set_select('kategori', '2', (!empty($_POST['kategori']) && $_POST['kategori'] == "2")); ?>>Berat Badan Sangat Kurang</option>
                     <option value="3" <?= set_select('kategori', '3', (!empty($_POST['kategori']) && $_POST['kategori'] == "3")); ?>>Berat Badan Lebih</option>
                     <option value="4" <?= set_select('kategori', '4', (!empty($_POST['kategori']) && $_POST['kategori'] == "4")); ?>>Berat Badan Kurang</option>
                  </select>
                  <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="image">Upload Gambar</label>
                  <input type="file" class="form-control" name="image" id="image" value="<?= set_value('image'); ?>">
                  <?= form_error('image', '<small class="text-danger pl-3">', '</small>'); ?>
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