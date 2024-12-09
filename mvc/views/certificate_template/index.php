<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-certificate"></i> <?= $this->lang->line('panel_title') ?></h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= base_url("dashboard/index") ?>"><i class="fas fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><?= $this->lang->line('panel_title') ?></li>
            </ol>
        </nav>
    </div><!-- /.card-header -->

    <!-- form start -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">

                <?php if (permissionChecker('certificate_template_add')) { ?>
                    <h5 class="page-header">
                        <a href="<?php echo base_url('certificate_template/add') ?>" class="btn btn-primary">
                            <i class="fas fa-plus"></i> <?= $this->lang->line('add_title') ?>
                        </a>
                    </h5>
                <?php } ?>

                <div class="table-responsive" id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="col-md-2"><?= $this->lang->line('slno') ?></th>
                                <th class="col-md-2"><?= $this->lang->line('certificate_template_name') ?></th>
                                <th class="col-md-2"><?= $this->lang->line('certificate_template_theme') ?></th>
                                <th class="col-md-2"><?= $this->lang->line('certificate_template_main_middle_text') ?></th>
                                <th class="col-md-2"><?= $this->lang->line('certificate_template_template') ?></th>
                                <?php if (permissionChecker('certificate_template_edit') || permissionChecker('certificate_template_delete') || permissionChecker('certificate_template_view')) { ?>
                                    <th class="col-md-2"><?= $this->lang->line('action') ?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (inicompute($certificate_templates)) {
                                $i = 1;
                                foreach ($certificate_templates as $certificate_template) { ?>
                                    <tr>
                                        <td data-title="<?= $this->lang->line('slno') ?>">
                                            <?php echo $i; ?>
                                        </td>
                                        <td data-title="<?= $this->lang->line('certificate_template_name') ?>">
                                            <?= namesorting($certificate_template->name, 25) ?>
                                        </td>

                                        <td data-title="<?= $this->lang->line('certificate_template_theme') ?>">
                                            <?php
                                            echo isset($buildinThemes[$certificate_template->theme]) ? $buildinThemes[$certificate_template->theme] : '';
                                            ?>
                                        </td>

                                        <td data-title="<?= $this->lang->line('certificate_template_main_middle_text') ?>">
                                            <?= namesorting($certificate_template->main_middle_text, 25) ?>
                                        </td>

                                        <td data-title="<?= $this->lang->line('certificate_template_template') ?>">
                                            <?= namesorting($certificate_template->template, 20) ?>
                                        </td>

                                        <?php if (permissionChecker('certificate_template_edit') || permissionChecker('certificate_template_delete') || permissionChecker('certificate_template_view')) { ?>
                                            <td data-title="<?= $this->lang->line('action') ?>">
                                                <?php echo btn_view('certificate_template/view/' . $certificate_template->certificate_templateID, $this->lang->line('view')) ?>
                                                <?php echo btn_edit('certificate_template/edit/' . $certificate_template->certificate_templateID, $this->lang->line('edit')) ?>
                                                <?php echo btn_delete('certificate_template/delete/' . $certificate_template->certificate_templateID, $this->lang->line('delete')) ?>
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