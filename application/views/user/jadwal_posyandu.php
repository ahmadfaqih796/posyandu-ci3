<!-- -------- START PRE-FOOTER 1 w/ SUBSCRIBE BUTTON AND IMAGE ------- -->
<section class="my-5 pt-5">
   <div class="container">
      <div class="row">
         <div class="col-md-12 m-auto">
            <h4 class="text-center mb-5"><?= $title ?></h4>
            <div class="table-responsive">
               <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Nama Posyandu</th>
                        <th>Tanggal</th>
                        <th>Jam Buka</th>
                        <th>Jam Tutup</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($posyandu as $field) : ?>
                        <tr>
                           <td><?= $no++ ?></td>
                           <td><?= $field['n_posyandu'] ?></td>
                           <td><?= $field['tanggal'] ?></td>
                           <td><?= $field['jam_buka'] ?></td>
                           <td><?= $field['jam_tutup'] ?></td>
                        </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
         <!-- <div class="col-md-5 ms-auto">
            <div class="position-relative">
               <img class="max-width-50 w-100 position-relative z-index-2" src="<?= base_url("assets/img/soft-ui/") ?>illustrations/sign-up.png" alt="image">
            </div>
         </div> -->
      </div>
   </div>
</section>
<!-- -------- END PRE-FOOTER 1 w/ SUBSCRIBE BUTTON AND IMAGE ------- -->