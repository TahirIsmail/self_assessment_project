<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fa fa-star"></i> <?= $this->lang->line('center_title') ?></h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url("dashboard/index") ?>"><i class="fa fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a></li>
                <li class="breadcrumb-item"><a href="<?= base_url("section/index") ?>"></i><?= $this->lang->line('menu_section') ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= $this->lang->line('menu_add') ?> <?= $this->lang->line('menu_section') ?></li>
            </ol>
        </nav>
    </div>
    <div class="card-body ">
        <form class="row g-3" method="post">

            <!-- Section Field -->
            <div class="col-md-6">
                <div class="mb-3 <?= form_error('section') ? 'has-error' : '' ?>">
                    <label for="section" class="form-label"><?= $this->lang->line("center_city") ?> <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="section" name="section" value="<?= set_value('section') ?>">
                    <div class="form-text text-danger">
                        <?php echo form_error('section'); ?>
                    </div>
                </div>
            </div>

            <!-- Center Date Field -->
            <div class="col-md-6">
                <div class="mb-3 <?= form_error('center_date') ? 'has-error' : '' ?>">
                    <label for="center_date" class="form-label"><?= $this->lang->line("center_date") ?> <span class="text-danger">*</span></label>
                    <input type="date" id="center_date" name="center_date" class="form-control" value="<?= set_value('center_date') ?>">
                    <div class="form-text text-danger">
                        <?php echo form_error('center_date'); ?>
                    </div>
                </div>
            </div>

            <!-- Price Field -->
            <div class="col-md-6">
                <div class="mb-3 <?= form_error('note') ? 'has-error' : '' ?>">
                    <label for="note" class="form-label"><?= $this->lang->line("center_price") ?></label>
                    <input type="text" class="form-control" id="note" name="note" value="<?= set_value('note') ?>">
                    <div class="form-text text-danger">
                        <?php echo form_error('note'); ?>
                    </div>
                </div>
            </div>

            <!-- Valid Days Field -->
            <div class="col-md-6">
                <div class="mb-3 <?= form_error('validDays') ? 'has-error' : '' ?>">
                    <label for="validDays" class="form-label"><?= $this->lang->line("online_exam_validDays") ?></label>
                    <input type="text" class="form-control" id="validDays" name="validDays" value="<?= set_value('validDays') ?>">
                    <div class="form-text text-danger">
                        <?php echo form_error('validDays'); ?>
                    </div>
                </div>
            </div>

            <!-- Cost Field -->
            <div class="col-md-6">
                <div class="mb-3 <?= form_error('cost') ? 'has-error' : '' ?>">
                    <label for="cost" class="form-label"><?= $this->lang->line("online_exam_cost") ?> <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="cost" name="cost" value="<?= set_value('cost') ?>">
                    <div class="form-text text-danger">
                        <?php echo form_error('cost'); ?>
                    </div>
                </div>
            </div>

            <!-- Judge Dropdown -->
            <div class="col-md-6 d-none">
                <div class="mb-3">
                    <label for="judge" class="form-label"><?= $this->lang->line("online_exam_judge") ?></label>
                    <?php
                    $array = [
                        0 => $this->lang->line("online_exam_auto"),
                        1 => $this->lang->line("online_exam_manually"),
                    ];
                    echo form_dropdown("judge", $array, set_value("judge"), "id='judge' class='form-select'");
                    ?>
                    <div class="form-text text-danger">
                        <?php echo form_error('judge'); ?>
                    </div>
                </div>
            </div>

            <!-- Image Upload -->
            <div class="col-md-6">
                <div class="mb-3 <?= form_error('photo') ? 'has-error' : '' ?>">
                    <label for="photo" class="form-label"><?= $this->lang->line("course_photo") ?></label>
                    <div class="input-group">
                        <input type="text" class="form-control" disabled>
                        <label class="input-group-text btn btn-primary" for="photo">
                            <?= $this->lang->line('section_file_browse') ?>
                            <input type="file" id="photo" name="photo" class="d-none" accept="image/png, image/jpeg, image/gif">
                        </label>
                    </div>
                    <div class="form-text text-danger">
                        <?php echo form_error('photo'); ?>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="col-md-6">
                <div class="mb-3">
                    <button type="submit" class="btn btn-success"><?= $this->lang->line("add_section") ?></button>
                </div>
            </div>

        </form>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var costDiv = document.getElementById('costDiv');
        var isPaid = document.getElementById('ispaid');
        isPaid.addEventListener('change', function () {
            if (this.value == 1) {
                costDiv.style.display = 'block';
            } else {
                costDiv.style.display = 'none';
            }
        });

        if (isPaid.value == 1) {
            costDiv.style.display = 'block';
        } else {
            costDiv.style.display = 'none';
        }
    });
</script>
