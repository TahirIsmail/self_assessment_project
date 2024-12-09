<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fa fa-star"></i> <?= $this->lang->line('panel_title') ?></h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url("dashboard/index") ?>"><i class="fa fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $this->lang->line('menu_section') ?></li>
            </ol>
        </nav>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">

                <?php
                if (permissionChecker('section_add')) {
                ?>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class=" page-header mb-0">
                            <a href="<?php echo base_url('section/add') ?>" class="btn btn-primary">
                                <i class="fa fa-plus"></i>
                                <?= $this->lang->line('add_title') ?>
                            </a>
                        </h5>

                        <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                            <?php
                            $array = array("0" => $this->lang->line("section_select_class"));
                            if (inicompute($classes)) {
                                foreach ($classes as $classa) {
                                    $array[$classa->classesID] = $classa->classes;
                                }
                            }

                            echo form_dropdown("classesID", $array, set_value("classesID", $set), "id='classesID' class='form-select select2'");
                            ?>
                        </div>
                    </div>
                <?php } ?>

                <div class="table-responsive">
                    <table id="example1" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="col-lg-1"><?= $this->lang->line('slno') ?></th>
                                <th class="col-lg-2"><?= $this->lang->line('section_name') ?></th>
                                <th class="col-lg-2"><?= $this->lang->line('section_category') ?></th>
                                <th class="col-lg-2"><?= $this->lang->line('subject_names') ?></th>
                                <th class="col-lg-2"><?= $this->lang->line('section_note') ?></th>
                                <?php if (permissionChecker('section_edit') || permissionChecker('section_delete')) { ?>
                                    <th class="col-lg-1"><?= $this->lang->line('action') ?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (inicompute($sections)) {
                                $i = 1;
                                foreach ($sections as $section) {
                            ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $section['section'] ?></td>
                                        <td><?= $section['category'] ?></td>
                                        <td>
                                            <?php
                                            $subjectNames = array_column($section['subjects'], 'subject');
                                            echo implode(', ', $subjectNames);
                                            ?>
                                        </td>
                                        <td><?= $section['note'] ?></td>
                                        <?php if (permissionChecker('section_edit') || permissionChecker('section_delete')) { ?>
                                            <td>
                                                <?= btn_edit('section/edit/' . $section['sectionID'] . '/' . $set, $this->lang->line('edit')) ?>
                                                <?= btn_delete('section/delete/' . $section['sectionID'] . '/' . $set, $this->lang->line('delete')) ?>
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
                url: "<?= base_url('section/section_list') ?>",
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