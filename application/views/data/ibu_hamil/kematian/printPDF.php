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
   <h1><?= $title ?></h1>
   <table class="table" width="100%" cellspacing="0">
      <thead>
         <tr>
            <th>No</th>
            <th>Nama Ibu Hamil</th>
            <th>Tanggal Kematian</th>
            <th>Usia</th>
            <th>Penyebab</th>
            <th>Jenis</th>
            <th>Meninggal di</th>
            <th>Keterangan</th>
         </tr>
      </thead>
      <tbody>
         <?php foreach ($users as $field) :
         ?>
            <tr>
               <td><?= $no++ ?></td>
               <td><?= $field['n_ibu'] ?></td>
               <td><?= $field['tgl_kematian'] ?></td>
               <td><?= $field['usia'] ?> bulan</td>
               <td><?= $field['penyebab'] ?></td>
               <td><?= $field['jenis'] ?></td>
               <td><?= $field['meninggal_di'] ?></td>
               <td><?= $field['keterangan'] ?></td>
            </tr>
         <?php endforeach; ?>
      </tbody>
   </table>
</body>

</html>