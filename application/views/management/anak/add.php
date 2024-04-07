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
         <form action="<?= base_url('management/anak') ?>" method="post">
            <div class="modal-body">
               <div class="form-group">
                  <input type="hidden" name="addData" id="addData" value="true">
                  <input type="hidden" name="id_kms" id="id_kms" value="<?= $this->session->userdata('user_id'); ?>">
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
            </div>
            <div class="modal-footer">
               <button type="reset" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
               <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
         </form>
      </div>
   </div>
</div>