<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
        }

        .box {
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .box:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .box-header {
            background-image: linear-gradient(#ce2029,#800000) !important;
            color: #fff;
            padding: 15px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .box-header:hover {
            background-color: #ce2029;
        }

        .box-title {
            font-size: 20px;
            font-weight: bold;
        }

        .breadcrumb {
            background-color: transparent;
            margin-bottom: 0;
            padding: 10px 0;
        }

        .breadcrumb a {
            color: #fff;
        }

        .breadcrumb .active {
            color: #ffeb3b;
        }

        .page-header {
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .page-header a {
            background-color: #800000;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .page-header a:hover {
            background-color: #ce2029;
        }

        .table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
            transition: all 0.3s ease-in-out;
        }

        .table-hover tbody tr:hover {
            background-color: #f5f5f5;
        }

        .table th, .table td {
            padding: 15px;
            border: 1px solid #ddd;
        }

        .table th {
            background-color: #800000;
            color: #fff;
        }

        .table td {
            background-color: #fff;
            color: #333;
        }

        .onoffswitch-small {
            position: relative;
            width: 50px;
            -webkit-user-select:none; -moz-user-select:none; -ms-user-select: none;
        }

        .onoffswitch-small-checkbox {
            display: none;
        }

        .onoffswitch-small-label {
            display: block;
            overflow: hidden;
            cursor: pointer;
            border: 2px solid #999999;
            border-radius: 20px;
        }

        .onoffswitch-small-inner {
            display: block;
            width: 200%;
            margin-left: -100%;
            transition: margin 0.3s ease-in-out;
        }

        .onoffswitch-small-inner:before, .onoffswitch-small-inner:after {
            display: block;
            float: left;
            width: 50%;
            height: 20px;
            padding: 0;
            line-height: 20px;
            font-size: 12px;
            color: white;
            box-sizing: border-box;
        }

        .onoffswitch-small-inner:before {
            content: "ON";
            padding-left: 10px;
            background-color: #4caf50;
            color: #FFFFFF;
        }

        .onoffswitch-small-inner:after {
            content: "OFF";
            padding-right: 10px;
            background-color: #f44336;
            color: #FFFFFF;
            text-align: right;
        }

        .onoffswitch-small-switch {
            display: block;
            width: 18px;
            margin: 1px;
            background: #FFFFFF;
            position: absolute;
            top: 0;
            bottom: 0;
            right: 28px;
            border: 2px solid #999999;
            border-radius: 20px;
            transition: all 0.3s ease-in-out;
        }

        .onoffswitch-small-checkbox:checked + .onoffswitch-small-label .onoffswitch-small-inner {
            margin-left: 0;
        }

        .onoffswitch-small-checkbox:checked + .onoffswitch-small-label .onoffswitch-small-switch {
            right: 0px;
        }

        /* Select2 Styles */
        .select2-container .select2-selection {
            border: 1px solid #ddd;
            border-radius: 5px;
            height: 38px;
            transition: all 0.3s ease-in-out;
        }

        .select2-container .select2-selection__arrow {
            height: 36px;
            top: 1px;
            transition: all 0.3s ease-in-out;
        }

        .select2-container .select2-selection__rendered {
            line-height: 36px;
            transition: all 0.3s ease-in-out;
        }
    </style>
</head>
<body>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-subject"></i> <?=$this->lang->line('panel_title')?></h3>

        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active"><?=$this->lang->line('menu_subject')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="page-header">
                    <?php if(permissionChecker('subject_add')) { ?>
                        <a href="<?php echo base_url('subject/add') ?>">
                            <i class="fa fa-plus"></i>
                            <?=$this->lang->line('add_title')?>
                        </a>
                    <?php } ?>
                </h5>

                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th><?=$this->lang->line('slno')?></th>
                                <th><?=$this->lang->line('subject_name')?></th>
                                <th><?=$this->lang->line('subject_author')?></th>
                                <th><?=$this->lang->line('subject_code')?></th>
                                <th><?=$this->lang->line('subject_teacher')?></th>
                                <th><?=$this->lang->line('subject_passmark')?></th>
                                <th><?=$this->lang->line('subject_finalmark')?></th>
                                <th><?=$this->lang->line('subject_type')?></th>
                                <?php if(permissionChecker('subject_edit') || permissionChecker('subject_delete')) { ?>
                                <th><?=$this->lang->line('action')?></th>
                                <?php } ?>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if(inicompute($subjects)) {$i = 1; foreach($subjects as $subject) { ?>
                                <tr>
                                    <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('subject_name')?>">
                                        <?php echo $subject->subject; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('subject_author')?>">
                                        <?php echo $subject->subject_author; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('subject_code')?>">
                                        <?php echo $subject->subject_code; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('subject_teacher')?>">
                                        <?php echo $subject->teacher_name; ?>
                                    </td>

                                    <td data-title="<?=$this->lang->line('subject_passmark')?>">
                                        <?php echo $subject->passmark; ?>
                                    </td>

                                    <td data-title="<?=$this->lang->line('subject_finalmark')?>">
                                        <?php echo $subject->finalmark; ?>
                                    </td>

                                    <td data-title="<?=$this->lang->line('subject_type')?>">
                                        <?php if($subject->type == 1) { ?>
                                            <button type="button" class="btn btn-primary btn-xs"><?php echo $this->lang->line('subject_mandatory'); ?></button>
                                        <?php } elseif($subject->type == 0) { ?>
                                            <button type="button" class="btn btn-warning btn-xs"><?php echo $this->lang->line('subject_optional'); ?></button>
                                        <?php } ?>
                                    </td>

                                    <?php if(permissionChecker('subject_edit') || permissionChecker('subject_delete')) { ?>
                                    <td data-title="<?=$this->lang->line('action')?>">
                                        <?php echo btn_edit('subject/edit/'.$subject->subjectID."/".$set, $this->lang->line('edit')) ?>
                                        <?php echo btn_delete('subject/delete/'.$subject->subjectID."/".$set, $this->lang->line('delete')) ?>
                                    </td>
                                    <?php } ?>
                                </tr>
                            <?php $i++; }} ?>
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $('.select2').select2();
    $('#classesID').change(function() {
        var classesID = $(this).val();
        if(classesID == 0) {
            $('#hide-table').hide();
        } else {
            $.ajax({
                type: 'POST',
                url: "<?=base_url('subject/subject_list')?>",
                data: "id=" + classesID,
                dataType: "html",
                success: function(data) {
                    window.location.href = data;
                }
            });
        }
    });
</script>
</body>
</html>
