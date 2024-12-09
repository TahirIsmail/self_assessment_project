<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-qrcode"></i> <?= $this->lang->line('panel_title') ?></h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url("dashboard/index") ?>"><i class="fa fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a></li>
                <li class="breadcrumb-item"><a href="<?= base_url("question_bank/index") ?>"><?= $this->lang->line('menu_question_bank') ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $this->lang->line('menu_edit') ?> <?= $this->lang->line('menu_question_bank') ?></li>
            </ol>
        </nav>
    </div>
    <div class="box-body">
        <div class="row">
            <div class="col-12">
                <form class="needs-validation" novalidate method="post" enctype="multipart/form-data">
                    <!-- Row for Group and Level -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="group" class="form-label"><?= $this->lang->line("question_bank_group") ?> <span class='text-danger'>*</span></label>
                                <select id="group" name="group" class="form-select select2 <?= form_error('group') ? 'is-invalid' : '' ?>" required>
                                    <option value="0" <?= set_value('group', $question_bank->groupID) == 0 ? 'selected' : '' ?>><?= $this->lang->line("question_bank_select") ?></option>
                                    <?php
                                    foreach ($groups as $group) {
                                        $selected = set_value('group', $question_bank->groupID) == $group->questionGroupID ? 'selected' : '';
                                        echo "<option value='{$group->questionGroupID}' $selected>{$group->title}</option>";
                                    }
                                    ?>
                                </select>
                                <?php if (form_error('group')): ?>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('group'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="level" class="form-label"><?= $this->lang->line("question_bank_level") ?> <span class='text-danger'>*</span></label>
                                <select id="level" name="level" class="form-select select2 <?= form_error('level') ? 'is-invalid' : '' ?>" required>
                                    <option value="0" <?= set_value('level', $question_bank->levelID) == 0 ? 'selected' : '' ?>><?= $this->lang->line("question_bank_select") ?></option>
                                    <?php
                                    foreach ($levels as $level) {
                                        $selected = set_value('level', $question_bank->levelID) == $level->questionLevelID ? 'selected' : '';
                                        echo "<option value='{$level->questionLevelID}' $selected>{$level->name}</option>";
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?php echo form_error('level'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Row for Question and Explanation -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="question" class="form-label"><?= $this->lang->line("question_bank_question") ?> <span class='text-danger'>*</span></label>
                                <textarea class="form-control" id="question" name="question" required><?= set_value('question', $question_bank->question) ?></textarea>
                                <div class="invalid-feedback">
                                    <?php echo form_error('question'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="explanation" class="form-label"><?= $this->lang->line("question_bank_explanation") ?></label>
                                <textarea class="form-control" id="explanation" name="explanation"><?= set_value('explanation', $question_bank->explanation) ?></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Row for Photo and Hints -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="photo" class="form-label"><?= $this->lang->line("question_bank_image") ?></label>
                                <div class="input-group">
                                    <input type="text" class="form-control image-preview-filename" disabled="disabled">
                                    <button type="button" class="btn btn-outline-secondary image-preview-clear" style="display:none;">
                                        <span class="fa fa-remove"></span> <?= $this->lang->line('question_bank_clear') ?>
                                    </button>
                                    <label class="btn btn-outline-success">
                                        <span class="fa fa-upload"></span>
                                        <span class="image-preview-input-title"><?= $this->lang->line('question_bank_file_browse') ?></span>
                                        <input type="file" accept="image/png, image/jpeg, image/gif" name="photo" hidden />
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="hints" class="form-label"><?= $this->lang->line("question_bank_hints") ?></label>
                                <input type="text" class="form-control" id="hints" name="hints" value="<?= set_value('hints', $question_bank->hints) ?>">
                            </div>
                        </div>
                    </div>

                    <!-- Row for Mark and Type -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="mark" class="form-label"><?= $this->lang->line("question_bank_mark") ?> <span class='text-danger'>*</span></label>
                                <input type="text" class="form-control" id="mark" name="mark" value="<?= set_value('mark', $question_bank->mark) ?>" required>
                                <div class="invalid-feedback">
                                    <?php echo form_error('mark'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="mb-3">
                                <label for="type" class="form-label"><?= $this->lang->line("question_bank_type") ?> <span class='text-danger'>*</span></label>
                                <select id="type" name="type" class="form-select select2 <?= form_error('type') ? 'is-invalid' : '' ?>" required>
                                    <option value="0" <?= set_value('type', $question_bank->typeNumber) == 0 ? 'selected' : '' ?>><?= $this->lang->line("question_bank_select") ?></option>
                                    <?php
                                    foreach ($types as $type) {
                                        $selected = set_value('type', $question_bank->typeNumber) == $type->typeNumber ? 'selected' : '';
                                        echo "<option value='{$type->typeNumber}' $selected>{$type->name}</option>";
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?php echo form_error('type'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Row for Total Option and Dynamic Options -->
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-3" id="totalOptionDiv">
                                <label for="totalOption" class="form-label"><?= $this->lang->line("question_bank_totalOption") ?> <span class='text-danger'>*</span></label>
                                <select id="totalOption" name="totalOption" class="form-select select2 <?= form_error('totalOption') ? 'is-invalid' : '' ?>" required>
                                    <option value="0" <?= set_value('totalOption', $question_bank->totalOption) == 0 ? 'selected' : '' ?>><?= $this->lang->line("question_bank_select") ?></option>
                                    <?php
                                    foreach (range(1, 10) as $i) {
                                        $selected = set_value('totalOption', $question_bank->totalOption) == $i ? 'selected' : '';
                                        echo "<option value='{$i}' $selected>{$i}</option>";
                                    }
                                    ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?php echo form_error('totalOption'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div id="in"></div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success"><?= $this->lang->line("update_class") ?></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $('.select2').select2();

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
            $(".image-preview-input-title").text("<?= $this->lang->line('question_bank_file_browse') ?>");
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
                $(".image-preview-input-title").text("<?= $this->lang->line('question_bank_file_browse') ?>");
                $(".image-preview-clear").show();
                $(".image-preview-filename").val(file.name);
                img.attr('src', e.target.result);
                $(".image-preview").attr("data-content", $(img)[0].outerHTML).popover("show");
                $('.content').css('padding-bottom', '100px');
            }
            reader.readAsDataURL(file);
        });
    });

    $('#question').jqte();
    $('#explanation').jqte();
    $(function() {
        $('#question_bank').submit(function(e) {
            if (!$('.answer').is(':checked')) {
                e.preventDefault();
                alert("Please Select Atleast one Checkbox");
            }
        });
    });
    $('#type').change(function() {
        $('#in').children().remove();
        var type = $(this).val();
        if (type == 0) {
            $('#totalOptionDiv').hide();
        } else {
            $('#totalOption').val(0);
            $('#totalOptionDiv').show();
        }

    });
    $('#totalOption').change(function() {
        var valTotalOption = $(this).val();
        var type = $('#type').val();

        if (parseInt(valTotalOption) != 0) {
            var opt = [];
            var ans = [];
            var count = $('.coption').size();
            var dbOption = "<?= inicompute($dbTotalOptionID) ?>";
            for (j = 1; j <= count; j++) {
                if (type == 3) {
                    opt[j] = $('#answer' + j).val();
                } else {
                    opt[j] = $('#option' + j).val();
                    if ($('#ans' + j).prop('checked')) {
                        ans[j] = 'checked="checked"';
                    }
                }
            }

            $('#in').children().remove();
            for (i = 1; i <= valTotalOption; i++) {
                if ($('#in').size())
                    $('#in').append(formHtmlData(i, type, opt[i], ans[i]));
                else
                    $('#in').append(formHtmlData(i, type));
            }
        } else {
            $('#in').children().remove();
        }

        <?php
        $dbcount = inicompute($dbTotalOptionID);

        echo 'if(parseInt(valTotalOption) >= ' . $dbcount . ' && count <' . $dbcount . ') {';
        for ($k = 1; $k <= $dbcount; $k++) {
            echo '$("#option' . $k . '").val("' . (isset($dbTotalOptionID[$k]) ? $dbTotalOptionID[$k] : '') . '");';
            if (inicompute($answers) && in_array($k, $answers)) {
                echo '$("#ans' . $k . '").attr("checked", "checked");';
            }
        }
        echo '}';


        ?>
    });


    function formHtmlData(id, type, value = '', checked = '') {
        var required = 'required';
        if (type == 1) {
            type = 'radio';
        } else if (type == 2) {
            type = 'checkbox';
            required = '';
        } else if (type == 3) {
            var html = '<div class="form-group coption"><label for="answer' + id + '" class="col-sm-2 control-label"><?= $this->lang->line("question_bank_answer") ?> ' + id + '</label><div class="col-sm-4"><input type="text" class="form-control" id="answer' + id + '" name="answer[]" value="' + value + '" placeholder="<?= $this->lang->line("question_bank_answer") ?> ' + id + '" ></div><div class="col-sm-1"></div><span class="col-sm-4 control-label text-red" id="anserror' + id + '"><?php if (isset($form_validation['answer1'])) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        echo $form_validation['answer1'];
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    } ?></span></div>';
            return html;
        }

        var html = '<div class="form-group coption"><label for="option' + id + '" class="col-sm-2 control-label"><?= $this->lang->line("question_bank_option") ?> ' + id + '</label><div class="col-sm-4" style="display:inline-table"><input type="text" class="form-control" id="option' + id + '" name="option[]" value="' + value + '" placeholder="<?= $this->lang->line("question_bank_option") ?> ' + id + '" ><span class="input-group-addon"><input class="answer" id="ans' + id + '" ' + checked + ' type="' + type + '" name="answer[]" value="' + id + '" data-toggle="tooltip" data-placement="top" title="Correct Answer" ' + required + ' /></span></div><div class="col-sm-3" style="display:inline-table"><input type="file" name="image' + id + '" id="image' + id + '"></div><span class="col-sm-3 control-label text-red" id="anserror' + id + '"><?php if (isset($form_validation['answer1'])) {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        echo $form_validation['answer1'];
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    } ?></span></div>';
        return html;
    }
</script>

<?php
if (inicompute($options) || inicompute($answers)) {
    if ($typeID == 3) {
        $options =  $answers;
    } else {
        $options =  $options;
    }
    $i = 0;
    foreach ($options as $optionKey => $optionValue) {
        if (!isset($postData) && ($i + 1 > $question_bank->totalOption)) {
            break;
        }
        if ($f == 1) {
            $optionKey++;
        } ?>
        <script type="text/javascript">
            var optID = '<?= $i + 1 ?>';
            var optTypeID = '<?= $typeID ?>';
            var optVal = '<?= $optionValue ?>';
            var optAns = '<?= (inicompute($answers) && in_array($optionKey, $answers)) ? 'checked="checked"' : '' ?>';

            $('#in').append(formHtmlData(optID, optTypeID, optVal, optAns));
        </script>
<?php $i++;
    }
} ?>