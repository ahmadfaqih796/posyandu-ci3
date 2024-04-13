<!-- Begin Page Content -->
<div class="container-fluid">
   <div class="row">
      <div class="col-md-4 mb-3">
         <div class="card">
            <div class="card-body text-center">
               <h1 class="h4 text-gray-800">Data User</h1>
               <h1 class="h4 text-success"><?= $total['user'] ?></h1>
            </div>
         </div>
      </div>
      <div class="col-md-4 mb-3">
         <div class="card">
            <div class="card-body text-center">
               <h1 class="h4 text-gray-800">Data Kader</h1>
               <h1 class="h4 text-success"><?= $total['kader'] ?></h1>
            </div>
         </div>
      </div>
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
               <h1 class="h4 text-gray-800">Data Ibu</h1>
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
      <div class="col-md-4 mb-3">
         <div class="card">
            <div class="card-body text-center">
               <h1 class="h4 text-gray-800">Data Imunisasi</h1>
               <h1 class="h4 text-success"><?= $total['imunisasi'] ?></h1>
            </div>
         </div>
      </div>

      <div class="col-xl-8 col-lg-7">
         <!-- Bar Chart -->
         <div class="card shadow mb-4">
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">Data Imunisasi</h6>
            </div>
            <div class="card-body">
               <div class="chart-bar">
                  <canvas id="myBarChart"></canvas>
               </div>
            </div>
         </div>
      </div>

      <!-- Donut Chart -->
      <div class="col-xl-4 col-lg-5">
         <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3">
               <h6 class="m-0 font-weight-bold text-primary">Data Customer</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body" style="height: 360px;">
               <div class="chart-pie pt-4 ">
                  <canvas id="myPieChart"></canvas>
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

            </div>
         </div>
      </div>
   </div>
</div>
<!-- /.container-fluid -->