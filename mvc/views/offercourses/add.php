<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-star"></i> <?= $this->lang->line('course_title') ?></h3>

        <ol class="breadcrumb">
            <li><a href="<?= base_url("dashboard/index") ?>"><i class="fa fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a></li>
            <li class="active"><?= $this->lang->line('menu_add') ?> <?= $this->lang->line('menu_course') ?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
                <form class="form-horizontal" role="form" method="post">

                    <?php
                    if (form_error('course')) {
                        echo "<div class='form-group has-error'>";
                    } else {
                        echo "<div class='form-group'>";
                    }
                    ?>
                    <label for="course" class="col-sm-2 control-label">
                        <?= $this->lang->line("course_name") ?> <span class="text-red">*</span>
                    </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="course" name="course" value="<?= set_value('course') ?>">
                    </div>
                    <span class="col-sm-4 control-label">
                        <?php echo form_error('course'); ?>
                    </span>
            </div>

            <div class="form-group">
                <label for="subject_name" class="col-sm-2 control-label">
                    <?= $this->lang->line("subject_name") ?> <span class="text-red">*</span>
                </label>
                <div class="col-sm-6">
                    <input type="text" id="tags" name="subject_name" data-role="tagsinput" placeholder="Enter Units Name" value="<?= set_value('subject_name') ?>">
                </div>
                <span class="col-sm-4 control-label">
                    <?php echo form_error('subject_name'); ?>
                </span>
            </div>

            <?php
            if (form_error('classesID')) {
                echo "<div class='form-group has-error'>";
            } else {
                echo "<div class='form-group'>";
            }
            ?>
            <label for="classesID" class="col-sm-2 control-label">
                <?= $this->lang->line("course_classes") ?> <span class="text-red">*</span>
            </label>
            <div class="col-sm-6">
                <?php
                $classArray = array('0' => $this->lang->line("course_select_class"));
                foreach ($classes as $class) {
                    $classArray[$class->classesID] = $class->classes;
                }
                echo form_dropdown("classesID", $classArray, set_value("classesID"), "id='classesID' class='form-control select2'");
                ?>
            </div>
            <span class="col-sm-4 control-label">
                <?php echo form_error('classesID'); ?>
            </span>
        </div>

        <?php
        if (form_error('note')) {
            echo "<div class='form-group has-error'>";
        } else {
            echo "<div class='form-group'>";
        }
        ?>
        <label for="note" class="col-sm-2 control-label">
            <?= $this->lang->line("course_note") ?>
        </label>
        <div class="col-sm-6">
            <textarea class="form-control" style="resize:none;" id="note" name="note"><?= set_value('note') ?></textarea>
        </div>
        <span class="col-sm-4 control-label">
            <?php echo form_error('note'); ?>
        </span>
    </div>

    <?php
    if (form_error('validDays')) {
        echo "<div class='form-group has-error' id='validDaysDiv'>";
    } else {
        echo "<div class='form-group' id='validDaysDiv'>";
    }
    ?>
    <label for="validDays" class="col-sm-2 control-label">
        <?= $this->lang->line("online_exam_validDays") ?>
    </label>
    <div class="col-sm-4">
        <input type="text" class="form-control" id="validDays" name="validDays" value="<?= set_value('validDays') ?>">
    </div>
    <span class="col-sm-4 control-label">
        <?php echo form_error('validDays'); ?>
    </span>
</div>

<?php
if (form_error('cost')) {
    echo "<div class='form-group has-error' id='costDiv'>";
} else {
    echo "<div class='form-group' id='costDiv'>";
}
?>
<label for="cost" class="col-sm-2 control-label">
    <?= $this->lang->line("course_cost") ?> <span class="text-red">*</span>
</label>
<div class="col-sm-6">
    <input type="text" class="form-control" id="cost" name="cost" value="<?= set_value('cost') ?>">
</div>
<span class="col-sm-4 control-label">
    <?php echo form_error('cost'); ?>
</span>
</div>

<div class="form-group <?= form_error('photo') ? 'has-error' : '' ?>">
    <label for="photo" class="col-sm-2 control-label">
        <?= $this->lang->line("course_photo") ?>
    </label>
    <div class="col-sm-6">
        <div class="input-group image-preview">
            <input type="text" class="form-control image-preview-filename" disabled="disabled">
            <span class="input-group-btn">
                <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                    <span class="fa fa-remove"></span>
                    <?= $this->lang->line('clear') ?>
                </button>
                <div class="btn btn-success image-preview-input">
                    <span class="fa fa-repeat"></span>
                    <span class="image-preview-input-title">
                        <?= $this->lang->line('browse') ?></span>
                    <input type="file" accept="image/png, image/jpeg, image/gif" name="photo" />
                </div>
            </span>
        </div>
    </div>
    <span class="col-sm-4">
        <?php echo form_error('photo'); ?>
    </span>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-8">
        <input type="submit" class="btn btn-success" value="<?= $this->lang->line("add_course") ?>">
    </div>
</div>

</form>
</div>
</div>
</div>
</div>

<script>
    $(".select2").select2({
        placeholder: "",
        maximumSelectionSize: 6
    });

    $(document).ready(function() {
        $('#costDiv').hide();

        $('#ispaid').change(function(event) {
            if ($(this).val() == 1) {
                $('#costDiv').show();
            } else {
                $('#costDiv').hide();
            }
        });
    });

    $(document).on('click', '#close-preview', function() {
        $('.image-preview').popover('hide');
    });

    $(function() {
        $('.image-preview-clear').click(function() {
            $('.image-preview').attr("data-content", "").popover('hide');
            $('.image-preview-filename').val("");
            $('.image-preview-clear').hide();
            $('.image-preview-input input:file').val("");
            $(".image-preview-input-title").text("<?= $this->lang->line('browse') ?>");
        });

        $(".image-preview-input input:file").change(function() {
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
