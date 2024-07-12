<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Management</title>
    
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif !important;
        }

        .box {
            border: 1px solid #ddd !important;
            border-radius: 5px !important;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1) !important;
            transition: all 0.3s ease-in-out !important;
        }

        .box:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2) !important;
        }

        .box-header {
            background-image: linear-gradient(#ce2029,#800000) !important;
            color: #fff !important;
            padding: 15px !important;
            border-top-left-radius: 5px !important;
            border-top-right-radius: 5px !important;
            transition: background-color 0.3s ease !important;
            display: flex !important;
            align-items: center !important;
        }

        .box-header:hover {
            background-color: #ce2029 !important;
        }

        .box-title {
            font-size: 20px !important;
            font-weight: bold !important;
            margin-right: auto !important;
        }

        .breadcrumb {
            background-color: transparent !important;
            margin-bottom: 0 !important;
            padding: 10px 0 !important;
            display: flex !important;
        }

        .breadcrumb a {
            color: #fff !important;
        }

        .breadcrumb .active {
            color: #ffeb3b !important;
        }

        .page-header {
            border-bottom: 1px solid #ddd !important;
            padding-bottom: 10px !important;
            margin-bottom: 20px !important;
        }

        .page-header a {
            background-image: linear-gradient(#ce2029,#800000) !important;
            color: #fff !important;
            padding: 10px 20px !important;
            border-radius: 5px !important;
            text-decoration: none !important;
            transition: background-color 0.3s ease !important;
            margin-right: 10px !important;
        }

        .page-header a:hover {
            background-color: #ce2029 !important;
        }

        .table {
            width: 100% !important;
            margin-bottom: 20px !important;
            border-collapse: collapse !important;
            transition: all 0.3s ease-in-out !important;
        }

        .table-hover tbody tr:hover {
            background-color: #f5f5f5 !important;
        }

        .table th, .table td {
            padding: 15px !important;
            border: 1px solid #ddd !important;
        }

        .table th {
            background-image: linear-gradient(#ce2029,#800000) !important;
            color: #fff !important;
        }

        .table td {
            background-color: #fff !important;
            color: #333 !important;
        }

        .onoffswitch-small {
            position: relative !important;
            width: 50px !important;
            -webkit-user-select: none !important; 
            -moz-user-select: none !important; 
            -ms-user-select: none !important;
        }

        .onoffswitch-small-checkbox {
            display: none !important;
        }

        .onoffswitch-small-label {
            display: block !important;
            overflow: hidden !important;
            cursor: pointer !important;
            border: 2px solid #999999 !important;
            border-radius: 20px !important;
        }

        .onoffswitch-small-inner {
            display: block !important;
            width: 200% !important;
            margin-left: -100% !important;
            transition: margin 0.3s ease-in-out !important;
        }

        .onoffswitch-small-inner:before, .onoffswitch-small-inner:after {
            display: block !important;
            float: left !important;
            width: 50% !important;
            height: 20px !important;
            padding: 0 !important;
            line-height: 20px !important;
            font-size: 12px !important;
            color: white !important;
            box-sizing: border-box !important;
        }

        .onoffswitch-small-inner:before {
            content: "ON" !important;
            padding-left: 10px !important;
            background-color: #4caf50 !important;
            color: #FFFFFF !important;
        }

        .onoffswitch-small-inner:after {
            content: "OFF" !important;
            padding-right: 10px !important;
            background-color: #f44336 !important;
            color: #FFFFFF !important;
            text-align: right !important;
        }

        .onoffswitch-small-switch {
            display: block !important;
            width: 18px !important;
            margin: 1px !important;
            background: #FFFFFF !important;
            position: absolute !important;
            top: 0 !important;
            bottom: 0 !important;
            right: 28px !important;
            border: 2px solid #999999 !important;
            border-radius: 20px !important;
            transition: all 0.3s ease-in-out !important;
        }

        .onoffswitch-small-checkbox:checked + .onoffswitch-small-label .onoffswitch-small-inner {
            margin-left: 0 !important;
        }

        .onoffswitch-small-checkbox:checked + .onoffswitch-small-label .onoffswitch-small-switch {
            right: 0px !important;
        }

        /* Select2 Styles */
        .select2-container .select2-selection {
            border: 1px solid #ddd !important;
            border-radius: 5px !important;
            height: 38px !important;
            transition: all 0.3s ease-in-out !important;
        }

        .select2-container .select2-selection__arrow {
            height: 36px !important;
            top: 1px !important;
            transition: all 0.3s ease-in-out !important;
        }

        .select2-container .select2-selection__rendered {
            line-height: 36px !important;
            transition: all 0.3s ease-in-out !important;
        }

        

        .btn-danger {
            background-color: #ce2029 !important;
            color: white !important;
        }

        .btn-danger:hover {
            background-color: #800000 !important;
        }
    </style>
</head>
<body>
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-teacher"></i> <?=$this->lang->line('panel_title')?></h3>
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active"><?=$this->lang->line('menu_teacher')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">

                <?php 
                    if(permissionChecker('teacher_add')){
                ?>
                <h5 class="page-header"><a href="<?php echo base_url('teacher/add') ?>"><i class="fa fa-plus"></i> 
                    <?=$this->lang->line('add_title')?></a>
                </h5>

                <?php } ?>

                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="col-sm-2"><?=$this->lang->line('slno')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('teacher_photo')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('teacher_name')?></th>
                                <th class="col-sm-2"><?=$this->lang->line('teacher_email')?></th>
                                <?php if(permissionChecker('teacher_edit')){ ?>
                                <th class="col-sm-2"><?=$this->lang->line('teacher_status')?></th>
                                <?php } ?>
                                <?php if(permissionChecker('teacher_edit') || permissionChecker('teacher_delete') || permissionChecker('teacher_view')) { ?>
                                <th class="col-sm-2"><?=$this->lang->line('action')?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(inicompute($teachers)) {$i = 1; foreach($teachers as $teacher) { ?>
                                <tr>
                                    <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('teacher_photo')?>">
                                        <?=profileimage($teacher->photo)?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('teacher_name')?>">
                                        <?php echo $teacher->name; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('teacher_email')?>">
                                        <?php echo $teacher->email; ?>
                                    </td>
                                    <?php if(permissionChecker('teacher_edit')){ ?>
                                    <td data-title="<?=$this->lang->line('teacher_status')?>">
                                      <div class="onoffswitch-small" id="<?=$teacher->teacherID?>">
                                          <input type="checkbox" id="myonoffswitch<?=$teacher->teacherID?>" class="onoffswitch-small-checkbox" name="paypal_demo" <?php if($teacher->active === '1') echo "checked='checked'"; ?>>
                                          <label for="myonoffswitch<?=$teacher->teacherID?>" class="onoffswitch-small-label">
                                              <span class="onoffswitch-small-inner"></span>
                                              <span class="onoffswitch-small-switch"></span>
                                          </label>
                                      </div>           
                                    </td>
                                    <?php } ?>
                                    <?php if(permissionChecker('teacher_edit') || permissionChecker('teacher_delete') || permissionChecker('teacher_view')) { ?>
                                    <td data-title="<?=$this->lang->line('action')?>">
                                        <?php 
                                            echo btn_view('teacher/view/'.$teacher->teacherID, $this->lang->line('view')); 
                                            
                                            echo btn_edit('teacher/edit/'.$teacher->teacherID, $this->lang->line('edit')); 
                                            echo btn_delete('teacher/delete/'.$teacher->teacherID, $this->lang->line('delete')); 
                                            
                                        ?>
                                    </td>
                                    <?php } ?>
                                </tr>
                            <?php $i++; }} ?>
                        </tbody>
                    </table>
                </div>

            </div> <!-- col-sm-12 -->
        </div><!-- row -->
    </div><!-- Body -->
</div><!-- /.box -->

<script>
  var status = '';
  var id = 0;
  $('.onoffswitch-small-checkbox').click(function() {
      if($(this).prop('checked')) {
          status = 'checked';
          id = $(this).parent().attr("id");
      } else {
          status = 'unchecked';
          id = $(this).parent().attr("id");
      }

      if((status != '' || status != null) && (id !='')) {
          $.ajax({
              type: 'POST',
              url: "<?=base_url('teacher/active')?>",
              data: "id=" + id + "&status=" + status,
              dataType: "html",
              success: function(data) {
                  if(data == 'Success') {
                      toastr["success"]("Success")
                      toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "500",
                        "hideDuration": "500",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                      }
                  } else {
                      toastr["error"]("Error")
                      toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "500",
                        "hideDuration": "500",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                      }
                  }
              }
          });
      }
  }); 
</script>
</body>
</html>
 