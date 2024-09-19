<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="bi bi-calendar-check"></i> <?=$this->lang->line('panel_title')?></h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?=base_url("dashboard/index")?>"><i class="bi bi-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
                <li class="breadcrumb-item"><a href="<?=base_url("event/index")?>"><?=$this->lang->line('menu_event')?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$this->lang->line('menu_edit')?> <?=$this->lang->line('menu_event')?></li>
            </ol>
        </nav>
    </div><!-- /.card-header -->

    <?php
      $date = date("m/d/Y", strtotime($event->fdate))." ".date("h:i A", strtotime($event->ftime))." - ".date("m/d/Y", strtotime($event->tdate))." ".date("h:i A", strtotime($event->ttime));
    ?>

    <div class="card-body">
        <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
            <div class="row">
                <!-- Title Field -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="title" class="form-label">
                            <?=$this->lang->line("event_title")?> <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="title" name="title" value="<?=set_value('title',$event->title)?>">
                        <div class="form-text text-danger">
                            <?php echo form_error('title'); ?>
                        </div>
                    </div>
                </div>

                <!-- Date Field -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="date" class="form-label">
                            <?=$this->lang->line("event_date")?> <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="date" name="date" value="<?=set_value('date',$date)?>">
                        <div class="form-text text-danger">
                            <?php echo form_error('fdate'); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Photo Field -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="photo" class="form-label">
                            <?=$this->lang->line("event_photo")?>
                        </label>
                        <div class="input-group">
                            <input type="text" class="form-control image-preview-filename" disabled="disabled">
                            <button type="button" class="btn btn-secondary image-preview-clear" style="display:none;">
                                <i class="bi bi-x-circle"></i> <?=$this->lang->line('event_clear')?>
                            </button>
                            <label class="btn btn-success image-preview-input">
                                <i class="bi bi-upload"></i>
                                <span class="image-preview-input-title"><?=$this->lang->line('event_file_browse')?></span>
                                <input type="file" accept="image/png, image/jpeg, image/gif" name="photo"/>
                            </label>
                        </div>
                        <div class="form-text text-danger">
                            <?php echo form_error('photo'); ?>
                        </div>
                    </div>
                </div>

                <!-- Event Details Field -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="event_details" class="form-label">
                            <?=$this->lang->line("event_details")?>
                        </label>
                        <textarea class="form-control" id="event_details" name="event_details"><?=set_value('event_details',$event->details)?></textarea>
                        <div class="form-text text-danger">
                            <?php echo form_error('event_details'); ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="d-grid gap-2 d-md-block">
                    <input type="submit" class="btn btn-success" value="<?=$this->lang->line("update_class")?>">
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    $('#event_details').jqte();
    $('#date').daterangepicker({
        timePicker: true,
        timePickerIncrement: 5,
        locale: {
            format: 'MM/DD/YYYY h:mm A'
        }
    });

    // Handle image preview
    $(document).on('click', '#close-preview', function() {
        $('.image-preview').popover('hide');
    });

    $(function() {
        var closebtn = $('<button/>', {
            type: "button",
            text: 'x',
            id: 'close-preview',
            style: 'font-size: initial;',
        });
        closebtn.attr("class", "close float-end");

        // Initialize popover
        $('.image-preview').popover({
            trigger: 'manual',
            html: true,
            title: "<strong>Preview</strong>" + $(closebtn)[0].outerHTML,
            content: "There's no image",
            placement: 'bottom'
        });

        // Clear event
        $('.image-preview-clear').click(function() {
            $('.image-preview').attr("data-bs-content", "").popover('hide');
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
                $(".image-preview").attr("data-bs-content", $(img)[0].outerHTML).popover("show");
            }
            reader.readAsDataURL(file);
        });
    });
</script>
