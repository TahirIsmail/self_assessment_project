<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-star"></i> <?= $this->lang->line('course_title') ?></h3>

        <ol class="breadcrumb">
            <li><a href="<?= base_url("dashboard/index") ?>"><i class="fa fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a></li>
            <li><a href="<?= base_url("offercourses/index") ?>"></i><?= $this->lang->line('menu_offercourses') ?></a></li>
            <li class="active"><?= $this->lang->line('menu_add') ?> <?= $this->lang->line('menu_offercourses') ?></li>
        </ol>
    </div><!-- /.box-header -->

    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
                <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                    <!-- Course ID (Slug) -->
                    <?php
                    if (form_error('course_id')) {
                        echo "<div class='form-group has-error'>";
                    } else {
                        echo "<div class='form-group'>";
                    }
                    ?>
                    <label for="course_id" class="col-sm-2 control-label">
                        <?= $this->lang->line("course_id") ?> <span class="text-red">*</span>
                    </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="course_id" name="course_id" value="<?= set_value('course_id') ?>">
                    </div>
                    <span class="col-sm-4 control-label">
                        <?php echo form_error('course_id'); ?>
                    </span>
            </div>

            <!-- Course Name -->
            <?php
            if (form_error('course_name')) {
                echo "<div class='form-group has-error'>";
            } else {
                echo "<div class='form-group'>";
            }
            ?>
            <label for="course_name" class="col-sm-2 control-label">
                <?= $this->lang->line("course_name") ?> <span class="text-red">*</span>
            </label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="course_name" name="course_name" value="<?= set_value('course_name') ?>">
            </div>
            <span class="col-sm-4 control-label">
                <?php echo form_error('course_name'); ?>
            </span>
        </div>

        <!-- Course Description (with CKEditor 5) -->
        <?php
        if (form_error('course_description')) {
            echo "<div class='form-group has-error'>";
        } else {
            echo "<div class='form-group'>";
        }
        ?>
        <label for="course_description" class="col-sm-2 control-label">
            <?= $this->lang->line("course_description") ?>
        </label>
        <div class="col-sm-6">
        <textarea class="form-control" style="resize:none; height: 300px; width: 100%;" id="course_description" name="course_description"><?= set_value('course_description') ?></textarea>

        </div>
        <span class="col-sm-4 control-label">
            <?php echo form_error('course_description'); ?>
        </span>
    </div>


    <div class="form-group <?= form_error('photo') ? 'has-error' : '' ?>">
        <label for="photo" class="col-sm-2 control-label">
            <?= $this->lang->line("photo") ?>
        </label>
        <div class="col-sm-6">
            <div class="input-group image-preview">
                <input type="text" class="form-control image-preview-filename" disabled="disabled">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                        <span class="fa fa-remove"></span> <?= $this->lang->line('clear') ?>
                    </button>
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
            <input type="submit" class="btn btn-success" value="<?= $this->lang->line("add_offercourses") ?>">
        </div>
    </div>
    </form>
</div>
</div>
</div>
</div>

<script>
    $(function() {
        // Image preview functionality
        $('#close-preview').click(function() {
            $('.image-preview').popover('hide');
        });

        // Image preview
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
                $(".image-preview-input-title").text("<?= $this->lang->line('browse') ?>");
                $(".image-preview-clear").show();
                $(".image-preview-filename").val(file.name);
                img.attr('src', e.target.result);
                $(".image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
            }
            reader.readAsDataURL(file);
        });
    });
</script>
<script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#course_description'))
        .catch(error => {
            console.error(error);
        });
</script>

<style>
    #course_description {
        height: 300px;
        width: 100%;
    }


</style>
