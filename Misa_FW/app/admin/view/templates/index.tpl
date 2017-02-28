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
	<script src="public/admin/assets/js/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="public/admin/scripts/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="public/admin/scripts/ckeditor/config.js"></script>
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
									{foreach $usersInfo as $userInfo}
										<tr style="text-align:center;">
											<th>{$userInfo->id}</th>
											<th>{$userInfo->username}</th>
											<th>{$userInfo->password}</th>
                                            <th>{$userInfo->email}</th>
                                            <th>{$userInfo->insertBy}</th>
                                            <th>{$userInfo->insertAt}</th>
                                            <th>{$userInfo->updateBy}</th>
											<th>{$userInfo->updateAt}</th>
										</tr>
									{/foreach}
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
	<script src="public/admin/assets/breakpoints/breakpoints.js"></script>
	<script src="public/admin/assets/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="public/admin/assets/bootstrap/js/bootstrap-fileupload.js"></script>
	<script src="public/admin/assets/js/jquery.blockui.js"></script>
	<!-- ie8 fixes -->
	<!--[if lt IE 9]>
	<script src="assets/js/excanvas.js"></script>
	<script src="assets/js/respond.js"></script>
	<![endif]-->
	<script type="text/javascript" src="public/admin/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="public/admin/assets/bootstrap-daterangepicker/date.js"></script>
	<script type="text/javascript" src="public/admin/assets/bootstrap-daterangepicker/daterangepicker.js"></script> 
	<script type="text/javascript" src="public/admin/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
	<script src="public/admin/assets/js/app.js"></script>
	<script>
	  jQuery(document).ready(function() {
	     // initiate layout and plugins
	     App.init();
	  });
	</script>
</body>
<!-- END BODY -->
</html>