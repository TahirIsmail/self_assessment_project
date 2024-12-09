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
    <div class="card bg-white rounded">
        <div class="header text-center p-1 ">Reset Password </div>

        <form role="form" method="post">
            <div class="p-4 rounded">
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
                if ($this->session->flashdata('reset_send')) {
                    $message = $this->session->flashdata('reset_send');
                    echo "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                        <i class=\"fa fa-check\"></i>
                        $message
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                    </div>";
                } else {
                    if ($this->session->flashdata('reset_error')) {
                        $message = $this->session->flashdata('reset_error');
                        echo "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                            <i class=\"fa fa-ban\"></i>
                            $message
                            <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                        </div>";
                    }
                }
                ?>
                <div class="p-3">
                    <div class="d-flex justify-content-center align-items-center mb-3" style="height: 169px;">
                        <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
                        <dotlottie-player src="https://lottie.host/dc68b1cd-78bc-494e-a600-bb11559bf774/mQEbngnS8C.json" background="transparent" speed="1" style="width: 265px; height: 180px;" loop autoplay></dotlottie-player>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Email" name="email">
                    </div>

                    <div class="d-grid">
                        <input type="submit" class="btn btn-success btn-sm" value="Send">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>