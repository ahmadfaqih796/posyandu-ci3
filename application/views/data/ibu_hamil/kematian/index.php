<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3">
         <div class="row">
            <div class="col-md-10 col-xs-12 align-self-center">
               <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
            </div>
            <div class="col-md-2 col-xs-12">
               <?php if ($role == 7) : ?>
                  <a type="button" class="btn btn-success float-right ml-2 btn-block" href="<?= base_url('data/ibu_hamil/kematian/pdf') ?>">
                     <i class="fas fa-print"></i> PDF
                  </a>
                  <button type="button" class="btn btn-primary float-right btn-block" data-toggle="modal" data-target="#addModal">
                     <i class="fas fa-plus"></i> Tambah
                  </button>
               <?php endif; ?>
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
                     <th>Tanggal Kematian</th>
                     <th>Usia</th>
                     <th>Penyebab</th>
                     <th>Jenis</th>
                     <th>Meninggal di</th>
                     <th>Keterangan</th>
                     <?php if ($role == 7) : ?>
                        <th>Aksi</th>
                     <?php endif; ?>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($data as $field) : ?>
                     <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $field['n_ibu'] ?></td>
                        <td><?= $field['tgl_kematian'] ?></td>
                        <td><?= $field['usia'] ?> bulan</td>
                        <td><?= $field['penyebab'] ?></td>
                        <td><?= $field['jenis'] ?></td>
                        <td><?= $field['meninggal_di'] ?></td>
                        <td><?= $field['keterangan'] ?></td>
                        <?php if ($role == 7) : ?>
                           <td>
                              <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#editModal" onclick="getData(<?= htmlspecialchars(json_encode($field), ENT_QUOTES, 'UTF-8') ?>)">Edit</button>
                              <button type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="deleteData(<?= htmlspecialchars(json_encode($field), ENT_QUOTES, 'UTF-8') ?>)">Hapus</button>
                           </td>
                        <?php endif; ?>
                     </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>

</div>
<!-- /.container-fluid -->