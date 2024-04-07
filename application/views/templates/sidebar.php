<?php
// Array untuk menu sidebar
/* 
notes:
- admin = 1
- kader = 2
- anak = 3
- Poli Gizi = 4
- ibu hamil = 5
- Koordinator Imunisasi = 6
- Bidan = 7
- Poli Kia = 8
*/
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
      "role" => array(1, 2, 4, 6, 8),
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
            "url" => "management/posyandu",
            "text" => "Posyandu",
            "icon" => "fas fa-fw fa-hospital",
            "role" => array(1),
         ),
         array(
            "url" => "management/schedule",
            "text" => "Jadwal Posyandu",
            "icon" => "fas fa-fw fa-hospital",
            "role" => array(1, 4, 8),
         ),
         // array(
         //    "url" => "management/artikel",
         //    "text" => "Artikel",
         //    "icon" => "fas fa-fw fa-book",
         //    "role" => array(1),
         // ),
         array(
            "url" => "management/kegiatan",
            "text" => "Kegiatan",
            "icon" => "fas fa-fw fa-book",
            "role" => array(1),
         ),
         array(
            "url" => "management/ibu",
            "text" => "Ibu",
            "icon" => "fas fa-fw fa-female",
            "role" => array(2),
         ),
         array(
            "url" => "management/anak",
            "text" => "Anak",
            "icon" => "fas fa-fw fa-child",
            "role" => array(2),
         ),
         array(
            "url" => "management/imunisasi",
            "text" => "Imunisasi",
            "icon" => "fas fa-fw fa-child",
            "role" => array(6),
         ),
         array(
            "url" => "management/perkembangan_anak",
            "text" => "Perkembangan Anak",
            "icon" => "fas fa-fw fa-child",
            "role" => array(2, 8),
         ),
      )
   ),
   array(
      "text" => "Data Anak",
      "role" => array(1, 2, 4, 6, 8),
      "submenu" => array(
         array(
            "url" => "data/anak/timbangan",
            "text" => "Timbangan",
            "icon" => "fas fa-fw fa-book",
            "role" => array(1, 2),
         ),
         array(
            "url" => "data/anak/gizi_anak",
            "text" => "Status Gizi",
            "icon" => "fas fa-fw fa-book",
            "role" => array(1, 2, 4, 8),
         ),
         array(
            "url" => "data/anak/kematian",
            "text" => "Kematian Anak",
            "icon" => "fas fa-fw fa-book",
            "role" => array(1, 2),
         ),
      )
   ),
   array(
      "text" => "Data Ibu Hamil",
      "role" => array(1, 7),
      "submenu" => array(
         array(
            "url" => "data/ibu_hamil/ibu_hamil",
            "text" => "Ibu Hamil",
            "icon" => "fas fa-fw fa-clipboard",
            "role" => array(1, 7),
         ),
         array(
            "url" => "data/ibu_hamil/kehamilan",
            "text" => "Kehamilan",
            "icon" => "fas fa-fw fa-book",
            "role" => array(1, 7),
         ),
         array(
            "url" => "data/ibu_hamil/kematian",
            "text" => "Kematian Ibu Hamil",
            "icon" => "fas fa-fw fa-book",
            "role" => array(1, 7),
         ),
      )
   ),
   array(
      "text" => "Monitoring",
      "role" => array(1, 2, 7),
      "submenu" => array(
         array(
            "url" => "monitoring/ibu_hamil",
            "text" => "Ibu Hamil",
            "icon" => "fas fa-fw fa-clipboard",
            "role" => array(1, 7),
         ),
         array(
            "url" => "monitoring/gizi_ibu_hamil",
            "text" => "Status Gizi Ibu Hamil",
            "icon" => "fas fa-fw fa-clipboard",
            "role" => array(1, 7),
         ),
         array(
            "url" => "monitoring/kegiatan_posyandu",
            "text" => "Kegiatan Posyandu",
            "icon" => "fas fa-fw fa-clipboard",
            "role" => array(1, 2),
         ),
      )
   ),
   array(
      "text" => "Laporan",
      "role" => array(1, 2, 6),
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
         array(
            "url" => "laporan/imunisasi",
            "text" => "Data Imunisasi",
            "icon" => "fas fa-fw fa-book",
            "role" => array(6),
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
      <div class="sidebar-brand-text mx-3">SIMPONI</div>
      <!-- SIMPONI - UPT PUSKESMAS MEDAN DELI -->
   </a>

   <!-- Loop through sidebar menu -->
   <?php foreach ($filteredMenu as $menu) { ?>
      <?php if (isset($menu['submenu'])) { ?>
         <!-- Divider -->
         <hr class="sidebar-divider">
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