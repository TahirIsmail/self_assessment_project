<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fa fa-qrcode"></i> <?= $this->lang->line('panel_title') ?></h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= base_url("dashboard/index") ?>"><i class="fa fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><?= $this->lang->line('panel_title') ?></li>
            </ol>
        </nav>
    </div>
    <!-- /.card-header -->

    <!-- form start -->
    <div class="card-body">
        <div class="row">
            <div class="col-12">

                <?php if (permissionChecker('question_bank_add')) { ?>
                    <div class="d-flex justify-content-start mb-3">
                        <a href="<?php echo base_url('question_bank/add') ?>" class="btn btn-primary">
                            <i class="fa fa-plus"></i> <?= $this->lang->line('add_title') ?>
                        </a>
                    </div>
                <?php } ?>

                <div class="table-responsive">
                    <table id="example1" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="col-sm-2"><?=$this->lang->line('slno')?></th>
                                <th class="col-sm-3"><?=$this->lang->line('question_bank_question')?></th>
                                <th class="col-sm-1"><?=$this->lang->line('question_bank_group')?></th>
                                <th class="col-sm-1"><?=$this->lang->line('question_bank_type')?></th>
                                <?php if(permissionChecker('question_bank_edit') || permissionChecker('question_bank_delete') || permissionChecker('question_bank_view')) { ?>
                                    <th class="col-sm-1"><?=$this->lang->line('action')?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(inicompute($question_banks)) {$i = 1; foreach($question_banks as $question_bank) { ?>
                                <tr>
                                    <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                   
                                    <td data-title="<?=$this->lang->line('question_bank_question')?>">
                                         <?php
                                            if(strlen($question_bank->question) > 60)
                                                echo substr(strip_tags($question_bank->question), 0, 60)."...";
                                            else
                                                echo strip_tags($question_bank->question);
                                            ?>
                                        </td>
                                        <td data-title="<?= $this->lang->line('question_bank_group') ?>">
                                            <?= isset($groups[$question_bank->groupID]) ? $groups[$question_bank->groupID]->title : ''; ?>
                                        </td>
                                        <td data-title="<?= $this->lang->line('question_bank_type') ?>">
                                            <?= isset($types[$question_bank->typeNumber]) ? $types[$question_bank->typeNumber]->name : ''; ?>
                                        </td>
                                        <?php if (permissionChecker('question_bank_edit') || permissionChecker('question_bank_delete') || permissionChecker('question_bank_view')) { ?>
                                            <td data-title="<?= $this->lang->line('action') ?>">
                                                <?php echo btn_view('question_bank/view/' . $question_bank->questionBankID, $this->lang->line('view')) ?>
                                                <?php echo btn_edit('question_bank/edit/' . $question_bank->questionBankID, $this->lang->line('edit')) ?>
                                                <?php echo btn_delete('question_bank/delete/' . $question_bank->questionBankID, $this->lang->line('delete')) ?>
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