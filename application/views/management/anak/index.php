<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3">
         <div class="row">
            <div class="col-6 align-self-center">
               <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
            </div>
            <div class="col-6">
               <a type="button" class="btn btn-success float-right" href="<?= base_url('management/anak/print') ?>">
                  <i class="fas fa-print"></i> Cetak
               </a>
            </div>
         </div>
      </div>
      <div class="card-body">
         <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>') ?>
         <?= $this->session->flashdata('message'); ?>
         <div class="table-responsive">
            <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>KMS</th>
                     <th>Nama</th>
                     <th>Email</th>
                     <th>Tempat Tanggal Lahir</th>
                     <th>Alamat</th>
                     <th>Golongan Darah</th>
                     <th>Anak ke</th>
                     <th>Status</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($users as $field) : ?>
                     <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $field['id_kms'] ?></td>
                        <td><?= $field['name'] ?></td>
                        <td><?= $field['email'] ?></td>
                        <td><?= $field['tempat_lahir'] . ', ' . $field['tanggal_lahir'] ?></td>
                        <td><?= $field['alamat'] ?></td>
                        <td><?= $field['golongan_darah'] ?></td>
                        <td><?= $field['anak_ke'] ?></td>
                        <td><?= $field['is_active'] == 1 ? 'Aktif' : 'Tidak Aktif' ?></td>
                        <td>
                           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" onclick="getData(<?= htmlspecialchars(json_encode($field), ENT_QUOTES, 'UTF-8') ?>)">Edit</button>
                           <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="getData(<?= htmlspecialchars(json_encode($field), ENT_QUOTES, 'UTF-8') ?>)">Hapus</button> -->
                        </td>
                     </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>

</div>
<!-- /.container-fluid -->