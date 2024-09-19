    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><i class="fas fa-sitemap"></i> <?=$this->lang->line('panel_title')?></h3>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url("dashboard/index")?>"><i class="fas fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
                    <?php if($siteinfos->school_type == 'classbase') { ?>
                        <li class="breadcrumb-item active" aria-current="page"><?=$this->lang->line('menu_classes')?></li>
                    <?php } else { ?>
                        <li class="breadcrumb-item active" aria-current="page"><?=$this->lang->line('menu_department')?></li>
                    <?php } ?>
                </ol>
            </nav>
        </div><!-- /.card-header -->

        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">

                    <?php 
                        $usertype = $this->session->userdata("usertype");
                        if(permissionChecker('classes_add')) {
                    ?>
                        <h5 class="page-header">
                            <a class="btn btn-primary" href="<?php echo base_url('classes/add') ?>">
                                <i class="fas fa-plus"></i> 
                                <?=$this->lang->line('add_title')?>
                            </a>
                        </h5>
                    <?php } ?>

                    <div id="hide-table">
                        <table id="example1" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="col-lg-1"><?=$this->lang->line('slno')?></th>
                                    <th class="col-lg-2"><?=$this->lang->line('classes_name')?></th>
                                    <th class="col-lg-2"><?=$this->lang->line('classes_numeric')?></th>
                                    <th class="col-lg-2"><?=$this->lang->line('classes_note')?></th>
                                     <?php if(permissionChecker('classes_edit') || permissionChecker('classes_delete')) { ?>
                                    <th class="col-lg-2"><?=$this->lang->line('action')?></th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(inicompute($classes)) {$i = 1; foreach($classes as $class) { ?>
                                    <tr>
                                        <td data-title="<?=$this->lang->line('slno')?>">
                                            <?php echo $i; ?>
                                        </td>
                                        <td data-title="<?=$this->lang->line('classes_name')?>">
                                            <?php echo $class->classes; ?>
                                        </td>
                                        <td data-title="<?=$this->lang->line('classes_numeric')?>">
                                            <?php echo $class->classes_numeric; ?>
                                        </td>
                                        
                                        <td data-title="<?=$this->lang->line('classes_note')?>">
                                            <?php echo $class->note; ?>
                                        </td>
                                        <?php if(permissionChecker('classes_edit') || permissionChecker('classes_delete')) { ?>
                                        <td data-title="<?=$this->lang->line('action')?>">
                                            <?php echo btn_edit('classes/edit/'.$class->classesID, $this->lang->line('edit')) ?>
                                            <?php echo btn_delete('classes/delete/'.$class->classesID, $this->lang->line('delete')) ?>
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

