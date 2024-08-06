<!DOCTYPE html>
<html lang="en">

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
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <!-- <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.html" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <img class="w-100" src="../elearning-html-template/img/SL-red-logo.png" alt="Image" style="    width: 200px !important;">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.html" class="nav-item nav-link active">Home</a>
                <a href="about.html" class="nav-item nav-link">About</a>
                <a href="courses.html" class="nav-item nav-link">Courses</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
            </div>
            <a href="" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Log in<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav> -->
    <!-- Navbar End -->


    <!-- Carousel Start -->
    <!-- <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/carousel-a.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Best Online Courses</h5>
                                <h1 class="display-3 text-white animated slideInDown">The Best Online Learning Platform</h1>
                                <p class="fs-5 text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea sanctus eirmod elitr.</p>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                                <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative">
                <img class="img-fluid" src="img/carousel-b.jpg" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(24, 29, 56, .7);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-sm-10 col-lg-8">
                                <h5 class="text-primary text-uppercase mb-3 animated slideInDown">Best Online Courses</h5>
                                <h1 class="display-3 text-white animated slideInDown">Get Educated Online From Your Home</h1>
                                <p class="fs-5 text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea sanctus eirmod elitr.</p>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Read More</a>
                                <a href="" class="btn btn-light py-md-3 px-md-5 animated slideInRight">Join Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Carousel End -->



    <!--new navbar-->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="<?= base_url('HomeController/index')?>" class="navbar-brand p-0">
                <img class="w-100" src="<?= base_url('uploads/landing_img/SL-white-logo.png') ?>" alt="Image" style="    width: 200px !important;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="index.html" class="nav-item nav-link active">Home</a>
                    <a href="about.html" class="nav-item nav-link">Services</a>
                    <a href="service.html" class="nav-item nav-link book-now">Book Now</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">All Courses</a>
                        
                        <div class="dropdown-menu m-0">
                            <a href="<?= base_url('course/index') ?>" class="dropdown-item">DOOR SUPERVISOR</a>
                            <a href="detail.html" class="dropdown-item">CCTV</a>
                            <a href="detail.html" class="dropdown-item">CVIT</a>
                            <a href="detail.html" class="dropdown-item">VEHICAL IMMOBILSER</a>
                            <a href="detail.html" class="dropdown-item">CLOSE PROTECTION</a>
                            <a href="detail.html" class="dropdown-item">SECURITY</a>
                        </div>

                    </div>

                    <a href="contact.html" class="nav-item nav-link">Contact Us</a>
                    <a href="contact.html" class="nav-item nav-link">Blog</a>
                </div>
                <butaton type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></butaton>
                <a href="<?php echo base_url('signin/index') ?>" class="btn btn-primary py-2 px-4 ms-3">LOGIN</a>
                <a href="<?= base_url('signup/page')?>"class="nav-item nav-link">SIGN UP</a>
            </div>
        </nav>

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



                        <!--///////// OLD ID CARDS HERE COMMENTED////////////-->
                        <!-- <div class="card-row " style=" padding-top: 40px;">
                            <div class="section_our_solution">
                                <div class="row">

                                    <div class="col-lg-12 col-md-12 col-sm-12">

                                        <div class="our_solution_category ">

                                            <div class="solution_cards_box ">

                                                <div class="solution_card">

                                                    <div class="hover_color_bubble"></div>




                                                    <div class="ph">7869 1234 7869 3245</div>

                                                    <div class="card_boxi1"></div>

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

                                                            <img src="../../../uploads/images/team-1.jpg" width="40" viewBox="0 0 512 512" height="50" id="Layer_1">

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
                            <div class="section_our_solution">
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

                                                            <img src="../../../uploads/images/team-2.jpg" width="40" viewBox="0 0 512 512" height="50" id="Layer_1">

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
                            <div class="section_our_solution">
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

                                                            <img src="../../../uploads/images/team-3.jpg" width="40" viewBox="0 0 512 512" height="50" id="Layer_1">

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
                            <div class="section_our_solution">
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

                                                            <img src="../../../uploads/images/team-4.jpg" width="40" viewBox="0 0 512 512" height="50" id="Layer_1">

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
                        </div> -->



                        <!--///////// NEW ID CARDS HERE ////////////-->

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
            <!-- <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button> -->
            <!-- <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button> -->
        </div>
    </div>





    <!--//////// CARD SLIDER ////////// -->










    <!-- Service Start -->
    <div class="container-xxl py-5" style="margin-top: 40px;">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                            <h5 class="mb-3">MOOC Exams</h5>
                            <p>Our Exams are Current: Thorough <span style="font-weight: 700;">preparation</span> ensures your success & gain knowledge</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                            <h5 class="mb-3">Book - Door Supervisor Course</h5>
                            <p>Unlock rewarding career to gain industry knowledge & Certification</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                            <h5 class="mb-3">Book - Door Supervisor Top-up Course</h5>
                            <p>Enhance your skills with top-up course. Stay up skilled & complaint</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                            <h5 class="mb-3">Book - Level 3 AET</h5>
                            <p>Transform your passion for teaching with AET course. Gain Skills & Certification</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container-xxl " style="margin-bottom: 40px;">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                            <h5 class="mb-3">Book - CCTV Course</h5>
                            <p>Boost your career with cctv training to learn how to operate surveillance systems & gain Certification</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                            <h5 class="mb-3">Book - Health & Safety Course</h5>
                            <p>Ensure workplace safety, learn essential practices, stay complaint & safeguard your team</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                            <h5 class="mb-3">Book - Field Marshal Course</h5>
                            <p>Elevate your career in security field, learn skills and gain certification</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="service-item text-center pt-3">
                        <div class="p-4">
                            <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                            <h5 class="mb-3">E-Book Hub</h5>
                            <p>Expand your knowledge with ebooks. Discover your topics, instantly accessible and affordable</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Service End -->


    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="img-fluid position-absolute w-100 h-100" src="<?= base_url('uploads/landing_img/about.jpg') ?>" alt="" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                    <h6 class="section-title bg-white text-start text-primary pe-3">About Us</h6>
                    <h1 class="mb-4">Welcome to SimplyLicenced</h1>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                    <div class="row gy-2 gx-4 mb-4">
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Skilled Instructors</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Online Classes</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>International Certificate</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Skilled Instructors</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Online Classes</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>International Certificate</p>
                        </div>
                    </div>
                    <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Courses Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Courses</h6>
                <h1 class="mb-5">Popular Courses</h1>
            </div>
            <div class="row g-4 justify-content-center ">
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">

                            <img class="img-fluid" src="<?= base_url('uploads/landing_img/course-1.jpg') ?>" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                                <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Buy Now</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h3 class="mb-0">$149.00</h3>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small>(123)</small>
                            </div>
                            <h5 class="mb-4">Web Design & Development Course for Beginners</h5>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>John Doe</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>1.49 Hrs</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30 Students</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">

                            <img class="img-fluid" src="<?= base_url('uploads/landing_img/course-2.jpg') ?>" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                                <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Buy Now</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h3 class="mb-0">$149.00</h3>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small>(123)</small>
                            </div>
                            <h5 class="mb-4">Web Design & Development Course for Beginners</h5>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>John Doe</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>1.49 Hrs</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30 Students</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="course-item bg-light">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="<?= base_url('uploads/landing_img/course-3.jpg') ?>" alt="">
                            <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Read More</a>
                                <a href="#" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Buy Now</a>
                            </div>
                        </div>
                        <div class="text-center p-4 pb-0">
                            <h3 class="mb-0">$149.00</h3>
                            <div class="mb-3">
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small class="fa fa-star text-primary"></small>
                                <small>(123)</small>
                            </div>
                            <h5 class="mb-4">Web Design & Development Course for Beginners</h5>
                        </div>
                        <div class="d-flex border-top">
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-user-tie text-primary me-2"></i>John Doe</small>
                            <small class="flex-fill text-center border-end py-2"><i class="fa fa-clock text-primary me-2"></i>1.49 Hrs</small>
                            <small class="flex-fill text-center py-2"><i class="fa fa-user text-primary me-2"></i>30 Students</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Courses End -->



    <!-- Categories Start -->
    <div class="container-xxl py-5 category">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Categories</h6>
                <h1 class="mb-5">Courses Categories</h1>
            </div>
            <div class="row g-3">
                <div class="col-lg-7 col-md-6">
                    <div class="row g-3">
                        <div class="col-lg-12 col-md-12 wow zoomIn" data-wow-delay="0.1s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="<?= base_url('uploads/landing_img/cat-1.jpg') ?>" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Web Design</h5>
                                    <small class="text-primary">49 Courses</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.3s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="<?= base_url('uploads/landing_img/cat-2.jpg') ?>" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Graphic Design</h5>
                                    <small class="text-primary">49 Courses</small>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-12 wow zoomIn" data-wow-delay="0.5s">
                            <a class="position-relative d-block overflow-hidden" href="">
                                <img class="img-fluid" src="<?= base_url('uploads/landing_img/cat-3.jpg') ?>" alt="">
                                <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin: 1px;">
                                    <h5 class="m-0">Video Editing</h5>
                                    <small class="text-primary">49 Courses</small>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 wow zoomIn" data-wow-delay="0.7s" style="min-height: 350px;">
                    <a class="position-relative d-block h-100 overflow-hidden" href="">
                        <img class="img-fluid position-absolute w-100 h-100" src="<?= base_url('uploads/landing_img/cat-4.jpg') ?>" alt="" style="object-fit: cover;">
                        <div class="bg-white text-center position-absolute bottom-0 end-0 py-2 px-3" style="margin:  1px;">
                            <h5 class="m-0">Online Marketing</h5>
                            <small class="text-primary">49 Courses</small>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories Start -->





    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="section-title bg-white text-center text-primary px-3">Instructors</h6>
                <h1 class="mb-5">Expert Instructors</h1>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="<?= base_url('uploads/landing_img/team-1.jpg') ?>" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Instructor Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="<?= base_url('uploads/landing_img/team-2.jpg') ?>" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Instructor Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="<?= base_url('uploads/landing_img/team-3.jpg') ?>" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Instructor Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item bg-light">
                        <div class="overflow-hidden">
                            <img class="img-fluid" src="<?= base_url('uploads/landing_img/team-4.jpg') ?>" alt="">
                        </div>
                        <div class="position-relative d-flex justify-content-center" style="margin-top: -23px;">
                            <div class="bg-light d-flex justify-content-center pt-2 px-1">
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-sm-square btn-primary mx-1" href=""><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4">
                            <h5 class="mb-0">Instructor Name</h5>
                            <small>Designation</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Testimonial Start -->
    <!-- <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="section-title bg-white text-center text-primary px-3">Testimonial</h6>
                <h1 class="mb-5">Our Students Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="../../../uploads/landing_img/testimonial-1.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="../../../uploads/landing_img/testimonial-2.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="../../../uploads/landing_img/testimonial-3.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
                <div class="testimonial-item text-center">
                    <img class="border rounded-circle p-2 mx-auto mb-3" src="../../../uploads/landing_img/testimonial-4.jpg" style="width: 80px; height: 80px;">
                    <h5 class="mb-0">Client Name</h5>
                    <p>Profession</p>
                    <div class="testimonial-text bg-light text-center p-4">
                        <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Testimonial End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
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

                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Developed By <a class="border-bottom" href="https://oxbridgedigital.com/">OXBRIDGE DIGITAL</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('assets/inilabs/easing/easing.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/inilabs/waypoints/waypoints.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/inilabs/wow/wow.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/inilabs/owlcarousel/owl.carousel.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/inilabs/landing_js/main.js'); ?>"></script>
    <!-- Template Javascript -->

</body>

</html>