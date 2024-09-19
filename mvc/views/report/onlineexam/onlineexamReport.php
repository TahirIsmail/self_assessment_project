<div id="printablediv">
    <div class="card">
        <div class="card-header bg-light">
            <h3 class="card-title"><i class="fa fa-clipboard"></i> <?=$this->lang->line('onlineexamreport_report_for')?> <?=$this->lang->line('onlineexamreport_onlineexam')?></h3>
        </div><!-- /.card-header -->

        <div class="card-body">
            <div class="row">
                <div class="col-12 d-flex justify-content-between">
                    <h5><?=$this->lang->line('onlineexamreport_classes');?> : <?=inicompute($classes) ? $classes->classes : $this->lang->line('onlineexamreport_select_all_classes') ?></h5>

                    <?php if($sectionID == 0) { ?>
                        <h5><?=$this->lang->line('onlineexamreport_section')?> : <?=$this->lang->line('onlineexamreport_select_all_section');?></h5>
                    <?php } else { ?>
                        <h5><?=$this->lang->line('onlineexamreport_section')?> : <?=inicompute($section) ? $section->section : '' ?></h5>
                    <?php } ?>
                </div>
                <div class="col-12">
                    <?php if(inicompute($onlineexam_user_statuss)) { ?>
                        <div class="table-responsive">
                            <table id="example1" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><?=$this->lang->line('onlineexamreport_photo')?></th>
                                        <th><?=$this->lang->line('onlineexamreport_name')?></th>
                                        <?php if($sectionID == 0 ) { ?>
                                            <th><?=$this->lang->line('onlineexamreport_section')?></th>
                                        <?php } ?>
                                        <?php if($studentID > 0) { ?>
                                            <th><?=$this->lang->line('onlineexamreport_subject')?></th>
                                        <?php } ?>
                                        <th><?=$this->lang->line('onlineexamreport_datetime')?></th>
                                        <th><?=$this->lang->line('onlineexamreport_obtained_mark')?></th>
                                        <th><?=$this->lang->line('onlineexamreport_percentage')?></th>
                                        <th><?=$this->lang->line('onlineexamreport_status')?></th>
                                        <th><?=$this->lang->line('action')?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; foreach($onlineexam_user_statuss as $onlineexam_user_status) { ?>
                                        <tr>
                                            <td><?=$i?></td>

                                            <td>
                                                <?php
                                                if(isset($students[$onlineexam_user_status->userID])) {
                                                    $array = array(
                                                        "src" => base_url('uploads/images/'.$students[$onlineexam_user_status->userID]->photo),
                                                        'width' => '35px',
                                                        'height' => '35px',
                                                        'class' => 'rounded-circle'
                                                    );
                                                } else {
                                                    $array = array(
                                                        "src" => base_url('uploads/images/default.png'),
                                                        'width' => '35px',
                                                        'height' => '35px',
                                                        'class' => 'rounded-circle'
                                                    );
                                                }
                                                echo img($array);
                                                ?>
                                            </td>

                                            <td>
                                                <?=isset($students[$onlineexam_user_status->userID]) ? $students[$onlineexam_user_status->userID]->name : '' ?>
                                            </td>

                                            <?php if($sectionID == 0 ) { ?>
                                                <td>
                                                    <?php
                                                    if(isset($students[$onlineexam_user_status->userID])) {
                                                        if(isset($sections[$students[$onlineexam_user_status->userID]->sectionID])) {
                                                            echo $sections[$students[$onlineexam_user_status->userID]->sectionID]->section;
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                            <?php } ?>

                                            <?php if($studentID > 0) { ?>
                                                <td>
                                                    <?php
                                                    if(isset($onlineexams[$onlineexam_user_status->onlineExamID])) {
                                                        if(isset($subjects[$onlineexams[$onlineexam_user_status->onlineExamID]->subjectID])) {
                                                            echo $subjects[$onlineexams[$onlineexam_user_status->onlineExamID]->subjectID]->subject;
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                            <?php } ?>

                                            <td>
                                                <?=date('d M Y - h:i:s', strtotime($onlineexam_user_status->time))?>
                                            </td>

                                            <td><?=$onlineexam_user_status->totalMark?></td>

                                            <td><?=$onlineexam_user_status->totalPercentage?>%</td>

                                            <td>
                                                <?php
                                                if($onlineexam_user_status->statusID == 5) {
                                                    echo $this->lang->line('onlineexamreport_passed');
                                                } elseif($onlineexam_user_status->statusID == 10) {
                                                    echo $this->lang->line('onlineexamreport_failed');
                                                }
                                                ?>
                                            </td>

                                            <td>
                                                <a class="btn btn-success btn-sm" target="_blank" href="<?=base_url('onlineexamreport/result/'.$onlineexam_user_status->onlineExamUserStatus)?>"><?=$this->lang->line('view')?></a>
                                            </td>
                                        </tr>
                                    <?php $i++; } ?>
                                </tbody>
                            </table>
                        </div>
                    <?php } else { ?>
                        <div class="alert alert-danger" role="alert">
                            <p><b class="text-info"><?=$this->lang->line('onlineexamreport_data_not_found')?></b></p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
