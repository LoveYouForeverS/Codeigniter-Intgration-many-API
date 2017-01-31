<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
    <?php $this->load->view("includes/campus/head"); ?>
<!--    --><?php //$this->load->view('layouts/partials/header'); ?>
</head>
<body class="page-md  <?php echo $page . ' '. $lang_class; ?>">
    <?php $this->load->view("includes/campus/header"); ?>
<!-- Page Content -->
    <?php echo $content_for_layout; ?>
<!-- /.container -->
<div class="scroll-to-top"><i class="icon-arrow-up"></i></div>
<!-- Page Footer -->
<?php $this->load->view("includes/campus/footer"); ?>
<!-- Page Footer end-->
<?php //$this->load->view('layouts/partials/footer'); ?>
</body>
</html>