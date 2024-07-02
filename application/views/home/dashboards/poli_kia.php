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

      <div class="col-xl-6">
         <!-- Bar Chart -->
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">Monitoring Status 7T Ibu Hamil</h6>
            </div>
            <form action="<?= base_url('dashboard') ?>" method="get">
               <div class="row px-4 mt-3">
                  <div class="col-md-10">
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
                  <span id="MB_januari" hidden><?= $total['b_m_status_bumil']['januari'] ?></span>
                  <span id="MB_februari" hidden><?= $total['b_m_status_bumil']['februari'] ?></span>
                  <span id="MB_maret" hidden><?= $total['b_m_status_bumil']['maret'] ?></span>
                  <span id="MB_april" hidden><?= $total['b_m_status_bumil']['april'] ?></span>
                  <span id="MB_mei" hidden><?= $total['b_m_status_bumil']['mei'] ?></span>
                  <span id="MB_juni" hidden><?= $total['b_m_status_bumil']['juni'] ?></span>
                  <span id="MB_juli" hidden><?= $total['b_m_status_bumil']['juli'] ?></span>
                  <span id="MB_agustus" hidden><?= $total['b_m_status_bumil']['agustus'] ?></span>
                  <span id="MB_september" hidden><?= $total['b_m_status_bumil']['september'] ?></span>
                  <span id="MB_oktober" hidden><?= $total['b_m_status_bumil']['oktober'] ?></span>
                  <span id="MB_november" hidden><?= $total['b_m_status_bumil']['november'] ?></span>
                  <span id="MB_desember" hidden><?= $total['b_m_status_bumil']['desember'] ?></span>
                  <canvas id="monitoringStatusBumil"></canvas>
               </div>
            </div>
         </div>
      </div>

   </div>
</div>
<!-- /.container-fluid -->

<script src="<?= base_url("assets/") ?>vendor/chart.js/Chart.min.js"></script>
<script type="text/javascript">
   // Set new default font family and font color to mimic Bootstrap's default styling
   Chart.defaults.global.defaultFontFamily =
      'Nunito, -apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif';
   Chart.defaults.global.defaultFontColor = "#858796";

   function number_format(number, decimals, dec_point, thousands_sep) {
      number = (number + "").replace(",", "").replace(" ", "");
      var n = !isFinite(+number) ? 0 : +number,
         prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
         sep = typeof thousands_sep === "undefined" ? "," : thousands_sep,
         dec = typeof dec_point === "undefined" ? "." : dec_point,
         s = "",
         toFixedFix = function(n, prec) {
            var k = Math.pow(10, prec);
            return "" + Math.round(n * k) / k;
         };
      s = (prec ? toFixedFix(n, prec) : "" + Math.round(n)).split(".");
      if (s[0].length > 3) {
         s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
      }
      if ((s[1] || "").length < prec) {
         s[1] = s[1] || "";
         s[1] += new Array(prec - s[1].length + 1).join("0");
      }
      return s.join(dec);
   }

   function createBarChart(elementId, datasets, options = {}) {
      var ctx = document.getElementById(elementId);
      var defaultOptions = {
         type: "bar",
         data: {
            labels: [
               "Januari",
               "Februari",
               "Maret",
               "April",
               "Mei",
               "Juni",
               "Juli",
               "Agustus",
               "September",
               "Oktober",
               "November",
               "Desember",
            ],
            datasets: datasets,
         },
         options: {
            maintainAspectRatio: false,
            layout: {
               padding: {
                  left: 10,
                  right: 25,
                  top: 25,
                  bottom: 0,
               },
            },
            scales: {
               xAxes: [{
                  time: {
                     unit: "month",
                  },
                  gridLines: {
                     display: false,
                     drawBorder: false,
                  },
                  ticks: {
                     maxTicksLimit: 12,
                  },
               }, ],
               yAxes: [{
                  ticks: {
                     min: 0,
                     maxTicksLimit: 5,
                     padding: 10,
                  },
                  gridLines: {
                     color: "rgb(234, 236, 244)",
                     zeroLineColor: "rgb(234, 236, 244)",
                     drawBorder: false,
                     borderDash: [2],
                     zeroLineBorderDash: [2],
                  },
               }, ],
            },
            legend: {
               display: false,
            },
            tooltips: {
               titleMarginBottom: 10,
               titleFontColor: "#6e707e",
               titleFontSize: 14,
               backgroundColor: "rgb(255,255,255)",
               bodyFontColor: "#858796",
               borderColor: "#dddfeb",
               borderWidth: 1,
               xPadding: 15,
               yPadding: 15,
               displayColors: false,
               caretPadding: 10,
               callbacks: {
                  label: function(tooltipItem, chart) {
                     var datasetLabel =
                        chart.datasets[tooltipItem.datasetIndex].label || "";
                     return datasetLabel + ": " + tooltipItem.yLabel;
                  },
               },
            },
         },
      };
      // Merge default options with user-provided options
      var chartOptions = Object.assign({}, defaultOptions, options);
      return new Chart(ctx, chartOptions);
   }

   var dataImunisasi = [{
      label: "Total Anak",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: [
         parseInt(document.getElementById("januari").innerHTML),
         parseInt(document.getElementById("februari").innerHTML),
         parseInt(document.getElementById("maret").innerHTML),
         parseInt(document.getElementById("april").innerHTML),
         parseInt(document.getElementById("mei").innerHTML),
         parseInt(document.getElementById("juni").innerHTML),
         parseInt(document.getElementById("juli").innerHTML),
         parseInt(document.getElementById("agustus").innerHTML),
         parseInt(document.getElementById("september").innerHTML),
         parseInt(document.getElementById("oktober").innerHTML),
         parseInt(document.getElementById("november").innerHTML),
         parseInt(document.getElementById("desember").innerHTML),
      ],
      maxBarThickness: 1000,
   }, ];

   var dataKegiatanPosyandu = [{
      label: "Total Anak",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: [
         parseInt(document.getElementById("KP_januari").innerHTML),
         parseInt(document.getElementById("KP_februari").innerHTML),
         parseInt(document.getElementById("KP_maret").innerHTML),
         parseInt(document.getElementById("KP_april").innerHTML),
         parseInt(document.getElementById("KP_mei").innerHTML),
         parseInt(document.getElementById("KP_juni").innerHTML),
         parseInt(document.getElementById("KP_juli").innerHTML),
         parseInt(document.getElementById("KP_agustus").innerHTML),
         parseInt(document.getElementById("KP_september").innerHTML),
         parseInt(document.getElementById("KP_oktober").innerHTML),
         parseInt(document.getElementById("KP_november").innerHTML),
         parseInt(document.getElementById("KP_desember").innerHTML),
      ],
      maxBarThickness: 1000,
   }, ];

   var dataMonitoringStatusBumil = [{
      label: "Total Ibu Hamil",
      backgroundColor: "#4e73df",
      hoverBackgroundColor: "#2e59d9",
      borderColor: "#4e73df",
      data: [
         parseInt(document.getElementById("MB_januari").innerHTML),
         parseInt(document.getElementById("MB_februari").innerHTML),
         parseInt(document.getElementById("MB_maret").innerHTML),
         parseInt(document.getElementById("MB_april").innerHTML),
         parseInt(document.getElementById("MB_mei").innerHTML),
         parseInt(document.getElementById("MB_juni").innerHTML),
         parseInt(document.getElementById("MB_juli").innerHTML),
         parseInt(document.getElementById("MB_agustus").innerHTML),
         parseInt(document.getElementById("MB_september").innerHTML),
         parseInt(document.getElementById("MB_oktober").innerHTML),
         parseInt(document.getElementById("MB_november").innerHTML),
         parseInt(document.getElementById("MB_desember").innerHTML),
      ],
      maxBarThickness: 1000,
   }, ];

   // Create the chart
   createBarChart("myBarChart", dataImunisasi);
   createBarChart("kegiatanPosyandu", dataKegiatanPosyandu);
   createBarChart("monitoringStatusBumil", dataMonitoringStatusBumil);
</script>