<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-level-up-alt"></i> <?= $this->lang->line('panel_title') ?></h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?= base_url("dashboard/index") ?>"><i class="fas fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a></li>
                <li class="breadcrumb-item"><a href="<?= base_url("question_level/index") ?>"><?= $this->lang->line('menu_question_level') ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $this->lang->line('menu_add') ?> <?= $this->lang->line('menu_question_level') ?></li>
            </ol>
        </nav>
    </div><!-- /.card-header -->

    <!-- form start -->
    <div class="card-body">
        <div class="row">
            <div class="col-sm-10">
                <form class="row g-3" role="form" method="post">
                    <?php
                    if (form_error('name'))
                        echo "<div class='col-md-8 mb-3 has-validation'>";
                    else
                        echo "<div class='col-md-8 mb-3'>";
                    ?>
                    <label for="name" class="form-label">
                        <?= $this->lang->line("question_level_title") ?>
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control <?= (form_error('name') ? 'is-invalid' : '') ?>" id="name" name="name" value="<?= set_value('name') ?>">
                    <div class="invalid-feedback">
                        <?php echo form_error('name'); ?>
                    </div>
            </div>

            <div class="col-md-12">
                <button type="submit" class="btn btn-success"><?= $this->lang->line("add_class") ?></button>
            </div>
            </form>
        </div>
    </div>
</div><!-- /.card-body -->
</div><!-- /.card -->