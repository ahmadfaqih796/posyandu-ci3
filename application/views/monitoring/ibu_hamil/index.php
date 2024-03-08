<!-- Begin Page Content -->
<div class="container-fluid">

   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3">
         <div class="row">
            <div class="col-6 align-self-center">
               <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
            </div>
            <div class="col-6">
               <a type="button" class="btn btn-primary float-right" href="<?= base_url('monitoring/ibu_hamil/add') ?>">
                  <i class="fas fa-plus"></i> Tambah
               </a>
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
                     <th>Nama Bidan</th>
                     <th>Tanggal Periksa</th>
                     <th>Standar 7T</th>
                     <th>Aksi</th>
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
                  ?>
                     <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $field['n_ibu'] ?></td>
                        <td><?= $field['tanggal_periksa'] ?></td>
                        <td><?= $result == 1 ? 'Belum' : 'Sudah' ?></td>
                        <td>
                           <a type="button" class="btn btn-primary" href="<?= base_url('monitoring/ibu_hamil/edit/' . $field['id']) ?>">Edit</a>
                           <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" onclick="deleteData(<?= htmlspecialchars(json_encode($field), ENT_QUOTES, 'UTF-8') ?>)">Hapus</button>
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