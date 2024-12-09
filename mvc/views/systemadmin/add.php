<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-user-shield"></i> <?=$this->lang->line('panel_title')?></h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?=base_url("dashboard/index")?>">
                        <i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?>
                    </a>
                </li>
                <li class="breadcrumb-item"><a href="<?=base_url("systemadmin/index")?>"><?=$this->lang->line('menu_systemadmin')?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$this->lang->line('menu_add')?> <?=$this->lang->line('menu_systemadmin')?></li>
            </ol>
        </nav>
    </div><!-- /.card-header -->

    <!-- form start -->
    <div class="card-body">
        <div class="row">
            <div class="col-12">
                <form class="row g-3" method="post" enctype="multipart/form-data">
                    <!-- Name -->
                    <div class="col-md-6">
                        <label for="name_id" class="form-label"><?=$this->lang->line("systemadmin_name")?> <span class="text-danger">*</span></label>
                        <input type="text" class="form-control <?=form_error('name') ? 'is-invalid' : ''?>" id="name_id" name="name" value="<?=set_value('name')?>">
                        <div class="invalid-feedback"><?=form_error('name')?></div>
                    </div>

                    <!-- Date of Birth -->
                    <div class="col-md-6">
                        <label for="dob" class="form-label"><?=$this->lang->line("systemadmin_dob")?> <span class="text-danger">*</span></label>
                        <input type="text" class="form-control <?=form_error('dob') ? 'is-invalid' : ''?>" id="dob" name="dob" value="<?=set_value('dob')?>">
                        <div class="invalid-feedback"><?=form_error('dob')?></div>
                    </div>

                    <!-- Sex -->
                    <div class="col-md-6">
                        <label for="sex" class="form-label"><?=$this->lang->line("systemadmin_sex")?></label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                            <?=form_dropdown("sex", array($this->lang->line("systemadmin_sex_male") => $this->lang->line("systemadmin_sex_male"), $this->lang->line("systemadmin_sex_female") => $this->lang->line("systemadmin_sex_female")), set_value("sex"), "id='sex' class='form-select'")?>
                        </div>
                        <div class="invalid-feedback"><?=form_error('sex')?></div>
                    </div>

                    <!-- Religion -->
                    <div class="col-md-6">
                        <label for="religion" class="form-label"><?=$this->lang->line("systemadmin_religion")?></label>
                        <input type="text" class="form-control <?=form_error('religion') ? 'is-invalid' : ''?>" id="religion" name="religion" value="<?=set_value('religion')?>">
                        <div class="invalid-feedback"><?=form_error('religion')?></div>
                    </div>

                    <!-- Email -->
                    <div class="col-md-6">
                        <label for="email" class="form-label"><?=$this->lang->line("systemadmin_email")?> <span class="text-danger">*</span></label>
                        <input type="text" class="form-control <?=form_error('email') ? 'is-invalid' : ''?>" id="email" name="email" value="<?=set_value('email')?>">
                        <div class="invalid-feedback"><?=form_error('email')?></div>
                    </div>

                    <!-- Phone -->
                    <div class="col-md-6">
                        <label for="phone" class="form-label"><?=$this->lang->line("systemadmin_phone")?></label>
                        <input type="text" class="form-control <?=form_error('phone') ? 'is-invalid' : ''?>" id="phone" name="phone" value="<?=set_value('phone')?>">
                        <div class="invalid-feedback"><?=form_error('phone')?></div>
                    </div>

                    <!-- Address -->
                    <div class="col-md-6">
                        <label for="address" class="form-label"><?=$this->lang->line("systemadmin_address")?></label>
                        <input type="text" class="form-control <?=form_error('address') ? 'is-invalid' : ''?>" id="address" name="address" value="<?=set_value('address')?>">
                        <div class="invalid-feedback"><?=form_error('address')?></div>
                    </div>

                    <!-- Join Date -->
                    <div class="col-md-6">
                        <label for="jod" class="form-label"><?=$this->lang->line("systemadmin_jod")?> <span class="text-danger">*</span></label>
                        <input type="text" class="form-control <?=form_error('jod') ? 'is-invalid' : ''?>" id="jod" name="jod" value="<?=set_value('jod')?>">
                        <div class="invalid-feedback"><?=form_error('jod')?></div>
                    </div>

                    <!-- Profile Picture -->
                    <div class="col-md-6">
                        <label for="photo" class="form-label"><?=$this->lang->line("systemadmin_photo")?></label>
                        <div class="input-group">
                            <input type="text" class="form-control image-preview-filename" disabled="disabled">
                            <button type="button" class="btn btn-outline-secondary image-preview-clear" style="display:none;">
                                <i class="fas fa-times"></i> <?=$this->lang->line('systemadmin_clear')?>
                            </button>
                            <label class="btn btn-outline-success image-preview-input">
                                <i class="fas fa-upload"></i>
                                <span class="image-preview-input-title"><?=$this->lang->line('systemadmin_file_browse')?></span>
                                <input type="file" accept="image/png, image/jpeg, image/gif" name="photo">
                            </label>
                        </div>
                        <div class="invalid-feedback"><?=form_error('photo')?></div>
                    </div>

                    <!-- Username -->
                    <div class="col-md-6">
                        <label for="username" class="form-label"><?=$this->lang->line("systemadmin_username")?> <span class="text-danger">*</span></label>
                        <input type="text" class="form-control <?=form_error('username') ? 'is-invalid' : ''?>" id="username" name="username" value="<?=set_value('username')?>">
                        <div class="invalid-feedback"><?=form_error('username')?></div>
                    </div>

                    <!-- Password -->
                    <div class="col-md-6">
                        <label for="password" class="form-label"><?=$this->lang->line("systemadmin_password")?> <span class="text-danger">*</span></label>
                        <input type="password" class="form-control <?=form_error('password') ? 'is-invalid' : ''?>" id="password" name="password" value="<?=set_value('password')?>">
                        <div class="invalid-feedback"><?=form_error('password')?></div>
                    </div>

                    <!-- Submit Button -->
                    <div class="col-md-12 text-center mt-4">
                        <button type="submit" class="btn btn-success"><?=$this->lang->line("add_systemadmin")?></button>
                    </div>

                </form>
            </div>    
        </div>
    </div>
</div>



<script type="text/javascript">
$('#dob').datepicker({ startView: 2 });
$('#jod').datepicker({ dateFormat : 'dd-mm-yyyy' });

$(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
});

$(function() {
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close");

    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });

    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("<?=$this->lang->line('systemadmin_file_browse')?>"); 
    }); 

    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200,
            overflow:'hidden'
        });      
        var file = this.files[0];
        var reader = new FileReader();
        reader.onload = function (e) {
            $(".image-preview-input-title").text("<?=$this->lang->line('systemadmin_file_browse')?>");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
        }        
        reader.readAsDataURL(file);
    });  
});
</script>
