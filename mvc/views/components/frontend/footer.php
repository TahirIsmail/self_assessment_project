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
  <div
      class="container-fluid bg-dark text-light mt-5 wow fadeInUp"
      data-wow-delay="0.1s">
      <div class="container">
          <div class="row gx-5">
              <div class="col-lg-4 col-md-6 footer-about">
                  <div
                      class="d-flex flex-column align-items-center justify-content-center text-center h-100 p-4" style="background-color: #d71920;">
                      <a href="index.html" class="navbar-brand">
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
                              <button class="btn btn-dark m-0">Sign Up</button>
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
                              <p class="mb-0">Baylis House, Stoke Poges Ln, Slough SL1 3PB, United Kingdom</p>
                          </div>
                          <div class="d-flex mb-2">
                              <i class="bi bi-envelope-open text-primary me-2"></i>
                              <p class="mb-0">irshadzaidi@gmail.com</p>
                          </div>
                          <div class="d-flex mb-2">
                              <i class="bi bi-telephone text-primary me-2"></i>
                              <p class="mb-0">+7401210310</p>
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
                              <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Education & Teaching</a>
                              <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Security Courses</a>
                              <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>Book now</a>
                              <a class="text-light mb-2" href="#"><i class="bi bi-arrow-right text-primary me-2"></i>All Courses</a>
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