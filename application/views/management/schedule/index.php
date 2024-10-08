<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3">
         <div class="row">
            <div class="col-md-10 col-xs-12 align-self-center">
               <h6 class="m-0 font-weight-bold text-primary mb-2"><?= $title ?></h6>
            </div>
            <?php
            if ($role == 1 || $role == 2) {
            ?>
               <div class="col-md-2 col-xs-12">
                  <button type="button" class="btn btn-primary float-right btn-block" data-toggle="modal" data-target="#addModal">
                     <i class="fas fa-plus"></i> Tambah
                  </button>
                  <a type="button" class="btn btn-success float-right ml-2 btn-block" href="<?= base_url('management/schedule/print')  ?>">
                     <i class="fas fa-print"></i> PDF
                  </a>
               </div>
            <?php
            }
            ?>
         </div>
      </div>
      <div class="card-body">
         <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>') ?>
         <?= $this->session->flashdata('message'); ?>
         <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Nama Posyandu</th>
                     <th>Tanggal</th>
                     <th>Jam Buka</th>
                     <th>Jam Tutup</th>
                     <?php
                     if ($role == 1 || $role == 2) {
                     ?>
                        <th>Aksi</th>
                     <?php
                     }
                     ?>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($data as $field) : ?>
                     <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $field['n_posyandu'] ?></td>
                        <td><?= $field['tanggal'] ?></td>
                        <td><?= $field['jam_buka'] ?></td>
                        <td><?= $field['jam_tutup'] ?></td>
                        <?php
                        if ($role == 1 || $role == 2) {
                        ?>
                           <td>
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" onclick="getData(<?= htmlspecialchars(json_encode($field), ENT_QUOTES, 'UTF-8') ?>)">Edit</button>
                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="deleteData(<?= htmlspecialchars(json_encode($field), ENT_QUOTES, 'UTF-8') ?>)">Hapus</button>
                           </td>
                        <?php
                        }
                        ?>

                     </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>

</div>
<!-- /.container-fluid -->