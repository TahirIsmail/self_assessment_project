<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-star"></i> Add Center</h3>
        <ol class="breadcrumb">
            <li><a href="<?= base_url("dashboard/index") ?>"><i class="fa fa-laptop"></i> Dashboard</a></li>
            <li class="active">Add Center</li>
        </ol>
    </div>

    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
                <form class="form-horizontal" role="form" method="post" action="<?= base_url('center/add') ?>" enctype="multipart/form-data">

                    <!-- City Field -->
                    <div class="form-group <?= form_error('city') ? 'has-error' : '' ?>">
                        <label for="city" class="col-sm-2 control-label">City <span class="text-red">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="city" name="city" value="<?= set_value('city') ?>">
                            <?php if (form_error('city')): ?>
                                <span class="help-block"><?= form_error('city') ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Date Field -->
                    <div class="form-group <?= form_error('date') ? 'has-error' : '' ?>">
                        <label for="date" class="col-sm-2 control-label">Date <span class="text-red">*</span></label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" id="date" name="date" value="<?= set_value('date') ?>">
                            <?php if (form_error('date')): ?>
                                <span class="help-block"><?= form_error('date') ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- address Field -->
                    <div class="form-group <?= form_error('address') ? 'has-error' : '' ?>">
                        <label for="price" class="col-sm-2 control-label">Address <span class="text-red">*</span></label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="address" name="address" value="<?= set_value('address') ?>">
                            <?php if (form_error('address')): ?>
                                <span class="help-block"><?= form_error('address') ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Course Image Field
                    <div class="form-group <?= form_error('course_image') ? 'has-error' : '' ?>">
                        <label for="course_image" class="col-sm-2 control-label">Course Image <span class="text-red">*</span></label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control" id="course_image" name="course_image">
                            <?php if (form_error('course_image')): ?>
                                <span class="help-block"><?= form_error('course_image') ?></span>
                            <?php endif; ?>
                        </div>
                    </div> -->

                    <!-- Course Selection -->
                    <div class="form-group">
                        <h4>Select Courses</h4>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Course Name</th>
                                    <th>Select</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($courses as $course): ?>
                                <tr>
                                    <td><?= $course->course_name ?></td>
                                    <td>
                                        <input type="checkbox" name="selected_courses[]" value="<?= $course->id ?>" class="course-checkbox" data-course-id="<?= $course->id ?>">
                                    </td>
                                    <td>
                                        <input type="text" id="course-price-input-<?= $course->id ?>" name="course_price_<?= $course->id ?>" value="" class="course-price-input" style="display:none;" placeholder="Enter Price" />
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <button type="submit" class="btn btn-success">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('.course-checkbox');
    
    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            const courseId = this.getAttribute('data-course-id');
            const priceInput = document.getElementById(`course-price-input-${courseId}`);
            
            if (this.checked) {
                priceInput.style.display = 'block';
            } else {
                priceInput.style.display = 'none';
                priceInput.value = ''; 
            }
        });
    });
});
</script>
