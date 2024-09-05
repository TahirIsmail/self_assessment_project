<?php
$is_logged_in = $this->session->userdata('loggedin');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Simply License</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <?php $this->load->view("components/frontend/header.php"); ?>
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

    <link href="<?php echo base_url('assets/toastr/toastr.min.css'); ?>" rel="stylesheet">
    <script type="text/javascript" src="<?php echo base_url('assets/toastr/toastr.min.js'); ?>"></script>


    <link href="<?php echo base_url('assets/inilabs/owlcarousel/assets/owl.carousel.min.css'); ?>" rel="stylesheet" type="text/css">
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



    <style>
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .toast {
            display: flex;
            align-items: center;
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            min-width: 250px;
            opacity: 0;
            animation: fadeInOut 5s ease forwards;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .toast.toast-success {
            background-color: #28a745;
        }

        .toast.toast-error {
            background-color: #dc3545;
        }

        @keyframes fadeInOut {
            0% {
                opacity: 0;
                transform: translateY(-30px);
            }

            10% {
                opacity: 1;
                transform: translateY(0);
            }

            90% {
                opacity: 1;
            }

            100% {
                opacity: 0;
                transform: translateY(-30px);
            }
        }

        .testimonial-carousel::before {
            position: none !important;
            content: "";
            top: 0;
            left: 0;
            height: 100%;
            width: 0;

            z-index: 1;
        }

        .testimonial-carousel::after {
            position: none !important;
            content: "";
            top: 0;
            left: 0;
            height: 100%;
            width: 0;

            z-index: 1;
        }
    </style>
</head>

<body>


    <!-- Toast Container -->
    <div id="toastContainer" class="toast-container"></div>


    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>


    <!-- Service Start -->
    <div class="container-xxl py-5">
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




    <!-- <div class="cont1_mobile">

        <div class="card-new_mobile">
            <div class="row">

                <div class="col-lg-12 col-md-12 col-sm-12">

                    <div class="our_solution_category_mobile ">

                        <div class="solution_cards_box_mobile ">

                            <div class="solution_card_mobile">

                                <div class="hover_color_bubble_mobile"></div>




                                <div class="ph_mobile">7869 1234 7869 3245</div>

                                <div class="card_boxi1_mobile "></div>

                                <div class="solu_title_mobile ">
                                    <div class="name_mobile">LICENSE</div>
                                </div>

                                <div class="simitry_mobile">

                                    <div class="solu_description_mobile">
                                        <p>
                                            Security Industry Authority
                                        </p>

                                    </div>
                                    <div class="so_top_icon_mobile">

                                        <img src="<?= base_url('uploads/images/team-1.jpg') ?>" width="40" viewBox="0 0 512 512" height="50" id="Layer_1">

                                        </img>
                                    </div>
                                </div>
                                <div class="xp_mobile">
                                    <div class="designation_mobile">EXPIRES</div>
                                    <div class="designation1_mobile">18 JUNE 20XX</div>
                                    <div class="designation_mobile">MR JOHNS</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-new_mobile">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="our_solution_category_mobile">
                        <div class="solution_cards_box_mobile">
                            <div class="solution_card_mobile">
                                <div class="hover_color_bubble_mobile"></div>

                                <div class="ph_mobile">4321 1234 7869 3245</div>

                                <div class="card_boxi2_mobile"></div>

                                <div class="solu_title_mobile">
                                    <div class="name_mobile">LICENSE</div>
                                </div>


                                <div class="simitry_mobile">

                                    <div class="solu_description_mobile">
                                        <p>
                                            Security Industry Authority
                                        </p>

                                    </div>
                                    <div class="so_top_icon_mobile">

                                        <img src="<?= base_url('uploads/images/team-2.jpg') ?>" width="40" viewBox="0 0 512 512" height="50" id="Layer_1">

                                        </img>
                                    </div>
                                </div>
                                <div class="xp_mobile">
                                    <div class="designation_mobile">EXPIRES</div>
                                    <div class="designation1_mobile">07 OCT 20XX</div>
                                    <div class="designation_mobile">MRS ANNA</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-new_mobile">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="our_solution_category_mobile">
                        <div class="solution_cards_box_mobile">
                            <div class="solution_card_mobile">
                                <div class="hover_color_bubble_mobile"></div>

                                <div class="ph_mobile">1234 1234 7869 3245</div>

                                <div class="card_boxi3_mobile"></div>

                                <div class="solu_title_mobile">
                                    <div class="name_mobile">LICENSE</div>
                                </div>


                                <div class="simitry_mobile">

                                    <div class="solu_description_mobile">
                                        <p>
                                            Security Industry Authority
                                        </p>

                                    </div>
                                    <div class="so_top_icon_mobile">

                                        <img src="<?= base_url('uploads/images/team-3.jpg') ?>" width="40" viewBox="0 0 512 512" height="50" id="Layer_1">

                                        </img>
                                    </div>
                                </div>
                                <div class="xp">
                                    <div class="designation_mobile">EXPIRES</div>
                                    <div class="designation1_mobile">31 APR 20XX</div>
                                    <div class="designation_mobile">MR ADAM</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-new_mobile">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="our_solution_category_mobile">
                        <div class="solution_cards_box_mobile">
                            <div class="solution_card_mobile">
                                <div class="hover_color_bubble_mobile"></div>

                                <div class="ph_mobile">1111 1234 7869 3245</div>

                                <div class="card_boxi4_mobile"></div>

                                <div class="solu_title_mobile">
                                    <div class="name_mobile">LICENSE</div>
                                </div>


                                <div class="simitry_mobile">

                                    <div class="solu_description_mobile">
                                        <p>
                                            Security Industry Authority
                                        </p>

                                    </div>
                                    <div class="so_top_icon_mobile">

                                        <img src="<?= base_url('uploads/images/team-4.jpg') ?>" width="40" viewBox="0 0 512 512" height="50" id="Layer_1">

                                        </img>
                                    </div>
                                </div>
                                <div class="xp">
                                    <div class="designation_mobile">EXPIRES</div>
                                    <div class="designation1_mobile">27 JAN 20XX</div>
                                    <div class="designation_mobile">MRS JULIE</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-new_mobile">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="our_solution_category_mobile">
                        <div class="solution_cards_box_mobile">
                            <div class="solution_card_mobile">
                                <div class="hover_color_bubble_mobile"></div>

                                <div class="ph_mobile">1111 1234 7869 3245</div>

                                <div class="card_boxi5_mobile"></div>

                                <div class="solu_title_mobile">
                                    <div class="name_mobile">LICENSE</div>
                                </div>


                                <div class="simitry_mobile">

                                    <div class="solu_description_mobile">
                                        <p>
                                            Security Industry Authority
                                        </p>

                                    </div>
                                    <div class="so_top_icon_mobile">

                                        <img src="<?= base_url('uploads/images/testimonial-3.jpg') ?>" width="40" viewBox="0 0 512 512" height="50" id="Layer_1">

                                        </img>
                                    </div>
                                </div>
                                <div class="xp">
                                    <div class="designation_mobile">EXPIRES</div>
                                    <div class="designation1_mobile">27 JAN 20XX</div>
                                    <div class="designation_mobile">MRS JULIE</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-new_mobile">
            <div class="row_mobile">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="our_solution_category_mobile">
                        <div class="solution_cards_box_mobile">
                            <div class="solution_card_mobile">
                                <div class="hover_color_bubble_mobile"></div>

                                <div class="ph_mobile">1111 1234 7869 3245</div>

                                <div class="card_boxi6_mobile"></div>

                                <div class="solu_title_mobile">
                                    <div class="name_mobile">LICENSE</div>
                                </div>


                                <div class="simitry_mobile">

                                    <div class="solu_description_mobile">
                                        <p>
                                            Security Industry Authority
                                        </p>

                                    </div>
                                    <div class="so_top_icon_mobile">

                                        <img src="<?= base_url('uploads/images/testimonial-3.jpg') ?>" width="40" viewBox="0 0 512 512" height="50" id="Layer_1">

                                        </img>
                                    </div>
                                </div>
                                <div class="xp">
                                    <div class="designation_mobile">EXPIRES</div>
                                    <div class="designation1_mobile">27 JAN 20XX</div>
                                    <div class="designation_mobile">MRS JULIE</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div> -->
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



    <div class="container">
        <div class="text-center">
            <h6 class="section-title bg-white text-center text-primary px-3">Tests</h6>
            <h1 class="mb-5">All Mock Test! </h1>
        </div>
        <div class="owl-carousel testimonial-carousel ">
            <?php if ($mockTests) { ?>
                <?php foreach ($mockTests as $test) { ?>
                    <div class="testimonial-item text-center">
                        <div class="item">
                            <div class="course-item">
                                <div class="position-relative overflow-hidden rounded-top-round ">
                                    <img class="img-fluid " src="<?= base_url('uploads/images/' . $test['image']) ?>" alt="Course Image">
                                    <div class="w-100 d-flex justify-content-center position-absolute bottom-0 start-0 mb-4">
                                        <a onclick='checkLogin(<?= json_encode($test) ?>, event)' class="flex-shrink-0 btn btn-sm btn-primary px-3 border-end" style="border-radius: 30px 0 0 30px;">Book Now</a>
                                        <a href="<?= base_url('mock_course/index'); ?>" class="flex-shrink-0 btn btn-sm btn-primary px-3" style="border-radius: 0 30px 30px 0;">Read More</a>
                                    </div>
                                </div>
                                <div class="course-item bg-theme   p-4 rounded-top-round rounded-bottom-round" style="margin-top: -15px;position:relative; z-index:1;height:120px !important">
                                    <div class="text-center pb-0">
                                        <h3 class="mb-2 text-white">£<?= intval($test['cost']) ?></h3>

                                        <h5 class="mb-4 text-white"><?= $test['section'] ?></h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
            <?php }
            }
            ?>

        </div>
    </div>





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



    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    <?php $this->load->view("components/frontend/footer.php"); ?>



    <!-- Improved Form and Modal Structure -->
    <!-- Improved Form and Modal Structure -->
    <!-- Improved Form and Modal Structure -->
    <form method="post" id="paymentAddDataForm" action="<?= base_url('home/payment') ?>" enctype="multipart/form-data">
        <div class="modal fade" id="addpayment" tabindex="-1" aria-labelledby="addPaymentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header d-flex justify-content-between align-items-center">
                        <h5 class="modal-title mb-0" id="addPaymentModalLabel"><?= $this->lang->line('take_exam_add_payment') ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="course_slug" id="course_slug">

                            <div class="col-sm-6">
                                <div class="mb-3 <?= form_error('paymentAmount') ? 'is-invalid' : ''; ?>" id="paymentAmountErrorDiv">
                                    <label for="paymentAmount" class="form-label"><?= $this->lang->line('take_exam_payment_amount') ?> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="paymentAmount" name="paymentAmount" readonly="readonly">
                                    <div class="invalid-feedback" id="paymentAmountError"><?= form_error('paymentAmount') ?></div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="mb-3 <?= form_error('payment_method') ? 'is-invalid' : ''; ?>" id="payment_method_error_div">
                                    <label for="payment_method" class="form-label"><?= $this->lang->line('take_exam_payment_method') ?> <span class="text-danger">*</span></label>
                                    <?php
                                    $payment_method_array['select'] = $this->lang->line('take_exam_select_payment_method');
                                    if (customCompute($payment_settings)) {
                                        foreach ($payment_settings as $payment_setting) {
                                            $payment_method_array[$payment_setting->slug] = $payment_setting->name;
                                        }
                                    }
                                    echo form_dropdown("payment_method", $payment_method_array, set_value("payment_method"), "id='payment_method' class='form-select select2'");
                                    ?>
                                    <div class="invalid-feedback" id="payment_method_error"><?= form_error('payment_method') ?></div>
                                </div>
                            </div>

                            <!-- Additional Inputs -->
                            <?php
                            if (inicompute($payment_settings)) {
                                foreach ($payment_settings as $payment_setting) {
                                    if ($payment_setting->misc != null) {
                                        $misc = json_decode($payment_setting->misc);
                                        if (inicompute($misc->input)) {
                                            foreach ($misc->input as $input) {
                                                $this->load->view($input);
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= $this->lang->line('close') ?></button>
                        <input type="submit" id="add_payment_button" class="btn btn-success" value="<?= $this->lang->line("take_exam_add_payment") ?>" />
                    </div>
                </div>
            </div>
        </div>
    </form>




    <?php
    $js_gateway     = [];
    $submit_gateway = [];
    if (inicompute($payment_settings)) {
        foreach ($payment_settings as $payment_setting) {
            if ($payment_setting->misc != null) {
                $misc = json_decode($payment_setting->misc);
                if (inicompute($misc->js)) {
                    foreach ($misc->js as $js) {
                        $this->load->view($js);
                    }
                }

                if (inicompute($misc->input)) {
                    if (isset($misc->input[0])) {
                        $js_gateway[$payment_setting->slug] = isset($misc->input[0]);
                    }
                }

                if (inicompute($misc->input)) {
                    if (isset($misc->submit) && $misc->submit) {
                        $submit_gateway[$payment_setting->slug] = $misc->submit;
                    }
                }
            }
        }
    }

    $js_gateway     = json_encode($js_gateway);
    $submit_gateway = json_encode($submit_gateway);
    ?>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('assets/inilabs/easing/easing.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/inilabs/waypoints/waypoints.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/inilabs/wow/wow.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/inilabs/owlcarousel/owl.carousel.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/inilabs/landing_js/main.js'); ?>"></script>
    <!-- Template Javascript -->

    <?php if ($this->session->flashdata('success')): ?>
        <script type="text/javascript">
            $(document).ready(function() {
                showToast('success', "<?= $this->session->flashdata('success'); ?>");
            });
        </script>
    <?php $this->session->set_flashdata('success', '');
    endif; ?>

    <?php if ($this->session->flashdata('error')): ?>
        <script type="text/javascript">
            $(document).ready(function() {
                showToast('error', "<?= $this->session->flashdata('error'); ?>");
            });
        </script>
    <?php $this->session->set_flashdata('error', '');
    endif; ?>




    <script>
        const gateway = <?= $js_gateway ?>;
        const submit_gateway = <?= $submit_gateway ?>;
        let form = document.getElementById('paymentAddDataForm');
        // document.getElementById('paymentAddDataForm').addEventListener('submit', function(event) {
        //     event.preventDefault();

        //     let payment_method = $('#payment_method').val();
        //     let submit = true;

        //     // Call payment gateway function if exists
        //     // for (let item in submit_gateway) {
        //     //     if (item == payment_method) {
        //     //         submit = true;
        //     //         window[payment_method + '_payment'](); 
        //     //         break;
        //     //     }
        //     // }

        //     if (submit) {
        //         let formData = new FormData(this);

        //         $.ajax({
        //             url: "<?= base_url('home/payment') ?>",
        //             type: "POST",
        //             data: formData,
        //             processData: false,
        //             contentType: false,
        //             success: function(response) {
        //                 // Assuming `response` is a success message or data
        //                 showToast('success', 'Payment successfully processed.');
        //                 // Optionally, close the modal
        //                 // $('#addpayment').modal('hide');
        //             },
        //             error: function(xhr, status, error) {
        //                 // Handle error response
        //                 showToast('error', 'Failed to process payment. Please try again.');
        //             }
        //         });
        //     }
        // });
    </script>

    <script>
        function showToast(type, message) {
            var toastContainer = document.getElementById('toastContainer');
            var toast = document.createElement('div');
            toast.className = 'toast toast-' + type;
            toast.textContent = message;

            toastContainer.appendChild(toast);

            // Remove the toast after 5 seconds (animation duration)
            setTimeout(function() {
                toast.remove();
            }, 5000);
        }
        var isLoggedIn = <?= json_encode($is_logged_in) ?>;
    </script>




    <script>
        function payment_form(slug) {
            var course_slug = slug;

            if (course_slug) {
                $('#course_slug').val(course_slug);
                $.ajax({
                    type: 'POST',
                    url: "<?= base_url('online_exam/get_payment_info') ?>",
                    data: {
                        'course_slug': course_slug
                    },
                    dataType: "html",
                    success: function(data) {
                        $('#paymentAmount').val('');
                        var response = JSON.parse(data);
                        console.log(response);
                        if (response.status == true) {
                            $('#addpayment').modal('show');
                            $('#paymentAmount').val(response.payableamount);
                        } else {
                            $('#paymentAmount').val('0.00');
                        }
                    }
                });
            }
        };

        function runner() {

            url = localStorage.getItem('redirect_url');
            if (url) {
                localStorage.clear();
                window.location = url;
            }
            setTimeout(function() {
                runner();
            }, 500);
        }

        $(document).change(function() {

            console.log(gateway);
            let payment_method = $('#payment_method').val();
            for (let item in gateway) {
                if (item == payment_method) {
                    if (gateway[item]) {
                        $('#' + item + '_div').show();
                    }
                } else {
                    $('#' + item + '_div').hide();
                }
            }
        });

        $(document).ready(function() {

            $('#addpayment').on('show.bs.modal', function() {
                $('#stripe_div').css('display', 'none');
                $('#paymentAddDataForm')[0].reset();
                $('#paymentAmountError').text('');
                $('#payment_method_error').text('');
                $('#payment_method').val('');
                $('#paymentAmountErrorDiv').removeClass('has-error');
                $('#payment_method_error_div').removeClass('has-error');
            });

            // Handle form submission
            $('#paymentAddDataForm').submit(function(event) {
                event.preventDefault(); // Prevent default form submission

                let payment_method = $('#payment_method').val();
                let submit = true;

                // Call payment gateway function if exists
                for (let item in submit_gateway) {
                    if (item === payment_method) {
                        submit = true;
                        window[payment_method + '_payment'](); // Call the payment method function dynamically
                        break;
                    }
                }

                if (submit) {

                    // let formData = new FormData(this);

                    // $.ajax({
                    //     url: "<?= base_url('home/payment') ?>", // Target URL
                    //     type: "POST",
                    //     data: formData,
                    //     processData: false,
                    //     contentType: false,
                    //     success: function(response) {

                    //         // Show success message and close the modal
                    //         showToast('success', 'Payment successfully processed.');
                    //         // $('#addpayment').modal('hide'); // Close the modal
                    //         // $('#paymentAddDataForm')[0].reset(); // Reset the form
                    //     },
                    //     error: function(xhr, status, error) {
                    //         // Handle error response
                    //         showToast('error', 'Failed to process payment. Please try again.');
                    //     }
                    // });
                }
            });

            // Close modal and reset form when close button is clicked
            $('#addpayment .btn-default').click(function() {
                $('#paymentAddDataForm')[0].reset();
            });
            $(".owl-carousel").owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                items: 1, // Adjust the number of visible items as needed
                autoplay: true,
                autoplayTimeout: 5000, // Adjust the timeout for autoplay
                autoplayHoverPause: true
            });
        });

        function checkLogin(mockTest, e) {
            e.preventDefault();

            if (isLoggedIn) {
                $.ajax({
                    type: 'POST',
                    url: "<?= base_url('home/check_payment') ?>",
                    data: {
                        'sectionID': mockTest.sectionID
                    },
                    dataType: "html",
                    success: function(data) {

                        if (data == "true") {
                            showToast('error', 'You have Already Buy that Mock Test !');
                        } else {
                            payment_form(mockTest.slug);

                        }
                    }
                });
            } else {

                window.location.href = "<?= base_url('signin/index') ?>";
            }
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/owl.carousel/2.2.1/owl.carousel.min.js"></script>

</body>

</html>