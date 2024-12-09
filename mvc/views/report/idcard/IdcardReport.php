<div class="row">
    <div class="col-12" style="margin:10px 0px">
        <?php
            $pdf_preview_uri = base_url('idcardreport/pdf/'.$usertypeID.'/'.$classesID.'/'.$sectionID.'/'.$userID.'/'.$type.'/'.$background);
            echo btn_printReport('idcardreport', $this->lang->line('idcardreport_print'), 'printablediv');
            echo btn_pdfPreviewReport('idcardreport',$pdf_preview_uri, $this->lang->line('idcardreport_pdf_preview'));
            echo btn_sentToMailReport('idcardreport', $this->lang->line('idcardreport_mail'));
        ?>
    </div>
</div>
<div class="box">
    <div class="box-header bg-gray">
        <h3 class="box-title "><i class="fa fa-clipboard"></i> 
            <?=$this->lang->line('idcardreport_report_for')?> -
            <?=isset($usertypes[$usertypeID]) ? $usertypes[$usertypeID]: ' ';?>
        </h3>
    </div><!-- /.box-header -->
    <div id="printablediv">
        <style>
            .idcardreport {
                font-family: Arial, sans-serif;
                max-width: 794px;
                max-height: 1123px;
                margin-left: auto;
                margin-right: auto;
                -webkit-print-color-adjust: exact;
            }
            .idcardreport-frontend{
                margin: 3px;
                float: left;
                border: 1px solid #000;
                padding: 20px;
                width: 257px;
                text-align: center;
                height: 290px;
                <?php if($background == 1) { ?>
                background: url("<?=base_url('uploads/default/idcard-border.png')?>") !important;
                background-size: 100% 100% !important;
                <?php } ?>
            }
            
            .idcardreport-frontend h3{
                font-size: 20px;
                color: #1A2229;
            }
            
            .idcardreport-frontend img{
                width: 50px;
                height: 50px;
                border: 1px solid #ddd;
                margin-bottom: 5px;
            }

            .idcardreport-frontend p{
                text-align: left;
                font-size: 12px;
                margin-bottom: 0px;
                color: #1A2229;
            }

            .idcardreport-backend{
                margin: 3px;
                float: right;
                border: 1px solid #1A2229;
                padding: 10px;
                width: 257px;
                text-align: center;
                height: 290px;
                <?php if($background == 1) { ?>
                background: url("<?=base_url('uploads/default/idcard-border.png')?>") !important;
                background-size: 100% 100% !important;
                <?php } ?>
            }

            .idcardreport-backend h3{
                background-color: #1A2229;
                color: #fff;
                font-size: 13px;
                padding: 5px 0;
                margin: 5px;
                margin-top: 13px;
            }

            .idcardreport-backend h4{
                font-size: 11px;
                color: #1A2229;
                font-weight: bold;
                padding: 5px 0;
            }

            .idcardreport-backend p{
                font-size: 17px;
                color: #1A2229;
                font-weight: 500;
                line-height: 17px;
            }

            .idcardreport-schooladdress {
                color: #1A2229 !important;
                font-weight: 500;
            }

            .idcardreport-bottom {
                text-align: center;
                padding-top: 5px;
            }

            .idcardreport-qrcode{
                width: 50%;
                text-align: center;
                display: inline-block;
            }

            .idcardreport-qrcode img{
                width: 80px;
                height: 80px;
            }

            .idcardreport-session{
                float: right;
                width: 50%;
            }
            
            .idcardreport-session span{
                color: #1A2229;
                font-weight: bold;
                margin-top: 35px;
                overflow: hidden;
                float: left;
            }

            @media print {
                .idcardreport {
                    max-width: 794px;
                    max-height: 1123px;
                    margin: auto;
                    -webkit-print-color-adjust: exact;
                }

                .idcardreport-frontend {
                    margin: 1px;
                    float: left;
                    border: 1px solid #000;
                    padding: 10px;
                    width: 250px;
                }

                h3 {
                    color: #1A2229 !important;
                }

                .idcardreport-backend {
                    margin: 1px;
                    float: right;
                    border: 1px solid #1A2229;
                    padding: 12px;
                    width: 250px;
                }

                .idcardreport-backend h3 {
                    background-color: #1A2229 !important;
                    font-size: 12px;
                    color: #fff !important;
                    display: block;
                }
            }

            .idcardreport-frontend .profile-view-dis .profile-view-tab {
                width: 100%;
                float: left;
                margin-bottom: 0;
                padding: 0 15px;
                font-size: 14px;
                margin-top: 5px;
            }
        </style>

        <div class="box-body mb-5">
            <div class="row">
                <div class="col-12">
                    <?php if (inicompute($idcards)) { ?>
                    <table class="idcardreport">
                        <tr>
                            <?php $j= 0; $i=0; $c = inicompute($idcards); foreach($idcards as $idcard) {
                            //TYPE 1 == Front Part
                            //TYPE 2 == Back Part
                            if($type == 1) { ?>
                                <td class="idcardreport-frontend">
                                    <h3><?=$siteinfos->sname?></h3> 
                                    <img src="<?=imagelink($idcard->photo)?>" alt="">
                                    <div class="profile-view-dis">
                                        <?php if($usertypeID == 1) { ?>
                                            <div class="profile-view-tab">
                                                <p><span><b><?=$this->lang->line('idcardreport_name')?></b></span>: <?=$idcard->name?></p>
                                            </div>
                                            <div class="profile-view-tab">
                                                <p><span><b><?=$this->lang->line('idcardreport_dob')?></b> </span>: <?=date('d M Y',strtotime($idcard->dob))?></p>
                                            </div>
                                            <div class="profile-view-tab">
                                                <p><span><b><?=$this->lang->line('idcardreport_jod')?></b> </span>: <?=date('d M Y',strtotime($idcard->jod))?></p>
                                            </div>
                                            <div class="profile-view-tab">
                                                <p><span><b><?=$this->lang->line('idcardreport_phone')?></b> </span>: <?=$idcard->phone?> </p>
                                            </div>
                                            <div class="profile-view-tab">
                                                <p><span><b><?=$this->lang->line('idcardreport_email')?></b> </span>: <?=$idcard->email?></p>
                                            </div>
                                        <?php } elseif($usertypeID == 2) { ?>
                                            <div class="profile-view-tab">
                                                <p><span><b><?=$this->lang->line('idcardreport_name')?></b> </span>: <?=$idcard->name?></p>
                                            </div>
                                            <div class="profile-view-tab">
                                                <p><span><b><?=$this->lang->line('idcardreport_designation')?></b> </span>: <?=$idcard->designation?></p>
                                            </div>
                                            <div class="profile-view-tab">
                                                <p><span><b><?=$this->lang->line('idcardreport_jod')?></b> </span>: <?=date('d M Y',strtotime($idcard->jod))?></p>
                                            </div>
                                            <div class="profile-view-tab">
                                                <p><span><b><?=$this->lang->line('idcardreport_phone')?></b> </span>: <?=$idcard->phone?></p>
                                            </div>
                                            <div class="profile-view-tab">
                                                <p><span><b><?=$this->lang->line('idcardreport_email')?></b> </span>: <?=$idcard->email?></p>
                                            </div>
                                        <?php } elseif($usertypeID == 3) { ?>
                                            <div class="profile-view-tab">
                                                <p><span><b><?=$this->lang->line('idcardreport_name')?></b> </span>: <?=$idcard->name?></p>
                                            </div>
                                            <div class="profile-view-tab">
                                                <p><span><b><?=$this->lang->line('idcardreport_registerNO')?></b> </span>: <?=$idcard->registerNO?></p>
                                            </div>
                                            <div class="profile-view-tab">
                                                <p><span><b><?=$this->lang->line('idcardreport_class')?></b> </span>: <?=isset($classes[$idcard->classesID]) ? $classes[$idcard->classesID] : ''?></p>
                                            </div>
                                            <div class="profile-view-tab">
                                                <p><span><b><?=$this->lang->line('idcardreport_section')?></b> </span>: <?=isset($sections[$idcard->sectionID]) ? $sections[$idcard->sectionID] : ''?></p>
                                            </div>
                                            <div class="profile-view-tab">
                                                <p><span><b><?=$this->lang->line('idcardreport_roll')?></b> </span>: <?=$idcard->roll?></p>
                                            </div>
                                            <div class="profile-view-tab">
                                                <p><span><b><?=$this->lang->line('idcardreport_blood_group')?></b> </span>: <?=$idcard->bloodgroup?></p>
                                            </div>
                                        <?php } else { ?>
                                            <div class="profile-view-tab">
                                                <p><span><b><?=$this->lang->line('idcardreport_name')?></b> </span>: <?=$idcard->name?></p>
                                            </div>
                                            <div class="profile-view-tab">
                                                <p><span><b><?=$this->lang->line('idcardreport_dob')?></b> </span>: <?=date('d M Y',strtotime($idcard->dob))?></p>
                                            </div>
                                            <div class="profile-view-tab">
                                                <p><span><b><?=$this->lang->line('idcardreport_jod')?></b> </span>: <?=date('d M Y',strtotime($idcard->jod))?></p>
                                            </div>
                                            <div class="profile-view-tab">
                                                <p><span><b><?=$this->lang->line('idcardreport_phone')?></b> </span>: <?=$idcard->phone?> </p>
                                            </div>
                                            <div class="profile-view-tab">
                                                <p><span><b><?=$this->lang->line('idcardreport_email')?></b> </span>: <?=$idcard->email?></p>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </td>
                                <?php 
                                $i++; 
                                if($i==3) {
                                    $j++;
                                    $k = $c/3;
                                    $k = ceil($k);
                                    if($k == $j) {
                                        echo "";
                                    } else {
                                        echo "</tr><tr>";
                                    }
                                    $i=0;
                                }
                            } else { $i++;?>
                                <?php 
                                    if($usertypeID == 1) {
                                        $filename = $idcard->usertypeID.'-'.$idcard->systemadminID;
                                        $text = $this->lang->line('idcardreport_type')." : ".'1'.',';
                                        $text.= $this->lang->line('idcardreport_id')." : ".$idcard->systemadminID;
                                    } elseif($usertypeID == 2) {
                                        $filename = $idcard->usertypeID.'-'.$idcard->teacherID;
                                        $text = $this->lang->line('idcardreport_type')." : ".'2'.',';
                                        $text.= $this->lang->line('idcardreport_id')." : ".$idcard->teacherID;
                                    } elseif($usertypeID == 3) {
                                        $filename = $idcard->usertypeID.'-'.$idcard->studentID;
                                        $text = $this->lang->line('idcardreport_type')." : ".'3'.',';
                                        $text.= $this->lang->line('idcardreport_id')." : ".$idcard->studentID;
                                    } elseif($usertypeID == 4) {
                                        $filename = $idcard->usertypeID.'-'.$idcard->parentsID;
                                        $text = "invalid";
                                    } else {
                                        $filename = $idcard->usertypeID.'-'.$idcard->userID;
                                        $text = $this->lang->line('idcardreport_type')." : ".$idcard->usertypeID.',';
                                        $text.= $this->lang->line('idcardreport_id')." : ".$idcard->userID;
                                    }

                                    $filepath = FCPATH.'uploads/idQRcode/'.$filename.'.png';
                                    if(!file_exists($filepath)) {
                                        generate_qrcode($text,$filename);
                                    }
                                ?>
                                <td class="idcardreport-backend">
                                    <?php $yeardata = "10-12-".date('Y')?>
                                    <h3><?=$this->lang->line('idcardreport_valid_up')?> <?=date('F Y',strtotime($yeardata))?></h3>
                                    <h4><?=$this->lang->line('idcardreport_please_return')?> : </h4>
                                    <p><?=$siteinfos->sname?></p>
                                    <div class="idcardreport-schooladdress">
                                        <?=$siteinfos->address?>
                                    </div>
                                    <div class="idcardreport-bottom">
                                        <div class="idcardreport-qrcode">
                                            <img src="<?=base_url('uploads/idQRcode/'.$filename.'.png')?>" alt="">
                                        </div>
                                    </div>
                                </td>
                            <?php } } ?>
                        </tr>
                    </table>
                    <?php } else { ?>   
                        <div class="alert alert-danger">
                            <p><b class="text-info"><?=$this->lang->line('idcardreport_data_not_found')?></b></p>
                        </div>
                    <?php } ?>
                </div>
            </div><!-- row -->
        </div><!-- Body -->
    </div>
</div>


<!-- email modal starts here -->
<form class="row g-3" role="form" action="<?=base_url('idcardreport/send_pdf_to_mail');?>" method="post">
    <div class="modal fade" id="mail" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?=$this->lang->line('idcardreport_mail')?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="to" class="form-label">
                            <?=$this->lang->line("idcardreport_to")?> <span class="text-danger">*</span>
                        </label>
                        <input type="email" class="form-control" id="to" name="to" value="<?=set_value('to')?>" >
                        <div id="to_error" class="form-text text-danger"></div>
                    </div>

                    <div class="mb-3">
                        <label for="subject" class="form-label">
                            <?=$this->lang->line("idcardreport_subject")?> <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="subject" name="subject" value="<?=set_value('subject')?>" >
                        <div id="subject_error" class="form-text text-danger"></div>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">
                            <?=$this->lang->line("idcardreport_message")?>
                        </label>
                        <textarea class="form-control" id="message" style="resize: vertical;" name="message"><?=set_value('message')?></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?=$this->lang->line('close')?></button>
                    <input type="button" id="send_pdf" class="btn btn-success" value="<?=$this->lang->line("idcardreport_send")?>" />
                </div>
            </div>
        </div>
    </div>
</form>
<!-- email end here -->

<script type="text/javascript">
    
    function check_email(email) {
        var status = false;
        var emailRegEx = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/i;
        if (email.search(emailRegEx) == -1) {
            $("#to_error").html('');
            $("#to_error").html("<?=$this->lang->line('idcardreport_mail_valid')?>").css("text-align", "left").css("color", 'red');
        } else {
            status = true;
        }
        return status;
    }

    document.getElementById('send_pdf').addEventListener('click', function() {
        var field = {
            'to'         : document.getElementById('to').value, 
            'subject'    : document.getElementById('subject').value, 
            'message'    : document.getElementById('message').value,
            'usertypeID' : '<?=$usertypeID?>',
            'classesID'  : '<?=$classesID?>',
            'sectionID'  : '<?=$sectionID?>',
            'userID'     : '<?=$userID?>',
            'type'       : '<?=$type?>',
            'background' : '<?=$background?>',
        };

        var to = document.getElementById('to').value;
        var subject = document.getElementById('subject').value;
        var error = 0;

        document.getElementById('to_error').innerHTML = "";
        document.getElementById('subject_error').innerHTML = "";

        if(to == "" || to == null) {
            error++;
            document.getElementById('to_error').innerHTML = "<?=$this->lang->line('idcardreport_mail_to')?>";
            document.getElementById('to_error').style.color = 'red';
        } else {
            if(check_email(to) == false) {
                error++
            }
        }

        if(subject == "" || subject == null) {
            error++;
            document.getElementById('subject_error').innerHTML = "<?=$this->lang->line('idcardreport_mail_subject')?>";
            document.getElementById('subject_error').style.color = 'red';
        }

        if(error == 0) {
            document.getElementById('send_pdf').disabled = true;
            fetch("<?=base_url('idcardreport/send_pdf_to_mail')?>", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(field)
            }).then(response => response.json())
            .then(data => {
                if (!data.status) {
                    document.getElementById('send_pdf').disabled = false;
                    if(data.to) {
                        document.getElementById('to_error').innerHTML = "<?=$this->lang->line('idcardreport_mail_to')?>";
                    }
                    if(data.subject) {
                        document.getElementById('subject_error').innerHTML = "<?=$this->lang->line('idcardreport_mail_subject')?>";
                    }
                    if(data.message) {
                        toastr["error"](data.message);
                    }
                } else {
                    location.reload();
                }
            });
        }
    });
</script>
