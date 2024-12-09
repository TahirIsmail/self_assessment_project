<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-download"></i> <?=$this->lang->line('panel_title')?></h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("dashboard/index")?>"><i class="fas fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$this->lang->line('menu_backup')?></li>
            </ol>
        </nav>
    </div><!-- /.card-header -->

    <!-- form start -->
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <form action="<?=base_url('backup/index');?>" class="row g-3" method="post">
                    <div class="col-md-2">
                        <label for="backup_title" class="form-label"><?=$this->lang->line("backup_title")?></label>
                    </div>
                    <div class="col-md-10 d-flex align-items-end">
                        <input type="hidden" value="0" name="hidden">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-download"></i> <?=$this->lang->line("backup_submit")?>
                        </button>
                    </div>
                </form>
            </div>            
        </div><!-- /.row -->
    </div><!-- /.card-body -->
</div><!-- /.card -->
