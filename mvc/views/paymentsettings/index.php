<div class="card">
    <div class="card-header">
        <h3 class="card-title"><i class="fa icon-paymentsettings"></i> <?=$this->lang->line('panel_title')?></h3>       
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="breadcrumb-item active"><?=$this->lang->line('menu_paymentsettings')?></li>
        </ol>
    </div><!-- /.card-header -->
    
    <!-- Form start -->
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">

                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs" role="tablist">
                        <?php if(inicompute($payment_gateways)) {
                            $i = 0;
                            foreach ($payment_gateways as $payment_gateway) { ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if($i == 0) echo 'active'; ?>" data-bs-toggle="tab" href="#payment-gateway<?=$payment_gateway->id?>" aria-expanded="true">
                                        <?=$payment_gateway->name?>
                                    </a>
                                </li>
                        <?php $i++; } } ?>
                    </ul>

                    <div class="tab-content">
                        <?php if(inicompute($payment_gateways)) {
                            $i = 0;
                            foreach ($payment_gateways as $payment_gateway) { ?>
                                <div class="tab-pane fade <?=($i==0) ? 'show active' : ''?>" id="payment-gateway<?=$payment_gateway->id?>" role="tabpanel">
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <form method="POST">
                                                <input type="hidden" value="<?=$payment_gateway->slug?>" name="payment_type">
                                                <?php if(isset($payment_gateway_options[$payment_gateway->id]) && inicompute($payment_gateway_options[$payment_gateway->id])) {
                                                    $options = $payment_gateway_options[$payment_gateway->id];
                                                    foreach ($options as $option) {
                                                        $optionLang = $option->payment_option;
                                                        if($option->type == 'text') { ?>
                                                            <div class="mb-3 row <?=form_error($option->payment_option) ? 'text-danger' : ''?>">
                                                                <label for="<?=$option->payment_option?>" class="col-sm-2 col-form-label">
                                                                    <?=$this->lang->line($optionLang)?> 
                                                                    <span class="text-danger">*</span>
                                                                </label>
                                                                <div class="col-sm-5">
                                                                    <input type="text" class="form-control <?=form_error($option->payment_option) ? 'is-invalid' : ''?>" id="<?=$option->payment_option?>" name="<?=$option->payment_option?>" value="<?=set_value($option->payment_option, $option->payment_value)?>">
                                                                </div>
                                                                <span class="col-sm-5 text-danger">
                                                                    <?=form_error($option->payment_option)?>
                                                                </span>
                                                            </div>
                                                        <?php } else if($option->type == 'select') { 
                                                            $activityArr = json_decode($option->activities, true); 
                                                            if(inicompute($activityArr)) { ?>
                                                                <div class="mb-3 row <?=form_error($option->payment_option) ? 'text-danger' : ''?>">
                                                                    <label class="col-sm-2 col-form-label" for="<?=$option->payment_option?>">
                                                                        <?=$this->lang->line($optionLang)?> 
                                                                        <span class="text-danger">*</span>
                                                                    </label>
                                                                    <div class="col-sm-5">
                                                                        <select class="form-select" name="<?=$option->payment_option?>" id="<?=$option->payment_option?>">
                                                                            <?php
                                                                            foreach($activityArr as $key => $select) {
                                                                                $optionSelected = '';
                                                                                if(!set_value($option->payment_option)) {
                                                                                    if($option->payment_value == $key) {
                                                                                        $optionSelected = 'selected';
                                                                                    }
                                                                                }
                                                                                else {
                                                                                    $optionSelected = 'selected';
                                                                                }

                                                                                echo '<option value="' . $key . '" ' . $optionSelected . '>' . $select . '</option>';
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <span class="col-sm-5 text-danger">
                                                                        <?=form_error($option->payment_option)?>
                                                                    </span>
                                                                </div>
                                                    <?php } } } } ?>
                                                
                                                    <div class="mb-3 row">
                                                        <div class="col-sm-offset-2 col-sm-8">
                                                            <input type="submit" class="btn btn-success" value="Save">
                                                        </div>
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        <?php $i++; } } ?>
                    </div>
                </div> <!-- nav-tabs-custom -->

            </div>
        </div><!-- row -->
    </div><!-- /.card-body -->
</div><!-- /.card -->
