<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-user-graduate"></i> <?= $this->lang->line('panel_title') ?></h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url("dashboard/index") ?>"><i class="fas fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a></li>
                <li class="breadcrumb-item"><a href="<?= base_url("student/index") ?>"><?= $this->lang->line('menu_student') ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $this->lang->line('menu_add') ?> <?= $this->lang->line('panel_title') ?></li>
            </ol>
        </nav>
    </div>

    <div class="card-body">
        <form method="post" class="row g-3" enctype="multipart/form-data">
            <div class="col-md-6">
                <div class="mb-3 <?= form_error('name') ? 'has-error' : '' ?>">
                    <label for="name_id" class="form-label"><?= $this->lang->line("student_first_name") ?> <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name_id" name="name" value="<?= set_value('name') ?>">
                    <div class="form-text text-danger"><?php echo form_error('name'); ?></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="last_name" class="form-label"><?= $this->lang->line("student_last_name") ?></label>
                    <input type="text" class="form-control" id="last_name" name="last_name" value="<?= set_value('last_name') ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 <?= form_error('email') ? 'has-error' : '' ?>">
                    <label for="email" class="form-label"><?= $this->lang->line("student_email") ?> <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email') ?>">
                    <div class="form-text text-danger"><?php echo form_error('email'); ?></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 <?= form_error('phone') ? 'has-error' : '' ?>">
                    <label for="phone" class="form-label"><?= $this->lang->line("student_phone") ?></label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?= set_value('phone') ?>">
                    <div class="form-text text-danger"><?php echo form_error('phone'); ?></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 <?= form_error('address') ? 'has-error' : '' ?>">
                    <label for="address" class="form-label"><?= $this->lang->line("student_address") ?></label>
                    <input type="text" class="form-control" id="address" name="address" value="<?= set_value('address') ?>">
                    <div class="form-text text-danger"><?php echo form_error('address'); ?></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 <?= form_error('username') ? 'has-error' : '' ?>">
                    <label for="username" class="form-label"><?= $this->lang->line("student_username") ?> <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="username" name="username" value="<?= set_value('username') ?>">
                    <div class="form-text text-danger"><?php echo form_error('username'); ?></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 <?= form_error('password') ? 'has-error' : '' ?>">
                    <label for="password" class="form-label"><?= $this->lang->line("student_password") ?> <span class="text-danger">*</span></label>
                    <input type="password" class="form-control" id="password" name="password" value="<?= set_value('password') ?>">
                    <div class="form-text text-danger"><?php echo form_error('password'); ?></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3 <?= form_error('referred_by') ? 'has-error' : '' ?>">
                    <label for="referred_by" class="form-label"><?= $this->lang->line("referred_by") ?></label>
                    <input type="text" class="form-control" id="referred_by" name="referred_by" value="<?= set_value('referred_by') ?>">
                    <div class="form-text text-danger"><?php echo form_error('referred_by'); ?></div>
                </div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success"><?= $this->lang->line("add_student") ?></button>
            </div>
        </form>
    </div>
</div>



<script type="text/javascript">
    $(".select2").select2();
    $('#dob').datepicker({
        startView: 2
    });

    $('#classesID').change(function(event) {
        var classesID = $(this).val();
        if (classesID === '0') {
            $('#sectionID').val(0);
        } else {
            $.ajax({
                async: false,
                type: 'POST',
                url: "<?= base_url('student/sectioncall') ?>",
                data: "id=" + classesID,
                dataType: "html",
                success: function(data) {
                    $('#sectionID').html(data);
                }
            });
            $.ajax({
                async: false,
                type: 'POST',
                url: "<?= base_url('student/optionalsubjectcall') ?>",
                data: "id=" + classesID,
                dataType: "html",
                success: function(data2) {
                    $('#optionalSubjectID').html(data2);
                }
            });
        }
    });

    $(document).on('click', '#close-preview', function() {
        $('.image-preview').popover('hide');
        // Hover befor close the preview
        $('.image-preview').hover(
            function() {
                $('.image-preview').popover('show');
                $('.content').css('padding-bottom', '100px');
            },
            function() {
                $('.image-preview').popover('hide');
                $('.content').css('padding-bottom', '20px');
            }
        );
    });

    $(function() {

        // Create the close button
        var closebtn = $('<button/>', {
            type: "button",
            text: 'x',
            id: 'close-preview',
            style: 'font-size: initial;',
        });
        closebtn.attr("class", "close pull-right");
        // Set the popover default content
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
            $(".image-preview-input-title").text("<?= $this->lang->line('student_file_browse') ?>");
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
            // Set preview image into the popover data-content
            reader.onload = function(e) {
                $(".image-preview-input-title").text("<?= $this->lang->line('student_file_browse') ?>");
                $(".image-preview-clear").show();
                $(".image-preview-filename").val(file.name);
                img.attr('src', e.target.result);
                $(".image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
                $('.content').css('padding-bottom', '100px');
            }
            reader.readAsDataURL(file);
        });
    });
</script>