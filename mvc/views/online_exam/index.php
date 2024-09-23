    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><i class="bi bi-slideshare"></i> <?= $this->lang->line('panel_title') ?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?= base_url("dashboard/index") ?>"><i class="bi bi-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $this->lang->line('panel_title') ?></li>
                </ol>
            </nav>
        </div>
    
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <?php if (permissionChecker('online_exam_add')) { ?>
                        <h5 class="page-header">
                            <a href="<?php echo base_url('online_exam/add') ?>" class="btn btn-primary">
                                <i class="bi bi-plus"></i> <?= $this->lang->line('add_title') ?>
                            </a>
                        </h5>
                    <?php } ?>

                    <div id="hide-table" class="table-responsive">
                        <table id="example1" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="col-sm-0"><?= $this->lang->line('slno') ?></th>
                                    <th class="col-sm-2"><?= $this->lang->line('online_exam_name') ?></th>
                                    <th class="col-sm-2"><?= $this->lang->line('online_exam_payment_status') ?></th>
                                    <th class="col-sm-2"><?= $this->lang->line('online_exam_cost') ?></th>
                                    <th class="col-sm-2"><?= $this->lang->line('online_exam_date') ?></th>
                                    <?php if (permissionChecker('online_exam_edit')) { ?>
                                        <th class="col-sm-2"><?= $this->lang->line('online_exam_published') ?></th>
                                    <?php } ?>
                                    <?php if (permissionChecker('online_exam_edit') || permissionChecker('online_exam_delete') || permissionChecker('online_exam_view')) { ?>
                                        <th class="col-sm-2"><?= $this->lang->line('action') ?></th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (inicompute($online_exams)) {
                                    $i = 0;
                                    foreach ($online_exams as $online_exam) {
                                        $showStatus = FALSE;
                                        if ($usertypeID == '3') {
                                            if (inicompute($student)) {
                                                if ((($student->classesID == $online_exam->classID) || ($online_exam->classID == '0')) && (($student->sectionID == $online_exam->sectionID) || ($online_exam->sectionID == '0')) && (($student->studentgroupID == $online_exam->studentGroupID) || ($online_exam->studentGroupID == '0')) && ($online_exam->published == '1') && (($online_exam->subjectID == '0') || (in_array($online_exam->subjectID, $userSubjectPluck)))) {
                                                    $showStatus = TRUE;
                                                    $i++;
                                                }
                                            }
                                        } else {
                                            $i++;
                                            $showStatus = TRUE;
                                        }

                                        if ($showStatus) { ?>
                                            <tr>
                                                <td data-title="<?= $this->lang->line('slno') ?>"><?php echo $i; ?></td>
                                                <td data-title="<?= $this->lang->line('online_exam_name') ?>">
                                                    <?php
                                                    if (strlen($online_exam->name) > 25) {
                                                        echo strip_tags(substr($online_exam->name, 0, 25) . "...");
                                                    } else {
                                                        echo strip_tags(substr($online_exam->name, 0, 25));
                                                    }
                                                    ?>
                                                </td>
                                                <td data-title="<?= $this->lang->line('online_exam_payment_status') ?>">
                                                    <?= ($online_exam->paid == 1) ? $this->lang->line('online_exam_paid') : $this->lang->line('online_exam_free'); ?>
                                                </td>
                                                <td data-title="<?= $this->lang->line('online_exam_cost') ?>">
                                                    <?= ($online_exam->paid == 1) ? number_format($online_exam->cost, '2') : number_format($online_exam->cost, '2'); ?> <?= $siteinfos->currency_code ?>
                                                </td>
                                                <td data-title="<?= $this->lang->line('online_exam_date') ?>">
                                                    <?php
                                                    if (isset($online_exam->startDateTime) && isset($online_exam->endDateTime)) {
                                                        echo date("d-M-Y", strtotime($online_exam->startDateTime)) . ' - ' . date('d-M-Y', strtotime($online_exam->endDateTime));
                                                    }
                                                    ?>
                                                </td>
                                                <?php if (permissionChecker('online_exam_edit')) { ?>
                                                    <td data-title="<?= $this->lang->line('online_exam_published') ?>">
                                                        <div class="form-check form-switch" id="<?= $online_exam->onlineExamID ?>">
                                                            <input class="form-check-input" type="checkbox" id="switch<?= $online_exam->onlineExamID ?>" <?php if ($online_exam->published == '1') echo "checked"; ?>>
                                                            <label class="form-check-label" for="switch<?= $online_exam->onlineExamID ?>"></label>
                                                        </div>
                                                    </td>
                                                <?php } ?>
                                                <?php if (permissionChecker('online_exam_edit') || permissionChecker('online_exam_delete') || permissionChecker('online_exam_view')) { ?>
                                                    <td data-title="<?= $this->lang->line('action') ?>">
                                                        <?php if ($online_exam->published != 1) {
                                                            echo btn_extra('online_exam/addquestion/' . $online_exam->onlineExamID, $this->lang->line('addquestion'), 'online_exam_add');
                                                        } ?>
                                                        <?php echo btn_edit('online_exam/edit/' . $online_exam->onlineExamID, $this->lang->line('edit')); ?>
                                                        <?php echo btn_delete('online_exam/delete/' . $online_exam->onlineExamID, $this->lang->line('delete')); ?>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                <?php }
                                    }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
    var published = '';
    var id = 0;

    document.querySelectorAll('.form-check-input').forEach(function(element) {
        element.addEventListener('click', function() {
            if (this.checked) {
                published = 1;
                id = this.parentElement.getAttribute("id");
            } else {
                published = 2;
                id = this.parentElement.getAttribute("id");
            }

            if ((published != '' || published != null) && (id != '')) {
                $.ajax({
                    type: 'POST',
                    url: "<?= base_url('online_exam/published') ?>",
                    data: "id=" + id + "&published=" + published,
                    dataType: "html",
                    success: function(data) {
                        if (data == 'Success') {
                            toastr["success"]("Successfully updated the status");
                            // Reload the page after a short delay for smooth transition
                            setTimeout(function() {
                                location.reload();
                            }, 1000);  // 1 second delay
                        } else {
                            toastr["error"]("Error occurred while updating the status");
                        }
                    },
                    error: function(xhr, status, error) {
                        toastr["error"]("An error occurred: " + xhr.statusText);
                    }
                });
            }
        });
    });

    // Toastr options for consistent message display
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "500",
        "hideDuration": "500",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
</script>
