<!-- Begin Page Content -->
<div class="container-fluid">
   <div class="row">

      <div class="col-md-4 mb-3">
         <div class="card">
            <div class="card-body text-center">
               <h1 class="h4 text-gray-800">Data Anak</h1>
               <h1 class="h4 text-success" id="d_total_anak"><?= $total['anak'] ?></h1>
            </div>
         </div>
      </div>

      <div class="col-md-4 mb-3">
         <div class="card">
            <div class="card-body text-center">
               <h1 class="h4 text-gray-800">Data Ibu Hamil</h1>
               <h1 class="h4 text-success" id="d_total_ibu"><?= $total['ibu'] ?></h1>
            </div>
         </div>
      </div>

      <div class="col-md-4 mb-3">
         <div class="card">
            <div class="card-body text-center">
               <h1 class="h4 text-gray-800">Data Posyandu</h1>
               <h1 class="h4 text-success"><?= $total['posyandu'] ?></h1>
            </div>
         </div>
      </div>

      <div class="col-xl-6">
         <!-- Bar Chart -->
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">Monitoring Imunisasi</h6>
            </div>
            <form action="<?= base_url('dashboard') ?>" method="get">
               <div class="row px-4 mt-3">
                  <div class="col-md-5">
                     <div class="form-group">
                        <select name="posyandu_id" id="posyandu_id" class="form-control" required>
                           <option value="">-- Pilih Posyandu --</option>
                           <?php foreach ($posyandu as $field) : ?>
                              <option value="<?= $field['id'] ?>" <?= set_select('posyandu_id', $field['id'], (!empty($_POST['posyandu_id']) && $_POST['posyandu_id'] == $field['id'])); ?>><?= $field['n_posyandu'] ?></option>
                           <?php endforeach; ?>
                        </select>
                        <?= form_error('posyandu_id', '<small class="text-danger pl-3">', '</small>'); ?>
                     </div>
                  </div>
                  <div class="col-md-5">
                     <div class="form-group">
                        <select name="year" id="year" class="form-control" required>
                           <option value="">-- Pilih Tahun --</option>
                           <?php
                           $currentYear = date('Y') + 5;
                           $startYear = 2020;
                           for ($year = $startYear; $year <= $currentYear; $year++) : ?>
                              <option value="<?= $year ?>" <?= set_select('year', $year, (!empty($_POST['year']) && $_POST['year'] == $year)); ?>><?= $year ?></option>
                           <?php endfor; ?>
                        </select>
                        <?= form_error('year', '<small class="text-danger pl-3">', '</small>'); ?>
                     </div>
                  </div>
                  <div class="col-md-2">
                     <button type="submit" class="btn btn-primary" style="width: 100%;">
                        <i class="fas fa-search"></i>
                     </button>
                  </div>
               </div>
            </form>
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

      <div class="col-xl-6">
         <!-- Bar Chart -->
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">Monitoring Kegiatan Posyandu</h6>
            </div>
            <form action="<?= base_url('dashboard') ?>" method="get">
               <div class="row px-4 mt-3">
                  <div class="col-md-5">
                     <div class="form-group">
                        <select name="posyandu_id" id="posyandu_id" class="form-control" required>
                           <option value="">-- Pilih Posyandu --</option>
                           <?php foreach ($posyandu as $field) : ?>
                              <option value="<?= $field['id'] ?>" <?= set_select('posyandu_id', $field['id'], (!empty($_POST['posyandu_id']) && $_POST['posyandu_id'] == $field['id'])); ?>><?= $field['n_posyandu'] ?></option>
                           <?php endforeach; ?>
                        </select>
                        <?= form_error('posyandu_id', '<small class="text-danger pl-3">', '</small>'); ?>
                     </div>
                  </div>
                  <div class="col-md-5">
                     <div class="form-group">
                        <select name="year" id="year" class="form-control" required>
                           <option value="">-- Pilih Tahun --</option>
                           <?php
                           $currentYear = date('Y') + 5;
                           $startYear = 2020;
                           for ($year = $startYear; $year <= $currentYear; $year++) : ?>
                              <option value="<?= $year ?>" <?= set_select('year', $year, (!empty($_POST['year']) && $_POST['year'] == $year)); ?>><?= $year ?></option>
                           <?php endfor; ?>
                        </select>
                        <?= form_error('year', '<small class="text-danger pl-3">', '</small>'); ?>
                     </div>
                  </div>
                  <div class="col-md-2">
                     <button type="submit" class="btn btn-primary" style="width: 100%;">
                        <i class="fas fa-search"></i>
                     </button>
                  </div>
               </div>
            </form>
            <div class="card-body">
               <div class="chart-bar">
                  <span id="KP_januari" hidden><?= $total['b_k_posyandu']['januari'] ?></span>
                  <span id="KP_februari" hidden><?= $total['b_k_posyandu']['februari'] ?></span>
                  <span id="KP_maret" hidden><?= $total['b_k_posyandu']['maret'] ?></span>
                  <span id="KP_april" hidden><?= $total['b_k_posyandu']['april'] ?></span>
                  <span id="KP_mei" hidden><?= $total['b_k_posyandu']['mei'] ?></span>
                  <span id="KP_juni" hidden><?= $total['b_k_posyandu']['juni'] ?></span>
                  <span id="KP_juli" hidden><?= $total['b_k_posyandu']['juli'] ?></span>
                  <span id="KP_agustus" hidden><?= $total['b_k_posyandu']['agustus'] ?></span>
                  <span id="KP_september" hidden><?= $total['b_k_posyandu']['september'] ?></span>
                  <span id="KP_oktober" hidden><?= $total['b_k_posyandu']['oktober'] ?></span>
                  <span id="KP_november" hidden><?= $total['b_k_posyandu']['november'] ?></span>
                  <span id="KP_desember" hidden><?= $total['b_k_posyandu']['desember'] ?></span>
                  <canvas id="kegiatanPosyandu"></canvas>
               </div>
            </div>
         </div>
      </div>

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
   </div>
</div>
<!-- /.container-fluid -->