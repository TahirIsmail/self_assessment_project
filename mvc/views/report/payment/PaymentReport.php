<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa iniicon-onlineexamreport"></i> <?= $this->lang->line('onlineexamreport_payment') ?></h3>
        <ol class="breadcrumb">
            <li><a href="<?= base_url("dashboard/index") ?>"><i class="fa fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a></li>
            <li class="active"><?= $this->lang->line('onlineexamreport_payment') ?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group col-sm-4" id="onlineexamDiv">
                    <label for="onlineexamID"><?= $this->lang->line("onlineexamreport_onlineexam") ?></label> <span class="text-red">*</span>
                    <?php
                    $array = array("0" => $this->lang->line("onlineexamreport_please_select"));
                    if (inicompute($onlineexams)) {
                        foreach ($onlineexams as $onlineexam) {
                            $array[$onlineexam->onlineExamID] = $onlineexam->name;
                        }
                    }
                    echo form_dropdown("onlineexamID", $array, set_value("onlineexamID"), "id='onlineexamID' class='form-control select2'");
                    ?>
                </div>

                <div class="form-group col-sm-4" id="classesDiv">
                    <label for="classesID"><?= $this->lang->line("onlineexamreport_classes") ?></label>
                    <span class="text-red">*</span>
                    <?php
                    $array = array("0" => $this->lang->line("onlineexamreport_please_select"));
                    if (inicompute($classes)) {
                        foreach ($classes as $classa) {
                            $array[$classa->classesID] = $classa->classes;
                        }
                    }
                    echo form_dropdown("classesID", $array, set_value("classesID"), "id='classesID' class='form-control select2'");
                    ?>
                </div>

                <div class="form-group col-sm-4" id="sectionDiv">
                    <label for="sectionID"><?= $this->lang->line("onlineexamreport_section") ?></label>
                    <span class="text-red">*</span>
                    <select id="sectionID" name="sectionID" class="form-control select2">
                        <option value=""><?php echo $this->lang->line("onlineexamreport_please_select"); ?></option>
                    </select>
                </div>

                <div class="form-group col-sm-4" id="studentDiv">
                    <label for="studentID"><?= $this->lang->line("onlineexamreport_student") ?></label>
                    <span class="text-red">*</span>
                    <select id="studentID" name="studentID" class="form-control select2">
                        <option value="0"><?php echo $this->lang->line("onlineexamreport_please_select"); ?></option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <button id="get_onlineexam" class="btn btn-success" style="margin-top:23px;"> <?= $this->lang->line("onlineexamreport_submit") ?></button>
                </div>

            </div>

        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

<div class="box" id="load_onlineexampaymentreport"></div>


<script type="text/javascript">
    function printDiv(divID) {
        var oldPage = document.body.innerHTML;
        var divElements = document.getElementById(divID).innerHTML;
        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";

        window.print();
        document.body.innerHTML = oldPage;
        window.location.reload();
    }

    $('.select2').select2();

    function divHide() {
        $('#sectionDiv').hide('slow');
        $('#studentDiv').hide('slow');
    }

    function divShow() {
        $('#sectionDiv').show('slow');
        $('#studentDiv').show('slow');
    }

    $(document).ready(function() {
        divHide();
    });

    $(document).on('change', "#classesID", function() {
        var id = $(this).val();
        if (id != '0') {
            divShow()
        }
    })

    $(document).on('change', "#classesID", function() {
        $('#load_onlineexampaymentreport').html("");
        var classesID = $(this).val();
        if (classesID == '0') {
            $('#sectionID').html('<option value="">' + "<?= $this->lang->line("onlineexamreport_please_select") ?>" + '</option>');
            $('#sectionID').val('');

            $('#studentID').html('<option value="0">' + "<?= $this->lang->line("onlineexamreport_please_select") ?>" + '</option>');
            $('#studentID').val(0);

        } else {
            $.ajax({
                type: 'POST',
                url: "<?= base_url('onlineexampaymentreport/getSection') ?>",
                data: {
                    "classesID": classesID
                },
                dataType: "html",
                success: function(data) {
                    console.log(data);
                    $('#sectionID').html(data);
                }
            });

            $.ajax({
                type: 'POST',
                url: "<?= base_url('onlineexampaymentreport/getStudent') ?>",
                data: {
                    'classesID': classesID,
                    'sectionID': 0
                },
                dataType: "html",
                success: function(data) {
                    $('#studentID').html(data);
                }
            });
        }
    });

    $(document).on('change', "#sectionID", function() {
        $('#load_onlineexampaymentreport').html("");
        var classesID = $('#classesID').val();
        var sectionID = $('#sectionID').val();

        $.ajax({
            type: 'POST',
            url: "<?= base_url('onlineexampaymentreport/getStudent') ?>",
            data: {
                'classesID': classesID,
                'sectionID': sectionID
            },
            dataType: "html",
            success: function(data) {
                $('#studentID').html(data);
            }
        });
    });

    $(document).on('click', "#get_onlineexam", function() {
        var error = 0;
        var field = {
            'onlineexamID': $('#onlineexamID').val(),
            'classesID': $('#classesID').val(),
            'sectionID': $('#sectionID').val(),
            'studentID': $('#studentID').val(),
        }

        error = validation_checker(field, error);

        if (error === 0) {
            makingPostDataPreviousofAjaxCall(field);
        }
    });

    function validation_checker(field, error) {
        $('#onlineexamDiv').removeClass('has-error');
        $('#classesDiv').removeClass('has-error');
        $('#sectionDiv').removeClass('has-error');
        $('#studentDiv').removeClass('has-error');

        if (field['onlineexamID'] == 0) {
            $('#onlineexamDiv').addClass('has-error');
            error++;
        }
        if (field['classesID'] == 0) {
            $('#classesDiv').addClass('has-error');
            error++;
        }
        if (field['sectionID'] == 0) {
            $('#sectionDiv').addClass('has-error');
            error++;
        }
        if (field['studentID'] == 0) {
            $('#studentDiv').addClass('has-error');
            error++;
        }

        return error;
    }

    function makingPostDataPreviousofAjaxCall(field) {
        passData = field;
        ajaxCall(passData);
    }

    function ajaxCall(passData) {
        $.ajax({
            type: 'POST',
            url: "<?= base_url('Onlineexampaymentreport/getUserList') ?>",
            data: passData,
            dataType: "html",
            success: function(data) {
                var response = JSON.parse(data);
                renderLoder(response, passData);
            }
        });
    }

    function renderLoder(response, passData) {
        if (response.status) {
            $('#load_onlineexampaymentreport').html(response.render);
            for (var key in passData) {
                if (passData.hasOwnProperty(key)) {
                    $('#' + key).parent().removeClass('has-error');
                }
            }
        } else {
            for (var key in passData) {
                if (passData.hasOwnProperty(key)) {
                    $('#' + key).parent().removeClass('has-error');
                }
            }

            for (var key in response) {
                if (response.hasOwnProperty(key)) {
                    $('#' + key).parent().addClass('has-error');
                }
            }
        }
    }
</script>