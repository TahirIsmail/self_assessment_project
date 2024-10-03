
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-sitemap"></i> <?=$this->lang->line('category')?></h3>

        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <?php if($siteinfos->school_type == 'classbase') { ?>
                <li class="active"><?=$this->lang->line('menu_classes')?></li>
            <?php } else { ?>
                <li class="active"><?=$this->lang->line('menu_department')?></li>
            <?php } ?>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">

                <?php 
                    $usertype = $this->session->userdata("usertype");
                    if(permissionChecker('course_category_add')) {
                ?>
                    <h5 class="page-header">
                        <a href="<?php echo base_url('course_category/add') ?>">
                            <i class="fa fa-plus"></i> 
                            <?=$this->lang->line('add_category')?>
                        </a>
                    </h5>
                <?php } ?>

                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="col-lg-1"><?=$this->lang->line('#')?></th>
                                <th class="col-lg-2"><?=$this->lang->line('category_name')?></th>
                                 <?php if(permissionChecker('course_category_edit') || permissionChecker('course_category_delete')) { ?>
                                <th class="col-lg-2"><?=$this->lang->line('action')?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if(inicompute($categories)) {$i = 1; foreach($categories as $category) { ?>
                                <tr>
                                    <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('category_name')?>">
                                        <?php echo $category['category_name']; ?>
                                    </td>
                                   
                                    <?php if(permissionChecker('course_category_edit') || permissionChecker('course_category_delete')) { ?>
                                    <td data-title="<?=$this->lang->line('action')?>">
                                        <?php echo btn_edit('course_category/edit/'.$category['id'], $this->lang->line('edit')) ?>
                                        <?php echo btn_delete('course_category/delete/'.$category['id'], $this->lang->line('delete')) ?>
                                    </td>
                                    <?php } ?>
                                </tr>
                            <?php $i++; }} ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
