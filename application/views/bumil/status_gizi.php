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
                        <th>Nama</th>
                        <th>Tanggal Periksa</th>
                        <!-- <th>Trimester</th>
                        <th>Sesi</th> -->
                        <th>Berat Badan</th>
                        <th>Tinggi Badan</th>
                        <th>Status Gizi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     // var_dump($data);
                     foreach ($data as $field) :
                        $nilai_gizi = $field["berat_badan"] / (($field["tinggi_badan"] * $field["tinggi_badan"]) / 10000);
                        $status_gizi = '';
                        if ($nilai_gizi <= 18.5) {
                           $status_gizi = 'Kurus';
                        } elseif ($nilai_gizi <= 24.9) {
                           $status_gizi = 'Normal';
                        } elseif ($nilai_gizi <= 29.9) {
                           $status_gizi = 'Gemuk';
                        } else {
                           $status_gizi = 'Obesitas';
                        }
                     ?>
                        <tr>
                           <td><?= $no++ ?></td>
                           <td><?= $field['n_ibu'] ?></td>
                           <td><?= $field['tanggal_periksa'] ?></td>
                           <!-- <td><?= $field['kunjungan'] ?></td>
                           <td><?= $field['sesi'] ?></td> -->
                           <td><?= $field['berat_badan'] ?></td>
                           <td><?= $field['tinggi_badan'] ?></td>
                           <td><?= $status_gizi ?></td>
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