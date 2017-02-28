<?php
/* Smarty version 3.1.30, created on 2017-02-27 20:28:03
  from "C:\xampp\htdocs\MinhSang94.github.io\Misa_FW\app\admin\view\templates\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58b42963080618_47864264',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fb275a46da9195aa7d301b01af335f369d89bb3f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MinhSang94.github.io\\Misa_FW\\app\\admin\\view\\templates\\index.tpl',
      1 => 1488202078,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b42963080618_47864264 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8" />
	<title>Quản trị hệt thống</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link href="public/admin/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="public/admin/assets/css/metro.css" rel="stylesheet" />
	<link href="public/admin/assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
	<link href="public/admin/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link href="public/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link href="public/admin/assets/css/style.css" rel="stylesheet" />
	<link href="public/admin/assets/css/style_responsive.css" rel="stylesheet" />
	<link href="public/admin/assets/css/style_default.css" rel="stylesheet" id="style_color" />
	<link rel="stylesheet" type="text/css" href="public/admin/assets/bootstrap-datepicker/css/datepicker.css" />
	<link rel="shortcut icon" href="favicon.ico" />
	<?php echo '<script'; ?>
 src="public/admin/assets/js/jquery-1.8.3.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="public/admin/scripts/ckeditor/ckeditor.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="public/admin/scripts/ckeditor/config.js"><?php echo '</script'; ?>
>
</head>
<body class="fixed-top">
	<!-- BEGIN HEADER -->
	<div class="header navbar navbar-inverse navbar-fixed-top">
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="navbar-inner">
			<div class="container-fluid">
				<!-- BEGIN LOGO -->
				<a class="brand" href="quantri.php">
				     QUẢN TRỊ HỆ THỐNG
				</a>
				<!-- END LOGO -->
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
				<img src="assets/img/menu-toggler.png" alt="" />
				</a>
				<!-- END RESPONSIVE MENU TOGGLER -->
			</div>
		</div>
		<!-- END TOP NAVIGATION BAR -->
	</div>
	<!-- END HEADER -->
	<!-- BEGIN CONTAINER -->
	<div class="page-container row-fluid">
		<!-- BEGIN SIDEBAR -->
		<div class="page-sidebar nav-collapse collapse">
			<!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
			<div class="slide hide">
				<i class="icon-angle-left"></i>
			</div>
			<div class="clearfix"></div>
			<!-- END RESPONSIVE QUICK SEARCH FORM -->
			<!-- BEGIN SIDEBAR MENU -->
			<ul>
				<li class="">
					<a href="index.php">
					<i class="icon-home"></i> Bảng thông tin
					<span class="selected"></span>
					</a>
				</li>
				<li class="has-sub active">
					<a href="javascript:;" class=""><span class="selected"></span>
					<span class="arrow open"></span>
					Quản trị</a>
					<ul class="sub">
						<li class="active"><a href="quantri.php" class="">Quản lý</a></li>
					</ul>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
		<!-- END SIDEBAR -->
		<!-- BEGIN PAGE -->
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="portlet-config" class="modal hide">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button"></button>
					<h3>Portlet Settings</h3>
				</div>
				<div class="modal-body">
					<p>Here will be a configuration form</p>
				</div>
			</div>
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN PAGE TITLE & BREADCRUMB-->
						<h3 class="page-title">
							Quản lý thông tin khách hàng</h3>
						<ul class="breadcrumb">
							<li>
								<i class="icon-home"></i>
								<a href="index.php">Quản trị</a> 
								<span class="icon-angle-right"></span>
							</li>
							<li>Thông tin Khách hàng</li>
						</ul>
						<!-- END PAGE TITLE & BREADCRUMB-->
					</div>
				</div>
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN SAMPLE TABLE PORTLET-->
						<div class="portlet box red">
							<div class="portlet-title">
								<h4>Tin tức</h4>
							</div>
							<div class="portlet-body">
								<table class="table table-hover">
									<thead>
										<tr style="text-align:center;">
											<th>STT</th>
											<th>Username</th>
											<th>Password</th>
                                            <th>Email</th>
                                            <th>Insert By</th>
                                            <th>Insert At</th>
                                            <th>Update By</th>
											<th>Update At</th>
										</tr>
									</thead>
									<tbody>
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['usersInfo']->value, 'userInfo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['userInfo']->value) {
?>
										<tr style="text-align:center;">
											<th><?php echo $_smarty_tpl->tpl_vars['userInfo']->value->id;?>
</th>
											<th><?php echo $_smarty_tpl->tpl_vars['userInfo']->value->username;?>
</th>
											<th><?php echo $_smarty_tpl->tpl_vars['userInfo']->value->password;?>
</th>
                                            <th><?php echo $_smarty_tpl->tpl_vars['userInfo']->value->email;?>
</th>
                                            <th><?php echo $_smarty_tpl->tpl_vars['userInfo']->value->insertBy;?>
</th>
                                            <th><?php echo $_smarty_tpl->tpl_vars['userInfo']->value->insertAt;?>
</th>
                                            <th><?php echo $_smarty_tpl->tpl_vars['userInfo']->value->updateBy;?>
</th>
											<th><?php echo $_smarty_tpl->tpl_vars['userInfo']->value->updateAt;?>
</th>
										</tr>
									<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

									</tbody>
								</table>
							</div>
						</div>
						<!-- END SAMPLE TABLE PORTLET-->
					</div>
				</div>
				<!-- END PAGE CONTENT-->
			</div>
			<!-- END PAGE CONTAINER-->
		</div>
		<!-- END PAGE -->
	</div>
	<!-- END CONTAINER -->
	<!-- BEGIN FOOTER -->
	<div class="footer">
		2013 &copy; Mr. Nhiên. Giao diện quản trị.
		<div class="span pull-right">
			<span class="go-top"><i class="icon-angle-up"></i></span>
		</div>
	</div>
	<!-- END FOOTER -->
	<!-- BEGIN JAVASCRIPTS -->
	<!-- Load javascripts at bottom, this will reduce page load time -->
	<?php echo '<script'; ?>
 src="public/admin/assets/breakpoints/breakpoints.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="public/admin/assets/bootstrap/js/bootstrap.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="public/admin/assets/bootstrap/js/bootstrap-fileupload.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="public/admin/assets/js/jquery.blockui.js"><?php echo '</script'; ?>
>
	<!-- ie8 fixes -->
	<!--[if lt IE 9]>
	<?php echo '<script'; ?>
 src="assets/js/excanvas.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="assets/js/respond.js"><?php echo '</script'; ?>
>
	<![endif]-->
	<?php echo '<script'; ?>
 type="text/javascript" src="public/admin/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="public/admin/assets/bootstrap-daterangepicker/date.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="public/admin/assets/bootstrap-daterangepicker/daterangepicker.js"><?php echo '</script'; ?>
> 
	<?php echo '<script'; ?>
 type="text/javascript" src="public/admin/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="public/admin/assets/js/app.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
>
	  jQuery(document).ready(function() {
	     // initiate layout and plugins
	     App.init();
	  });
	<?php echo '</script'; ?>
>
</body>
<!-- END BODY -->
</html><?php }
}
