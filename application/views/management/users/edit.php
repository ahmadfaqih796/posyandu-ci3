<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('management/users') ?>" method="post">
            <div class="modal-body">
               <!-- Hidden input for storing user ID -->
               <input type="hidden" name="updateData" id="updateData" value="true">
               <input type="hidden" name="id" id="edit_id">
               <div class="form-group">
                  <label for="name">Nama</label>
                  <input type="text" class="form-control" name="name" id="edit_name" value="<?= set_value('name'); ?>">
                  <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" name="email" id="edit_email" value="<?= set_value('email'); ?>">
                  <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_role_id">Role</label>
                  <select name="role_id" id="edit_role_id" class="form-control">
                     <!-- <option value="" selected>--Pilih Role--</option> -->
                     <option value="1" <?= set_select('role_id', '1', (!empty($_POST['role_id']) && $_POST['role_id'] == "1")); ?>>Admin</option>
                     <option value="2" <?= set_select('role_id', '2', (!empty($_POST['role_id']) && $_POST['role_id'] == "2")); ?>>Kader</option>
                     <option value="3" <?= set_select('role_id', '3', (!empty($_POST['role_id']) && $_POST['role_id'] == "3")); ?>>User</option>
                  </select>
                  <?= form_error('role_id', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="form-group">
                  <label for="edit_is_active">Status</label>
                  <select name="is_active" id="edit_is_active" class="form-control">
                     <option value="0" <?= set_select('is_active', '0', (!empty($_POST['is_active']) && $_POST['is_active'] == "0")); ?>>Tidak Aktif</option>
                     <option value="1" <?= set_select('is_active', '1', (!empty($_POST['is_active']) && $_POST['is_active'] == "1")); ?>>Aktif</option>
                  </select>
                  <?= form_error('is_active', '<small class="text-danger pl-3">', '</small>'); ?>
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
      document.getElementById('edit_name').value = data['name'];
      document.getElementById('edit_email').value = data['email'];
      document.getElementById('edit_password').value = data['password'];
      document.getElementById('edit_role_id').value = data['role_id'];
      document.getElementById('edit_is_active').value = data['is_active'];
   }
</script>