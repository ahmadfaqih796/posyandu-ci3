<?php
$this->load->model('Base_model', 'bm');
$table = $this->bm->get_all('notification');
$total = $this->bm->get_count('notification');
?>

<!-- Navbar Transparent -->
<nav class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent ">
   <div class="container">
      <li class="d-block d-lg-none nav-item ms-lg-auto dropdown dropdown-hover">
         <a class="nav-link me-2 d-flex justify-content-between cursor-pointer align-items-center" id="notification" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-bell"></i>
            <sup class="badge badge-dot badge-dot-lg bg-danger"><?= $total ?></sup>
         </a>
         <div class="dropdown-menu dropdown-menu-animation dropdown-md p-3 border-radius-lg mt-0 mt-lg-3 position-absolute" aria-labelledby="notification">
            <div class="d-block d-lg-none">
               <?php foreach ($table as $row) : ?>
                  <a href="<?= base_url("bumil/detail_monitoring/" . $row['id']) ?>" class="dropdown-item border-radius-md">
                     <div><?= "Periksa tanggal " . $row['date'] ?></div>
                  </a>
               <?php endforeach ?>
            </div>
         </div>
      </li>
      <a class="navbar-brand  text-white " href="https://demos.creative-tim.com/soft-ui-design-system/presentation.html" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom">
         <?= $this->session->userdata('fullname'); ?>
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
                  <a class="nav-link nav-link-icon me-2" href="<?= base_url("bumil") ?>">
                     <i class="fa fa-paste me-1"></i>
                     <p class="d-inline text-sm z-index-1 font-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Home">Home</p>
                  </a>
               </li>
               <li class="nav-item ms-lg-auto">
                  <a class="nav-link nav-link-icon me-2" href="<?= base_url("bumil/kehamilan") ?>">
                     <i class="fa fa-notes-medical me-1"></i>
                     <p class="d-inline text-sm z-index-1 font-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Kehamilan">Kehamilan</p>
                  </a>
               </li>
               <li class="nav-item ms-lg-auto">
                  <a class="nav-link nav-link-icon me-2" href="<?= base_url("bumil/monitoring") ?>">
                     <i class="fa fa-clipboard me-1"></i>
                     <p class="d-inline text-sm z-index-1 font-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Monitoring">Monitoring</p>
                  </a>
               </li>
               <li class="nav-item ms-lg-auto">
                  <a class="nav-link nav-link-icon me-2" href="<?= base_url("bumil/status_gizi") ?>">
                     <i class="fa fa-clipboard me-1"></i>
                     <p class="d-inline text-sm z-index-1 font-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Status Gizi">Status Gizi</p>
                  </a>
               </li>
               <li class="nav-item ms-lg-auto">
                  <a class="nav-link nav-link-icon me-2" href="<?= base_url("bumil/profil") ?>">
                     <i class="fa fa-clipboard me-1"></i>
                     <p class="d-inline text-sm z-index-1 font-bold" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Profil">Profil</p>
                  </a>
               </li>
               <!-- <li class="nav-item ms-lg-auto notification">
                  <a class="nav-link nav-link-icon me-2" href="<?= base_url("bumil/notifikasi") ?>">
                     <i class="fa fa-bell"></i>
                     <sup class="badge badge-dot badge-dot-lg bg-danger">4</sup>
                  </a>
               </li> -->
               <li class="d-none d-lg-block nav-item ms-lg-auto dropdown dropdown-hover">
                  <a class="nav-link me-2 d-flex justify-content-between cursor-pointer align-items-center" id="notification" data-bs-toggle="dropdown" aria-expanded="false">
                     <i class="fa fa-bell"></i>
                     <sup class="badge badge-dot badge-dot-lg bg-danger"><?= $total ?></sup>
                  </a>
                  <div class="dropdown-menu dropdown-menu-animation dropdown-md p-3 border-radius-lg mt-0 mt-lg-3" aria-labelledby="notification">
                     <div class="d-none d-lg-block">
                        <?php foreach ($table as $row) : ?>
                           <a href="<?= base_url("bumil/detail_monitoring/" . $row['id']) ?>" class="dropdown-item border-radius-md">
                              <div><?= $row['message'] ?></div>
                           </a>
                        <?php endforeach ?>
                     </div>
                  </div>
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