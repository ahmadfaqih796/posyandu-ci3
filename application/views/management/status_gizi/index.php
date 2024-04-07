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
               <!-- <a type="button" class="btn btn-primary float-right" href="<?= base_url('monitoring/ibu_hamil/add') ?>">
                  <i class="fas fa-plus"></i> Tambah
               </a> -->
               <a type="button" class="btn btn-success float-right ml-2 btn-block" href="<?= base_url('monitoring/ibu_hamil/pdf') ?>">
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
            <table class="table table-bordered align-middle" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Umur</th>
                     <th>Jenis kelamin</th>
                     <th>Gizi Buruk</th>
                     <th>Gizi Kurang</th>
                     <th>Gizi Baik</th>
                     <th>Gizi Lebih</th>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($users as $field) : ?>
                     <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $field['umur'] ?></td>
                        <td><?= $field['jk'] == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                        <td><?= $field['g_min'] . " Kg" ?></td>
                        <td><?= ($field['g_min'] + 0.1) . " - " . ($field['g_middle']) . " Kg" ?></td>
                        <td><?= ($field['g_middle'] + 0.1) . " - " . ($field['g_max'] - 0.1) . " Kg" ?></td>
                        <td><?= $field['g_max'] . " Kg" ?></td>
                        <td>
                           <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#editModal" onclick="getData(<?= htmlspecialchars(json_encode($field), ENT_QUOTES, 'UTF-8') ?>)">Edit</button>
                           <!-- <a type="button" class="btn btn-success btn-sm btn-block" href="<?= base_url('management/anak/detail/' . $field['user_id']) ?>">Detail</a> -->
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