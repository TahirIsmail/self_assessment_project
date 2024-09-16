<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fa fa-star"></i> <?= $this->lang->line('panel_title') ?></h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url("dashboard/index") ?>"><i class="fa fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a></li>
                <li class="breadcrumb-item"><a href="<?= base_url("section/index") ?>"></i><?= $this->lang->line('menu_section') ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $this->lang->line('menu_add') ?> <?= $this->lang->line('menu_section') ?></li>
            </ol>
        </nav>
    </div>

    <div class="card-body">
        <form method="post">

            <!-- Row 1: Section Name and Subject Name -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="section" class="col-form-label"><?= $this->lang->line("section_name") ?> <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="section" name="section" value="<?= set_value('section') ?>">
                    <span class="text-danger"><?php echo form_error('section'); ?></span>
                </div>

                <div class="col-md-6">
                    <label for="tags" class="col-form-label"><?= $this->lang->line("subject_name") ?> <span class="text-danger">*</span></label>
                    <input type="text" id="tags" name="subject_name" data-role="tagsinput" placeholder="Enter Units Name" class="form-control" value="<?= set_value('subject_name') ?>">
                    <span class="text-danger"><?php echo form_error('subject_name'); ?></span>
                </div>
            </div>

            <!-- Row 2: Classes/Department and Note -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="classesID" class="col-form-label">
                        <?= $siteinfos->school_type == 'classbase' ? $this->lang->line("section_classes") . ' <span class="text-danger">*</span>' : $this->lang->line("section_department") ?>
                    </label>
                    <?php
                    $array = array(0 => $siteinfos->school_type == 'classbase' ? $this->lang->line("section_select_class") : $this->lang->line("section_select_department"));
                    foreach ($classes as $classa) {
                        $array[$classa->classesID] = $classa->classes;
                    }
                    echo form_dropdown("classesID", $array, set_value("classesID"), "id='classesID' class='form-select select2'");
                    ?>
                    <span class="text-danger"><?php echo form_error('classesID'); ?></span>
                </div>

                <div class="col-md-6">
                    <label for="note" class="col-form-label"><?= $this->lang->line("section_note") ?></label>
                    <textarea class="form-control" id="note" name="note" style="resize: none;"><?= set_value('note') ?></textarea>
                    <span class="text-danger"><?php echo form_error('note'); ?></span>
                </div>
            </div>

            <!-- Row 3: Payment Status and Valid Days -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="ispaid" class="col-form-label"><?= $this->lang->line("online_exam_payment_status") ?> <span class="text-danger">*</span></label>
                    <?php
                    $array = [
                        5 => $this->lang->line("online_exam_select"),
                        0 => $this->lang->line("online_exam_free"),
                        1 => $this->lang->line("online_exam_paid"),
                    ];
                    echo form_dropdown("ispaid", $array, set_value("ispaid"), "id='ispaid' class='form-select select2'");
                    ?>
                    <span class="text-danger"><?php echo form_error('ispaid'); ?></span>
                </div>

                <div class="col-md-6">
                    <label for="validDays" class="col-form-label"><?= $this->lang->line("online_exam_validDays") ?></label>
                    <input type="text" class="form-control" id="validDays" name="validDays" value="<?= set_value('validDays') ?>">
                    <span class="text-danger"><?php echo form_error('validDays'); ?></span>
                </div>
            </div>

            <!-- Row 4: Cost and Judge (Hidden) -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="cost" class="col-form-label"><?= $this->lang->line("online_exam_cost") ?> <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="cost" name="cost" value="<?= set_value('cost') ?>">
                    <span class="text-danger"><?php echo form_error('cost'); ?></span>
                </div>

                <div class="col-md-6" style="display: none;">
                    <label for="judge" class="col-form-label"><?= $this->lang->line("online_exam_judge") ?></label>
                    <?php
                    $array = [
                        0 => $this->lang->line("online_exam_auto"),
                        1 => $this->lang->line("online_exam_manually"),
                    ];
                    echo form_dropdown("judge", $array, set_value("judge"), "id='judge' class='form-select select2'");
                    ?>
                    <span class="text-danger"><?php echo form_error('judge'); ?></span>
                </div>
            </div>

            <!-- Row 5: Photo Upload -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="photo" class="col-form-label"><?= $this->lang->line("section_photo") ?></label>
                    <div class="input-group">
                        <input type="text" class="form-control image-preview-filename" disabled>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-danger image-preview-clear" style="display:none;">
                                <span class="fa fa-remove"></span> <?= $this->lang->line('student_clear') ?>
                            </button>
                            <div class="btn btn-success image-preview-input">
                                <span class="fa fa-upload"></span>
                                <span class="image-preview-input-title"><?= $this->lang->line('section_file_browse') ?></span>
                                <input type="file" accept="image/png, image/jpeg, image/gif" name="photo" />
                            </div>
                        </span>
                    </div>
                    <span class="text-danger"><?php echo form_error('photo'); ?></span>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="row mb-3">
                <div class="col-sm-12">
                    <input type="submit" class="btn btn-success" value="<?= $this->lang->line("add_section") ?>">
                </div>
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