<!-- Modal -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="viewModalLabel">Lihat <?= $title ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <h1 id="view_judul"></h1>
            <div id="view_deskripsi"></div>
         </div>
      </div>
   </div>
</div>

<script>
   function getData(data) {
      document.getElementById('view_judul').innerHTML = data['judul'];
      var deskripsiHTML = data['deskripsi'].replace(/&lt;/g, '<').replace(/&gt;/g, '>');
      document.getElementById('view_deskripsi').innerHTML = deskripsiHTML;
   }
</script>