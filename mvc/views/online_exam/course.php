<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-slideshare"></i> <?= $this->lang->line('panel_title') ?></h3>
        <ol class="breadcrumb">
            <li><a href="<?= base_url("dashboard/index") ?>"><i class="fa fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a></li>
            <li class="active"><?= $this->lang->line('panel_title') ?></li>
        </ol>
    </div>

    <div class="box-body">
        <div class="row container">
            <div class="col-sm-12">
                <h5 class="page-header"><?= $this->lang->line('enrolled_courses') ?></h5>
                <div class="row">
                    <?php if ($enrolled_courses) {
                        foreach ($enrolled_courses as $en_course) { ?>

                            <div class="col-md-4">
                                <div class="course-card" style="position: relative; background-color: white; border-radius: 8px; overflow: hidden;">
                                    <img src="<?= base_url('uploads/images/' . $en_course->image); ?>" alt="<?= $en_course->name; ?>" class="img-responsive" style="width: 100%; height: auto;">
                                    <div class="course-details" style="padding: 15px; text-align: center;">
                                        <h4 class="course-name" style="font-weight: bold; color: black;"><?= $en_course->name; ?></h4>
                                        <p class="course-status" style="margin-bottom: 20px; font-size: 18px;"><?= $en_course->paid ? $this->lang->line('paid') : $this->lang->line('free'); ?></p>
                                        <a href="<?= site_url('take_exam/index/' . $en_course->slug); ?>" class="btn btn-primary"><?= $this->lang->line('view_course'); ?></a>
                                    </div>
                                </div>
                            </div>

                        <?php }
                    } else { ?>
                        <div class="col-sm-12">
                            <h3><?= $this->lang->line('no_enrolled_course'); ?></h3>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="col-sm-12">
                <h5 class="page-header"><?= $this->lang->line('suggestion_courses') ?></h5>
                <div class="row">
                    <?php if ($unenrolled_courses) { ?>

                        <?php foreach ($unenrolled_courses as $un_course) { ?>
                            <div class="col-md-4">
                                <div class="course-card" style="position: relative; background-color: white; border-radius: 8px; overflow: hidden;">

                                    <img src="<?= base_url('uploads/images/' . $un_course->image); ?>" alt="<?= $un_course->name; ?>" class="img-responsive" style="width: 100%; height: auto;">
                                    <div class="course-details" style="padding: 15px; text-align: center;">
                                        <h4 class="course-name" style="font-weight: bold; color: black;"><?= $un_course->name; ?></h4>
                                        <p class="course-cost"><?= $un_course->cost ? '$' . number_format($un_course->cost, 2) : $this->lang->line('free'); ?></p>
                                        <p class="course-status"><?= $un_course->paid ? $this->lang->line('paid') : $this->lang->line('free'); ?></p>
                                        <a href="#addpayment" id="<?= $un_course->slug ?>" class="btn btn-primary mrg getpaymentinfobtn" rel="tooltip" data-toggle="modal"><i class="fa fa-credit-card" data-toggle="tooltip" data-placement="top" data-original-title="<?= $this->lang->line('enroll_now') ?>"></i> <?= $this->lang->line('enroll_now') ?></a>
                                    </div>




                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<form class="form-horizontal" role="form" method="post" id="paymentAddDataForm" enctype="multipart/form-data" action="<?= base_url('online_exam/payment') ?>">
    <div class="modal fade" id="addpayment">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title"><?= $this->lang->line('take_exam_add_payment') ?></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="text" name="course_slug" id="course_slug" style="display:none">
                        <div class="col-sm-6">
                            <div class="col-sm-12">
                                <div class="form-group <?= form_error('paymentAmount') ? 'has-error' : ''; ?>" id="paymentAmountErrorDiv">
                                    <label for="paymentAmount"><?= $this->lang->line('take_exam_payment_amount') ?> <span class="text-red">*</span></label>
                                    <input type="text" class="form-control" id="paymentAmount" name="paymentAmount" readonly="readonly">
                                    <span id="paymentAmountError"><?= form_error('paymentAmount') ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="col-sm-12">
                                <div class="form-group <?= form_error('payment_method') ? 'has-error' : ''; ?>" id="payment_method_error_div">
                                    <label for="payment_method"><?= $this->lang->line('take_exam_payment_method') ?> <span class="text-red">*</span></label>
                                    <?php
                                    $payment_method_array['select'] = $this->lang->line('take_exam_select_payment_method');
                                    if (customCompute($payment_settings)) {
                                        foreach ($payment_settings as $payment_setting) {
                                            $payment_method_array[$payment_setting->slug] = $payment_setting->name;
                                        }
                                    }
                                    echo form_dropdown("payment_method", $payment_method_array, set_value("payment_method"), "id='payment_method' class='form-control select2'");
                                    ?>
                                    <span id="payment_method_error"><?= form_error('payment_method') ?></span>
                                </div>
                            </div>
                        </div>

                        <?php
                        if (inicompute($payment_settings)) {
                            foreach ($payment_settings as $payment_setting) {
                                if ($payment_setting->misc != null) {
                                    $misc = json_decode($payment_setting->misc);
                                    if (inicompute($misc->input)) {
                                        foreach ($misc->input as $input) {
                                            $this->load->view($input);
                                        }
                                    }
                                }
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" style="margin-bottom:0px;" data-dismiss="modal"><?= $this->lang->line('close') ?></button>
                    <input type="submit" id="add_payment_button" class="btn btn-success" value="<?= $this->lang->line("take_exam_add_payment") ?>" />
                </div>
            </div>
        </div>
    </div>
</form>
<?php
$js_gateway     = [];
$submit_gateway = [];
if (inicompute($payment_settings)) {
    foreach ($payment_settings as $payment_setting) {
        if ($payment_setting->misc != null) {
            $misc = json_decode($payment_setting->misc);
            if (inicompute($misc->js)) {
                foreach ($misc->js as $js) {
                    $this->load->view($js);
                }
            }

            if (inicompute($misc->input)) {
                if (isset($misc->input[0])) {
                    $js_gateway[$payment_setting->slug] = isset($misc->input[0]);
                }
            }

            if (inicompute($misc->input)) {
                if (isset($misc->submit) && $misc->submit) {
                    $submit_gateway[$payment_setting->slug] = $misc->submit;
                }
            }
        }
    }
}

$js_gateway     = json_encode($js_gateway);
$submit_gateway = json_encode($submit_gateway);
?>




<style>
    .course-card {
        border: 1px solid #ddd;
        margin-bottom: 20px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        text-align: center;
    }

    .course-image {
        max-width: 100%;
        height: auto;
        margin-bottom: 10px;
        border-radius: 5px;
    }

    .course-name {
        font-size: 1.25em;
        margin-bottom: 10px;
        color: #333;
    }

    .course-cost,
    .course-status {
        font-size: 1em;
        margin-bottom: 5px;
        color: #777;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }
</style>
<script type="text/javascript">
    const gateway = <?= $js_gateway ?>;
    const submit_gateway = <?= $submit_gateway ?>;
    let form = document.getElementById('paymentAddDataForm');
    form.addEventListener('submit', function(event) {
        event.preventDefault();
        let payment_method = $('#payment_method').val();
        let submit = false;
        for (let item in submit_gateway) {
            if (item == payment_method) {
                submit = true;
                window[payment_method + '_payment']();
                break;
            }
        }

        if (submit == false) {
            form.submit();
        }
    });

    // function newPopup(url, paidStatus, onlineExamID) {
    //     alert('newpopup');
    //     var myWindowStatus = false;
    //     if(paidStatus == 1) {
    //         myWindowStatus = true;
    //         myWindow = window.open(url,'_blank',"width=1000,height=650,toolbar=0,location=0,scrollbars=yes");
    //         runner();
    //     } else {
    //         var onlineExamID =  onlineExamID;
    //         if(onlineExamID > 0) {
    //             $('#onlineExamID').val(onlineExamID);
    //             $.ajax({
    //                 type: 'POST',
    //                 url: "<?= base_url('take_exam/get_payment_info') ?>",
    //                 data: {'onlineExamID' : onlineExamID},
    //                 dataType: "html",
    //                 success: function(data) {
    //                     $('#paymentAmount').val('');
    //                     var response = JSON.parse(data);
    //                     if(response.status == true) {
    //                         $('#paymentAmount').val(response.payableamount);
    //                     } else {
    //                         $('#paymentAmount').val('0.00');
    //                     }
    //                 }
    //             });
    //         }
    //         $('#addpayment').modal('show');
    //     }

    //     // $.ajax({
    //     //     type: 'POST',
    //     //     url: "<?= base_url('take_exam/paymentChecking') ?>",
    //     //     data: {'onlineExamID' : onlineExamID},
    //     //     dataType: "html",
    //     //     success: function(data) {
    //     //         if(data == 'TRUE' && myWindowStatus == true) {
    //     //             myWindow.close();

    //     //             if(onlineExamID > 0) {
    //     //                 $('#onlineExamID').val(onlineExamID);
    //     //                 $.ajax({
    //     //                     type: 'POST',
    //     //                     url: "<?= base_url('take_exam/get_payment_info') ?>",
    //     //                     data: {'onlineExamID' : onlineExamID},
    //     //                     dataType: "html",
    //     //                     success: function(data) {
    //     //                         $('#paymentAmount').val('');
    //     //                         var response = JSON.parse(data);
    //     //                         if(response.status == true) {
    //     //                             $('#paymentAmount').val(response.payableamount);
    //     //                         } else {
    //     //                             $('#paymentAmount').val('0.00');
    //     //                         }
    //     //                     }
    //     //                 });
    //     //             }
    //     //             $('#addpayment').modal('show');
    //     //         }
    //     //     }
    //     // });
    // }
    $('.getpaymentinfobtn').click(function() {
        var course_slug = $(this).attr('id');

        if (course_slug) {
            $('#course_slug').val(course_slug);
            $.ajax({
                type: 'POST',
                url: "<?= base_url('online_exam/get_payment_info') ?>",
                data: {
                    'course_slug': course_slug
                },
                dataType: "html",
                success: function(data) {
                    $('#paymentAmount').val('');
                    var response = JSON.parse(data);
                    console.log(response);
                    if (response.status == true) {
                        $('#paymentAmount').val(response.payableamount);
                    } else {
                        $('#paymentAmount').val('0.00');
                    }
                }
            });
        }
    });

    function runner() {

        url = localStorage.getItem('redirect_url');
        if (url) {
            localStorage.clear();
            window.location = url;
        }
        setTimeout(function() {
            runner();
        }, 500);
    }

    $(document).change(function() {

        console.log(gateway);
        let payment_method = $('#payment_method').val();
        for (let item in gateway) {
            if (item == payment_method) {
                if (gateway[item]) {
                    $('#' + item + '_div').show();
                }
            } else {
                $('#' + item + '_div').hide();
            }
        }
    });
</script>