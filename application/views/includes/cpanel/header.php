<!-- BEGIN HEADER -->
<div class="page-header wsmenucontainer clearfix">
<div class="wsmenucontent overlapblackbg"></div>
    <!-- BEGIN HEADER TOP -->

    <div class="page-header-top">
        <div class="<?php echo $layoutClass ?>"></div>
        <div class="logo_left_side"></div>
        <div class="<?php echo $layoutClass ?>">
            <!-- BEGIN LOGO -->

            <div class="page-logo">
                <?php
                    $site_logo = base_url().'assets/img/logo-akaud.png';
                    if(!empty($variables2->logo)){
                        $site_logo = $variables2->logo;
                    }
                ?>
                <a href="<?php echo base_url() ?>"><img src="<?php echo $site_logo; ?>" alt="logo" class="logo-default"></a>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler"></a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu top-menu_first visible-xs visible-sm">
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                        <a href="http://blog.akaud.com/" target="_blank" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="fa fa-question"></i>
                        </a>
                    </li>
                    <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                        <a href="<?php echo base_url() ?>Messaging/" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-bell"></i>
                            <span class="badge badge-default count count_new_messages" style="display: none;"><?php echo @$notificationCount; ?></span>
                        </a>
                    </li>
                    <!-- END NOTIFICATION DROPDOWN -->
                    <!-- BEGIN TODO DROPDOWN -->
                    <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                        <a href="<?php echo base_url() ?>tasks" onclick="window.location='<?php echo base_url() ?>tasks'" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-calendar"></i>
                            <span class="badge badge-default count"><?php echo @$undoneTasksCount; ?></span>
                        </a>
                    </li>
                    <!-- END TODO DROPDOWN -->
                    <li class="droddown dropdown-separator">
                        <span class="separator"></span>
                    </li>

                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown dropdown-user dropdown_user_name ">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" class="img-circle" src="<?php echo !empty($profileFoto['imageUrl']) ? $profileFoto['imageUrl'] :  base_url()."assets/img/dummy-image.jpg" ?>">
                            <span class="username username-hide-mobile"><?php echo @$profileFoto['USUARIO']; ?></span>

                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="<?php echo  base_url() ?>advancedSettings">
                                    <i class="icon-user"></i>
                                    <?php echo $this->lang->line('menu_advanced_settings'); ?>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo  base_url() ?>tasks">
                                    <i class="fa fa-calendar"></i>
                                    <?php echo $this->lang->line('menu_calendar'); ?>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo  base_url() ?>messaging">
                                    <i class="fa fa-inbox"></i>
                                    <?php echo $this->lang->line('menu_inbox'); ?>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo  base_url() ?>tasks">
                                    <i class="fa fa-tasks"></i>
                                    <?php echo $this->lang->line('menu_tasks'); ?>
                                </a>
                            </li>
                            <?php if($postWriter != 0){ ?>
                                <li>
                                    <a href="<?php echo base_url() ?>blog/write/">
                                        <i class="icon-key"></i>
                                        <?php echo $this->lang->line('menu_blogWrite'); ?>
                                    </a>
                                </li>
                            <?php } ?>
                            <li class="divider">
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>auth/logout/">
                                    <i class="icon-logout"></i>
                                    <?php echo $this->lang->line('menu_logout'); ?>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                    <li class="dropdown dropdown-extended quick-sidebar-toggler">
                        <span class="sr-only">Toggle Quick Sidebar</span>
                        <i class="fa fa-cogs"></i>
                    </li>
                </ul>
            </div>
<!--            <div class="redd_inner">-->
<!--                <div class="redd">-->

            <div class="page-header-menu">

                <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
                <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
                <?php
                // echo '<pre>';
                $menuJSON = file_get_contents(base_url().'app/'.$menu_json_name.'.json');
                $menus = json_decode($menuJSON);
                ?>
                <nav class="hor-menu">
                    <ul class="nav navbar-nav">
                        <?php
                        foreach ($menus as  $menu) {
                            if($menu->subMenu != null){
                                if($menu->megamenu=="megamenu"){ ?>
                                    <li class="menu-dropdown mega-menu-dropdown active mega-menu-full <?php if($page == $menu->menuItem){?> active <?php } ?>">
                                    <a href="<?php echo base_url().$menu->link ?>"><?php echo (!empty($menu->langLine))?($this->lang->line($menu->langLine)):$menu->menuItem;  ?> <span class="arrow"></span></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="mega-menu-content">
                                                <div class="row">
                                                    <?php $count= count($menu->subMenu);?>
                                                    <?php foreach ($menu->subMenu as $key=> $subMenu) {
                                                    echo ($key==0||$key%5==0)?'<div class="col-md-3"><ul class="mega-menu-submenu">':"";
                                                    ?>
                                        <li>
                                            <a href="<?php echo base_url().$subMenu->link ?>">
                                                <?php echo (!empty($subMenu->icon))?'<i class="'.$subMenu->icon.'"></i>':"";?>
                                                <?php echo !empty($subMenu->langLine)?($this->lang->line($subMenu->langLine)):$subMenu->menuItem;  ?></a>
                                        </li>
                                        <?php
                                        echo ($key%5==4||$key==($count-1))?"</ul></div>":"";
                                        } ?>
                                        </div>
                                        </div>
                                    </li>
                                    </ul>
                                <?php }elseif($menu->megamenu=="submenu"){?>
                                <li class="menu-dropdown classic-menu-dropdown <?php if($page == $menu->menuItem){?> active <?php } ?>">
                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">  <?php echo (!empty($menu->langLine))?($this->lang->line($menu->langLine)):$menu->menuItem;  ?>  <span class="visible-xs visible-sm caret"></span></a>
                                    <ul  class="dropdown-menu pull-left">
                                        <?php foreach ($menu->subMenu as $subMenu) {?>
                                            <li class=" <?php echo isset($subMenu->subMenu) && !empty($subMenu->subMenu) ? 'dropdown-submenu':'' ?>">
                                                <a href="<?php echo base_url().$subMenu->link ?>" >
                                                    <?php echo (!empty($subMenu->icon))?'<i class="'.$subMenu->icon.'"></i>':"";?>
                                                    <?php echo !empty($subMenu->langLine)?($this->lang->line($subMenu->langLine)):$subMenu->menuItem;  ?>
                                                </a>
                                         <?php if(isset($subMenu->subMenu) && !empty($subMenu->subMenu)) { ?>
                                                <ul  class="dropdown-menu pull-left">
                                                    <?php foreach ($subMenu->subMenu as $sub_2menu) {?>                                                        
                                                        <li>
                                                            <a href="<?php echo base_url().$sub_2menu->link ?>" >
                                                                <?php echo (!empty($sub_2menu->icon))?'<i class="'.$sub_2menu->icon.'"></i>':"";?>
                                                                <?php echo !empty($sub_2menu->langLine)?($this->lang->line($sub_2menu->langLine)):$sub_2menu->menuItem;  ?>
                                                            </a>
                                                        </li>
                                                        <?php
                                                    } ?>
                                                </ul>
                                                <?php } ?>
                                            </li>
                                            <?php
                                        } ?>
                                    </ul>
                                    <?php }
                                    }else{ ?>
                                <li class="<?php if($page == $menu->menuItem){?> active <?php } ?>">
                                    <a href="<?php echo base_url().$menu->link ?>"><?php echo (!empty($menu->langLine))?($this->lang->line($menu->langLine)):$menu->menuItem;  ?></a>
                                    <?php }?>
                                </li>
                        <?php }?>
                    </ul>
                </nav>
        <!-- END MEGA MENU -->

         </div>





            <div class="top-menu hidden-xs hidden-sm">
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <li class="dropdown dropdown-extended  dropdown-notification" id="header_notification_bar">
                        <a href="http://blog.akaud.com/" target="_blank" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="fa fa-question"></i>
                        </a>
                    </li>
                    <li class="dropdown dropdown-extended  dropdown-notification" id="header_notification_bar">
                        <a href="<?php echo base_url() ?>Messaging/" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-bell"></i>
                            <span class="badge badge-default count count_new_messages" style="display: none;"><?php echo @$notificationCount; ?></span>
                        </a>
                    </li>
                    <!-- END NOTIFICATION DROPDOWN -->
                    <!-- BEGIN TODO DROPDOWN -->
                    <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                        <a href="<?php echo base_url() ?>tasks" onclick="window.location='<?php echo base_url() ?>tasks'" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-calendar"></i>
                            <span class="badge badge-default count"><?php echo @$undoneTasksCount; ?></span>
                        </a>
                    </li>
                    <!-- END TODO DROPDOWN -->
                    <li class="droddown dropdown-separator">
                        <span class="separator"></span>
                    </li>

                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown dropdown-user dropdown_user_name ">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" class="img-circle" src="<?php echo !empty($profileFoto['imageUrl']) ? $profileFoto['imageUrl'] :  base_url()."assets/img/dummy-image.jpg" ?>">
                            <span class="username username-hide-mobile"><?php echo @$profileFoto['USUARIO']; ?></span>

                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="<?php echo  base_url() ?>advancedSettings">
                                    <i class="icon-user"></i>
                                    <?php echo $this->lang->line('menu_advanced_settings'); ?>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo  base_url() ?>tasks">
                                    <i class="fa fa-calendar"></i>
                                    <?php echo $this->lang->line('menu_calendar'); ?>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo  base_url() ?>messaging">
                                    <i class="fa fa-inbox"></i>
                                    <?php echo $this->lang->line('menu_inbox'); ?>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo  base_url() ?>tasks">
                                    <i class="fa fa-tasks"></i>
                                    <?php echo $this->lang->line('menu_tasks'); ?>
                                </a>
                            </li>
                            <?php if($postWriter != 0){ ?>
                                <li>
                                    <a href="<?php echo base_url() ?>blog/write/">
                                        <i class="icon-key"></i>
                                        <?php echo $this->lang->line('menu_blogWrite'); ?>
                                    </a>
                                </li>
                                <?php } ?>
                                    <li class="divider">
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url() ?>auth/logout/">
                                            <i class="icon-logout"></i>
                                            <?php echo $this->lang->line('menu_logout'); ?>
                                        </a>
                                    </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                    <li class="dropdown dropdown-extended quick-sidebar-toggler">
                        <span class="sr-only">Toggle Quick Sidebar</span>
                        <a href="javascript:;" class="dropdown-toggle template_settings_icon" class="dropdown dropdown-user dropdown_user_name">
                        <i class="fa fa-cogs"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
<!--</div>-->
<!--</div>-->
    </div>
    <div class="msg_list_temp" style="display:none;">
        <li>
            <a href="<?php echo base_url() ?>Messaging/">
                <span class="photo">
            <img src="<?php echo base_url() ?>assets/img/dummy-image.jpg" class="img-circle" alt="">
            </span>
                <span class="subject">
            <span class="from">
            Lisa Wong </span>
                <span class="time">Just Now </span>
                </span>
                <span class="message">
            Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
            </a>
        </li>
    </div>
    <!-- END HEADER TOP -->

</div>
<!-- END HEADER -->

<?php $remaining_days = $this->session->userdata('remaining_days');
$remaining_days_show = $this->session->userdata('remaining_days_show');?>

<?php if($remaining_days !== null){ ?>
    <div class="free_trial_note free_trial_note_min visible-sm visible-xs">
        <div id="free_trial_toast-container_min" class="toast-top-center" aria-live="polite" role="alert">
            <div class="toast toast-error">
                <?php if($remaining_days <= 0){ ?>
                    <div class="toast-message"><?php echo $this->lang->line('account_in_free_plan'); ?>  <a href="<?php echo base_url() ?>/subscription-plans" type="button" class="btn btn-sm btn-outline white "><?php echo $this->lang->line('account_upgrade_now'); ?></a></div>
                <?php }else{?>
                    <div class="toast-message"><?php echo $this->lang->line('remaining_days_to_trial'); ?> <strong> <?php echo $remaining_days; ?> </strong> <a href="<?php echo base_url() ?>/subscription-plans" type="button" class="btn btn-sm btn-outline white "><?php echo $this->lang->line('account_upgrade_now'); ?></a></div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
<!-- BEGIN QUICK SIDEBAR -->
<a href="javascript:;" class="page-quick-sidebar-toggler"><i class="icon-login"></i></a>
<div class="page-quick-sidebar-wrapper">
    <div class="page-quick-sidebar">
        <div class="nav-justified">
            <h3 class="list-heading"><?php echo $this->lang->line('header_sidebarHeading'); ?></h3>
            <ul class="list-items borderless">
                <li>
                    <label class="control-label">
                        <?php echo $this->lang->line('header_languagePlaceholder'); ?>
                    </label>
                    <select class="form-control admin_languageChange">
                        <option value="english" <?php if($lang=='english' ){?>selected
                            <?php } ?>>English</option>}
                        <option value="spanish" <?php if($lang=='spanish' ){?>selected
                            <?php } ?>>Spanish</option>}
                    </select>
                    <div class="waitplz" style="display:none;">
                        <?php echo $this->lang->line('header_pleaseWait') ?>
                    </div>
                </li>
<!--               icon-login-->
                <li>
                    <label class="control-label">
                        <?php echo $this->lang->line('header_FormatPlaceholder'); ?>
                    </label>
                    <select class="form-control admin_layoutFormatChange">
                        <option value="fluid" <?php if($layoutFormat=='fluid' ){ ?>selected
                            <?php } ?>>Fluid</option>
                        <option value="boxed" <?php if($layoutFormat=='boxed' ){?>selected
                            <?php } ?>>Boxed</option>
                    </select>
                    <div class="waitplz" style="display:none;">
                        <?php echo $this->lang->line('header_pleaseWait') ?>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- END QUICK SIDEBAR -->

<div class="page-header-top">
    <div class="container flash_msg">
<!--        <div class="row" id="alert_msg"></div>-->
        <div class="row">
            <?php if ($this->session->has_userdata('success')) { ?>
                <div class="col-xs-12  col-centered vcenter ">

                    <div class="alert alert-success fade in" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                </div>
            <?php } ?>
            <?php if ($this->session->has_userdata('errors')) { ?>
                <div class="col-xs-12 col-centered vcenter ">
                    <div class="alert alert-danger fade in" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?php
                        $flash_errors = $this->session->flashdata('errors');
                        foreach ($flash_errors as $flash_error) {
                            echo $flash_error . "<br />";
                        }
                        ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php if($remaining_days !== null){ ?>
    <div class="free_trial_note hidden-sm hidden-xs">
        <div id="free_trial_toast-container" class="toast-top-center" aria-live="polite" role="alert">
            <div class="toast toast-error">
                <?php if($remaining_days <= 0){ ?>
                    <div class="toast-message"><?php echo $this->lang->line('account_in_free_plan'); ?>  <a href="<?php echo base_url() ?>/subscription-plans" type="button" class="btn btn-sm btn-outline white "><?php echo $this->lang->line('account_upgrade_now'); ?></a></div>

                <?php }else{?>
                    <div class="toast-message"><?php echo $this->lang->line('remaining_days_to_trial'); ?> <strong> <?php echo $remaining_days; ?> </strong> <a href="<?php echo base_url() ?>/subscription-plans" type="button" class="btn btn-sm btn-outline white "><?php echo $this->lang->line('account_upgrade_now'); ?></a></div>

                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>