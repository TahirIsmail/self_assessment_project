
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-star"></i> <?=$this->lang->line('panel_title')?></h3>


        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("section/index")?>"></i><?=$this->lang->line('menu_section')?></a></li>
            <li class="active"><?=$this->lang->line('menu_add')?> <?=$this->lang->line('menu_section')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
                <form class="form-horizontal" role="form" method="post">

                    <?php
                        if(form_error('section'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="section" class="col-sm-2 control-label">
                            <?=$this->lang->line("section_name")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="section" name="section" value="<?=set_value('section')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('section'); ?>
                        </span>
                    </div>

                    <div class="form-group">
                    <label for="note" class="col-sm-2 control-label">
                        <?=$this->lang->line("subject_name")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                        <input type="text" id="tags" name="subject_name" data-role="tagsinput" placeholder="Enter Units Name" value="<?=set_value('subject_name')?>">
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('subject_name'); ?>
                        </span>
                    </div>


                    <?php
                        if(form_error('classesID'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="classesID" class="col-sm-2 control-label">
                            <?php
                                if($siteinfos->school_type == 'classbase') {
                                    echo $this->lang->line("section_classes"). ' <span class="text-red">*</span>';
                                    $array = array();
                                    $array[0] = $this->lang->line("section_select_class");
                                } else {
                                    $array = array();
                                    $array[0] = $this->lang->line("section_select_department");
                                    echo $this->lang->line("section_department");
                                }
                            ?>
                        </label>
                        <div class="col-sm-6">

                            <?php
                                foreach ($classes as $classa) {
                                    $array[$classa->classesID] = $classa->classes;
                                }
                                echo form_dropdown("classesID", $array, set_value("classesID"), "id='classesID' class='form-control select2'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('classesID'); ?>
                        </span>
                    </div>


                    <?php
                        if(form_error('note'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="note" class="col-sm-2 control-label">
                            <?=$this->lang->line("section_note")?>
                        </label>
                        <div class="col-sm-6">
                            <textarea class="form-control" style="resize:none;" id="note" name="note"><?=set_value('note')?></textarea>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('note'); ?>
                        </span>
                    </div>


                    <div class="form-group <?=form_error('ispaid') ? 'has-error' : '' ?>" id="ispaidDiv" >
                        <label for="ispaid" class="col-sm-2 control-label">
                            <?=$this->lang->line("online_exam_payment_status")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <?php
                                $array = [
                                    5 => $this->lang->line("online_exam_select"),
                                    0 => $this->lang->line("online_exam_free"),
                                    1 => $this->lang->line("online_exam_paid")
                                ];
                                echo form_dropdown("ispaid", $array, set_value("ispaid"), "id='ispaid' class='form-control select2'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('ispaid'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('validDays'))
                            echo "<div class='form-group has-error' id='validDaysDiv'>";
                        else
                            echo "<div class='form-group' id='validDaysDiv'>";
                    ?>
                        <label for="validDays" class="col-sm-2 control-label">
                            <?=$this->lang->line("online_exam_validDays")?>
                        </label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="validDays" name="validDays" value="<?=set_value('validDays')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('validDays'); ?>
                        </span>
                    </div>

                    <?php
                    if(form_error('cost'))
                        echo "<div class='form-group has-error' id='costDiv'>";
                    else
                        echo "<div class='form-group' id='costDiv'>";
                    ?>
                        <label for="cost" class="col-sm-2 control-label">
                            <?=$this->lang->line("online_exam_cost")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="cost" name="cost" value="<?=set_value('cost')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('cost'); ?>
                        </span>
                    </div>

                    <?php
                    if(form_error('judge'))
                        echo "<div class='form-group has-error' style='display: none;'>";
                    else
                        echo "<div class='form-group' style='display: none;'>";
                    ?>
                        <label for="judge" class="col-sm-2 control-label">
                            <?=$this->lang->line("online_exam_judge")?>
                        </label>
                        <div class="col-sm-4">
                            <?php
                            $array = [
                                0 => $this->lang->line("online_exam_auto"),
                                1 => $this->lang->line("online_exam_manually")
                            ];
                            echo form_dropdown("judge", $array, set_value("judge"), "id='judge' class='form-control select2'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('judge'); ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="<?=$this->lang->line("add_section")?>" >
                        </div>
                    </div>


                    <?php
                        // if(form_error('category'))
                        //     echo "<div class='form-group has-error' >";
                        // else
                        //     echo "<div class='form-group' >";
                    ?>
                        <!-- <label for="category" class="col-sm-2 control-label">
                            <?=$this->lang->line("section_category")?> <span class="text-red">*</span>
                        </label> -->
                        <!-- <div class="col-sm-6">
                            <input type="text" class="form-control" id="category" name="category" value="<?=set_value('category')?>" >
                        </div> -->
                        <!-- <span class="col-sm-4 control-label">
                            <?php echo form_error('category'); ?>
                        </span> -->
                    <!-- </div> -->

                    <?php
                        // if(form_error('capacity'))
                        //     echo "<div class='form-group has-error' >";
                        // else
                        //     echo "<div class='form-group' >";
                    ?>
                        <!-- <label for="capacity" class="col-sm-2 control-label">
                            <?=$this->lang->line("section_capacity")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="capacity" name="capacity" value="<?=set_value('capacity')?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('capacity'); ?>
                        </span>
                    </div> -->

                   

                    <?php
                        // if(form_error('teacherID'))
                        //     echo "<div class='form-group has-error' >";
                        // else
                        //     echo "<div class='form-group' >";
                    ?>
                        <!-- <label for="teacherID" class="col-sm-2 control-label">
                            <?=$this->lang->line("section_teacher_name")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">

                            <?php
                                $array = array();
                                $array[0] = $this->lang->line("section_select_teacher");

                                foreach ($teachers as $teacher) {
                                    $array[$teacher->teacherID] = $teacher->name;
                                }
                                echo form_dropdown("teacherID", $array, set_value("teacherID"), "id='teacherID' class='form-control select2'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('teacherID'); ?>
                        </span>
                    </div> -->

                    
                   
                </form>
                <?php if ($siteinfos->note==1) { ?>
                    <!-- <div class="callout callout-danger">
                        <p><b>Note:</b> Create a class and teacher before create a new section</p>
                    </div> -->
                <?php } ?>

            </div>
        </div>
    </div>
</div>

<script>
$( ".select2" ).select2( { placeholder: "", maximumSelectionSize: 6 } );

$(function() {
        $('#validDaysDiv').hide();
        $('#costDiv').hide();
    })

    
    $('#ispaid').change(function(event) {
        if($(this).val() == 1) {
            $('#costDiv').show();
        } else {
            $('#costDiv').hide();
        }
    });

    $(document).ready(function() {
        if($('#ispaid').val() == 1) {
            $('#costDiv').show();
        } else {
            $('#costDiv').hide();
        }
    });
</script>
