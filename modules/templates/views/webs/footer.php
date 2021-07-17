  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">



    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <img src="<?= base_url(); ?>assets/website/img/logo1.png" alt="">
              <span>Event Tech</span>
            </a>
            <p>Platform jasa penyedia layanan event - event yang berbasis teknologi baik dari seminar, webinar,
              workshop, dan lomba yang berkaitan dengan teknologi..</p>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram bx bxl-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin bx bxl-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Event List</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Special Offer</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Media Partner</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contact Us</h4>
            <p>
              Jalan Pemuda No.33,Semarang,Jawa Tengah<br><br>
              <strong>Phone:</strong> +62 899-9999-9999<br>
              <strong>Email:</strong> eventtech@gmail.com<br>
            </p>
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Event Tech</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?= base_url('assets/website') ?>/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="<?= base_url('assets/website') ?>/vendor/aos/aos.js"></script>
  <!-- <script src="<?= base_url('assets/website') ?>/vendor/php-email-form/validate.js"></script> -->
  <script src="<?= base_url('assets/website') ?>/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?= base_url('assets/website') ?>/vendor/purecounter/purecounter.js"></script>
  <script src="<?= base_url('assets/website') ?>/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?= base_url('assets/website') ?>/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?= base_url('assets/website') ?>/vendor/fontawesome/js/all.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
  <!-- Template Main JS File -->
  <script src="<?= base_url('assets/website') ?>/js/main.js"></script>







  <!-- <script>
    $('.carousel').carousel({
      interval: 5000
    })
  </script> -->
  <script>
    var myCarousel = document.querySelector('.carousel')
    var carousel = new bootstrap.Carousel(myCarousel, {
      interval: 2000,
      wrap: false
    })
  </script>
  </body>

  </html>