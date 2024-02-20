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
               <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addModal">
                  <i class="fas fa-plus"></i> Tambah
               </button>
               <a type="button" class="btn btn-success float-right mr-2" href="<?= base_url('management/ibu/print') ?>">
                  <i class="fas fa-print"></i> Cetak
               </a>
            </div>
         </div>
      </div>
      <div class="card-body">
         <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>') ?>
         <?= $this->session->flashdata('message'); ?>
         <div class="table-responsive">
            <table class="table table-bordered align-middle" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>NIK</th>
                     <th>Nama</th>
                     <th>Tempat Tanggal Lahir</th>
                     <th>Alamat</th>
                     <th>Golongan Darah</th>
                     <th>Telepon</th>
                     <th>Total Anak</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($users as $field) : ?>
                     <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $field['nik'] ?></td>
                        <td><?= $field['n_ibu'] ?></td>
                        <td><?= $field['tempat_lahir'] ? ($field['tempat_lahir'] . ', ' . $field['tanggal_lahir']) : '-' ?></td>
                        <td><?= $field['alamat'] ?></td>
                        <td><?= $field['golongan_darah'] ?></td>
                        <td><?= $field['telepon'] ?></td>
                        <td><?= $field['total_anak'] ?></td>
                        <td>
                           <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal" onclick="getData(<?= htmlspecialchars(json_encode($field), ENT_QUOTES, 'UTF-8') ?>)">Edit</button>
                           <a type="button" class="btn btn-success btn-sm" href="<?= base_url('management/ibu/detail/' . $field['id']) ?>">Detail</a>
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