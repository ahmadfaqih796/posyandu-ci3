<!-- Navbar Transparent -->
<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent ">
   <div class="container">
      <a class="navbar-brand  text-white " href="https://demos.creative-tim.com/soft-ui-design-system/presentation.html" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom">
         <?= 'Posyandu ' . $user['n_posyandu'] ?>
      </a>
      <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon mt-2">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
         </span>
      </button>
      <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0 ms-lg-12 ps-lg-5" id="navigation">
         <ul class="navbar-nav navbar-nav-hover w-100 justify-content-between">
            <div class="d-lg-flex justify-content-center ">
               <li class="nav-item ms-lg-auto">
                  <a class="nav-link nav-link-icon me-2" href="<?= base_url("user/home") ?>">
                     <i class="fa fa-paste me-1"></i>
                     <p class="d-inline text-sm z-index-1 font-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Home">Home</p>
                  </a>
               </li>
               <li class="nav-item ms-lg-auto">
                  <a class="nav-link nav-link-icon me-2" href="<?= base_url("user/perkembangan_anak") ?>">
                     <i class="fa fa-notes-medical me-1"></i>
                     <p class="d-inline text-sm z-index-1 font-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Perkembangan Anak">Perkembangan Anak</p>
                  </a>
               </li>
               <li class="nav-item ms-lg-auto">
                  <a class="nav-link nav-link-icon me-2" href="<?= base_url("user/jadwal_posyandu") ?>">
                     <i class="fa fa-clipboard me-1"></i>
                     <p class="d-inline text-sm z-index-1 font-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" title="jadwal Posyandu">Jadwal Posyandu</p>
                  </a>
               </li>
               <li class="nav-item ms-lg-auto">
                  <a class="nav-link nav-link-icon me-2" href="<?= base_url("user/kegiatan") ?>">
                     <i class="fa fa-clipboard-list me-1"></i>
                     <p class="d-inline text-sm z-index-1 font-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Kegiatan">Kegiatan</p>
                  </a>
               </li>
            </div>
            <!-- <li class="nav-item my-auto ms-3 ms-lg-0">
               <a href="https://www.creative-tim.com/builder?ref=navbar-soft-design-system" class="btn btn-sm btn-outline-white btn-round mb-0 me-1 mt-2 mt-md-0">Online Builder</a>
            </li> -->
            <li class="nav-item my-auto ms-3 ms-lg-0">
               <a href="<?= base_url("auth/logout") ?>" class="btn btn-sm  bg-white  btn-round mb-0 me-1 mt-2 mt-md-0">Logout</a>
            </li>
         </ul>
      </div>
   </div>
</nav>
<!-- End Navbar -->