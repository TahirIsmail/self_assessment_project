
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-subject"></i> <?=$this->lang->line('panel_title')?></h3>

       
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active"><?=$this->lang->line('menu_subject')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">

                <h5 class="page-header">
                    <?php if(permissionChecker('subject_add')) { ?>
                        <a href="<?php echo base_url('subject/add') ?>">
                            <i class="fa fa-plus"></i> 
                            <?=$this->lang->line('add_title')?>
                        </a>
                    <?php } ?>
                    
                </h5>

                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        
                        <thead>
                            <tr>
                                <th><?=$this->lang->line('slno')?></th>
                                <th><?=$this->lang->line('subject_name')?></th>
                                <th><?=$this->lang->line('subject_author')?></th>
                                <th><?=$this->lang->line('subject_code')?></th>
                                <th><?=$this->lang->line('subject_teacher')?></th>
                                <th><?=$this->lang->line('subject_passmark')?></th>
                                <th><?=$this->lang->line('subject_finalmark')?></th>
                                <th><?=$this->lang->line('subject_type')?></th>
                                <?php if(permissionChecker('subject_edit') || permissionChecker('subject_delete')) { ?>
                                <th><?=$this->lang->line('action')?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                    </table>
                </div>


            </div> <!-- col-sm-12 -->
            
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->
<script type="text/javascript">
    $('.select2').select2();
    $('#classesID').change(function() {
        var classesID = $(this).val();
        if(classesID == 0) {
            $('#hide-table').hide();
        } else {
            $.ajax({
                type: 'POST',
                url: "<?=base_url('subject/subject_list')?>",
                data: "id=" + classesID,
                dataType: "html",
                success: function(data) {
                    window.location.href = data;
                }
            });
        }
    });
</script>