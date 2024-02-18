<!-- Begin Page Content -->
<div class="container-fluid">
   <div class="row">
      <div class="col-md-5">
         <div class="card mb-3">
            <div class="row no-gutters">
               <div class="col-md-4">
                  <div class="card-body">
                     <img src="<?= base_url("assets/img/profile/") . $detail['image'] ?>" class="card-img" alt="img.jpg">
                  </div>
               </div>
               <div class="col-md-8">
                  <div class="card-body">
                     <h1 class="h3 mb-4 text-gray-800 text-center"><?= $title ?></h1>
                     <table class="table table-borderless table-sm">
                        <tbody>
                           <tr>
                              <td>Nama</td>
                              <td>:</td>
                              <td><?= $detail['name'] ?></td>
                           </tr>
                           <tr>
                              <td>NIK</td>
                              <td>:</td>
                              <td><?= $detail['nik'] ?></td>
                           </tr>
                           <tr>
                              <td>KMS</td>
                              <td>:</td>
                              <td><?= $detail['id_kms'] ?></td>
                           </tr>
                           <tr>
                              <td>Posyandu</td>
                              <td>:</td>
                              <td><?= $detail['n_posyandu'] ?></td>
                           </tr>
                           <tr>
                              <td>TTL</td>
                              <td>:</td>
                              <td><?= $detail['tempat_lahir'] ? ($detail['tempat_lahir'] . ', ' . $detail['tanggal_lahir']) : '-' ?></td>
                           </tr>
                           <tr>
                              <td>Jenis Kelamin</td>
                              <td>:</td>
                              <td><?= $detail['jk'] == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
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
                              <td>Anak Ke</td>
                              <td>:</td>
                              <td><?= $detail['anak_ke'] ?></td>
                           </tr>
                           <tr>
                              <td>Status</td>
                              <td>:</td>
                              <td><?= $detail['is_active'] == 1 ? 'Aktif' : 'Tidak Aktif' ?></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-7">
         <div class="card">
            <div class="card-body">
               <h1 class="h4 mb-4 text-gray-800 text-center">Data Imunisasi</h1>
               <div class="table-responsive">
                  <table class="table table-bordered align-middle" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>NIK</th>
                           <th>Nama</th>
                           <th>Tanggal Imunisasi</th>
                           <th>Jenis Imunisasi</th>
                           <th>Status</th>
                        </tr>
                     </thead>
                     <tbody>
                        <!-- <?php foreach ($users as $field) : ?>
                           <tr>
                              <td><?= $no++ ?></td>
                              
                           </tr>
                        <?php endforeach; ?> -->
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>




   </div>
   <!-- /.container-fluid -->