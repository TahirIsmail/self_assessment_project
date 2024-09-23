<?php if (inicompute($profile)) { ?>
    <div class="card">
        <div class="card-header">

            <h3 class="card-title"><i class="fa icon-paymentsettings"></i> <?= $this->lang->line('panel_title') ?></h3>
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url("dashboard/index") ?>"><i class="fa fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= $this->lang->line('profile') ?></li>
                    </ol>
                </nav>
            </div>

        </div>
        <div class="card-body">
            <div id="printablediv">

                <div class="col-12">
                    <h5 class="page-header">
                        <button class="btn btn-primary btn-sm" onclick="javascript:printDiv('printablediv')"><span class="fa fa-print"></span> <?= $this->lang->line('print') ?> </button>
                        <a href="<?= base_url('profile/print_preview'); ?>" class="btn btn-primary btn-sm">
                            <?= $this->lang->line('pdf_preview'); ?>
                        </a>

                        <a href="<?= base_url('profile/edit'); ?>" class="btn btn-primary btn-sm">
                            <?= $this->lang->line('edit'); ?>
                        </a>

                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#mail"><span class="fa fa-envelope"></span> <?= $this->lang->line('mail') ?></button>
                    </h5>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <img class="profile-user-img img-fluid rounded-circle" src="<?= imagelink($profile->photo) ?>" alt="Profile Picture">
                                    <h3 class="profile-username text-center"><?= $profile->name ?></h3>
                                    <?php if ($profile->usertypeID == 2) { ?>
                                        <p class="text-muted text-center"><?= $profile->designation ?></p>
                                    <?php } else { ?>
                                        <p class="text-muted text-center"><?= isset($usertypes[$profile->usertypeID]) ? $usertypes[$profile->usertypeID] : '' ?></p>
                                    <?php } ?>
                                    <ul class="list-group list-group-flush">
                                        <?php if ($profile->usertypeID == 4) { ?>
                                            <li class="list-group-item">
                                                <b><?= $this->lang->line('profile_phone') ?></b> <a class="float-end"><?= $profile->phone ?></a>
                                            </li>
                                        <?php } elseif ($profile->usertypeID == 3) { ?>
                                            <li class="list-group-item">
                                                <b><?= $this->lang->line('profile_registerNO') ?></b> <a class="float-end"><?= $profile->registerNO ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b><?= $this->lang->line('profile_roll') ?></b> <a class="float-end"><?= $profile->roll ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b><?= $this->lang->line('profile_classes') ?></b> <a class="float-end"><?= isset($classes[$profile->classesID]) ? $classes[$profile->classesID] : '' ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b><?= $this->lang->line('profile_section') ?></b> <a class="float-end"><?= isset($sections[$profile->sectionID]) ? $sections[$profile->sectionID] : '' ?></a>
                                            </li>
                                        <?php } else { ?>
                                            <li class="list-group-item">
                                                <b><?= $this->lang->line('profile_sex') ?></b> <a class="float-end"><?= $profile->sex ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b><?= $this->lang->line('profile_dob') ?></b> <a class="float-end"><?= isset($profile->dob) ? date('d M Y', strtotime($profile->dob)) : '' ?></a>
                                            </li>
                                            <li class="list-group-item">
                                                <b><?= $this->lang->line('profile_phone') ?></b> <a class="float-end"><?= $profile->phone ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header">
                                    <ul class="nav nav-tabs card-header-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#profile" role="tab" data-bs-toggle="tab"><?= $this->lang->line('profile_profile') ?></a>
                                        </li>
                                        <?php
                                        if ($profile->usertypeID == 3) {
                                            if (inicompute($parents)) { ?>
                                                <li class="nav-item"><a class="nav-link" href="#parents" role="tab" data-bs-toggle="tab"><?= $this->lang->line('profile_parents') ?></a></li>
                                            <?php }
                                        } elseif ($profile->usertypeID == 4) { ?>
                                            <li class="nav-item"><a class="nav-link" href="#children" role="tab" data-bs-toggle="tab"><?= $this->lang->line('profile_children') ?></a></li>
                                        <?php } ?>
                                        <?php if ($this->session->userdata('usertypeID') == 3) { ?>
                                            <li class="nav-item"><a class="nav-link" href="#exam" role="tab" data-bs-toggle="tab"><?= $this->lang->line('profile_exam') ?></a></li>
                                        <?php } ?>
                                        <li class="nav-item"><a class="nav-link" href="#document" role="tab" data-bs-toggle="tab"><?= $this->lang->line('profile_document') ?></a></li>
                                    </ul>
                                </div>

                                <div class="tab-content card-body">
                                    <div class="tab-pane active" id="profile" role="tabpanel">
                                        <div class="panel-body profile-view-dis">
                                            <?php if ($profile->usertypeID == 3) { ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p><strong><?= $this->lang->line("profile_studentgroup") ?>: </strong> <?= inicompute($studentgroup) ? $studentgroup->group : '' ?></p>
                                                        <p><strong><?= $this->lang->line("profile_optionalsubject") ?>: </strong> <?= inicompute($optionalsubject) ? $optionalsubject->subject : '' ?></p>
                                                        <p><strong><?= $this->lang->line("profile_dob") ?>: </strong> <?= date("d M Y", strtotime($profile->dob)) ?></p>
                                                        <p><strong><?= $this->lang->line("profile_sex") ?>: </strong> <?= $profile->sex ?></p>
                                                        <p><strong><?= $this->lang->line("profile_bloodgroup") ?>: </strong> <?php if (isset($allbloodgroup[$profile->bloodgroup])) {
                                                                                                                                    echo $profile->bloodgroup;
                                                                                                                                } ?></p>
                                                        <p><strong><?= $this->lang->line("profile_religion") ?>: </strong> <?= $profile->religion ?></p>
                                                        <p><strong><?= $this->lang->line("profile_email") ?>: </strong> <?= $profile->email ?></p>
                                                        <p><strong><?= $this->lang->line("profile_phone") ?>: </strong> <?= $profile->phone ?></p>
                                                        <p><strong><?= $this->lang->line("profile_state") ?>: </strong> <?= $profile->state ?></p>
                                                        <p><strong><?= $this->lang->line("profile_country") ?>: </strong> <?php if (isset($allcountry[$profile->country])) {
                                                                                                                                echo $allcountry[$profile->country];
                                                                                                                            } ?></p>
                                                        <p><strong><?= $this->lang->line("profile_remarks") ?>: </strong> <?= $profile->remarks ?></p>
                                                        <p><strong><?= $this->lang->line("profile_username") ?>: </strong> <?= $profile->username ?></p>
                                                        <p><strong><?= $this->lang->line("profile_extracurricularactivities") ?>: </strong> <?= $profile->extracurricularactivities ?></p>
                                                        <p><strong><?= $this->lang->line("profile_address") ?>: </strong> <?= $profile->address ?></p>
                                                    </div>
                                                </div>
                                            <?php } elseif ($profile->usertypeID == 4) { ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p><strong><?= $this->lang->line("profile_father_name") ?>: </strong> <?= $profile->father_name ?></p>
                                                        <p><strong><?= $this->lang->line("profile_father_profession") ?>: </strong> <?= $profile->father_profession ?></p>
                                                        <p><strong><?= $this->lang->line("profile_mother_name") ?>: </strong> <?= $profile->mother_name ?></p>
                                                        <p><strong><?= $this->lang->line("profile_mother_profession") ?>: </strong> <?= $profile->mother_profession ?></p>
                                                        <p><strong><?= $this->lang->line("profile_email") ?>: </strong> <?= $profile->email ?></p>
                                                        <p><strong><?= $this->lang->line("profile_address") ?>: </strong> <?= $profile->address ?></p>
                                                        <p><strong><?= $this->lang->line("profile_username") ?>: </strong> <?= $profile->username ?></p>
                                                    </div>
                                                </div>
                                            <?php } else { ?>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <p><strong><?= $this->lang->line("profile_jod") ?>: </strong> <?= date("d M Y", strtotime($profile->jod)) ?></p>
                                                        <p><strong><?= $this->lang->line("profile_religion") ?>: </strong> <?= $profile->religion ?></p>
                                                        <p><strong><?= $this->lang->line("profile_email") ?>: </strong> <?= $profile->email ?></p>
                                                        <p><strong><?= $this->lang->line("profile_address") ?>: </strong> <?= $profile->address ?></p>
                                                        <p><strong><?= $this->lang->line("profile_username") ?>: </strong> <?= $profile->username ?></p>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <?php if ($profile->usertypeID == 3 && inicompute($parents)) { ?>
                                        <div class="tab-pane" id="parents" role="tabpanel">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p><strong><?= $this->lang->line("profile_guargian_name") ?>: </strong> <?= $parents->name ?></p>
                                                    <p><strong><?= $this->lang->line("profile_father_name") ?>: </strong> <?= $parents->father_name ?></p>
                                                    <p><strong><?= $this->lang->line("profile_mother_name") ?>: </strong> <?= $parents->mother_name ?></p>
                                                    <p><strong><?= $this->lang->line("profile_father_profession") ?>: </strong> <?= $parents->father_profession ?></p>
                                                    <p><strong><?= $this->lang->line("profile_mother_profession") ?>: </strong> <?= $parents->mother_profession ?></p>
                                                    <p><strong><?= $this->lang->line("profile_email") ?>: </strong> <?= $parents->email ?></p>
                                                    <p><strong><?= $this->lang->line("profile_phone") ?>: </strong> <?= $parents->phone ?></p>
                                                    <p><strong><?= $this->lang->line("profile_username") ?>: </strong> <?= $parents->username ?></p>
                                                    <p><strong><?= $this->lang->line("profile_address") ?>: </strong> <?= $parents->address ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if ($profile->usertypeID == 4) { ?>
                                        <div class="tab-pane" id="children" role="tabpanel">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th><?= $this->lang->line('slno') ?></th>
                                                            <th><?= $this->lang->line('profile_photo') ?></th>
                                                            <th><?= $this->lang->line('profile_name') ?></th>
                                                            <th><?= $this->lang->line('profile_roll') ?></th>
                                                            <th><?= $this->lang->line('profile_classes') ?></th>
                                                            <th><?= $this->lang->line('profile_section') ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (inicompute($childrens)) {
                                                            $i = 1;
                                                            foreach ($childrens as $children) { ?>
                                                                <tr>
                                                                    <td><?= $i ?></td>
                                                                    <td><?php $array = array(
                                                                            "src" => base_url('uploads/images/' . $children->photo),
                                                                            'width' => '35px',
                                                                            'height' => '35px',
                                                                            'class' => 'img-rounded'
                                                                        );
                                                                        echo img($array); ?></td>
                                                                    <td><?= $children->name ?></td>
                                                                    <td><?= $children->roll ?></td>
                                                                    <td><?= isset($classes[$children->classesID]) ? $classes[$children->classesID] : '' ?></td>
                                                                    <td><?= isset($sections[$children->sectionID]) ? $sections[$children->sectionID] : '' ?></td>
                                                                </tr>
                                                        <?php $i++;
                                                            }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <?php if ($this->session->userdata('usertypeID') == 3) { ?>
                                        <div class="tab-pane" id="exam" role="tabpanel">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th><?= $this->lang->line('slno') ?></th>
                                                            <th><?= $this->lang->line('profile_exam') ?></th>
                                                            <th><?= $this->lang->line('profile_date') ?></th>
                                                            <th><?= $this->lang->line('profile_status') ?></th>
                                                            <th><?= $this->lang->line('action') ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php if (inicompute($examresults)) {
                                                            $i = 1;
                                                            foreach ($examresults as $examresult) { ?>
                                                                <tr>
                                                                    <td><?= $i; ?></td>
                                                                    <td><?= isset($onlineexams[$examresult->onlineExamID]) ? namesorting($onlineexams[$examresult->onlineExamID]->name, 40) : '' ?></td>
                                                                    <td><?= date('d M Y h:i:s A', strtotime($examresult->time)) ?></td>
                                                                    <td><?php if ($examresult->statusID == 5) {
                                                                            echo '<span class="text-success">' . $this->lang->line('profile_pass') . '</span>';
                                                                        } elseif ($examresult->statusID == 10) {
                                                                            echo '<span class="text-danger">' . $this->lang->line('profile_fail') . '</span>';
                                                                        } ?></td>
                                                                    <td><button class="btn btn-info btn-sm getMarkinfo" data-examstatusid="<?= $examresult->onlineExamUserStatus ?>" data-bs-toggle="modal" data-bs-target="#examdetails"><i class="fa fa-check-square-o"></i></button></td>
                                                                </tr>
                                                        <?php $i++;
                                                            }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    <?php } ?>

                                    <div class="tab-pane" id="document" role="tabpanel">
                                        <?php if (($this->session->userdata('usertypeID') == 1) && ($this->session->userdata('loginuserID') == 1)) { ?>
                                            <button class="btn btn-success btn-sm mb-3" type="button" data-bs-toggle="modal" data-bs-target="#documentupload"><?= $this->lang->line('profile_add_document') ?></button>
                                        <?php } ?>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th><?= $this->lang->line('slno') ?></th>
                                                        <th><?= $this->lang->line('profile_title') ?></th>
                                                        <th><?= $this->lang->line('profile_date') ?></th>
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
                                                                    <?= btn_download('profile/download_document/' . $document->documentID, $this->lang->line('download')) ?>
                                                                    <?php if (($this->session->userdata('usertypeID') == 1) && ($this->session->userdata('loginuserID') == 1)) {
                                                                        echo btn_delete_show('profile/delete_document/' . $document->documentID, $this->lang->line('delete'));
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- email modal starts here -->
    <form class="form-horizontal" role="form" action="<?= base_url('profile/send_mail'); ?>" method="post">
        <div class="modal fade" id="mail" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <h4 class="modal-title"><?= $this->lang->line('mail') ?></h4>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="to" class="form-label"><?= $this->lang->line("to") ?> <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="to" name="to" value="<?= set_value('to') ?>">
                            <div class="invalid-feedback" id="to_error"></div>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label"><?= $this->lang->line("subject") ?> <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="subject" name="subject" value="<?= set_value('subject') ?>">
                            <div class="invalid-feedback" id="subject_error"></div>
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label"><?= $this->lang->line("message") ?></label>
                            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= $this->lang->line('close') ?></button>
                        <button type="button" id="send_pdf" class="btn btn-success"><?= $this->lang->line("send") ?></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- email end here -->

    <?php if (($this->session->userdata('usertypeID') == 1) && ($this->session->userdata('loginuserID') == 1)) { ?>
        <form id="documentUploadDataForm" class="form-horizontal" enctype="multipart/form-data" role="form" action="<?= base_url('profile/documentUpload'); ?>" method="post">
            <div class="modal fade" id="documentupload" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            <h4 class="modal-title"><?= $this->lang->line('profile_document_upload') ?></h4>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="title" class="form-label"><?= $this->lang->line("profile_title") ?> <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title" value="<?= set_value('title') ?>">
                                <div class="invalid-feedback" id="title_error"></div>
                            </div>
                            <div class="mb-3">
                                <label for="file" class="form-label"><?= $this->lang->line("profile_file") ?> <span class="text-danger">*</span></label>
                                <input type="file" id="file" name="file" class="form-control">
                                <div class="invalid-feedback" id="file_error"></div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= $this->lang->line('close') ?></button>
                            <button type="button" id="uploadfile" class="btn btn-success"><?= $this->lang->line("profile_upload") ?></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <script type="text/javascript">
            document.getElementById('uploadfile').addEventListener('click', function() {
                var title = document.getElementById('title').value;
                var file = document.getElementById('file').value;
                var error = 0;

                if (title == '' || title == null) {
                    error++;
                    document.getElementById('title_error').innerHTML = "<?= $this->lang->line('profile_title_required') ?>";
                    document.getElementById('title_error').parentElement.classList.add('is-invalid');
                } else {
                    document.getElementById('title_error').innerHTML = '';
                    document.getElementById('title_error').parentElement.classList.remove('is-invalid');
                }

                if (file == '' || file == null) {
                    error++;
                    document.getElementById('file_error').innerHTML = "<?= $this->lang->line('profile_file_required') ?>";
                    document.getElementById('file_error').parentElement.classList.add('is-invalid');
                } else {
                    document.getElementById('file_error').innerHTML = '';
                    document.getElementById('file_error').parentElement.classList.remove('is-invalid');
                }

                if (error == 0) {
                    var systemadminID = "<?= $profile->systemadminID ?>";
                    var formData = new FormData(document.getElementById('documentUploadDataForm'));
                    formData.append("systemadminID", systemadminID);
                    fetch("<?= base_url('profile/documentUpload') ?>", {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status) {
                                location.reload();
                            } else {
                                if (data.errors['title']) {
                                    document.getElementById('title_error').innerHTML = data.errors['title'];
                                    document.getElementById('title_error').parentElement.classList.add('is-invalid');
                                } else {
                                    document.getElementById('title_error').innerHTML = '';
                                    document.getElementById('title_error').parentElement.classList.remove('is-invalid');
                                }

                                if (data.errors['file']) {
                                    document.getElementById('file_error').innerHTML = data.errors['file'];
                                    document.getElementById('file_error').parentElement.classList.add('is-invalid');
                                } else {
                                    document.getElementById('file_error').innerHTML = '';
                                    document.getElementById('file_error').parentElement.classList.remove('is-invalid');
                                }
                            }
                        });
                }
            });
        </script>
    <?php } ?>

    <script language="javascript" type="text/javascript">
        function printDiv(divID) {
            var divElements = document.getElementById(divID).innerHTML;
            var oldPage = document.body.innerHTML;
            document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
            window.print();
            document.body.innerHTML = oldPage;
        }

        function check_email(email) {
            var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
            if (email.search(emailRegEx) == -1) {
                document.getElementById("to_error").innerHTML = "<?= $this->lang->line('mail_valid') ?>";
                return false;
            } else {
                return true;
            }
        }

        document.getElementById("send_pdf").addEventListener("click", function() {
            var to = document.getElementById('to').value;
            var subject = document.getElementById('subject').value;
            var message = document.getElementById('message').value;
            var error = 0;

            document.getElementById("to_error").innerHTML = "";
            if (to == "" || to == null) {
                error++;
                document.getElementById("to_error").innerHTML = "<?= $this->lang->line('mail_to') ?>";
            } else {
                if (check_email(to) == false) {
                    error++;
                }
            }

            if (subject == "" || subject == null) {
                error++;
                document.getElementById("subject_error").innerHTML = "<?= $this->lang->line('mail_subject') ?>";
            }

            if (error == 0) {
                document.getElementById('send_pdf').setAttribute('disabled', 'disabled');
                fetch("<?= base_url('profile/send_mail') ?>", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: new URLSearchParams({
                            to: to,
                            subject: subject,
                            message: message
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === false) {
                            document.getElementById('send_pdf').removeAttribute('disabled');
                            for (const [key, value] of Object.entries(data)) {
                                if (key != 'status') {
                                    alert(value);
                                }
                            }
                        } else {
                            location.reload();
                        }
                    });
            }
        });

        <?php if ($this->session->userdata('usertypeID') == 3) { ?>
            document.querySelectorAll('.getMarkinfo').forEach(element => {
                element.addEventListener('click', function() {
                    var examstatusid = this.dataset.examstatusid;
                    fetch("<?= base_url('profile/get_user_exam_status') ?>", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: new URLSearchParams({
                                examstatusid: examstatusid
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status) {
                                document.querySelector('.examdetails').innerHTML = data.render;
                            } else {
                                document.querySelector('.examdetails').innerHTML = "<h2 class='text-danger'>" + data.msg + "</h2>";
                            }
                        });
                });
            });
        <?php } ?>
    </script>
<?php } ?>