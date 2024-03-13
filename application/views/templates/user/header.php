<!--
=========================================================
* Soft UI Design System - v1.0.9
=========================================================

* Product Page:  https://www.creative-tim.com/product/soft-ui-design-system 
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Coded by www.creative-tim.com

 =========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!DOCTYPE html>
<html lang="en" itemscope itemtype="http://schema.org/WebPage">

<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="apple-touch-icon" sizes="76x76" href="<?= base_url("assets/img/soft-ui/") ?>apple-icon.png">
   <link rel="icon" type="image/png" href="<?= base_url("assets/img/soft-ui/") ?>favicon.png">
   <title>
      <?= $title ?>
   </title>
   <!--     Fonts and icons     -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
   <!-- Nucleo Icons -->
   <link href="<?= base_url("assets/css/soft-ui/") ?>nucleo-icons.css" rel="stylesheet" />
   <link href="<?= base_url("assets/css/soft-ui/") ?>nucleo-svg.css" rel="stylesheet" />
   <!-- Font Awesome Icons -->
   <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
   <link href="<?= base_url("assets/css/soft-ui/") ?>nucleo-svg.css" rel="stylesheet" />
   <!-- CSS Files -->
   <link id="pagestyle" href="<?= base_url("assets/css/soft-ui/") ?>soft-design-system.css?v=1.0.9" rel="stylesheet" />
   <!-- Nepcha Analytics (nepcha.com) -->
   <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
   <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
   <!-- Data tables Bootstrap -->
   <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
   <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />

   <script>
      $(document).ready(function() {
         $('#myTable').DataTable();
      });
   </script>
</head>

<body class="about-us">

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