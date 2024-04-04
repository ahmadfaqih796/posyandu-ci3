<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?= $title ?></title>
   <style>
      /* Styling for header */
      .header {
         width: 100%;
         padding: 10px;
         text-align: center;
         border-bottom: 1px solid black;
      }

      .logo {
         width: 100px;
      }

      .table {
         border-collapse: collapse;
         width: 100%;
         font-size: 12px;
         text-align: center;
      }

      .table tr td,
      .table tr th {
         padding: 10px;
         border: 1px solid black;
      }

      h1 {
         font-size: 20px;
         text-align: center;
      }
   </style>
</head>

<body>
   <table class="header">
      <tr>
         <td>
            <img src="<?= $_SERVER['DOCUMENT_ROOT']; ?>/assets/img/dinkes_medan.png" border="0" alt="Logo" class="logo">
         </td>
         <td>
            <h1>DINAS KESEHATAN KOTA MEDAN</h1>
            <h1>UPT PUSKESMAS MEDAN DELI</h1>
            <br>
            <p>Jl. K.L. Yos Sudarso KM. 11, Kota Bangun, Kec. Medan Deli, Kota Medan, Sumatera Utara 20244</p>
            <p>MEDAN</p>
         </td>
         <td>
            <img src="<?= $_SERVER['DOCUMENT_ROOT']; ?>/assets/img/puskesmas.png" border="0" alt="Logo" class="logo">
         </td>
      </tr>
   </table>
   <h1>Monitoring Ibu Hamil</h1>
   <table class="table" width="100%" cellspacing="0">
      <thead>
         <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Hamil ke</th>
            <!-- <th>Kunjugan</th>
            <th>Keluhan</th>
            <th>Sesi</th> -->
            <th>Tanggal Periksa</th>
            <th>Kunjungan Berikutnya</th>
            <th>Status Standar 7T</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach ($users as $field) :
            $standar7t = [
               $field['s_timbang_berat_badan'],
               $field['s_tekanan_darah'],
               $field['s_tinggi_puncak_rahim'],
               $field['s_vaksinasi_tetanus'],
               $field['s_tablet_zat_besi'],
               $field['s_tes_laboratorium'],
               $field['s_temu_wicara'],
            ];
            $result = 0;
            foreach ($standar7t as $value) {
               if (strpos($value, 'belum') !== false) {
                  $result = 1;
                  break;
               }
            }
         ?>
            <tr>
               <td><?= $no++ ?></td>
               <td><?= $field['n_ibu'] ?></td>
               <td><?= $field['hamil_ke'] ?></td>
               <!-- <td><?= $field['kunjungan'] ?></td>
               <td><?= $field['keluhan'] ?></td>
               <td><?= $field['sesi'] ?></td> -->
               <td><?= $field['tanggal_periksa'] ?></td>
               <td><?= $field['kunjungan_berikutnya'] ?></td>
               <td><?= $result == 1 ? 'Belum' : 'Sudah' ?></td>
            </tr>
         <?php endforeach; ?>
      </tbody>
   </table>
</body>

</html>