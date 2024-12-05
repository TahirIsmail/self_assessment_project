<?php
$is_logged_in = $this->session->userdata('loggedin');

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Thelse</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link href="<?= base_url('uploads/landing_img/favicon.png'); ?>" rel="icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url('assets/inilabs/owlcarousel/owl.carousel.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/inilabs/animate/animate.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/inilabs/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/inilabs/landing_style.css'); ?>" rel="stylesheet" type="text/css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/pace/pace.css') ?>">
</head>
<style>
  .nav-mega {
    width: 100% !important;
    padding: 20px;
  }

  .nav-mega .dropdown {
    position: static !important;
  }

  .nav-mega .dropdown-menu.mega-menu {
    box-sizing: border-box !important;
    border-top-left-radius: 0 !important;
    border-top-right-radius: 0 !important;
    min-width: auto !important;
    width: 100% !important;
    margin-top: 0 !important;
    padding: 0 !important;
    border-color: #ccc !important;
  }

  .nav-mega .dropdown-menu.mega-menu-first {
    left: auto !important;
    right: 0 !important;
  }

  .nav-mega .dropdown-menu.mega-menu-second {
    left: 0 !important;
    right: auto !important;
  }

  .nav-mega .dropdown-menu.mega-menu>li {
    padding: 20px !important;
  }

  .nav-mega .dropdown-menu.mega-menu .media-list .media {
    padding: 10px !important;
    font-size: 11px !important;
  }

  .nav-mega .dropdown-menu.mega-menu .media-list .media-heading {
    font-size: 16px !important;
  }

  /* Flexbox layout to position elements */
  .navbar-inner {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .navbar-brand {
    margin-right: 20px;
  }

  .navbar-collapse {
    flex-grow: 1;
    justify-content: flex-end;
  }

  .nav-item {
    margin-left: 20px;
  }

  .navbar-toggler {
    margin-left: auto;
  }
</style>

<body>

  <div class="navbar  navbar-expand-lg navbar-dark px-2 py-3 py-lg-0">
    <div class="navbar-inner ">

      <ul class="nav nav-mega">
        <a href="<?= base_url('home/index') ?>" class="navbar-brand p-0">
          <img class="w-100" src="<?= base_url('uploads/landing_img/SL-white-logo.png') ?>" alt="Image" style="width: 150px !important;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
          <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse ms-auto " id="navbarCollapse">
          <div class="navbar-nav py-0">
            <a href="<?= base_url('home/index') ?>" class="nav-item nav-link <?= ($this->uri->segment(1) == 'home') ? 'active' : '' ?>">Home</a>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle nav-item nav-link" data-bs-toggle="dropdown">
              Education & Training 
              <b class="caret"></b>
              </a>
              <ul class="dropdown-menu mega-menu mega-menu-second">
                <li>
                  <div class="row">
                    <div class="col-lg-12 col-md-12">
                      <div class="row">
                        <ul class="media-list col-lg-6 col-md-6 col-sm-12">
                          <li class="media">
                            <div class="media-body">
                              <h5 class="media-heading">Education Training</h5>
                              <ul class="list-unstyled">
                                <li><a href="#" class="dropdown-item">Level 3 Award in Education and Training (AET) - £149</a></li>
                                <li><a href="#" class="dropdown-item">Level 4 Certificate in Education and Training (CET) - £349</a></li>
                                <li><a href="#" class="dropdown-item">Level 5 Diploma in Education and Training (DET) - £599</a></li>
                              </ul>
                            </div>
                          </li>
                        </ul>
                        <ul class="media-list col-lg-6 col-md-6 col-sm-12">
                          <li class="media">
                            <div class="media-body">
                              <h5 class="media-heading"> Teachers Training 
                              </h5>
                                  <ul class="list-unstyled">
                                    <li><a href="#" class="dropdown-item">Level 2 Certificate in Supporting Teaching and Learning in Schools - £ 569
                                      </a></li>
                                    <li><a href="#" class="dropdown-item">Level 3 Award in Supporting Teaching and Learning in Schools - £ 199
                                      </a></li>
                                    <li><a href="#" class="dropdown-item">Level 4 Certificate for Higher Level Teaching Assistant - £ 369
                                      </a></li>
                                  </ul>
                            </div>
                          </li>
                        </ul>
                      </div>
                      <hr>
                      <div class="row">
                        <ul class="media-list col-lg-6 col-md-6 col-sm-12">
                          <li class="media">
                            <div class="media-body">
                              <h5 class="media-heading">Assessors Training
                              </h5>
                              <ul class="list-unstyled">
                                <li><a href="#" class="dropdown-item">Level 3 Certificate in Assessing Vocational Achievement - £369 (CAVA)</a></li>
                                <li><a href="#" class="dropdown-item">Level 4 Award in Internal Quality Assurance of Assessment Processes - £349 (IQA)</a></li>
                                <li><a href="#" class="dropdown-item">Level 4 Certificate in Leading Internal Quality Assurance - £399</a></li>
                              </ul>
                            </div>
                          </li>
                        </ul>
                        <ul class="media-list col-lg-6 col-md-6 col-sm-12">
                          <li class="media">
                            <div class="media-body">
                              <h5 class="media-heading">Functional Skills Training</h5>
                              <ul class="list-unstyled">
                              <li><a href="#" class="dropdown-item">Level 1 Award in English & Mathematics
                              </a></li>
                              <li><a href="#" class="dropdown-item">Level 2 Award in English & Mathematics
                              </a></li>
                                <li><a href="#" class="dropdown-item">Level 3 Award in Mathematics for Numeracy Teaching - £249</a></li>
                                <li><a href="#" class="dropdown-item">Level 3 Award in English for Literacy and Language Teaching- £249</a></li>
                              </ul>
                            </div>
                          </li>
                        </ul>
                      </div>
                    </div>

                  </div>
                </li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle nav-item nav-link" data-bs-toggle="dropdown">
                Security Courses <b class="caret"></b>
              </a>
              <ul class="dropdown-menu mega-menu mega-menu-second">
                <li>
                  <div class="row">
                    <div class="col-lg-12 col-md-12">
                      <div class="row">
                        <ul class="media-list col-lg-6 col-md-6 col-sm-12">
                          <li class="media">
                            <div class="media-body">
                              <h5 class="media-heading"> SIA Security Courses</h5>
                              <ul class="list-unstyled">
                                <li><a href="#" class="dropdown-item">Level 2 Award for Security Officers in the Private Security Industry </a></li>
                                <li><a href="#" class="dropdown-item">Level 2 Online Award for Security Officers in the Private Security Industry (Virtual Learning)</a></li>
                                <li><a href="#" class="dropdown-item">Level 2 Award for Door Supervisors in the Private Security Industry</a></li>
                                <li><a href="#" class="dropdown-item">Level 2 Online Award for Door Supervisors in the Private Security Industry (Virtual Learning)</a></li>
                                <li><a href="#" class="dropdown-item">Level 2 Award for CCTV Operators "Public Space Surveillance" in the Private Security Industry</a></li>
                                <li><a href="#" class="dropdown-item">Level 2 Award for CCTV Operators "Public Space Surveillance" in the Private Security Industry (Virtual Learning)</a></li>
                                <li><a href="#" class="dropdown-item">Level 3 Certificate for Close Protection Operatives in the Private Security Industry</a></li>
                                <li><a href="#" class="dropdown-item">Level 3 Award in Emergency First Aid at Work (RQF) NEW April 2022</a></li>




















                                <li><a href="#" class="dropdown-item">Level 3 Award in Emergency First Aid at Work (RQF) NEW April 2022 (Virtual Learning)</a></li>
                                <li><a href="#" class="dropdown-item">Level 3 Award in First Aid at Work (RQF) NEW April 2022</a></li>
                                <li><a href="#" class="dropdown-item">Level 6 Award for Security Officers in the Private Security Industry (Scotland) at SCQF</a></li>
                                <li><a href="#" class="dropdown-item">Level 6 Award for Security Officers in the Private Security Industry (Scotland) at SCQF (Virtual Learning)</a></li>
                                <li><a href="#" class="dropdown-item">Level 6 Award for Door Supervisors in the Private Security Industry (Scotland) at SCQF</a></li>
                                <li><a href="#" class="dropdown-item">Level 6 Award for Door Supervisors in the Private Security Industry (Scotland) at SCQF (Virtual Learning)</a></li>
                                <li><a href="#" class="dropdown-item">Level 6 Award for CCTV Operators "Public Space Surveillance" in the Private Security Industry</a></li>
                                <li><a href="#" class="dropdown-item">Level 6 Award in Emergency First Aid at Work at SCQF</a></li>
                                <li><a href="#" class="dropdown-item">Level 6 Award in First Aid at Work at SCQF</a></li>
                              </ul>
                            </div>
                          </li>
                        </ul>
                        <ul class="media-list col-lg-6 col-md-6 col-sm-12">
                          <li class="media">
                            <div class="media-body">
                              <h5 class="media-heading">Refresher Security Courses</h5>
                              <ul class="list-unstyled">
                                <li><a href="#" class="dropdown-item">Level 2 Award for Security Officers in the Private Security Industry (Refresher)
                                  </a></li>
                                <li><a href="#" class="dropdown-item">Level 2 Award for Door Supervisors in the Private Security Industry (Refresher)</a></li>
                                <li><a href="#" class="dropdown-item">Level 2 Online Award for Door Supervisors in the Private Security Industry (Refresher) (Virtual Learning)
                                  </a></li>
                                <li><a href="#" class="dropdown-item">Level 3 Certificate for Close Protection Operative in the Private Security Industry (Refresher)
                                  </a></li>
                                <li><a href="#" class="dropdown-item">Level 6 Award for Security Officers in the Private Security Industry (Scotland) at SCQF (Refresher)</a></li>
                                <li><a href="#" class="dropdown-item">Level 6 Award for Security Officers in the Private Security Industry (Scotland) at SCQF (Refresher) (Virtual Learning)
                                  </a></li>
                                <li><a href="#" class="dropdown-item">Level 6 Award for Door Supervisors in the Private Security Industry (Scotland) at SCQF (Refresher)
                                  </a></li>
                                <li><a href="#" class="dropdown-item">Level 6 Award for Door Supervisors in the Private Security Industry (Scotland) at SCQF (Refresher) (Virtual Learning)</a></li>
                              </ul>
                            </div>
                          </li>
                        </ul>
                      </div>

                    </div>

                  </div>
                </li>
              </ul>
            </li>
            <a href="<?= base_url('service') ?>" class="nav-item nav-link book-now <?= ($this->uri->segment(1) == 'service') ? 'active' : '' ?>">Book Now</a>
            <div class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle  <?= ($this->uri->segment(1) == 'course') ? 'active' : '' ?>" data-bs-toggle="dropdown">All Courses</a>
              <div class="dropdown-menu m-0">
                <?php foreach ($course_names as $course): ?>
                  <a href="<?= base_url('course/index/' . $course['slug']) ?>" class="dropdown-item"><?= htmlspecialchars($course['course_name']) ?></a>
                <?php endforeach; ?>
              </div>
            </div>
            <a href="<?= base_url('contactus/index') ?>" class="nav-item nav-link <?= ($this->uri->segment(1) == 'contactus') ? 'active' : '' ?>">Contact Us</a>


          </div>
          <button type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal">
            <i class="fa fa-search"></i>
          </button>
          <?php if ($is_logged_in) { ?>
            <a href="<?= base_url('dashboard/index') ?>" class="btn btn-primary py-2 px-4 ms-3">DASHBOARD</a>
          <?php } else { ?>

            <a href="<?= base_url('signin/index') ?>" class="btn btn-primary py-2 px-4 ms-3">LOGIN</a>
            <a href="<?= base_url('signup/page') ?>" class="nav-item nav-link">SIGN UP</a>
          <?php } ?>
        </div>
      </ul>
    </div>
  </div>
  <div class="container-fluid position-relative p-0">

    <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="w-100" src="<?= base_url('uploads/landing_img/sld2.png') ?>" alt="Image">
          <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
            <div class="p-3" style="max-width: 900px;">

              <h1 class="text-white mb-md-4 animated zoomIn" style="margin-top: 110px; text-align: left;">Simply Trained</h1>
              <h1 class="text-white mb-md-4 animated zoomIn" style="text-align: left;">Simply Licenced</h1>
              <h1 class="text-white mb-md-4 animated zoomIn" style="text-align: left;">Simply Get a Job</h1>
              <a href="quote.html" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">More Details</a>
              <a href="" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
            </div>

            <div class="cont1" style="margin-top: 40px;">
              <div class="card-new">
                <div class="row">

                  <div class="col-lg-12 col-md-12 col-sm-12">

                    <div class="our_solution_category ">

                      <div class="solution_cards_box ">

                        <div class="solution_card">

                          <div class="hover_color_bubble"></div>
                          <div class="ph">7869 1234 7869 3245</div>

                          <div class="card_boxi1"></div>

                          <div class="solu_title ">
                            <div class="name">LICENSE</div>
                          </div>

                          <div class="simitry">

                            <div class="solu_description">
                              <p>
                                Security Industry Authority
                              </p>

                            </div>
                            <div class="so_top_icon">

                              <img src="<?= base_url('uploads/images/team-1.jpg') ?>" width="40" viewBox="0 0 512 512" height="50" id="Layer_1">

                              </img>
                            </div>
                          </div>
                          <div class="xp">
                            <div class="designation">EXPIRES</div>
                            <div class="designation1">18 JUNE 20XX</div>
                            <div class="designation">MR JOHNS</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-new">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="our_solution_category">
                      <div class="solution_cards_box">
                        <div class="solution_card">
                          <div class="hover_color_bubble"></div>

                          <div class="ph">4321 1234 7869 3245</div>

                          <div class="card_boxi2"></div>

                          <div class="solu_title">
                            <div class="name">LICENSE</div>
                          </div>

                          <div class="simitry">

                            <div class="solu_description">
                              <p>
                                Security Industry Authority
                              </p>

                            </div>
                            <div class="so_top_icon">

                              <img src="<?= base_url('uploads/images/team-2.jpg') ?>" width="40" viewBox="0 0 512 512" height="50" id="Layer_1">

                              </img>
                            </div>
                          </div>
                          <div class="xp">
                            <div class="designation">EXPIRES</div>
                            <div class="designation1">07 OCT 20XX</div>
                            <div class="designation">MRS ANNA</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="card-new">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="our_solution_category">
                      <div class="solution_cards_box">
                        <div class="solution_card">
                          <div class="hover_color_bubble"></div>

                          <div class="ph">1234 1234 7869 3245</div>

                          <div class="card_boxi3"></div>

                          <div class="solu_title">
                            <div class="name">LICENSE</div>
                          </div>

                          <div class="simitry">

                            <div class="solu_description">
                              <p>
                                Security Industry Authority
                              </p>

                            </div>
                            <div class="so_top_icon">

                              <img src="<?= base_url('uploads/images/team-3.jpg') ?>" width="40" viewBox="0 0 512 512" height="50" id="Layer_1">

                              </img>
                            </div>
                          </div>
                          <div class="xp">
                            <div class="designation">EXPIRES</div>
                            <div class="designation1">31 APR 20XX</div>
                            <div class="designation">MR ADAM</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-new">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="our_solution_category">
                      <div class="solution_cards_box">
                        <div class="solution_card">
                          <div class="hover_color_bubble"></div>

                          <div class="ph">1111 1234 7869 3245</div>

                          <div class="card_boxi4"></div>

                          <div class="solu_title">
                            <div class="name">LICENSE</div>
                          </div>

                          <div class="simitry">

                            <div class="solu_description">
                              <p>
                                Security Industry Authority
                              </p>

                            </div>
                            <div class="so_top_icon">

                              <img src="<?= base_url('uploads/images/team-4.jpg') ?>" width="40" viewBox="0 0 512 512" height="50" id="Layer_1">

                              </img>
                            </div>
                          </div>
                          <div class="xp">
                            <div class="designation">EXPIRES</div>
                            <div class="designation1">27 JAN 20XX</div>
                            <div class="designation">MRS JULIE</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="card-new">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="our_solution_category">
                      <div class="solution_cards_box">
                        <div class="solution_card">
                          <div class="hover_color_bubble"></div>

                          <div class="ph">1111 1234 7869 3245</div>

                          <div class="card_boxi5"></div>

                          <div class="solu_title">
                            <div class="name">LICENSE</div>
                          </div>

                          <div class="simitry">

                            <div class="solu_description">
                              <p>
                                Security Industry Authority
                              </p>

                            </div>
                            <div class="so_top_icon">

                              <img src="<?= base_url('uploads/images/testimonial-3.jpg') ?>" width="40" viewBox="0 0 512 512" height="50" id="Layer_1">

                              </img>
                            </div>
                          </div>
                          <div class="xp">
                            <div class="designation">EXPIRES</div>
                            <div class="designation1">27 JAN 20XX</div>
                            <div class="designation">MRS JULIE</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
              <div class="card-new">
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="our_solution_category">
                      <div class="solution_cards_box">
                        <div class="solution_card">
                          <div class="hover_color_bubble"></div>

                          <div class="ph">1111 1234 7869 3245</div>

                          <div class="card_boxi6"></div>

                          <div class="solu_title">
                            <div class="name">LICENSE</div>
                          </div>

                          <div class="simitry">

                            <div class="solu_description">
                              <p>
                                Security Industry Authority
                              </p>

                            </div>
                            <div class="so_top_icon">

                              <img src="<?= base_url('uploads/images/testimonial-4.jpg') ?>width=" 40" viewBox="0 0 512 512" height="50" id="Layer_1">

                              </img>
                            </div>
                          </div>
                          <div class="xp">
                            <div class="designation">EXPIRES</div>
                            <div class="designation1">27 JAN 20XX</div>
                            <div class="designation">MRS JULIE</div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>