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
               <?php if ($role == 4) : ?>
                  <a type="button" class="btn btn-success float-right ml-2 btn-block" href="<?= base_url('monitoring/gizi_ibu_hamil/pdf') ?>">
                     <i class="fas fa-print"></i> PDF
                  </a>
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
                     <th>Nama</th>
                     <th>Tanggal Periksa</th>
                     <th>Berat Badan</th>
                     <th>Tinggi Badan</th>
                     <th>Status Gizi</th>
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
                        <td><?= $field['n_ibu'] ?></td>
                        <td><?= $field['tanggal_periksa'] ?></td>
                        <td><?= $field['berat_badan'] ?></td>
                        <td><?= $field['tinggi_badan'] ?></td>
                        <td><?= $status_gizi ?></td>
                     </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>

</div>
<!-- /.container-fluid -->