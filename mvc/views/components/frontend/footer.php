  <!-- Footer Start -->
  <style>
      .footer-title.section-title-sm::before {
          width: 90px;
          height: 3px;
      }

      .footer-title::before {
          position: absolute;
          content: "";
          width: 150px;
          height: 5px;
          left: 0;
          bottom: 0;
          background: #d71920;
          border-radius: 2px;
      }

      .footer-title::after {
          position: absolute;
          content: "";
          width: 6px;
          height: 5px;
          bottom: 0px;
          background: white;
          -webkit-animation: section-title-run 5s infinite linear;
          animation: section-title-run 5s infinite linear;
      }

      .footer-title.section-title-sm::after {
          width: 4px;
          height: 3px;
      }

      .footer-title.text-center::after {
          -webkit-animation: section-title-run-center 5s infinite linear;
          animation: section-title-run-center 5s infinite linear;
      }

      .footer-title.section-title-sm::after {
          -webkit-animation: section-title-run-sm 5s infinite linear;
          animation: section-title-run-sm 5s infinite linear;
      }

      @-webkit-keyframes section-title-run {
          0% {
              left: 0;
          }

          50% {
              left: 145px;
          }

          100% {
              left: 0;
          }
      }

      @-webkit-keyframes section-title-run-center {
          0% {
              left: 50%;
              margin-left: -75px;
          }

          50% {
              left: 50%;
              margin-left: 45px;
          }

          100% {
              left: 50%;
              margin-left: -75px;
          }
      }

      @-webkit-keyframes section-title-run-sm {
          0% {
              left: 0;
          }

          50% {
              left: 85px;
          }

          100% {
              left: 0;
          }
      }

      .link-animated a:hover {
          padding-left: 10px;
      }

      .link-animated a {
          transition: .5s;
      }
  </style>
  <!-- <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
      <div class="container py-5">
          <div class="row g-5">
              <div class="col-lg-3 col-md-6">
                  <h4 class="text-white mb-3">Quick Link</h4>
                  <a class="btn btn-link" href="">Home</a>
                  <a class="btn btn-link" href="">All Courses</a>
                  <a class="btn btn-link" href="">Book Now</a>
                  <a class="btn btn-link" href="">Services</a>
                  <a class="btn btn-link" href="">Our Policies</a>
                  <a class="btn btn-link" href="">Contact Us</a>
              </div>
              <div class="col-lg-3 col-md-6">

                  <a class="btn btn-link" href="">Terms & Conditions</a>
                  <a class="btn btn-link" href="">Admission Policy</a>
                  <a class="btn btn-link" href="">Refund Policy</a>
                  <a class="btn btn-link" href="">Quality Assurance</a>
                  <a class="btn btn-link" href="">Complaint Policy</a>
                  <a class="btn btn-link" href="">Health & Safety Policy</a>
                  <a class="btn btn-link" href="">Appeal Policy</a>
                  <a class="btn btn-link" href="">Malpractice & Maladministration Policy</a>
              </div>
              <div class="col-lg-3 col-md-6">
                  <h4 class="text-white mb-3">Contact</h4>
                  <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, ABC, UK</p>
                  <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                  <p class="mb-2"><i class="fa fa-envelope me-3"></i>simplylicensed@example.com</p>

              </div>
              <div class="col-lg-3 col-md-6">
                  <a href="index.html" class="navbar-brand p-0">
                      <img class="w-100" src="<?= base_url('uploads/landing_img/SL-white-logo.png') ?>" alt="Image" style="    width: 200px !important;">
                  </a>
                  <p>Sign up for our newsletter now.</p>
                  <div class="position-relative mx-auto" style="max-width: 400px;">
                      <input class="form-control border-0 w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                      <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                  </div>
                  <div class="d-flex pt-2">
                      <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                      <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                      <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                      <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                  </div>
              </div>
          </div>
      </div>
      <div class="container">
          <div class="copyright">
              <div class="row">
                  <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                      &copy; <a class="border-bottom" href="#">SimplyLicenced</a>, All Right Reserved.

                    
                      Developed By <a class="border-bottom" href="https://oxbridgedigital.com/">OXBRIDGE DIGITAL</a>
                  </div>

              </div>
          </div>
      </div>
  </div> -->



  <!-- Footer Start -->
  <div
      class="container-fluid bg-dark text-light mt-5 wow fadeInUp"
      data-wow-delay="0.1s">
      <div class="container">
          <div class="row gx-5">
              <div class="col-lg-4 col-md-6 footer-about">
                  <div
                      class="d-flex flex-column align-items-center justify-content-center text-center h-100 p-4" style="background-color: #d71920;">
                      <a href="index.html" class="navbar-brand">
                          <!-- <h1 class="m-0 text-white">
                              <i class="fa fa-user-tie me-2"></i>Startup
                          </h1> -->
                          <img class="w-100" src="<?= base_url('uploads/images/SL-red-logo-footer.png') ?>" alt="Image" style="    width: 200px !important;">
                      </a>
                      <p class="mt-3 mb-4">
                          Lorem diam sit erat dolor elitr et, diam lorem justo amet clita
                          stet eos sit. Elitr dolor duo lorem, elitr clita ipsum sea. Diam
                          amet erat lorem stet eos. Diam amet et kasd eos duo.
                      </p>
                      <form action="">
                          <div class="input-group">
                              <input
                                  type="text"
                                  class="form-control border-white p-3"
                                  placeholder="Your Email" />
                              <button class="btn btn-dark">Sign Up</button>
                          </div>
                      </form>
                  </div>
              </div>
              <div class="col-lg-8 col-md-6">
                  <div class="row gx-5">
                      <div class="col-lg-4 col-md-12 pt-5 mb-5">
                          <div
                              class="footer-title section-title-sm position-relative pb-3 mb-4">
                              <h3 class="text-light mb-0">Get In Touch</h3>
                          </div>
                          <div class="d-flex mb-2">
                              <i class="bi bi-geo-alt text-primary me-2"></i>
                              <p class="mb-0">123 Street, New York, USA</p>
                          </div>
                          <div class="d-flex mb-2">
                              <i class="bi bi-envelope-open text-primary me-2"></i>
                              <p class="mb-0">info@example.com</p>
                          </div>
                          <div class="d-flex mb-2">
                              <i class="bi bi-telephone text-primary me-2"></i>
                              <p class="mb-0">+012 345 67890</p>
                          </div>
                          <div class="d-flex mt-4">
                              <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                              <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                              <a class="btn btn-primary btn-square me-2" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                              <a class="btn btn-primary btn-square" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                          </div>
                      </div>
                      <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                          <div
                              class="footer-title section-title-sm position-relative pb-3 mb-4">
                              <h3 class="text-light mb-0">Quick Links</h3>
                          </div>
                          <div
                              class="link-animated d-flex flex-column justify-content-start">
                              <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                              <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>About
                                  Us</a>
                              <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Our
                                  Services</a>
                              <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Meet The
                                  Team</a>
                              <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Latest
                                  Blog</a>
                              <a href="<?php echo base_url('contactus/index') ?>" class="text-light"><i class="bi bi-arrow-right text-primary me-2"></i>Contact
                                  Us</a>
                          </div>
                      </div>
                      <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                          <div
                              class="footer-title section-title-sm position-relative pb-3 mb-4">
                              <h3 class="text-light mb-0">Popular Links</h3>
                          </div>
                          <div
                              class="link-animated d-flex flex-column justify-content-start">
                              <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Home</a>
                              <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>About
                                  Us</a>
                              <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Our
                                  Services</a>
                              <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Meet The
                                  Team</a>
                              <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Latest
                                  Blog</a>
                              <a class="text-light" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Contact
                                  Us</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="container-fluid text-white" style="background: #061429">
      <div class="container text-center">
          <div class="row justify-content-end">
              <div class="col-lg-8 col-md-6 mx-auto">
                  <div
                      class="d-flex align-items-center justify-content-center"
                      style="height: 75px">
                      <p class="mb-0">
                          &copy;
                          <a class="border-bottom text-white" href="#">SimplyLicenced</a>, All Right Reserved.


                          Developed By <a class="border-bottom text-white" href="https://oxbridgedigital.com/">OXBRIDGE DIGITAL</a>
                      </p>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Footer End -->
  </body>

  </html>