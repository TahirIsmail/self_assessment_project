<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?= $this->lang->line('edit_course') ?></h3>
    </div>
    
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
                <form class="form-horizontal" action="<?= base_url('offercourses/update')?>" role="form" method="post" enctype="multipart/form-data">
                    <!-- Course Name -->
                     <input type="hidden" name="id" value="<?= $course->id?>">
                    <div class="form-group <?= form_error('course_name') ? 'has-error' : '' ?>">
                        <label for="course_name" class="col-sm-2 control-label">
                            <?= $this->lang->line("course_name") ?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="course_name" name="course_name" value="<?= set_value('course_name', $course->course_name) ?>">
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('course_name'); ?>
                        </span>
                    </div>

                    <!-- Course Description -->
                    <div class="form-group <?= form_error('course_description') ? 'has-error' : '' ?>">
                        <label for="course_description" class="col-sm-2 control-label">
                            <?= $this->lang->line("course_description") ?>
                        </label>
                        <div class="col-sm-6">
                            <textarea class="form-control" id="course_description" name="course_description"><?= set_value('course_description', $course->course_description) ?></textarea>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('course_description'); ?>
                        </span>
                    </div>

                    <!-- Course Photo
                    <div class="form-group <?= form_error('photo') ? 'has-error' : '' ?>">
                        <label for="photo" class="col-sm-2 control-label"><?= $this->lang->line("photo") ?></label>
                        <div class="col-sm-6">
                            <div class="input-group image-preview">
                                <input type="text" class="form-control image-preview-filename" disabled="disabled" value="<?= $course->photo ?>">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                        <span class="fa fa-remove"></span> <?= $this->lang->line('clear') ?>
                                    </button>
                                    <div class="btn btn-success image-preview-input">
                                        <span class="fa fa-repeat"></span>
                                        <span class="image-preview-input-title"><?= $this->lang->line('browse') ?></span>
                                        <input type="file" accept="image/png, image/jpeg, image/gif" name="photo" />
                                    </div>
                                </span>
                            </div>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('photo'); ?>
                        </span>
                    </div> -->

                    <!-- Submit Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="<?= $this->lang->line("edit_course") ?>">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
