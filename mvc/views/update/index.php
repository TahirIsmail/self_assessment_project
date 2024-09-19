<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-sync-alt"></i> <?=$this->lang->line('panel_title')?></h3>
            </div>
            <div class="card-body">
                <form role="form" method="post" enctype="multipart/form-data">
                    <div class="<?=form_error('file') ? 'mb-3 has-error' : 'mb-3' ?>">
                        <label for="file" class="form-label"><?=$this->lang->line("update_file")?> <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="text" class="form-control image-preview-filename" disabled="disabled" placeholder="<?=$this->lang->line('update_no_file')?>">
                            <button type="button" class="btn btn-outline-secondary image-preview-clear" style="display:none;">
                                <i class="fas fa-times"></i> <?=$this->lang->line('update_clear')?>
                            </button>
                            <label class="btn btn-outline-success image-preview-input">
                                <i class="fas fa-upload"></i>
                                <span class="image-preview-input-title"><?=$this->lang->line('update_file_browse')?></span>
                                <input id="uploadBtn" type="file" name="file" accept="image/png, image/jpeg, image/gif"/>
                            </label>
                        </div>
                    </div>
                    <input id="update" type="submit" class="btn btn-success" value="<?=$this->lang->line("update_update")?>" >
                </form>
            </div>
        </div>
    </div> 

    <div class="col-sm-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-table"></i> <?=$this->lang->line('update_update_history')?></h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?=base_url("dashboard/index")?>"><i class="fas fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?=$this->lang->line('menu_update')?></li>
                    </ol>
                </nav>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example1" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?=$this->lang->line('update_slno')?></th>
                                <th><?=$this->lang->line('update_date')?></th>
                                <th><?=$this->lang->line('update_version')?></th>
                                <th><?=$this->lang->line('update_status')?></th>
                                <th><?=$this->lang->line('update_action')?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(inicompute($updates)) { $i = 1; foreach($updates as $update) { ?>
                                <tr>
                                    <td><?=$i?></td>
                                    <td><?=date("d M Y", strtotime($update->date));?></td>
                                    <td><?=$update->version?></td>
                                    <td>
                                        <?=($update->status) ? '<span class="text-success">'.$this->lang->line('update_success').'</span>' : '<span class="text-danger">'.$this->lang->line('update_failed').'</span>'?>
                                    </td>
                                    <td>
                                        <a href="#log" id="<?=$update->updateID?>" class="btn btn-success btn-sm getloginfobtn" data-bs-toggle="modal"><i class="fas fa-info-circle" data-bs-toggle="tooltip" data-bs-placement="top" title="<?=$this->lang->line('update_log')?>"></i></a>
                                    </td>
                                </tr>
                            <?php $i++; }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="log" tabindex="-1" aria-labelledby="logModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logModalLabel"><?=$this->lang->line('update_updatelog')?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div id="logcontent"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?=$this->lang->line('close')?></button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.getloginfobtn').click(function() {
            var updateID =  $(this).attr('id');
            if(updateID > 0) {
                $.ajax({
                    type: 'POST',
                    url: "<?=base_url('update/getloginfo')?>",
                    data: {'updateID' : updateID},
                    dataType: "html",
                    success: function(data) {
                        $('#logcontent').html(data);
                    }
                });
            }
        });

        $(".image-preview-input input:file").change(function (){
            var file = this.files[0];
            var reader = new FileReader();

            $('.image-preview-clear').click(function(){
                $('.image-preview-filename').val("");
                $('.image-preview-clear').hide();
                $(".image-preview-input-title").text("<?=$this->lang->line('update_file_browse')?>");
            });

            reader.onload = function () {
                $(".image-preview-input-title").text("<?=$this->lang->line('update_file_browse')?>");
                $(".image-preview-clear").show();
                $(".image-preview-filename").val(file.name);
            }
            reader.readAsDataURL(file);
        });
    });
</script>
