<!-- -------- START PRE-FOOTER 1 w/ SUBSCRIBE BUTTON AND IMAGE ------- -->
<section class="my-5 pt-5">
   <div class="container">
      <div class="text-center">
         <h4><?= $title ?></h4>
      </div>
      <div class="row justify-content-center">
         <div class="col-md-6">
            <div class="card">
               <div class="card-body">
                  <img src="<?= base_url("assets/img/ibu_hamil/" . $detail['photo']) ?>" alt="" style="width: 100px; height: 100px; border: 3px solid black; border-radius: 50%; object-fit: contain; object-position: center; margin: 10px auto; display: block;">
                  <!-- <?= var_dump($detail) ?> -->
                  <table class="table table-borderless table-sm">
                     <tbody>
                        <tr>
                           <td>Nama Ibu Hamil</td>
                           <td>:</td>
                           <td><?= $detail['n_ibu'] ?></td>
                        </tr>
                        <tr>
                           <td>Nama Suami</td>
                           <td>:</td>
                           <td><?= $detail['n_suami'] ?></td>
                        </tr>
                        <tr>
                           <td>NIK</td>
                           <td>:</td>
                           <td><?= $detail['nik'] ?></td>
                        </tr>
                        <tr>
                           <td>No Rekam Medis</td>
                           <td>:</td>
                           <td><?= $detail['no_medis'] ?></td>
                        </tr>
                        <tr>
                           <td>Alamat</td>
                           <td>:</td>
                           <td><?= $detail['alamat'] ?></td>
                        </tr>
                        <tr>
                           <td>Golongan Darah</td>
                           <td>:</td>
                           <td><?= $detail['golongan_darah'] ?></td>
                        </tr>
                        <tr>
                           <td>Telepon</td>
                           <td>:</td>
                           <td><?= $detail['telepon'] ?></td>
                        </tr>
                     </tbody>
                  </table>
                  <a class="btn btn-primary text-center" href="<?= base_url('bumil/edit/' . $detail['id']) ?>">Edit</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- -------- END PRE-FOOTER 1 w/ SUBSCRIBE BUTTON AND IMAGE ------- -->