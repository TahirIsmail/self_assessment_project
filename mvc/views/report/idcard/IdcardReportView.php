<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="bi bi-id-card"></i> <?=$this->lang->line('panel_title')?></h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?=base_url("dashboard/index")?>"><i class="bi bi-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
                <li class="breadcrumb-item active" aria-current="page"> <?=$this->lang->line('menu_idcardreport')?></li>
            </ol>
        </nav>
    </div><!-- /.card-header -->
    
    <!-- Form Start -->
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <div class="mb-3 col-4" id="usertypeIDDiv">
                    <label for="usertypeID" class="form-label"><?=$this->lang->line("idcardreport_idcard_for")?> <span class="text-danger">*</span></label>
                    <?php
                        $usertypesArray['0'] = $this->lang->line("idcardreport_please_select");
                        if(inicompute($usertypes)) {
                            foreach($usertypes as $usertype) {
                                if($usertype->usertypeID != 4) {
                                    $usertypesArray[$usertype->usertypeID] = $usertype->usertype;
                                }
                            }
                        }
                        echo form_dropdown("usertypeID", $usertypesArray, set_value("usertypeID"), "id='usertypeID' class='form-select select2'");
                    ?>
                </div>

                <div class="mb-3 col-4" id="classesDiv">
                    <label for="classesID" class="form-label"><?=$this->lang->line("idcardreport_class")?> <span class="text-danger">*</span></label>
                    <?php
                        $classesArray['0'] = $this->lang->line("idcardreport_please_select");
                        if(inicompute($classes)) {
                            foreach ($classes as $classaKey => $classa) {
                                $classesArray[$classa->classesID] = $classa->classes;
                            }
                        }
                        echo form_dropdown("classesID", $classesArray, set_value("classesID"), "id='classesID' class='form-select select2'");
                    ?>
                </div>

                <div class="mb-3 col-4" id="sectionDiv">
                    <label for="sectionID" class="form-label"><?=$this->lang->line("idcardreport_section")?></label>
                    <?php
                        $sectionArray = array("0" => $this->lang->line("idcardreport_please_select"));
                        echo form_dropdown("sectionID", $sectionArray, set_value("sectionID"), "id='sectionID' class='form-select select2'");
                    ?>
                </div>

                <div class="mb-3 col-4" id="userDiv">
                    <label id="userDivlabel" for="userID" class="form-label"><?=$this->lang->line("idcardreport_user")?></label>
                    <?php
                        $userArray['0'] = $this->lang->line("idcardreport_please_select");
                        echo form_dropdown("userID", $userArray, set_value("userID"), "id='userID' class='form-select select2'");
                    ?>
                </div>

                <div class="mb-3 col-4" id="typeDiv">
                    <label for="type" class="form-label"><?=$this->lang->line("idcardreport_type")?> <span class="text-danger">*</span></label>
                    <?php
                        $typeArray = array(
                            '0' => $this->lang->line("idcardreport_please_select"),
                            '1' => $this->lang->line("idcardreport_frontpart"),
                            '2' => $this->lang->line("idcardreport_backpart"),
                        );
                        echo form_dropdown("type", $typeArray, set_value("type"), "id='type' class='form-select select2'");
                    ?>
                </div>

                <div class="mb-3 col-4" id="backgroundDiv">
                    <label for="background" class="form-label"><?=$this->lang->line("idcardreport_background")?> <span class="text-danger">*</span></label>
                    <?php
                        $backgroundArray = array(
                            '0' => $this->lang->line("idcardreport_please_select"),
                            '1' => $this->lang->line("idcardreport_yes"),
                            '2' => $this->lang->line("idcardreport_no"),
                        );
                        echo form_dropdown("background", $backgroundArray, set_value("background"), "id='background' class='form-select select2'");
                    ?>
                </div>

                <div class="mb-3 col-4">
                    <button id="get_idcardreport" class="btn btn-success" style="margin-top:30px;"> <?=$this->lang->line("idcardreport_submit")?></button>
                </div>
            </div>
        </div><!-- row -->
    </div><!-- card-body -->
</div><!-- /.card -->

<div id="load_idcardreport"></div>

<script type="text/javascript">
    function printDiv(divID) {
        var oldPage = document.body.innerHTML;
        var divElements = document.getElementById(divID).innerHTML;
        document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
        window.print();
        document.body.innerHTML = oldPage;
        window.location.reload();
    }

    $(function() {
        $("#usertypeID").val(0);
        $("#classesID").val(0);
        $("#sectionID").val(0);
        $("#userID").val(0);
        $("#type").val(0);
        $("#background").val(0);
        $('#classesDiv').hide('slow');
        $('#sectionDiv').hide('slow');
        $('#userDiv').hide('slow');
        $(".select2").select2();
    });

    $(document).on('change', "#usertypeID", function() {
        $('#load_idcardreport').html("");
        var usertypeID = $(this).val();
        var classesID = $("#classesID").val();
        var sectionID = $("#sectionID").val();
        var idcardtext = $('#usertypeID option:selected').text();
        $('#userDivlabel').text(idcardtext);

        if(usertypeID == '0'){
            $('#classesDiv').hide('slow');
            $('#sectionDiv').hide('slow');
            $('#userDiv').hide('slow');
        } else if(usertypeID == '3') {
            $("#classesID").val(0);
            $("#sectionID").val(0);
            $("#userID").val(0);
            $('#classesDiv').show('slow');
            $('#sectionDiv').show('slow');
            $('#userDiv').show('slow');
        } else if(usertypeID !='3') {
            $("#classesID").val(0);
            $("#sectionID").val(0);
            $("#userID").val(0);
            $('#classesDiv').hide('slow');
            $('#sectionDiv').hide('slow');
            $('#userDiv').show('slow');
        }

        var passData = { 'usertypeID': usertypeID, 'classesID': classesID, 'sectionID': sectionID };

        if(usertypeID > 0) {
            $.ajax({
                type: 'POST',
                url: '<?=base_url('idcardreport/getUser')?>',
                data: passData,
                success: function(data) {
                    $('#userID').html(data);
                }
            });
        }
    });

    $(document).on('change', "#classesID", function() {
        $('#load_idcardreport').html('');
        var usertypeID = $('#usertypeID').val();
        var classesID = $(this).val();
        if(classesID == 0) {
            $('#sectionID').html('<option value="0">'+"<?=$this->lang->line("idcardreport_please_select")?>"+'</option>');
            $('#userID').html('<option value="0">'+"<?=$this->lang->line("idcardreport_please_select")?>"+'</option>');
        } else {
            $.ajax({
                type:'POST',
                url:'<?=base_url('idcardreport/getSection')?>',
                data:{'classesID':classesID},
                success:function(data) {
                    $('#sectionID').html(data);
                }
            });
        }

        if(classesID > 0 && usertypeID == 3) {
            $.ajax({
                type:'POST',
                url:'<?=base_url('idcardreport/getStudentByClass')?>',
                data:{'usertypeID':usertypeID,'classesID':classesID},
                success:function(data) {
                    $('#userID').html(data);
                }
            });
        }
    });

    $(document).on('change', "#sectionID", function() {
        $('#load_idcardreport').html('');
        var usertypeID = $('#usertypeID').val();
        var classesID = $('#classesID').val();
        var sectionID = $('#sectionID').val();

        if(classesID > 0 && usertypeID == 3) {
            $.ajax({
                type:'POST',
                url:'<?=base_url('idcardreport/getStudentBySection')?>',
                data:{'usertypeID':usertypeID,'classesID':classesID,'sectionID':sectionID},
                success:function(data) {
                    $('#userID').html('0');
                    $('#userID').html(data);
                }
            });
        }
    });

    $(document).on('change', "#userID, #type, #background", function() {
        $('#load_idcardreport').html("");
    });

    $(document).on('click','#get_idcardreport', function() {
        var usertypeID = $('#usertypeID').val();
        var classesID = $('#classesID').val();
        var sectionID = $('#sectionID').val();
        var userID = $('#userID').val();
        var type = $('#type').val();
        var background = $('#background').val();
        var error = 0;
        var field = { 'usertypeID': usertypeID, 'classesID': classesID, 'sectionID': sectionID, 'userID': userID, 'type': type, 'background': background };

        if(usertypeID == 0 ) {
            $('#usertypeIDDiv').addClass('has-error');
            error++;
        } else {
            $('#usertypeIDDiv').removeClass('has-error');
        }

        if(usertypeID == 3 && classesID == 0 ) {
            $('#classesDiv').addClass('has-error');
            error++;
        } else {
            $('#classesDiv').removeClass('has-error');
        }

        if(type == 0 ) {
            $('#typeDiv').addClass('has-error');
            error++;
        } else {
            $('#typeDiv').removeClass('has-error');
        }

        if(background == 0 ) {
            $('#backgroundDiv').addClass('has-error');
            error++;
        } else {
            $('#backgroundDiv').removeClass('has-error');
        } 

        if(error == 0 ) {
            makingPostDataPreviousofAjaxCall(field);
        }
    });

    function makingPostDataPreviousofAjaxCall(field) {
        var passData = field;
        ajaxCall(passData);
    }

    function ajaxCall(passData) {
        $.ajax({
            type: 'POST',
            url: '<?=base_url('idcardreport/getIdcardReport')?>',
            data: passData,
            dataType: 'html',
            success: function(data) {
                var response = JSON.parse(data);
                renderLoder(response, passData);
            }
        });
    }

    function renderLoder(response, passData) {
        if(response.status) {
            $('#load_idcardreport').html(response.render);
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
