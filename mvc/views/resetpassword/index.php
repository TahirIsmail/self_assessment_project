<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-key"></i> <?=$this->lang->line('panel_title')?></h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("dashboard/index")?>"><i class="fas fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
                <li class="breadcrumb-item active"><?=$this->lang->line('menu_resetpassword')?></li>
            </ol>
        </nav>
    </div><!-- /.card-header -->

    <!-- form start -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form class="row g-3" method="POST">
                    
                    <!-- Usertype -->
                    <div class="col-md-6">
                        <label for="usertypeID" class="form-label"><?=$this->lang->line("resetpassword_usertype")?> <span class="text-danger">*</span></label>
                        <?php
                            $usertypeArray[0] = $this->lang->line("resetpassword_select_usertype");
                            if(inicompute($usertypes)) {
                                foreach ($usertypes as $usertype) {
                                    $usertypeArray[$usertype->usertypeID] = $usertype->usertype;
                                }
                            }
                            echo form_dropdown("usertypeID", $usertypeArray, set_value("usertypeID"), " id='usertypeID' class='form-select select2' autocomplete='off' ");
                        ?>
                        <div class="invalid-feedback">
                            <?=form_error('usertypeID'); ?>
                        </div>
                    </div>

                    <!-- User -->
                    <div class="col-md-6">
                        <label for="userID" class="form-label"><?=$this->lang->line("resetpassword_user")?> <span class="text-danger">*</span></label>
                        <?php
                            $userArray[0]  = $this->lang->line("resetpassword_select_user");
                            if(inicompute($users)) {
                                $tableID   = $tableInfo['tableID'];
                                foreach ($users as $user) {
                                    if($tableID == 'systemadminID') {
                                        if($user->$tableID != 1) {
                                            $userArray[$user->$tableID] = $user->name." ( ".$user->username." )";
                                        }
                                    } else {
                                        $userArray[$user->$tableID] = $user->name." ( ".$user->username." )";
                                    }
                                }
                            }
                            echo form_dropdown("userID", $userArray, set_value("userID"), " id='userID' class='form-select select2' autocomplete='off' ");
                        ?>
                        <div class="invalid-feedback">
                            <?=form_error('userID'); ?>
                        </div>
                    </div>

                    <!-- New Password -->
                    <div class="col-md-6">
                        <label for="new_password" class="form-label"><?=$this->lang->line("resetpassword_new_password")?> <span class="text-danger">*</span></label>
                        <input type="password" class="form-control <?=form_error('new_password') ? 'is-invalid' : ''?>" id="new_password" name="new_password" autocomplete="off">
                        <div class="invalid-feedback">
                            <?=form_error('new_password'); ?>
                        </div>
                    </div>

                    <!-- Re-Password -->
                    <div class="col-md-6">
                        <label for="re_password" class="form-label"><?=$this->lang->line("resetpassword_re_password")?> <span class="text-danger">*</span></label>
                        <input type="password" class="form-control <?=form_error('re_password') ? 'is-invalid' : ''?>" id="re_password" name="re_password" autocomplete="off">
                        <div class="invalid-feedback">
                            <?=form_error('re_password'); ?>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-success"><?=$this->lang->line("resetpassword")?></button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(".select2").select2();

    $('#usertypeID').change(function() {
        var usertypeID = $(this).val();
        $.ajax({
            type: 'POST',
            url: "<?=base_url('resetpassword/get_user')?>",
            data: {'usertypeID': usertypeID},
            dataType: "html",
            success: function(data) {
               $('#userID').html(data);
            }
        });
    });
</script>
