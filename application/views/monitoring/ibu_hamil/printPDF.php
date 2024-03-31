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
         text-align: center;
      }
   </style>
</head>

<body>
   <table class="header">
      <tr>
         <td>
            <img src="<?= $_SERVER['DOCUMENT_ROOT']; ?>/assets/img/logo-posyandu.png" border="0" alt="Logo" class="logo">
         </td>
         <td>
            <h1>Posyandu</h1>
            <br>
            <p>Jl.Pramuka Rt.03 /03 Kecamatan Rawalumu Kota Bekasi</p>
            <p>No. Telepon: 123-456-789</p>
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
            <th>Kunjugan</th>
            <th>Keluhan</th>
            <th>Sesi</th>
            <th>Tanggal Periksa</th>
            <th>Kunjungan Berikutnya</th>
            <!-- <th>Status Standar 7T</th> -->
         </tr>
      </thead>
      <tbody>
         <?php foreach ($users as $field) : ?>
            <tr>
               <td><?= $no++ ?></td>
               <td><?= $field['n_ibu'] ?></td>
               <td><?= $field['hamil_ke'] ?></td>
               <td><?= $field['kunjungan'] ?></td>
               <td><?= $field['keluhan'] ?></td>
               <td><?= $field['sesi'] ?></td>
               <td><?= $field['tanggal_periksa'] ?></td>
               <td><?= $field['kunjungan_berikutnya'] ?></td>
            </tr>
         <?php endforeach; ?>
      </tbody>
   </table>
</body>

</html>