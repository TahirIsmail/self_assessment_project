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
            background-image: linear-gradient(#ce2029, #800000) !important;
            color: #fff !important;
            padding: 15px !important;
            border-top-left-radius: 5px !important;
            border-top-right-radius: 5px !important;
            transition: background-color 0.3s ease !important;
            display: flex !important;
            align-items: center !important;
            justify-content: flex-start !important; /* Align items to the left */
        }

        .box-title {
            font-size: 20px !important;
            font-weight: bold !important;
            margin-right: auto !important; /* Add space between title and buttons */
        }

        .breadcrumb {
            background-color: transparent !important;
            margin-bottom: 0 !important;
            padding: 0 !important;
            list-style: none !important;
            display: flex !important;
            align-items: center !important;
            flex-wrap: wrap !important;
            padding: 8px 0 !important;
            margin-bottom: 1rem !important;
        }

        .breadcrumb li {
            display: inline !important;
            font-size: 14px !important;
        }

        .breadcrumb li a {
            color: #fff !important;
            text-decoration: none !important;
            padding: 0 5px !important;
        }

        .breadcrumb li::after {
            content: "/" !important;
            color: #fff !important;
            padding: 0 5px !important;
        }

        .breadcrumb li:last-child::after {
            content: "" !important;
        }

        .breadcrumb li.active {
            color: #ffeb3b !important;
        }

        .page-header {
            border-bottom: 1px solid #ddd !important;
            padding-bottom: 10px !important;
            margin-bottom: 20px !important;
        }

        .page-header a {
            background-image: linear-gradient(#ce2029, #800000) !important;
            color: #fff !important;
            padding: 10px 20px !important;
            border-radius: 5px !important;
            text-decoration: none !important;
            transition: background-color 0.3s ease !important;
        }

        .page-header a:hover {
            background-color: #ce2029 !important;
        }

        .table {
            width: 100% !important;
            margin-bottom: 20px !important;
            border-collapse: collapse !important;
            transition: all 0.3s ease-in-out !important;
        }

        .table-hover tbody tr:hover {
            background-color: #f5f5f5 !important;
        }

        .table th, .table td {
            padding: 15px !important;
            border: 1px solid #ddd !important;
        }

        .table th {
            background-image: linear-gradient(#ce2029, #800000) !important;
            color: #fff !important;
        }

        .table td {
            background-color: #fff !important;
            color: #333 !important;
        }

        .btn {
            padding: 6px 12px !important;
            border: none !important;
            border-radius: 4px !important;
            cursor: pointer !important;
        }

        .btn-primary {
            background-color: #ce2029 !important;
            color: white !important;
        }

        .btn-danger {
            background-color: #ce2029 !important;
            color: white !important;
        }

        .btn-primary:hover {
            background-color: #800000 !important;
        }

        .btn-danger:hover {
            background-color: #800000 !important;
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
