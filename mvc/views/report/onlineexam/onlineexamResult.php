<div class="card">
    <div class="card-header bg-light">
        <h3 class="card-title"><i class="fa fa-clipboard"></i>
            <?= $this->lang->line('onlineexamreport_report_for') ?> - <?= $this->lang->line('onlineexamreport_onlineexam') ?></h3>
    </div>
    <div id="printablediv">
        <div class="card-body">
            <div class="row">
                <div class="page-header col-12 my-3">
                    <?php
                    $onlineExamUserStatusID = inicompute($onlineExamUserStatus) ? $onlineExamUserStatus->onlineExamUserStatus : 0;
                    echo btn_printReport('onlineexamreport', $this->lang->line('report_print'), 'printablediv');
                    echo btn_pdfPreviewReport('onlineexamreport',  base_url('onlineexamreport/pdf/' . $onlineExamUserStatusID), $this->lang->line('report_pdf_preview'));
                    echo btn_sentToMailReport('onlineexamreport', $this->lang->line('report_send_pdf_to_mail'));
                    ?>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-4">
                    <?= reportheader($siteinfos) ?>
                </div>
                <div class="col-md-6">
                    <div class="card border-secondary">
                        <div class="card-header bg-light">
                            <h3 class="card-title"><?= $this->lang->line("onlineexamreport_examinformation") ?></h3>
                            <ol class="breadcrumb">
                                <li><i class="fa fa-info fa-2x"></i></li>
                            </ol>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td colspan="2"><span class='text-primary'><?= $this->lang->line('onlineexamreport_exam') ?> : <?= $onlineexam->name ?> </span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class='text-primary'>
                                                <?php
                                                echo $this->lang->line('onlineexamreport_status') . ' : ';
                                                if ($onlineExamUserStatus->statusID == 5) {
                                                    echo $this->lang->line('onlineexamreport_passed');
                                                } else {
                                                    echo $this->lang->line('onlineexamreport_failed');
                                                }
                                                ?>
                                            </span>
                                        </td>
                                        <td><span class='text-primary'><?= $this->lang->line('onlineexamreport_rank') ?> : <?= $rank ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class='text-primary'><?= $this->lang->line('onlineexamreport_question') ?> : <?= $onlineExamUserStatus->totalQuestion ?></span></td>
                                        <td><span class='text-primary'><?= $this->lang->line('onlineexamreport_answer') ?> : <?= $onlineExamUserStatus->totalAnswer ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class='text-primary'><?= $this->lang->line('onlineexamreport_current_answer') ?> : <?= $onlineExamUserStatus->totalCurrectAnswer ?></span></td>
                                        <td><span class='text-primary'><?= $this->lang->line('onlineexamreport_mark') ?> : <?= $onlineExamUserStatus->totalMark ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><span class='text-primary'><?= $this->lang->line('onlineexamreport_totle_obtained_mark') ?> : <?= $onlineExamUserStatus->totalObtainedMark ?></span></td>
                                        <td><span class='text-primary'><?= $this->lang->line('onlineexamreport_total_percentage') ?> : <?= $onlineExamUserStatus->totalPercentage ?>%</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card border-secondary">
                        <div class="card-header bg-light">
                            <h3 class="card-title"><?= $this->lang->line("onlineexamreport_studentinformation") ?></h3>
                            <ol class="breadcrumb">
                                <li><i class="fa icon-teacher fa-2x"></i></li>
                            </ol>
                        </div>
                        <div class="card-body">
                            <?php if (inicompute($user)) { ?>
                                <section class="panel">
                                    <div class="profile-db-head bg-maroon-light text-center">
                                        <a>
                                            <?= img(base_url('uploads/images/' . $user->photo)); ?>
                                        </a>
                                        <h1 class="text-white"><?= $user->name ?></h1>

                                    </div>
                                    <table class="table table-hover">
                                        <tbody>
                                            <tr>
                                                <td><i class="fa fa-sitemap text-maroon-light"></i></td>
                                                <td><?= $this->lang->line('onlineexamreport_classes') ?></td>
                                                <td><?= inicompute($classes) ? $classes->classes : '' ?></td>
                                            </tr>
                                            <tr>
                                                <td><i class="fa fa-sitemap text-maroon-light"></i></td>
                                                <td><?= $this->lang->line('onlineexamreport_section') ?></td>
                                                <td><?= inicompute($section) ? $section->section : '' ?></td>
                                            </tr>
                                            <?php if ($onlineexam->subjectID > 0) { ?>
                                                <tr>
                                                    <td><i class="fa fa-sitemap text-maroon-light"></i></td>
                                                    <td><?= $this->lang->line('onlineexamreport_subject') ?></td>
                                                    <td><?= inicompute($subject) ? $subject->subject : '' ?></td>
                                                </tr>
                                            <?php } ?>
                                            <tr>
                                                <td><i class="fa fa-phone text-maroon-light"></i></td>
                                                <td><?= $this->lang->line('onlineexamreport_phone') ?></td>
                                                <td><?= $user->phone ?></td>
                                            </tr>
                                            <tr>
                                                <td><i class="fa fa-envelope text-maroon-light"></i></td>
                                                <td><?= $this->lang->line('onlineexamreport_email') ?></td>
                                                <td><?= $user->email ?></td>
                                            </tr>
                                            <tr>
                                                <td><i class="fa fa-globe text-maroon-light"></i></td>
                                                <td><?= $this->lang->line('onlineexamreport_address') ?></td>
                                                <td><?= $user->address ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </section>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <div class="col-12 text-center mb-4">
                    <?= reportfooter($siteinfos) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Email modal starts here -->
<form class="form-horizontal" role="form" action="<?= base_url('onlineexamreport/send_pdf_to_mail'); ?>" method="post">
    <div class="modal fade" id="mail" tabindex="-1" aria-labelledby="mailLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mailLabel"><?= $this->lang->line('onlineexamreport_mail') ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="to" class="form-label"><?= $this->lang->line("onlineexamreport_to") ?> <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="to" name="to" value="<?= set_value('to') ?>" required>
                        <div id="to_error" class="form-text text-danger"></div>
                    </div>

                    <div class="mb-3">
                        <label for="subject" class="form-label"><?= $this->lang->line("onlineexamreport_subject") ?> <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="subject" name="subject" value="<?= set_value('subject') ?>" required>
                        <div id="subject_error" class="form-text text-danger"></div>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label"><?= $this->lang->line("onlineexamreport_message") ?></label>
                        <textarea class="form-control" id="message" name="message" style="resize: vertical;"><?= set_value('message') ?></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= $this->lang->line('close') ?></button>
                    <button type="button" id="send_pdf" class="btn btn-success"><?= $this->lang->line("onlineexamreport_send") ?></button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Email modal ends here -->

<script type="text/javascript">
    function printDiv(divID) {
        var oldPage = document.body.innerHTML;
        $('#headerImage').remove();
        $('.footerAll').remove();
        var divElements = document.getElementById(divID).innerHTML;
        var footer = "<center><img src='<?= base_url('uploads/images/' . $siteinfos->photo) ?>' style='width:30px;' /></center>";
        var copyright = "<center><?= $siteinfos->footer ?> | <?= $this->lang->line('onlineexamreport_hotline') ?> : <?= $siteinfos->phone ?></center>";
        document.body.innerHTML =
            "<html><head><title></title></head><body>" +
            "<center><img src='<?= base_url('uploads/images/' . $siteinfos->photo) ?>' style='width:50px;' /></center>" +
            divElements + footer + copyright + "</body>";

        window.print();
        document.body.innerHTML = oldPage;
        window.location.reload();
    }

    function check_email(email) {
        var status = false;
        var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
        if (email.search(emailRegEx) == -1) {
            $("#to_error").html('<?= $this->lang->line('onlineexamreport_mail_valid') ?>').css("color", 'red');
        } else {
            status = true;
        }
        return status;
    }

    $('#send_pdf').click(function() {
        var field = {
            'to': $('#to').val(),
            'subject': $('#subject').val(),
            'message': $('#message').val(),
            'id': "<?= inicompute($onlineExamUserStatus) ? $onlineExamUserStatus->onlineExamUserStatus : 0; ?>",
        };

        var error = 0;

        $("#to_error").html("");
        $("#subject_error").html("");
        if ($('#to').val() === "") {
            error++;
            $("#to_error").html("<?= $this->lang->line('onlineexamreport_mail_to') ?>").css("color", 'red');
        } else {
            if (!check_email($('#to').val())) {
                error++;
            }
        }

        if ($('#subject').val() === "") {
            error++;
            $("#subject_error").html("<?= $this->lang->line('onlineexamreport_mail_subject') ?>").css("color", 'red');
        }

        if (error === 0) {
            $('#send_pdf').attr('disabled', 'disabled');
            $.ajax({
                type: 'POST',
                url: "<?= base_url('onlineexamreport/send_pdf_to_mail') ?>",
                data: field,
                dataType: "html",
                success: function(data) {
                    var response = JSON.parse(data);
                    if (response.status === false) {
                        $('#send_pdf').removeAttr('disabled');
                        $.each(response, function(index, value) {
                            if (index !== 'status') {
                                toastr["error"](value);
                            }
                        });
                    } else {
                        location.reload();
                    }
                }
            });
        }
    });
</script>