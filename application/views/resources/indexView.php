<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <div class="<?php echo $layoutClass ?>">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1><?php echo $this->lang->line('menu_account'); ?></h1>
            </div>
            <!-- END PAGE TITLE -->
        </div>
    </div>
    <!-- END PAGE HEAD -->
    <ul class="<?php echo $layoutClass ?> page-breadcrumb breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li class="active">
            <?php echo $this->lang->line('resources'); ?>
        </li>
    </ul>
    <!-- BEGIN PAGE CONTENT -->
    <div class="table_loading"></div>
    <div class="page-content">
        <div class="<?php echo $layoutClass ?>">
            <!-- BEGIN PAGE CONTENT INNER -->
            <div class="portlet light text-center">

                <div class="portlet box sections green" >
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i> <?php echo $this->lang->line('classroom_description'); ?></div>
                    </div>
                    <div class="portlet-body">

                        <div class="tabbable-line">
                            <ul class="nav nav-tabs ">
                                <li class="active">
                                    <a href="#tab_1" data-toggle="tab"
                                       aria-expanded="true"> <?php echo $this->lang->line('resources'); ?> </a>
                                </li>
                                <li class="">
                                    <a href="#tab_2" data-toggle="tab"
                                       aria-expanded="false"> <?php echo $this->lang->line('templates'); ?></a>
                                </li>
                                <li class="">
                                    <a href="#tab_3" id="documentsTab" data-toggle="tab"
                                       aria-expanded="false"> <?php echo $this->lang->line('groups') ?> </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tools">
                                </div>
                                <div class="tab-pane active student_sub_tab" id="tab_1">

                                </div>
                                <div class="tab-pane" id="tab_2">

                                </div>
                                <div class="tab-pane" id="tab_3">

                                </div>



                            </div>

                        </div>
                    </div>





                    <div class="clearfix"></div>

                </div>
                <!-- END PAGE CONTENT INNER -->
            </div>
            <!-- BEGIN QUICK SIDEBAR -->
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END PAGE CONTENT -->
    </div>
    <!-- END PAGE CONTAINER -->
    <script>


    </script>