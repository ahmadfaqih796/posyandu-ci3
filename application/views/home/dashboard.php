<!-- Begin Page Content -->
<div class="container-fluid">
   <div class="row">
      <?php if ($role == 1 || $role == 8) : ?>
         <div class="col-md-3 mb-3">
            <div class="card">
               <div class="card-body text-center">
                  <h1 class="h4 text-gray-800">Data User</h1>
                  <h1 class="h4 text-success"><?= $total['user'] ?></h1>
               </div>
            </div>
         </div>
      <?php endif; ?>
      <!-- <div class="col-md-3 mb-3">
         <div class="card">
            <div class="card-body text-center">
               <h1 class="h4 text-gray-800">Data Kader</h1>
               <h1 class="h4 text-success"><?= $total['kader'] ?></h1>
            </div>
         </div>
      </div> -->
      <?php if ($role == 1 || $role == 2 || $role == 8) : ?>
         <div class="col-md-3 mb-3">
            <div class="card">
               <div class="card-body text-center">
                  <h1 class="h4 text-gray-800">Data Anak</h1>
                  <h1 class="h4 text-success" id="d_total_anak"><?= $total['anak'] ?></h1>
               </div>
            </div>
         </div>
      <?php endif; ?>

      <?php if ($role == 2) : ?>
         <div class="col-md-3 mb-3">
            <div class="card">
               <div class="card-body text-center">
                  <h1 class="h4 text-gray-800">Data Ibu</h1>
                  <h1 class="h4 text-success" id="d_total_anak"><?= $total['ibu_anak'] ?></h1>
               </div>
            </div>
         </div>
      <?php endif; ?>

      <?php if ($role == 2 || $role == 4) : ?>
         <div class="col-md-3 mb-3">
            <div class="card">
               <div class="card-body text-center">
                  <h1 class="h4 text-gray-800">Status Gizi Anak</h1>
                  <table class="table table-bordered table-striped table-sm">
                     <tr>
                        <td>Gizi Buruk</td>
                        <td><?= $total['status_gizi_anak']['buruk'] ?></td>
                     </tr>
                     <tr>
                        <td>Gizi Kurang</td>
                        <td><?= $total['status_gizi_anak']['kurang'] ?></td>
                     </tr>
                     <tr>
                        <td>Gizi Baik</td>
                        <td><?= $total['status_gizi_anak']['baik'] ?></td>
                     </tr>
                     <tr>
                        <td>Gizi Lebih</td>
                        <td><?= $total['status_gizi_anak']['lebih'] ?></td>
                     </tr>
                  </table>
               </div>
            </div>
         </div>
      <?php endif; ?>

      <?php if ($role == 1 || $role == 8) : ?>
         <div class="col-md-3 mb-3">
            <div class="card">
               <div class="card-body text-center">
                  <h1 class="h4 text-gray-800">Data Ibu Hamil</h1>
                  <h1 class="h4 text-success" id="d_total_ibu"><?= $total['ibu'] ?></h1>
               </div>
            </div>
         </div>
      <?php endif; ?>

      <?php if ($role == 1 || $role == 8) : ?>
         <div class="col-md-3 mb-3">
            <div class="card">
               <div class="card-body text-center">
                  <h1 class="h4 text-gray-800">Data Posyandu</h1>
                  <h1 class="h4 text-success"><?= $total['posyandu'] ?></h1>
               </div>
            </div>
         </div>
      <?php endif; ?>

      <!-- <div class="col-md-4 mb-3">
         <div class="card">
            <div class="card-body text-center">
               <h1 class="h4 text-gray-800">Data Imunisasi</h1>
               <h1 class="h4 text-success"><?= $total['imunisasi'] ?></h1>
            </div>
         </div>
      </div> -->

      <?php if ($role == 1 || $role == 2 || $role == 6 || $role == 8) : ?>
         <div class="col-xl-8 col-lg-7">
            <!-- Bar Chart -->
            <div class="card shadow mb-4">
               <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Imunisasi</h6>
               </div>
               <div class="card-body">
                  <div class="chart-bar">
                     <span id="januari" hidden><?= $total['b_imunisasi']['januari'] ?></span>
                     <span id="februari" hidden><?= $total['b_imunisasi']['februari'] ?></span>
                     <span id="maret" hidden><?= $total['b_imunisasi']['maret'] ?></span>
                     <span id="april" hidden><?= $total['b_imunisasi']['april'] ?></span>
                     <span id="mei" hidden><?= $total['b_imunisasi']['mei'] ?></span>
                     <span id="juni" hidden><?= $total['b_imunisasi']['juni'] ?></span>
                     <span id="juli" hidden><?= $total['b_imunisasi']['juli'] ?></span>
                     <span id="agustus" hidden><?= $total['b_imunisasi']['agustus'] ?></span>
                     <span id="september" hidden><?= $total['b_imunisasi']['september'] ?></span>
                     <span id="oktober" hidden><?= $total['b_imunisasi']['oktober'] ?></span>
                     <span id="november" hidden><?= $total['b_imunisasi']['november'] ?></span>
                     <span id="desember" hidden><?= $total['b_imunisasi']['desember'] ?></span>
                     <canvas id="myBarChart"></canvas>
                  </div>
               </div>
            </div>
         </div>
      <?php endif; ?>

      <!-- <?php if ($role == 1 || $role == 8) : ?>
         <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
               <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Data Customer</h6>
               </div>
               <div class="card-body" style="height: 360px;">
                  <div class="chart-pie pt-4 ">
                     <canvas id="myPieChart"></canvas>
                  </div>
               </div>
            </div>
         </div>
      <?php endif; ?> -->

      <?php if ($role == 1 || $role == 8 || $role == 4) : ?>
         <div class="col-md-4 mb-3">
            <div class="card">
               <div class="card-body text-center">
                  <h1 class="h4 text-gray-800">Status Gizi Ibu Hamil</h1>
                  <table class="table table-bordered table-striped table-sm">
                     <tr>
                        <td>Kurus</td>
                        <td><?= $total['status_gizi_bumil']['Kurus'] ?></td>
                     </tr>
                     <tr>
                        <td>Normal</td>
                        <td><?= $total['status_gizi_bumil']['Normal'] ?></td>
                     </tr>
                     <tr>
                        <td>Gemuk</td>
                        <td><?= $total['status_gizi_bumil']['Gemuk'] ?></td>
                     </tr>
                     <tr>
                        <td>Obesitas</td>
                        <td><?= $total['status_gizi_bumil']['Obesitas'] ?></td>
                     </tr>
                  </table>
                  <!-- <a type="button" class="btn btn-success float-right ml-2 btn-block" href="<?= base_url('monitoring/gizi_ibu_hamil/pdf') ?>">
                     <i class="fas fa-print"></i> PDF
                  </a> -->
               </div>
            </div>
         </div>
      <?php endif; ?>
   </div>
</div>
<!-- /.container-fluid -->