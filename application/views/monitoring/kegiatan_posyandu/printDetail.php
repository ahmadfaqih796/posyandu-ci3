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
         text-align: left;
      }

      .table1 {
         width: 100%;
         font-size: 12px;
         text-align: left;
      }

      .table tr td,
      .table tr th {
         padding: 10px;
         /* border: 1px solid black; */
      }

      .table tr td:nth-child(1),
      .table tr th:nth-child(1) {
         width: 200px;
      }

      .table tr td:nth-child(2),
      .table tr th:nth-child(2) {
         width: 10px;
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
            <img src="<?= base_url(); ?>/assets/img/dinkes_medan.png" border="0" alt="Logo" class="logo">
         </td>
         <td>
            <h1>DINAS KESEHATAN KOTA MEDAN</h1>
            <h1>UPT PUSKESMAS MEDAN DELI</h1>
            <br>
            <p>Jl. K.L. Yos Sudarso KM. 11, Kota Bangun, Kec. Medan Deli, Kota Medan, Sumatera Utara 20244</p>
            <p>MEDAN</p>
         </td>
         <td>
            <img src="<?= base_url(); ?>/assets/img/puskesmas.png" border="0" alt="Logo" class="logo">
         </td>
      </tr>
   </table>
   <h1><?= $title ?></h1>
   <table class="table" width="100%" cellspacing="0">
      <tbody>
         <tr>
            <td>Nama Posyandu</td>
            <td>:</td>
            <td><?= $detail['n_posyandu'] ?></td>
         </tr>
         <tr>
            <td>Nama Kegiatan</td>
            <td>:</td>
            <td><?= $detail['n_kegiatan'] ?></td>
         </tr>
         <tr>
            <td>Tanggal Pengajuan</td>
            <td>:</td>
            <td><?= $detail['created_at'] ?></td>
         </tr>
         <tr>
            <td>Tanggal Disetujui</td>
            <td>:</td>
            <td><?= ($detail['updated_at'] == $detail['created_at'] ? '-' : $detail['updated_at']) ?></td>
         </tr>
         <tr>
            <td>Sasaran</td>
            <td>:</td>
            <td><?= $detail['sasaran'] ?></td>
         </tr>
         <tr>
            <td>Parameter Keberhasilan</td>
            <td>:</td>
            <td><?= $detail['parameter_keberhasilan'] ?></td>
         </tr>
         <tr>
            <td>Dibuat oleh</td>
            <td>:</td>
            <td><?= $detail['name'] ?></td>
         </tr>
         <tr>
            <td>Disetujui</td>
            <td>:</td>
            <td><?= $detail['is_verified'] ? 'Sudah' : 'Belum' ?></td>
         </tr>
      </tbody>
   </table>
   <h1>Pertanyaan</h1>
   <table class="table1" width="100%" cellspacing="0">
      <tbody>
         <tr>
            <td>1. Adanya pemberitahuan lewat media mana saja saat H-1 pelaksanaan posyandu</td>
            <td><?= $detail['j1'] ?></td>
         </tr>
         <tr>
            <td>2. Lokasi pelaksanaan posyandu tetap</td>
            <td><?= $detail['j2'] ?></td>
         </tr>
         <tr>
            <td>3. Pelaksanaan sesuai dengan jadwal yang ditentukan</td>
            <td><?= $detail['j3'] ?></td>
         </tr>
         <tr>
            <td>4. Tim pelaksana hadir tepat sebelum dimulainya kegiatan</td>
            <td><?= $detail['j4'] ?></td>
         </tr>
         <tr>
            <td>5. Hari ini dilaksanakan penyuluhan</td>
            <td><?= $detail['j5'] ?></td>
         </tr>
         <tr>
            <td>6. Ada kunjungan rumah yang dilakukan untuk kegiatan hari ini</td>
            <td><?= $detail['j6'] ?></td>
         </tr>
         <tr>
            <td>7. Masukan jumlah anak yang hadir langsung ke tempat posyandu</td>
            <td><?= $detail['j7'] ?></td>
         </tr>
         <tr>
            <td>8. Jumlah anak yang tidak datang</td>
            <td><?= $detail['j8'] ?></td>
         </tr>
         <tr>
            <td>9. Jumlah anak yang di imunisasi ditempat</td>
            <td><?= $detail['j9'] ?></td>
         </tr>
         <tr>
            <td>10. Jumlah anak yang dilakukan kunjungan rumah</td>
            <td><?= $detail['j10'] ?></td>
         </tr>
      </tbody>
   </table>
</body>

</html>