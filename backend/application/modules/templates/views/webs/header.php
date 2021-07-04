<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $title; ?></title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?= base_url('assets/website') ?>/img/logo1.png" rel="icon">
  <link href="<?= base_url('assets/website') ?>/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?= base_url('assets/website') ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/website') ?>/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?= base_url('assets/website') ?>/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?= base_url('assets/website') ?>/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?= base_url('assets/website') ?>/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/website') ?>/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/website') ?>/vendor/fonawesome/css/all.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?= base_url('assets/website') ?>/css/style.css" rel="stylesheet">

  <!-- Midtrans -->
  <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="<CLIENT-KEY>"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> -->
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="<?= base_url('assets/website') ?>/img/logo1.png" alt="">
        <span>Event Tech</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#home">Home</a></li>
          <li><a class="nav-link scrollto" href="<?= base_url('website/event') ?>">Event</a></li>
          <li><a class="nav-link scrollto" href="<?= base_url('website/pricelist') ?>">Price List</a></li>
          <li><a class="nav-link scrollto" href="<?= base_url('website/blog') ?>">Blog</a></li>
          <li><a class="getstarted scrollto shadow" href="">
              <i class="fas fa-user-alt me-2"></i>
              Login
            </a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->