<header class="header">
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="navbar-btn sidebar-toggle switch" data-toggle="offcanvas" type="checkbox">
            <input type="checkbox">
            <span class="slider"></span>
        </a>
        
        <div class="navbar-center">
            <span class="navbar-text"><strong>SIMPLY LICENSED</strong></span>
        </div>

        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li class="dropdown messages-menu my-push-message">
                    <a href="#" class="dropdown-toggle my-push-message-a" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>
                    </a>
                    <ul class="dropdown-menu my-push-message-ul" style="display:none">
                        <li class='header my-push-message-number'></li>
                        <li>
                            <ul class="menu my-push-message-list"></ul>
                        </li>
                    </ul>
                </li>

                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= imagelink($this->session->userdata('photo')) ?>" class="user-logo" alt="" />
                        <span>
                            <?php
                            $name = $this->session->userdata('name');
                            if (strlen($name) > 11) {
                                echo substr($name, 0, 11) . "..";
                            } else {
                                echo $name;
                            }
                            ?>
                            <i class="caret"></i>
                        </span>
                    </a>

                    <ul class="dropdown-menu">
                        <li class="user-body">
                            <div class="col-xs-6 text-center">
                                <a href="<?= base_url("profile/index") ?>">
                                    <div><i class="fa fa-briefcase"></i></div>
                                    <?= $this->lang->line("profile") ?>
                                </a>
                            </div>
                            <div class="col-xs-6 text-center">
                                <a href="<?= base_url("signin/cpassword") ?>">
                                    <div><i class="fa fa-lock"></i></div>
                                    <?= $this->lang->line("change_password") ?>
                                </a>
                            </div>
                        </li>

                        <li class="user-footer">
                            <div class="text-center">
                                <a href="<?= base_url("signin/signout") ?>">
                                    <div><i class="fa fa-power-off"></i></div>
                                    <?= $this->lang->line("logout") ?>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul> 
        </div>
    </nav>
</header>
