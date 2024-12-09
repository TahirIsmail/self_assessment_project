<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><i class="fa fa-briefcase"></i> <?= $this->lang->line('panel_title') ?></h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= base_url("dashboard/index") ?>"><i class="fa fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $this->lang->line('menu_edit') ?> <?= $this->lang->line('panel_title') ?></li>
                </ol>
            </nav>
        </div>
        <div class="card-body">
            <form class="row g-3" method="post" enctype="multipart/form-data">

                <!-- Name Field -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="name_id" class="form-label">
                            <?php
                            if ($usertypeID == 4) {
                                echo $this->lang->line("profile_guardian");
                            } else {
                                echo $this->lang->line("profile_name");
                            }
                            ?>
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control <?= form_error('name') ? 'is-invalid' : '' ?>" id="name_id" name="name" value="<?= set_value('name', $user->name) ?>">
                        <div class="invalid-feedback">
                            <?php echo form_error('name'); ?>
                        </div>
                    </div>
                </div>

                <!-- Guardian Information (Only for UsertypeID 4) -->
                <?php if ($usertypeID == 4) { ?>

                    <!-- Father Name Field -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="father_name" class="form-label"><?= $this->lang->line("profile_father_name") ?></label>
                            <input type="text" class="form-control <?= form_error('father_name') ? 'is-invalid' : '' ?>" id="father_name" name="father_name" value="<?= set_value('father_name', $user->father_name) ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('father_name'); ?>
                            </div>
                        </div>
                    </div>

                    <!-- Mother Name Field -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="mother_name" class="form-label"><?= $this->lang->line("profile_mother_name") ?></label>
                            <input type="text" class="form-control <?= form_error('mother_name') ? 'is-invalid' : '' ?>" id="mother_name" name="mother_name" value="<?= set_value('mother_name', $user->mother_name) ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('mother_name'); ?>
                            </div>
                        </div>
                    </div>

                    <!-- Father Profession Field -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="father_profession" class="form-label"><?= $this->lang->line("profile_father_profession") ?></label>
                            <input type="text" class="form-control <?= form_error('father_profession') ? 'is-invalid' : '' ?>" id="father_profession" name="father_profession" value="<?= set_value('father_profession', $user->father_profession) ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('father_profession'); ?>
                            </div>
                        </div>
                    </div>

                    <!-- Mother Profession Field -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="mother_profession" class="form-label"><?= $this->lang->line("profile_mother_profession") ?></label>
                            <input type="text" class="form-control <?= form_error('mother_profession') ? 'is-invalid' : '' ?>" id="mother_profession" name="mother_profession" value="<?= set_value('mother_profession', $user->mother_profession) ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('mother_profession'); ?>
                            </div>
                        </div>
                    </div>

                <?php } ?>

                <!-- Other Fields for non-guardian profiles -->
                <?php if ($usertypeID != 4) { ?>

                    <!-- Date of Birth Field -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="dob" class="form-label"><?= $this->lang->line("profile_dob") ?></label>
                            <input type="text" class="form-control <?= form_error('dob') ? 'is-invalid' : '' ?>" id="dob" name="dob" value="<?= set_value('dob', $user->dob ? date('d-m-Y', strtotime($user->dob)) : '') ?>">
                            <div class="invalid-feedback">
                                <?php echo form_error('dob'); ?>
                            </div>
                        </div>
                    </div>

                    <!-- Gender Field -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="sex" class="form-label"><?= $this->lang->line("profile_sex") ?></label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fas fa-venus-mars"></i> <!-- Gender icon (optional) -->
                                </span>
                                <select class="form-select <?= form_error('sex') ? 'is-invalid' : '' ?>" id="sex" name="sex">
                                    <option value="male" <?= set_value('sex', $user->sex) == 'male' ? 'selected' : '' ?>>
                                        <?= $this->lang->line('profile_sex_male') ?>
                                    </option>
                                    <option value="female" <?= set_value('sex', $user->sex) == 'female' ? 'selected' : '' ?>>
                                        <?= $this->lang->line('profile_sex_female') ?>
                                    </option>
                                </select>
                                <div class="invalid-feedback">
                                    <?php echo form_error('sex'); ?>
                                </div>
                            </div>
                        </div>
                    </div>


                <?php } ?>

                <!-- Email Field -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="email" class="form-label"><?= $this->lang->line("profile_email") ?> <span class="text-danger">*</span></label>
                        <input type="email" class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>" id="email" name="email" value="<?= set_value('email', $user->email) ?>">
                        <div class="invalid-feedback">
                            <?php echo form_error('email'); ?>
                        </div>
                    </div>
                </div>

                <!-- Phone Field -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="phone" class="form-label"><?= $this->lang->line("profile_phone") ?></label>
                        <input type="text" class="form-control <?= form_error('phone') ? 'is-invalid' : '' ?>" id="phone" name="phone" value="<?= set_value('phone', $user->phone) ?>">
                        <div class="invalid-feedback">
                            <?php echo form_error('phone'); ?>
                        </div>
                    </div>
                </div>

                <!-- Address Field -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="address" class="form-label"><?= $this->lang->line("profile_address") ?></label>
                        <input type="text" class="form-control <?= form_error('address') ? 'is-invalid' : '' ?>" id="address" name="address" value="<?= set_value('address', $user->address) ?>">
                        <div class="invalid-feedback">
                            <?php echo form_error('address'); ?>
                        </div>
                    </div>
                </div>

                <!-- Profile Photo Field -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="photo" class="form-label"><?= $this->lang->line("profile_photo") ?></label>
                        <div class="input-group">
                            <input type="text" class="form-control image-preview-filename" disabled>
                            <button type="button" class="btn btn-outline-danger image-preview-clear" style="display:none;">
                                <span class="fa fa-remove"></span> <?= $this->lang->line('profile_clear') ?>
                            </button>
                            <div class="input-group-append">
                                <label class="btn btn-success">
                                    <span class="fa fa-repeat"></span>
                                    <?= $this->lang->line('profile_file_browse') ?>
                                    <input type="file" accept="image/png, image/jpeg, image/gif" name="photo" style="display: none;">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="col-md-12">
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success"><?= $this->lang->line("update_profile") ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        // Initialize select2 fields
        document.querySelectorAll('.select2').forEach(function(select) {
            new Choices(select, {
                searchEnabled: false
            });
        });

        // Initialize datepicker
        new flatpickr('#dob', {
            dateFormat: "d-m-Y"
        });

        // Image preview logic
        document.querySelectorAll(".image-preview-input input:file").forEach(function(input) {
            input.addEventListener('change', function() {
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.querySelector('.image-preview-filename').value = file.name;
                    document.querySelector('.image-preview').dataset.content = `<img src="${e.target.result}" width="250" height="200" />`;
                    document.querySelector('.image-preview-clear').style.display = 'inline-block';
                };
                reader.readAsDataURL(file);
            });
        });

        document.querySelector('.image-preview-clear').addEventListener('click', function() {
            document.querySelector('.image-preview-filename').value = '';
            this.style.display = 'none';
        });
    });
</script>