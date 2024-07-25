<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Student</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .box {
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
            margin-top: 20px;
            background-color: #ffffff;
            padding: 20px; /* Added padding for spacing */
        }

        .box:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .box-header {
            background-image: linear-gradient(to right, #fff, #ff9068);
            color: #333;
            padding: 10px 20px;
            margin-top: 20px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 60px;
        }

        .box-title {
            font-size: 24px !important;
            font-weight: bold;
            color: #e55039 !important;
        }

        .breadcrumb {
            background-color: transparent;
            margin-bottom: 0;
            padding: 0;
            display: none;
        }

        .breadcrumb li {
            display: inline;
            font-size: 14px;
        }

        .breadcrumb li a {
            color: #ffffff;
            text-decoration: none;
        }

        .breadcrumb li a:hover {
            text-decoration: underline;
        }

        .form-horizontal .form-group {
            margin-bottom: 15px;
        }

        .form-horizontal .control-label {
            text-align: left;
            font-weight: bold;
            font-size: 14px;
            color: #333333;
        }

        .form-horizontal .form-control {
            width: 80%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .form-horizontal .form-control:focus {
            border-color: #ff4e50;
            box-shadow: 0 0 5px rgba(255, 78, 80, 0.5);
        }

        .btn-danger, .btn-default {
            background-color: #ff4e50;
            border-color: #ff4e50;
            color: white;
            transition: background-color 0.3s, border-color 0.3s;
            font-size: 14px;
            padding: 8px 16px;
        }

        .btn-danger:hover, .btn-default:hover {
            background-color: #e55039;
            border-color: #e55039;
        }

        .input-group .btn {
            margin-left: 5px;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .input-group .btn-default {
            background-color: #ff4e50;
            border-color: #ff4e50;
            color: white;
            font-size: 14px;
        }

        .input-group .btn-default:hover {
            background-color: #e55039;
            border-color: #e55039;
        }

        .image-preview {
            border: 1px solid #ddd;
            border-radius: 4px;
            padding: 5px;
        }

        .image-preview-input-title {
            color: #fff;
            background-color: #ff4e50;
            border-color: #ff4e50;
            padding: 6px 12px;
            cursor: pointer;
        }

        .image-preview-input input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }

        .popover-title {
            background-color: #ff4e50;
            color: white;
            border-radius: 4px 4px 0 0;
            padding: 8px 14px;
            font-weight: bold;
        }

        .popover-content {
            padding: 14px;
        }

        .has-error .form-control {
            border-color: #ff4e50;
        }

        .has-error .control-label {
            color: #ff4e50;
        }

        .text-red {
            color: #ff4e50;
        }
    </style>
</head>
<body>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><i class="fa icon-student"></i> <strong>ADD STUDENT</strong></h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-5 col-md-offset-1">
                        <div class="form-group <?= form_error('agent_id') ? 'has-error' : '' ?>">
                            <label for="agent_id" class="control-label">Agent ID</label>
                            <input type="text" class="form-control" id="agent_id" name="agent_id" value="<?= set_value('agent_id') ?>">
                            <span class="control-label"><?= form_error('agent_id'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group <?= form_error('Fname') ? 'has-error' : '' ?>">
                            <label for="Fname" class="control-label">First Name</label>
                            <input type="text" class="form-control" id="Fname" name="Fname" value="<?= set_value('Fname') ?>">
                            <span class="control-label"><?= form_error('Fname'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 col-md-offset-1">
                        <div class="form-group <?= form_error('lname') ? 'has-error' : '' ?>">
                            <label for="lname" class="control-label">Last Name</label>
                            <input type="text" class="form-control" id="lname" name="lname" value="<?= set_value('lname') ?>">
                            <span class="control-label"><?= form_error('lname'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group <?= form_error('contact') ? 'has-error' : '' ?>">
                            <label for="contact" class="control-label">Contact</label>
                            <input type="text" class="form-control" id="contact" name="contact" value="<?= set_value('contact') ?>">
                            <span class="control-label"><?= form_error('contact'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 col-md-offset-1">
                        <div class="form-group <?= form_error('email') ? 'has-error' : '' ?>">
                            <label for="email" class="control-label"><?= $this->lang->line("student_email") ?></label>
                            <input type="text" class="form-control" id="email" name="email" value="<?= set_value('email') ?>">
                            <span class="control-label"><?= form_error('email'); ?></span>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group <?= form_error('address') ? 'has-error' : '' ?>">
                            <label for="address" class="control-label"><?= $this->lang->line("student_address") ?></label>
                            <input type="text" class="form-control" id="address" name="address" value="<?= set_value('address') ?>">
                            <span class="control-label"><?= form_error('address'); ?></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group <?= form_error('remarks') ? 'has-error' : '' ?>">
                            <label for="remarks" class="control-label"><?= $this->lang->line("student_remarks") ?></label>
                            <textarea class="form-control" id="remarks" name="remarks" rows="3"><?= set_value('remarks') ?></textarea>
                            <span class="control-label"><?= form_error('remarks'); ?></span>
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="form-group <?= form_error('photo') ? 'has-error' : '' ?>">
                            <label for="photo" class="control-label"><?= $this->lang->line("student_photo") ?></label>
                            <div class="input-group image-preview">
                                <input type="text" class="form-control image-preview-filename" disabled="disabled" style="width: 120px;">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                        <span class="fa fa-remove"></span> <?= $this->lang->line('student_clear') ?>
                                    </button>
                                    <div class="btn btn-danger image-preview-input">
                                        <span class="fa fa-repeat"></span>
                                        <span class="image-preview-input-title"><?= $this->lang->line('student_file_browse') ?></span>
                                        <input type="file" accept="image/png, image/jpeg, image/gif" name="photo" />
                                    </div>
                                </span>
                            </div>
                            <span class="control-label"><?= form_error('photo'); ?></span>
                        </div>
                    </div>
                </div> -->
                <div class="form-group">
                    <div class="col-md-10 col-md-offset-1 text-center">
                        <input type="submit" class="btn btn-danger" value="<?= $this->lang->line("add_student") ?>">
                    </div>
                </div>
            </form>
            <?php if ($siteinfos->note == 1) { ?>
                <div class="callout callout-danger">
                    <p><b>Note:</b> Create teacher, class, section before creating a new student.</p>
                </div>
            <?php } ?>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2();
        });
        $('#close-preview').on('click', function () {
            $('.image-preview').popover('hide');
            $('.image-preview').hover(
                function () {
                    $('.image-preview').popover('show');
                    $('.content').css('padding-bottom', '100px');
                },
                function () {
                    $('.image-preview').popover('hide');
                    $('.content').css('padding-bottom', '20px');
                }
            );
        });
        $(function () {
            var closebtn = $('<button/>', {
                type: "button",
                text: 'x',
                id: 'close-preview',
                style: 'font-size: initial;',
            });
            closebtn.attr("class", "close pull-right");
            $('.image-preview').popover({
                trigger: 'manual',
                html: true,
                title: "<strong>Preview</strong>" + $(closebtn)[0].outerHTML,
                content: "There's no image",
                placement: 'bottom'
            });
            $('.image-preview-clear').click(function () {
                $('.image-preview').attr("data-content", "").popover('hide');
                $('.image-preview-filename').val("");
                $('.image-preview-clear').hide();
                $('.image-preview-input input:file').val("");
                $(".image-preview-input-title").text("<?= $this->lang->line('student_file_browse') ?>");
            });
            $(".image-preview-input input:file").change(function () {
                var img = $('<img/>', {
                    id: 'dynamic',
                    width: 250,
                    height: 200,
                    overflow: 'hidden'
                });
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = function (e) {
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
</body>
</html>
