<!-- Begin Page Content -->
<div class="container-fluid">
   <div class="row">
      <div class="col-md-5">
         <div class="card mb-3">
            <div class="row no-gutters">
               <!-- <div class="col-md-4">
                  <div class="card-body">
                     <img src="<?= base_url("assets/img/profile/") . $detail['image'] ?>" class="card-img" alt="img.jpg">
                  </div>
               </div> -->
               <div class="col-md-12">
                  <div class="card-body">
                     <h1 class="h4 mb-4 text-gray-800 text-center"><?= $title ?></h1>
                     <table class="table table-borderless table-sm">
                        <tbody>
                           <tr>
                              <td>Nama</td>
                              <td>:</td>
                              <td><?= $detail['n_ibu'] ?></td>
                           </tr>
                           <tr>
                              <td>NIK</td>
                              <td>:</td>
                              <td><?= $detail['nik'] ?></td>
                           </tr>
                           <tr>
                              <td>TTL</td>
                              <td>:</td>
                              <td><?= $detail['tempat_lahir'] ? ($detail['tempat_lahir'] . ', ' . $detail['tanggal_lahir']) : '-' ?></td>
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
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-7">
         <div class="card">
            <div class="card-body">
               <h1 class="h4 mb-4 text-gray-800 text-center">Data Anak</h1>
               <div class="table-responsive">
                  <table class="table table-bordered align-middle" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>NIK</th>
                           <th>KMS</th>
                           <th>Nama</th>
                           <th>Nama Orang Tua</th>
                           <th>Posyandu</th>
                           <th>Jenis Kelamin</th>
                           <th>Tempat Tanggal Lahir</th>
                           <th>Alamat</th>
                           <th>Golongan Darah</th>
                           <th>Anak ke</th>
                           <th>Status</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($d_anak as $field) : ?>
                           <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $field['nik'] ?></td>
                              <td><?= $field['id_kms'] ?></td>
                              <td><?= $field['name'] ?></td>
                              <td><?= $field['n_ibu'] ?></td>
                              <td><?= $field['n_posyandu'] ?></td>
                              <td><?= $field['jk'] == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                              <td><?= $field['tempat_lahir'] ? ($field['tempat_lahir'] . ', ' . $field['tanggal_lahir']) : '-' ?></td>
                              <td><?= $field['alamat'] ?></td>
                              <td><?= $field['golongan_darah'] ?></td>
                              <td><?= $field['anak_ke'] ?></td>
                              <td><?= $field['is_active'] == 1 ? 'Aktif' : 'Tidak Aktif' ?></td>
                           </tr>
                        <?php endforeach; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>




   </div>
</div>
<!-- /.container-fluid -->