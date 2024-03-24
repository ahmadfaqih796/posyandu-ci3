<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="addModalLabel">Add Ibu Hamil</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form id="addForm" method="post">
            <div class="modal-body">
               <!-- <input type="hidden" name="addData" id="addData" value="true"> -->
               <div class="form-group">
                  <label for="bumil_id">Nama</label>
                  <select name="bumil_id" id="bumil_id" class="form-control" required>
                     <option value="">-- Pilih Ibu Hamil --</option>
                     <?php foreach ($bidan as $field) : ?>
                        <option value="<?= $field['id'] ?>" <?= set_select('bumil_id', $field['id'], (!empty($_POST['bumil_id']) && $_POST['bumil_id'] == $field['id'])); ?>><?= $field['n_ibu'] ?></option>
                     <?php endforeach; ?>
                  </select>
                  <?= form_error('bumil_id', '<small class="text-danger pl-3">', '</small>'); ?>
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
   document.addEventListener('DOMContentLoaded', function() {
      var form = document.getElementById('addForm');
      form.addEventListener('submit', function(event) {
         event.preventDefault(); // Mencegah formulir untuk melakukan submit default

         // Lakukan pengalihan halaman menggunakan JavaScript
         var selectedValue = document.getElementById('bumil_id').value;
         var redirectUrl = '<?= base_url("monitoring/ibu_hamil/add/") ?>' + selectedValue;
         window.location.href = redirectUrl;
      });
   });
</script>