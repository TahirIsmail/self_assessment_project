<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title"><i class="fas fa-level-up-alt"></i> <?= $this->lang->line('panel_title') ?></h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?= base_url("dashboard/index") ?>"><i class="fas fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $this->lang->line('panel_title') ?></li>
            </ol>
        </nav>
    </div><!-- /.card-header -->

    <!-- form start -->
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <?php if (permissionChecker('question_level_add')) { ?>
                    <div class="page-header">
                        <a href="<?php echo base_url('question_level/add') ?>" class="btn btn-primary">
                            <i class="fas fa-plus"></i> <?= $this->lang->line('add_title') ?>
                        </a>
                    </div>
                <?php } ?>

                <div class="table-responsive">
                    <table id="example1" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="col-sm-2"><?= $this->lang->line('slno') ?></th>
                                <th class="col-sm-2"><?= $this->lang->line('question_level_title') ?></th>
                                <?php if (permissionChecker('question_level_edit') || permissionChecker('question_level_delete') || permissionChecker('question_level_view')) { ?>
                                    <th class="col-sm-2"><?= $this->lang->line('action') ?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (inicompute($question_levels)) {
                                $i = 1;
                                foreach ($question_levels as $question_level) { ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $question_level->name ?></td>
                                        <?php if (permissionChecker('question_level_edit') || permissionChecker('question_level_delete') || permissionChecker('question_level_view')) { ?>
                                            <td>
                                                <?php echo btn_edit('question_level/edit/' . $question_level->questionLevelID, $this->lang->line('edit')) ?>
                                                <?php echo btn_delete('question_level/delete/' . $question_level->questionLevelID, $this->lang->line('delete')) ?>
                                            </td>
                                        <?php } ?>
                                    </tr>
                            <?php $i++;
                                }
                            } ?>
                        </tbody>
                    </table>
                </div><!-- /.table-responsive -->
            </div><!-- /.col-sm-12 -->
        </div><!-- /.row -->
    </div><!-- /.card-body -->
</div><!-- /.card -->