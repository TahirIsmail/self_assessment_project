<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Subject</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5 !important;
        }
        .box {
            background-color: #ffffff !important;
            border-radius: 8px !important;
            box-shadow: 0 0 10px rgba(255, 0, 0, 0.1) !important;
            margin: 50px auto !important;
            padding: 20px !important;
            width: 90% !important;
            max-width: 800px !important;
        }
        .box-header {
            background-image: linear-gradient(#ce2029,#800000) !important;
            border-radius: 8px 8px 0 0 !important;
            color: white !important;
            padding: 20px !important;
            text-align: center !important;
        }
        .box-header h3 {
            margin: 0 !important;
            font-size: 24px !important;
        }
        .breadcrumb {
            background-color: transparent !important;
            margin-bottom: 0 !important;
            padding: 0 !important;
        }
        .breadcrumb li {
            display: inline !important;
            font-size: 14px !important;
        }
        .breadcrumb li a {
            color: #d9534f !important; /* Red color */
            text-decoration: none !important;
        }
        .breadcrumb li a:hover {
            text-decoration: underline !important;
        }
        .form-horizontal .form-group {
            margin-bottom: 15px !important;
        }
        .form-horizontal .control-label {
            text-align: left !important;
            font-weight: bold !important;
            color: #d9534f !important; /* Red color */
        }
        .form-horizontal .form-control {
            width: 80% !important;
            padding: 10px !important;
            box-sizing: border-box !important;
            border: 1px solid #ccc !important;
            border-radius: 4px !important;
            transition: border-color 0.3s, box-shadow 0.3s !important;
        }
        .form-horizontal .form-control:focus {
            border-color: #d9534f !important; /* Red color */
            box-shadow: 0 0 5px rgba(217, 83, 79, 0.5) !important; /* Red color */
        }
        .btn-success {
            background-color: #d9534f !important; /* Red color */
            border-color: #d9534f !important; /* Red color */
            color: white !important;
            transition: background-color 0.3s, border-color 0.3s !important;
        }
        .btn-success:hover {
            background-color: #c9302c !important; /* Dark red color */
            border-color: #ac2925 !important; /* Darker red color */
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
            background-color: #c9302c !important; /* Dark red color */
            border-color: #ac2925 !important; /* Darker red color */
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
</head>
<body>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-subject"></i> <?=$this->lang->line('panel_title')?></h3>
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("subject/index")?>"><?=$this->lang->line('menu_subject')?></a></li>
            <li class="active"><?=$this->lang->line('menu_add')?> <?=$this->lang->line('menu_subject')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <form class="form-horizontal" role="form" method="post">
                    <div class="form-group <?=form_error('teacherID') ? 'has-error' : ''?>">
                        <div class="col-sm-6">
                            <label for="teacherID" class="control-label">
                                <?=$this->lang->line("subject_teacher_name")?> <span class="text-red">*</span>
                            </label>
                            <?php
                                $array = array();
                                $array[0] = $this->lang->line("subject_select_teacher");
                                foreach ($teachers as $teacher) {
                                    $array[$teacher->teacherID] = $teacher->name;
                                }
                                echo form_dropdown("teacherID", $array, set_value("teacherID"), "id='teacherID' class='form-control select2'");
                            ?>
                            <span class="control-label">
                                <?php echo form_error('teacherID'); ?>
                            </span>
                        </div>

                        <div class="col-sm-6">
                            <label for="type" class="control-label">
                                <?=$this->lang->line("subject_type")?> <span class="text-red">*</span>
                            </label>
                            <?php
                                $arraytype['select'] = $this->lang->line("subject_select_type");
                                $arraytype[0] = $this->lang->line("subject_optional");
                                $arraytype[1] = $this->lang->line("subject_mandatory");
                                echo form_dropdown("type", $arraytype, set_value("type"), "id='type' class='form-control select2'");
                            ?>
                            <span class="control-label">
                                <?php echo form_error('type'); ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group <?=form_error('passmark') ? 'has-error' : ''?>">
                        <div class="col-sm-6">
                            <label for="passmark" class="control-label">
                                <?=$this->lang->line("subject_passmark")?> <span class="text-red">*</span>
                            </label>
                            <input type="text" class="form-control" id="passmark" name="passmark" value="<?=set_value('passmark')?>">
                            <span class="control-label">
                                <?php echo form_error('passmark'); ?>
                            </span>
                        </div>

                        <div class="col-sm-6">
                            <label for="finalmark" class="control-label">
                                <?=$this->lang->line("subject_finalmark")?> <span class="text-red">*</span>
                            </label>
                            <input type="text" class="form-control" id="finalmark" name="finalmark" value="<?=set_value('finalmark')?>">
                            <span class="control-label">
                                <?php echo form_error('finalmark'); ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group <?=form_error('subject') ? 'has-error' : ''?>">
                        <div class="col-sm-6">
                            <label for="subject" class="control-label">
                                <?=$this->lang->line("subject_name")?> <span class="text-red">*</span>
                            </label>
                            <input type="text" class="form-control" id="subject" name="subject" value="<?=set_value('subject')?>">
                            <span class="control-label">
                                <?php echo form_error('subject'); ?>
                            </span>
                        </div>

                        <div class="col-sm-6">
                            <label for="subject_author" class="control-label">
                                <?=$this->lang->line("subject_author")?>
                            </label>
                            <input type="text" class="form-control" id="subject_author" name="subject_author" value="<?=set_value('subject_author')?>">
                            <span class="control-label">
                                <?php echo form_error('subject_author'); ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group <?=form_error('subject_code') ? 'has-error' : ''?>">
                        <div class="col-sm-6">
                            <label for="subject_code" class="control-label">
                                <?=$this->lang->line("subject_code")?> <span class="text-red">*</span>
                            </label>
                            <input type="text" class="form-control" id="subject_code" name="subject_code" value="<?=set_value('subject_code')?>">
                            <span class="control-label">
                                <?php echo form_error('subject_code'); ?>
                            </span>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-12 text-center">
                            <input type="submit" class="btn btn-success" value="<?=$this->lang->line("add_subject")?>">
                        </div>
                    </div>
                </form>
                <?php if ($siteinfos->note==1) { ?>
                    <div class="callout callout-danger">
                        <p><b>Note:</b> Create a teacher before creating a new subject.</p>
                    </div>
                <?php } ?>
            </div> <!-- col-sm-12 -->
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

<script type="text/javascript">
$('.select2').select2();
</script>
</body>
</html>
