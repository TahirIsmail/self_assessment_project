<style>
    .white-bg {
        box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
    }

    .header {
        font-weight: 600 !important;
        font-family: sans-serif;
    }

    .btn.btn-success {
        color: #fff;
        border: none !important;
        background-color: #000000cc !important;
        margin-bottom: 15px !important;
        box-shadow: 0 0 1px #ccc;
        -webkit-transition-duration: 0.5s;
        -webkit-transform-origin: 50% 50%;
        -webkit-transition-timing-function: ease-out;
    }

    .btn.btn-success:hover {
        color: #fff;
        background-color: #823535 !important;
        -webkit-box-shadow: 0px 0px 0 0px lightseagreen inset, 0px 0px 0 0px lightseagreen inset;
    }

    .icon-container {
        position: absolute;
        top: 20px;
        left: 20px;
        width: 188px;
        height: 50px;
    }

    .icon-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .form-box {

        /* margin: 0 !important; */
        position: relative;
        width: 45%;
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


        <img src="http://self_assessment_project.test/uploads/images/SL-red-logo.png" alt="Logo">
    </a>
</div>

<div class="form-box" id="login-box">

    <div class="header">SIGN UP</div>
    <form method="post">
        <div class="body white-bg">
            <div class="lottie">
                <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
                <dotlottie-player src="https://lottie.host/dc68b1cd-78bc-494e-a600-bb11559bf774/mQEbngnS8C.json" background="transparent" speed="1" style="height: 180px;" loop autoplay></dotlottie-player>
            </div>
            <?php
            if ($form_validation == "No") {
            } else {
                if (inicompute($form_validation)) {
                    echo "<div class=\"alert alert-danger alert-dismissable\">
                    <i class=\"fa fa-ban\"></i>
                    <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                    $form_validation
                </div>";
                }
            }
            if ($this->session->flashdata('reset_success')) {
                $message = $this->session->flashdata('reset_success');
                echo "<div class=\"alert alert-success alert-dismissable\">
                <i class=\"fa fa-ban\"></i>
                <button aria-hidden=\"true\" data-dismiss=\"alert\" class=\"close\" type=\"button\">×</button>
                $message
            </div>";
            }
            ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input class="form-control" placeholder="Username" name="username" type="text" value="<?= set_value('username') ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <input class="form-control" placeholder="Email" name="email" type="email" value="<?= set_value('email') ?>" required>
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
                    <input class="form-control" placeholder="Password" name="password" type="password" required>
                </div>
                <div class="form-group col-md-6">
                    <input class="form-control" placeholder="Confirm Password" name="confirm_password" type="password" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <input class="form-control" placeholder="Address" name="address" type="text" value="<?= set_value('address') ?>">
                </div>
                <div class="form-group col-md-6">
                    <input class="form-control" placeholder="Phone Number" name="phone" type="text" value="<?= set_value('phone') ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <input class="form-control" placeholder="Referred By" name="referred_by" type="text" value="<?= set_value('referred_by') ?>">
                </div>
            </div>
            <br>
            <div class="checkbox form-row">
                <label>
                    <input type="checkbox" value="Remember Me" name="remember">
                    <span> &nbsp; Remember Me</span>
                </label>
                <span class="pull-right">
                    <label>
                        <a href="<?= base_url('reset/index') ?>"> Forgot Password?</a>
                    </label>
                </span>
            </div>
            <?php if (isset($siteinfos->captcha_status) && $siteinfos->captcha_status == 0) { ?>
                <div class="form-group">
                    <?php echo $recaptcha['widget'];
                    echo $recaptcha['script']; ?>
                </div>
            <?php } ?>
            <input type="submit" class="btn btn-lg btn-success btn-block" value="Sign up" />

            <div class="form-group">
                Have you an account? <a href="<?= base_url('signin/index') ?>" style="text-decoration: underline">Login Now</a>
            </div>
        </div>
    </form>


</div>