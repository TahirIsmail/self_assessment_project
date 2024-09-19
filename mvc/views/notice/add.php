<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-calendar"></i> <?=$this->lang->line('panel_title')?></h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
                <li class="breadcrumb-item"><a href="<?=base_url("notice/index")?>"><?=$this->lang->line('menu_notice')?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$this->lang->line('menu_add')?> <?=$this->lang->line('menu_notice')?></li>
            </ol>
        </nav>
    </div><!-- /.box-header -->

    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <form method="post">
                    <!-- Row for Title and Date -->
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="title" class="form-label">
                                <?=$this->lang->line("notice_title")?> <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control <?=form_error('title') ? 'is-invalid' : ''?>" id="title" name="title" value="<?=set_value('title')?>">
                            <?php if (form_error('title')): ?>
                                <div class="invalid-feedback">
                                    <?= form_error('title'); ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="col-sm-6">
                            <label for="date" class="form-label">
                                <?=$this->lang->line("notice_date")?> <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control <?=form_error('date') ? 'is-invalid' : ''?>" id="date" name="date" value="<?=set_value('date')?>">
                            <?php if (form_error('date')): ?>
                                <div class="invalid-feedback">
                                    <?= form_error('date'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Row for Notice -->
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <label for="notice" class="form-label">
                                <?=$this->lang->line("notice_notice")?> <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control <?=form_error('notice') ? 'is-invalid' : ''?>" id="notice" name="notice"><?=set_value('notice')?></textarea>
                            <?php if (form_error('notice')): ?>
                                <div class="invalid-feedback">
                                    <?= form_error('notice'); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="row mb-3">
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-success">
                                <?=$this->lang->line("add_class")?>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    // Assuming you have the required jQuery date picker and text editor setup
    $('#date').datepicker();
    $('#notice').jqte();
</script>
