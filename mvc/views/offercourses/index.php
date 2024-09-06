<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-star"></i> <?= $this->lang->line('course_title') ?></h3>

        <ol class="breadcrumb">
            <li><a href="<?= base_url("dashboard/index") ?>"><i class="fa fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a></li>
            <li class="active"><?= $this->lang->line('menu_course') ?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">

                <?php
                if (permissionChecker('course_add')) {
                ?>
                    <h5 class="page-header">
                        <a href="<?php echo base_url('offercourses/add') ?>">
                            <i class="fa fa-plus"></i>
                            <?= $this->lang->line('add_title') ?>
                        </a>

                        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12 pull-right drop-marg">
                            <?php
                            $array = array("0" => $this->lang->line("course_select_class"));
                            if (inicompute($classes)) {
                                foreach ($classes as $classa) {
                                    $array[$classa->classesID] = $classa->classes;
                                }
                            }

                            echo form_dropdown("classesID", $array, set_value("classesID", $set), "id='classesID' class='pull-right form-control select2'");
                            ?>
                        </div>

                    </h5>
                <?php } ?>


                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="col-lg-1"><?= $this->lang->line('slno') ?></th>
                                <th class="col-lg-2"><?= $this->lang->line('course_name') ?></th>
                                <th class="col-lg-2"><?= $this->lang->line('course_category') ?></th>
                                <th class="col-lg-2"><?= $this->lang->line('subject_names') ?></th>
                                <th class="col-lg-2"><?= $this->lang->line('course_note') ?></th>
                                <?php if (permissionChecker('course_edit') || permissionChecker('course_delete')) { ?>
                                    <th class="col-lg-1"><?= $this->lang->line('action') ?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (inicompute($courses)) {
                                $i = 1;
                                foreach ($courses as $course) {
                                    // dd($course['course']);
                            ?>
                                    <tr>
                                        <td data-title="<?= $this->lang->line('slno') ?>">
                                            <?php echo $i; ?>
                                        </td>
                                        <td data-title="<?= $this->lang->line('course_name') ?>">
                                            <?php echo $course['course_name']; ?>
                                        </td>
                                        <td data-title="<?= $this->lang->line('course_category') ?>">
                                            <?php echo $course['category']; ?>
                                        </td>
                                        <td data-title="<?= $this->lang->line('subject_names') ?>">
                                            <?php
                                            $subjectNames = array_column($course['subjects'], 'subject');
                                            echo implode(', ', $subjectNames);
                                            ?>
                                        </td>
                                        <td data-title="<?= $this->lang->line('course_note') ?>">
                                            <?php echo $course['note']; ?>
                                        </td>
                                        <?php if (permissionChecker('course_edit') || permissionChecker('course_delete')) { ?>
                                            <td data-title="<?= $this->lang->line('action') ?>">
                                                <?php echo btn_edit('offercourses/edit/' . $course['courseID'] . '/' . $set, $this->lang->line('edit')) ?>
                                                <?php echo btn_delete('offercourses/delete/' . $course['courseID'] . '/' . $set, $this->lang->line('delete')) ?>
                                            </td>
                                        <?php } ?>
                                    </tr>
                            <?php $i++;
                                }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#classesID').change(function() {
        var classesID = $(this).val();
        if (classesID == 0) {
            $('#hide-table').hide();
        } else {
            $.ajax({
                type: 'POST',
                url: "<?= base_url('offercourses/course_list') ?>",
                data: "id=" + classesID,
                dataType: "html",
                success: function(data) {
                    window.location.href = data;
                }
            });
        }
    });
</script>

<script>
    $(".select2").select2({
        placeholder: "",
        maximumSelectionSize: 6
    });
</script>
