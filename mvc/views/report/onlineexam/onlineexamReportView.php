<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="bi bi-journal-code"></i> <?=$this->lang->line('panel_title')?></h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?=base_url("dashboard/index")?>"><i class="bi bi-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$this->lang->line('menu_onlineexamreport')?></li>
            </ol>
        </nav>
    </div><!-- /.card-header -->
    
    <!-- Form Start -->
    <div class="card-body">
        <div class="row">

            <div class="col-12">
                <div class="mb-3 col-md-4" id="onlineexamDiv">
                    <label for="onlineexamID" class="form-label"><?=$this->lang->line("onlineexamreport_onlineexam")?></label> 
                    <span class="text-danger">*</span>
                    <?php
                        $array = array("0" => $this->lang->line("onlineexamreport_please_select"));
                        if(inicompute($onlineexams)) {
                            foreach ($onlineexams as $onlineexam) {
                                 $array[$onlineexam->onlineExamID] = $onlineexam->name;
                            }
                        }
                        echo form_dropdown("onlineexamID", $array, set_value("onlineexamID"), "id='onlineexamID' class='form-select select2'");
                     ?>
                </div>

                <div class="mb-3 col-md-4" id="classesDiv">
                    <label for="classesID" class="form-label"><?=$this->lang->line("onlineexamreport_classes")?></label>
                    <span class="text-danger">*</span>
                    <?php
                        $array = array("0" => $this->lang->line("onlineexamreport_please_select"));
                        if(inicompute($classes)) {
                            foreach ($classes as $classa) {
                                 $array[$classa->classesID] = $classa->classes;
                            }
                        }
                        echo form_dropdown("classesID", $array, set_value("classesID"), "id='classesID' class='form-select select2'");
                     ?>
                </div>

                <div class="mb-3 col-md-4" id="sectionDiv">
                    <label for="sectionID" class="form-label"><?=$this->lang->line("onlineexamreport_section")?></label>
                    <select id="sectionID" name="sectionID" class="form-select select2">
                        <option value=""><?php echo $this->lang->line("onlineexamreport_please_select"); ?></option>
                    </select>
                </div>

                <div class="mb-3 col-md-4" id="studentDiv">
                    <label for="studentID" class="form-label"><?=$this->lang->line("onlineexamreport_student")?></label>
                    <select id="studentID" name="studentID" class="form-select select2">
                        <option value="0"><?php echo $this->lang->line("onlineexamreport_please_select"); ?></option>
                    </select>
                </div>

                <div class="mb-3 col-md-4" id="statusDiv">
                    <label for="statusID" class="form-label"><?=$this->lang->line("onlineexamreport_status")?></label> 
                    <span class="text-danger">*</span>
                    <?php
                        $statusArray = array(
                            "0" => $this->lang->line("onlineexamreport_please_select"),
                            "5" => $this->lang->line("onlineexamreport_passed"),
                            "10" => $this->lang->line("onlineexamreport_failed")
                        );
                        echo form_dropdown("statusID", $statusArray, set_value("statusID"), "id='statusID' class='form-select select2'");
                     ?>
                </div>

                <div class="col-md-4">
                    <button id="get_onlineexam" class="btn btn-success mt-3"> <?=$this->lang->line("onlineexamreport_submit")?></button>
                </div>
            </div>

        </div><!-- row -->
    </div><!-- /.card-body -->
</div><!-- /.card -->

<div class="card" id="load_onlineexamreport"></div>


<script type="text/javascript">
    $('.select2').select2();

    function divHide(){
        $('#sectionDiv').hide('slow');  
        $('#studentDiv').hide('slow');   
    }

    function divShow(){ 
        $('#sectionDiv').show('slow');  
        $('#studentDiv').show('slow');  
    }

    $(document).ready(function() {
        divHide();
    });

    $(document).on('change', "#onlineexamID, #classesID", function() {
        var id = $(this).val();
        if(id != '0') {
            divShow();
        }
    });

    $(document).on('change', "#classesID", function() {
        var classesID = $(this).val();
        if(classesID == '0') {
            $('#sectionID').html('<option value="">'+"<?=$this->lang->line("onlineexamreport_please_select")?>"+'</option>');
            $('#sectionID').val('');
            $('#studentID').html('<option value="0">'+"<?=$this->lang->line("onlineexamreport_please_select")?>"+'</option>');
            $('#studentID').val(0);
        } else {
            $.ajax({
                type: 'POST',
                url: "<?=base_url('onlineexamreport/getSection')?>",
                data: {"classesID" : classesID},
                dataType: "html",
                success: function(data) {
                   $('#sectionID').html(data);
                }
            });

            $.ajax({
                type: 'POST',
                url: "<?=base_url('onlineexamreport/getStudent')?>",
                data: {'classesID' : classesID, 'sectionID' : 0},
                dataType: "html",
                success: function(data) {
                   $('#studentID').html(data);
                }
            });
        }
    });

    $(document).on('change', "#sectionID", function() {
        var classesID = $('#classesID').val();
        var sectionID = $('#sectionID').val();

        $.ajax({
            type: 'POST',
            url: "<?=base_url('onlineexamreport/getStudent')?>",
            data: {'classesID' : classesID, 'sectionID' : sectionID},
            dataType: "html",
            success: function(data) {
               $('#studentID').html(data);
            }
        });
    });

    $(document).on('click', "#get_onlineexam", function() {
        var error = 0;
        var field = {
            'onlineexamID'  : $('#onlineexamID').val(), 
            'classesID'     : $('#classesID').val(), 
            'sectionID'     : $('#sectionID').val(), 
            'studentID'     : $('#studentID').val(), 
            'statusID'      : $('#statusID').val(),  
        }

        error = validation_checker(field, error);

        if(error === 0) {
            makingPostDataPreviousofAjaxCall(field);
        }
    });

    function validation_checker(field, error) {
        if(field['onlineexamID'] == 0 && field['classesID'] == 0) {
            $('#onlineexamDiv').addClass('has-error');
            $('#classesDiv').addClass('has-error');
            error++;
        } else {
            $('#onlineexamDiv').removeClass('has-error');
            $('#classesDiv').removeClass('has-error');
        }

        if (field['statusID'] == 0) {
            $('#statusDiv').addClass('has-error');
            error++;
        } else {
            $('#statusDiv').removeClass('has-error');
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
            url: "<?=base_url('onlineexamreport/getUserList')?>",
            data: passData,
            dataType: "html",
            success: function(data) {
                var response = JSON.parse(data);
                renderLoder(response, passData);
            }
        });
    }

    function renderLoder(response, passData) {
        if(response.status) {
            $('#load_onlineexamreport').html(response.render);
            for (var key in passData) {
                if (passData.hasOwnProperty(key)) {
                    $('#'+key).parent().removeClass('has-error');
                }
            }
        } else {
            for (var key in passData) {
                if (passData.hasOwnProperty(key)) {
                    $('#'+key).parent().removeClass('has-error');
                }
            }

            for (var key in response) {
                if (response.hasOwnProperty(key)) {
                    $('#'+key).parent().addClass('has-error');
                }
            }
        }
    }
</script>
