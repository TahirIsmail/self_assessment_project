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
                <h5 class="page-header">
                    <a href="<?php echo base_url('center/add') ?>">
                        <i class="fa fa-plus"></i> <?= $this->lang->line('add_title') ?>
                    </a>
                </h5>

                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th><?= $this->lang->line('slno') ?></th>
                                <th><?= $this->lang->line('center_city') ?></th>
                                <th><?= $this->lang->line('center_date') ?></th>
                                <th><?= $this->lang->line('address') ?></th>
                                <th><?= $this->lang->line('center_image') ?></th>
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
                                        <td><img src="<?= base_url('uploads/images/' . $center->course_image) ?>" width="50" /></td>
                                        <td>
                                         <a href="<?= base_url('center/edit/' . $center->id) ?>" class="btn btn-primary"><?= $this->lang->line('edit') ?></a>
                                         <form action="<?= base_url('center/delete/' . $center->id) ?>" method="post" onsubmit="return confirm('Are you sure you want to delete this center?');">
    <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>">
    <button type="submit" class="btn btn-danger"><?= $this->lang->line('delete') ?></button>
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
