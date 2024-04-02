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
                        <!-- <th>Nama Ibu Hamil</th> -->
                        <th>Hamil ke</th>
                        <th>Kunjugan</th>
                        <th>Keluhan</th>
                        <th>Sesi</th>
                        <th>Tanggal Periksa</th>
                        <th>Kunjungan Berikutnya</th>
                        <th>Status Standar 7T</th>
                        <th>Aksi</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     // var_dump($data);
                     foreach ($data as $field) :
                        $standar7t = [
                           $field['s_timbang_berat_badan'],
                           $field['s_tekanan_darah'],
                           $field['s_tinggi_puncak_rahim'],
                           $field['s_vaksinasi_tetanus'],
                           $field['s_tablet_zat_besi'],
                           $field['s_tes_laboratorium'],
                           $field['s_temu_wicara'],
                        ];
                        $result = 0;
                        foreach ($standar7t as $value) {
                           if (strpos($value, 'belum') !== false) {
                              $result = 1;
                              break;
                           }
                        }
                     ?>
                        <tr>
                           <td><?= $no++ ?></td>
                           <!-- <td><?= $field['n_ibu'] ?></td> -->
                           <td><?= $field['hamil_ke'] ?></td>
                           <td><?= $field['kunjungan'] ?></td>
                           <td><?= $field['keluhan'] ?></td>
                           <td><?= $field['sesi'] ?></td>
                           <td><?= $field['tanggal_periksa'] ?></td>
                           <td><?= $field['kunjungan_berikutnya'] ?></td>
                           <td><?= $result == 1 ? 'Belum' : 'Sudah' ?></td>
                           <td>
                              <a href="<?= base_url('bumil/detail_monitoring/' . $field['id']) ?>" class="btn btn-primary mt-3">Detail</a>
                           </td>
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