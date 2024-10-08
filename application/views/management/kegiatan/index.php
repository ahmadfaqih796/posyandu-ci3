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
            </div>
         </div>
      </div>
      <div class="card-body">
         <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>') ?>
         <?= $this->session->flashdata('message'); ?>
         <div class="table-responsive">
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Judul</th>
                     <th>Waktu</th>
                     <th>Kategori</th>
                     <th>Image</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($data as $field) : ?>
                     <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $field['judul'] ?></td>
                        <td><?= $field['waktu'] ?></td>
                        <td><?= $field['kategori'] ?></td>
                        <td><img src="<?= base_url('assets/img/kegiatan/' . $field['image']) ?>" alt="<?= $field['image'] ?>" width="150"></td>
                        <td>
                           <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#viewModal" onclick="getView(<?= htmlspecialchars(json_encode($field), ENT_QUOTES, 'UTF-8') ?>)">Lihat</button>
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