<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title"><i class="bi bi-calendar-check"></i> <?=$this->lang->line('panel_title')?></h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?=base_url("dashboard/index")?>"><i class="bi bi-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$this->lang->line('menu_event')?></li>
            </ol>
        </nav>
    </div><!-- /.card-header -->

    <!-- form start -->
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">

                <?php if(permissionChecker('event_add')) { ?>
                    <div class="mb-3">
                        <a href="<?php echo base_url('event/add') ?>" class="btn btn-primary">
                            <i class="bi bi-plus-lg"></i>
                            <?=$this->lang->line('add_title')?>
                        </a>
                    </div>
                <?php } ?>

                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="col-sm-1"><?=$this->lang->line('slno')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('event_title')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('event_fdate')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('event_tdate')?></th>
                                <th class="col-sm-3"><?=$this->lang->line('event_details')?></th>
                                <?php if(permissionChecker('event_edit') || permissionChecker('event_delete') || permissionChecker('event_view')) { ?>
                                    <th class="col-sm-2"><?=$this->lang->line('action')?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(inicompute($events)) {$i = 1; foreach($events as $event) { ?>
                                <tr>
                                    <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('event_title')?>">
                                        <?php
                                            if(strlen($event->title) > 25)
                                                echo strip_tags(substr($event->title, 0, 25)."...");
                                            else
                                                echo strip_tags(substr($event->title, 0, 25));
                                        ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('event_fdate')?>">
                                        <?php echo date("d M Y", strtotime($event->fdate))." (".date("h:i A", strtotime($event->ftime)).")"; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('event_tdate')?>">
                                        <?php echo date("d M Y", strtotime($event->tdate))." (".date("h:i A", strtotime($event->ttime)).")"; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('event_details')?>">
                                        <?php
                                            if(strlen($event->details) > 60)
                                                echo strip_tags(substr($event->details, 0, 60)."..."); 
                                            else 
                                                echo strip_tags(substr($event->details, 0, 60));
                                        ?>
                                    </td>
                                    <?php if(permissionChecker('event_edit') || permissionChecker('event_delete') || permissionChecker('event_view')) { ?>
                                    <td data-title="<?=$this->lang->line('action')?>">
                                        <?php echo btn_view('event/view/'.$event->eventID, $this->lang->line('view')); ?>
                                        <?php echo btn_edit('event/edit/'.$event->eventID, $this->lang->line('edit')); ?>
                                        <?php echo btn_delete('event/delete/'.$event->eventID, $this->lang->line('delete')); ?>
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
