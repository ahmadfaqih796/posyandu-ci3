<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Monitoring Ibu Hamil</title>

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>

<body>
   <!-- Navbar -->
   <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
      <div class="container-fluid">
         <a class="navbar-brand" href="#">Navbar</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               <!-- <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">Home</a>
               </li> -->
               <li class="nav-item">
                  <a class="nav-link" href="#home">Home</a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                     Layanan
                  </a>
                  <ul class="dropdown-menu">
                     <li><a class="dropdown-item" href="#">Monitoring Posyandu</a></li>
                     <li><a class="dropdown-item" href="#">Monitoring Ibu Hamil</a></li>
                  </ul>
               </li>
               <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="#footer">Kontak Kami</a>
               </li>
            </ul>
         </div>
      </div>
   </nav>

   <!-- Content -->
   <div class="container my-5">
      <div class="row">
         <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <!-- <th>No</th> -->
                     <th>Nama Posyandu</th>
                     <th>Alamat</th>
                     <th>Tanggal</th>
                     <th>Jam Buka</th>
                     <th>Jam Tutup</th>
                  </tr>
               </thead>
               <tbody>
                  <?php foreach ($data as $field) : ?>
                     <tr>
                        <!-- <td><?= $no++ ?></td> -->
                        <td><?= $field['n_posyandu'] ?></td>
                        <td><?= $field['alamat'] ?></td>
                        <td><?= $field['tanggal'] ?></td>
                        <td><?= $field['jam_buka'] ?></td>
                        <td><?= $field['jam_tutup'] ?></td>
                     </tr>
                  <?php endforeach; ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>

   <!-- Footer -->
   <footer id="footer" class="text-center text-lg-start text-muted" style="background-color: #e3f2fd;">
      <div class="text-center p-4">
         <h3>
            UPT Puskesmas Medan Deli
         </h3>
         <p>
            Jl. K.L. Yos Sudarso Km 11, Kel. Kota Bangun,
         </p>
         <p>
            Kec. Medan Deli, Kab. Deli Serdang, Sumatera Utara 20244
         </p>
         <p>
            Telp. 061-6854190
         </p>
      </div>

      <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
         © UPT Puskesmas Medan Deli 2024
      </div>
   </footer>
</body>

</html>