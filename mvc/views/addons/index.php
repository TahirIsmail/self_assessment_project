<div class="row">
    <div class="col-sm-4 ">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-crosshairs"></i> <?=$this->lang->line('panel_title')?></h3>
            </div>
            <div class="card-body">
                <form role="form" method="post" enctype="multipart/form-data">
                    <div class="<?=form_error('file') ? 'mb-3 has-error' : 'mb-3' ?>">
                        <label for="file" class="form-label"><?=$this->lang->line("addons_file")?> <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="text" class="form-control image-preview-filename" disabled="disabled" placeholder="<?=$this->lang->line('addons_no_file')?>">
                            <button type="button" class="btn btn-outline-secondary image-preview-clear" style="display:none;">
                                <i class="fas fa-times"></i> <?=$this->lang->line('addons_clear')?>
                            </button>
                            <label class="btn btn-outline-success image-preview-input">
                                <i class="fas fa-upload"></i> 
                                <span class="image-preview-input-title"><?=$this->lang->line('addons_file_browse')?></span>
                                <input id="uploadBtn" type="file" name="file" accept="image/png, image/jpeg, image/gif"/>
                            </label>
                        </div>
                        <div class="form-text text-danger">
                            <?php echo form_error('file'); ?>
                        </div>
                    </div>
                    <input id="addons" type="submit" class="btn btn-success" value="<?=$this->lang->line("addons_upload")?>" >
                </form>
            </div>
        </div>
    </div>

    <div class="col-sm-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-table"></i> <?=$this->lang->line('addons_list')?></h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url("dashboard/index")?>"><i class="fas fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?=$this->lang->line('menu_addons')?></li>
                    </ol>
                </nav>
            </div>
            <div class="card-body">
                <div class="row">
                    <?php if(customCompute($addons)) {foreach($addons as $addon) { ?>
                        <div class="col-sm-4">
                            <div class="card card-box-ini">
                                <img class="card-img-top" width="100%" src="<?=base_url('uploads/addons/'.$addon->slug.'/src/image/'. $addon->preview_image);?>" alt="<?=$addon->package_name?>">
                                <div class="card-body">
                                    <h5 class="card-title"><?=$addon->package_name?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?=$addon->version?></h6>
                                    <p class="card-text"><?=namesorting($addon->description, 100)?></p>
                                    <a href="<?=base_url('addons/rollback/'.$addon->addonsID)?>" class="btn btn-danger"><i class="fas fa-trash"></i> <?=$this->lang->line('addons_delete')?></a>
                                </div>
                            </div>
                        </div>
                    <?php }} ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $(".image-preview-input input:file").change(function (){
            var file = this.files[0];
            var reader = new FileReader();
            
            $('.image-preview-clear').click(function(){
                $('.image-preview-filename').val("");
                $('.image-preview-clear').hide();
                $(".image-preview-input-title").text("<?=$this->lang->line('addons_file_browse')?>");
            });

            reader.onload = function (e) {
                $(".image-preview-input-title").text("<?=$this->lang->line('addons_file_browse')?>");
                $(".image-preview-clear").show();
                $(".image-preview-filename").val(file.name);
            }
            reader.readAsDataURL(file);
        });
    });
</script>
