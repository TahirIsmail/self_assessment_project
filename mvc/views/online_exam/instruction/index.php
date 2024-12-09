<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-map-signs"></i> <?= $this->lang->line('panel_title') ?></h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="<?= base_url("dashboard/index") ?>">
                        <i class="fas fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><?= $this->lang->line('panel_title') ?></li>
            </ol>
        </nav>
    </div><!-- /.card-header -->

    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <?php if (permissionChecker('instruction_add')) { ?>
                    <h5 class="page-header">
                        <a href="<?= base_url('instruction/add') ?>" class="btn btn-primary">
                            <i class="fas fa-plus"></i> <?= $this->lang->line('add_title') ?>
                        </a>
                    </h5>
                <?php } ?>

                <div class="table-responsive">
                    <table id="example1" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th class="col-md-1"><?= $this->lang->line('slno') ?></th>
                                <th class="col-md-2"><?= $this->lang->line('instruction_title') ?></th>
                                <th class="col-md-7"><?= $this->lang->line('instruction_content') ?></th>
                                <?php if (permissionChecker('instruction_edit') || permissionChecker('instruction_delete') || permissionChecker('instruction_view')) { ?>
                                    <th class="col-md-2"><?= $this->lang->line('action') ?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (inicompute($instructions)) {
                                $i = 1;
                                foreach ($instructions as $instruction) { ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td>
                                            <?php
                                            if (strlen($instruction->title) > 25)
                                                echo substr(strip_tags($instruction->title), 0, 25) . '...';
                                            else
                                                echo strip_tags($instruction->title);
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if (strlen($instruction->content) > 150)
                                                echo substr(strip_tags($instruction->content), 0, 150) . '...';
                                            else
                                                echo strip_tags($instruction->content);
                                            ?>
                                        </td>
                                        <?php if (permissionChecker('instruction_edit') || permissionChecker('instruction_delete') || permissionChecker('instruction_view')) { ?>
                                            <td>
                                                <?= btn_view('instruction/view/' . $instruction->instructionID, $this->lang->line('view')) ?>
                                                <?= btn_edit('instruction/edit/' . $instruction->instructionID, $this->lang->line('edit')) ?>
                                                <?= btn_delete('instruction/delete/' . $instruction->instructionID, $this->lang->line('delete')) ?>
                                            </td>
                                        <?php } ?>
                                    </tr>
                            <?php $i++;
                                }
                            } ?>
                        </tbody>
                    </table>
                </div><!-- /.table-responsive -->
            </div>
        </div>
    </div><!-- /.card-body -->
</div><!-- /.card -->