<!-- Begin Page Content -->
<div class="container-fluid">
   <div class="row">

      <div class="col-xl-12">
         <!-- Bar Chart -->
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">Monitoring Gizi Anak</h6>
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
                  <!-- Gizi Buruk -->
                  <span id="GA_Buruk_januari" hidden><?= $total['b_g_anak']['buruk']['januari'] ?></span>
                  <span id="GA_Buruk_februari" hidden><?= $total['b_g_anak']['buruk']['februari'] ?></span>
                  <span id="GA_Buruk_maret" hidden><?= $total['b_g_anak']['buruk']['maret'] ?></span>
                  <span id="GA_Buruk_april" hidden><?= $total['b_g_anak']['buruk']['april'] ?></span>
                  <span id="GA_Buruk_mei" hidden><?= $total['b_g_anak']['buruk']['mei'] ?></span>
                  <span id="GA_Buruk_juni" hidden><?= $total['b_g_anak']['buruk']['juni'] ?></span>
                  <span id="GA_Buruk_juli" hidden><?= $total['b_g_anak']['buruk']['juli'] ?></span>
                  <span id="GA_Buruk_agustus" hidden><?= $total['b_g_anak']['buruk']['agustus'] ?></span>
                  <span id="GA_Buruk_september" hidden><?= $total['b_g_anak']['buruk']['september'] ?></span>
                  <span id="GA_Buruk_oktober" hidden><?= $total['b_g_anak']['buruk']['oktober'] ?></span>
                  <span id="GA_Buruk_november" hidden><?= $total['b_g_anak']['buruk']['november'] ?></span>
                  <span id="GA_Buruk_desember" hidden><?= $total['b_g_anak']['buruk']['desember'] ?></span>
                  <!--Gizi Kurang -->
                  <span id="GA_Kurang_januari" hidden><?= $total['b_g_anak']['kurang']['januari'] ?></span>
                  <span id="GA_Kurang_februari" hidden><?= $total['b_g_anak']['kurang']['februari'] ?></span>
                  <span id="GA_Kurang_maret" hidden><?= $total['b_g_anak']['kurang']['maret'] ?></span>
                  <span id="GA_Kurang_april" hidden><?= $total['b_g_anak']['kurang']['april'] ?></span>
                  <span id="GA_Kurang_mei" hidden><?= $total['b_g_anak']['kurang']['mei'] ?></span>
                  <span id="GA_Kurang_juni" hidden><?= $total['b_g_anak']['kurang']['juni'] ?></span>
                  <span id="GA_Kurang_juli" hidden><?= $total['b_g_anak']['kurang']['juli'] ?></span>
                  <span id="GA_Kurang_agustus" hidden><?= $total['b_g_anak']['kurang']['agustus'] ?></span>
                  <span id="GA_Kurang_september" hidden><?= $total['b_g_anak']['kurang']['september'] ?></span>
                  <span id="GA_Kurang_oktober" hidden><?= $total['b_g_anak']['kurang']['oktober'] ?></span>
                  <span id="GA_Kurang_november" hidden><?= $total['b_g_anak']['kurang']['november'] ?></span>
                  <span id="GA_Kurang_desember" hidden><?= $total['b_g_anak']['kurang']['desember'] ?></span>
                  <!-- Gizi Baik -->
                  <span id="GA_Baik_januari" hidden><?= $total['b_g_anak']['baik']['januari'] ?></span>
                  <span id="GA_Baik_februari" hidden><?= $total['b_g_anak']['baik']['februari'] ?></span>
                  <span id="GA_Baik_maret" hidden><?= $total['b_g_anak']['baik']['maret'] ?></span>
                  <span id="GA_Baik_april" hidden><?= $total['b_g_anak']['baik']['april'] ?></span>
                  <span id="GA_Baik_mei" hidden><?= $total['b_g_anak']['baik']['mei'] ?></span>
                  <span id="GA_Baik_juni" hidden><?= $total['b_g_anak']['baik']['juni'] ?></span>
                  <span id="GA_Baik_juli" hidden><?= $total['b_g_anak']['baik']['juli'] ?></span>
                  <span id="GA_Baik_agustus" hidden><?= $total['b_g_anak']['baik']['agustus'] ?></span>
                  <span id="GA_Baik_september" hidden><?= $total['b_g_anak']['baik']['september'] ?></span>
                  <span id="GA_Baik_oktober" hidden><?= $total['b_g_anak']['baik']['oktober'] ?></span>
                  <span id="GA_Baik_november" hidden><?= $total['b_g_anak']['baik']['november'] ?></span>
                  <span id="GA_Baik_desember" hidden><?= $total['b_g_anak']['baik']['desember'] ?></span>
                  <!-- Gizi Lebih -->
                  <span id="GA_Lebih_januari" hidden><?= $total['b_g_anak']['lebih']['januari'] ?></span>
                  <span id="GA_Lebih_februari" hidden><?= $total['b_g_anak']['lebih']['februari'] ?></span>
                  <span id="GA_Lebih_maret" hidden><?= $total['b_g_anak']['lebih']['maret'] ?></span>
                  <span id="GA_Lebih_april" hidden><?= $total['b_g_anak']['lebih']['april'] ?></span>
                  <span id="GA_Lebih_mei" hidden><?= $total['b_g_anak']['lebih']['mei'] ?></span>
                  <span id="GA_Lebih_juni" hidden><?= $total['b_g_anak']['lebih']['juni'] ?></span>
                  <span id="GA_Lebih_juli" hidden><?= $total['b_g_anak']['lebih']['juli'] ?></span>
                  <span id="GA_Lebih_agustus" hidden><?= $total['b_g_anak']['lebih']['agustus'] ?></span>
                  <span id="GA_Lebih_september" hidden><?= $total['b_g_anak']['lebih']['september'] ?></span>
                  <span id="GA_Lebih_oktober" hidden><?= $total['b_g_anak']['lebih']['oktober'] ?></span>
                  <span id="GA_Lebih_november" hidden><?= $total['b_g_anak']['lebih']['november'] ?></span>
                  <span id="GA_Lebih_desember" hidden><?= $total['b_g_anak']['lebih']['desember'] ?></span>

                  <canvas id="giziAnak"></canvas>
               </div>
            </div>
         </div>
      </div>

      <div class="col-xl-12">
         <!-- Bar Chart -->
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">Monitoring Gizi Ibu Hamil</h6>
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
                  <!-- Kurus -->
                  <span id="GB_Kurus_januari" hidden><?= $total['b_g_bumil']['kurus']['januari'] ?></span>
                  <span id="GB_Kurus_februari" hidden><?= $total['b_g_bumil']['kurus']['februari'] ?></span>
                  <span id="GB_Kurus_maret" hidden><?= $total['b_g_bumil']['kurus']['maret'] ?></span>
                  <span id="GB_Kurus_april" hidden><?= $total['b_g_bumil']['kurus']['april'] ?></span>
                  <span id="GB_Kurus_mei" hidden><?= $total['b_g_bumil']['kurus']['mei'] ?></span>
                  <span id="GB_Kurus_juni" hidden><?= $total['b_g_bumil']['kurus']['juni'] ?></span>
                  <span id="GB_Kurus_juli" hidden><?= $total['b_g_bumil']['kurus']['juli'] ?></span>
                  <span id="GB_Kurus_agustus" hidden><?= $total['b_g_bumil']['kurus']['agustus'] ?></span>
                  <span id="GB_Kurus_september" hidden><?= $total['b_g_bumil']['kurus']['september'] ?></span>
                  <span id="GB_Kurus_oktober" hidden><?= $total['b_g_bumil']['kurus']['oktober'] ?></span>
                  <span id="GB_Kurus_november" hidden><?= $total['b_g_bumil']['kurus']['november'] ?></span>
                  <span id="GB_Kurus_desember" hidden><?= $total['b_g_bumil']['kurus']['desember'] ?></span>
                  <!-- normal -->
                  <span id="GB_Normal_januari" hidden><?= $total['b_g_bumil']['normal']['januari'] ?></span>
                  <span id="GB_Normal_februari" hidden><?= $total['b_g_bumil']['normal']['februari'] ?></span>
                  <span id="GB_Normal_maret" hidden><?= $total['b_g_bumil']['normal']['maret'] ?></span>
                  <span id="GB_Normal_april" hidden><?= $total['b_g_bumil']['normal']['april'] ?></span>
                  <span id="GB_Normal_mei" hidden><?= $total['b_g_bumil']['normal']['mei'] ?></span>
                  <span id="GB_Normal_juni" hidden><?= $total['b_g_bumil']['normal']['juni'] ?></span>
                  <span id="GB_Normal_juli" hidden><?= $total['b_g_bumil']['normal']['juli'] ?></span>
                  <span id="GB_Normal_agustus" hidden><?= $total['b_g_bumil']['normal']['agustus'] ?></span>
                  <span id="GB_Normal_september" hidden><?= $total['b_g_bumil']['normal']['september'] ?></span>
                  <span id="GB_Normal_oktober" hidden><?= $total['b_g_bumil']['normal']['oktober'] ?></span>
                  <span id="GB_Normal_november" hidden><?= $total['b_g_bumil']['normal']['november'] ?></span>
                  <span id="GB_Normal_desember" hidden><?= $total['b_g_bumil']['normal']['desember'] ?></span>
                  <!-- gemuk -->
                  <span id="GB_Gemuk_januari" hidden><?= $total['b_g_bumil']['gemuk']['januari'] ?></span>
                  <span id="GB_Gemuk_februari" hidden><?= $total['b_g_bumil']['gemuk']['februari'] ?></span>
                  <span id="GB_Gemuk_maret" hidden><?= $total['b_g_bumil']['gemuk']['maret'] ?></span>
                  <span id="GB_Gemuk_april" hidden><?= $total['b_g_bumil']['gemuk']['april'] ?></span>
                  <span id="GB_Gemuk_mei" hidden><?= $total['b_g_bumil']['gemuk']['mei'] ?></span>
                  <span id="GB_Gemuk_juni" hidden><?= $total['b_g_bumil']['gemuk']['juni'] ?></span>
                  <span id="GB_Gemuk_juli" hidden><?= $total['b_g_bumil']['gemuk']['juli'] ?></span>
                  <span id="GB_Gemuk_agustus" hidden><?= $total['b_g_bumil']['gemuk']['agustus'] ?></span>
                  <span id="GB_Gemuk_september" hidden><?= $total['b_g_bumil']['gemuk']['september'] ?></span>
                  <span id="GB_Gemuk_oktober" hidden><?= $total['b_g_bumil']['gemuk']['oktober'] ?></span>
                  <span id="GB_Gemuk_november" hidden><?= $total['b_g_bumil']['gemuk']['november'] ?></span>
                  <span id="GB_Gemuk_desember" hidden><?= $total['b_g_bumil']['gemuk']['desember'] ?></span>
                  <!-- obesitas -->
                  <span id="GB_Obesitas_januari" hidden><?= $total['b_g_bumil']['obesitas']['januari'] ?></span>
                  <span id="GB_Obesitas_februari" hidden><?= $total['b_g_bumil']['obesitas']['februari'] ?></span>
                  <span id="GB_Obesitas_maret" hidden><?= $total['b_g_bumil']['obesitas']['maret'] ?></span>
                  <span id="GB_Obesitas_april" hidden><?= $total['b_g_bumil']['obesitas']['april'] ?></span>
                  <span id="GB_Obesitas_mei" hidden><?= $total['b_g_bumil']['obesitas']['mei'] ?></span>
                  <span id="GB_Obesitas_juni" hidden><?= $total['b_g_bumil']['obesitas']['juni'] ?></span>
                  <span id="GB_Obesitas_juli" hidden><?= $total['b_g_bumil']['obesitas']['juli'] ?></span>
                  <span id="GB_Obesitas_agustus" hidden><?= $total['b_g_bumil']['obesitas']['agustus'] ?></span>
                  <span id="GB_Obesitas_september" hidden><?= $total['b_g_bumil']['obesitas']['september'] ?></span>
                  <span id="GB_Obesitas_oktober" hidden><?= $total['b_g_bumil']['obesitas']['oktober'] ?></span>
                  <span id="GB_Obesitas_november" hidden><?= $total['b_g_bumil']['obesitas']['november'] ?></span>
                  <span id="GB_Obesitas_desember" hidden><?= $total['b_g_bumil']['obesitas']['desember'] ?></span>

                  <canvas id="giziBumil"></canvas>
               </div>
            </div>
         </div>
      </div>

      <!-- <div class="col-md-3 mb-3">
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
      </div> -->

      <!-- <div class="col-md-3 mb-3">
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
            </div>
         </div>
      </div> -->
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

   var dataGiziAnak = [{
         label: "Gizi Buruk",
         backgroundColor: "#FF0000",
         hoverBackgroundColor: "#8B0000",
         borderColor: "#FF0000",
         data: [
            parseInt(document.getElementById("GA_Buruk_januari").innerHTML),
            parseInt(document.getElementById("GA_Buruk_februari").innerHTML),
            parseInt(document.getElementById("GA_Buruk_maret").innerHTML),
            parseInt(document.getElementById("GA_Buruk_april").innerHTML),
            parseInt(document.getElementById("GA_Buruk_mei").innerHTML),
            parseInt(document.getElementById("GA_Buruk_juni").innerHTML),
            parseInt(document.getElementById("GA_Buruk_juli").innerHTML),
            parseInt(document.getElementById("GA_Buruk_agustus").innerHTML),
            parseInt(document.getElementById("GA_Buruk_september").innerHTML),
            parseInt(document.getElementById("GA_Buruk_oktober").innerHTML),
            parseInt(document.getElementById("GA_Buruk_november").innerHTML),
            parseInt(document.getElementById("GA_Buruk_desember").innerHTML),
         ],
         maxBarThickness: 1000,
      },
      {
         label: "Gizi Kurang",
         backgroundColor: "#FFFF00",
         hoverBackgroundColor: "#8B8000",
         borderColor: "#FFFF00",
         data: [
            parseInt(document.getElementById("GA_Kurang_januari").innerHTML),
            parseInt(document.getElementById("GA_Kurang_februari").innerHTML),
            parseInt(document.getElementById("GA_Kurang_maret").innerHTML),
            parseInt(document.getElementById("GA_Kurang_april").innerHTML),
            parseInt(document.getElementById("GA_Kurang_mei").innerHTML),
            parseInt(document.getElementById("GA_Kurang_juni").innerHTML),
            parseInt(document.getElementById("GA_Kurang_juli").innerHTML),
            parseInt(document.getElementById("GA_Kurang_agustus").innerHTML),
            parseInt(document.getElementById("GA_Kurang_september").innerHTML),
            parseInt(document.getElementById("GA_Kurang_oktober").innerHTML),
            parseInt(document.getElementById("GA_Kurang_november").innerHTML),
            parseInt(document.getElementById("GA_Kurang_desember").innerHTML),
         ],
         maxBarThickness: 1000,
      },
      {
         label: "Gizi Baik",
         backgroundColor: "#008000",
         hoverBackgroundColor: "#023020",
         borderColor: "#008000",
         data: [
            parseInt(document.getElementById("GA_Baik_januari").innerHTML),
            parseInt(document.getElementById("GA_Baik_februari").innerHTML),
            parseInt(document.getElementById("GA_Baik_maret").innerHTML),
            parseInt(document.getElementById("GA_Baik_april").innerHTML),
            parseInt(document.getElementById("GA_Baik_mei").innerHTML),
            parseInt(document.getElementById("GA_Baik_juni").innerHTML),
            parseInt(document.getElementById("GA_Baik_juli").innerHTML),
            parseInt(document.getElementById("GA_Baik_agustus").innerHTML),
            parseInt(document.getElementById("GA_Baik_september").innerHTML),
            parseInt(document.getElementById("GA_Baik_oktober").innerHTML),
            parseInt(document.getElementById("GA_Baik_november").innerHTML),
            parseInt(document.getElementById("GA_Baik_desember").innerHTML),
         ],
         maxBarThickness: 1000,
      },
      {
         label: "Gizi Lebih",
         backgroundColor: "#4e73df",
         hoverBackgroundColor: "#2e59d9",
         borderColor: "#4e73df",
         data: [
            parseInt(document.getElementById("GA_Lebih_januari").innerHTML),
            parseInt(document.getElementById("GA_Lebih_februari").innerHTML),
            parseInt(document.getElementById("GA_Lebih_maret").innerHTML),
            parseInt(document.getElementById("GA_Lebih_april").innerHTML),
            parseInt(document.getElementById("GA_Lebih_mei").innerHTML),
            parseInt(document.getElementById("GA_Lebih_juni").innerHTML),
            parseInt(document.getElementById("GA_Lebih_juli").innerHTML),
            parseInt(document.getElementById("GA_Lebih_agustus").innerHTML),
            parseInt(document.getElementById("GA_Lebih_september").innerHTML),
            parseInt(document.getElementById("GA_Lebih_oktober").innerHTML),
            parseInt(document.getElementById("GA_Lebih_november").innerHTML),
            parseInt(document.getElementById("GA_Lebih_desember").innerHTML),
         ],
         maxBarThickness: 1000,
      },
   ];

   var dataGiziBumil = [{
         label: "Kurus",
         backgroundColor: "#FF0000",
         hoverBackgroundColor: "#8B0000",
         borderColor: "#FF0000",
         data: [
            parseInt(document.getElementById("GB_Kurus_januari").innerHTML),
            parseInt(document.getElementById("GB_Kurus_februari").innerHTML),
            parseInt(document.getElementById("GB_Kurus_maret").innerHTML),
            parseInt(document.getElementById("GB_Kurus_april").innerHTML),
            parseInt(document.getElementById("GB_Kurus_mei").innerHTML),
            parseInt(document.getElementById("GB_Kurus_juni").innerHTML),
            parseInt(document.getElementById("GB_Kurus_juli").innerHTML),
            parseInt(document.getElementById("GB_Kurus_agustus").innerHTML),
            parseInt(document.getElementById("GB_Kurus_september").innerHTML),
            parseInt(document.getElementById("GB_Kurus_oktober").innerHTML),
            parseInt(document.getElementById("GB_Kurus_november").innerHTML),
            parseInt(document.getElementById("GB_Kurus_desember").innerHTML),
         ],
         maxBarThickness: 1000,
      },
      {
         label: "Gemuk",
         backgroundColor: "#FFFF00",
         hoverBackgroundColor: "#8B8000",
         borderColor: "#FFFF00",
         data: [
            parseInt(document.getElementById("GB_Gemuk_januari").innerHTML),
            parseInt(document.getElementById("GB_Gemuk_februari").innerHTML),
            parseInt(document.getElementById("GB_Gemuk_maret").innerHTML),
            parseInt(document.getElementById("GB_Gemuk_april").innerHTML),
            parseInt(document.getElementById("GB_Gemuk_mei").innerHTML),
            parseInt(document.getElementById("GB_Gemuk_juni").innerHTML),
            parseInt(document.getElementById("GB_Gemuk_juli").innerHTML),
            parseInt(document.getElementById("GB_Gemuk_agustus").innerHTML),
            parseInt(document.getElementById("GB_Gemuk_september").innerHTML),
            parseInt(document.getElementById("GB_Gemuk_oktober").innerHTML),
            parseInt(document.getElementById("GB_Gemuk_november").innerHTML),
            parseInt(document.getElementById("GB_Gemuk_desember").innerHTML),
         ],
         maxBarThickness: 1000,
      },
      {
         label: "Normal",
         backgroundColor: "#008000",
         hoverBackgroundColor: "#023020",
         borderColor: "#008000",
         data: [
            parseInt(document.getElementById("GB_Normal_januari").innerHTML),
            parseInt(document.getElementById("GB_Normal_februari").innerHTML),
            parseInt(document.getElementById("GB_Normal_maret").innerHTML),
            parseInt(document.getElementById("GB_Normal_april").innerHTML),
            parseInt(document.getElementById("GB_Normal_mei").innerHTML),
            parseInt(document.getElementById("GB_Normal_juni").innerHTML),
            parseInt(document.getElementById("GB_Normal_juli").innerHTML),
            parseInt(document.getElementById("GB_Normal_agustus").innerHTML),
            parseInt(document.getElementById("GB_Normal_september").innerHTML),
            parseInt(document.getElementById("GB_Normal_oktober").innerHTML),
            parseInt(document.getElementById("GB_Normal_november").innerHTML),
            parseInt(document.getElementById("GB_Normal_desember").innerHTML),
         ],
         maxBarThickness: 1000,
      },
      {
         label: "Obesitas",
         backgroundColor: "#4e73df",
         hoverBackgroundColor: "#2e59d9",
         borderColor: "#4e73df",
         data: [
            parseInt(document.getElementById("GB_Obesitas_januari").innerHTML),
            parseInt(document.getElementById("GB_Obesitas_februari").innerHTML),
            parseInt(document.getElementById("GB_Obesitas_maret").innerHTML),
            parseInt(document.getElementById("GB_Obesitas_april").innerHTML),
            parseInt(document.getElementById("GB_Obesitas_mei").innerHTML),
            parseInt(document.getElementById("GB_Obesitas_juni").innerHTML),
            parseInt(document.getElementById("GB_Obesitas_juli").innerHTML),
            parseInt(document.getElementById("GB_Obesitas_agustus").innerHTML),
            parseInt(document.getElementById("GB_Obesitas_september").innerHTML),
            parseInt(document.getElementById("GB_Obesitas_oktober").innerHTML),
            parseInt(document.getElementById("GB_Obesitas_november").innerHTML),
            parseInt(document.getElementById("GB_Obesitas_desember").innerHTML),
         ],
         maxBarThickness: 1000,
      },
   ];

   // Create the chart
   createBarChart("giziAnak", dataGiziAnak);
   createBarChart("giziBumil", dataGiziBumil);
</script>