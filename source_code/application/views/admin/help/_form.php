<? global $config;
$model_heads = explode(",", $dt_params['dt_headings']);
?>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-shopping-cart"></i><?= humanize($class_name) ?>
                    <small>Add Details to <?= humanize($class_name) ?></small>

                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse">
                    </a>
                    <a href="#portlet-config" data-toggle="modal" class="config">
                    </a>
                    <a href="javascript:;" class="reload">
                    </a>
                    <a href="javascript:;" class="remove">
                    </a>
                </div>
            </div>
            <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <? //$this->load->view("admin/widget/form_generator");?>
                <form class="cmxform form-horizontal tasi-form" id="help-form-id" method="POST" action=""
                      enctype="multipart/form-data" novalidate="novalidate">
                    <div class="form-body">

                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button>
                            You have some form errors. Please check below.
                        </div>
                        <div class="alert alert-success display-hide">
                            <button class="close" data-close="alert"></button>
                            Your form validation is successful!
                        </div>

                        <input class=" form-control " id="help-help_id" name="help[help_id]" type="hidden"
                               value="<?=(array_filled($form_data))?$form_data['help']['help_id']:''?>">

                        <div class="form-group ">
                            <label class="control-label col-md-2 ">
                                Name<span class="required">* </span>
                            </label>

                            <div class="col-md-3">
                                <input class=" form-control " id="help-help_name" name="help[help_name]"
                                       type="text" value="<?=(array_filled($form_data))?$form_data['help']['help_name']:set_value('help[help_name]')?>">


                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-md-2 ">
                                Description<span class="required">* </span>
                            </label>

                            <div class="col-md-9">
                                <textarea class="form-control " id="help-help_description" rows="3"
                                          name="help[help_description]"><?=(array_filled($form_data))?$form_data['help']['help_description']:set_value('help[help_description]')?></textarea>


                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-md-2 ">
                                Icon<span class="required">* </span>
                            </label>

                            <div class="col-md-3">
                                <select name="help[help_icon]" class="form-control" id="icon-dropdown-custom" tabindex="-1">
                                    <option value="">SELECT</option>
                                    <?
                                    $icons_list = $this->model_icon->get_icon_list();
                                    foreach($icons_list as $key=>$value):?>
                                        <option value="<?=$value['icon_name']?>" class="form-control" <?=(array_filled($form_data))? ($form_data['help']['help_icon']==$value['icon_name'])? 'selected':'' :''?>><?=ucfirst(str_replace(array('fa-', '-'),array(""," "),$value['icon_name']))?></option>
                                    <?endforeach;
                                    ?>
                                </select>

                            </div>
                            <div class="col-md-2">
                                <i class="<?=(array_filled($form_data))?'fa ' . $form_data['help']['help_icon']:''?>" id="icon-preview" aria-hidden="true" style="margin-top: 7px;"></i>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-md-2 ">
                                Button Text<span class="required">* </span>
                            </label>

                            <div class="col-md-3">
                                <input class=" form-control " id="help-help_button_text" name="help[help_btn_text]"
                                       type="text" value="<?=(array_filled($form_data))?$form_data['help']['help_btn_text']:set_value('help[help_btn_text]')?>">


                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-md-2 ">
                                URL<span class="required">* </span>
                            </label>

                            <div class="col-md-3">
                                <input class=" form-control " id="help-help_url" name="help[help_url]"
                                       type="text" value="<?=(array_filled($form_data))?$form_data['help']['help_url']:set_value('help[help_url]')?>">


                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-md-2 ">
                                Status?
                            </label>

                            <div class="col-md-3">
                                <div class="">
                                    <input type="checkbox" value="<?=(array_filled($form_data))? ($form_data['help']['help_status'])? '1':'0' :''?>" name="help[help_status]" id="switch-btn-custom" class="make-switch" <?=(array_filled($form_data))? ($form_data['help']['help_status'])? 'checked':'' :''?> >
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" name="submit" value="Save" class="btn green">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
            <!-- END VALIDATION STATES-->
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        Metronic.init(); // init metronic core components
        QuickSidebar.init(); // init quick sidebar
        Demo.init(); // init demo features
        UIAlertDialogApi.init(); //UI Alert API
        <?if(isset($error))
            echo "AdminToastr.error('".str_replace("\n","",validation_errors('<div>', '</div></br>'))."');";
        ?>
    });

    $('#icon-dropdown-custom').on('change',function(){
        // Get icon name
        var icon_name = 'fa ' + $(this).val();
        // Remove and add icon class
        $('#icon-preview').removeClass().addClass(icon_name);
    });

    $('body').on('click','.bootstrap-switch',function(){
       var get_class = $(this);

        if(get_class.hasClass('bootstrap-switch-on')){
            $('#switch-btn-custom').attr('checked',true);
            $('#switch-btn-custom').val('1');
        }
        else{
            $('#switch-btn-custom').attr('checked',false);
            $('#switch-btn-custom').val('0');
        }
    });

    // On switch
    /*$('body').on('click','.bootstrap-switch-primary',function(){
        $('#switch-btn-custom').attr('checked',false);
    });

    // Off switch
    $('body').on('click','.bootstrap-switch-default',function(){
        $('#switch-btn-custom').attr('checked',true);
    });*/

</script>

