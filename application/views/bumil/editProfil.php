<!-- -------- START PRE-FOOTER 1 w/ SUBSCRIBE BUTTON AND IMAGE ------- -->
<section class="my-5 pt-5">
   <div class="container">
      <div class="text-center">
         <h4><?= $title ?></h4>
      </div>
      <div class="row justify-content-center">
         <div class="col-md-6">
            <div class="card">
               <div class="card-body">
                  <!-- <img src="<?= base_url("assets/img/bumil/" . $detail['photo']) ?>" alt="" width="100%"> -->
                  <form action="<?= base_url('bumil/edit/' . $detail['id']) ?>" method="post" enctype="multipart/form-data">
                     <div class="mb-3">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                     </div>
                     <div class="mb-3">
                        <label for="n_ibu" class="form-label">Nama Ibu</label>
                        <input type="text" class="form-control" id="n_ibu" name="n_ibu" value="<?= $detail['n_ibu'] ?>">
                     </div>
                     <div class="mb-3">
                        <label for="n_suami" class="form-label">Nama Suami</label>
                        <input type="text" class="form-control" id="n_suami" name="n_suami" value="<?= $detail['n_suami'] ?>">
                     </div>
                     <div class="mb-3">
                        <label for="nik" class="form-label">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="<?= $detail['nik'] ?>">
                     </div>
                     <div class="mb-3">
                        <label for="no_medis" class="form-label">No Medis</label>
                        <input type="text" class="form-control" id="no_medis" name="no_medis" value="<?= $detail['no_medis'] ?>">
                     </div>
                     <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $detail['alamat'] ?>">
                     </div>
                     <div class="mb-3">
                        <label for="golongan_darah" class="form-label">Golongan Darah</label>
                        <input type="text" class="form-control" id="golongan_darah" name="golongan_darah" value="<?= $detail['golongan_darah'] ?>">
                     </div>
                     <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon" value="<?= $detail['telepon'] ?>">
                     </div>
                     <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- -------- END PRE-FOOTER 1 w/ SUBSCRIBE BUTTON AND IMAGE ------- -->