<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-diamond"></i> <?=$this->lang->line('panel_title')?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?=base_url("dashboard/index")?>"><i class="fas fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><?=$this->lang->line('menu_certificatereport')?></li>
                </ol>
            </nav>
        </div><!-- /.card-header -->

        <!-- form start -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-3 col-md-4" id="classesDiv">
                        <label class="form-label"><?=$this->lang->line("certificatereport_class")?></label><span class="text-danger">*</span>
                        <?php
                            $array = array("0" => $this->lang->line("certificatereport_please_select"));
                            if(inicompute($classes)) {
                                foreach ($classes as $classa) {
                                    $array[$classa->classesID] = $classa->classes;
                                }
                            }
                            echo form_dropdown("classesID", $array, set_value("classesID"), "id='classesID' class='form-select select2'");
                        ?>
                    </div>

                    <div class="mb-3 col-md-4" id="sectionDiv">
                        <label class="form-label"><?=$this->lang->line("certificatereport_section")?></label>
                        <select id="sectionID" name="sectionID" class="form-select select2">
                            <option value="0"><?php echo $this->lang->line("certificatereport_please_select"); ?></option>
                        </select>
                    </div>

                    <div class="mb-3 col-md-4" id="templateDiv">
                        <label class="form-label"><?=$this->lang->line("certificatereport_template")?></label> <span class="text-danger">*</span>
                        <?php
                            $templateArray = array("0" => $this->lang->line("certificatereport_please_select"));
                            if(inicompute($templates)) {
                                foreach ($templates as $template) {
                                    $templateArray[$template->certificate_templateID] = $template->name;
                                }
                            }
                            echo form_dropdown("templateID", $templateArray, set_value("templateID"), "id='templateID' class='form-select select2'");
                        ?>
                    </div>

                    <div class="col-md-4 d-flex align-items-end">
                        <button id="get_student_list" class="btn btn-success"> <?=$this->lang->line("certificatereport_submit")?></button>
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- card-body -->
    </div><!-- card -->

    <div class="card mt-4" id="load_certificatereport"></div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('.select2').select2();

        function printDiv(divID) {
            var divElements = document.getElementById(divID).innerHTML;
            var oldPage = document.body.innerHTML;
            document.body.innerHTML = "<html><head><title></title></head><body>" + divElements + "</body>";
            window.print();
            document.body.innerHTML = oldPage;
        }

        function divHide() {
            $('#sectionDiv').hide('slow');
            $('#templateDiv').hide('slow');
        }

        function divShow() {
            $('#sectionDiv').show('slow');
            $('#templateDiv').show('slow');
        }

        divHide();

        $("#classesID").change(function () {
            var id = $(this).val();
            if (id == '0') {
                divHide();
            } else {
                divShow();
            }

            if (id == '0') {
                $('#sectionID').html('<option value="">' + "<?=$this->lang->line("certificatereport_please_select")?>" + '</option>');
                $('#sectionID').val('');
            } else {
                $.ajax({
                    type: 'POST',
                    url: "<?=base_url('certificatereport/getSection')?>",
                    data: { "id": id },
                    dataType: "html",
                    success: function (data) {
                        $('#sectionID').html(data);
                    }
                });
            }
        });

        $("#get_student_list").click(function () {
            var error = 0;
            var field = {
                'classesID': $('#classesID').val(),
                'sectionID': $('#sectionID').val(),
                'templateID': $('#templateID').val(),
            }

            if (field['classesID'] == 0) {
                $('#classesDiv').addClass('has-error');
                error++;
            } else {
                $('#classesDiv').removeClass('has-error');
            }

            if (field['templateID'] == 0) {
                $('#templateDiv').addClass('has-error');
                error++;
            } else {
                $('#templateDiv').removeClass('has-error');
            }

            if (error === 0) {
                makingPostDataPreviousofAjaxCall(field);
            }
        });

        function makingPostDataPreviousofAjaxCall(field) {
            passData = field;
            ajaxCall(passData);
        }

        function ajaxCall(passData) {
            $.ajax({
                type: 'POST',
                url: "<?=base_url('certificatereport/getStudentList')?>",
                data: passData,
                dataType: "html",
                success: function (data) {
                    var response = JSON.parse(data);
                    renderLoader(response, passData);
                }
            });
        }

        function renderLoader(response, passData) {
            if (response.status) {
                $('#load_certificatereport').html(response.render);
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
    });
</script>
