<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3">
         <div class="row">
            <div class="col-md-10 col-xs-12 align-self-center">
               <h6 class="m-0 font-weight-bold text-primary mb-2"><?= $title ?></h6>
            </div>
            <div class="col-md-2 col-xs-12">
               <a type="button" class="btn btn-success float-right ml-2 btn-block" href="<?= base_url('data/ibu_hamil/ibu_hamil/pdf') ?>">
                  <i class="fas fa-print"></i> PDF
               </a>
               <button type="button" class="btn btn-primary float-right btn-block" data-toggle="modal" data-target="#addModal">
                  <i class="fas fa-plus"></i> Tambah
               </button>
            </div>
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
                     <th>Nama Ibu Hamil</th>
                     <th>Nama Suami</th>
                     <!-- <th>Tanggal Lahir</th> -->
                     <th>Alamat</th>
                     <th>Gol. Darah</th>
                     <!-- <th>Agama</th> -->
                     <th>Photo</th>
                     <th>Status</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($data as $field) : ?>
                     <tr style="background-color: <?= $field['is_death'] ? 'yellow' : 'none' ?>; color:black;">
                        <td><?= $no++ ?></td>
                        <td><?= $field['n_ibu'] ?></td>
                        <td><?= $field['n_suami'] ?></td>
                        <!-- <td><?= $field['tgl_lahir'] ?></td> -->
                        <td><?= $field['alamat'] ?></td>
                        <td><?= $field['golongan_darah'] ?></td>
                        <!-- <td><?= $field['agama'] ?></td> -->
                        <td><img src="<?= base_url('assets/img/ibu_hamil/') . $field['photo'] ?>" alt="Photo" width="100"></td>
                        <td><?= $field['is_death'] ? 'Meninggal' : 'Hidup' ?></td>
                        <td>
                           <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#editModal" onclick="getData(<?= htmlspecialchars(json_encode($field), ENT_QUOTES, 'UTF-8') ?>)">Edit</button>
                           <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#deleteModal" onclick="deleteData(<?= htmlspecialchars(json_encode($field), ENT_QUOTES, 'UTF-8') ?>)">Hapus</button>
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