
<div class="box">
    <div class="box-header">

        <h3 class="box-title"><i class="fa fa-sitemap"></i> <?=$this->lang->line('category')?></h3>

       
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
                <form class="form-horizontal" role="form" method="post">

                    <?php 
                        if(form_error('category_name')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        
                        <label for="category_name" class="col-sm-2 control-label">
                            <?=$this->lang->line("category_name")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="category_name" name="category_name" value="<?=set_value('category_name', $category[0]['category_name']);?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('category_name'); ?>
                        </span>
                    </div>

                   
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input id="updateclass" type="submit" class="btn btn-success" value="<?=$this->lang->line("update_category")?>" >
                        </div>
                    </div>

                </form>
            </div>    
        </div>
    </div>
</div>


<script>
$( ".select2" ).select2( { placeholder: "", maximumSelectionSize: 6 } );
</script>

