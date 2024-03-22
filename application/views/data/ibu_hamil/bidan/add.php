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
         <form action="<?= base_url('data/ibu_hamil/bidan') ?>" method="post">
            <div class="modal-body">
               <input type="hidden" name="addData" id="addData" value="true">
               <div class="form-group">
                  <label for="n_ibu">Nama Ibu Hamil</label>
                  <input type="text" class="form-control" name="n_ibu" id="n_ibu" value="<?= set_value('n_ibu'); ?>" required>
                  <?= form_error('n_ibu', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="no_medis">Nomor Medis</label>
                  <input type="text" class="form-control" name="no_medis" id="no_medis" value="<?= set_value('no_medis'); ?>" required>
                  <?= form_error('no_medis', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="nik">NIK</label>
                  <input type="text" class="form-control" name="nik" id="nik" value="<?= set_value('nik'); ?>" required>
                  <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="password">Password</label>
                  <input type="text" class="form-control" name="password" id="password" value="<?= set_value('password'); ?>" required>
                  <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="n_suami">Nama Suami</label>
                  <input type="text" class="form-control" name="n_suami" id="n_suami" value="<?= set_value('n_suami'); ?>" required>
                  <?= form_error('n_suami', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="alamat">Alamat</label>
                  <input type="text" class="form-control" name="alamat" id="alamat" value="<?= set_value('alamat'); ?>" required>
                  <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="telepon">Telepon</label>
                  <input type="text" class="form-control" name="telepon" id="telepon" value="<?= set_value('telepon'); ?>" required>
                  <?= form_error('telepon', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="tgl_lahir">Tanggal Lahir</label>
                  <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?= set_value('tgl_lahir'); ?>" required>
                  <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="golongan_darah">Golongan Darah</label>
                  <input type="text" class="form-control" name="golongan_darah" id="golongan_darah" value="<?= set_value('golongan_darah'); ?>" required>
                  <?= form_error('golongan_darah', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="pekerjaan">Pekerjaan</label>
                  <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" value="<?= set_value('pekerjaan'); ?>" required>
                  <?= form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="agama">Agama</label>
                  <input type="text" class="form-control" name="agama" id="agama" value="<?= set_value('agama'); ?>" required>
                  <?= form_error('agama', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
                  <input type="text" class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir" value="<?= set_value('pendidikan_terakhir'); ?>" required>
                  <?= form_error('pendidikan_terakhir', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="riwayat_penyakit">Riwayat Penyakit</label>
                  <input type="text" class="form-control" name="riwayat_penyakit" id="riwayat_penyakit" value="<?= set_value('riwayat_penyakit'); ?>" required>
                  <?= form_error('riwayat_penyakit', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <!-- <div class="form-group">
                  <label for="photo">Photo</label>
                  <input type="file" class="form-control" name="photo" id="photo" value="<?= set_value('photo'); ?>" required>
                  <?= form_error('photo', '<small class="text-danger pl-3">', '</small>'); ?>
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