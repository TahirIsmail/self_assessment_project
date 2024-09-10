<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-edit"></i> <?= $this->lang->line('edit_center') ?></h3>
        <ol class="breadcrumb">
            <li><a href="<?= base_url("dashboard/index") ?>"><i class="fa fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a></li>
            <li><a href="<?= base_url("section/index") ?>"><?= $this->lang->line('menu_section') ?></a></li>
            <li class="active"><?= $this->lang->line('menu_edit') ?> <?= $this->lang->line('menu_section') ?></li>
        </ol>
    </div><!-- /.box-header -->

    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
                <form class="form-horizontal" role="form" method="post" action="<?= base_url('center/edit/'.$center->id) ?>" enctype="multipart/form-data">
                    <!-- City Field -->
                    <div class="form-group <?= form_error('city') ? 'has-error' : '' ?>">
                        <label for="city" class="col-sm-2 control-label">City <span class="text-red">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="city" name="city" value="<?= set_value('city', $center->city) ?>">
                            <?php if (form_error('city')): ?>
                                <span class="help-block"><?= form_error('city') ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Date Field -->
                    <div class="form-group <?= form_error('date') ? 'has-error' : '' ?>">
                        <label for="date" class="col-sm-2 control-label">Date <span class="text-red">*</span></label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" id="date" name="date" value="<?= set_value('date', $center->date) ?>">
                            <?php if (form_error('date')): ?>
                                <span class="help-block"><?= form_error('date') ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- address Field -->
                    <div class="form-group <?= form_error('address') ? 'has-error' : '' ?>">
                        <label for="address" class="col-sm-2 control-label">Address <span class="text-red">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="address" name="address" value="<?= set_value('address', $center->address) ?>">
                            <?php if (form_error('address')): ?>
                                <span class="help-block"><?= form_error('address') ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                
                    <!-- Submit Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-6">
                            <button type="submit" class="btn btn-success"><?= $this->lang->line("save_changes") ?></button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
