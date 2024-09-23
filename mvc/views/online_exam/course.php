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
                                <div class="card mb-4" style="border-radius: 8px; overflow: hidden;">
                                    <img src="<?= base_url('uploads/images/' . $en_course->image); ?>" alt="<?= $en_course->name; ?>" class="card-img-top">
                                    <div class="card-body text-center d-grid">
                                        <h4 class="card-title fw-bold text-black"><?= $en_course->name; ?></h4>
                                        <p class="card-text"><?= $en_course->paid ? $this->lang->line('paid') : $this->lang->line('free'); ?></p>
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
                                <div class="card mb-4" style="border-radius: 8px; overflow: hidden;">
                                    <img src="<?= base_url('uploads/images/' . $un_course->image); ?>" alt="<?= $un_course->name; ?>" class="card-img-top">
                                    <div class="card-body text-center">
                                        <h4 class="card-title fw-bold text-black"><?= $un_course->name; ?></h4>
                                        <p class="card-text"><?= $un_course->cost ? '$' . number_format($un_course->cost, 2) : $this->lang->line('free'); ?></p>
                                        <p class="card-text"><?= $un_course->paid ? $this->lang->line('paid') : $this->lang->line('free'); ?></p>
                                        <a href="#addpayment" id="<?= $un_course->slug ?>" class="btn btn-primary getpaymentinfobtn" data-bs-toggle="modal"><i class="fa fa-credit-card" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $this->lang->line('enroll_now') ?>"></i> <?= $this->lang->line('enroll_now') ?></a>
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
    <div class="modal fade" id="addpayment" tabindex="-1" aria-labelledby="addpaymentLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <h4 class="modal-title"><?= $this->lang->line('take_exam_add_payment') ?></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <input type="text" name="course_slug" id="course_slug" style="display:none">
                        <div class="col-sm-6">
                            <div class="col-sm-12">
                                <div class="form-group <?= form_error('paymentAmount') ? 'has-error' : ''; ?>" id="paymentAmountErrorDiv">
                                    <label for="paymentAmount"><?= $this->lang->line('take_exam_payment_amount') ?> <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="paymentAmount" name="paymentAmount" readonly="readonly">
                                    <span id="paymentAmountError"><?= form_error('paymentAmount') ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="col-sm-12">
                                <div class="form-group <?= form_error('payment_method') ? 'has-error' : ''; ?>" id="payment_method_error_div">
                                    <label for="payment_method"><?= $this->lang->line('take_exam_payment_method') ?> <span class="text-danger">*</span></label>
                                    <?php
                                    $payment_method_array['select'] = $this->lang->line('take_exam_select_payment_method');
                                    if (customCompute($payment_settings)) {
                                        foreach ($payment_settings as $payment_setting) {
                                            $payment_method_array[$payment_setting->slug] = $payment_setting->name;
                                        }
                                    }
                                    echo form_dropdown("payment_method", $payment_method_array, set_value("payment_method"), "id='payment_method' class='form-select'");
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= $this->lang->line('close') ?></button>
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
