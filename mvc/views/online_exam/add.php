<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="bi bi-slideshare"></i> <?= $this->lang->line('panel_title') ?></h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= base_url("dashboard/index") ?>"><i class="bi bi-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a>
                </li>
                <li class="breadcrumb-item"><a href="<?= base_url("online_exam/index") ?>"><?= $this->lang->line('menu_online_exam') ?></a></li>
                <li class="breadcrumb-item active"><?= $this->lang->line('menu_add') ?> <?= $this->lang->line('menu_online_exam') ?></li>
            </ol>
        </nav>
    </div>
    <!-- Form Start -->
    <div class="card-body">
        <div class="row">
            <div class="col-lg-10">
                <form class="row g-3" method="post">
                    <!-- First row -->
                    <div class="col-md-6 mb-3 <?= form_error('name') ? 'has-error' : '' ?>">
                        <label for="name" class="form-label">
                            <?= $this->lang->line("online_exam_name") ?><span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= set_value('name') ?>">
                        <div class="text-danger">
                            <?php echo form_error('name'); ?>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3 <?= form_error('description') ? 'has-error' : '' ?>">
                        <label for="description" class="form-label">
                            <?= $this->lang->line("online_exam_description") ?>
                        </label>
                        <textarea class="form-control" id="description" name="description"><?= set_value('description') ?></textarea>
                        <div class="text-danger">
                            <?php echo form_error('description'); ?>
                        </div>
                    </div>

                    <!-- Second row -->
                    <div class="col-md-6 mb-3 <?= form_error('classes') ? 'has-error' : '' ?>">
                        <label for="classes" class="form-label">
                            <?= $this->lang->line("online_exam_class") ?>
                        </label>
                        <?php
                        $array = array(0 => $this->lang->line("online_exam_select"));
                        if (inicompute($classes)) {
                            foreach ($classes as $class) {
                                $array[$class->classesID] = $class->classes;
                            }
                        }
                        echo form_dropdown("classes", $array, set_value("classes"), "id='classes' class='form-select'");
                        ?>
                        <div class="text-danger">
                            <?php echo form_error('classes'); ?>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3 <?= form_error('section') ? 'has-error' : '' ?>">
                        <label for="section" class="form-label">
                            <?= $this->lang->line("online_exam_section") ?>
                        </label>
                        <?php
                        $array = array(0 => $this->lang->line("online_exam_select"));
                        if (inicompute($sections)) {
                            foreach ($sections as $section) {
                                $array[$section->sectionID] = $section->section;
                            }
                        }
                        echo form_dropdown("section", $array, set_value("section"), "id='section' class='form-select'");
                        ?>
                        <div class="text-danger">
                            <?php echo form_error('section'); ?>
                        </div>
                    </div>

                    <!-- Third row -->
                    <div class="col-md-6 mb-3 <?= form_error('subject') ? 'has-error' : '' ?>">
                        <label for="subject" class="form-label">
                            <?= $this->lang->line("online_exam_subject") ?>
                        </label>
                        <?php
                        $array = array(0 => $this->lang->line("online_exam_select"));
                        if (inicompute($subjects)) {
                            foreach ($subjects as $subject) {
                                $array[$subject->subjectID] = $subject->subject;
                            }
                        }
                        echo form_dropdown("subject", $array, set_value("subject"), "id='subject' class='form-select'");
                        ?>
                        <div class="text-danger">
                            <?php echo form_error('subject'); ?>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3 <?= form_error('examStatus') ? 'has-error' : '' ?>">
                        <label for="examStatus" class="form-label">
                            <?= $this->lang->line("online_exam_exam_status") ?> <span class="text-danger">*</span>
                        </label>
                        <?php
                        $arrayStatus['0'] = $this->lang->line("online_exam_select");
                        $arrayStatus['1'] = $this->lang->line("online_exam_one_time");
                        $arrayStatus['2'] = $this->lang->line("online_exam_multiple_time");
                        echo form_dropdown("examStatus", $arrayStatus, set_value("examStatus"), "id='examStatus' class='form-select'");
                        ?>
                        <div class="text-danger">
                            <?php echo form_error('examStatus'); ?>
                        </div>
                    </div>

                    <!-- Fourth row -->
                    <div class="col-md-6 mb-3 <?= form_error('duration') ? 'has-error' : '' ?>" id="durationDiv">
                        <label for="duration" class="form-label">
                            <?= $this->lang->line("online_exam_duration") ?>
                        </label>
                        <input type="text" class="form-control" id="duration" name="duration" value="<?= set_value('duration') ?>" placeholder="<?= $this->lang->line("online_exam_minute") ?>">
                        <div class="text-danger">
                            <?php echo form_error('duration'); ?>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3 <?= form_error('startdate') ? 'has-error' : '' ?>" id="startdateDiv">
                        <label for="startdate" class="form-label">
                            <?= $this->lang->line("online_exam_startdatetime") ?> <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="startdate" name="startdate" value="<?= set_value('startdate') ?>">
                        <div class="text-danger">
                            <?php echo form_error('startdate'); ?>
                        </div>
                    </div>

                    <!-- Fifth row -->
                    <div class="col-md-6 mb-3 <?= form_error('cost') ? 'has-error' : '' ?>" id="costDiv">
                        <label for="cost" class="form-label">
                            <?= $this->lang->line("online_exam_cost") ?> <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="cost" name="cost" value="<?= set_value('cost') ?>">
                        <div class="text-danger">
                            <?php echo form_error('cost'); ?>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3 <?= form_error('judge') ? 'has-error' : '' ?>" style="display: none;">
                        <label for="judge" class="form-label">
                            <?= $this->lang->line("online_exam_judge") ?>
                        </label>
                        <?php
                        $array = [
                            0 => $this->lang->line("online_exam_auto"),
                            1 => $this->lang->line("online_exam_manually")
                        ];
                        echo form_dropdown("judge", $array, set_value("judge"), "id='judge' class='form-select'");
                        ?>
                        <div class="text-danger">
                            <?php echo form_error('judge'); ?>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-12 ">
                        <input type="submit" class="btn btn-success" value="<?= $this->lang->line("add_class") ?>">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    // Initialize select2 components
    $('.form-select').select2();

    // DatePicker logic and more
    $(document).ready(function() {
        var type = "<?= $posttype ?>";
        adjustFormBasedOnType(type);
    });

    $('#type').change(function() {
        var type = $(this).val();
        adjustFormBasedOnType(type);
    });

    function adjustFormBasedOnType(type) {
        if (type == 4) {
            $('#startdateDiv').show();
            $('#enddateDiv').show();
            $('#startdatetimeDiv').hide();
            $('#enddatetimeDiv').hide();

            $('#startdate').datetimepicker({
                viewMode: 'years',
                format: 'DD-MM-YYYY'
            });
            $('#enddate').datetimepicker({
                viewMode: 'years',
                format: 'DD-MM-YYYY'
            });
        } else if (type == 5) {
            $('#startdatetimeDiv').show();
            $('#enddatetimeDiv').show();
            $('#enddateDiv').hide();
            $('#startdateDiv').hide();

            $('#startdatetime').datetimepicker({
                viewMode: 'years',
                format: 'DD-MM-YYYY hh:mm a'
            });
            $('#enddatetime').datetimepicker({
                viewMode: 'years',
                format: 'DD-MM-YYYY hh:mm a'
            });
        } else {
            $('#startdateDiv').hide();
            $('#enddateDiv').hide();
            $('#startdatetimeDiv').hide();
            $('#enddatetimeDiv').hide();
        }
    }

    // Handle ispaid logic
    $('#ispaid').change(function() {
        if ($(this).val() == 1) {
            $('#costDiv').show();
        } else {
            $('#costDiv').hide();
        }
    });

    // Initial hide/show logic
    $(document).ready(function() {
        if ($('#ispaid').val() == 1) {
            $('#costDiv').show();
        } else {
            $('#costDiv').hide();
        }
    });

    // Ajax calls for section and subject based on class and section changes
    $("#classes").change(function() {
        var id = $(this).val();
        if (parseInt(id)) {
            $.ajax({
                type: 'POST',
                url: "<?= base_url('online_exam/getSection') ?>",
                data: {
                    "id": id
                },
                dataType: "html",
                success: function(data) {
                    $('#section').html(data);
                }
            });
        }
    });

    $("#section").change(function() {
        var id = $(this).val();
        if (parseInt(id)) {
            $.ajax({
                type: 'POST',
                url: "<?= base_url('online_exam/getSubject') ?>",
                data: {
                    "sectionID": id
                },
                dataType: "html",
                success: function(data) {
                    $('#subject').html(data);
                }
            });
        }
    });
</script>