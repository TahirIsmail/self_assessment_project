<style>
    .data-text--show {
        opacity: 1;
    }

    .data-text {
        font-family: Arial, sans-serif;
        font-size: 14px;
        fill: #333;
        opacity: 0;
        transition: opacity 0.3s;
    }

    .legend-text {
        font-family: Arial, sans-serif;
        font-size: 12px;
        fill: #333;
    }

    .tooltip {
        position: absolute;
        text-align: center;
        padding: 5px;
        font-size: 12px;
        background: #fff;
        border: 1px solid #ccc;
        pointer-events: none;
        opacity: 0;
        transition: opacity 0.3s;
    }

    .center-text {
        font-family: Arial, sans-serif;
        text-anchor: middle;
        fill: #333;
    }

    .center-value {
        font-size: 24px;
        font-weight: bold;
    }

    .center-name {
        font-size: 16px;
    }

    .chart-height {
        height: 186px !important;
    }
</style>


<div class="container-fluid py-4">
    <div class="row ">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row ">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Money</p>
                                <h5 class="font-weight-bolder">
                                    $53,000
                                </h5>
                                <p>
                                    <span class="text-success text-sm font-weight-bolder">+55%</span>
                                    since yesterday
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                <i class="fas fa-coins fa-2x" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Users</p>
                                <h5 class="font-weight-bolder">
                                    2,300
                                </h5>
                                <p>
                                    <span class="text-success text-sm font-weight-bolder">+3%</span>
                                    since last week
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                                <!-- <i class="fas fa-globe " aria-hidden="true"></i> -->
                                <i class="fa-solid fa-earth-americas fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">New Clients</p>
                                <h5 class="font-weight-bolder">
                                    +3,462
                                </h5>
                                <p>
                                    <span class="text-danger text-sm font-weight-bolder">-2%</span>
                                    since last quarter
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">

                                <i class="fa-solid fa-users fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body p-3">
                    <div class="row">
                        <div class="col-8">
                            <div class="numbers">
                                <p class="text-sm mb-0 text-uppercase font-weight-bold">Sales</p>
                                <h5 class="font-weight-bolder">
                                    $103,430
                                </h5>
                                <p>
                                    <span class="text-success text-sm font-weight-bolder">+5%</span> than last month
                                </p>
                            </div>
                        </div>
                        <div class="col-4 text-end">
                            <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                <i class="fa-solid fa-cart-arrow-down fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-5 mb-lg-0 mb-4">
            <div class="card z-index-2">
                <div class="card-body p-3">
                    <div class="bg-gradient-dark border-radius-lg py-3 pe-1 mb-3">
                        <div class="chart chart-height">
                            <canvas id="chart-bars" class="chart-canvas" height="255" width="523" style="display: block; box-sizing: border-box; height: 170px; width: 348.667px;"></canvas>
                        </div>
                    </div>
                    <h6 class="ms-2 mt-4 mb-0"> Active Users </h6>
                    <p class="text-sm ms-2"> (<span class="font-weight-bolder">+23%</span>) than last week </p>
                    <div class="container border-radius-lg">
                        <div class="row">
                            <div class="col-3 py-3 ps-0">
                                <div class="d-flex mb-2">
                                    <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center">
                                        <svg width="10px" height="10px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>document</title>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                    <g transform="translate(1716.000000, 291.000000)">
                                                        <g transform="translate(154.000000, 300.000000)">
                                                            <path class="color-background" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" opacity="0.603585379"></path>
                                                            <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <p class="text-xs mt-1 mb-0 font-weight-bold">Users</p>
                                </div>
                                <h4 class="font-weight-bolder">36K</h4>
                                <div class="progress w-75">
                                    <div class="progress-bar bg-dark w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-3 py-3 ps-0">
                                <div class="d-flex mb-2">
                                    <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-info text-center me-2 d-flex align-items-center justify-content-center">
                                        <svg width="10px" height="10px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>spaceship</title>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(-1720.000000, -592.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                    <g transform="translate(1716.000000, 291.000000)">
                                                        <g transform="translate(4.000000, 301.000000)">
                                                            <path class="color-background" d="M39.3,0.706666667 C38.9660984,0.370464027 38.5048767,0.192278529 38.0316667,0.216666667 C14.6516667,1.43666667 6.015,22.2633333 5.93166667,22.4733333 C5.68236407,23.0926189 5.82664679,23.8009159 6.29833333,24.2733333 L15.7266667,33.7016667 C16.2013871,34.1756798 16.9140329,34.3188658 17.535,34.065 C17.7433333,33.98 38.4583333,25.2466667 39.7816667,1.97666667 C39.8087196,1.50414529 39.6335979,1.04240574 39.3,0.706666667 Z M25.69,19.0233333 C24.7367525,19.9768687 23.3029475,20.2622391 22.0572426,19.7463614 C20.8115377,19.2304837 19.9992882,18.0149658 19.9992882,16.6666667 C19.9992882,15.3183676 20.8115377,14.1028496 22.0572426,13.5869719 C23.3029475,13.0710943 24.7367525,13.3564646 25.69,14.31 C26.9912731,15.6116662 26.9912731,17.7216672 25.69,19.0233333 L25.69,19.0233333 Z"></path>
                                                            <path class="color-background" d="M1.855,31.4066667 C3.05106558,30.2024182 4.79973884,29.7296005 6.43969145,30.1670277 C8.07964407,30.6044549 9.36054508,31.8853559 9.7979723,33.5253085 C10.2353995,35.1652612 9.76258177,36.9139344 8.55833333,38.11 C6.70666667,39.9616667 0,40 0,40 C0,40 0,33.2566667 1.855,31.4066667 Z"></path>
                                                            <path class="color-background" d="M17.2616667,3.90166667 C12.4943643,3.07192755 7.62174065,4.61673894 4.20333333,8.04166667 C3.31200265,8.94126033 2.53706177,9.94913142 1.89666667,11.0416667 C1.5109569,11.6966059 1.61721591,12.5295394 2.155,13.0666667 L5.47,16.3833333 C8.55036617,11.4946947 12.5559074,7.25476565 17.2616667,3.90166667 L17.2616667,3.90166667 Z" opacity="0.598539807"></path>
                                                            <path class="color-background" d="M36.0983333,22.7383333 C36.9280725,27.5056357 35.3832611,32.3782594 31.9583333,35.7966667 C31.0587397,36.6879974 30.0508686,37.4629382 28.9583333,38.1033333 C28.3033941,38.4890431 27.4704606,38.3827841 26.9333333,37.845 L23.6166667,34.53 C28.5053053,31.4496338 32.7452344,27.4440926 36.0983333,22.7383333 L36.0983333,22.7383333 Z" opacity="0.598539807"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <p class="text-xs mt-1 mb-0 font-weight-bold">Clicks</p>
                                </div>
                                <h4 class="font-weight-bolder">2m</h4>
                                <div class="progress w-75">
                                    <div class="progress-bar bg-dark w-90" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-3 py-3 ps-0">
                                <div class="d-flex mb-2">
                                    <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-warning text-center me-2 d-flex align-items-center justify-content-center">
                                        <svg width="10px" height="10px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>credit-card</title>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                    <g transform="translate(1716.000000, 291.000000)">
                                                        <g transform="translate(453.000000, 454.000000)">
                                                            <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                                            <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <p class="text-xs mt-1 mb-0 font-weight-bold">Sales</p>
                                </div>
                                <h4 class="font-weight-bolder">435$</h4>
                                <div class="progress w-75">
                                    <div class="progress-bar bg-dark w-30" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="col-3 py-3 ps-0">
                                <div class="d-flex mb-2">
                                    <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-danger text-center me-2 d-flex align-items-center justify-content-center">
                                        <svg width="10px" height="10px" viewBox="0 0 40 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <title>settings</title>
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <g transform="translate(-2020.000000, -442.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                                    <g transform="translate(1716.000000, 291.000000)">
                                                        <g transform="translate(304.000000, 151.000000)">
                                                            <polygon class="color-background" opacity="0.596981957" points="18.0883333 15.7316667 11.1783333 8.82166667 13.3333333 6.66666667 6.66666667 0 0 6.66666667 6.66666667 13.3333333 8.82166667 11.1783333 15.315 17.6716667"></polygon>
                                                            <path class="color-background" d="M31.5666667,23.2333333 C31.0516667,23.2933333 30.53,23.3333333 30,23.3333333 C29.4916667,23.3333333 28.9866667,23.3033333 28.48,23.245 L22.4116667,30.7433333 L29.9416667,38.2733333 C32.2433333,40.575 35.9733333,40.575 38.275,38.2733333 L38.275,38.2733333 C40.5766667,35.9716667 40.5766667,32.2416667 38.275,29.94 L31.5666667,23.2333333 Z" opacity="0.596981957"></path>
                                                            <path class="color-background" d="M33.785,11.285 L28.715,6.215 L34.0616667,0.868333333 C32.82,0.315 31.4483333,0 30,0 C24.4766667,0 20,4.47666667 20,10 C20,10.99 20.1483333,11.9433333 20.4166667,12.8466667 L2.435,27.3966667 C0.95,28.7083333 0.0633333333,30.595 0.00333333333,32.5733333 C-0.0583333333,34.5533333 0.71,36.4916667 2.11,37.89 C3.47,39.2516667 5.27833333,40 7.20166667,40 C9.26666667,40 11.2366667,39.1133333 12.6033333,37.565 L27.1533333,19.5833333 C28.0566667,19.8516667 29.01,20 30,20 C35.5233333,20 40,15.5233333 40,10 C40,8.55166667 39.685,7.18 39.1316667,5.93666667 L33.785,11.285 Z"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg>
                                    </div>
                                    <p class="text-xs mt-1 mb-0 font-weight-bold">Items</p>
                                </div>
                                <h4 class="font-weight-bolder">43</h4>
                                <div class="progress w-75">
                                    <div class="progress-bar bg-dark w-50" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card z-index-2">
                <div class="card-header pb-0">
                    <h6>Sales overview</h6>
                    <p class="text-sm">
                        <i class="fa fa-arrow-up text-success"></i>
                        <span class="font-weight-bold">4% more</span> in 2021
                    </p>
                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="chart-line2" class="chart-canvas" height="450" width="775" style="display: block; box-sizing: border-box; height: 300px; width: 516.667px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h5 class="text-capitalize">Sales overview</h5>
                    <p class="text-sm mb-0">
                        <i class="fa fa-arrow-up text-success"></i>
                        <span class="font-weight-bold">4% more</span> in 2021
                    </p>
                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card card-carousel overflow-hidden h-100 p-0">
                <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
                    <div class="carousel-inner border-radius-lg h-100">
                        <div class="carousel-item h-100 active" style="background-image: url('<?= base_url('uploads/images/course/course1.webp') ?>'); background-size: cover;">
                            <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                <div class="icon icon-shape icon-sm  text-center border-radius-md mb-3">
                                    <i class="fa-solid fa-2x fa-camera-retro"></i>
                                </div>
                                <h5 class="text-black  mb-1">Get started </h5>
                                <p class="text-black ">There’s nothing I really wanted to do in life that I wasn’t able to get good at.</p>
                            </div>
                        </div>
                        <div class="carousel-item h-100" style="background-image: url('<?= base_url('uploads/images/course/course2.webp') ?>'); background-size: cover;">


                            <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                <div class="icon icon-shape icon-sm text-center border-radius-md mb-3">
                                    <i class="fa-solid fa-2x fa-lightbulb"></i>

                                </div>
                                <h5 class="text-black mb-1">Faster way to create web pages</h5>
                                <p class="text-black ">That’s my skill. I’m not really specifically talented at anything except for the ability to learn.</p>
                            </div>
                        </div>
                        <div class="carousel-item h-100" style="background-image: url('<?= base_url('uploads/images/course/course3.jpg') ?>'); background-size: cover;">
                            <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                <div class="icon icon-shape icon-sm  text-center border-radius-md mb-3">
                                <i class="fa-solid fa-2x fa-trophy "></i>
                                </div>
                                <h5 class="text-black  mb-1">Share with us your design tips!</h5>
                                <p class="text-black ">Don’t be afraid to be wrong because you can’t learn anything from a compliment.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div class="row mt-4">

        <div class="col-lg-7 mb-lg-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h5>Sales by city</h5>

                        </div>
                        <div class="col-lg-6 col-5 my-auto text-end">
                            <div class="dropdown float-lg-end pe-4">
                                <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-secondary"></i>
                                </a>
                                <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Country
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Sales
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Value
                                    </th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">
                                        Bounce
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 align-items-center">

                                            <div class="ms-4">
                                                <p class="text-sm mb-0">United States</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-sm mb-0">2500</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-sm mb-0">$230,900</p>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <div class="text-center">
                                            <p class="text-sm mb-0">29.9%</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 align-items-center">

                                            <div class="ms-4">
                                                <p class="text-sm mb-0">Germany</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-sm mb-0">3,900</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-sm mb-0">$440,000</p>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <div class="text-center">
                                            <p class="text-sm mb-0">40.22%</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 align-items-center">
                                            <div class="ms-4">
                                                <p class="text-sm mb-0">Great Britain</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-sm mb-0">1,400</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-sm mb-0">$190,700</p>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <div class="text-center">
                                            <p class="text-sm mb-0">23.44%</p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="w-30">
                                        <div class="d-flex px-2 py-1 align-items-center">

                                            <div class="ms-4">
                                                <p class="text-sm mb-0">Brasil</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-sm mb-0">562</p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <p class="text-sm mb-0">$143,960</p>
                                        </div>
                                    </td>
                                    <td class="align-middle text-sm">
                                        <div class="text-center">
                                            <p class="text-sm mb-0">32.14%</p>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header pb-0 p-3">
                    <h5>Categories</h5>
                </div>
                <div class="card-body p-3">
                    <ul class="list-group">
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">

                                    <i class="fa-solid fa-mobile fa-2x text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Devices</h6>
                                    <span class="text-xs">250 in stock, <span class="font-weight-bold">346+ sold</span></span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">

                                    <i class="fa-solid fa-tag text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Tickets</h6>
                                    <span class="text-xs">123 closed, <span class="font-weight-bold">15 open</span></span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">
                                    <i class="fa-solid fa-circle-xmark  text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Error logs</h6>
                                    <span class="text-xs">1 is active, <span class="font-weight-bold">40 closed</span></span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                            </div>
                        </li>
                        <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                            <div class="d-flex align-items-center">
                                <div class="icon icon-shape icon-sm me-3 bg-gradient-dark shadow text-center">

                                    <i class="fa-solid fa-face-smile text-white opacity-10"></i>
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-1 text-dark text-sm">Happy users</h6>
                                    <span class="text-xs font-weight-bold">+ 430</span>
                                </div>
                            </div>
                            <div class="d-flex">
                                <button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>



    <div class="row my-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h5>Projects</h5>
                            <p class="text-sm mb-0">

                                <span class="font-weight-bold ms-1">30 done</span> this month
                            </p>
                        </div>
                        <div class="col-lg-6 col-5 my-auto text-end">
                            <div class="dropdown float-lg-end pe-4">
                                <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-secondary"></i>
                                </a>
                                <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Companies</th>
                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder opacity-7 ps-2">Members</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Budget</th>
                                    <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7">Completion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-xd.svg" class="avatar avatar-sm me-3" alt="xd">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Soft UI XD Version</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Ryan Tompson" data-bs-original-title="Ryan Tompson">
                                                <img src="../assets/img/team-1.jpg" alt="team1">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Romina Hadid" data-bs-original-title="Romina Hadid">
                                                <img src="../assets/img/team-2.jpg" alt="team2">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Alexander Smith" data-bs-original-title="Alexander Smith">
                                                <img src="../assets/img/team-3.jpg" alt="team3">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Jessica Doe" data-bs-original-title="Jessica Doe">
                                                <img src="../assets/img/team-4.jpg" alt="team4">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> $14,000 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">60%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-atlassian.svg" class="avatar avatar-sm me-3" alt="atlassian">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Add Progress Track</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Romina Hadid" data-bs-original-title="Romina Hadid">
                                                <img src="../assets/img/team-2.jpg" alt="team5">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Jessica Doe" data-bs-original-title="Jessica Doe">
                                                <img src="../assets/img/team-4.jpg" alt="team6">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> $3,000 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">10%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info w-10" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-slack.svg" class="avatar avatar-sm me-3" alt="team7">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Fix Platform Errors</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Romina Hadid" data-bs-original-title="Romina Hadid">
                                                <img src="../assets/img/team-3.jpg" alt="team8">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Jessica Doe" data-bs-original-title="Jessica Doe">
                                                <img src="../assets/img/team-1.jpg" alt="team9">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> Not set </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">100%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-success w-100" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm me-3" alt="spotify">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Launch our Mobile App</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Ryan Tompson" data-bs-original-title="Ryan Tompson">
                                                <img src="../assets/img/team-4.jpg" alt="user1">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Romina Hadid" data-bs-original-title="Romina Hadid">
                                                <img src="../assets/img/team-3.jpg" alt="user2">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Alexander Smith" data-bs-original-title="Alexander Smith">
                                                <img src="../assets/img/team-4.jpg" alt="user3">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Jessica Doe" data-bs-original-title="Jessica Doe">
                                                <img src="../assets/img/team-1.jpg" alt="user4">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> $20,500 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">100%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-success w-100" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-jira.svg" class="avatar avatar-sm me-3" alt="jira">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Add the New Pricing Page</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Ryan Tompson" data-bs-original-title="Ryan Tompson">
                                                <img src="../assets/img/team-4.jpg" alt="user5">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> $500 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">25%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="25"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div>
                                                <img src="../assets/img/small-logos/logo-invision.svg" class="avatar avatar-sm me-3" alt="invision">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">Redesign New Online Shop</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Ryan Tompson" data-bs-original-title="Ryan Tompson">
                                                <img src="../assets/img/team-1.jpg" alt="user6">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" aria-label="Jessica Doe" data-bs-original-title="Jessica Doe">
                                                <img src="../assets/img/team-4.jpg" alt="user7">
                                            </a>
                                        </div>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <span class="text-xs font-weight-bold"> $2,000 </span>
                                    </td>
                                    <td class="align-middle">
                                        <div class="progress-wrapper w-75 mx-auto">
                                            <div class="progress-info">
                                                <div class="progress-percentage">
                                                    <span class="text-xs font-weight-bold">40%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar bg-gradient-info w-40" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <h5>Orders overview</h5>
                    <p class="text-sm">
                        <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>

                        <span class="font-weight-bold">24%</span> this month
                    </p>
                </div>
                <div class="card-body p-3">
                    <div class="timeline timeline-one-side">
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="fa-solid fa-bell  fa-2x text-success text-gradient"></i>

                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">$2400, Design changes</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">22 DEC 7:20 PM</p>
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="fa-brands fa-html5 fa-2x text-danger text-gradient"></i>

                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">New order #1832412</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 11 PM</p>
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">

                                <i class="fa-solid fa-cart-shopping  fa-2x text-info text-gradient"></i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Server payments for April</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">21 DEC 9:34 PM</p>
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">

                                <i class="fa fa-credit-card-alt fa-2x text-warning text-gradient" aria-hidden="true"></i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">New card added for order #4395133</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">20 DEC 2:20 AM</p>
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">


                                <i class="fa-solid fa-key fa-2x text-primary text-gradient"></i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Unlock packages for development</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">18 DEC 4:54 AM</p>
                            </div>
                        </div>
                        <div class="timeline-block">
                            <span class="timeline-step">
                                <fa class="fas fa-coins fa-2x text-dark text-gradient"></fa>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">New order #9583120</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">17 DEC</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h5 class="text-capitalize">Sales overview</h5>
                    <p class="text-sm mb-0">
                        <i class="fa fa-arrow-up text-success"></i>
                        <span class="font-weight-bold">4% more</span> in 2021
                    </p>
                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <canvas id="half-donut" class="chart-canvas" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h5 class="text-capitalize">Sales overview</h5>
                    <p class="text-sm mb-0">
                        <i class="fa fa-arrow-up text-success"></i>
                        <span class="font-weight-bold">4% more</span> in 2021
                    </p>
                </div>
                <div class="card-body p-3">
                    <div class="chart">
                        <div id="donut-chart"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://d3js.org/d3.v6.min.js"></script>

<script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
        type: "line",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Mobile apps",
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "#5e72e4",
                backgroundColor: gradientStroke1,
                borderWidth: 3,
                fill: true,
                data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                maxBarThickness: 6

            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        padding: 10,
                        color: '#fbfbfb',
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        color: '#ccc',
                        padding: 20,
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });
</script>


<script>
    var ctx1 = document.getElementById('chart-bars').getContext('2d');

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);
    gradientStroke1.addColorStop(1, 'rgba(203, 12, 159, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(203, 12, 159, 0.0)');

    new Chart(ctx1, {
        type: "bar",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                label: "Mobile apps",
                tension: 0.4,
                borderWidth: 0,
                pointRadius: 0,
                borderColor: "#ffff",
                backgroundColor: gradientStroke1,
                borderWidth: 3,
                fill: true,
                data: [50, 40, 150, 100, 250, 200, 350, 230, 300], // Data values updated to be within range
                maxBarThickness: 6
            }],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false,
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: false, // Hide y-axis grid lines
                        drawOnChartArea: false, // Hide y-axis grid lines
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        padding: 10,
                        color: '#ffff',
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                        // Adjust the max value on the y-axis to 400
                        suggestedMax: 400
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true, // Ensure x-axis labels are displayed
                        color: '#ccc',
                        padding: 20,
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });
</script>

<script>
    var ctx1 = document.getElementById("chart-line2").getContext("2d");

    // Create gradients for the two datasets
    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);
    gradientStroke1.addColorStop(1, 'rgba(237, 33, 58, 0.2)'); // Red gradient with transparency
    gradientStroke1.addColorStop(0.2, 'rgba(237, 33, 58, 0.0)'); // Transparent
    gradientStroke1.addColorStop(0, 'rgba(237, 33, 58, 0)'); // Transparent

    var gradientStroke2 = ctx1.createLinearGradient(0, 230, 0, 50);
    gradientStroke2.addColorStop(1, 'rgba(0, 0, 0, 0.2)'); // Black gradient with transparency
    gradientStroke2.addColorStop(0.2, 'rgba(0, 0, 0, 0.0)'); // Transparent
    gradientStroke2.addColorStop(0, 'rgba(0, 0, 0, 0)'); // Transparent

    new Chart(ctx1, {
        type: "line",
        data: {
            labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 3,
                    pointRadius: 0,
                    borderColor: "#ed213a",
                    backgroundColor: gradientStroke1,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                },
                {
                    label: "Web apps",
                    tension: 0.4,
                    borderWidth: 3,
                    pointRadius: 0,
                    borderColor: "#000000",
                    backgroundColor: gradientStroke2,
                    fill: true,
                    data: [30, 60, 250, 190, 400, 300, 350, 270, 450],
                }
            ],
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false, // Show the legend
                },
                annotation: {
                    annotations: [{
                            type: 'line',
                            mode: 'vertical',
                            scaleID: 'x',
                            value: 'Jun', // Label where you want to draw the vertical line
                            borderColor: 'rgba(255, 99, 132, 1)', // Color of the line
                            borderWidth: 2, // Width of the line
                            label: {
                                enabled: true,
                                content: 'Annotation',
                                position: 'top',
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                font: {
                                    size: 12
                                }
                            }
                        },
                        {
                            type: 'line',
                            mode: 'vertical',
                            scaleID: 'x',
                            value: 'Dec', // Another label where you want to draw the vertical line
                            borderColor: 'rgba(54, 162, 235, 1)', // Color of the line
                            borderWidth: 2, // Width of the line
                            label: {
                                enabled: true,
                                content: 'Another Annotation',
                                position: 'top',
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                font: {
                                    size: 12
                                }
                            }
                        }
                    ]
                }
            },
            interaction: {
                intersect: false,
                mode: 'index',
            },
            scales: {
                y: {
                    grid: {
                        drawBorder: false,
                        display: true,
                        drawOnChartArea: true,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        padding: 10,
                        color: '#fbfbfb',
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
                x: {
                    grid: {
                        drawBorder: false,
                        display: false,
                        drawOnChartArea: false,
                        drawTicks: false,
                        borderDash: [5, 5]
                    },
                    ticks: {
                        display: true,
                        color: '#ccc',
                        padding: 20,
                        font: {
                            size: 11,
                            family: "Open Sans",
                            style: 'normal',
                            lineHeight: 2
                        },
                    }
                },
            },
        },
    });
</script>

<script>
    var ctx = document.getElementById("half-donut").getContext("2d");

    var originalColors = ['#007bff', '#28a745', '#ffc107', '#dc3545', '#6f42c1'];

    var chart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Series-1', 'Series-2', 'Series-3', 'Series-4', 'Series-5'],
            datasets: [{
                label: 'Dataset 1',
                data: [25.6, 32.0, 23.8, 9.9, 8.7],
                backgroundColor: originalColors,
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'right',
                    labels: {
                        usePointStyle: true,
                        padding: 20,
                        onClick: function(event, legendItem, legend) {
                            var index = legendItem.datasetIndex;
                            var ci = legend.chart;
                            var meta = ci.getDatasetMeta(index);
                            meta.hidden = meta.hidden === null ? !ci.data.datasets[index].hidden : null;
                            ci.update();
                        }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            let value = context.raw || '';
                            return `${label}: ${value}%`;
                        }
                    },
                    backgroundColor: '#000',
                    titleColor: '#fff',
                    bodyColor: '#fff'
                },
                datalabels: {
                    display: true,
                    formatter: (value, context) => {
                        return `${context.chart.data.labels[context.dataIndex]}: ${value}%`;
                    },
                    color: '#fff',
                    font: {
                        weight: 'bold'
                    }
                }
            },
            cutout: '70%',
            rotation: -90,
            circumference: 180,
            elements: {
                arc: {
                    borderWidth: 0
                }
            },
            animation: {
                duration: 1000,
                easing: 'easeInOutBounce'
            },
            hover: {
                onHover: function(e, chartElement) {
                    if (chartElement.length) {
                        var index = chartElement[0].index;
                        chart.data.datasets[0].backgroundColor = chart.data.datasets[0].backgroundColor.map((color, i) => {
                            return i === index ? originalColors[i] : 'rgba(0, 0, 0, 0.1)';
                        });
                    } else {
                        chart.data.datasets[0].backgroundColor = originalColors;
                    }
                    chart.update();
                }
            }
        }
    });
</script>
<!-- <script>
    var ctx = document.getElementById("full-chart").getContext("2d");

    var originalColors = ['#007bff', '#28a745', '#ffc107', '#dc3545', '#6f42c1'];
    var chart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Series-1', 'Series-2', 'Series-3', 'Series-4', 'Series-5'],
            datasets: [{
                label: 'Dataset 1',
                data: [25.6, 32.0, 23.8, 9.9, 8.7],
                backgroundColor: originalColors,
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'right',
                    labels: {
                        usePointStyle: true,
                        padding: 20
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.label || '';
                            let value = context.raw || '';
                            return `${label}: ${value}%`;
                        }
                    },
                    backgroundColor: '#000',
                    titleColor: '#fff',
                    bodyColor: '#fff'
                },
                datalabels: {
                    display: true,
                    formatter: (value, context) => {
                        return `${context.chart.data.labels[context.dataIndex]}: ${value}%`;
                    },
                    color: '#fff',
                    font: {
                        weight: 'bold'
                    }
                }
            },
            cutout: '50%',
            rotation: -90,
            circumference: 360,
            elements: {
                arc: {
                    borderWidth: 0
                }
            },
            animation: {
                duration: 1000,
                easing: 'easeInOutBounce'
            },
            hover: {
                onHover: function(e, chartElement) {
                    if (chartElement.length) {
                        var index = chartElement[0].index;
                        chart.data.datasets[0].backgroundColor = chart.data.datasets[0].backgroundColor.map((color, i) => {
                            return i === index ? originalColors[i] : 'rgba(0, 0, 0, 0.1)';
                        });

                        chart.options.elements.arc.borderWidth = (ctx, index) => {
                            return index === chartElement[0].index ? 3 : 0;
                        };

                        chart.options.elements.arc.borderColor = (ctx, index) => {
                            return index === chartElement[0].index ? '#fff' : 'transparent';
                        };

                        chart.update();
                    } else {
                        chart.data.datasets[0].backgroundColor = originalColors;
                        chart.options.elements.arc.borderWidth = 0;
                        chart.options.elements.arc.borderColor = 'transparent';
                        chart.update();
                    }
                }
            }
        }
    });
</script> -->
<script>
    const pieData = [{
            name: 'Running',
            value: 40,
            color: '#18FFFF'
        },
        {
            name: 'Paused',
            value: 26,
            color: '#0288D1'
        },
        {
            name: 'Stopped',
            value: 7,
            color: '#BF360C'
        },
        {
            name: 'Failed',
            value: 13,
            color: '#F4511E'
        },
        {
            name: 'Unknown',
            value: 19,
            color: '#F9A825'
        },
    ];
    bakeDonut(pieData);

    function bakeDonut(d) {
        let activeSegment;
        const data = d.sort((a, b) => b['value'] - a['value']),
            viewWidth = 500,
            viewHeight = 300,
            svgWidth = viewHeight,
            svgHeight = viewHeight,
            thickness = 40,
            colorArray = data.map(k => k.color),
            el = d3.select('#donut-chart'),
            radius = Math.min(svgWidth, svgHeight) / 2,
            color = d3.scaleOrdinal()
            .range(colorArray);

        const max = d3.max(data, (maxData) => maxData.value);

        const svg = el.append('svg')
            .attr('viewBox', `0 0 ${viewWidth + thickness} ${viewHeight + thickness}`)
            .attr('class', 'pie')
            .attr('width', viewWidth)
            .attr('height', svgHeight);

        const g = svg.append('g')
            .attr('transform', `translate( ${ (svgWidth / 2) + (thickness / 2) }, ${ (svgHeight / 2) + (thickness / 2)})`);

        const arc = d3.arc()
            .innerRadius(radius - thickness)
            .outerRadius(radius);

        const arcHover = d3.arc()
            .innerRadius(radius - (thickness + 5))
            .outerRadius(radius + 8);

        const pie = d3.pie()
            .value(function(pieData) {
                return pieData.value;
            })
            .sort(null);

        const tooltip = d3.select('#tooltip');

        const centerGroup = g.append('g')
            .attr('class', 'center-group');

        const centerValue = centerGroup.append('text')
            .attr('class', 'center-text center-value')
            .attr('y', -10)
            .text(max);

        const centerName = centerGroup.append('text')
            .attr('class', 'center-text center-name')
            .attr('y', 10)
            .text(data.find(d => d.value === max).name);

        const path = g.selectAll('path')
            .attr('class', 'data-path')
            .data(pie(data))
            .enter()
            .append('g')
            .attr('class', 'data-group')
            .each(function(pathData, i) {
                const group = d3.select(this)

                group.append('text')
                    .text(`${pathData.data.value}`)
                    .attr('class', 'data-text data-text__value')
                    .attr('text-anchor', 'middle')
                    .attr('dy', '1rem')

                group.append('text')
                    .text(`${pathData.data.name}`)
                    .attr('class', 'data-text data-text__name')
                    .attr('text-anchor', 'middle')
                    .attr('dy', '3.5rem')

                // Set default active segment
                if (pathData.value === max) {
                    const textVal = d3.select(this).select('.data-text__value')
                        .classed('data-text--show', true);

                    const textName = d3.select(this).select('.data-text__name')
                        .classed('data-text--show', true);
                }

            })
            .append('path')
            .attr('d', arc)
            .attr('fill', (fillData, i) => color(fillData.data.name))
            .attr('class', 'data-path')
            .on('mouseover', function(event, d) {
                const _thisPath = this,
                    parentNode = _thisPath.parentNode;

                if (_thisPath !== activeSegment) {

                    activeSegment = _thisPath;

                    const dataTexts = d3.selectAll('.data-text')
                        .classed('data-text--show', false);

                    const paths = d3.selectAll('.data-path')
                        .transition()
                        .duration(250)
                        .attr('d', arc);

                    d3.select(_thisPath)
                        .transition()
                        .duration(250)
                        .attr('d', arcHover);

                    const thisDataValue = d3.select(parentNode).select('.data-text__value')
                        .classed('data-text--show', true);
                    const thisDataText = d3.select(parentNode).select('.data-text__name')
                        .classed('data-text--show', true);

                    centerValue.text(d.data.value);
                    centerName.text(d.data.name);

                    tooltip.transition().duration(200).style('opacity', 0.9);
                    tooltip.html(`Name: ${d.data.name}<br>Value: ${d.data.value}`)
                        .style('left', (event.pageX + 10) + 'px')
                        .style('top', (event.pageY - 28) + 'px');
                }

            })
            .on('mouseout', function(d) {
                tooltip.transition().duration(500).style('opacity', 0);
            })
            .each(function(v, i) {
                if (v.value === max) {
                    const maxArc = d3.select(this)
                        .attr('d', arcHover);
                    activeSegment = this;
                }
                this._current = i;
            });

        const legendRectSize = 15;
        const legendSpacing = 10;

        const legend = svg.selectAll('.legend')
            .data(color.domain())
            .enter()
            .append('g')
            .attr('class', 'legend')
            .attr('transform', function(legendData, i) {
                const itemHeight = legendRectSize + legendSpacing;
                const offset = legendRectSize * color.domain().length;
                const horz = svgWidth + 80;
                const vert = (i * itemHeight) + legendRectSize + (svgHeight - offset) / 2;
                return `translate(${horz}, ${vert})`;
            });

        legend.append('circle')
            .attr('r', legendRectSize / 2)
            .style('fill', color);

        legend.append('text')
            .attr('x', legendRectSize + legendSpacing)
            .attr('y', legendRectSize - legendSpacing)
            .attr('class', 'legend-text')
            .text((legendData) => legendData)
    }
</script>