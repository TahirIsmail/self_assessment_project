<div class="card">
    <div class="card-header">

        <h3 class="card-title"><i class="fas fa-certificate"></i> <?= $this->lang->line('panel_title') ?></h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url("dashboard/index") ?>"><i class="fa fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a></li>
                <li class="breadcrumb-item"><a href="<?= base_url("systemadmin/index") ?>"><?= $this->lang->line('menu_systemadmin') ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $this->lang->line('view') ?></li>
            </ol>
        </nav>
    </div>


    <div class="card-body">
        <div id="printablediv">
            <div class="row">
                <div class="col-sm-12 page-header">
                    <button class="btn btn-sm btn-primary" onclick="javascript:printDiv('printablediv')">
                        <span class="fa fa-print"></span> <?= $this->lang->line('print') ?>
                    </button>
                    <?php
                    echo '<a href="' . base_url('systemadmin/print_preview/' . $systemadminID) . '" class="btn btn-sm btn-primary">' . $this->lang->line('pdf_preview') . '</a>';
                    ?>

                    <?php if (permissionChecker('systemadmin_edit')) { ?>
                        <a href="<?= base_url('systemadmin/edit/' . $systemadminID) ?>" class="btn btn-sm btn-primary"><?= $this->lang->line('edit') ?></a>
                    <?php } ?>


                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#mail">
                        <span class="fa fa-envelope"></span> <?= $this->lang->line('mail') ?>
                    </button>
                </div>

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <img class="img-fluid rounded-circle" style=" width: 100px !important; height: 100px !important;" src="<?= imagelink($profile->photo) ?>">
                            <h3 class="profile-username"><?= $profile->name ?></h3>
                            <p class="text-muted"><?= isset($usertypes[$profile->usertypeID]) ? $usertypes[$profile->usertypeID] : '' ?></p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <b><?= $this->lang->line('systemadmin_sex') ?></b> <span class="float-end"><?= $profile->sex ?></span>
                                </li>
                                <li class="list-group-item">
                                    <b><?= $this->lang->line('systemadmin_dob') ?></b> <span class="float-end"><?= date('d M Y', strtotime($profile->dob)) ?></span>
                                </li>
                                <li class="list-group-item">
                                    <b><?= $this->lang->line('systemadmin_phone') ?></b> <span class="float-end"><?= $profile->phone ?></span>
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
                                    <a class="nav-link active" href="#profile" data-bs-toggle="tab"><?= $this->lang->line('systemadmin_profile') ?></a>
                                </li>
                                <?php if (permissionChecker('systemadmin_add') && permissionChecker('systemadmin_delete')) { ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#document" data-bs-toggle="tab"><?= $this->lang->line('systemadmin_document') ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="profile">
                                <div class="card-body">
                                    <p><strong><?= $this->lang->line("systemadmin_jod") ?>:</strong> <?= date('d M Y', strtotime($profile->jod)) ?></p>
                                    <p><strong><?= $this->lang->line("systemadmin_religion") ?>:</strong> <?= $profile->religion ?></p>
                                    <p><strong><?= $this->lang->line("systemadmin_email") ?>:</strong> <?= $profile->email ?></p>
                                    <p><strong><?= $this->lang->line("systemadmin_address") ?>:</strong> <?= $profile->address ?></p>
                                    <p><strong><?= $this->lang->line("systemadmin_username") ?>:</strong> <?= $profile->username ?></p>
                                </div>
                            </div>
                            <?php if (permissionChecker('systemadmin_add') && permissionChecker('systemadmin_delete')) { ?>
                                <div class="tab-pane fade" id="document">
                                    <div class="card-body">
                                        <?php if (permissionChecker('systemadmin_add')) { ?>
                                            <button class="btn btn-success btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#documentupload"><?= $this->lang->line('systemadmin_add_document') ?></button>
                                        <?php } ?>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th><?= $this->lang->line('slno') ?></th>
                                                        <th><?= $this->lang->line('systemadmin_title') ?></th>
                                                        <th><?= $this->lang->line('systemadmin_date') ?></th>
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
                                                                    <?= btn_download('systemadmin/download_document/' . $document->documentID . '/' . $profile->systemadminID, $this->lang->line('download')) ?>
                                                                    <?php if (permissionChecker('systemadmin_delete')) {
                                                                        echo btn_delete_show('systemadmin/delete_document/' . $document->documentID . '/' . $profile->systemadminID, $this->lang->line('delete'));
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
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if (permissionChecker('systemadmin_add')) { ?>
    <form id="documentUploadDataForm" class="form-horizontal" enctype="multipart/form-data" action="<?= base_url('systemadmin/documentUpload'); ?>" method="post">
        <div class="modal fade" id="documentupload" tabindex="-1" aria-labelledby="documentuploadLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="documentuploadLabel"><?= $this->lang->line('systemadmin_document_upload') ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="title" class="form-label"><?= $this->lang->line("systemadmin_title") ?> <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" value="<?= set_value('title') ?>">
                            <div class="invalid-feedback" id="title_error"></div>
                        </div>
                        <div class="mb-3">
                            <label for="file" class="form-label"><?= $this->lang->line("systemadmin_file") ?> <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="file" name="file">
                            <div class="invalid-feedback" id="file_error"></div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= $this->lang->line('close') ?></button>
                        <button type="button" id="uploadfile" class="btn btn-success"><?= $this->lang->line("systemadmin_upload") ?></button>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php } ?>

<!-- Email modal starts here -->
<form class="form-horizontal" action="<?= base_url('teacher/send_mail'); ?>" method="post">
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
                        <div class="invalid-feedback" id="to_error"></div>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label"><?= $this->lang->line("subject") ?> <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="subject" name="subject" value="<?= set_value('subject') ?>">
                        <div class="invalid-feedback" id="subject_error"></div>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label"><?= $this->lang->line("message") ?></label>
                        <textarea class="form-control" id="message" name="message" style="resize: vertical;"><?= set_value('message') ?></textarea>
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
<!-- Email modal ends here -->

<script type="text/javascript">
    function printDiv(divID) {
        var divElements = document.getElementById(divID).innerHTML;
        var oldPage = document.body.innerHTML;

        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
        window.print();
        document.body.innerHTML = oldPage;
    }

    function check_email(email) {
        var status = false;
        var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
        if (email.search(emailRegEx) == -1) {
            $("#to_error").html("<?= $this->lang->line('mail_valid') ?>").css("color", 'red');
        } else {
            status = true;
        }
        return status;
    }

    $("#send_pdf").click(function() {
        var to = $('#to').val();
        var subject = $('#subject').val();
        var message = $('#message').val();
        var systemadminID = "<?= $systemadminID ?>";
        var error = 0;

        $("#to_error").html("");
        if (to == "") {
            error++;
            $("#to_error").html("<?= $this->lang->line('mail_to') ?>").css("color", 'red');
        } else {
            if (!check_email(to)) error++;
        }

        if (subject == "") {
            error++;
            $("#subject_error").html("<?= $this->lang->line('mail_subject') ?>").css("color", 'red');
        } else {
            $("#subject_error").html("");
        }

        if (error == 0) {
            $('#send_pdf').attr('disabled', 'disabled');
            $.ajax({
                type: 'POST',
                url: "<?= base_url('systemadmin/send_mail') ?>",
                data: {
                    'to': to,
                    'subject': subject,
                    'systemadminID': systemadminID,
                    'message': message
                },
                success: function(data) {
                    var response = JSON.parse(data);
                    if (response.status == false) {
                        $('#send_pdf').removeAttr('disabled');
                        $.each(response.errors, function(index, value) {
                            toastr["error"](value);
                        });
                    } else {
                        location.reload();
                    }
                }
            });
        }
    });
</script>