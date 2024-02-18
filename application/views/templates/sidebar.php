<?php
// Array untuk menu sidebar
$sidebarMenu = array(
   array(
      "text" => "Management",
      "role" => array(1, 2),
      "submenu" => array(
         array(
            "url" => "management/users",
            "text" => "Users",
            "icon" => "fas fa-fw fa-users",
            "role" => array(1, 2),
         ),
         array(
            "url" => "management/kaders",
            "text" => "Kader",
            "icon" => "fas fa-fw fa-user",
            "role" => array(1),
         ),
         array(
            "url" => "management/posyandu",
            "text" => "Posyandu",
            "icon" => "fas fa-fw fa-hospital",
            "role" => array(1),
         ),
         array(
            "url" => "management/ibu",
            "text" => "Ibu",
            "icon" => "fas fa-fw fa-female",
            "role" => array(1, 2),
         ),
         array(
            "url" => "management/anak",
            "text" => "Anak",
            "icon" => "fas fa-fw fa-child",
            "role" => array(1, 2),
         ),
      )
   ),
   array(
      "text" => "Laporan",
      "role" => array(1, 2),
      "submenu" => array(
         array(
            "url" => "laporan/users",
            "text" => "Perkembangan Anak",
            "icon" => "fas fa-fw fa-clipboard",
            "role" => array(1, 2),
         ),
         array(
            "url" => "laporan/kaders",
            "text" => "Data Posyandu",
            "icon" => "fas fa-fw fa-book",
            "role" => array(1),
         ),
      )
   )
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
         <div class="sidebar-heading">
            <?= $menu['text'] ?>
         </div>
         <?php foreach ($menu['submenu'] as $submenu) { ?>
            <?php if (in_array($userRole, $submenu['role'])) {
               $isActive = (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], $submenu['url']) !== false) ? 'active' : '';
            ?>
               <li class="nav-item <?= $isActive ?>">
                  <a class="nav-link" href="<?= base_url($submenu['url']) ?>">
                     <i class="<?= $submenu['icon'] ?>"></i>
                     <span><?= $submenu['text'] ?></span>
                  </a>
               </li>
            <?php } ?>
         <?php } ?>
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