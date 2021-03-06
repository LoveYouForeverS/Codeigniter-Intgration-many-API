<div class="page-footer">
	<div class="footer">
		<div class="<?php echo $layoutClass ?>">
			<div class="row">
				<div class="col-xs-12 private_terms_section_min"><p><a class="terms_use"><?php echo $this->lang->line('footer_terms_use'); ?></a> <a class="private_police margin-left-20"><?php echo $this->lang->line('footer_private_policy'); ?></a></p></div>
				<div class="col-xs-6 copyrights_section"><p class="all_rights_reserved"><i class="fa fa-copyright" aria-hidden="true"></i> AKAUD 2016  <?php echo $this->lang->line('footer_reserved_rights'); ?></p></div>
				<div class="col-xs-6 private_terms_section"><p class="text-right"><a href="#" type="button" data-type="terms" class="terms_use terms_private"><?php echo $this->lang->line('footer_terms_use'); ?></a> <a href="#" data-type="private" class="private_police margin-left-20 terms_private"><?php echo $this->lang->line('footer_private_policy'); ?></a></p></div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	var base_url = '<?php echo base_url() ?>';
</script>
<!-- END FOOTER -->
<!--[if lt IE 9]>
<script src="<?php echo base_url() ?>assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url() ?>assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="<?php echo base_url() ?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/global/plugins/jquery-migrate-1.4.1.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/global/plugins/jquery-ui/ui/i18n/datepicker-es.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/global/plugins/fancybox/source/jquery.fancybox.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->


<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url() ?>assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/vendors/Buttons-1.0.3/js/dataTables.buttons.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/vendors/Buttons-1.0.3/js/buttons.bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/vendors/Buttons-1.0.3/js/buttons.colVis.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/vendors/Buttons-1.0.3/js/buttons.flash.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/vendors/Buttons-1.0.3/js/buttons.html5.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/vendors/Buttons-1.0.3/js/buttons.print.js"></script>

<script src="<?php echo base_url() ?>assets/vendors/sweet/sweetalert.min.js" type="text/javascript" ></script>

<!--<script src="--><?php //echo base_url() ?><!--assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>-->

<script src="<?php echo base_url() ?>assets/global/plugins/moment.min.js"></script>

<script src="<?php echo base_url() ?>assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src='<?php echo base_url() ?>assets/global/plugins/fullcalendar/lang-all.js'></script>
<script src="<?php echo base_url() ?>assets/admin/pages/scripts/calendar.js"></script>

<script src="<?php echo base_url(); ?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.form.js"></script>

<script src="<?php echo base_url(); ?>assets/admin/pages/scripts/login.js" type="text/javascript"></script>

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<!--<script src="--><?php //echo base_url() ?><!--assets/global/scripts/app.min.js" type="text/javascript"></script>-->
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url() ?>assets/pages/scripts/table-datatables-editable.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="<?php echo base_url() ?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url() ?>assets/quick-sidebar.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->


<script type="text/javascript" src="<?php echo base_url(); ?>app/js/app.js"></script>
<script type="text/javascript">
	QuickSidebar.init();
</script>

<?php $this->load->view("includes/partials/offlineView"); ?>

<!--added by controller-->
<?php $this->load->view('layouts/partials/footer'); ?>
<!--added by controller-->