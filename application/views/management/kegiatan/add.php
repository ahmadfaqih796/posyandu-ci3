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
         <form action="<?= base_url('management/kegiatan') ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
               <input type="hidden" name="addData" id="addData" value="true">
               <div class="form-group">
                  <label for="judul">Judul</label>
                  <input type="text" class="form-control" name="judul" id="judul" value="<?= set_value('judul'); ?>">
                  <?= form_error('judul', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <!-- <div class="form-group">
                  <label for="deskripsi">Deskripsi</label>
                  <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?= set_value('deskripsi'); ?>">
                  <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
               </div> -->
               <div class="form-group">
                  <label for="kategori">Kategori</label>
                  <select name="kategori" id="kategori" class="form-control" required>
                     <option value="">--Pilih Kategori--</option>
                     <option value="anak" <?= set_select('kategori', 'anak', (!empty($_POST['kategori']) && $_POST['kategori'] == "anak")); ?>>Anak</option>
                     <option value="bumil" <?= set_select('kategori', 'bumil', (!empty($_POST['kategori']) && $_POST['kategori'] == "bumil")); ?>>Bumil</option>
                  </select>
                  <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="deskripsi">Deskripsi</label>
                  <input type="hidden" name="deskripsi" value="<?= set_value('deskripsi') ?>">
                  <div id="editor" style="min-height: 160px;"><?= set_value('deskripsi') ?></div>
               </div>
               <div class=" form-group">
                  <label for="waktu">Waktu</label>
                  <input type="date" class="form-control" name="waktu" id="waktu" value="<?= set_value('waktu'); ?>">
                  <?= form_error('waktu', '<small class="text-danger pl-3">', '</small>'); ?>
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