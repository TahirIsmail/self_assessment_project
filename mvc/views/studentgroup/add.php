<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-object-group"></i> <?= $this->lang->line('panel_title') ?></h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= base_url("dashboard/index") ?>"><i class="fas fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a>
                </li>
                <li class="breadcrumb-item">
                    <a href="<?= base_url("studentgroup/index") ?>"><?= $this->lang->line('menu_studentgroup') ?></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><?= $this->lang->line('menu_add') ?> <?= $this->lang->line('menu_studentgroup') ?></li>
            </ol>
        </nav>
    </div><!-- /.card-header -->

    <!-- form start -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form class="row g-3" method="post">
                    <div class="mb-3 <?php echo form_error('group') ? 'has-error' : ''; ?>">
                        <label for="group" class="form-label">
                            <?= $this->lang->line("studentgroup_group") ?> <span class="text-danger">*</span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="group" name="group" value="<?= set_value('group') ?>">
                        </div>
                        <div class="col-md-12">
                            <?php echo form_error('group'); ?>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-success"><?= $this->lang->line("add_studentgroup") ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- row -->
    </div><!-- card-body -->
</div><!-- card -->