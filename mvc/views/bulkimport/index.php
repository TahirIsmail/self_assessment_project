<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fa fa-upload"></i> <?= $this->lang->line('panel_title') ?></h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?= base_url('dashboard/index') ?>"><i class="fa fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><?= $this->lang->line('menu_import_question') ?></li>
            </ol>
        </nav>
    </div>
    <!-- /.card-header -->

    <!-- form start -->
    <div class="card-body">
        <form enctype="multipart/form-data" action="<?= base_url('bulkimport/question_bulkimport'); ?>" class="row g-3" method="post">
            <div class="col-md-6">
                <label for="uploadFile" class="form-label">
                    <?= $this->lang->line('bulkimport_add_question') ?>
                    &nbsp;<i class="fa fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Download the parent sample csv file first, see the format, and make a copy of that file. Add your data with the exact format used in our csv file, then upload the file."></i>
                </label>
                <input class="form-control" id="uploadFile" placeholder="Choose File" disabled>
            </div>

            <div class="col-md-3">
                <label class="form-label">Upload CSV</label>
                <div class="input-group">
                    <label class="btn btn-success">
                        <span class="fa fa-repeat"></span>
                        <span><?= $this->lang->line('bulkimport_upload') ?></span>
                        <input id="uploadBtn" type="file" class="form-control-file d-none" name="csvQuestion">
                    </label>
                </div>
            </div>

            <div class="col-md-3">
                <label class="form-label">Actions</label>
                <div class="d-grid gap-2 d-md-block">
                    <button type="submit" class="btn btn-success"><?= $this->lang->line('bulkimport_import') ?></button>
                    <a class="btn btn-info" href="<?= base_url('assets/csv/sample-question.csv') ?>"><i class="fa fa-download"></i> <?= $this->lang->line('bulkimport_download_sample') ?></a>
                </div>
            </div>
        </form>

        <?php if ($this->session->flashdata('msg')): ?>
            <div class="alert alert-danger mt-3">
                <h4>These data not inserted</h4>
                <p><?= $this->session->flashdata('msg'); ?></p>
            </div>
        <?php endif; ?>
    </div><!-- /.card-body -->
</div><!-- /.card -->


<script>
    // Script to handle file name display when uploading a file
    document.getElementById("uploadBtn").onchange = function() {
        // Display just the file name instead of full path
        document.getElementById("uploadFile").value = this.value.split("\\").pop();
    };

    // Initialize tooltips using Bootstrap 5's Tooltip component
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });
</script>