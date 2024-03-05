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
         <form action="<?= base_url('data/ibu_hamil/bidan') ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body">
               <input type="hidden" name="updateData" id="updateData" value="true">
               <input type="hidden" name="id" id="edit_id">
               <div class="form-group">
                  <label for="edit_n_ibu">Nama Bidan</label>
                  <input type="text" class="form-control" name="n_ibu" id="edit_n_ibu" value="<?= set_value('n_ibu'); ?>" required>
                  <?= form_error('n_ibu', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_no_medis">Nomor Medis</label>
                  <input type="text" class="form-control" name="no_medis" id="edit_no_medis" value="<?= set_value('no_medis'); ?>" required>
                  <?= form_error('no_medis', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_nik">NIK</label>
                  <input type="text" class="form-control" name="nik" id="edit_nik" value="<?= set_value('nik'); ?>" required>
                  <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_password">Password</label>
                  <input type="text" class="form-control" name="password" id="edit_password" value="<?= set_value('password'); ?>" required>
                  <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_n_suami">Nama Suami</label>
                  <input type="text" class="form-control" name="n_suami" id="edit_n_suami" value="<?= set_value('n_suami'); ?>" required>
                  <?= form_error('n_suami', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_alamat">Alamat</label>
                  <input type="text" class="form-control" name="alamat" id="edit_alamat" value="<?= set_value('alamat'); ?>" required>
                  <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_telepon">Telepon</label>
                  <input type="text" class="form-control" name="telepon" id="edit_telepon" value="<?= set_value('telepon'); ?>" required>
                  <?= form_error('telepon', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_tgl_lahir">Tanggal Lahir</label>
                  <input type="date" class="form-control" name="tgl_lahir" id="edit_tgl_lahir" value="<?= set_value('tgl_lahir'); ?>" required>
                  <?= form_error('tgl_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_golongan_darah">Golongan Darah</label>
                  <input type="text" class="form-control" name="golongan_darah" id="edit_golongan_darah" value="<?= set_value('golongan_darah'); ?>" required>
                  <?= form_error('golongan_darah', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_pekerjaan">Pekerjaan</label>
                  <input type="text" class="form-control" name="pekerjaan" id="edit_pekerjaan" value="<?= set_value('pekerjaan'); ?>" required>
                  <?= form_error('pekerjaan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_agama">Agama</label>
                  <input type="text" class="form-control" name="agama" id="edit_agama" value="<?= set_value('agama'); ?>" required>
                  <?= form_error('agama', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_pendidikan_terakhir">Pendidikan Terakhir</label>
                  <input type="text" class="form-control" name="pendidikan_terakhir" id="edit_pendidikan_terakhir" value="<?= set_value('pendidikan_terakhir'); ?>" required>
                  <?= form_error('pendidikan_terakhir', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_riwayat_penyakit">Riwayat Penyakit</label>
                  <input type="text" class="form-control" name="riwayat_penyakit" id="edit_riwayat_penyakit" value="<?= set_value('riwayat_penyakit'); ?>" required>
                  <?= form_error('riwayat_penyakit', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_photo">Photo</label>
                  <input type="file" class="form-control" name="photo" id="edit_photo" value="<?= set_value('photo'); ?>" required>
                  <?= form_error('photo', '<small class="text-danger pl-3">', '</small>'); ?>
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
      document.getElementById('edit_n_ibu').value = data['n_ibu'];
      document.getElementById('edit_no_medis').value = data['no_medis'];
      document.getElementById('edit_nik').value = data['nik'];
      document.getElementById('edit_password').value = data['password'];
      document.getElementById('edit_n_suami').value = data['n_suami'];
      document.getElementById('edit_alamat').value = data['alamat'];
      document.getElementById('edit_telepon').value = data['telepon'];
      document.getElementById('edit_tgl_lahir').value = data['tgl_lahir'];
      document.getElementById('edit_golongan_darah').value = data['golongan_darah'];
      document.getElementById('edit_pekerjaan').value = data['pekerjaan'];
      document.getElementById('edit_agama').value = data['agama'];
      document.getElementById('edit_pendidikan_terakhir').value = data['pendidikan_terakhir'];
      document.getElementById('edit_riwayat_penyakit').value = data['riwayat_penyakit'];
      document.getElementById('edit_photo').value = data['photo'];
   }
</script>