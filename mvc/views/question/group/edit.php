<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-question-circle"></i> <?= $this->lang->line('panel_title') ?></h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="<?= base_url("dashboard/index") ?>">
                        <i class="fas fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?>
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?= base_url("question_group/index") ?>"><?= $this->lang->line('menu_question_group') ?></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><?= $this->lang->line('menu_edit') ?> <?= $this->lang->line('menu_question_group') ?></li>
            </ol>
        </nav>
    </div><!-- /.card-header -->

    <!-- form start -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-10">
                <form class="row g-3" role="form" method="post">
                    <div class="col-md-12 mb-3">
                        <label for="title" class="form-label">
                            <?= $this->lang->line("question_group_title") ?>
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control <?= form_error('title') ? 'is-invalid' : '' ?>" id="title" name="title" value="<?= set_value('title', $group->title) ?>">
                        <div class="invalid-feedback">
                            <?php echo form_error('title'); ?>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success"><?= $this->lang->line("update_class") ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div><!-- /.card-body -->
</div><!-- /.card -->