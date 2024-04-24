<!-- Modal -->
<div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="filterModalLabel">Cari <?= $title ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form id="addForm" method="post">
            <div class="modal-body">
               <!-- <input type="hidden" name="addData" id="addData" value="true"> -->
               <?php if ($role != 2) { ?>
                  <div class="form-group">
                     <label for="posyandu_id">Posyandu</label>
                     <select name="posyandu_id" id="posyandu_id" class="form-control" required>
                        <option value="">-- Pilih Posyandu --</option>
                        <?php foreach ($posyandu as $field) : ?>
                           <option value="<?= $field['id'] ?>" <?= set_select('posyandu_id', $field['id'], (!empty($_POST['posyandu_id']) && $_POST['posyandu_id'] == $field['id'])); ?>><?= $field['n_posyandu'] ?></option>
                        <?php endforeach; ?>
                     </select>
                     <?= form_error('posyandu_id', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
               <?php } else { ?>
                  <input type="hidden" class="form-control" name="posyandu_id" id="posyandu_id" value="<?= $kader['posyandu_id'] ?>">
               <?php } ?>
               <div class="form-group">
                  <label for="tanggal">Tanggal Pengajuan</label>
                  <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= set_value('tanggal'); ?>" required>
                  <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
            </div>
            <div class="modal-footer">
               <button type="reset" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
               <button type="submit" class="btn btn-primary">Cari</button>
            </div>
         </form>
      </div>
   </div>
</div>

<script>
   document.addEventListener('DOMContentLoaded', function() {
      var form = document.getElementById('addForm');
      form.addEventListener('submit', function(event) {
         event.preventDefault();
         var selectedValue = document.getElementById('posyandu_id').value;
         var tanggal = document.getElementById('tanggal').value;
         var redirectUrl = '<?= base_url("monitoring/kegiatan_posyandu/data/") ?>' + selectedValue + '/' + tanggal;
         window.location.href = redirectUrl;
      });
   });
</script>