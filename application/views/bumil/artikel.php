<!-- -------- START PRE-FOOTER 1 w/ SUBSCRIBE BUTTON AND IMAGE ------- -->
<section class="my-5 pt-5">
   <div class="container">
      <div class="row">
         <div class="col-md-12 m-auto">
            <h4 class="text-center mb-5"><?= $title ?></h4>
            <div class="row">
               <?php foreach ($data as $field) : ?>
                  <div class="col-md-4 col-sx-12 mb-4">
                     <div class="card">
                        <div class="card-header">
                           <h4 class="text-center"><?= $field['judul'] ?></h4>
                        </div>
                        <div class="card-body">
                           <img src="<?= base_url("assets/img/kegiatan/" . $field['image']) ?>" alt="" width="100%">
                           <!-- <article>
                              <p><?= $field['deskripsi'] ?></p>
                           </article> -->
                           <a class="btn btn-primary mt-4" href="<?= base_url('bumil/detail_kegiatan/' . $field['id']) ?>">Lihat</a>
                        </div>
                     </div>
                  </div>
               <?php endforeach ?>

            </div>
         </div>
      </div>
   </div>
</section>
<!-- -------- END PRE-FOOTER 1 w/ SUBSCRIBE BUTTON AND IMAGE ------- -->