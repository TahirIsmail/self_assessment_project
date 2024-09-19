<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fa iniicon-ini-emailsetting"></i> <?=$this->lang->line('panel_title')?></h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="breadcrumb-item active"><?=$this->lang->line('menu_emailsetting')?></li>
        </ol>
    </div>
    <form method="post" enctype="multipart/form-data">
        <div class="card-body">
            <fieldset class="setting-fieldset">
                <legend class="setting-legend"><?=$this->lang->line('emailsetting_email_setting')?></legend>

                <div class="row">
                    <div class="col-sm-4">
                        <div class="mb-3">
                            <label><?=$this->lang->line("emailsetting_email_engine")?>&nbsp; <i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Select Email Engine"></i></label>
                            <?php
                                $array = array(
                                    "select" => $this->lang->line("emailsetting_select"), 
                                    "sendmail" => $this->lang->line("emailsetting_send_mail"), 
                                    "smtp" => $this->lang->line("emailsetting_smtp")
                                );

                                echo form_dropdown("email_engine", $array, set_value("email_engine",$emailsetting->email_engine), "id='email_engine' class='form-select select2'");
                            ?>
                            <span class="text-danger"><?php echo form_error('email_engine'); ?></span>
                        </div>
                    </div>

                    <div class="col-sm-4 mainsmtpDIV">
                        <div class="mb-3">
                            <label for="smtp_username"><?=$this->lang->line("emailsetting_smtp_username")?>&nbsp;<i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="right" title="set your smtp username"></i></label>
                            <input type="text" class="form-control" id="smtp_username" name="smtp_username" value="<?=set_value('smtp_username', $emailsetting->smtp_username)?>" />
                            <span class="text-danger"><?=form_error('smtp_username'); ?></span>
                        </div>
                    </div>

                    <div class="col-sm-4 mainsmtpDIV">
                        <div class="mb-3">
                            <label for="smtp_password"><?=$this->lang->line("emailsetting_smtp_password")?>&nbsp;<i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="right" title="set your smtp password"></i></label>
                            <input type="text" class="form-control" id="smtp_password" name="smtp_password" value="<?=set_value('smtp_password', $emailsetting->smtp_password)?>" />
                            <span class="text-danger"><?=form_error('smtp_password'); ?></span>
                        </div>
                    </div>
                </div>

                <div class="row">                    
                    <div class="col-sm-4 mainsmtpDIV">
                        <div class="mb-3">
                            <label for="smtp_server"><?=$this->lang->line("emailsetting_smtp_server")?>&nbsp;<i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="right" title="set your smtp server"></i></label>
                            <input type="text" class="form-control" id="smtp_server" name="smtp_server" value="<?=set_value('smtp_server', $emailsetting->smtp_server)?>" />
                            <span class="text-danger"><?=form_error('smtp_server'); ?></span>
                        </div>
                    </div>

                    <div class="col-sm-4 mainsmtpDIV">
                        <div class="mb-3">
                            <label for="smtp_port"><?=$this->lang->line("emailsetting_smtp_port")?>&nbsp;<i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="right" title="set your smtp port"></i></label>
                            <input type="text" class="form-control" id="smtp_port" name="smtp_port" value="<?=set_value('smtp_port', $emailsetting->smtp_port)?>" />
                            <span class="text-danger"><?=form_error('smtp_port'); ?></span>
                        </div>
                    </div>

                    <div class="col-sm-4 mainsmtpDIV">
                        <div class="mb-3">
                            <label for="smtp_security"><?=$this->lang->line("emailsetting_smtp_security")?>&nbsp;<i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="right" title="set your smtp security"></i></label>
                            <input type="text" class="form-control" id="smtp_security" name="smtp_security" value="<?=set_value('smtp_security', $emailsetting->smtp_security)?>" />
                            <span class="text-danger"><?=form_error('smtp_security'); ?></span>
                        </div>
                    </div>
                </div>
            </fieldset>

            <div class="row">
                <div class="col-sm-8">
                    <div class="mb-3">
                        <input type="submit" class="btn btn-success" value="<?=$this->lang->line("update_emailsetting")?>" >
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    $('.select2').select2();

    $('.mainsmtpDIV').hide();

    var set_email_engine = "<?=set_value('email_engine')?>";
    if(set_email_engine == 'smtp') {
        $(".mainsmtpDIV").show('slow');
    } else if(set_email_engine == 'sendmail') {
        $(".mainsmtpDIV").hide('slow');
    } else if(set_email_engine == 'select') {
        $('.mainsmtpDIV').hide();
    } else {
        <?php if($emailsetting->email_engine == 'smtp') { ?>
            $('.mainsmtpDIV').show();
        <?php } ?>
    }

    $(document).on('change', "#email_engine", function() {
        var get_email_engine = $(this).val();
        if(get_email_engine == 'smtp') {
            $(".mainsmtpDIV").show('slow');
        } else {
            $(".mainsmtpDIV").hide('slow');
        }
    });
</script>
