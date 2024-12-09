<?php if (inicompute($profile)) { ?>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><i class="fa fa-star"></i> <?= $this->lang->line('panel_title') ?></h3>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url("dashboard/index") ?>"><i class="fa fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url("student/index/$classesID") ?>"><?= $this->lang->line('menu_student') ?></a></li>
                    <li class="breadcrumb-item active"><?= $this->lang->line('view') ?></li>
                </ol>
                </ol>
            </nav>
        </div>

        <div id="printablediv">
            <div class="card-body">

                <div class="col-sm-12">


                    <div class="col-sm-6 page-header">
                        <button class="btn btn-sm btn-primary" onclick="javascript:printDiv('printablediv')">
                            <span class="fa fa-print"></span> <?= $this->lang->line('print') ?>
                        </button>
                        <a href="<?= base_url('student/print_preview/' . $studentID . "/" . $classesID) ?>" class="btn btn-sm btn-primary">
                            <span class="fa fa-file-pdf-o"></span> <?= $this->lang->line('pdf_preview') ?>
                        </a>

                        <?php if (permissionChecker('student_edit')) { ?>
                            <a href="<?= base_url('student/edit/' . $studentID . "/" . $classesID) ?>" class="btn btn-sm btn-primary">
                                <span class="fa fa-edit"></span> <?= $this->lang->line('edit') ?>
                            </a>
                        <?php } ?>


                        <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#mail">
                            <span class="fa fa-envelope-o"></span> <?= $this->lang->line('mail') ?>
                        </button>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <img class="rounded-circle img-fluid" style="height: 80px !important;" src="<?= imagelink($profile->photo) ?>" alt="User Image" >
                                    <h3 class="mt-3"><?= $profile->name ?></h3>
                                    <p class="text-muted"><?= inicompute($usertype->usertype) ? $usertype->usertype : '' ?></p>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <b><?= $this->lang->line('student_name') ?></b>
                                            <span class="float-end"><?= $profile->name ?></span>
                                        </li>
                                        <li class="list-group-item">
                                            <b><?= $this->lang->line('student_phone') ?></b>
                                            <span class="float-end"><?= $profile->phone ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header">
                                    <ul class="nav nav-tabs card-header-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#profile" data-bs-toggle="tab"><?= $this->lang->line('student_profile') ?></a>
                                        </li>
                                        <?php if (inicompute($parents)) { ?>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#parents" data-bs-toggle="tab"><?= $this->lang->line('student_parents') ?></a>
                                            </li>
                                        <?php } ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#exam" data-bs-toggle="tab"><?= $this->lang->line('student_exam') ?></a>
                                        </li>
                                        <?php if ((permissionChecker('student_add') && permissionChecker('student_delete')) || ($this->session->userdata('usertypeID') == $profile->usertypeID && $this->session->userdata('loginuserID') == $profile->studentID)) { ?>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#document" data-bs-toggle="tab"><?= $this->lang->line('student_document') ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="profile">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <p><b><?= $this->lang->line("student_dob") ?>:</b> <?= $profile->dob ? date("d M Y", strtotime($profile->dob)) : '' ?></p>
                                                    <p><b><?= $this->lang->line("student_sex") ?>:</b> <?= $profile->sex ?></p>
                                                    <p><b><?= $this->lang->line("student_email") ?>:</b> <?= $profile->email ?></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><b><?= $this->lang->line("student_phone") ?>:</b> <?= $profile->phone ?></p>
                                                    <p><b><?= $this->lang->line("student_state") ?>:</b> <?= $profile->state ?></p>
                                                    <p><b><?= $this->lang->line("student_country") ?>:</b> <?= isset($allcountry[$profile->country]) ? $allcountry[$profile->country] : '' ?></p>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><b><?= $this->lang->line("student_username") ?>:</b> <?= $profile->username ?></p>
                                                    <p><b><?= $this->lang->line("student_address") ?>:</b> <?= $profile->address ?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <?php if (inicompute($parents)) { ?>
                                            <div class="tab-pane" id="parents">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p><b><?= $this->lang->line("parent_guargian_name") ?>:</b> <?= $parents->name ?></p>
                                                        <p><b><?= $this->lang->line("parent_father_name") ?>:</b> <?= $parents->father_name ?></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><b><?= $this->lang->line("parent_mother_name") ?>:</b> <?= $parents->mother_name ?></p>
                                                        <p><b><?= $this->lang->line("parent_father_profession") ?>:</b> <?= $parents->father_profession ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <div class="tab-pane" id="exam">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th><?= $this->lang->line('slno') ?></th>
                                                            <th><?= $this->lang->line('student_exam') ?></th>
                                                            <th><?= $this->lang->line('student_date') ?></th>
                                                            <th><?= $this->lang->line('student_status') ?></th>
                                                            <th><?= $this->lang->line('action') ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (inicompute($examresults)) {
                                                            $i = 1;
                                                            foreach ($examresults as $examresult) { ?>
                                                                <tr>
                                                                    <td><?= $i ?></td>
                                                                    <td><?= isset($onlineexams[$examresult->onlineExamID]) ? namesorting($onlineexams[$examresult->onlineExamID]->name, 40) : '' ?></td>
                                                                    <td><?= date('d M Y h:i:s A', strtotime($examresult->time)) ?></td>
                                                                    <td>
                                                                        <?php if ($examresult->statusID == 5) {
                                                                            echo '<span class="text-success">' . $this->lang->line('student_pass') . '</span>';
                                                                        } elseif ($examresult->statusID == 10) {
                                                                            echo '<span class="text-danger">' . $this->lang->line('student_fail') . '</span>';
                                                                        } ?>
                                                                    </td>
                                                                    <td>
                                                                        <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#examdetails">
                                                                            <i class="fa fa-check-square-o"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                        <?php $i++;
                                                            }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <?php if ((permissionChecker('student_add') && permissionChecker('student_delete')) || ($this->session->userdata('usertypeID') == $profile->usertypeID && $this->session->userdata('loginuserID') == $profile->studentID)) { ?>
                                            <div class="tab-pane" id="document">
                                                <?php if (permissionChecker('student_add')) { ?>
                                                    <button class="btn btn-success btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#documentupload">
                                                        <?= $this->lang->line('student_add_document') ?>
                                                    </button>
                                                <?php } ?>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th><?= $this->lang->line('slno') ?></th>
                                                                <th><?= $this->lang->line('student_title') ?></th>
                                                                <th><?= $this->lang->line('student_date') ?></th>
                                                                <th><?= $this->lang->line('action') ?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php if (inicompute($documents)) {
                                                                $i = 1;
                                                                foreach ($documents as $document) { ?>
                                                                    <tr>
                                                                        <td><?= $i ?></td>
                                                                        <td><?= $document->title ?></td>
                                                                        <td><?= date('d M Y', strtotime($document->create_date)) ?></td>
                                                                        <td>
                                                                            <?= btn_download('student/download_document/' . $document->documentID . '/' . $profile->studentID . '/' . $profile->classesID, $this->lang->line('download')) ?>
                                                                            <?php if (permissionChecker('student_delete')) {
                                                                                echo btn_delete_show('student/delete_document/' . $document->documentID . '/' . $profile->studentID . "/" . $profile->classesID, $this->lang->line('delete'));
                                                                            } ?>
                                                                        </td>
                                                                    </tr>
                                                            <?php $i++;
                                                                }
                                                            } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Document Upload Modal -->
        <?php if (permissionChecker('student_add')) { ?>
            <form id="documentUploadDataForm" enctype="multipart/form-data" role="form" action="<?= base_url('student/documentUpload') ?>" method="post">
                <div class="modal fade" id="documentupload" tabindex="-1" aria-labelledby="documentuploadLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="documentuploadLabel"><?= $this->lang->line('student_document_upload') ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="title" class="form-label"><?= $this->lang->line("student_title") ?> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" value="<?= set_value('title') ?>">
                                    <div id="title_error" class="form-text text-danger"></div>
                                </div>

                                <div class="mb-3">
                                    <label for="file" class="form-label"><?= $this->lang->line("student_file") ?> <span class="text-danger">*</span></label>
                                    <input class="form-control" type="file" id="file" name="file">
                                    <div id="file_error" class="form-text text-danger"></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= $this->lang->line('close') ?></button>
                                <button type="button" id="uploadfile" class="btn btn-success"><?= $this->lang->line("student_upload") ?></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <script>
                $(document).on('click', '#uploadfile', function() {
                    var title = $('#title').val();
                    var file = $('#file').val();
                    var error = 0;

                    if (!title) {
                        error++;
                        $('#title_error').html("<?= $this->lang->line('student_title_required') ?>");
                    } else {
                        $('#title_error').html('');
                    }

                    if (!file) {
                        error++;
                        $('#file_error').html("<?= $this->lang->line('student_file_required') ?>");
                    } else {
                        $('#file_error').html('');
                    }

                    if (error === 0) {
                        var formData = new FormData($('#documentUploadDataForm')[0]);
                        $.ajax({
                            type: 'POST',
                            url: "<?= base_url('student/documentUpload') ?>",
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                location.reload();
                            }
                        });
                    }
                });
            </script>
        <?php } ?>

        <!-- Mail Modal -->
        <form class="form-horizontal" role="form" action="<?= base_url('student/send_mail') ?>" method="post">
            <div class="modal fade" id="mail" tabindex="-1" aria-labelledby="mailLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mailLabel"><?= $this->lang->line('mail') ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="to" class="form-label"><?= $this->lang->line("to") ?> <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="to" name="to" value="<?= set_value('to') ?>">
                                <div id="to_error" class="form-text text-danger"></div>
                            </div>

                            <div class="mb-3">
                                <label for="subject" class="form-label"><?= $this->lang->line("subject") ?> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="subject" name="subject" value="<?= set_value('subject') ?>">
                                <div id="subject_error" class="form-text text-danger"></div>
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label"><?= $this->lang->line("message") ?></label>
                                <textarea class="form-control" id="message" name="message" style="resize: vertical;"><?= set_value('message') ?></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= $this->lang->line('close') ?></button>
                            <button type="submit" id="send_pdf" class="btn btn-success"><?= $this->lang->line("send") ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Exam Details Modal -->
        <div class="modal fade" id="examdetails" tabindex="-1" aria-labelledby="examdetailsLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="examdetailsLabel"><?= $this->lang->line('student_onlineexamdetails') ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body examdetails"></div>
                </div>
            </div>
        </div>


        <script language="javascript" type="text/javascript">
            function printDiv(divID) {
                //Get the HTML of div
                var divElements = document.getElementById(divID).innerHTML;
                //Get the HTML of whole page
                var oldPage = document.body.innerHTML;

                //Reset the page's HTML with div's HTML only
                document.body.innerHTML =
                    "<html><head><title></title></head><body>" +
                    divElements + "</body>";

                //Print Page
                window.print();

                //Restore orignal HTML
                document.body.innerHTML = oldPage;
            }

            function check_email(email) {
                var status = false;
                var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
                if (email.search(emailRegEx) == -1) {
                    $("#to_error").html('');
                    $("#to_error").html("<?= $this->lang->line('mail_valid') ?>").css("text-align", "left").css("color", 'red');
                } else {
                    status = true;
                }
                return status;
            }


            $("#send_pdf").click(function() {
                var to = $('#to').val();
                var subject = $('#subject').val();
                var message = $('#message').val();
                var studentID = "<?= $studentID; ?>";
                var classesID = "<?= $classesID; ?>";
                var error = 0;

                $("#to_error").html("");
                if (to == "" || to == null) {
                    error++;
                    $("#to_error").html("");
                    $("#to_error").html("<?= $this->lang->line('mail_to') ?>").css("text-align", "left").css("color", 'red');
                } else {
                    if (check_email(to) == false) {
                        error++
                    }
                }

                if (subject == "" || subject == null) {
                    error++;
                    $("#subject_error").html("");
                    $("#subject_error").html("<?= $this->lang->line('mail_subject') ?>").css("text-align", "left").css("color", 'red');
                } else {
                    $("#subject_error").html("");
                }

                if (error == 0) {
                    $('#send_pdf').attr('disabled', 'disabled');
                    $.ajax({
                        type: 'POST',
                        url: "<?= base_url('student/send_mail') ?>",
                        data: 'to=' + to + '&subject=' + subject + "&message=" + message + "&studentID=" + studentID + "&classesID=" + classesID,
                        dataType: "html",
                        success: function(data) {
                            var response = JSON.parse(data);
                            if (response.status == false) {
                                $('#send_pdf').removeAttr('disabled');
                                $.each(response, function(index, value) {
                                    if (index != 'status') {
                                        toastr["error"](value)
                                        toastr.options = {
                                            "closeButton": true,
                                            "debug": false,
                                            "newestOnTop": false,
                                            "progressBar": false,
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
                                        }
                                    }
                                });
                            } else {
                                location.reload();
                            }
                        }
                    });
                }
            });

            $('.getMarkinfo').click(function() {
                var examstatusid = $(this).data('examstatusid');
                var studentID = "<?= $studentID; ?>";
                $.ajax({
                    type: 'POST',
                    url: "<?= base_url('student/get_user_exam_status') ?>",
                    data: {
                        'examstatusid': examstatusid,
                        'studentID': studentID
                    },
                    dataType: "html",
                    success: function(data) {
                        var response = JSON.parse(data);
                        if (response.status) {
                            $('.examdetails').html(response.render);
                        } else {
                            $('.examdetails').html("<h2 class='text-red'>" + response.msg + "</h2");
                        }
                    }
                });
            });
        </script>
    <?php } ?>