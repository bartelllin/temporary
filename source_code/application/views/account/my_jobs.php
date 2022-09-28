<?
// Banner heading
$this->load->view('widgets/inner_banner');
// Banner section
?>
<div class="white-space-15"></div>

<!--Inner Start-->
<div class="line-bottom">
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
                    <section id="login">
                        <div class="container">
                            <div class="inner">
                                <div class="row">
                                    <div class="col-xs-12 inner-sec">
                                        <div class="form-wrap">

                                            <? //$this->load->view("account/header"); ?>
                                            <!--login-banner-->

                                            <div class="signup myfont">

                                                <div class="" id='goTo'>
                                                    <!-- BEGIN SIDEBAR & CONTENT -->
                                                    <div class="row margin-bottom-40">
                                                        <!-- BEGIN SIDEBAR -->
                                                        <? $this->load->view("account/menu"); ?>
                                                        <!-- END SIDEBAR -->

                                                        <!-- BEGIN CONTENT -->
                                                        <div class="col-md-9 col-sm-7">

                                                            <div class="content-page">

                                                                <div class="row">
                                                                    <table id="example" class="display" cellspacing="0" width="100%">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>ID</th>
                                                                            <th>Company</th>
                                                                            <th>Job Title</th>
                                                                            <th>Created</th>
                                                                            <th>More</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?
                                                                        if(array_filled($data)){
                                                                            foreach($data as $key=>$value):?>
                                                                                <tr>
                                                                                    <td><?=$value['job_id']?></td>
                                                                                    <td><?=$value['company_name']?></td>
                                                                                    <td><?=$value['job_name']?></td>
                                                                                    <td><?=$value['my_job_createdon']?></td>
                                                                                    <td>
                                                                                        <a href="<?=g('base_url'). 'job/show/' . $value['job_id']?>" target="_blank"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
                                                                                        <a href="javascript:void(0)" class="remove_job" data-id="<?=string_encrypt($value['my_job_id'])?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                                                                    </td>
                                                                                </tr>
                                                                            <? endforeach;
                                                                        }
                                                                        ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <!-- END CONTENT -->
                                                    </div>
                                                    <!-- END SIDEBAR & CONTENT -->
                                                </div>

                                            </div>
                                            <!--Signup-->
                                        </div>
                                    </div>
                                    <!-- /.col-xs-12 -->
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.container -->
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        // Save job start
        $("#submitInfo").click(function () {
            var data = $("#saveForm").serialize();
            var url = $("#saveForm").attr("action");
            var response = AjaxRequest.fire(url, data);
            // success
            if (response.status) {
                location.reload();
            }
            return false;
        });
        // Save job end

        // Init datatables
        $('#example').DataTable();
    });
</script>
<script type="text/javascript">
    // Save job start
    $(".remove_job").click(function () {
        var id= $(this).attr('data-id');
        var data = {id: id};
        var url = base_url + 'job/remove-my-job';

        var response = AjaxRequest.fire(url, data);
        // success
        if (response.status) {
            location.reload();
        }
        return false;
    });
</script>