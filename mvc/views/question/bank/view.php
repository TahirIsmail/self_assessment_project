<div class="card ">
    <div class="card-header">
        <h3 class="card-title"><i class="fa fa-star"></i> <?= $this->lang->line('panel_title') ?></h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard/index') ?>"><i class="fa fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('question_bank/index') ?>"><?= $this->lang->line('panel_title') ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $this->lang->line('menu_view') ?></li>
            </ol>
        </nav>

    </div>



    <div class="card-body bio-graph-info">
        <div id="printablediv" class="box-body">

            <div class="col-sm-12">


                <div class="col-sm-6 page-header">
                    <button class="btn btn-sm btn-primary " onclick="javascript:printDiv('printablediv')">
                        <span class="fa fa-print"></span> <?= $this->lang->line('print') ?>
                    </button>

                    <?php if (permissionChecker('question_bank_edit')): ?>
                        <a href="<?= base_url('question_bank/edit/' . $question->questionBankID) ?>" class="btn btn-sm btn-primary">
                            <i class="fa fa-edit"></i> <?= $this->lang->line('edit') ?>
                        </a>
                    <?php endif; ?>

                    <?php if (permissionChecker('question_bank_view')): ?>
                        <a href="<?= base_url('question_bank/print_preview/' . $question->questionBankID) ?>" class="btn btn-sm btn-primary">
                            <i class="fa fa-file-pdf-o"></i> <?= $this->lang->line('pdf_preview') ?>
                        </a>
                    <?php endif; ?>



                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#mail">
                        <span class="fa fa-envelope-o"></span> <?= $this->lang->line('mail') ?>
                    </button>
                </div>
                <?php
                $questionOptions = isset($options[$question->questionBankID]) ? $options[$question->questionBankID] : [];
                $questionAnswers = isset($answers[$question->questionBankID]) ? $answers[$question->questionBankID] : [];
                if ($question->typeNumber == 1 || $question->typeNumber == 2) {
                    $questionAnswers = pluck($questionAnswers, 'optionID');
                }
                if (inicompute($question)) { ?>
                    <div class="clearfix">
                        <div class="question-body">
                            <label class="lb-content question-color">
                                <a href="<?= base_url('question_bank/edit/' . $question->questionBankID) ?>" target="_blank"><?= $question->question ?></a>
                            </label>
                            <label class="lb-mark"><?= $question->mark != "" ? $question->mark . ' ' . $this->lang->line('question_bank_mark') : '' ?> </label>
                        </div>
                        <?php if ($question->upload != '') { ?>
                            <div>
                                <img style="width:220px;height:120px;" src="<?= base_url('uploads/images/' . $question->upload) ?>" alt="">
                            </div>
                        <?php } ?>

                        <div class="question-answer">
                            <table class="table">
                                <tr>
                                    <?php
                                    $tdCount = 0;
                                    foreach ($questionOptions as $option) {
                                        $checked = '';
                                        if (in_array($option->optionID, $questionAnswers)) {
                                            $checked = 'checked';
                                        } ?>
                                        <td>
                                            <input id="option<?= $option->optionID ?>" value="1" name="option" type="<?= $question->typeNumber == 1 ? 'radio' : 'checkbox' ?>" <?= $checked ?> disabled>
                                            <label for="option<?= $option->optionID ?>">
                                                <span class="fa-stack <?= $question->typeNumber == 1 ? 'radio-button' : 'checkbox-button' ?>">
                                                    <i class="active fa fa-check"></i>
                                                </span>
                                                <span><?= $option->name ?></span>
                                                <?php if (!is_null($option->img) && $option->img != "") { ?>
                                                    <img class="img-responsive" src="<?= base_url('uploads/images/' . $option->img) ?>" style="height:80px;width:100px" />
                                                <?php } ?>
                                            </label>
                                        </td>
                                        <?php
                                        $tdCount++;
                                        if ($tdCount == 2) {
                                            $tdCount = 0;
                                            echo "</tr><tr>";
                                        }
                                    }

                                    if ($question->typeNumber == 3) {
                                        foreach ($questionAnswers as $answerKey => $answer) {
                                        ?>
                                <tr>
                                    <td>
                                        <input type="button" value="<?= $answerKey + 1 ?>">
                                        <input class="fillInTheBlank" id="answer<?= $answer->answerID ?>" name="option" value="<?= $answer->text ?>" type="text" disabled>
                                    </td>
                                </tr>
                        <?php }
                                    } ?>
                        </tr>
                            </table>
                        </div>
                    </div>
                    <br />
                <?php } ?>
            </div>

        </div>
    </div>
    </section>

    <!-- Email Modal -->
    <form class="form-horizontal" role="form" action="<?= base_url('question_bank/send_mail'); ?>" method="post">
        <div class="modal fade" id="mail" tabindex="-1" aria-labelledby="mailLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mailLabel"><?= $this->lang->line('mail') ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="to" class="form-label"><?= $this->lang->line("to") ?></label>
                            <input type="email" class="form-control" id="to" name="to" value="<?= set_value('to') ?>">
                            <div id="to_error" class="form-text text-danger"></div>
                        </div>

                        <div class="mb-3">
                            <label for="subject" class="form-label"><?= $this->lang->line("subject") ?></label>
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
                        <input type="button" id="send_pdf" class="btn btn-success" value="<?= $this->lang->line('send') ?>" />
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Email Modal End -->

<script language="javascript" type="text/javascript">
    function printDiv(divID) {
        var divElements = document.getElementById(divID).innerHTML;
        var oldPage = document.body.innerHTML;

        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
        window.print();
        document.body.innerHTML = oldPage;
    }

    function closeWindow() {
        location.reload();
    }

    function check_email(email) {
        var status = false;
        var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
        if (email.search(emailRegEx) == -1) {
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
        var questionBankID = "<?= $question->questionBankID ?>";
        var error = 0;

        $("#to_error").html("");
        if (to == "" || to == null) {
            error++;
            $("#to_error").html("<?= $this->lang->line('mail_to') ?>").css("text-align", "left").css("color", 'red');
        } else {
            if (check_email(to) == false) {
                error++;
            }
        }

        if (subject == "" || subject == null) {
            error++;
            $("#subject_error").html("<?= $this->lang->line('mail_subject') ?>").css("text-align", "left").css("color", 'red');
        } else {
            $("#subject_error").html("");
        }

        if (error == 0) {
            $('#send_pdf').attr('disabled', 'disabled');
            $.ajax({
                type: 'POST',
                url: "<?= base_url('question_bank/send_mail') ?>",
                data: 'to=' + to + '&subject=' + subject + "&message=" + message + "&questionBankID=" + questionBankID,
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
                                    "progressBar": false,
                                    "positionClass": "toast-top-right",
                                    "showDuration": "500",
                                    "hideDuration": "500",
                                    "timeOut": "5000",
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
</script>