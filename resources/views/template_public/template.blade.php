<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link rel="icon" href="" type="image/x-icon">
  {{-- <link href="{{ URL('public_template/assets/img/favicon.png') }}" rel="icon"> --}}
  <link href="{{ URL('public_template/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ URL('public_template/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ URL('public_template/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ URL('public_template/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ URL('public_template/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ URL('public_template/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ URL('public_template/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ URL('public_template/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ URL('public_template/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: OnePage - v4.10.0
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo">
        <img src="" alt="logo.png">
      </h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="{{ URL('public_template/assets/img/logo.png') }}" alt="" class="img-fluid"></a>-->

      @include('template_public.sidebar')

    </div>
  </header><!-- End Header -->

  {{-- konten --}}
  @yield('konten')


  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3></h3>
            <p> <br><br>
              <strong>Telfon:</strong> {{ $_kontak->whatsapp }}<br>
              <strong>Email:</strong> {{ $_kontak->email }}<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Link Website</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Beranda</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#technologies">Teknologi</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">Profil</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Layanan</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#portfolio">Portofolio</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#partner">Partner</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Artikel</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Layanan Kami</h4>
            <ul>
                @foreach ($_layanan as $layan )
                    <li><i class="bx bx-chevron-right"></i> <a href="#">{{ $layan->name }}</a></li>
                @endforeach
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Dapatkan informasi terbaru kami</h4>
            <p>Tambahkan email untuk mendapatkan informasi terbaru</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span></span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/ -->
          Designed by <a href="https://dayutekno.com/"></a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="tiktok"><i class="bx bxl-tiktok"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ URL('public_template/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ URL('public_template/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ URL('public_template/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ URL('public_template/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ URL('public_template/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ URL('public_template/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ URL('public_template/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ URL('public_template/assets/js/main.js') }}"></script>
  @stack('custom-scripts')

</body>

</html>
