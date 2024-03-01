   <!-- -------- START HEADER 7 w/ text and video ------- -->
   <header class="bg-gradient-dark">
      <div class="page-header min-vh-70" style="background-image: url('<?= base_url("assets/img/posyandu/") ?>p_header.jpeg');">
         <span class="mask bg-gradient-info opacity-8"></span>
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-lg-8 text-center mx-auto my-auto">
                  <h1 class="text-white"><?= 'Posyandu ' . $user['n_posyandu'] ?></h1>
                  <p class="lead mb-4 text-white opacity-8">Monitoring is Better then Curing</p>
                  <!-- <button type="submit" class="btn bg-white text-dark">Create Account</button> -->
                  <h6 class="text-white mb-2 mt-5">Find us on</h6>
                  <div class="d-flex justify-content-center">
                     <a href="javascript:;"><i class="fab fa-facebook text-lg text-white me-4"></i></a>
                     <a href="javascript:;"><i class="fab fa-instagram text-lg text-white me-4"></i></a>
                     <a href="javascript:;"><i class="fab fa-twitter text-lg text-white me-4"></i></a>
                     <a href="javascript:;"><i class="fab fa-google-plus text-lg text-white"></i></a>
                  </div>
               </div>
            </div>
         </div>
         <div class="position-absolute w-100 z-index-1 bottom-0">
            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
               <defs>
                  <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
               </defs>
               <g class="moving-waves">
                  <use xlink:href="#gentle-wave" x="48" y="-1" fill="rgba(255,255,255,0.40" />
                  <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.35)" />
                  <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.25)" />
                  <use xlink:href="#gentle-wave" x="48" y="8" fill="rgba(255,255,255,0.20)" />
                  <use xlink:href="#gentle-wave" x="48" y="13" fill="rgba(255,255,255,0.15)" />
                  <use xlink:href="#gentle-wave" x="48" y="16" fill="rgba(255,255,255,1" />
               </g>
            </svg>
         </div>
      </div>
   </header>
   <!-- -------- END HEADER 7 w/ text and video ------- -->

   <!-- -------- START PRE-FOOTER 1 w/ SUBSCRIBE BUTTON AND IMAGE ------- -->
   <section class="my-5 pt-5">
      <div class="container">
         <div class="row">
            <div class="col-md-12 m-auto">
               <h4 class="text-center mb-5"><?= $title ?></h4>
               <div class="table-responsive">
                  <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                     <thead>
                        <tr>
                           <th>No</th>
                           <th>Nama Posyandu</th>
                           <th>Tanggal</th>
                           <th>Jam Buka</th>
                           <th>Jam Tutup</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php foreach ($posyandu as $field) : ?>
                           <tr>
                              <td><?= $no++ ?></td>
                              <td><?= $field['n_posyandu'] ?></td>
                              <td><?= $field['tanggal'] ?></td>
                              <td><?= $field['jam_buka'] ?></td>
                              <td><?= $field['jam_tutup'] ?></td>
                           </tr>
                        <?php endforeach; ?>
                     </tbody>
                  </table>
               </div>
            </div>
            <!-- <div class="col-md-5 ms-auto">
            <div class="position-relative">
               <img class="max-width-50 w-100 position-relative z-index-2" src="<?= base_url("assets/img/soft-ui/") ?>illustrations/sign-up.png" alt="image">
            </div>
         </div> -->
         </div>
      </div>
   </section>
   <!-- -------- END PRE-FOOTER 1 w/ SUBSCRIBE BUTTON AND IMAGE ------- -->