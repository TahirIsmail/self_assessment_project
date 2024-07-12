<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Management</title>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><i class="fa icon-student"></i> Student</h3>
            <ol class="breadcrumb">
                <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> Dashboard</a></li>
                <li class="active">Student</li>
            </ol>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    <h5 class="page-header">
                        <?php if(permissionChecker('student_add')) { ?>
                            <a href="<?php echo base_url('student/add') ?>">
                                <i class="fa fa-plus"></i> Add a student
                            </a>
                        <?php } ?>
                    </h5>
                    <div class="nav-tabs-custom">
                        <div class="tab-content">
                            <div id="all" class="tab-pane active">
                                <div id="hide-table">
                                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                                        <thead>
                                            <tr>
                                                <th><?=$this->lang->line('slno')?></th>
                                                <th><?=$this->lang->line('student_name')?></th>
                                                <th><?=$this->lang->line('phone')?></th> 
                                                <th><?=$this->lang->line('student_email')?></th>
                                                <th><?=$this->lang->line('student_address')?></th>
                                                <th><?=$this->lang->line('student_remarks')?></th>
                                                <th><?=$this->lang->line('action')?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(inicompute($students)) {$i = 1; foreach($students as $student) { ?>
                                                <tr>
                                                    <td><?=$i?></td>
                                                    <td><?=$student->name?></td>
                                                    <td><?=$student->phone?></td>
                                                    <td><?=$student->email?></td>
                                                    <td><?=$student->address?></td>
                                                    <td><?=$student->remarks?></td>
                                                    <td>
                                                        <?php if(permissionChecker('student_edit')) { ?>
                                                            <a href="<?=base_url('student/edit/'.$student->studentID)?>" class="btn btn-primary">Edit</a>
                                                        <?php } ?>
                                                        <?php if(permissionChecker('student_delete')) { ?>
                                                            <a href="<?=base_url('student/delete/'.$student->studentID)?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
                                                        <?php } ?>
                                                    </td>
                                                </tr>
                                            <?php $i++; }} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php foreach ($sections as $section) { ?>
                                <div id="tab<?=$section->classesID.$section->sectionID?>" class="tab-pane">
                                    <div id="hide-table">
                                        <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                                            <thead>
                                                <tr>
                                                    <th><?=$this->lang->line('slno')?></th>
                                                    <th><?=$this->lang->line('student_name')?></th>
                                                    <th><?=$this->lang->line('student_phone')?></th>
                                                    <th><?=$this->lang->line('student_email')?></th>
                                                    <th><?=$this->lang->line('student_address')?></th>
                                                    <th><?=$this->lang->line('student_remarks')?></th>
                                                    <th><?=$this->lang->line('action')?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(inicompute($allsection[$section->section])) {$i = 1; foreach($allsection[$section->section] as $student) { ?>
                                                    <tr>
                                                        <td><?=$i?></td>
                                                        <td><?=$student->name?></td>
                                                        <td><?=$student->phone?></td>
                                                        <td><?=$student->email?></td>
                                                        <td><?=$student->address?></td>
                                                        <td><?=$student->remarks?></td>
                                                        <td>
                                                            <?php if(permissionChecker('student_edit')) { ?>
                                                                <a href="<?=base_url('student/edit/'.$student->studentID)?>" class="btn btn-primary">Edit</a>
                                                            <?php } ?>
                                                            <?php if(permissionChecker('student_delete')) { ?>
                                                                <a href="<?=base_url('student/delete/'.$student->studentID)?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                <?php $i++; }} ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- /.box-body -->
    </div><!-- /.box -->

</body>
</html>
