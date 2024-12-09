<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">

        <h3 class="card-title mb-0">
            <i class="fa fa-user-graduate"></i> <?= $this->lang->line('panel_title') ?>
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url("dashboard/index") ?>"><i class="fa fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $this->lang->line('menu_student') ?></li>
            </ol>
        </nav>

    </div>

    <!-- form start -->
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <h5 class="page-header">
                    <?php
                    $usertype = $this->session->userdata("usertype");
                    if (permissionChecker('student_add')) {
                    ?>
                        <a href="<?php echo base_url('student/add') ?>" class="btn btn-primary">
                            <i class="fa fa-plus"></i> <?= $this->lang->line('add_title') ?>
                        </a>
                    <?php } ?>
                </h5>

                <?php if (inicompute($students) > 0) { ?>

                    <div class="tab-content" id="studentTabsContent">
                        <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                            <div class="table-responsive mt-3">
                                <table id="example1" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th><?= $this->lang->line('slno') ?></th>
                                            <th><?= $this->lang->line('student_name') ?></th>
                                            <th><?= $this->lang->line('student_email') ?></th>
                                            <?php if (permissionChecker('student_edit')) { ?>
                                                <th><?= $this->lang->line('student_status') ?></th>
                                            <?php } ?>
                                            <?php if (permissionChecker('student_edit') || permissionChecker('student_delete') || permissionChecker('student_view')) { ?>
                                                <th><?= $this->lang->line('action') ?></th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (inicompute($students)) {
                                            $i = 1;
                                            foreach ($students as $student) { ?>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td><?= $student->name ?></td>
                                                    <td><?= $student->email ?></td>
                                                    <?php if (permissionChecker('student_edit')) { ?>
                                                        <td>
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" id="switch<?= $student->studentID ?>" <?php if ($student->active === '1') echo "checked"; ?>>
                                                                <label class="form-check-label" for="switch<?= $student->studentID ?>"></label>
                                                            </div>
                                                        </td>
                                                    <?php } ?>
                                                    <?php if (permissionChecker('student_edit') || permissionChecker('student_delete') || permissionChecker('student_view')) { ?>
                                                        <td>
                                                            <?php
                                                            echo btn_view('student/view/' . $student->studentID . "/" . $set, $this->lang->line('view'));
                                                            echo btn_edit('student/edit/' . $student->studentID . "/" . $set, $this->lang->line('edit'));
                                                            echo btn_delete('student/delete/' . $student->studentID . "/" . $set, $this->lang->line('delete'));
                                                            ?>
                                                        </td>
                                                    <?php } ?>
                                                </tr>
                                        <?php $i++;
                                            }
                                        } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <?php foreach ($sections as $section) { ?>
                            <div class="tab-pane fade" id="tab<?= $section->classesID . $section->sectionID ?>" role="tabpanel" aria-labelledby="tab<?= $section->classesID . $section->sectionID ?>-tab">
                                <div class="table-responsive mt-3">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th><?= $this->lang->line('slno') ?></th>
                                                <th><?= $this->lang->line('student_photo') ?></th>
                                                <th><?= $this->lang->line('student_name') ?></th>
                                                <th><?= $this->lang->line('student_roll') ?></th>
                                                <th><?= $this->lang->line('student_email') ?></th>
                                                <?php if (permissionChecker('student_edit') || permissionChecker('student_delete') || permissionChecker('student_view')) { ?>
                                                    <th><?= $this->lang->line('action') ?></th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (inicompute($allsection[$section->sectionID])) {
                                                $i = 1;
                                                foreach ($allsection[$section->sectionID] as $student) {
                                                    if ($section->sectionID === $student->sectionID) { ?>
                                                        <tr>
                                                            <td><?= $i ?></td>
                                                            <td><?= profileimage($student->photo) ?></td>
                                                            <td><?= $student->name ?></td>
                                                            <td><?= $student->roll ?></td>
                                                            <td><?= $student->email ?></td>
                                                            <?php if (permissionChecker('student_edit') || permissionChecker('student_delete') || permissionChecker('student_view')) { ?>
                                                                <td>
                                                                    <?php
                                                                    echo btn_view('student/view/' . $student->studentID . "/" . $set, $this->lang->line('view'));
                                                                    echo btn_edit('student/edit/' . $student->studentID . "/" . $set, $this->lang->line('edit'));
                                                                    echo btn_delete('student/delete/' . $student->studentID . "/" . $set, $this->lang->line('delete'));
                                                                    ?>
                                                                </td>
                                                            <?php } ?>
                                                        </tr>
                                            <?php $i++;
                                                    }
                                                }
                                            } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                <?php } else { ?>
                    <div class="card mt-3">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="studentTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="all-tab" data-bs-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true"><?= $this->lang->line("student_all_students") ?></a>
                                </li>
                            </ul>

                            <div class="tab-content" id="studentTabsContent">
                                <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                    <div class="table-responsive mt-3">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th><?= $this->lang->line('slno') ?></th>
                                                    <th><?= $this->lang->line('student_photo') ?></th>
                                                    <th><?= $this->lang->line('student_name') ?></th>
                                                    <th><?= $this->lang->line('student_roll') ?></th>
                                                    <th><?= $this->lang->line('student_email') ?></th>
                                                    <?php if (permissionChecker('student_edit') || permissionChecker('student_delete') || permissionChecker('student_view')) { ?>
                                                        <th><?= $this->lang->line('action') ?></th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (inicompute($students)) {
                                                    $i = 1;
                                                    foreach ($students as $student) { ?>
                                                        <tr>
                                                            <td><?= $i ?></td>
                                                            <td><?= profileimage($student->photo) ?></td>
                                                            <td><?= $student->name ?></td>
                                                            <td><?= $student->roll ?></td>
                                                            <td><?= $student->email ?></td>
                                                            <?php if (permissionChecker('student_edit') || permissionChecker('student_delete') || permissionChecker('student_view')) { ?>
                                                                <td>
                                                                    <?php
                                                                    echo btn_view('student/view/' . $student->studentID . "/" . $set, $this->lang->line('view'));
                                                                    echo btn_edit('student/edit/' . $student->studentID . "/" . $set, $this->lang->line('edit'));
                                                                    echo btn_delete('student/delete/' . $student->studentID . "/" . $set, $this->lang->line('delete'));
                                                                    ?>
                                                                </td>
                                                            <?php } ?>
                                                        </tr>
                                                <?php $i++;
                                                    }
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>


  
  <script type="text/javascript">
    // Ensure select2 is initialized
    $(".select2").select2();

    // Handle class change for filtering students
    $('#classesID').change(function() {
        var classesID = $(this).val();

        if (classesID == 0) {
            $('#hide-table').hide();
            $('.nav-tabs-custom').hide();
        } else {
            $.ajax({
                type: 'POST',
                url: "<?= base_url('student/student_list') ?>",
                data: "id=" + classesID,
                dataType: "html",
                success: function(data) {
                    window.location.href = data;
                }
            });
        }
    });

    // Switch toggle functionality for student status
    $('.form-check-input').click(function() {
        var status = '';
        var id = $(this).attr("id").replace("switch", ""); // Extract student ID

        if ($(this).prop('checked')) {
            status = 'checked'; // When the switch is toggled on
        } else {
            status = 'unchecked'; // When the switch is toggled off
        }

        if (status != '' && id != '') {
            $.ajax({
                type: 'POST',
                url: "<?= base_url('student/active') ?>",
                data: { id: id, status: status },
                dataType: "html",
                success: function(data) {
                    if (data === 'Success') {
                        // Display success notification
                        toastr.success("Status updated successfully!");
                    } else {
                        // Display error notification
                        toastr.error("An error occurred while updating the status.");
                    }
                },
                error: function() {
                    // Display server error notification
                    toastr.error("A server error occurred.");
                }
            });
        }
    });

    // Toastr notification settings
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
</script>
