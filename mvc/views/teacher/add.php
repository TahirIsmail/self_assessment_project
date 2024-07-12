<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Teacher</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        .box {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(255, 0, 0, 0.1) !important;
            margin: 50px auto;
            padding: 20px;
            width: 90%;
            max-width: 800px;
        }
        .box-header {
            background-image: linear-gradient(#ce2029,#800000) !important;
            border-radius: 8px 8px 0 0;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .box-header h3 {
            margin: 0;
            font-size: 24px;
        }
        .breadcrumb {
            background-color: transparent;
            margin-bottom: 0;
            padding: 0;
        }
        .breadcrumb li {
            display: inline;
            font-size: 14px;
        }
        .breadcrumb li a {
            color: #d9534f; /* Red color */
            text-decoration: none;
        }
        .breadcrumb li a:hover {
            text-decoration: underline;
        }
        .form-horizontal .form-group {
            margin-bottom: 15px;
        }
        .form-horizontal .control-label {
            text-align: left;
            font-weight: bold;
            color: #d9534f; /* Red color */
        }
        .form-horizontal .form-control {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s !important;
        }
        .form-horizontal .form-control:focus {
            border-color: #d9534f !important; /* Red color */
        }
        .btn-success {
            background-color: #d9534f !important; /* Red color */
            border-color: #d9534f !important; /* Red color */
            color: white !important;
            transition: background-color 0.3s, border-color 0.3s !important;
        }
        .btn-success:hover {
            background-color: #c9302c !important ; /* Dark red color */
            border-color: #ac2925 !important ; /* Darker red color */
        }
        .input-group .btn {
            margin-left: 5px !important;
            transition: background-color 0.3s, border-color 0.3s !important;
        }
        .input-group .btn-default {
            background-color: #d9534f !important; /* Red color */
            border-color: #d9534f !important; /* Red color */
            color: white !important;
        }
        .input-group .btn-default:hover {
            background-color: #c9302c !important ; /* Dark red color */
            border-color: #ac2925 !important; /* Darker red color */
        }
        .image-preview {
            border: 1px solid #ddd !important;
            border-radius: 4px !important;
            padding: 5px !important;
        }
        .image-preview-input-title {
            color: #fff !important;
            background-color: #d9534f !important; /* Red color */
            border-color: #d9534f !important; /* Red color */
            padding: 6px 12px !important;
            cursor: pointer !important;
        }
        .image-preview-input input[type=file] {
            position: absolute !important;
            top: 0 !important;
            right: 0 !important;
            margin: 0 !important;
            padding: 0 !important;
            font-size: 20px !important;
            cursor: pointer !important;
            opacity: 0 !important;
            filter: alpha(opacity=0) !important;
        }
        .popover-title {
            background-color: #d9534f !important; /* Red color */
            color: white !important;
            border-radius: 4px 4px 0 0 !important;
            padding: 8px 14px !important;
            font-weight: bold !important;
        }
        .popover-content {
            padding: 14px !important;
        }
        .has-error .form-control {
            border-color: #d9534f !important; /* Red color */
        }
        .has-error .control-label {
            color: #d9534f !important; /* Red color */
        }
        .text-red {
            color: #d9534f !important; /* Red color */
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
</head>
<body>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-teacher"></i> <?=$this->lang->line('panel_title')?></h3>
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("teacher/index")?>"><?=$this->lang->line('menu_teacher')?></a></li>
            <li class="active"><?=$this->lang->line('menu_add')?> <?=$this->lang->line('menu_teacher')?></li>
        </ol>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                    <div class="form-group <?=form_error('name') ? 'has-error' : ''?>">
                        <div class="col-sm-6">
                            <label for="name_id" class="control-label">
                                <?=$this->lang->line("teacher_name")?> <span class="text-red">*</span>
                            </label>
                            <input type="text" class="form-control" id="name_id" name="name" value="<?=set_value('name')?>">
                            <span class="control-label">
                                <?php echo form_error('name'); ?>
                            </span>
                        </div>

                        <div class="col-sm-6">
                            <label for="designation" class="control-label">
                                <?=$this->lang->line("teacher_designation")?> <span class="text-red">*</span>
                            </label>
                            <input type="text" class="form-control" id="designation" name="designation" value="<?=set_value('designation')?>">
                            <span class="control-label">
                                <?php echo form_error('designation'); ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group <?=form_error('dob') ? 'has-error' : ''?>">
                        <div class="col-sm-6">
                            <label for="dob" class="control-label">
                                <?=$this->lang->line("teacher_dob")?> <span class="text-red">*</span>
                            </label>
                            <input type="text" class="form-control" id="dob" name="dob" value="<?=set_value('dob')?>">
                            <span class="control-label">
                                <?php echo form_error('dob'); ?>
                            </span>
                        </div>

                        <div class="col-sm-6">
                            <label for="sex" class="control-label">
                                <?=$this->lang->line("teacher_sex")?>
                            </label>
                            <?php
                                echo form_dropdown("sex", array($this->lang->line('teacher_sex_male') => $this->lang->line('teacher_sex_male'), $this->lang->line('teacher_sex_female') => $this->lang->line('teacher_sex_female')), set_value("sex"), "id='sex' class='form-control'");
                            ?>
                            <span class="control-label">
                                <?php echo form_error('sex'); ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group <?=form_error('religion') ? 'has-error' : ''?>">
                        <div class="col-sm-6">
                            <label for="religion" class="control-label">
                                <?=$this->lang->line("teacher_religion")?>
                            </label>
                            <input type="text" class="form-control" id="religion" name="religion" value="<?=set_value('religion')?>">
                            <span class="control-label">
                                <?php echo form_error('religion'); ?>
                            </span>
                        </div>

                        <div class="col-sm-6">
                            <label for="email" class="control-label">
                                <?=$this->lang->line("teacher_email")?> <span class="text-red">*</span>
                            </label>
                            <input type="text" class="form-control" id="email" name="email" value="<?=set_value('email')?>">
                            <span class="control-label">
                                <?php echo form_error('email'); ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group <?=form_error('phone') ? 'has-error' : ''?>">
                        <div class="col-sm-6">
                            <label for="phone" class="control-label">
                                <?=$this->lang->line("teacher_phone")?>
                            </label>
                            <input type="text" class="form-control" id="phone" name="phone" value="<?=set_value('phone')?>">
                            <span class="control-label">
                                <?php echo form_error('phone'); ?>
                            </span>
                        </div>

                        <div class="col-sm-6">
                            <label for="address" class="control-label">
                                <?=$this->lang->line("teacher_address")?>
                            </label>
                            <input type="text" class="form-control" id="address" name="address" value="<?=set_value('address')?>">
                            <span class="control-label">
                                <?php echo form_error('address'); ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group <?=form_error('jod') ? 'has-error' : ''?>">
                        <div class="col-sm-6">
                            <label for="jod" class="control-label">
                                <?=$this->lang->line("teacher_jod")?> <span class="text-red">*</span>
                            </label>
                            <input type="text" class="form-control" id="jod" name="jod" value="<?=set_value('jod')?>">
                            <span class="control-label">
                                <?php echo form_error('jod'); ?>
                            </span>
                        </div>

                        <div class="col-sm-6">
                            <label for="photo" class="control-label">
                                <?=$this->lang->line("teacher_photo")?>
                            </label>
                            <div class="input-group image-preview">
                                <input type="text" class="form-control image-preview-filename" disabled="disabled">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                        <span class="fa fa-remove"></span>
                                        <?=$this->lang->line('teacher_clear')?>
                                    </button>
                                    <div class="btn btn-success image-preview-input">
                                        <span class="fa fa-repeat"></span>
                                        <span class="image-preview-input-title">
                                        <?=$this->lang->line('teacher_file_browse')?></span>
                                        <input type="file" accept="image/png, image/jpeg, image/gif" name="photo"/>
                                    </div>
                                </span>
                            </div>
                            <span class="control-label">
                                <?php echo form_error('photo'); ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group <?=form_error('username') ? 'has-error' : ''?>">
                        <div class="col-sm-6">
                            <label for="username" class="control-label">
                                <?=$this->lang->line("teacher_username")?> <span class="text-red">*</span>
                            </label>
                            <input type="text" class="form-control" id="username" name="username" value="<?=set_value('username')?>">
                            <span class="control-label">
                                <?php echo form_error('username'); ?>
                            </span>
                        </div>

                        <div class="col-sm-6">
                            <label for="password" class="control-label">
                                <?=$this->lang->line("teacher_password")?> <span class="text-red">*</span>
                            </label>
                            <input type="password" class="form-control" id="password" name="password" value="<?=set_value('password')?>">
                            <span class="control-label">
                                <?php echo form_error('password'); ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12 text-center">
                            <input type="submit" class="btn btn-success" value="<?=$this->lang->line("add_teacher")?>">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$('#dob').datepicker({ startView: 2 });
$('#jod').datepicker();

$(document).on('click', '#close-preview', function(){
    $('.image-preview').popover('hide');
    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
           $('.content').css('padding-bottom', '100px');
        },
         function () {
           $('.image-preview').popover('hide');
           $('.content').css('padding-bottom', '20px');
        }
    );
});

$(function() {
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("<?=$this->lang->line('teacher_file_browse')?>");
    });
    $(".image-preview-input input:file").change(function (){
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200,
            overflow:'hidden'
        });
        var file = this.files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
            $(".image-preview-input-title").text("<?=$this->lang->line('teacher_file_browse')?>");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
            $('.content').css('padding-bottom', '100px');
        }
        reader.readAsDataURL(file);
    });
});
</script>
</body>
</html>
