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
                        <th>Posyandu</th>
                        <th>Nama Anak</th>
                        <th>NIK</th>
                        <th>Alamat</th>
                        <th>Tanggal Ukur</th>
                        <th>Umur (bulan)</th>
                        <th>Lingkar Kepala (cm)</th>
                        <th>Berat Badan (kg)</th>
                        <th>Tinggi Badan (cm)</th>
                        <th>Status Gizi BB/U</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($data as $field) : ?>
                        <tr>
                           <td><?= $no++ ?></td>
                           <td><?= $field['n_posyandu'] ?></td>
                           <td><?= $field['name'] ?></td>
                           <td><?= $field['nik'] ?></td>
                           <td><?= $field['alamat'] ?></td>
                           <td><?= $field['tgl_ukur'] ?></td>
                           <td><?= $field['umur'] ?></td>
                           <td><?= $field['lingkar_kepala'] ?></td>
                           <td><?= $field['berat_badan'] ?></td>
                           <td><?= $field['tinggi_badan'] ?></td>
                           <td><?= $field['status_gizi'] ?></td>
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