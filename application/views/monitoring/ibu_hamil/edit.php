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
         <form action="<?= base_url('monitoring/ibu_hamil/edit/' . $detail['id']) ?>" method="post">
            <?php
            $kehamilan = $this->im->get_kehamilan_by_id($id_ibu_hamil);
            ?>
            <h3 class="h3 mb-3 text-center">Ibu Hamil</h3>
            <hr class="sidebar-divider">
            <div class="row g-3">
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label>Nama Ibu Hamil</label>
                  <input type="text" disabled class="form-control" value="<?= $kehamilan["n_ibu"] ?>">
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label>Alamat</label>
                  <input type="text" disabled class="form-control" value="<?= $kehamilan["alamat"] ?>">
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label>Tanggal Lahir</label>
                  <input type="text" disabled class="form-control" value="<?= $kehamilan["tgl_lahir"] ?>">
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label>Hamil Ke</label>
                  <input type="text" disabled class="form-control" value="<?= $kehamilan["hamil_ke"] ?>">
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label>HPHT</label>
                  <input type="text" disabled class="form-control" value="<?= $kehamilan["hpht"] ?>">
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label>HTP</label>
                  <input type="text" disabled class="form-control" value="<?= $kehamilan["htp"] ?>">
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label>No Telepon</label>
                  <input type="text" disabled class="form-control" value="<?= $kehamilan["telepon"] ?>">
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label>Nama Suami</label>
                  <input type="text" disabled class="form-control" value="<?= $kehamilan["n_suami"] ?>">
               </div>
            </div>

            <h3 class="h3 mb-3 text-center">Monitoring</h3>
            <hr class="sidebar-divider">
            <div class="row g-3">
               <input type="hidden" name="bumil_id" id="bumil_id" value="<?= $id_ibu_hamil ?>">
               <input type="hidden" name="kehamilan_id" id="kehamilan_id" value="<?= $kehamilan['id_kehamilan'] ?>">
               <!-- <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="bumil_id">Nama</label>
                  <select name="bumil_id" id="bumil_id" class="form-control" required>
                     <option value="">-- Pilih Ibu Hamil --</option>
                     <?php foreach ($bidan as $field) : ?>
                        <option value="<?= $field['id'] ?>" <?= ($field['id'] == $detail['bumil_id']) ? 'selected' : ''; ?>><?= $field['n_ibu'] ?></option>
                     <?php endforeach; ?>
                  </select>
                  <?= form_error('bumil_id', '<small class="text-danger pl-3">', '</small>'); ?>
               </div> -->
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="tanggal_periksa">Tanggal Periksa</label>
                  <input type="date" class="form-control" name="tanggal_periksa" id="tanggal_periksa" value="<?= $detail['tanggal_periksa']; ?>" required>
                  <?= form_error('tanggal_periksa', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="keluhan">Keluhan</label>
                  <input type="text" class="form-control" name="keluhan" id="keluhan" value="<?= $detail['keluhan']; ?>" required>
                  <?= form_error('keluhan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="kunjungan">Kunjungan</label>
                  <select name="kunjungan" id="kunjungan" class="form-control" required>
                     <option value="">--Pilih Kunjungan--</option>
                     <option value="Trimester 1" <?= set_select('kunjungan', 'Trimester 1', (!empty($detail['kunjungan']) && $detail['kunjungan'] == "Trimester 1")); ?>>Trimester 1</option>
                     <option value="Trimester 2" <?= set_select('kunjungan', 'Trimester 2', (!empty($detail['kunjungan']) && $detail['kunjungan'] == "Trimester 2")); ?>>Trimester 2</option>
                     <option value="Trimester 3" <?= set_select('kunjungan', 'Trimester 3', (!empty($detail['kunjungan']) && $detail['kunjungan'] == "Trimester 3")); ?>>Trimester 3</option>
                  </select>
                  <?= form_error('kunjungan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="sesi">Sesi</label>
                  <select name="sesi" id="sesi" class="form-control" required>
                     <option value="">--Pilih Sesi--</option>
                     <?php for ($i = 1; $i <= 8; $i++) { ?>
                        <option value="<?= $i ?>" <?= set_select('sesi', "$i", (!empty($detail['sesi']) && $detail['sesi'] == "$i")); ?>><?= $i ?></option>
                     <?php } ?>
                  </select>
                  <?= form_error('sesi', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>

               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="tekanan_darah">Tekanan Darah</label>
                  <input type="text" class="form-control" name="tekanan_darah" id="tekanan_darah" value="<?= $detail['tekanan_darah']; ?>" required>
                  <?= form_error('tekanan_darah', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="berat_badan">Berat Badan</label>
                  <input type="text" class="form-control" name="berat_badan" id="berat_badan" value="<?= $detail['berat_badan']; ?>" required>
                  <?= form_error('berat_badan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="umur_kehamilan">Umur Kehamilan</label>
                  <input type="text" class="form-control" name="umur_kehamilan" id="umur_kehamilan" value="<?= $detail['umur_kehamilan']; ?>" required>
                  <?= form_error('umur_kehamilan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="tinggi_fundus">Tinggi Fundus</label>
                  <input type="text" class="form-control" name="tinggi_fundus" id="tinggi_fundus" value="<?= $detail['tinggi_fundus']; ?>" required>
                  <?= form_error('tinggi_fundus', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="umur_ibu">Umur Ibu </label>
                  <input type="text" class="form-control" name="umur_ibu" id="umur_ibu" value="<?= $detail['umur_ibu']; ?>" required>
                  <?= form_error('umur_ibu', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="tinggi_badan">Tinggi Badan</label>
                  <input type="text" class="form-control" name="tinggi_badan" id="tinggi_badan" value="<?= $detail['tinggi_badan']; ?>" required>
                  <?= form_error('tinggi_badan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="hiv">HIV</label>
                  <select name="hiv" id="hiv" class="form-control" required>
                     <option value="">--Pilih HIV--</option>
                     <option value="NR" <?= set_select('hiv', 'NR', (!empty($detail['hiv']) && $detail['hiv'] == "NR")); ?>>NR</option>
                     <option value="Positif" <?= set_select('hiv', 'Positif', (!empty($detail['hiv']) && $detail['hiv'] == "Positif")); ?>>Positif</option>
                  </select>
                  <?= form_error('hiv', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="sifilis">Sifilis</label>
                  <select name="sifilis" id="sifilis" class="form-control" required>
                     <option value="">--Pilih Sifilis--</option>
                     <option value="NR" <?= set_select('sifilis', 'NR', (!empty($detail['sifilis']) && $detail['sifilis'] == "NR")); ?>>NR</option>
                     <option value="Positif" <?= set_select('sifilis', 'Positif', (!empty($detail['sifilis']) && $detail['sifilis'] == "Positif")); ?>>Positif</option>
                  </select>
                  <?= form_error('sifilis', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="hibsag">HibSAg</label>
                  <select name="hibsag" id="hibsag" class="form-control" required>
                     <option value="">--Pilih HibSAg--</option>
                     <option value="NR" <?= set_select('hibsag', 'NR', (!empty($detail['hibsag']) && $detail['hibsag'] == "NR")); ?>>NR</option>
                     <option value="Positif" <?= set_select('hibsag', 'Positif', (!empty($detail['hibsag']) && $detail['hibsag'] == "Positif")); ?>>Positif</option>
                  </select>
                  <?= form_error('hibsag', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="lila">Lingkar Lengan Atas (LILA)</label>
                  <input type="text" class="form-control" name="lila" id="lila" value="<?= $detail['lila']; ?>" required>
                  <?= form_error('lila', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="kunjungan_berikutnya">Kunjungan Berikutnya</label>
                  <input type="date" class="form-control" name="kunjungan_berikutnya" id="kunjungan_berikutnya" value="<?= $detail['kunjungan_berikutnya']; ?>" required>
                  <?= form_error('kunjungan_berikutnya', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="keterangan">Keterangan</label>
                  <input type="text" class="form-control" name="keterangan" id="keterangan" value="<?= $detail['keterangan']; ?>" required>
                  <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
            </div>
            <hr class="sidebar-divider">
            <h3 class="h3 mb-3 text-center">Standar 7T</h3>
            <hr class="sidebar-divider">
            <div class="row g-3">
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="s_timbang_berat_badan">Timbangan Berat Badan</label>
                  <select name="s_timbang_berat_badan" id="s_timbang_berat_badan" class="form-control" required>
                     <option value="">--Pilih--</option>
                     <option value="sudah" <?= set_select('s_timbang_berat_badan', 'sudah', (!empty($detail['s_timbang_berat_badan']) && $detail['s_timbang_berat_badan'] == "sudah")); ?>>sudah</option>
                     <option value="belum" <?= set_select('s_timbang_berat_badan', 'belum', (!empty($detail['s_timbang_berat_badan']) && $detail['s_timbang_berat_badan'] == "belum")); ?>>belum</option>
                  </select>
                  <?= form_error('s_timbang_berat_badan', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>

               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="s_tekanan_darah">Tekanan Darah</label>
                  <select name="s_tekanan_darah" id="s_tekanan_darah" class="form-control" required>
                     <option value="">--Pilih--</option>
                     <option value="sudah" <?= set_select('s_tekanan_darah', 'sudah', (!empty($detail['s_tekanan_darah']) && $detail['s_tekanan_darah'] == "sudah")); ?>>sudah</option>
                     <option value="belum" <?= set_select('s_tekanan_darah', 'belum', (!empty($detail['s_tekanan_darah']) && $detail['s_tekanan_darah'] == "belum")); ?>>belum</option>
                  </select>
                  <?= form_error('s_tekanan_darah', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="s_tinggi_puncak_rahim">Tinggi Puncak Rahim</label>
                  <select name="s_tinggi_puncak_rahim" id="s_tinggi_puncak_rahim" class="form-control" required>
                     <option value="">--Pilih--</option>
                     <option value="sudah" <?= set_select('s_tinggi_puncak_rahim', 'sudah', (!empty($detail['s_tinggi_puncak_rahim']) && $detail['s_tinggi_puncak_rahim'] == "sudah")); ?>>sudah</option>
                     <option value="belum" <?= set_select('s_tinggi_puncak_rahim', 'belum', (!empty($detail['s_tinggi_puncak_rahim']) && $detail['s_tinggi_puncak_rahim'] == "belum")); ?>>belum</option>
                  </select>
                  <?= form_error('s_tinggi_puncak_rahim', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="s_vaksinasi_tetanus">Vaksinasi Tetanus</label>
                  <select name="s_vaksinasi_tetanus" id="s_vaksinasi_tetanus" class="form-control" required>
                     <option value="">--Pilih--</option>
                     <option value="sudah" <?= set_select('s_vaksinasi_tetanus', 'sudah', (!empty($detail['s_vaksinasi_tetanus']) && $detail['s_vaksinasi_tetanus'] == "sudah")); ?>>sudah</option>
                     <option value="belum" <?= set_select('s_vaksinasi_tetanus', 'belum', (!empty($detail['s_vaksinasi_tetanus']) && $detail['s_vaksinasi_tetanus'] == "belum")); ?>>belum</option>
                  </select>
                  <?= form_error('s_vaksinasi_tetanus', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="s_tablet_zat_besi">Tablet Zat Besi</label>
                  <select name="s_tablet_zat_besi" id="s_tablet_zat_besi" class="form-control" required>
                     <option value="">--Pilih--</option>
                     <option value="sudah" <?= set_select('s_tablet_zat_besi', 'sudah', (!empty($detail['s_tablet_zat_besi']) && $detail['s_tablet_zat_besi'] == "sudah")); ?>>sudah</option>
                     <option value="belum" <?= set_select('s_tablet_zat_besi', 'belum', (!empty($detail['s_tablet_zat_besi']) && $detail['s_tablet_zat_besi'] == "belum")); ?>>belum</option>
                  </select>
                  <?= form_error('s_tablet_zat_besi', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="s_tes_laboratorium">Tes Laboratorium</label>
                  <select name="s_tes_laboratorium" id="s_tes_laboratorium" class="form-control" required>
                     <option value="">--Pilih--</option>
                     <option value="sudah" <?= set_select('s_tes_laboratorium', 'sudah', (!empty($detail['s_tes_laboratorium']) && $detail['s_tes_laboratorium'] == "sudah")); ?>>sudah</option>
                     <option value="belum" <?= set_select('s_tes_laboratorium', 'belum', (!empty($detail['s_tes_laboratorium']) && $detail['s_tes_laboratorium'] == "belum")); ?>>belum</option>
                  </select>
                  <?= form_error('s_tes_laboratorium', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="s_temu_wicara">Temu Wicara</label>
                  <select name="s_temu_wicara" id="s_temu_wicara" class="form-control" required>
                     <option value="">--Pilih--</option>
                     <option value="sudah" <?= set_select('s_temu_wicara', 'sudah', (!empty($detail['s_temu_wicara']) && $detail['s_temu_wicara'] == "sudah")); ?>>sudah</option>
                     <option value="belum" <?= set_select('s_temu_wicara', 'belum', (!empty($detail['s_temu_wicara']) && $detail['s_temu_wicara'] == "belum")); ?>>belum</option>
                  </select>
                  <?= form_error('s_temu_wicara', '<small class="text-danger pl-3">', '</small>'); ?>
               </div>
            </div>
            <div class="row g-3">
               <div class="col-12">
                  <button type="submit" class="btn btn-primary float-right">Simpan</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- /.container-fluid -->