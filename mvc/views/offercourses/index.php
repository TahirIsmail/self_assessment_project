<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5.0 CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta3/css/bootstrap.min.css" rel="stylesheet">

    <!-- Your custom styles -->
    <style>
        .see-more,
        .see-less {
            color: blue;
            cursor: pointer;
            text-decoration: underline;
        }

        .course-description p {
            margin: 0;
        }
    </style>
</head>
<body>

    <div class="container mt-4">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-star"></i> <?= $this->lang->line('course_title') ?></h3>

                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url("dashboard/index") ?>">
                            <i class="fa fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?>
                        </a>
                    </li>
                    <li class="breadcrumb-item active"><?= $this->lang->line('menu_course') ?></li>
                </ol>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <?php if (permissionChecker('course_add')) { ?>
                            <h5 class="page-header">
                                <a href="<?= base_url('offercourses/add') ?>" class="btn btn-primary">
                                    <i class="fa fa-plus"></i> <?= $this->lang->line('add_title') ?>
                                </a>
                            </h5>
                        <?php } ?>

                        <div id="hide-table">
                            <table id="example1" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="col-lg-1"><?= $this->lang->line('serial_no') ?></th>
                                        <th class="col-lg-2"><?= $this->lang->line('course_id') ?></th>
                                        <th class="col-lg-2"><?= $this->lang->line('course_name') ?></th>
                                        <th class="col-lg-2"><?= $this->lang->line('course_description') ?></th>
                                        <?php if (permissionChecker('course_edit') || permissionChecker('course_delete')) { ?>
                                            <th class="col-lg-1"><?= $this->lang->line('action') ?></th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($courses)) {
                                        $i = 1;
                                        foreach ($courses as $course) { ?>
                                            <tr>
                                                <td data-title="<?= $this->lang->line('serial_no') ?>"><?= $i; ?></td>
                                                <td data-title="<?= $this->lang->line('course_id') ?>"><?= $course->course_id; ?></td>
                                                <td data-title="<?= $this->lang->line('course_name') ?>"><?= $course->course_name; ?></td>
                                                <td data-title="<?= $this->lang->line('course_description') ?>">
                                                    <p class="short-description">
                                                        <?php
                                                        $short_desc = substr($course->course_description, 0, 100);
                                                        echo $short_desc;
                                                        ?>
                                                        <?php if (strlen($course->course_description) > 100): ?>
                                                            <span class="see-more">See More</span>
                                                        <?php endif; ?>
                                                    </p>
                                                    <p class="full-description" style="display:none;">
                                                        <?= $course->course_description; ?>
                                                        <span class="see-less">See Less</span>
                                                    </p>
                                                </td>
                                                <?php if (permissionChecker('course_edit') || permissionChecker('course_delete')) { ?>
                                                    <td data-title="<?= $this->lang->line('action') ?>">
                                                        <a href="<?= base_url('offercourses/edit/' . $course->id) ?>" class="btn btn-warning btn-sm">
                                                            <i class="fa fa-pencil"></i> <?= $this->lang->line('edit') ?>
                                                        </a>
                                                        <a href="<?= base_url('offercourses/delete/' . $course->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this course?');">
                                                            <i class="fa fa-trash"></i> <?= $this->lang->line('delete') ?>
                                                        </a>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php $i++;
                                        }
                                    } else { ?>
                                        <tr>
                                            <td colspan="5"><?= $this->lang->line('no_data_available') ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap 5.0 JS (including Popper.js for tooltips and popovers) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta3/js/bootstrap.min.js"></script>

    <!-- Your existing scripts -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const seeMoreElements = document.querySelectorAll('.see-more');
            const seeLessElements = document.querySelectorAll('.see-less');

            seeMoreElements.forEach((element) => {
                element.addEventListener('click', function() {
                    const parent = this.closest('td');
                    parent.querySelector('.full-description').style.display = 'block';
                    parent.querySelector('.short-description').style.display = 'none';
                });
            });

            seeLessElements.forEach((element) => {
                element.addEventListener('click', function() {
                    const parent = this.closest('td');
                    parent.querySelector('.full-description').style.display = 'none';
                    parent.querySelector('.short-description').style.display = 'block';
                });
            });
        });

        $(".select2").select2({
            placeholder: "",
            maximumSelectionSize: 6
        });
    </script>

</body>
</html>
