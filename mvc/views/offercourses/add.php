<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-star"></i> <?= $this->lang->line('course_title') ?></h3>


        <ol class="breadcrumb">
            <li><a href="<?= base_url("dashboard/index") ?>"><i class="fa fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a></li>
            <li><a href="<?= base_url("section/index") ?>"></i><?= $this->lang->line('menu_section') ?></a></li>
            <li class="active"><?= $this->lang->line('menu_add') ?> <?= $this->lang->line('menu_section') ?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
                <form class="form-horizontal" role="form" method="post">

                    <?php
                    if (form_error('section')) {
                        echo "<div class='form-group has-error' >";
                    } else {
                        echo "<div class='form-group' >";
                    }

                    ?>
                    <label for="section" class="col-sm-2 control-label">
                        <?= $this->lang->line("course_id") ?> <span class="text-red">*</span>
                    </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="section" name="section" value="<?= set_value('section') ?>">
                    </div>
                    <span class="col-sm-4 control-label">
                        <?php echo form_error('section'); ?>
                    </span>
            </div>

            <div class="form-group">
                <label for="note" class="col-sm-2 control-label">
                    <?= $this->lang->line("course_name") ?> <span class="text-red">*</span>
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
                echo "<div class='form-group has-error' >";
            } else {
                echo "<div class='form-group' >";
            }

            ?>
          
        </div>


        <?php
        if (form_error('note')) {
            echo "<div class='form-group has-error' >";
        } else {
            echo "<div class='form-group' >";
        }

        ?>
        <label for="note" class="col-sm-2 control-label">
            <?= $this->lang->line("course_description") ?>
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
    <?= $this->lang->line("online_exam_cost") ?> <span class="text-red">*</span>
</label>
<div class="col-sm-6">
    <input type="text" class="form-control" id="cost" name="cost" value="<?= set_value('cost') ?>">
</div>
<span class="col-sm-4 control-label">
    <?php echo form_error('cost'); ?>
</span>
</div>

<?php
if (form_error('judge')) {
    echo "<div class='form-group has-error' style='display: none;'>";
} else {
    echo "<div class='form-group' style='display: none;'>";
}

?>
<label for="judge" class="col-sm-2 control-label">
    <?= $this->lang->line("online_exam_judge") ?>
</label>
<div class="col-sm-4">
    <?php
    $array = [
        0 => $this->lang->line("online_exam_auto"),
        1 => $this->lang->line("online_exam_manually"),
    ];
    echo form_dropdown("judge", $array, set_value("judge"), "id='judge' class='form-control select2'");
    ?>
</div>

<span class="col-sm-4 control-label">
    <?php echo form_error('judge'); ?>
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
                    <?= $this->lang->line('student_clear') ?>
                </button>
                <div class="btn btn-success image-preview-input">
                    <span class="fa fa-repeat"></span>
                    <span class="image-preview-input-title">
                        <?= $this->lang->line('section_file_browse') ?></span>
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
        <input type="submit" class="btn btn-success" value="<?= $this->lang->line("add_section") ?>">
    </div>
</div>


<?php
// if(form_error('category'))
//     echo "<div class='form-group has-error' >";
// else
//     echo "<div class='form-group' >";
?>
<!-- <label for="category" class="col-sm-2 control-label">
                            <?= $this->lang->line("section_category") ?> <span class="text-red">*</span>
                        </label> -->
<!-- <div class="col-sm-6">
                            <input type="text" class="form-control" id="category" name="category" value="<?= set_value('category') ?>" >
                        </div> -->
<!-- <span class="col-sm-4 control-label">
                            <?php echo form_error('category'); ?>
                        </span> -->
<!-- </div> -->

<?php
// if(form_error('capacity'))
//     echo "<div class='form-group has-error' >";
// else
//     echo "<div class='form-group' >";
?>
<!-- <label for="capacity" class="col-sm-2 control-label">
                            <?= $this->lang->line("section_capacity") ?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="capacity" name="capacity" value="<?= set_value('capacity') ?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('capacity'); ?>
                        </span>
                    </div> -->



<?php
// if(form_error('teacherID'))
//     echo "<div class='form-group has-error' >";
// else
//     echo "<div class='form-group' >";
?>
<!-- <label for="teacherID" class="col-sm-2 control-label">
                            <?= $this->lang->line("section_teacher_name") ?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">

                            <?php
                            $array = array();
                            $array[0] = $this->lang->line("section_select_teacher");

                            foreach ($teachers as $teacher) {
                                $array[$teacher->teacherID] = $teacher->name;
                            }
                            echo form_dropdown("teacherID", $array, set_value("teacherID"), "id='teacherID' class='form-control select2'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('teacherID'); ?>
                        </span>
                    </div> -->



</form>
<?php if ($siteinfos->note == 1) { ?>
    <!-- <div class="callout callout-danger">
                        <p><b>Note:</b> Create a class and teacher before create a new section</p>
                    </div> -->
<?php } ?>

</div>
</div>
</div>
</div>

<script>
    $(".select2").select2({
        placeholder: "",
        maximumSelectionSize: 6
    });

    $(document).on('click', '#close-preview', function() {
        $('.image-preview').popover('hide');
        // Hover befor close the preview
        $('.image-preview').hover(
            function() {
                $('.image-preview').popover('show');
                $('.content').css('padding-bottom', '100px');
            },
            function() {
                $('.image-preview').popover('hide');
                $('.content').css('padding-bottom', '20px');
            }
        );
    });
    $(function() {
        $('#validDaysDiv').hide();
        $('#costDiv').hide();


        var closebtn = $('<button/>', {
            type: "button",
            text: 'x',
            id: 'close-preview',
            style: 'font-size: initial;',
        });
        closebtn.attr("class", "close pull-right");

        $('.image-preview').popover({
            trigger: 'manual',
            html: true,
            title: "<strong>Preview</strong>" + $(closebtn)[0].outerHTML,
            content: "There's no image",
            placement: 'bottom'
        });
        // Clear event
        $('.image-preview-clear').click(function() {
            $('.image-preview').attr("data-content", "").popover('hide');
            $('.image-preview-filename').val("");
            $('.image-preview-clear').hide();
            $('.image-preview-input input:file').val("");
            $(".image-preview-input-title").text("<?= $this->lang->line('student_file_browse') ?>");
        });
        // Create the preview image
        $(".image-preview-input input:file").change(function() {

            var img = $('<img/>', {
                id: 'dynamic',
                width: 250,
                height: 200,
                overflow: 'hidden'
            });
            var file = this.files[0];
            var reader = new FileReader();
            // Set preview image into the popover data-content
            reader.onload = function(e) {
                $(".image-preview-input-title").text("<?= $this->lang->line('student_file_browse') ?>");
                $(".image-preview-clear").show();
                $(".image-preview-filename").val(file.name);
                img.attr('src', e.target.result);
                $(".image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
                $('.content').css('padding-bottom', '100px');
            }
            reader.readAsDataURL(file);
        });
    })


    $('#ispaid').change(function(event) {
        if ($(this).val() == 1) {
            $('#costDiv').show();
        } else {
            $('#costDiv').hide();
        }
    });

    $(document).ready(function() {
        if ($('#ispaid').val() == 1) {
            $('#costDiv').show();
        } else {
            $('#costDiv').hide();
        }
    });
</script>