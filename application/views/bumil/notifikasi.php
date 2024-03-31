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
                        <th>Nama Ibu Hamil</th>
                        <th>Kunjungan Berikutnya</th>
                        <th>Pesan</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     foreach ($data as $field) : ?>
                        <tr>
                           <td><?= $no++ ?></td>
                           <td><?= $field['n_ibu'] ?></td>
                           <td><?= $field['kunjungan_berikutnya'] ?></td>
                           <td><?= 'Jangan lupa datang kunjungan berikutnya pada tanggal ' . $field['kunjungan_berikutnya'] ?></td>

                        </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- -------- END PRE-FOOTER 1 w/ SUBSCRIBE BUTTON AND IMAGE ------- -->