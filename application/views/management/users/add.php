<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel">Add User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('management/users') ?>" method="post">
            <div class="modal-body">
               <div class="form-group">
                  <input type="hidden" name="addData" id="addData" value="true">
                  <label for="name">Nama</label>
                  <input type="text" class="form-control" name="name" id="name" value="<?= set_value('name'); ?>" required>
                  <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" name="email" id="email" value="<?= set_value('email'); ?>" required>
                  <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="password">Password</label>
                  <input type="text" class="form-control" name="password" id="password" value="<?= set_value('password'); ?>" required>
                  <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="role_id">Role</label>
                  <select name="role_id" id="role_id" class="form-control" required>
                     <option value="">--Pilih Role--</option>
                     <option value="7" <?= set_select('role_id', '7', (!empty($_POST['role_id']) && $_POST['role_id'] == "7")); ?>>Bidan</option>
                     <option value="2" <?= set_select('role_id', '2', (!empty($_POST['role_id']) && $_POST['role_id'] == "2")); ?>>Kader</option>
                     <option value="8" <?= set_select('role_id', '8', (!empty($_POST['role_id']) && $_POST['role_id'] == "8")); ?>>Poli KIA</option>
                     <option value="4" <?= set_select('role_id', '4', (!empty($_POST['role_id']) && $_POST['role_id'] == "4")); ?>>Poli Gizi</option>
                     <!-- <option value="3" <?= set_select('role_id', '3', (!empty($_POST['role_id']) && $_POST['role_id'] == "3")); ?>>Anak</option> -->
                     <!-- <option value="5" <?= set_select('role_id', '5', (!empty($_POST['role_id']) && $_POST['role_id'] == "5")); ?>>Ibu Hamil</option> -->
                     <option value="6" <?= set_select('role_id', '6', (!empty($_POST['role_id']) && $_POST['role_id'] == "6")); ?>>Koordinator Imunisasi</option>
                  </select>
                  <?= form_error('role_id', '<small class="text-danger pl-3">', '</small>'); ?>
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