<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-calendar-check-o"></i> <?=$this->lang->line('panel_title')?></h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
                <li class="breadcrumb-item"><a href="<?=base_url("event/index")?>"><?=$this->lang->line('menu_event')?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$this->lang->line('menu_add')?> <?=$this->lang->line('menu_event')?></li>
            </ol>
        </nav>
    </div><!-- /.box-header -->

    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
                <form method="post" enctype="multipart/form-data">
                    <!-- Event Title -->
                    <div class="row mb-3">
                        <label for="title" class="col-sm-2 col-form-label">
                            <?=$this->lang->line("event_title")?> <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control <?= form_error('title') ? 'is-invalid' : '' ?>" id="title" name="title" value="<?=set_value('title')?>">
                            <?php if (form_error('title')): ?>
                                <div class="invalid-feedback">
                                    <?= form_error('title') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Event Date -->
                    <div class="row mb-3">
                        <label for="date" class="col-sm-2 col-form-label">
                            <?=$this->lang->line("event_date")?> <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control <?= form_error('date') ? 'is-invalid' : '' ?>" id="date" name="date" value="<?=set_value('date')?>">
                            <?php if (form_error('date')): ?>
                                <div class="invalid-feedback">
                                    <?= form_error('date') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Event Photo -->
                    <div class="row mb-3">
                        <label for="photo" class="col-sm-2 col-form-label"><?=$this->lang->line("event_photo")?></label>
                        <div class="col-sm-6">
                            <div class="input-group image-preview">
                                <input type="text" class="form-control image-preview-filename" disabled>
                                <button type="button" class="btn btn-outline-secondary image-preview-clear" style="display:none;">
                                    <i class="fa fa-remove"></i> <?=$this->lang->line('event_clear')?>
                                </button>
                                <label class="btn btn-outline-success">
                                    <i class="fa fa-upload"></i> <span class="image-preview-input-title"><?=$this->lang->line('event_file_browse')?></span>
                                    <input type="file" accept="image/png, image/jpeg, image/gif" name="photo" hidden>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Event Details -->
                    <div class="row mb-3">
                        <label for="event_details" class="col-sm-2 col-form-label">
                            <?=$this->lang->line("event_details")?> <span class="text-danger">*</span>
                        </label>
                        <div class="col-sm-6">
                            <textarea class="form-control <?= form_error('event_details') ? 'is-invalid' : '' ?>" id="event_details" name="event_details"><?=set_value('event_details')?></textarea>
                            <?php if (form_error('event_details')): ?>
                                <div class="invalid-feedback">
                                    <?= form_error('event_details') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="row mb-3">
                        <div class="col-sm-offset-2 col-sm-8">
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

<!-- Bootstrap 5 JavaScript with Datepicker and Image Preview -->
<script type="text/javascript">
    // Initialize date range picker with time picker
    $('#date').daterangepicker({
        timePicker: true,
        timePickerIncrement: 5,
        locale: {
            format: 'MM/DD/YYYY h:mm A'
        }
    });

    // Initialize image preview functionality
    $(function() {
        // Create the close button for image preview
        var closebtn = $('<button/>', {
            type: "button",
            text: 'x',
            id: 'close-preview',
            class: "btn-close",
            style: 'font-size: initial;',
        });

        // Set popover content
        $('.image-preview').popover({
            trigger: 'manual',
            html: true,
            title: "<strong>Preview</strong>" + $(closebtn)[0].outerHTML,
            content: "There's no image",
            placement: 'bottom'
        });

        // Clear event
        $('.image-preview-clear').click(function() {
            $('.image-preview').attr("data-content", "").popover('hide');
            $('.image-preview-filename').val("");
            $('.image-preview-clear').hide();
            $('.image-preview-input input:file').val("");
            $(".image-preview-input-title").text("<?=$this->lang->line('event_file_browse')?>");
        });

        // Create the preview image
        $(".image-preview-input input:file").change(function() {
            var img = $('<img/>', {
                id: 'dynamic',
                width: 250,
                height: 200,
                overflow: 'hidden'
            });
            var file = this.files[0];
            var reader = new FileReader();

            reader.onload = function(e) {
                $(".image-preview-input-title").text("<?=$this->lang->line('event_file_browse')?>");
                $(".image-preview-clear").show();
                $(".image-preview-filename").val(file.name);
                img.attr('src', e.target.result);
                $(".image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
            };
            reader.readAsDataURL(file);
        });
    });
</script>
