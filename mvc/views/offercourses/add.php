<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fa fa-star"></i> <?= $this->lang->line('course_title') ?></h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= base_url("dashboard/index") ?>"><i class="fa fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?= base_url("section/index") ?>"><?= $this->lang->line('menu_section') ?></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><?= $this->lang->line('menu_add') ?> <?= $this->lang->line('menu_section') ?></li>
            </ol>
        </nav>
    </div>

    <div class="card-body">
        <form class="needs-validation row g-3" novalidate method="post">
            <div class="col-md-6">
                <div class="mb-3 <?= form_error('section') ? 'has-error' : '' ?>">
                    <label for="section" class="form-label"><?= $this->lang->line("course_id") ?> <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="section" name="section" value="<?= set_value('section') ?>" required>
                    <div class="invalid-feedback">
                        <?php echo form_error('section'); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 <?= form_error('subject_name') ? 'has-error' : '' ?>">
                    <label for="subject_name" class="form-label"><?= $this->lang->line("course_name") ?> <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="tags" name="subject_name" placeholder="Enter Units Name" value="<?= set_value('subject_name') ?>" required>
                    <div class="invalid-feedback">
                        <?php echo form_error('subject_name'); ?>
                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="mb-3 <?= form_error('cost') ? 'has-error' : '' ?>">
                    <label for="cost" class="form-label"><?= $this->lang->line("online_exam_cost") ?> <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="cost" name="cost" value="<?= set_value('cost') ?>" required>
                    <div class="invalid-feedback">
                        <?php echo form_error('cost'); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 <?= form_error('validDays') ? 'has-error' : '' ?>">
                    <label for="validDays" class="form-label"><?= $this->lang->line("online_exam_validDays") ?></label>
                    <input type="text" class="form-control" id="validDays" name="validDays" value="<?= set_value('validDays') ?>" required>
                    <div class="invalid-feedback">
                        <?php echo form_error('validDays'); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 <?= form_error('note') ? 'has-error' : '' ?>">
                    <label for="note" class="form-label"><?= $this->lang->line("course_description") ?></label>
                    <textarea class="form-control" id="note" name="note" rows="4" required><?= set_value('note') ?></textarea>
                    <div class="invalid-feedback">
                        <?php echo form_error('note'); ?>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="mb-3 <?= form_error('photo') ? 'has-error' : '' ?>">
                    <label for="photo" class="form-label"><?= $this->lang->line("course_photo") ?></label>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Choose file" aria-label="Upload" disabled>
                        <label class="input-group-text btn btn-success" for="photo">
                            <span class="fa fa-upload"></span> <?= $this->lang->line('section_file_browse') ?>
                        </label>
                        <input type="file" id="photo" name="photo" accept="image/png, image/jpeg, image/gif" hidden>
                    </div>
                    <div class="invalid-feedback">
                        <?php echo form_error('photo'); ?>
                    </div>
                </div>
            </div>
            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-success"><?= $this->lang->line("add_section") ?></button>
            </div>
        </form>
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