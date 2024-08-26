<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-slideshare"></i> <?= $this->lang->line('panel_title') ?></h3>
        <ol class="breadcrumb">
            <li><a href="<?= base_url("dashboard/index") ?>"><i class="fa fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a></li>
            <li class="active"><?= $this->lang->line('panel_title') ?></li>
        </ol>
    </div>

    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <h5 class="page-header"><?= $this->lang->line('enrolled_courses') ?></h5>
                <div class="row">
                    <?php if ($enrolled_courses) {
                        foreach ($enrolled_courses as $en_course) { ?>
                            <div class="col-md-4">
                                <div class="course-card">
                                <img src="<?= base_url('uploads/images/' . $un_course->image); ?>" alt="<?= $un_course->name; ?>" class="img-responsive course-image" style="width: 80px; height:auto;">

                                    <h4 class="course-name"><?= $en_course->name; ?></h4>
                                    <p class="course-cost"><?= $en_course->cost ? '$' . number_format($en_course->cost, 2) : $this->lang->line('free'); ?></p>
                                    <p class="course-status"><?= $en_course->paid ? $this->lang->line('paid') : $this->lang->line('free'); ?></p>
                                    <a href="<?= site_url('take_exam/index/' . $en_course->slug); ?>" class="btn btn-primary"><?= $this->lang->line('view_course'); ?></a>
                                </div>
                            </div>
                        <?php }
                    } else { ?>
                        <div class="col-sm-12">
                            <h3><?= $this->lang->line('no_enrolled_course'); ?></h3>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="row">
                    <?php if ($unenrolled_courses) { ?>
                        <h5 class="page-header"><?= $this->lang->line('suggestion_courses') ?></h5>
                        <?php foreach ($unenrolled_courses as $un_course) { ?>
                            <div class="col-md-4">
                                <div class="course-card">
                                    <img src="<?= base_url('uploads/images/' . $un_course->image); ?>" alt="<?= $un_course->name; ?>" class="img-responsive course-image" style="width: 80px; height:auto;">
                                    <h4 class="course-name"><?= $un_course->name; ?></h4>
                                    <p class="course-cost"><?= $un_course->cost ? '$' . number_format($un_course->cost, 2) : $this->lang->line('free'); ?></p>
                                    <p class="course-status"><?= $un_course->paid ? $this->lang->line('paid') : $this->lang->line('free'); ?></p>
                                    <a href="<?= site_url('take_exam/index/' . $un_course->slug); ?>" class="btn btn-primary"><?= $this->lang->line('enroll_now'); ?></a>
                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>

</div>


<style>
.course-card {
    border: 1px solid #ddd;
    padding: 15px;
    margin-bottom: 20px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
    text-align: center;
}
.course-image {
    max-width: 100%;
    height: auto;
    margin-bottom: 10px;
    border-radius: 5px;
}
.course-name {
    font-size: 1.25em;
    margin-bottom: 10px;
    color: #333;
}
.course-cost, .course-status {
    font-size: 1em;
    margin-bottom: 5px;
    color: #777;
}
.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
}
</style>
<script>

</script>