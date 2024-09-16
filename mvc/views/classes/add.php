<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fa fa-sitemap"></i> <?= $this->lang->line('panel_title') ?></h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url("dashboard/index") ?>"><i class="fa fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a></li>
                <li class="breadcrumb-item"><a href="<?= base_url("classes/index") ?>"><?= $this->lang->line('menu_classes') ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $this->lang->line('menu_add') ?> <?= $this->lang->line('menu_classes') ?></li>
            </ol>
        </nav>
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-sm-10">
                <form method="post" class="row g-3">

                    <div class="col-md-6">
                        <div class="mb-3 <?php if (form_error('classes')) echo 'has-error'; ?>">
                            <label for="classes" class="form-label">
                                <?= $this->lang->line("classes_name") ?> <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="classes" name="classes" value="<?= set_value('classes') ?>">
                            <div class="text-danger">
                                <?php echo form_error('classes'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3 <?php if (form_error('classes_numeric')) echo 'has-error'; ?>">
                            <label for="classes_numeric" class="form-label">
                                <?= $this->lang->line("classes_numeric") ?> <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control" id="classes_numeric" name="classes_numeric" value="<?= set_value('classes_numeric') ?>">
                            <div class="text-danger">
                                <?php echo form_error('classes_numeric'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3 <?php if (form_error('note')) echo 'has-error'; ?>">
                            <label for="note" class="form-label">
                                <?= $this->lang->line("classes_note") ?>
                            </label>
                            <textarea class="form-control" id="note" name="note" style="resize:none;"><?= set_value('note') ?></textarea>
                            <div class="text-danger">
                                <?php echo form_error('note'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success"><?= $this->lang->line("add_class") ?></button>
                    </div>
                </form>

                <?php if ($siteinfos->note == 1) { ?>
                    <!-- Additional content if necessary -->
                <?php } ?>
            </div>
        </div>
    </div>
</div>



<script>
    $(".select2").select2({
        placeholder: "",
        maximumSelectionSize: 6
    });
</script>