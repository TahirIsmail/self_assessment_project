<style>
    /* <reset-style> ============================ */
    button {
        border: none;
        background: none;

    }

    /* ============================ */


    /* <style for menu__icon> ======== */
    .menu__icon {
        margin-top: 15px;
        margin-left: 15px;
        width: 32px;
        height: 32px;
        padding: 4px;
        display: inline-flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: end;
        transition: transform .4s;
    }

    .menu__icon span {
        width: 100%;
        height: 0.25rem;
        border-radius: 0.125rem;
        background: linear-gradient(to right, #ed213a, #93291e);
        box-shadow: 0 .5px 2px 0 hsla(0, 0%, 0%, .2);
        transition: width .4s, transform .4s, background-color .4s;
    }

    .menu__icon :nth-child(2) {
        width: 75%;
    }

    .menu__icon :nth-child(3) {
        width: 50%;
    }

    .menu__icon:hover {
        transform: rotate(-90deg);
    }

    .menu__icon:hover span {
        width: .25rem;
        transform: translateX(-10px);
        background-color: rgb(255, 59, 48);
    }
</style>
<!-- header logo: style can be found in header.less -->
<header class="header ">

    <nav class="navbar navbar-expand-lg navbar-light " role="navigation">
        <div class="container-fluid">
            <button class="navbar-toggler sidebar-toggle" type="button" data-bs-toggle="offcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="#" class="menu__icon navbar-btn sidebar-toggle " data-toggle="offcanvas">
                <span></span>
                <span></span>
                <span></span>
            </a>
            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <!-- Language dropdown logic, assuming PHP condition to display the menu based on language_status -->


                    <!-- User dropdown -->
                    <li class="nav-item dropdown user user-menu">
                        <a href="#" class="nav-link dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?= imagelink($this->session->userdata('photo')) ?>" class="user-logo rounded-circle" alt="" />
                            <span>
                                <?php
                                $name = $this->session->userdata('name');
                                if (strlen($name) > 11) {
                                    echo substr($name, 0, 11) . "..";
                                } else {
                                    echo $name;
                                }
                                ?>
                            </span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                            <li class="user-body">
                                <div class="row text-center">
                                    <div class="col-6">
                                        <a href="<?= base_url("profile/index") ?>" class="dropdown-item">
                                            <i class="bi bi-briefcase"></i> <?= $this->lang->line("profile") ?>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="<?= base_url("signin/cpassword") ?>" class="dropdown-item">
                                            <i class="bi bi-lock"></i> <?= $this->lang->line("change_password") ?>
                                        </a>
                                    </div>
                                </div>
                            </li>

                            <li class="user-footer text-center">
                                <a href="<?= base_url("signin/signout") ?>" class="dropdown-item">
                                <i class="fa fa-power-off"></i>
                                    <i class="bi bi-power"></i> <?= $this->lang->line("logout") ?>
                                </a>
                            </li>
                        </ul>

                    </li>
                </ul>
            </div>
        </div>
    </nav>

</header>