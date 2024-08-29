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
               <?php if ($role == 6) : ?>
                  <button type="button" class="btn btn-primary mb-3 float-right btn-block" data-toggle="modal" data-target="#addModal">
                     <i class="fas fa-plus"></i> Tambah
                  </button>
                  <div class="form-group mb-3" style="width: 180px;">
                     <select name="anak_id" id="anak_id" class="form-control" required>
                        <option value="">Progress Anak</option>
                        <?php foreach ($anak as $field) : ?>
                           <option value="<?= $field['id'] ?>" <?= set_select('anak_id', $field['id'], (!empty($_POST['anak_id']) && $_POST['anak_id'] == $field['id'])); ?>><?= $field['name'] . " - " . $field['nik'] . " - " . $field['n_posyandu'] ?></option>
                        <?php endforeach; ?>
                     </select>
                  </div>
               <?php endif; ?>
               <button type="button" class="btn btn-primary float-right btn-block" data-toggle="modal" data-target="#filterModal">
                  <i class="fas fa-search"></i> Cari
               </button>
               <!-- <?php if ($role == 4) : ?>
               <?php endif; ?> -->
            </div>
         </div>
      </div>
      <div class="card-body">
         <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>') ?>
         <?= $this->session->flashdata('message'); ?>
         <?php if ($role == 8) : ?>
            <div class="form-group mb-3 float-right" style="width: 180px;">
               <select name="anak_id" id="anak_id" class="form-control" required>
                  <option value="">Progress Anak</option>
                  <?php foreach ($anak as $field) : ?>
                     <option value="<?= $field['id'] ?>" <?= set_select('anak_id', $field['id'], (!empty($_POST['anak_id']) && $_POST['anak_id'] == $field['id'])); ?>><?= $field['name'] . " - " . $field['nik'] . " - " . $field['n_posyandu'] ?></option>
                  <?php endforeach; ?>
               </select>
            </div>
         <?php endif; ?>
         <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th>No</th>
                     <th>NIK</th>
                     <th>Nama</th>
                     <th>Nama Posyandu</th>
                     <th>Tanggal Imunisasi</th>
                     <th>Imunisasi</th>
                     <th>Status</th>
                     <?php if ($role == 6) : ?>
                        <th>Aksi</th>
                     <?php endif; ?>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($data as $field) : ?>
                     <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $field['nik'] ?></td>
                        <td><?= $field['name'] ?></td>
                        <td><?= $field['n_posyandu'] ?></td>
                        <td><?= $field['tanggal_imunisasi'] ?></td>
                        <td><?= $field['n_imunisasi'] ?></td>
                        <td><?= $field['status'] == 1 ? 'Sudah' : 'Belum' ?></td>
                        <?php if ($role == 6) : ?>
                           <td>
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal" onclick="getData(<?= htmlspecialchars(json_encode($field), ENT_QUOTES, 'UTF-8') ?>)">Edit</button>
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
   var anakId = document.getElementById('anak_id').textContent;
   document.getElementById('anak_id').addEventListener('change', function() {
      var selectedAnak = this.value;
      console.log("trtrtr", selectedAnak)
      // Mengalihkan ke halaman dengan URL yang disesuaikan
      window.location.href = '<?= base_url("laporan/imunisasi/data/") ?>' + null + '/' + null + '/' + selectedAnak;
   });
</script>