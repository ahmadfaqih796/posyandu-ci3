<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3">
         <div class="row">
            <div class="col-6 align-self-center">
               <h6 class="m-0 font-weight-bold text-primary">Edit Data <?= $title ?></h6>
            </div>
         </div>
      </div>
      <div class="card-body">
         <form action="<?= base_url('monitoring/gizi_anak/edit/' . $detail['table_id']) ?>" method="post">
            <?php
            $gizi = $this->am->get_status_gizi_anak($detail['umur'], $detail['jk']);
            ?>
            <h3 class="h3 mb-3 text-center">Anak</h3>
            <hr class="sidebar-divider">
            <div class="row g-3">
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label>Nama</label>
                  <input type="text" disabled class="form-control" value="<?= $detail["name"] ?>">
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label>NIK</label>
                  <input type="text" disabled class="form-control" value="<?= $detail["nik"] ?>">
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label>Alamat</label>
                  <input type="text" disabled class="form-control" value="<?= $detail["alamat"] ?>">
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label>Jenis Kelamin</label>
                  <input type="text" disabled class="form-control" value="<?= $detail["jk"] == 'L' ? 'Laki-laki' : 'Perempuan' ?>">
               </div>
            </div>
            <!-- End Row -->
            <hr class="sidebar-divider">
            <h3 class="h3 mb-3 text-center">Timbangan Anak</h3>
            <hr class="sidebar-divider">
            <div class="row g-3">
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label>Tanggal Ukur</label>
                  <input type="text" disabled class="form-control" value="<?= $detail["tgl_ukur"] ?>">
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label>Umur</label>
                  <input type="text" disabled class="form-control" value="<?= $detail["umur"] ?>">
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label>Berat Badan</label>
                  <input type="text" disabled class="form-control" value="<?= $detail["berat_badan"] ?>">
               </div>
            </div>
            <!-- End Row -->
            <hr class="sidebar-divider">
            <h3 class="h3 mb-3 text-center">Pencocokan Status Gizi</h3>
            <hr class="sidebar-divider">
            <div class="row g-3">
               <?php
               if ($gizi) {
                  $status_gizi = '';
                  $bb = $detail['berat_badan'];
                  if ($bb < ($gizi['g_min'] + 0.1)) {
                     $status_gizi = 'Gizi Buruk';
                  } elseif (($bb < $gizi['g_middle'] + 0.1) && $bb >= ($gizi['g_min'] + 0.1)) {
                     $status_gizi = 'Gizi Kurang';
                  } elseif ($bb < ($gizi['g_max']) && $bb >= ($gizi['g_middle'] + 0.1)) {
                     $status_gizi = 'Gizi Baik';
                  } elseif ($bb >= $gizi['g_max']) {
                     $status_gizi = 'Gizi Lebih';
                  } else {
                     // $status_gizi = 'Gizi Kurang';
                  }
               ?>
                  <input type="hidden" name="status_gizi" disabled class="form-control" value="<?= $status_gizi ?>">
                  <div class="col-sx-12 col-md-6 col-lg-6 form-group">
                     <label>Umur</label>
                     <input type="text" disabled class="form-control" value="<?= $gizi["umur"] ?>">
                  </div>
                  <div class="col-sx-12 col-md-6 col-lg-6 form-group">
                     <label>Jenis Kelamin</label>
                     <input type="text" disabled class="form-control" value="<?= $gizi["jk"] == 'L' ? 'Laki-laki' : 'Perempuan' ?>">
                  </div>
                  <div class="col-sx-12 col-md-6 col-lg-3 form-group">
                     <label>Gizi Buruk</label>
                     <input type="text" disabled class="form-control" value="<?= $gizi['g_min'] . " Kg"  ?>">
                  </div>
                  <div class="col-sx-12 col-md-6 col-lg-3 form-group">
                     <label>Gizi Kurang</label>
                     <input type="text" disabled class="form-control" value="<?= ($gizi['g_min'] + 0.1) . " - " . ($gizi['g_middle']) . " Kg"   ?>">
                  </div>
                  <div class="col-sx-12 col-md-6 col-lg-3 form-group">
                     <label>Gizi Baik</label>
                     <input type="text" disabled class="form-control" value="<?= ($gizi['g_middle'] + 0.1) . " - " . ($gizi['g_max'] - 0.1) . " Kg"  ?>">
                  </div>
                  <div class="col-sx-12 col-md-6 col-lg-3 form-group">
                     <label>Gizi Lebih</label>
                     <input type="text" disabled class="form-control" value="<?= $gizi['g_max'] . " Kg"  ?>">
                  </div>
                  <div class="col-sx-12 col-md-12 col-lg-12 form-group">
                     <label>Status Gizi <?= $detail['name'] ?></label>
                     <input type="text" disabled class="form-control" value="<?= $status_gizi ?>">
                  </div>
               <?php
               } else {
               ?>
                  <div class="col-sx-12 col-md-12 col-lg-12 form-group text-center">
                     <label>Tidak ada data</label>
                  </div>
               <?php
               }
               ?>

            </div>

            <div class="row g-3">
               <?php if ($gizi) : ?>
                  <div class="col-12">
                     <button type="submit" class="btn btn-primary float-right">Proses</button>
                  </div>
               <?php endif; ?>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- /.container-fluid -->