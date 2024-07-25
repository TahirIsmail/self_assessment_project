<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa; /* Light background color */
        }

        .box {
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
            margin-top: 20px;
            background-color: #ffffff; /* White background for the box */
        }

        .box:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .box-header {
            background-image: linear-gradient(to right, #fff, #ff9068); /* Light gradient background */
            color: #333; /* Dark color for better contrast */
            padding: 5px 10px; /* Adjusted padding for smaller height */
            margin-top: 20px; /* Added margin for more space between navbar and header */
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center; /* Centered the text */
            height: 50px; /* Adjusted height for smaller header */
        }

        .box-title {
            font-size: 24px !important; /* Font size */
            font-weight: bold;
            color: #e55039 !important; /* Darker red color for better contrast */
        }

        .breadcrumb {
            display: none; /* Hiding the breadcrumb as per the requirement */
        }

        .page-header {
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .page-header a {
            background-color: #ff6347; /* Red color */
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold; /* Make button text bold */
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .page-header a:hover {
            background-color: #e55039; /* Darker red color */
            border-color: #e55039; /* Darker red color */
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
            font-weight: bold; /* Make table text bold */
        }

        .table th {
            background-color: #87cefa; /* Light blue color */
            color: #333; /* Dark color for better contrast */
        }

        .table td {
            background-color: #fff;
            color: #333;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s, border-color 0.3s;
            font-weight: bold; /* Make button text bold */
        }
        .btn-success {
            background-color: #ff4e50 !important;
            border-color: #ff4e50 !important;
           
            
        }
        .input-group .btn-default:hover {
            background-color: #e55039;
            border-color: #e55039;
        }



        .btn-primary {
            background-color: #ff6347; /* Red color */
            color: white;
        }

        .btn-danger {
            background-color: #ff6347; /* Red color */
            color: white;
        }

        .btn-primary:hover {
            background-color: #e55039; /* Darker red color */
            border-color: #e55039; /* Darker red color */
        }

        .btn-danger:hover {
            background-color: #e55039; /* Darker red color */
            border-color: #e55039; /* Darker red color */
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .box-header {
                height: auto;
                padding: 10px;
            }

            .box-title {
                font-size: 20px !important;
            }
        }

    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><strong>Student</strong></h3>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    <h5 class="page-header">
                        <?php if (permissionChecker('student_add')) { ?>
                            <a href="<?php echo base_url('student/add') ?>" class="btn btn-danger">
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
                                                <th>Agent ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Contact</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Remarks</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (inicompute($students)) {
                                                $i = 1;
                                                foreach ($students as $student) { ?>
                                                    <tr>
                                                        <td><?=$i?></td>
                                                        <td><?=$student->agent_id?></td>
                                                        <td><?=$student->Fname?></td>
                                                        <td><?=$student->lname?></td>
                                                        <td><?=$student->contact?></td>
                                                        <td><?=$student->email?></td>
                                                        <td><?=$student->address?></td>
                                                        <td><?=$student->remarks?></td>
                                                        <td>
                                                            <?php if (permissionChecker('student_edit')) { ?>
                                                                <a href="<?=base_url('student/edit/'.$student->studentID)?>" class="btn btn-primary">Edit</a>
                                                            <?php } ?>
                                                            <?php if (permissionChecker('student_delete')) { ?>
                                                                <a href="<?=base_url('student/delete/'.$student->studentID)?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                <?php $i++; 
                                                } 
                                            } ?>
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
                                                    <th>Agent ID</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>Contact</th>
                                                    <th>Email</th>
                                                    <th>Address</th>
                                                    <th>Remarks</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (inicompute($allsection[$section->section])) {
                                                    $i = 1;
                                                    foreach ($allsection[$section->section] as $student) { ?>
                                                        <tr>
                                                            <td><?=$i?></td>
                                                            <td><?=$student->agent_id?></td>
                                                            <td><?=$student->Fname?></td>
                                                            <td><?=$student->lname?></td>
                                                            <td><?=$student->contact?></td>
                                                            <td><?=$student->email?></td>
                                                            <td><?=$student->address?></td>
                                                            <td><?=$student->remarks?></td>
                                                            <td>
                                                                <?php if (permissionChecker('student_edit')) { ?>
                                                                    <a href="<?=base_url('student/edit/'.$student->studentID)?>" class="btn btn-primary">Edit</a>
                                                                <?php } ?>
                                                                <?php if (permissionChecker('student_delete')) { ?>
                                                                    <a href="<?=base_url('student/delete/'.$student->studentID)?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
                                                                <?php } ?>
                                                            </td>
                                                        </tr>
                                                    <?php $i++; 
                                                    } 
                                                } ?>
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
