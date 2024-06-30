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
               <?php if ($role == 8) : ?>
                  <a type="button" class="btn btn-success float-right ml-2 btn-block" href="<?= base_url('monitoring/kegiatan_posyandu/pdf') ?>">
                     <i class="fas fa-print"></i> PDF
                  </a>
               <?php endif; ?>
               <button type="button" class="btn btn-primary float-right btn-block" data-toggle="modal" data-target="#filterModal">
                  <i class="fas fa-search"></i> Cari
               </button>
               <?php if ($role == 2) : ?>
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
                     <th>Nama Posyandu</th>
                     <th>Nama Kegiatan</th>
                     <th>Tanggal Pengajuan</th>
                     <th>Tanggal Disetujui</th>
                     <th>Photo</th>
                     <th>Disetujui</th>
                     <th>Kehadiran</th>
                     <?php if ($role == 8) : ?>
                        <th>Dibuat oleh</th>
                     <?php endif; ?>
                     <th>Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  function check_kehadiran($status)
                  {
                     switch ($status) {
                        case '1':
                           return 'Hadir';
                        case '0':
                           return 'tidak hadir/kunjungan rumah';
                        default:
                           return '-';
                     }
                  }
                  foreach ($data as $field) :
                  ?>
                     <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $field['n_posyandu'] ?></td>
                        <td><?= $field['n_kegiatan'] ?></td>
                        <td><?= $field['created_at'] ?></td>
                        <td><?= $field['updated_at'] == $field['created_at'] ? '-' : $field['updated_at'] ?></td>
                        <!-- <td><?= $field['sasaran'] ?></td>
                        <td><?= $field['parameter_keberhasilan'] ?></td> -->
                        <td><img src="<?= base_url('assets/img/kegiatan_posyandu/') . $field['photo'] ?>" width="150"></td>
                        <td><?= $field['is_verified'] ? 'Sudah' : 'Belum' ?></td>
                        <td><?= check_kehadiran($field['kehadiran'])  ?></td>
                        <?php if ($role == 8) : ?>
                           <td><?= $field['name'] ?></td>
                        <?php endif; ?>
                        <td>
                           <?php if ($role == 2) : ?>
                              <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#editModal" onclick="getData(<?= htmlspecialchars(json_encode($field), ENT_QUOTES, 'UTF-8') ?>)">Edit</button>
                              <button type="button" class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#deleteModal" onclick="deleteData(<?= htmlspecialchars(json_encode($field), ENT_QUOTES, 'UTF-8') ?>)">Hapus</button>
                           <?php endif; ?>
                           <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#detailModal" onclick="getDetailData(<?= htmlspecialchars(json_encode($field), ENT_QUOTES, 'UTF-8') ?>)">Detail</button>
                           <?php if ($role == 8 || $role == 2) : ?>
                              <a href="<?= base_url('monitoring/kegiatan_posyandu/print/' . $field['id']) ?>" class="btn btn-success btn-sm btn-block">Cetak</a>
                           <?php endif; ?>
                           <?php if ($role == 8 && !$field['is_verified']) : ?>
                              <button type="button" class="btn btn-info btn-sm btn-block" data-toggle="modal" data-target="#prosesModal" onclick="prosesData(<?= htmlspecialchars(json_encode($field), ENT_QUOTES, 'UTF-8') ?>)">Proses</button>
                           <?php endif; ?>
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