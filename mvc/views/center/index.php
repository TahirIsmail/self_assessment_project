<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap 5.0 CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta3/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (for icons) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        .page-header {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><i class="fa fa-star"></i> <?= $this->lang->line('center_title') ?></h3>

            <ol class="breadcrumb">
                <li><a href="<?= base_url("dashboard/index") ?>"><i class="fa fa-laptop"></i> <?= $this->lang->line('menu_dashboard') ?></a></li>
                <li class="active"><?= $this->lang->line('menu_center') ?></li>
            </ol>
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                    <?php if (permissionChecker('center_add')) { ?>
                        <h5 class="page-header">
                            <a href="<?= base_url('center/add') ?>" class="btn btn-primary">
                                <i class="fa fa-plus"></i> <?= $this->lang->line('add_title') ?>
                            </a>
                        </h5>
                    <?php } ?>

                    <div id="hide-table">
                        <table id="example1" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th><?= $this->lang->line('slno') ?></th>
                                    <th><?= $this->lang->line('center_city') ?></th>
                                    <th><?= $this->lang->line('center_date') ?></th>
                                    <th><?= $this->lang->line('address') ?></th>
                                    <th><?= $this->lang->line('action') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (inicompute($centers)) {
                                    $i = 1;
                                    foreach ($centers as $center) { ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $center->city ?></td>
                                            <td><?= $center->date ?></td>
                                            <td><?= $center->address ?></td>
                                            <td style="width: 150px;">
                                                <a href="<?= base_url('center/edit/' . $center->id) ?>" class="btn btn-primary btn-sm" style="display:inline-block;">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                <form action="<?= base_url('center/delete/' . $center->id) ?>" method="post" onsubmit="return confirm('Are you sure you want to delete this center?');" style="display:inline-block; margin-left: 5px;">
                                                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                <?php }
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5.0 JS (including Popper.js for tooltips and popovers) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta3/js/bootstrap.min.js"></script>

<!-- jQuery (if not already included in your project) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Your existing scripts -->
<script type="text/javascript">
    $('#classesID').change(function() {
        var classesID = $(this).val();
        if (classesID == 0) {
            $('#hide-table').hide();
        } else {
            $.ajax({
                type: 'POST',
                url: "<?= base_url('center/center_list') ?>",
                data: "id=" + classesID,
                dataType: "html",
                success: function(data) {
                    window.location.href = data;
                }
            });
        }
    });
</script>

<script>
    $(".select2").select2({
        placeholder: "",
        maximumSelectionSize: 6
    });
</script>

</body>
</html>
