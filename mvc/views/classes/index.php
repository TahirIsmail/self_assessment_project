<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Class Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .box {
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
            margin-top: 20px;
            background-color: #ffffff;
        }

        .box:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .box-header {
            background-image: linear-gradient(to right, #fff, #ff9068);
            color: #333;
            padding: 10px 20px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 60px;
        }

        .box-title {
            font-size: 24px !important;
            font-weight: bold;
            color: #e55039 !important;
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
            color: #ffffff;
            text-decoration: none;
        }

        .breadcrumb li a:hover {
            text-decoration: underline;
        }

        .page-header a {
            background-color: #ff4e50;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .page-header a:hover {
            background-color: #e55039;
        }

        #example1 {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        #example1 thead th {
            background-color: #f2f2f2;
            color: #333;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        #example1 tbody td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        #example1 tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        #example1 tbody tr:hover {
            background-color: #f1f1f1;
        }

        .btn-edit, .btn-delete {
            background-color: #ff4e50;
            border: none;
            color: #fff;
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            margin-right: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-edit:hover, .btn-delete:hover {
            background-color: #e55039;
        }
    </style>
</head>
<body>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><strong>Classes</strong></h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    <?php 
                        $usertype = $this->session->userdata("usertype");
                        if(permissionChecker('classes_add')) {
                    ?>
                        <h5 class="page-header">
                            <a href="<?php echo base_url('classes/add') ?>">
                                <i class="fa fa-plus"></i> 
                                <?=$this->lang->line('add_title')?>
                            </a>
                        </h5>
                    <?php } ?>

                    <div id="hide-table">
                        <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                            <thead>
                                <tr>
                                    <th class="col-lg-1"><?=$this->lang->line('slno')?></th>
                                    <th class="col-lg-2"><?=$this->lang->line('classes_name')?></th>
                                    <th class="col-lg-2"><?=$this->lang->line('classes_numeric')?></th>
                                    <th class="col-lg-3"><?=$this->lang->line('teacher_name')?></th>
                                    <th class="col-lg-2"><?=$this->lang->line('classes_note')?></th>
                                     <?php if(permissionChecker('classes_edit') || permissionChecker('classes_delete')) { ?>
                                    <th class="col-lg-2"><?=$this->lang->line('action')?></th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(inicompute($classes)) {$i = 1; foreach($classes as $class) { ?>
                                    <tr>
                                        <td data-title="<?=$this->lang->line('slno')?>">
                                            <?php echo $i; ?>
                                        </td>
                                        <td data-title="<?=$this->lang->line('classes_name')?>">
                                            <?php echo $class->classes; ?>
                                        </td>
                                        <td data-title="<?=$this->lang->line('classes_numeric')?>">
                                            <?php echo $class->classes_numeric; ?>
                                        </td>
                                        <td data-title="<?=$this->lang->line('teacher_name')?>">
                                            <?php echo $class->name; ?>
                                        </td>
                                        <td data-title="<?=$this->lang->line('classes_note')?>">
                                            <?php echo $class->note; ?>
                                        </td>
                                        <?php if(permissionChecker('classes_edit') || permissionChecker('classes_delete')) { ?>
                                        <td data-title="<?=$this->lang->line('action')?>">
                                            <?php echo btn_edit('classes/edit/'.$class->classesID, $this->lang->line('edit')) ?>
                                            <?php echo btn_delete('classes/delete/'.$class->classesID, $this->lang->line('delete')) ?>
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
</body>
</html>
