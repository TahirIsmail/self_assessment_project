<?php
$is_logged_in = $this->session->userdata('loggedin');

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Simply License</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicon -->
  <link href="<?= base_url('uploads/landing_img/favicon.png'); ?>" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->


  <link href="<?php echo base_url('assets/inilabs/owlcarousel/owl.carousel.min.css'); ?>" rel="stylesheet" type="text/css">
  <link href="<?php echo base_url('assets/inilabs/animate/animate.min.css'); ?>" rel="stylesheet" type="text/css">

  <!-- Customized Bootstrap Stylesheet -->
  <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->

  <link href="<?php echo base_url('assets/inilabs/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css">

  <!-- Template Stylesheet -->
  <!-- <link href="css/style.css" rel="stylesheet"> -->
  <link href="<?php echo base_url('assets/inilabs/landing_style.css'); ?>" rel="stylesheet" type="text/css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">


</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
    <a href="<?= base_url('home/index') ?>" class="navbar-brand p-0">
      <img class="w-100" src="<?= base_url('uploads/landing_img/SL-white-logo.png') ?>" alt="Image" style="    width: 200px !important;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav ms-auto py-0">
        <a href="<?= base_url('home/index') ?>" class="nav-item nav-link active">Home</a>
        <a href="#" class="nav-item nav-link">Services</a>
        <a href="#" class="nav-item nav-link book-now">Book Now</a>
        <div class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">All Courses</a>
          <div class="dropdown-menu m-0">
            <?php foreach ($course_names as $course): ?>
              <a href="<?= base_url('course/index/' . $course['slug']) ?>" class="dropdown-item"><?= htmlspecialchars($course['course_name']) ?></a>
            <?php endforeach; ?>
          </div>
        </div>

        <a href="<?php echo base_url('contactus/index') ?>" class="nav-item nav-link">Contact Us</a>
        <a href="#" class="nav-item nav-link">Blog</a>
      </div>
      <butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>
      <?php if ($is_logged_in) { ?>
        <!-- Show Dashboard link if the user is logged in -->
        <a href="<?= base_url('dashboard/index') ?>" class="btn btn-primary py-2 px-4 ms-3">DASHBOARD</a>
      <?php } else { ?>
        <!-- Show Login and Sign Up links if the user is not logged in -->
        <a href="<?= base_url('signin/index') ?>" class="btn btn-primary py-2 px-4 ms-3">LOGIN</a>
        <a href="<?= base_url('signup/page') ?>" class="nav-item nav-link">SIGN UP</a>
      <?php } ?>
    </div>
  </nav>

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