<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-clipboard-list"></i> <?=$this->lang->line('panel_title')?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?=base_url("dashboard/index")?>"><i class="fas fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><?=$this->lang->line('menu_onlineexamquestionreport')?></li>
                </ol>
            </nav>
        </div>
        <!-- form start -->
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <div class="mb-3 col-md-4" id="examDiv">
                        <label for="onlineExamID" class="form-label"><?=$this->lang->line("onlineexamquestionreport_exam")?></label><span class="text-danger">*</span>
                        <?php
                            $array = array("0" => $this->lang->line("onlineexamquestionreport_please_select"));
                            if(inicompute($online_exams)) {
                                foreach ($online_exams as $online_exam) {
                                    $array[$online_exam->onlineExamID] = $online_exam->name;
                                }
                            }
                            echo form_dropdown("onlineExamID", $array, set_value("onlineExamID"), "id='onlineExamID' class='form-control select2'");
                        ?>
                    </div>
                    
                    <div class="mb-3 col-md-4" id="typeDiv">
                        <label for="typeID" class="form-label"><?=$this->lang->line("onlineexamquestionreport_type")?></label><span class="text-danger">*</span>
                        <select id="typeID" name="typeID" class="form-control select2">
                            <option value="0"><?php echo $this->lang->line("onlineexamquestionreport_please_select"); ?></option>
                            <option value="1"><?php echo $this->lang->line("onlineexamquestionreport_question"); ?></option>
                            <option value="2"><?php echo $this->lang->line("onlineexamquestionreport_ormsheet"); ?></option>
                            <option value="3"><?php echo $this->lang->line("onlineexamquestionreport_answersheet"); ?></option>
                        </select>
                    </div>

                    <div class="col-md-4 d-flex align-items-end">
                        <button id="get_question_list" class="btn btn-success" style="margin-top: 10px;"><?=$this->lang->line("onlineexamquestionreport_submit")?></button>
                    </div>
                </div>
            </div><!-- row -->
        </div><!-- Body -->
    </div>
</div>

<div id="load_onlineexamquestionreport"></div>

<script type="text/javascript">
    $(document).ready(function () {
        $('.select2').select2();

        function printDiv(divID) {
            var divElements = document.getElementById(divID).innerHTML;
            var oldPage = document.body.innerHTML;
            document.body.innerHTML =
                "<html><head><title></title></head><body>" +
                divElements + "</body>";
            window.print();
            document.body.innerHTML = oldPage;
        }

        function divHide() {
            $('#typeDiv').hide('slow');
        }

        function divShow() {
            $('#typeDiv').show('slow');
        }

        divHide();

        $("#onlineExamID").change(function () {
            var id = $(this).val();
            if (id == 0) {
                divHide();
            } else {
                divShow();
            }
        });

        $("#get_question_list").click(function () {
            var error = 0;
            var field = {
                'onlineExamID': $('#onlineExamID').val(),
                'typeID': $('#typeID').val(),
            };

            if (field['onlineExamID'] == 0) {
                $('#examDiv').addClass('has-error');
                error++;
            } else {
                $('#examDiv').removeClass('has-error');
            }

            if (field['typeID'] == 0) {
                $('#typeDiv').addClass('has-error');
                error++;
            } else {
                $('#typeDiv').removeClass('has-error');
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
                url: "<?=base_url('onlineexamquestionreport/getQuestionList')?>",
                data: passData,
                dataType: "html",
                success: function (data) {
                    var response = JSON.parse(data);
                    renderLoder(response, passData);
                }
            });
        }

        function renderLoder(response, passData) {
            if (response.status) {
                $('#load_onlineexamquestionreport').html(response.render);
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
