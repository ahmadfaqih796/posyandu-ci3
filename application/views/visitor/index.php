<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

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
                     <li><a class="dropdown-item" href="<?= base_url("home/monitoring_posyandu") ?>">Monitoring Posyandu</a></li>
                     <li><a class="dropdown-item" href="<?= base_url("auth/bumil") ?>">Monitoring Ibu Hamil</a></li>
                  </ul>
               </li>
               <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="#footer">Kontak Kami</a>
               </li>
            </ul>
         </div>
      </div>
   </nav>

   <!-- Header -->
   <div id="home" class="container my-5">
      <div class="row">
         <div class="col-12">
            <h1 class="text-center">Selamat Datang</h1>
            <h1 class="text-center">di Layanan Monitoring</h1>
            <h1 class="text-center">UPT Puskesmas Medan Deli</h1>
         </div>
      </div>
   </div>

   <hr class="border border-3 opacity-75">

   <!-- Content -->
   <div class="container my-5">
      <div class="row">
         <div class="col-md-6 col-xs-12">
            <h1>Visi</h1>
            <ul>
               <li>Terwujudnya masyarakat Kecamatan Medan Deli yang sehat dalam keberkahan, maju dan kondusif.</li>
            </ul>
         </div>
         <div class="col-md-6 col-xs-12">
            <h1>Misi</h1>
            <ul>
               <li>Melaksanakan pelayanan kesehatan yang bermutu dan bermuara pada kepuasan.</li>
               <li>Menggerakan kemandirian dan partisipan masyarakat melalui pemberdayaan masyarakat dalam pembangunan kesehatan.</li>
               <li>Melaksanakan penanggulangan masalah kesehatan di wilayah kerja.</li>
               <li>Meningkatan kualitas SDM yang handal dan sesuai dengan perkembangan zaman.</li>
            </ul>
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