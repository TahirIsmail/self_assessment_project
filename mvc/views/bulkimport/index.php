<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Import Questions</title>
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
            background-image: linear-gradient(#ce2029, #800000) !important;
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
        .btn-info {
            background-color: #800000 !important; 
            border-color: #ac2925 !important; 
            color: white !important;
            transition: background-color 0.3s, border-color 0.3s !important;
        }
        .btn-info:hover {
            background-color: #800000 !important;
            border-color: #ac2925 !important; 
        }
        .fileUpload {
            position: relative;
            overflow: hidden;
            margin: 0 !important;
        }
        .fileUpload input.upload {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }
        .callout-danger {
            background-color: #f2dede !important;
            border-color: #ebccd1 !important;
            color: #a94442 !important;
            padding: 15px;
            margin-top: 20px;
            border-radius: 4px;
        }
        .callout-danger h4 {
            margin-top: 0;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .callout-danger p {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-upload"></i> <?=$this->lang->line('panel_title')?></h3>
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active"><?=$this->lang->line('menu_import_question')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <form enctype="multipart/form-data" style="" action="<?=base_url('bulkimport/question_bulkimport');?>" class="form-horizontal" role="form" method="post">
                    <div class="form-group">
                        <label for="photo" class="col-sm-2 control-label col-xs-8 col-md-2">
                            <?=$this->lang->line("bulkimport_add_question")?>
                            &nbsp;<i class="fa fa-question-circle" data-toggle="tooltip" data-placement="bottom" title="Download the parent sample csv file first then see the format and make a copy of that file and add your data with exact format which is used in our csv file then upload the file."></i>
                        </label>
                        <div class="col-sm-3 col-xs-4 col-md-3">
                            <input class="form-control parent" id="uploadFile" placeholder="Choose File" disabled />
                        </div>

                        <div class="col-sm-2 col-xs-6 col-md-2">
                            <div class="fileUpload btn btn-success form-control">
                                <span class="fa fa-repeat"></span>
                                <span><?=$this->lang->line("bulkimport_upload")?></span>
                                <input id="uploadBtn" type="file" class="upload parentUpload" name="csvQuestion" />
                            </div>
                        </div>

                        <div class="col-md-1 rep-mar">
                            <input type="submit" class="btn btn-success" value="<?=$this->lang->line("bulkimport_import")?>" >
                        </div>

                        <div class="col-md-1 rep-mar">
                            <a class="btn btn-info" href="<?=base_url('assets/csv/sample-question.csv')?>"><i class="fa fa-download"></i> <?=$this->lang->line("bulkimport_download_sample")?></a>
                        </div>
                    </div>
                </form>


                <?php if ($this->session->flashdata('msg')): ?>
                    <div class="callout callout-danger">
                        <h4>These data not inserted</h4>
                        <p><?=$this->session->flashdata('msg'); ?></p>
                    </div>
                <?php endif; ?>
            </div>
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->
<script type="text/javascript">
    document.getElementById("uploadBtn").onchange = function() {
        document.getElementById("uploadFile").value = this.value;
    };

    $('.parentUpload').on('change', function() {
        $('.parent').val($(this).val());
    });

</script>
</body>
</html>
