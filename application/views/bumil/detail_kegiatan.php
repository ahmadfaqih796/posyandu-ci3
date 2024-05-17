<!-- -------- START PRE-FOOTER 1 w/ SUBSCRIBE BUTTON AND IMAGE ------- -->
<section class="my-5 pt-5">
   <div class="container">
      <div class="row ">
         <div class="col-md-12 m-auto">
            <div class="card">
               <div class="card-header">
                  <h4 class="text-center"><?= $detail['judul'] ?></h4>
               </div>
               <div class="card-body">
                  <img src="<?= base_url("assets/img/kegiatan/" . $detail['image']) ?>" alt="" class="gambar">
                  <div><?= html_entity_decode($detail['deskripsi']) ?></div>

               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- -------- END PRE-FOOTER 1 w/ SUBSCRIBE BUTTON AND IMAGE ------- -->