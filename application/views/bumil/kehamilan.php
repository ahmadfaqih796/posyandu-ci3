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
                        <th>Hamil Ke</th>
                        <th>HPHT</th>
                        <th>HTP</th>
                        <th>Jumlah Kehamilan</th>
                        <th>Jumlah Lahir Hidup</th>
                        <th>Jumlah Lahir Mati</th>
                        <th>Jarak Persalinan Terakhir</th>
                        <th>Jenis Persalinan Terakhir</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($data as $field) : ?>
                        <tr>
                           <td><?= $no++ ?></td>
                           <td><?= $field['n_ibu'] ?></td>
                           <td><?= $field['hamil_ke'] ?></td>
                           <td><?= $field['hpht'] ?></td>
                           <td><?= $field['htp'] ?></td>
                           <td><?= $field['jml_kehamilan'] ?></td>
                           <td><?= $field['jml_lahir_hidup'] ?></td>
                           <td><?= $field['jml_lahir_mati'] ?></td>
                           <td><?= $field['jarak_persalinan_terakhir'] ?></td>
                           <td><?= $field['jenis_persalinan_terakhir'] ?></td>
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