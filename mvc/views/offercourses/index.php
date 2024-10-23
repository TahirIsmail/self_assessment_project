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

                <h5 class="page-header">
                    <a href="<?= base_url('offercourses/add') ?>">
                        <i class="fa fa-plus"></i> <?= $this->lang->line('add_title') ?>
                    </a>
                </h5>


                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="col-lg-1"><?= $this->lang->line('#') ?></th>
                                <th class="col-lg-2"><?= $this->lang->line('course_id') ?></th>
                                <th class="col-lg-2"><?= $this->lang->line('category_name') ?></th>
                                <th class="col-lg-2"><?= $this->lang->line('course_name') ?></th>
                                <th class="col-lg-2"><?= $this->lang->line('course_description') ?></th>
                                <th class="col-lg-1"><?= $this->lang->line('action') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($courses)) {
                                $i = 1;
                                foreach ($courses as $course) { ?>
                                    <tr>
                                        <td data-title="<?= $this->lang->line('serial_no') ?>"><?= $i; ?></td>
                                        <td data-title="<?= $this->lang->line('course_id') ?>"><?= $course->course_id; ?></td>
                                        <td data-title="<?= $this->lang->line('category_name') ?>"><?= $course->category_name; ?></td>
                                        <td data-title="<?= $this->lang->line('course_name') ?>"><?= $course->course_name; ?></td>
                                        <td data-title="<?= $this->lang->line('course_description') ?>">
                                            <p class="short-description">
                                                <?= strlen($course->course_description) > 150 ? substr($course->course_description, 0, 150) . '...' : $course->course_description ?>
                                            </p>
                                        </td>
                                        <td data-title="<?= $this->lang->line('action') ?>">
                                            <a href="<?= base_url('offercourses/edit/' . $course->id) ?>" class="btn btn-warning btn-sm">
                                                <i class="fa fa-pencil"></i> <?= $this->lang->line('edit') ?>
                                            </a>
                                            <a href="<?= base_url('offercourses/delete/' . $course->id) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this course?');">
                                                <i class="fa fa-trash"></i> <?= $this->lang->line('delete') ?>
                                            </a>
                                        </td>
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Select all the see-more buttons within the table
        document.querySelectorAll('.see-more').forEach(function(button) {
            button.addEventListener('click', function() {
                // Get the parent td element of the clicked button
                const parentTd = button.closest('td');

                // Toggle visibility of short and full descriptions
                parentTd.querySelector('.short-description').style.display = 'none';
                parentTd.querySelector('.full-description').style.display = 'block';
            });
        });

        // Select all the see-less buttons within the table
        document.querySelectorAll('.see-less').forEach(function(button) {
            button.addEventListener('click', function() {
                // Get the parent td element of the clicked button
                const parentTd = button.closest('td');

                // Toggle visibility of short and full descriptions
                parentTd.querySelector('.full-description').style.display = 'none';
                parentTd.querySelector('.short-description').style.display = 'block';
            });
        });
    });
</script>
<style>
    .see-more,
    .see-less {
        color: blue;
        cursor: pointer;
        text-decoration: underline;
    }


    .course-description p {
        margin: 0;
    }
</style>