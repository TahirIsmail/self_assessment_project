<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fas fa-user-shield"></i> <?=$this->lang->line('panel_title')?></h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url("dashboard/index")?>"><i class="fas fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$this->lang->line('menu_permission')?></li>
            </ol>
        </nav>
    </div><!-- /.card-header -->

    <!-- form start -->
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                <form action="#" class="row g-3" method="post" id="usertype">
                    <div class="col-md-6">
                        <label for="usertypeID" class="form-label"><?=$this->lang->line("select_usertype")?></label>
                        <?php
                            $array = array("0" => $this->lang->line("permission_select_usertype"));
                            if (isset($set)) {
                                $set = $set;
                            } else {
                                $set = null;
                            }
                            foreach ($usertypes as $usertype) {
                                $array[$usertype->usertypeID] = $usertype->usertype;
                            }
                            echo form_dropdown("usertypeID", $array, set_value("usertypeID", $set), "id='usertypeID' class='form-select select2'");
                        ?>
                    </div>
                </form>
            </div>
        </div><!-- /.row -->

        <?php if (isset($set)): ?>
            <div class="row mt-4">
                <div class="col-sm-12">
                    <form action="<?=base_url('permission/save/'.$set)?>" class="form-horizontal" method="post" id="usertype">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th><?=$this->lang->line('slno')?></th>
                                        <th><?=$this->lang->line('module_name')?></th>
                                        <th><?=$this->lang->line('permission_add')?></th>
                                        <th><?=$this->lang->line('permission_edit')?></th>
                                        <th><?=$this->lang->line('permission_delete')?></th>
                                        <th><?=$this->lang->line('permission_view')?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $permissionTable    = array();
                                        $permissionCheckBox = array();
                                        $permissionCheckBoxVal = array();
                                        foreach ($permissions as $data) {
                                            if(strpos($data->name, '_edit') == false && strpos($data->name, '_view') == false && strpos($data->name, '_delete') == false && strpos($data->name, '_add') == false) {
                                                $push['name'] = $data->name;
                                                $push['description'] = $data->description;
                                                $push['status'] = $data->active;
                                                array_push($permissionTable, $push);
                                            }
                                            $permissionCheckBox[ $data->name ] = $data->active;
                                            $permissionCheckBoxVal[ $data->name ] = $data->permissionID;
                                        }
                                    ?>
                                    <?php
                                    $i = 1;
                                    foreach($permissionTable as $data) { ?>
                                        <tr>
                                            <td>
                                                <?php
                                                    $status = "";
                                                    if(isset($permissionCheckBox[$data['name']])) {
                                                        if ($permissionCheckBox[$data['name']]=="yes") {
                                                            if ($permissionCheckBoxVal[$data['name']]) {
                                                                echo "<input type='checkbox' name=".$data['name']." value=".$permissionCheckBoxVal[$data['name']]." checked='checked' id=".$data['name']." onClick='$(this).processCheck();'>";
                                                            }
                                                        } else {
                                                            if ($permissionCheckBoxVal[$data['name']]) {
                                                                $status = "disabled";
                                                                echo "<input type='checkbox' name=".$data['name']." value=".$permissionCheckBoxVal[$data['name']]." id=".$data['name']."  onClick='$(this).processCheck();' >";
                                                            }
                                                        }
                                                    }
                                                ?>
                                            </td>
                                            <td><?=$data['description']?></td>
                                            <td>
                                                <?php
                                                    if(isset($permissionCheckBox[$data['name'].'_add'])) {
                                                        if ($permissionCheckBox[$data['name'].'_add']=="yes") {
                                                            if ($permissionCheckBoxVal[$data['name'].'_add']) {
                                                                echo "<input type='checkbox' name='".$data['name'].'_add'."' value=".$permissionCheckBoxVal[$data['name'].'_add']." checked='checked' id='".$data['name'].'_add'."' ".$status.">";
                                                            }
                                                        } else {
                                                            if ($permissionCheckBoxVal[$data['name'].'_add']) {
                                                                echo "<input type='checkbox' name='".$data['name'].'_add'."' value=".$permissionCheckBoxVal[$data['name'].'_add']." id='".$data['name'].'_add'."' ".$status.">";
                                                            }
                                                        }
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if(isset($permissionCheckBox[$data['name'].'_edit'])) {
                                                        if ($permissionCheckBox[$data['name'].'_edit']=="yes") {
                                                            if ($permissionCheckBoxVal[$data['name'].'_edit']) {
                                                                echo "<input type='checkbox' name='".$data['name'].'_edit'."' value=".$permissionCheckBoxVal[$data['name'].'_edit']." checked='checked' id='".$data['name'].'_edit'."' ".$status.">";
                                                            }
                                                        } else {
                                                            if ($permissionCheckBoxVal[$data['name'].'_edit']) {
                                                                echo "<input type='checkbox' name='".$data['name'].'_edit'."' value=".$permissionCheckBoxVal[$data['name'].'_edit']." id='".$data['name'].'_edit'."' ".$status.">";
                                                            }
                                                        }
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if(isset($permissionCheckBox[$data['name'].'_delete'])) {
                                                        if ($permissionCheckBox[$data['name'].'_delete']=="yes") {
                                                            if ($permissionCheckBoxVal[$data['name'].'_delete']) {
                                                                echo "<input type='checkbox' name='".$data['name'].'_delete'."' value=".$permissionCheckBoxVal[$data['name'].'_delete']." checked='checked' id='".$data['name'].'_delete'."' ".$status.">";
                                                            }
                                                        } else {
                                                            if ($permissionCheckBoxVal[$data['name'].'_delete']) {
                                                                echo "<input type='checkbox' name='".$data['name'].'_delete'."' value=".$permissionCheckBoxVal[$data['name'].'_delete']." id='".$data['name'].'_delete'."' ".$status.">";
                                                            }
                                                        }
                                                    }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                    if(isset($permissionCheckBox[$data['name'].'_view'])) {
                                                        if ($permissionCheckBox[$data['name'].'_view']=="yes") {
                                                            if ($permissionCheckBoxVal[$data['name'].'_view']) {
                                                                echo "<input type='checkbox' name='".$data['name'].'_view'."' value=".$permissionCheckBoxVal[$data['name'].'_view']." checked='checked' id='".$data['name'].'_view'."' ".$status.">";
                                                            }
                                                        } else {
                                                            if ($permissionCheckBoxVal[$data['name'].'_view']) {
                                                                echo "<input type='checkbox' name='".$data['name'].'_view'."' value=".$permissionCheckBoxVal[$data['name'].'_view']." id='".$data['name'].'_view'."' ".$status.">";
                                                            }
                                                        }
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php $i++; } ?>
                                    <tr>
                                        <td colspan="6" rowspan="2">
                                            <input class="btn btn-success" type="submit" value="Save Permission">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div><!-- /.row -->
        <?php endif ?>
    </div>
</div>

<script type="text/javascript">
    $('.select2').select2();

    $('#usertypeID').change(function(event) {
        var usertypeID = $(this).val();
        $.ajax({
            type: 'POST',
            url: "<?=base_url('permission/permission_list')?>",
            data: {usertypeID: usertypeID},
            success: function(data) {
                window.location.href = data;
            }
        });
    });

    $.fn.processCheck = function() {
        var id = $(this).attr('id');
        if ($('input#'+id).is(':checked')) {
            ['add', 'edit', 'delete', 'view'].forEach(function(action) {
                if ($('input#'+id+"_"+action).length) {
                    $('input#'+id+"_"+action).prop('disabled', false);
                    $('input#'+id+"_"+action).prop('checked', true);
                }
            });
        } else {
            ['add', 'edit', 'delete', 'view'].forEach(function(action) {
                if ($('input#'+id+"_"+action).length) {
                    $('input#'+id+"_"+action).prop('disabled', true);
                    $('input#'+id+"_"+action).prop('checked', false);
                }
            });
        }
    };
</script>
