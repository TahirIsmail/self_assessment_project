<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5.0 CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta3/css/bootstrap.min.css" rel="stylesheet">

    <!-- CKEditor 5 from CDN -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

    <!-- Custom Styles -->
    <style>
        .has-error .form-control {
            border-color: #dc3545;
        }
        .text-red {
            color: #dc3545;
        }
    </style>
</head>
<body>

    <div class="container mt-4">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?= $this->lang->line('edit_course') ?></h3>
            </div>
            
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-10">
                        <form class="form-horizontal" action="<?= base_url('offercourses/update') ?>" role="form" method="post" enctype="multipart/form-data">
                            <!-- Hidden Course ID -->
                            <input type="hidden" name="id" value="<?= $course->id ?>">

                            <!-- Course Name -->
                            <div class="form-group <?= form_error('course_name') ? 'has-error' : '' ?>">
                                <label for="course_name" class="col-sm-2 control-label">
                                    <?= $this->lang->line("course_name") ?> <span class="text-red">*</span>
                                </label>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control" id="course_name" name="course_name" value="<?= set_value('course_name', $course->course_name) ?>">
                                </div>
                                <span class="col-sm-4 control-label">
                                    <?php echo form_error('course_name'); ?>
                                </span>
                            </div>

                            <!-- Course Description -->
                            <div class="form-group <?= form_error('course_description') ? 'has-error' : '' ?>">
                                <label for="course_description" class="col-sm-2 control-label">
                                    <?= $this->lang->line("course_description") ?>
                                </label>
                                <div class="col-sm-6">
                                    <textarea class="form-control" id="course_description" name="course_description"><?= set_value('course_description', $course->course_description) ?></textarea>
                                </div>
                                <span class="col-sm-4 control-label">
                                    <?php echo form_error('course_description'); ?>
                                </span>
                            </div>

                            <!-- Course Photo (commented out for now) -->
                            <!--
                            <div class="form-group <?= form_error('photo') ? 'has-error' : '' ?>">
                                <label for="photo" class="col-sm-2 control-label"><?= $this->lang->line("photo") ?></label>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <input type="text" class="form-control" disabled="disabled" value="<?= $course->photo ?>">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-default" style="display:none;">
                                                <span class="fa fa-remove"></span> <?= $this->lang->line('clear') ?>
                                            </button>
                                            <div class="btn btn-success">
                                                <span class="fa fa-repeat"></span>
                                                <span><?= $this->lang->line('browse') ?></span>
                                                <input type="file" accept="image/png, image/jpeg, image/gif" name="photo" />
                                            </div>
                                        </span>
                                    </div>
                                </div>
                                <span class="col-sm-4 control-label">
                                    <?php echo form_error('photo'); ?>
                                </span>
                            </div>
                            -->

                            <!-- Submit Button -->
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-8">
                                    <input type="submit" class="btn btn-success" value="<?= $this->lang->line("edit_course") ?>">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5.0 JS (including Popper.js for tooltips and popovers) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta3/js/bootstrap.min.js"></script>

    <!-- Initialize CKEditor 5 for the course_description field -->
    <script>
        ClassicEditor
            .create(document.querySelector('#course_description'))
            .catch(error => {
                console.error(error);
            });
    </script>
</body>
</html>
