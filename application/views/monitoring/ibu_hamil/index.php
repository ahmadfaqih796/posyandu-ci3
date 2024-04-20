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
               <?php if ($role == 2) : ?>
                  <a type="button" class="btn btn-success float-right ml-2 btn-block" href="<?= base_url('monitoring/ibu_hamil/pdf/') . $date ?>">
                     <i class="fas fa-print"></i> PDF
                  </a>
                  <a type="button" class="btn btn-success float-right ml-2 btn-block" href="<?= base_url('monitoring/ibu_hamil/excel') ?>">
                     <i class="fas fa-print"></i> Excel
                  </a>
               <?php endif; ?>
               <?php if ($role == 7) : ?>
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
         <?php if ($role == 7) : ?>
            <div class="form-group mb-3 float-right" style="width: 180px;">
               <input type="month" class="form-control" id="month" name="month">
            </div>
         <?php endif; ?>
         <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>Nama Ibu Hamil</th>
                     <th>NIK</th>
                     <th>Tanggal Periksa</th>
                     <th>Usia Kehamilan</th>
                     <th>Standar 7T</th>
                     <th>Status Gizi</th>
                     <?php if ($role == 7) : ?>
                        <th>Aksi</th>
                     <?php endif; ?>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($data as $field) :
                     $standar7t = [
                        $field['s_timbang_berat_badan'],
                        $field['s_tekanan_darah'],
                        $field['s_tinggi_puncak_rahim'],
                        $field['s_vaksinasi_tetanus'],
                        $field['s_tablet_zat_besi'],
                        $field['s_tes_laboratorium'],
                        $field['s_temu_wicara'],
                     ];
                     $result = 0;
                     foreach ($standar7t as $value) {
                        if (strpos($value, 'belum') !== false) {
                           $result = 1;
                           break;
                        }
                     }
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
                        <td><?= $field['n_ibu'] ?></td>
                        <td><?= $field['nik'] ?></td>
                        <td><?= $field['tanggal_periksa'] ?></td>
                        <td><?= $field['umur_kehamilan'] ?></td>
                        <td><?= $result == 1 ? 'Belum' : 'Sudah' ?></td>
                        <td><?= $status_gizi ?></td>
                        <?php if ($role == 7) : ?>
                           <td>
                              <a type="button" class="btn btn-primary" href="<?= base_url('monitoring/ibu_hamil/edit/' . $field['id']) ?>">Edit</a>
                              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="deleteData(<?= htmlspecialchars(json_encode($field), ENT_QUOTES, 'UTF-8') ?>)">Hapus</button>
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
   document.getElementById('month').addEventListener('change', function() {
      var selectedMonth = this.value;
      // Mengalihkan ke halaman dengan URL yang disesuaikan
      window.location.href = 'http://localhost:3000/monitoring/ibu_hamil/month/' + selectedMonth;
   });
</script>