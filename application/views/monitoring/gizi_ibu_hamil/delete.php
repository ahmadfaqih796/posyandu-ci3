<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Hapus <?= $title ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('monitoring/gizi_ibu_hamil/delete') ?>" method="post">
            <input type="hidden" name="deleteData" id="deleteData" value="true">
            <div class="modal-body">
               <input type="hidden" name="id" id="delete_id">
               <p>Anda yakin ingin menghapus <?= $title ?>
                  <span id="delete_name"></span> ini ?
               </p>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
               <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
         </form>
      </div>
   </div>
</div>

<script>
   function deleteData(data) {
      document.getElementById('delete_id').value = data['id'];
      document.getElementById('delete_name').innerHTML = data['n_ibu'];
   }
</script>