<!-- Modal -->
<div class="modal fade" id="prosesModal" tabindex="-1" aria-labelledby="prosesModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="prosesModalLabel">Proses <?= $title ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="<?= base_url('monitoring/kegiatan_posyandu/proses') ?>" method="post">
            <input type="hidden" name="prosesData" id="prosesData" value="true">
            <div class="modal-body">
               <input type="hidden" name="id" id="proses_id">
               <p>Anda yakin ingin mengsetujui <?= $title ?>
                  <span id="proses_name"></span> ini ?
               </p>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
               <button type="submit" class="btn btn-info">Proses</button>
            </div>
         </form>
      </div>
   </div>
</div>

<script>
   function prosesData(data) {
      document.getElementById('proses_id').value = data['id'];
      document.getElementById('proses_name').innerHTML = data['n_posyandu'];
   }
</script>