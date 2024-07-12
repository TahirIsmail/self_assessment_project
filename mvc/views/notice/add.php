<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Notice</title>
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
            width: 80%;
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
            transition: border-color 0.3s, box-shadow 0.3s !important;
        }
        .form-horizontal .form-control:focus {
            border-color: #d9534f !important; /* Red color */
            box-shadow: 0 0 5px rgba(217, 83, 79, 0.5) !important; /* Red shadow */
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
    
</head>
<body>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-calendar"></i> <?=$this->lang->line('panel_title')?></h3>
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("notice/index")?>"><?=$this->lang->line('menu_notice')?></a></li>
            <li class="active"><?=$this->lang->line('menu_add')?> <?=$this->lang->line('menu_notice')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
                <form class="form-horizontal" role="form" method="post">
                    <?php 
                        if(form_error('title')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="title" class="col-sm-2 control-label">
                            <?=$this->lang->line("notice_title")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="title" name="title" value="<?=set_value('title')?>" >
                        </div>
                        <div class="col-sm-4 control-label">
                            <?php echo form_error('title'); ?>
                        </div>
                    </div>

                    <?php 
                        if(form_error('date')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="date" class="col-sm-2 control-label">
                            <?=$this->lang->line("notice_date")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="date" name="date" value="<?=set_value('date')?>" >
                        </div>
                        <div class="col-sm-4 control-label">
                            <?php echo form_error('date'); ?>
                        </div>
                    </div>

                    <?php 
                        if(form_error('notice')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="notice" class="col-sm-2 control-label">
                            <?=$this->lang->line("notice_notice")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <textarea class="form-control" id="notice" name="notice" ><?=set_value('notice')?></textarea>
                        </div>
                        <div class="col-sm-4 control-label">
                            <?php echo form_error('notice'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="<?=$this->lang->line("add_class")?>" >
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$('#date').datepicker();
$('#notice').jqte();
</script>
</body>
</html>
