<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-calendar"></i> <?=$this->lang->line('panel_title')?></h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><?=$this->lang->line('menu_notice')?></li>
            </ol>
        </nav>
    </div><!-- /.box-header -->

    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <?php if(permissionChecker('notice_add')) { ?>
                    <div class="mb-4">
                        <a href="<?php echo base_url('notice/add') ?>" class="btn btn-primary">
                            <i class="fa fa-plus"></i> 
                            <?=$this->lang->line('add_title')?>
                        </a>
                    </div>
                <?php } ?>

                <div class="table-responsive">
                    <table id="example1" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="col-sm-2"><?=$this->lang->line('slno')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('notice_title')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('notice_date')?></th>
                                <th class="col-sm-4"><?=$this->lang->line('notice_notice')?></th>
                                <?php if(permissionChecker('notice_edit') || permissionChecker('notice_delete') || permissionChecker('notice_view')) { ?>
                                    <th class="col-sm-2"><?=$this->lang->line('action')?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(inicompute($notices)) {
                                $i = 1; 
                                foreach($notices as $notice) { ?>
                                    <tr>
                                        <td><?=$i?></td>
                                        <td>
                                            <?php 
                                                if(strlen($notice->title) > 25)
                                                    echo strip_tags(substr($notice->title, 0, 25)."...");
                                                else 
                                                    echo strip_tags($notice->title);
                                            ?>
                                        </td>
                                        <td>
                                            <?=date("d M Y", strtotime($notice->date))?>
                                        </td>
                                        <td>
                                            <?php 
                                                if(strlen($notice->notice) > 60)
                                                    echo strip_tags(substr($notice->notice, 0, 60)."...");
                                                else 
                                                    echo strip_tags($notice->notice);
                                            ?>
                                        </td>
                                        <?php if(permissionChecker('notice_edit') || permissionChecker('notice_delete') || permissionChecker('notice_view')) { ?>
                                            <td>
                                                <a href="notice/view/<?=$notice->noticeID?>" class="btn btn-sm btn-info"><i class="fa fa-eye"></i> <?=$this->lang->line('view')?></a>
                                                <a href="notice/edit/<?=$notice->noticeID?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i> <?=$this->lang->line('edit')?></a>
                                                <a href="notice/delete/<?=$notice->noticeID?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');"><i class="fa fa-trash"></i> <?=$this->lang->line('delete')?></a>
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
