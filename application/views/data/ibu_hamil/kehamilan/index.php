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
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Nama Ibu Hamil</th>
                     <th>Hamil Ke</th>
                     <th>HPHT</th>
                     <th>HTP</th>
                     <th>Jumlah Kehamilan</th>
                     <th>Jumlah Keguguran</th>
                     <th>Jumlah Lahir Hidup</th>
                     <th>Jumlah Lahir Mati</th>
                     <th>Jumlah Persalinan Terakhir</th>
                     <th>Aksi</th>
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
                        <td><?= $field['jml_keguguran'] ?></td>
                        <td><?= $field['jml_lahir_hidup'] ?></td>
                        <td><?= $field['jml_lahir_mati'] ?></td>
                        <td><?= $field['jarak_persalinan_terakhir'] ?></td>
                        <td>
                           <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#editModal" onclick="getData(<?= htmlspecialchars(json_encode($field), ENT_QUOTES, 'UTF-8') ?>)">Edit</button>
                           <button type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="deleteData(<?= htmlspecialchars(json_encode($field), ENT_QUOTES, 'UTF-8') ?>)">Hapus</button>
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