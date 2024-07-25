<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-box {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
            width: 300px;
            text-align: center;
        }
        .header {
            font-weight: 600 !important;
            font-family: sans-serif;
            color: #E73535;
            margin-bottom: 20px;
        }
        .form-box input[type="text"],
        .form-box input[type="email"],
        .form-box input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
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
    </style>
</head>
<body>

<div class="form-box" id="signup-box">
    <div class="header">SIGN UP</div>
    <form action="/signup" method="post">
        <div class="body white-bg">
            <div class="lottie">
                <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script> 
                <dotlottie-player src="https://lottie.host/dc68b1cd-78bc-494e-a600-bb11559bf774/mQEbngnS8C.json" background="transparent" speed="1" style="width: 265px; height: 210px;" loop autoplay></dotlottie-player>
            </div>
            <!-- Placeholder for server-side validation or success messages -->
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
            <div class="form-group">
                <input class="form-control" placeholder="Agent ID" name="agentId" type="text" required>
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="First Name" name="fname" type="text" required>
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Last Name" name="lname" type="text" required>
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Email Address" name="email" type="email" required>
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Username" name="username" type="text" required>
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="New Password" name="password" type="password" required>
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="Confirm Password" name="confirmPassword" type="password" required>
            </div>

            <!-- Placeholder for captcha if needed -->
            <?php if (isset($siteinfos->captcha_status) && $siteinfos->captcha_status == 0) { ?>
                <div class="form-group">
                    <?php echo $recaptcha['widget'];
                    echo $recaptcha['script']; ?>
                </div>
            <?php } ?>

            <input type="submit" class="btn btn-lg btn-success btn-block" value="Sign Up">
        </div>
    </form>
</div>

</body>
</html>
