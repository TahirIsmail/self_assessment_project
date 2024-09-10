<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-star"></i> <?= $this->lang->line('course_title') ?></h3>

        <ol class="breadcrumb">
            <li><a href="<?= base_url("dashboard/index") ?>"><i class="fa fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a></li>
            <li class="active"><?= $this->lang->line('menu_course') ?></li>
        </ol>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">


                <?php if (permissionChecker('course_add')) { ?>
                    <h5 class="page-header">
                        <a href="<?= base_url('offercourses/add') ?>">
                            <i class="fa fa-plus"></i> <?= $this->lang->line('add_title') ?>
                        </a>
                    </h5>
                <?php } ?>


                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="col-lg-1"><?= $this->lang->line('serial_no') ?></th>
                                <th class="col-lg-2"><?= $this->lang->line('course_id') ?></th>
                                <th class="col-lg-2"><?= $this->lang->line('course_name') ?></th>
                                <th class="col-lg-2"><?= $this->lang->line('course_description') ?></th>
                                <?php if (permissionChecker('course_edit') || permissionChecker('course_delete')) { ?>
                                    <th class="col-lg-1"><?= $this->lang->line('action') ?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($courses)) {
                                $i = 1;
                                foreach ($courses as $course) { ?>
                                    <tr>
                                        <td data-title="<?= $this->lang->line('serial_no') ?>"><?= $i; ?></td>
                                        <td data-title="<?= $this->lang->line('course_id') ?>"><?= $course->course_id; ?></td>
                                        <td data-title="<?= $this->lang->line('course_name') ?>"><?= $course->course_name; ?></td>
                                        <td data-title="<?= $this->lang->line('course_description') ?>">
                                            <?= $course->course_description; ?>
                                        </td>
                                        <?php if (permissionChecker('course_edit') || permissionChecker('course_delete')) { ?>
                                            <td data-title="<?= $this->lang->line('action') ?>">

                                                <a href="<?= base_url('offercourses/edit/' . $course->id) ?>" class="btn btn-warning btn-sm">
                                                    <i class="fa fa-pencil"></i> <?= $this->lang->line('edit') ?>
                                                </a>


                                                <a href="<?= base_url('offercourses/delete/' . $course->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this course?');">
                                                    <i class="fa fa-trash"></i> <?= $this->lang->line('delete') ?>
                                                </a>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php $i++;
                                }
                            } else { ?>
                                <tr>
                                    <td colspan="5"><?= $this->lang->line('no_data_available') ?></td>
                                </tr>
                            <?php } ?>
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