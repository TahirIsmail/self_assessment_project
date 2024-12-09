<style>

 
    .form-box {
        -webkit-border-top-left-radius: 20px !important;
        -webkit-border-top-right-radius: 20px !important;
        position: relative;
        z-index: 10;
        border-radius: 10px;
        width: 70%;
        margin: auto;
    }

    .icon-container {
        position: absolute;
        top: 20px;
        left: 20px;
        width: 188px;
        height: 50px;
        z-index: 20; 
    }


    .container {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh; 
    }
    @media (min-width: 200px) and (max-width: 766px) {
        .form-box {
            margin-top: 40% !important;
            width: 360px !important;
        }
    }
</style>

<div class="icon-container">
    <a href="<?= base_url('home/index') ?>" class="navbar-brand p-0">


        <img src="<?= base_url('/uploads/images/SL-red-logo.png') ?>" alt="Logo">
    </a>
</div>

<div class="container mt-2">
    <div class="form-box shadow-lg bg-white" id="login-box">
        <div class="header text-center mb-3" style="font-size: 24px; font-weight: bold;">SIGN UP</div>
        <form method="post">
            <div class="p-2 row">
                <!-- Left Column (Lottie) -->
                <div class="col-md-4 d-flex justify-content-center align-items-center mb-3 mb-md-0">
                    <div class="lottie">
                        <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
                        <dotlottie-player src="https://lottie.host/dc68b1cd-78bc-494e-a600-bb11559bf774/mQEbngnS8C.json" background="transparent" speed="1" style="height: 180px;" loop autoplay></dotlottie-player>
                    </div>
                </div>

                <!-- Right Column (Form) -->
                <div class="col-md-8">
                    <?php
                    if ($form_validation == "No") {
                    } else {
                        if (inicompute($form_validation)) {
                            echo "<div class=\"alert alert-danger alert-dismissible fade show\">
                        <i class=\"fa fa-ban\"></i>
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                        $form_validation
                    </div>";
                        }
                    }
                    if ($this->session->flashdata('reset_success')) {
                        $message = $this->session->flashdata('reset_success');
                        echo "<div class=\"alert alert-success alert-dismissible fade show\">
                    <i class=\"fa fa-ban\"></i>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                    $message
                </div>";
                    }
                    ?>

                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <input class="form-control form-control-lg" placeholder="Username" name="username" type="text" value="<?= set_value('username') ?>" required>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <input class="form-control form-control-lg" placeholder="Email" name="email" type="email" value="<?= set_value('email') ?>" required>
                        </div>
                    </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <input class="form-control" placeholder="First Name" name="first_name" type="text" value="<?= set_value('first_name') ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <input class="form-control" placeholder="Last Name" name="last_name" type="text" value="<?= set_value('last_name') ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <select class="form-control" name="gender" id="gender">
                        <option selected disabled>Please Select Gender...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <input class="form-control date"
                        id="dob"
                        placeholder="Date of birth"
                        name="dob"
                        type="text"
                        onfocus="(this.type='date')"
                        onblur="(this.type='text'); if(!this.value) this.placeholder='Date of birth';"
                        value="<?= set_value('dob') ?>" />
                </div>
            </div>

                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <input class="form-control form-control-lg" placeholder="Password" name="password" type="password" required>
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <input class="form-control form-control-lg" placeholder="Confirm Password" name="confirm_password" type="password" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6 mb-3">
                            <input class="form-control form-control-lg" placeholder="Address" name="address" type="text" value="<?= set_value('address') ?>">
                        </div>
                        <div class="form-group col-md-6 mb-3">
                            <input class="form-control form-control-lg" placeholder="Phone Number" name="phone" type="text" value="<?= set_value('phone') ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-12 mb-3">
                            <input class="form-control form-control-lg" placeholder="Referred By" name="referred_by" type="text" value="<?= set_value('referred_by') ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="form-check col-md-6">
                            <input class="form-check-input" type="checkbox" value="Remember Me" name="remember" id="remember">
                            <label class="form-check-label" for="remember">
                                Remember Me
                            </label>
                        </div>
                        <div class="col-md-6">
                            <span class="float-end">
                                <a href="<?= base_url('reset/index') ?>">Forgot Password?</a>
                            </span>
                        </div>
                    </div>

                    <?php if (isset($siteinfos->captcha_status) && $siteinfos->captcha_status == 0) { ?>
                    <div class="form-group">
                        <?php echo $recaptcha['widget'];
                        echo $recaptcha['script']; ?>
                    </div>
                    <?php } ?>

                    <input type="submit" class="btn btn-sm btn-success w-100 mb-3" value="Sign up" style="transition: background-color 0.3s;">
                    <div class="form-group text-center">
                        Already have an account? <a href="<?= base_url('signin/index') ?>" style="text-decoration: underline">Login Now</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

