<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 3.3.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<?php
	include 'includes/head.php';
?>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-md login">
<div class="login_overlay"></div>
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="index.html">
		<img src="<?php echo base_url() ?>/assets/img/hader-logo.png" alt=""/>
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	<form class="login-form" action="/login/" method="post">
		<h3 class="form-title">Softaula CRM-ERP Online</h3>
		<div class="error_message alert alert-danger display-hide	">
			<button class="close" data-close="alert"></button>
			<span>
			Enter any username and password. </span>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Tu Clave de Acceso</label>
			<input class="form-control form-control-solid placeholder-no-fix key" type="text" autocomplete="off" placeholder="Tu Clave de Acceso" name="username"/>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Tu Usuario</label>
			<input class="form-control form-control-solid placeholder-no-fix username" type="text" autocomplete="off" placeholder="Tu Usuario" name="username"/>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Tu Contraseña</label>
			<input class="form-control form-control-solid placeholder-no-fix password" value="epsilonxxc" type="password" autocomplete="off" placeholder="Tu Contraseña" name="password"/>
		</div>
		<div class="form-actions">
			<button type="submit" class="btn btn-success uppercase">Acceder</button>
		</div>
	<!-- 		<div class="login-options">
				<h4>Or login with</h4>
				<ul class="social-icons">
					<li>
						<a class="social-icon-color facebook" data-original-title="facebook" href="javascript:;"></a>
					</li>
					<li>
						<a class="social-icon-color twitter" data-original-title="Twitter" href="javascript:;"></a>
					</li>
					<li>
						<a class="social-icon-color googleplus" data-original-title="Goole Plus" href="javascript:;"></a>
					</li>
					<li>
						<a class="social-icon-color linkedin" data-original-title="Linkedin" href="javascript:;"></a>
					</li>
				</ul>
			</div>
			<div class="create-account">
				<p>
					<a href="javascript:;" id="register-btn" class="uppercase">Create an account</a>
				</p>
			</div> -->
	</form>
	<!-- END LOGIN FORM -->
</div>

<?php
include 'includes/footer.php';
 ?>
<script>
jQuery(document).ready(function() {     
	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	Login.init();
	Demo.init();
	app.auth.login();
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>