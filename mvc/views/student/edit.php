
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-student"></i> <?=$this->lang->line('panel_title')?></h3>
      
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>           
            <li class="active"><?=$this->lang->line('menu_edit')?> <?=$this->lang->line('panel_title')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
                <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group <?=form_error('name') ? 'has-error' : ''?>">
                        <label for="name_id" class="col-sm-2 control-label">
                            <?=$this->lang->line("student_name")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name_id" name="name" value="<?=set_value('name', $student->name)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('name'); ?>
                        </div>
                    </div>

                    <div class="form-group <?=form_error('dob') ? 'has-error' : ''?>">
                        <label for="dob" class="col-sm-2 control-label">
                            <?=$this->lang->line("student_dob")?>
                        </label>
                        <div class="col-sm-6">
                            <?php $dob = ''; if($student->dob) { $dob = date("d-m-Y", strtotime($student->dob)); }  ?>
                            <input type="text" class="form-control" id="dob" name="dob" value="<?=set_value('dob', $dob)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('dob'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 <?= form_error('sex') ? 'has-error' : '' ?>">
                        <label for="sex" class="form-label"><?= $this->lang->line("student_sex") ?></label>
                        <?php
                        echo form_dropdown("sex", array($this->lang->line('student_sex_male') => $this->lang->line('student_sex_male'), $this->lang->line('student_sex_female') => $this->lang->line('student_sex_female')), set_value("sex", $student->sex), "id='sex' class='form-select'");
                        ?>
                        <div class="text-danger">
                            <?php echo form_error('sex'); ?>
                        </span>
                    </div>

                    <div class="form-group <?=form_error('email') ? 'has-error' : ''?>">
                        <label for="email" class="col-sm-2 control-label">
                            <?=$this->lang->line("student_email")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="email" name="email" value="<?=set_value('email', $student->email)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('email'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 <?= form_error('phone') ? 'has-error' : '' ?>">
                        <label for="phone" class="form-label"><?= $this->lang->line("student_phone") ?></label>
                        <input type="tel" class="form-control" id="phone" name="phone" value="<?= set_value('phone', $student->phone) ?>">
                        <div class="text-danger">
                            <?php echo form_error('phone'); ?>
                        </div>
                    </div>

                    <div class="col-md-6 <?= form_error('address') ? 'has-error' : '' ?>">
                        <label for="address" class="form-label"><?= $this->lang->line("student_address") ?></label>
                        <input type="text" class="form-control" id="address" name="address" value="<?= set_value('address', $student->address) ?>">
                        <div class="text-danger">
                            <?php echo form_error('address'); ?>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 <?= form_error('state') ? 'has-error' : '' ?>">
                        <label for="state" class="form-label"><?= $this->lang->line("student_state") ?></label>
                        <input type="text" class="form-control" id="state" name="state" value="<?= set_value('state', $student->state) ?>">
                        <div class="text-danger">
                            <?php echo form_error('state'); ?>
                        </div>
                    </div>

                    <div class="col-md-6 <?= form_error('country') ? 'has-error' : '' ?>">
                        <label for="country" class="form-label"><?= $this->lang->line("student_country") ?></label>
                        <?php
                        $country['0'] = $this->lang->line('student_select_country');
                        foreach ($allcountry as $allcountryKey => $allcountryit) {
                            $country[$allcountryKey] = $allcountryit;
                        }
                        ?>
                        <?php
                        echo form_dropdown("country", $country, set_value("country", $student->country), "id='country' class='form-select select2'");
                        ?>
                        <div class="text-danger">
                            <?php echo form_error('country'); ?>
                        </span>
                    </div>

                    <div class="form-group <?=form_error('photo') ? 'has-error' : ''?>">
                        <label for="photo" class="col-sm-2 control-label">
                            <?=$this->lang->line("student_photo")?>
                        </label>
                        <div class="col-sm-6">
                            <div class="input-group image-preview">
                                <input type="text" class="form-control image-preview-filename" disabled="disabled">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                        <span class="fa fa-remove"></span>
                                        <?=$this->lang->line('student_clear')?>
                                    </button>
                                    <div class="btn btn-success image-preview-input">
                                        <span class="fa fa-repeat"></span>
                                        <span class="image-preview-input-title">
                                        <?=$this->lang->line('student_file_browse')?></span>
                                        <input type="file" accept="image/png, image/jpeg, image/gif" name="photo"/>
                                    </div>
                                </span>
                            </div>
                        </div>

                        <span class="col-sm-4">
                            <?php echo form_error('photo'); ?>
                        </span>
                    </div>

                    <div class="form-group <?=form_error('username') ? 'has-error' : ''?>">
                        <label for="username" class="col-sm-2 control-label">
                            <?=$this->lang->line("student_username")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="username" name="username" value="<?=set_value('username', $student->username)?>" >
                        </div>
                         <span class="col-sm-4 control-label">
                            <?php echo form_error('username'); ?>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <input type="submit" class="btn btn-success" value="<?= $this->lang->line("update_student") ?>">
                </div>
            </form>
        </div>
    </div>
</div>



<script type="text/javascript">
    $(".select2").select2();
    $('#dob').datepicker({
        startView: 2
    });

    $('#classesID').change(function(event) {
        var classesID = $(this).val();
        if (classesID === '0') {
            $('#classesID').val(0);
        } else {
            $.ajax({
                type: 'POST',
                url: "<?= base_url('student/sectioncall') ?>",
                data: "id=" + classesID,
                dataType: "html",
                success: function(data) {
                    $('#sectionID').html(data);
                }
            });

            $.ajax({
                type: 'POST',
                url: "<?= base_url('student/optionalsubjectcall') ?>",
                data: "id=" + classesID,
                dataType: "html",
                success: function(data2) {
                    $('#optionalSubjectID').html(data2);
                }
            });
        }
    });

    $(document).on('click', '#close-preview', function() {
        $('.image-preview').popover('hide');
        // Hover befor close the preview
        $('.image-preview').hover(
            function() {
                $('.image-preview').popover('show');
                $('.content').css('padding-bottom', '130px');
            },
            function() {
                $('.image-preview').popover('hide');
                $('.content').css('padding-bottom', '20px');
            }
        );
    });

    $(function() {
        // Create the close button
        var closebtn = $('<button/>', {
            type: "button",
            text: 'x',
            id: 'close-preview',
            style: 'font-size: initial;',
        });
        closebtn.attr("class", "close pull-right");
        // Set the popover default content
        $('.image-preview').popover({
            trigger: 'manual',
            html: true,
            title: "<strong>Preview</strong>" + $(closebtn)[0].outerHTML,
            content: "There's no image",
            placement: 'bottom'
        });
        // Clear event
        $('.image-preview-clear').click(function() {
            $('.image-preview').attr("data-content", "").popover('hide');
            $('.image-preview-filename').val("");
            $('.image-preview-clear').hide();
            $('.image-preview-input input:file').val("");
            $(".image-preview-input-title").text("<?= $this->lang->line('student_file_browse') ?>");
        });
        // Create the preview image
        $(".image-preview-input input:file").change(function() {
            var img = $('<img/>', {
                id: 'dynamic',
                width: 250,
                height: 200,
                overflow: 'hidden'
            });
            var file = this.files[0];
            var reader = new FileReader();
            // Set preview image into the popover data-content
            reader.onload = function(e) {
                $(".image-preview-input-title").text("<?= $this->lang->line('student_file_browse') ?>");
                $(".image-preview-clear").show();
                $(".image-preview-filename").val(file.name);
                img.attr('src', e.target.result);
                $(".image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
                $('.content').css('padding-bottom', '130px');
            }
            reader.readAsDataURL(file);
        });
    });
</script>