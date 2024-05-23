<!-- -------- START PRE-FOOTER 1 w/ SUBSCRIBE BUTTON AND IMAGE ------- -->
<section class="my-5 pt-5">
   <div class="container">
      <div class="row">
         <div class="col-md-12 m-auto">
            <h4 class="text-center mb-5"><?= $title ?></h4>
            <div class="table-responsive">
               <table id="myTable" class="table align-items-center mb-0">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Nama Posyandu</th>
                        <th>Tanggal Imunisasi</th>
                        <th>Imunisasi</th>
                        <th>Status</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($users as $field) :
                     ?>
                        <tr>
                           <td><?= $no++ ?></td>
                           <td><?= $field['nik'] ?></td>
                           <td><?= $field['name'] ?></td>
                           <td><?= $field['n_posyandu'] ?></td>
                           <td><?= $field['tanggal_imunisasi'] ?></td>
                           <td><?= $field['n_imunisasi'] ?></td>
                           <td><?= $field['status'] == 1 ? 'Sudah' : 'Belum' ?></td>>
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