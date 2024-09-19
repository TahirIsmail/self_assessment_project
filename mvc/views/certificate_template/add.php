<div class="container mt-4" style="margin-bottom:40px;">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-certificate"></i> <?=$this->lang->line('panel_title')?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?=base_url("dashboard/index")?>"><i class="fas fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="<?=base_url("certificate_template/index")?>"><?=$this->lang->line('menu_certificate_template')?></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page"><?=$this->lang->line('menu_add')?> <?=$this->lang->line('menu_certificate_template')?></li>
                </ol>
            </nav>
        </div><!-- /.card-header -->

        <!-- form start -->
        <div class="card-body">
            <div class="row">
                <div class="col-md-10">
                    <form class="row g-3" method="post" enctype="multipart/form-data">
                        
                        <!-- Name Input -->
                        <div class="mb-3 <?=form_error('name') ? 'has-error' : '';?>">
                            <label for="name" class="form-label"><?=$this->lang->line("certificate_template_name")?> <span class="text-danger">*</span></label>
                            <div class="col-md-10">
                                <input type="text" class="form-control" id="name" name="name" value="<?=set_value('name')?>">
                                <span class="text-danger"><?=form_error('name');?></span>
                            </div>
                        </div>

                        <!-- Theme Dropdown -->
                        <div class="mb-3 <?=form_error('theme') ? 'has-error' : '';?>">
                            <label for="theme" class="form-label"><?=$this->lang->line("certificate_template_theme")?> <span class="text-danger">*</span></label>
                            <div class="col-md-10">
                                <?=form_dropdown("theme", $buildinThemes, set_value("theme"), "id='theme' class='form-control'");?>
                                <span class="text-danger"><?=form_error('theme');?></span>
                            </div>
                        </div>

                        <!-- Main Middle Text -->
                        <div class="mb-3 <?=form_error('main_middle_text') ? 'has-error' : '';?>">
                            <label for="main_middle_text" class="form-label"><?=$this->lang->line("certificate_template_main_middle_text")?> <span class="text-danger">*</span></label>
                            <div class="col-md-12">
                                <textarea class="form-control txtDropTarget" id="main_middle_text" name="main_middle_text" rows="2"><?=set_value('main_middle_text')?></textarea>
                                <span class="text-danger"><?=form_error('main_middle_text');?></span>
                            </div>
                        </div>

                        <!-- Top Heading Title -->
                        <div class="mb-3">
                            <label for="top_heading_title" class="form-label"><?=$this->lang->line("certificate_template_top_heading_title")?></label>
                            <div class="col-md-12">
                                <textarea class="form-control txtDropTarget" id="top_heading_title" name="top_heading_title" rows="2"><?=set_value('top_heading_title')?></textarea>
                            </div>
                        </div>

                        <!-- Top Heading Left -->
                        <div class="mb-3">
                            <label for="top_heading_left" class="form-label"><?=$this->lang->line("certificate_template_top_heading_left")?></label>
                            <div class="col-md-12">
                                <textarea class="form-control txtDropTarget" id="top_heading_left" name="top_heading_left" rows="2"><?=set_value('top_heading_left')?></textarea>
                            </div>
                        </div>

                        <!-- Top Heading Middle -->
                        <div class="mb-3">
                            <label for="top_heading_middle" class="form-label"><?=$this->lang->line("certificate_template_top_heading_middle")?></label>
                            <div class="col-md-12">
                                <textarea class="form-control txtDropTarget" id="top_heading_middle" name="top_heading_middle" rows="2"><?=set_value('top_heading_middle')?></textarea>
                            </div>
                        </div>

                        <!-- Top Heading Right -->
                        <div class="mb-3">
                            <label for="top_heading_right" class="form-label"><?=$this->lang->line("certificate_template_top_heading_right")?></label>
                            <div class="col-md-12">
                                <textarea class="form-control txtDropTarget" id="top_heading_right" name="top_heading_right" rows="2"><?=set_value('top_heading_right')?></textarea>
                            </div>
                        </div>

                        <!-- Template -->
                        <div class="mb-3 <?=form_error('template') ? 'has-error' : '';?>">
                            <label for="template" class="form-label"><?=$this->lang->line("certificate_template_template")?> <span class="text-danger">*</span></label>
                            <div class="col-md-12">
                                <textarea class="form-control txtDropTarget" id="template" name="template" rows="2"><?=set_value('template')?></textarea>
                                <span class="text-danger"><?=form_error('template');?></span>
                            </div>
                        </div>

                        <!-- Footer Left Text -->
                        <div class="mb-3">
                            <label for="footer_left_text" class="form-label"><?=$this->lang->line("certificate_template_footer_left_text")?></label>
                            <div class="col-md-12">
                                <textarea class="form-control txtDropTarget" id="footer_left_text" name="footer_left_text" rows="2"><?=set_value('footer_left_text')?></textarea>
                            </div>
                        </div>

                        <!-- Footer Middle Text -->
                        <div class="mb-3">
                            <label for="footer_middle_text" class="form-label"><?=$this->lang->line("certificate_template_footer_middle_text")?></label>
                            <div class="col-md-12">
                                <textarea class="form-control txtDropTarget" id="footer_middle_text" name="footer_middle_text" rows="2"><?=set_value('footer_middle_text')?></textarea>
                            </div>
                        </div>

                        <!-- Footer Right Text -->
                        <div class="mb-3">
                            <label for="footer_right_text" class="form-label"><?=$this->lang->line("certificate_template_footer_right_text")?></label>
                            <div class="col-md-12">
                                <textarea class="form-control txtDropTarget" id="footer_right_text" name="footer_right_text" rows="2"><?=set_value('footer_right_text')?></textarea>
                            </div>
                        </div>

                        <!-- Background Image Upload -->
                        <div class="mb-3 <?=form_error('background_image') ? 'has-error' : '';?>">
                            <label for="background_image" class="form-label"><?=$this->lang->line("certificate_template_background_image")?></label>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="No file selected" disabled>
                                    <button class="btn btn-secondary" type="button" id="clear-image">Clear</button>
                                    <input type="file" class="form-control" name="background_image" accept="image/png, image/jpeg, image/gif">
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="mb-3">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-success"><?=$this->lang->line("add_certificate_template")?></button>
                            </div>
                        </div>
                    </form>
                </div>
                
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="email" class="form-label"><?=$this->lang->line("certificate_template_tags")?> <?=$this->lang->line('certificate_template_draganddrop')?></label>
                        <div class="col-md-12">
                            <div id="tags">
                                <?=$tag?>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.card-body -->
    </div><!-- /.card -->
</div>

<script type="text/javascript">
    $('.txtDropTarget').jqte();

    $(".sms_alltag").draggable({
        helper : 'clone'
    });

    $(".jqte_editor").droppable({
        drop : function(event, ui) {
            var dragValue = $(ui.draggable).attr('id');
            var currentValue = $(this).html();
            $(this).html(currentValue + dragValue);
        }
    });

    $('.jqte_editor').css('min-height', '100px');

    $('#clear-image').click(function(){
        $('input[type="file"]').val(null);
        $('input[placeholder]').val('');
    });
</script>
