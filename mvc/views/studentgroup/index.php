<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-object-group"></i> <?= $this->lang->line('panel_title') ?></h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= base_url("dashboard/index") ?>"><i class="fas fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><?= $this->lang->line('menu_studentgroup') ?></li>
            </ol>
        </nav>
    </div><!-- /.card-header -->

    <!-- form start -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">

                <?php if (permissionChecker('studentgroup_add')) { ?>
                    <h5 class="page-header">
                        <a href="<?php echo base_url('studentgroup/add') ?>" class="btn btn-primary">
                            <i class="fas fa-plus"></i> <?= $this->lang->line('add_title') ?>
                        </a>
                    </h5>
                <?php } ?>

                <div class="table-responsive" id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="col-md-2"><?= $this->lang->line('slno') ?></th>
                                <th class="col-md-2"><?= $this->lang->line('studentgroup_group') ?></th>
                                <?php if (permissionChecker('studentgroup_edit') || permissionChecker('studentgroup_delete')) { ?>
                                    <th class="col-md-2"><?= $this->lang->line('action') ?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (inicompute($studentgroups)) {
                                $i = 1;
                                foreach ($studentgroups as $studentgroup) { ?>
                                    <tr>
                                        <td data-title="<?= $this->lang->line('slno') ?>">
                                            <?php echo $i; ?>
                                        </td>
                                        <td data-title="<?= $this->lang->line('studentgroup_group') ?>">
                                            <?= $studentgroup->group ?>
                                        </td>
                                        <?php if (permissionChecker('studentgroup_edit') || permissionChecker('studentgroup_delete')) { ?>
                                            <td data-title="<?= $this->lang->line('action') ?>">
                                                <?php echo btn_edit('studentgroup/edit/' . $studentgroup->studentgroupID, $this->lang->line('edit')) ?>
                                                <?php echo btn_delete('studentgroup/delete/' . $studentgroup->studentgroupID, $this->lang->line('delete')) ?>
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
    </div><!-- card-body -->
</div><!-- card -->