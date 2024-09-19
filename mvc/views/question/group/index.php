<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-question-circle"></i> <?= $this->lang->line('panel_title') ?></h3>
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

                <?php if (permissionChecker('question_group_add')) { ?>
                    <h5 class="page-header">
                        <a href="<?php echo base_url('question_group/add') ?>" class="btn btn-primary">
                            <i class="fas fa-plus"></i>
                            <?= $this->lang->line('add_title') ?>
                        </a>
                    </h5>
                <?php } ?>

                <div class="table-responsive">
                    <table id="example1" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="col-sm-2"><?= $this->lang->line('slno') ?></th>
                                <th class="col-sm-2"><?= $this->lang->line('question_group_title') ?></th>
                                <?php if (permissionChecker('question_group_edit') || permissionChecker('question_group_delete') || permissionChecker('question_group_view')) { ?>
                                    <th class="col-sm-2"><?= $this->lang->line('action') ?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (inicompute($groups)) {
                                $i = 1;
                                foreach ($groups as $group) { ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td>
                                            <?php
                                            if (strlen($group->title) > 25)
                                                echo strip_tags(substr($group->title, 0, 25) . "...");
                                            else
                                                echo strip_tags(substr($group->title, 0, 25));
                                            ?>
                                        </td>
                                        <?php if (permissionChecker('question_group_edit') || permissionChecker('question_group_delete') || permissionChecker('question_group_view')) { ?>
                                            <td>
                                                <?php echo btn_edit('question_group/edit/' . $group->questionGroupID, $this->lang->line('edit')) ?>
                                                <?php echo btn_delete('question_group/delete/' . $group->questionGroupID, $this->lang->line('delete')) ?>
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