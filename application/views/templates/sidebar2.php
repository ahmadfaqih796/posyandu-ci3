<?php
// Array untuk menu sidebar
$sidebarMenu = array(
   array(
      "text" => "Home",
      "role" => array(1, 2),
      "submenu" => array(
         array(
            "url" => "dashboard",
            "text" => "Dashboard",
            "icon" => "fas fa-fw fa-clipboard",
            "role" => array(1, 2),
         ),
      )
   ),
   array(
      "text" => "Management",
      "role" => array(1, 2),
      "submenu" => array(
         array(
            "url" => "management/users",
            "text" => "Users",
            "icon" => "fas fa-fw fa-users",
            "role" => array(1),
         ),
         array(
            "url" => "management/kaders",
            "text" => "Kader",
            "icon" => "fas fa-fw fa-user",
            "role" => array(1),
         ),

         array(
            "text" => "Ibu",
            "icon" => "fas fa-fw fa-female",
            "role" => array(2),
            "submenu" => array(
               array(
                  "url" => "management/ibu/ibu_hamil",
                  "text" => "Ibu Hamil",
                  "icon" => "fas fa-fw fa-users",
                  "role" => array(1),
               ),
               array(
                  "url" => "management/ibu/ibu_kematian",
                  "text" => "Ibu Kematian",
                  "icon" => "fas fa-fw fa-user",
                  "role" => array(1),
               ),
            )
         ),
      )
   ),
);

$userRole = $_SESSION['role_id'];
$filteredMenu = array();

foreach ($sidebarMenu as $menu) {
   if (in_array($userRole, $menu['role'])) {
      $filteredMenu[] = $menu;
   }
}
?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

   <!-- Sidebar - Brand -->
   <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
      <div class="sidebar-brand-icon">
         <i class="fas fa-hospital"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Posyandu</div>
   </a>

   <!-- Divider -->
   <hr class="sidebar-divider">

   <!-- Loop through sidebar menu -->
   <?php foreach ($filteredMenu as $menu) { ?>
      <?php if (isset($menu['submenu'])) { ?>
         <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#<?= $menu['text'] ?>" aria-expanded="true" aria-controls="<?= $menu['text'] ?>">
               <!-- <i class="fas fa-fw <?= $menu['icon'] ?>"></i> -->
               <span><?= $menu['text'] ?></span>
            </a>
            <div id="<?= $menu['text'] ?>" class="collapse" aria-labelledby="heading<?= $menu['text'] ?>" data-parent="#accordionSidebar">
               <div class="bg-white py-2 collapse-inner rounded">
                  <?php foreach ($menu['submenu'] as $submenu) { ?>
                     <?php if (in_array($userRole, $submenu['role'])) { ?>
                        <?php if (isset($submenu['submenu'])) { ?>
                           <a class="collapse-item" href="#" data-toggle="collapse" data-target="#<?= $submenu['text'] ?>Submenu">
                              <?= $submenu['text'] ?>
                           </a>
                           <div id="<?= $submenu['text'] ?>Submenu" class="collapse" aria-labelledby="heading<?= $submenu['text'] ?>" data-parent="#<?= $menu['text'] ?>">
                              <div class="bg-white py-2 collapse-inner rounded">
                                 <?php foreach ($submenu['submenu'] as $subsubmenu) { ?>
                                    <?php if (in_array($userRole, $subsubmenu['role'])) { ?>
                                       <a class="collapse-item" href="<?= base_url($subsubmenu['url']) ?>">
                                          <?= $subsubmenu['text'] ?>
                                       </a>
                                    <?php } ?>
                                 <?php } ?>
                              </div>
                           </div>
                        <?php } else { ?>
                           <a class="collapse-item" href="<?= base_url($submenu['url']) ?>">
                              <?= $submenu['text'] ?>
                           </a>
                        <?php } ?>
                     <?php } ?>
                  <?php } ?>
               </div>
            </div>
         </li>
      <?php } ?>
   <?php } ?>



   <!-- Divider -->
   <hr class="sidebar-divider">

   <!-- Sidebar Toggler (Sidebar) -->
   <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
   </div>

</ul>
<!-- End of Sidebar -->