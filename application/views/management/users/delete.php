<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('management/users') ?>" method="post">
            <div class="modal-body">
               <!-- Hidden input for storing user ID -->
               <input type="hidden" name="deleteData" id="deleteData" value="true">
               <input type="hidden" name="name" id="name" value="true">
               <input type="hidden" name="id" id="delete_id">
               <p>Apakah anda yakin ingin menghapus user <span id="delete_name"></span> ini?</p>
            </div>
            <div class="modal-footer">
               <button type="reset" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
               <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
         </form>
      </div>
   </div>
</div>

<script>
   function getDataDelete(data) {
      console.log("dadadad", data)
      document.getElementById('delete_id').value = data['id'];
      document.getElementById('delete_name').innerHTML = data['name'];
   }
</script>