<!-- -------- START PRE-FOOTER 1 w/ SUBSCRIBE BUTTON AND IMAGE ------- -->
<section class="my-5 pt-5">
   <div class="container">
      <div class="row">
         <div class="col-md-12 m-auto">
            <!-- <h4 class="text-center mb-5"><?= $title ?></h4> -->
            <?php
            $kehamilan = $this->im->get_kehamilan_by_id($detail['kehamilan_id']);
            // var_dump($kehamilan);
            ?>
            <h4 class="h4 mb-3 text-center">Ibu Hamil</h4>
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
               <!-- <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label>Tanggal Lahir</label>
                  <input type="text" disabled class="form-control" value="<?= $kehamilan["tgl_lahir"] ?>">
               </div> -->
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

            <h4 class="h4 mb-3 text-center">Monitoring</h4>
            <hr class="sidebar-divider">
            <div class="row g-3">
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="tanggal_periksa">Tanggal Periksa</label>
                  <input disabled type="date" class="form-control" name="tanggal_periksa" id="tanggal_periksa" value="<?= $detail['tanggal_periksa']; ?>" required>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="keluhan">Keluhan</label>
                  <input disabled type="text" class="form-control" name="keluhan" id="keluhan" value="<?= $detail['keluhan']; ?>" required>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="kunjungan">Kunjungan</label>
                  <select disabled name="kunjungan" id="kunjungan" class="form-control" required>
                     <option value="">--Pilih Kunjungan--</option>
                     <option value="Trimester 1" <?= set_select('kunjungan', 'Trimester 1', (!empty($detail['kunjungan']) && $detail['kunjungan'] == "Trimester 1")); ?>>Trimester 1</option>
                     <option value="Trimester 2" <?= set_select('kunjungan', 'Trimester 2', (!empty($detail['kunjungan']) && $detail['kunjungan'] == "Trimester 2")); ?>>Trimester 2</option>
                     <option value="Trimester 3" <?= set_select('kunjungan', 'Trimester 3', (!empty($detail['kunjungan']) && $detail['kunjungan'] == "Trimester 3")); ?>>Trimester 3</option>
                  </select>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="sesi">Sesi</label>
                  <select disabled name="sesi" id="sesi" class="form-control" required>
                     <option value="">--Pilih Sesi--</option>
                     <?php for ($i = 1; $i <= 8; $i++) { ?>
                        <option value="<?= $i ?>" <?= set_select('sesi', "$i", (!empty($detail['sesi']) && $detail['sesi'] == "$i")); ?>><?= $i ?></option>
                     <?php } ?>
                  </select>
               </div>

               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="tekanan_darah">Tekanan Darah</label>
                  <input disabled type="text" class="form-control" name="tekanan_darah" id="tekanan_darah" value="<?= $detail['tekanan_darah']; ?>" required>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="berat_badan">Berat Badan</label>
                  <input disabled type="text" class="form-control" name="berat_badan" id="berat_badan" value="<?= $detail['berat_badan']; ?>" required>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="umur_kehamilan">Umur Kehamilan</label>
                  <input disabled type="text" class="form-control" name="umur_kehamilan" id="umur_kehamilan" value="<?= $detail['umur_kehamilan']; ?>" required>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="tinggi_fundus">Tinggi Fundus</label>
                  <input disabled type="text" class="form-control" name="tinggi_fundus" id="tinggi_fundus" value="<?= $detail['tinggi_fundus']; ?>" required>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="umur_ibu">Umur Ibu </label>
                  <input disabled type="text" class="form-control" name="umur_ibu" id="umur_ibu" value="<?= $detail['umur_ibu']; ?>" required>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="tinggi_badan">Tinggi Badan</label>
                  <input disabled type="text" class="form-control" name="tinggi_badan" id="tinggi_badan" value="<?= $detail['tinggi_badan']; ?>" required>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="hiv">HIV</label>
                  <select disabled name="hiv" id="hiv" class="form-control" required>
                     <option value="">--Pilih HIV--</option>
                     <option value="NR" <?= set_select('hiv', 'NR', (!empty($detail['hiv']) && $detail['hiv'] == "NR")); ?>>NR</option>
                     <option value="Positif" <?= set_select('hiv', 'Positif', (!empty($detail['hiv']) && $detail['hiv'] == "Positif")); ?>>Positif</option>
                  </select>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="sifilis">Sifilis</label>
                  <select disabled name="sifilis" id="sifilis" class="form-control" required>
                     <option value="">--Pilih Sifilis--</option>
                     <option value="NR" <?= set_select('sifilis', 'NR', (!empty($detail['sifilis']) && $detail['sifilis'] == "NR")); ?>>NR</option>
                     <option value="Positif" <?= set_select('sifilis', 'Positif', (!empty($detail['sifilis']) && $detail['sifilis'] == "Positif")); ?>>Positif</option>
                  </select>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="hibsag">HibSAg</label>
                  <select disabled name="hibsag" id="hibsag" class="form-control" required>
                     <option value="">--Pilih HibSAg--</option>
                     <option value="NR" <?= set_select('hibsag', 'NR', (!empty($detail['hibsag']) && $detail['hibsag'] == "NR")); ?>>NR</option>
                     <option value="Positif" <?= set_select('hibsag', 'Positif', (!empty($detail['hibsag']) && $detail['hibsag'] == "Positif")); ?>>Positif</option>
                  </select>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="lila">Lingkar Lengan Atas (LILA)</label>
                  <input disabled type="text" class="form-control" name="lila" id="lila" value="<?= $detail['lila']; ?>" required>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="kunjungan_berikutnya">Kunjungan Berikutnya</label>
                  <input disabled type="date" class="form-control" name="kunjungan_berikutnya" id="kunjungan_berikutnya" value="<?= $detail['kunjungan_berikutnya']; ?>" required>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="keterangan">Keterangan</label>
                  <input disabled type="text" class="form-control" name="keterangan" id="keterangan" value="<?= $detail['keterangan']; ?>" required>
               </div>
            </div>

            <h4 class="h4 mb-3 text-center">Standar 7T</h4>
            <hr class="sidebar-divider">
            <div class="row g-3">
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="s_timbang_berat_badan">Timbangan Berat Badan</label>
                  <select disabled name="s_timbang_berat_badan" id="s_timbang_berat_badan" class="form-control" required>
                     <option value="">--Pilih--</option>
                     <option value="sudah" <?= set_select('s_timbang_berat_badan', 'sudah', (!empty($detail['s_timbang_berat_badan']) && $detail['s_timbang_berat_badan'] == "sudah")); ?>>sudah</option>
                     <option value="belum" <?= set_select('s_timbang_berat_badan', 'belum', (!empty($detail['s_timbang_berat_badan']) && $detail['s_timbang_berat_badan'] == "belum")); ?>>belum</option>
                  </select>
               </div>

               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="s_tekanan_darah">Tekanan Darah</label>
                  <select disabled name="s_tekanan_darah" id="s_tekanan_darah" class="form-control" required>
                     <option value="">--Pilih--</option>
                     <option value="sudah" <?= set_select('s_tekanan_darah', 'sudah', (!empty($detail['s_tekanan_darah']) && $detail['s_tekanan_darah'] == "sudah")); ?>>sudah</option>
                     <option value="belum" <?= set_select('s_tekanan_darah', 'belum', (!empty($detail['s_tekanan_darah']) && $detail['s_tekanan_darah'] == "belum")); ?>>belum</option>
                  </select>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="s_tinggi_puncak_rahim">Tinggi Puncak Rahim</label>
                  <select disabled name="s_tinggi_puncak_rahim" id="s_tinggi_puncak_rahim" class="form-control" required>
                     <option value="">--Pilih--</option>
                     <option value="sudah" <?= set_select('s_tinggi_puncak_rahim', 'sudah', (!empty($detail['s_tinggi_puncak_rahim']) && $detail['s_tinggi_puncak_rahim'] == "sudah")); ?>>sudah</option>
                     <option value="belum" <?= set_select('s_tinggi_puncak_rahim', 'belum', (!empty($detail['s_tinggi_puncak_rahim']) && $detail['s_tinggi_puncak_rahim'] == "belum")); ?>>belum</option>
                  </select>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="s_vaksinasi_tetanus">Vaksinasi Tetanus</label>
                  <select disabled name="s_vaksinasi_tetanus" id="s_vaksinasi_tetanus" class="form-control" required>
                     <option value="">--Pilih--</option>
                     <option value="sudah" <?= set_select('s_vaksinasi_tetanus', 'sudah', (!empty($detail['s_vaksinasi_tetanus']) && $detail['s_vaksinasi_tetanus'] == "sudah")); ?>>sudah</option>
                     <option value="belum" <?= set_select('s_vaksinasi_tetanus', 'belum', (!empty($detail['s_vaksinasi_tetanus']) && $detail['s_vaksinasi_tetanus'] == "belum")); ?>>belum</option>
                  </select>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="s_tablet_zat_besi">Tablet Zat Besi</label>
                  <select disabled name="s_tablet_zat_besi" id="s_tablet_zat_besi" class="form-control" required>
                     <option value="">--Pilih--</option>
                     <option value="sudah" <?= set_select('s_tablet_zat_besi', 'sudah', (!empty($detail['s_tablet_zat_besi']) && $detail['s_tablet_zat_besi'] == "sudah")); ?>>sudah</option>
                     <option value="belum" <?= set_select('s_tablet_zat_besi', 'belum', (!empty($detail['s_tablet_zat_besi']) && $detail['s_tablet_zat_besi'] == "belum")); ?>>belum</option>
                  </select>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="s_tes_laboratorium">Tes Laboratorium</label>
                  <select disabled name="s_tes_laboratorium" id="s_tes_laboratorium" class="form-control" required>
                     <option value="">--Pilih--</option>
                     <option value="sudah" <?= set_select('s_tes_laboratorium', 'sudah', (!empty($detail['s_tes_laboratorium']) && $detail['s_tes_laboratorium'] == "sudah")); ?>>sudah</option>
                     <option value="belum" <?= set_select('s_tes_laboratorium', 'belum', (!empty($detail['s_tes_laboratorium']) && $detail['s_tes_laboratorium'] == "belum")); ?>>belum</option>
                  </select>
               </div>
               <div class="col-sx-12 col-md-6 col-lg-4 form-group">
                  <label for="s_temu_wicara">Temu Wicara</label>
                  <select disabled name="s_temu_wicara" id="s_temu_wicara" class="form-control" required>
                     <option value="">--Pilih--</option>
                     <option value="sudah" <?= set_select('s_temu_wicara', 'sudah', (!empty($detail['s_temu_wicara']) && $detail['s_temu_wicara'] == "sudah")); ?>>sudah</option>
                     <option value="belum" <?= set_select('s_temu_wicara', 'belum', (!empty($detail['s_temu_wicara']) && $detail['s_temu_wicara'] == "belum")); ?>>belum</option>
                  </select>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- -------- END PRE-FOOTER 1 w/ SUBSCRIBE BUTTON AND IMAGE ------- -->