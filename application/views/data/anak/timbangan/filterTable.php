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
               <span id="posyandu_id" hidden><?= $kader['posyandu_id'] ?></span>
               <?php
               // var_dump($kader['posyandu_id']);
               if ($role == 4 || $role == 8) : ?>
                  <button type="button" class="btn btn-primary float-right btn-block" data-toggle="modal" data-target="#filterModal">
                     <i class="fas fa-search"></i> Cari
                  </button>
               <?php endif; ?>
               <?php if ($role == 2) : ?>
                  <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addModal">
                     <i class="fas fa-plus"></i> Tambah
                  </button>
               <?php endif; ?>
            </div>
         </div>
      </div>
      <div class="card-body">
         <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>') ?>
         <?= $this->session->flashdata('message'); ?>
         <?php if ($role == 2) : ?>
            <div class="form-group mb-3 float-right" style="width: 180px;">
               <input type="month" class="form-control" id="month" name="month">
            </div>
         <?php endif; ?>
         <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Posyandu</th>
                     <th>Nama Anak</th>
                     <th>NIK</th>
                     <th>Alamat</th>
                     <th>Tanggal Ukur</th>
                     <th>Umur (bulan)</th>
                     <th>Lingkar Kepala (cm)</th>
                     <th>Berat Badan (kg)</th>
                     <th>Tinggi Badan (cm)</th>
                     <th>Keterangan</th>
                     <?php if ($role == 2) : ?>
                        <th>Gambar</th>
                     <?php endif; ?>
                     <?php if ($role == 8) : ?>
                        <th>Status Gizi BB/U</th>
                     <?php endif; ?>
                     <?php if ($role == 4 || $role == 2) : ?>
                        <th>Aksi</th>
                     <?php endif; ?>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($data as $field) :
                     $nilai_gizi = $field["berat_badan"] / (($field["tinggi_badan"] * $field["tinggi_badan"]) / 10000);
                     $status_gizi = '';
                     if ($nilai_gizi <= 18.5) {
                        $status_gizi = 'Kurus';
                     } elseif ($nilai_gizi <= 24.9) {
                        $status_gizi = 'Normal';
                     } elseif ($nilai_gizi <= 29.9) {
                        $status_gizi = 'Gemuk';
                     } else {
                        $status_gizi = 'Obesitas';
                     }
                  ?>
                     <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $field['n_posyandu'] ?></td>
                        <td><?= $field['name'] ?></td>
                        <td><?= $field['nik'] ?></td>
                        <td><?= $field['alamat'] ?></td>
                        <td><?= $field['tgl_ukur'] ?></td>
                        <td><?= $field['umur'] ?></td>
                        <td><?= $field['lingkar_kepala'] ?></td>
                        <td><?= $field['berat_badan'] ?></td>
                        <td><?= $field['tinggi_badan'] ?></td>
                        <td><?= $field['keterangan'] ?></td>
                        <?php if ($role == 2) : ?>
                           <td>
                              <img src="<?= base_url('assets/img/status_gizi/') . $field['photo'] ?>" width="150px">
                           </td>
                        <?php endif; ?>
                        <?php if ($role == 8) : ?>
                           <td><?= $field['status_gizi'] ?></td>
                        <?php endif; ?>
                        <?php if ($role == 4 || $role == 2) : ?>
                           <td>
                              <?php if ($role == 4) : ?>
                                 <?php if (!$field['status_gizi']) : ?>
                                    <a type="button" class="btn btn-primary" href="<?= base_url('monitoring/gizi_anak/edit/' . $field['table_id']) ?>">Proses</a>
                                 <?php endif; ?>
                              <?php endif; ?>
                              <?php if ($role == 2) : ?>
                                 <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#editModal" onclick="getData(<?= htmlspecialchars(json_encode($field), ENT_QUOTES, 'UTF-8') ?>)">Edit</button>
                                 <button type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="deleteData(<?= htmlspecialchars(json_encode($field), ENT_QUOTES, 'UTF-8') ?>)">Hapus</button>
                              <?php endif; ?>
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

<script>
   var posyanduId = document.getElementById('posyandu_id').textContent;
   document.getElementById('month').addEventListener('change', function() {
      var selectedMonth = this.value;
      // Mengalihkan ke halaman dengan URL yang disesuaikan
      window.location.href = 'http://localhost:3000/data/anak/timbangan/anak/' + posyanduId + '/' + selectedMonth;
   });
</script>