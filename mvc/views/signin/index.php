<style>
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
</style>

<div class="icon-container">

    <a href="<?= base_url('home/index') ?>" class="navbar-brand p-0">


        <img src="<?= base_url('uploads/images/SL-red-logo.png') ?>" alt="Logo">
    </a>
</div>

<div class="form-box" id="login-box">
    <form method="post">
        <div class="card bg-white rounded">
            <div class="header text-center p-1">SIGN IN</div>
            <div class="p-3">
                <div class="d-flex justify-content-center align-items-center mb-3" style="height: 169px;">
                    <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
                    <dotlottie-player src="https://lottie.host/dc68b1cd-78bc-494e-a600-bb11559bf774/mQEbngnS8C.json" background="transparent" speed="1" style="width: 265px; height: 180px;" loop autoplay></dotlottie-player>
                </div>

                <?php
                if ($form_validation == "No") {
                } else {
                    if (inicompute($form_validation)) {
                        echo "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                        <i class=\"fa fa-ban\"></i>
                        $form_validation
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                    </div>";
                    }
                }
                if ($this->session->flashdata('reset_success')) {
                    $message = $this->session->flashdata('reset_success');
                    echo "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                    <i class=\"fa fa-check\"></i>
                    $message
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                </div>";
                }
                ?>

                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Username" name="username" autofocus value="<?= set_value('username') ?>">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" name="remember" value="Remember Me" id="rememberMe">
                    <label class="form-check-label" for="rememberMe">Remember Me</label>
                    <span class="float-end">
                        <a href="<?= base_url('reset/index') ?>" class="link-primary">Forgot Password?</a>
                    </span>
                </div>

                <?php if (isset($siteinfos->captcha_status) && $siteinfos->captcha_status == 0) { ?>
                    <div class="mb-3">
                        <?php echo $recaptcha['widget'];
                        echo $recaptcha['script']; ?>
                    </div>
                <?php } ?>

                <div class="d-grid">
                    <input type="submit" class="btn btn-success btn-sm" value="Sign in">
                </div>

                <div class="text-center mt-1">
                    Have an account? <a href="<?= base_url('signup/index') ?>" class="link-primary" style="text-decoration: underline">Register Now</a>
                </div>
            </div>
        </div>
    </form>



</div>