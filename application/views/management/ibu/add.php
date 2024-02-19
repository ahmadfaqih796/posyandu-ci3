<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel">Add Ibu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('management/ibu') ?>" method="post">
            <div class="modal-body">
               <input type="hidden" name="addData" id="addData" value="true">
               <div class="form-group">
                  <label for="n_ibu">Nama Ibu</label>
                  <input type="text" class="form-control" name="n_ibu" id="n_ibu" value="<?= set_value('n_ibu'); ?>">
                  <?= form_error('n_ibu', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="nik">NIK</label>
                  <input type="text" class="form-control" name="nik" id="nik" value="<?= set_value('nik'); ?>">
                  <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="tempat_lahir">Tempat Lahir</label>
                  <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?= set_value('tempat_lahir'); ?>">
                  <?= form_error('tempat_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="tanggal_lahir">Tanggal Lahir</label>
                  <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?= set_value('tanggal_lahir'); ?>">
                  <?= form_error('tanggal_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="golongan_darah">Golongan Darah</label>
                  <input type="text" class="form-control" name="golongan_darah" id="golongan_darah" value="<?= set_value('golongan_darah'); ?>">
                  <?= form_error('golongan_darah', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input type="text" class="form-control" name="alamat" id="alamat" value="<?= set_value('alamat'); ?>">
                  <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="telepon">Telepon</label>
                  <input type="text" class="form-control" name="telepon" id="telepon" value="<?= set_value('telepon'); ?>">
                  <?= form_error('telepon', '<small class="text-danger pl-3">', '</small>'); ?>
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