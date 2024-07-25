



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Class</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .box {
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
            margin-top: 20px;
            background-color: #ffffff;
            padding: 20px; /* Added padding for spacing */
        }

        .box:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .box-header {
            background-image: linear-gradient(to right, #fff, #ff9068);
            color: #333;
            padding: 10px 20px;
            margin-top: 20px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 60px;
        }

        .box-title {
            font-size: 24px !important;
            font-weight: bold;
            color: #e55039 !important;
        }

        .form-horizontal .form-group {
            margin-bottom: 15px;
        }

        .form-horizontal .control-label {
            text-align: left;
            font-weight: bold;
            font-size: 14px;
            color: #333333;
        }

        .form-horizontal .form-control {
            width: 80%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            transition: border-color 0.3s;
        }

        .form-horizontal .form-control:focus {
            border-color: #ff4e50;
            box-shadow: 0 0 5px rgba(255, 78, 80, 0.5);
        }

        .btn-success {
            background-color: #ff4e50 !important;
            border-color: #ff4e50 !important;
           
            transition: background-color 0.3s, border-color 0.3s;
            font-size: 14px;
            padding: 8px 16px;
        }

        .btn-success:hover {
            background-color: #e55039 !important;
            border-color: #ff4e50 !important;
           
        }

        .has-error .form-control {
            border-color: #ff4e50;
        }

        .has-error .control-label {
            color: #ff4e50;
        }

        .text-red {
            color: #ff4e50;
        }
    </style>
</head>
<body>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><i class="fa fa-sitemap"></i> ADD CLASS</h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        <div class="box-body">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <form class="form-horizontal" role="form" method="post">
                        <div class="form-group <?= form_error('classes') ? 'has-error' : '' ?>">
                            <label for="classes" class="col-sm-2 control-label">
                                <?=$this->lang->line("classes_name")?> <span class="text-red">*</span>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="classes" name="classes" value="<?=set_value('classes')?>" >
                            </div>
                            <span class="col-sm-2 control-label">
                                <?php echo form_error('classes'); ?>
                            </span>
                        </div>

                        <div class="form-group <?= form_error('classes_numeric') ? 'has-error' : '' ?>">
                            <label for="classes_numeric" class="col-sm-2 control-label">
                                <?=$this->lang->line("classes_numeric")?> <span class="text-red">*</span>
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="classes_numeric" name="classes_numeric" value="<?=set_value('classes_numeric')?>" >
                            </div>
                            <span class="col-sm-2 control-label">
                                <?php echo form_error('classes_numeric'); ?>
                            </span>
                        </div>

                        <div class="form-group <?= form_error('note') ? 'has-error' : '' ?>">
                            <label for="note" class="col-sm-2 control-label">
                                <?=$this->lang->line("classes_note")?>
                            </label>
                            <div class="col-sm-8">
                                <textarea class="form-control" style="resize:none;" id="note" name="note"><?=set_value('note')?></textarea>
                            </div>
                            <span class="col-sm-2 control-label">
                                <?php echo form_error('note'); ?>
                            </span>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2 text-center">
                                <input type="submit" class="btn btn-success" value="<?=$this->lang->line("add_class")?>" >
                            </div>
                        </div>
                    </form>
                    <?php if ($siteinfos->note==1) { ?>
                        <div class="callout callout-danger">
                            <p><b>Note:</b> Create a teacher before creating a new class.</p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        $( ".select2" ).select2( { placeholder: "", maximumSelectionSize: 6 } );
    </script>
</body>
</html>
