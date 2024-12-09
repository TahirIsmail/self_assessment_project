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

                    <!-- Category Selection -->
                    <div class="form-group <?= form_error('category_name') ? 'has-error' : '' ?>">
                        <label for="category_name" class="col-sm-2 control-label">
                            <?= $this->lang->line("category_name") ?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <?php
                            $array = [];
                            foreach ($categories as $category) {
                                $array[$category['id']] = $category['category_name'];
                            }
                            echo form_dropdown("category_name", $array, set_value("category_name", $course->category_id), "id='category_name' class='form-control select2'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('category_name'); ?>
                        </span>
                    </div>

                    <!-- Course ID (Slug) -->
                    <div class="form-group <?= form_error('course_id') ? 'has-error' : '' ?>">
                        <label for="course_id" class="col-sm-2 control-label">
                            <?= $this->lang->line("course_id") ?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="course_id" name="course_id" value="<?= set_value('course_id', $course->course_id) ?>">
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('course_id'); ?>
                        </span>
                    </div>

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

                    <!-- Course Description (with CKEditor 5) -->
                    <div class="form-group <?= form_error('course_description') ? 'has-error' : '' ?>">
                        <label for="course_description" class="col-sm-2 control-label">
                            <?= $this->lang->line("course_description") ?>
                        </label>
                        <div class="col-sm-6">
                            <textarea class="form-control" style="resize:none; height: 300px; width: 100%;" id="course_description" name="course_description"><?= set_value('course_description', $course->course_description) ?></textarea>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('course_description'); ?>
                        </span>
                    </div>

                    <!-- Course Photo -->
                    <div class="form-group <?= form_error('photo') ? 'has-error' : '' ?>">
                        <label for="photo" class="col-sm-2 control-label"><?= $this->lang->line("photo") ?></label>
                        <div class="col-sm-6">
                            <div class="input-group image-preview">
                                <?php if (!empty($course->photo)) { ?>
                                    <img src="<?= base_url('uploads/images/' . $course->photo) ?>" id="current-image" style="width: 250px; height: 200px; margin-bottom: 10px;">
                                    <button type="button" class="btn btn-danger" id="delete-image">× <?= $this->lang->line('delete') ?></button>
                                    <br>
                                <?php } ?>
                                <input type="hidden" name="delete_image" id="delete_image" value="0">
                                <input type="hidden" name="current_image" value="<?= $course->photo ?>">

                                <input type="text" class="form-control image-preview-filename" disabled="disabled" value="<?= $course->photo ?>">
                                <span class="input-group-btn">
                                    <div class="btn btn-success image-preview-input">
                                        <span class="fa fa-repeat"></span>
                                        <span class="image-preview-input-title"><?= $this->lang->line('browse') ?></span>
                                        <input type="file" accept="image/png, image/jpeg, image/gif" name="photo" />
                                    </div>
                                </span>
                            </div>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('photo'); ?>
                        </span>
                    </div>

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

<!-- Initialize CKEditor 5 for the course_description field -->
<script>
    ClassicEditor
        .create(document.querySelector('#course_description'))
        .catch(error => {
            console.error(error);
        });
</script>
<script>
    $(function() {
        // Handle Delete Image button click
        $('#delete-image').on('click', function() {
            // Mark image for deletion
            $('#current-image').remove(); // Remove the displayed image
            $(this).remove(); // Remove delete button
            $('#delete_image').val(1); // Set hidden input to signal deletion

            // Clear filename input
            $('.image-preview-filename').val('');
        });

        // Handle new image file selection
        $('.image-preview-input input:file').change(function() {
            var img = $('<img/>', {
                id: 'dynamic',
                width: 250,
                height: 200,
                overflow: 'hidden'
            });
            var file = this.files[0];
            var reader = new FileReader();
            reader.onload = function(e) {
                img.attr('src', e.target.result);
                $(".image-preview-filename").val(file.name);

                // Remove previous image and delete button, if present
                $('#current-image').remove();
                $('#delete-image').remove();

                // Add new image preview
                $(".image-preview").prepend(img);
            }
            reader.readAsDataURL(file);
        });
    });
</script>

