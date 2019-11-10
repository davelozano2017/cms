<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title><?=website_name?></title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="<?=base_url()?>assets/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/plugins/animate/animate.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/css/default/style.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/css/default/style-responsive.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/css/default/theme/default.css" rel="stylesheet" id="theme" />
		<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?=base_url()?>assets/plugins/pace/pace.min.js"></script>
	<!-- ================== END BASE JS ================== -->

	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="<?=base_url()?>assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css" rel="stylesheet" />
	<link href="<?=base_url()?>assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->

	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	<link href="<?=base_url()?>assets/plugins/parsley/src/parsley.css" rel="stylesheet" />
	<!-- ================== END PAGE LEVEL STYLE ================== -->
</head>
<body class="pace-top bg-white">
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade">
	    <!-- begin login -->
        <div class="login login-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image" style="background: url('<?=base_url()?>assets/images/background.jpg');background-size:100% 100%;background-repeat:no-repeat"></div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin login-header -->
                <div class="login-header">
                    <div class="col-md-12"><img class="img-responsive" style="width:100%" src="<?=base_url()?>assets/images/logo.jpg" alt=""></div>
                </div>
                <!-- end login-header -->
                <!-- begin login-content -->
                <div class="login-content">
									<?= !isset($_SESSION['message']) ? '' : '<div class="alert bg-info text-white alert-styled-left alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>'.$_SESSION['message'].'</a></div>'; unset($_SESSION['message']);?>  
                    <form action="<?=site_url('accounts/auth')?>" method="POST" class="margin-bottom-0" data-parsley-validate="true">
                        <div class="form-group m-b-15">
                            <input type="email" class="form-control form-control-lg" name="email" placeholder="Email Address" data-parsley-required="true" />
                        </div>
                        <div class="form-group m-b-15">
                            <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" data-parsley-required="true" />
                        </div>
                        <div class="login-buttons">
                            <button type="submit" class="btn btn-success btn-block btn-lg">Sign In</button>
                        </div>
                    </form>
                </div>
                <!-- end login-content -->
            </div>
            <!-- end right-container -->
        </div>
        <!-- end login -->
	<!-- end page container -->
	
		<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?=base_url()?>assets/plugins/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?=base_url()?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
	<script src="<?=base_url()?>assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
	<!--[if lt IE 9]>
		<script src="<?=base_url()?>assets/crossbrowserjs/html5shiv.js"></script>
		<script src="<?=base_url()?>assets/crossbrowserjs/respond.min.js"></script>
		<script src="<?=base_url()?>assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="<?=base_url()?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?=base_url()?>assets/plugins/js-cookie/js.cookie.js"></script>
	<script src="<?=base_url()?>assets/js/theme/default.min.js"></script>
	<script src="<?=base_url()?>assets/js/apps.min.js"></script>
	<!-- ================== END BASE JS ================== -->

	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?=base_url()?>assets/plugins/parsley/dist/parsley.js"></script>
	<script src="<?=base_url()?>assets/plugins/highlight/highlight.common.js"></script>
	<script src="<?=base_url()?>assets/js/demo/render.highlight.js"></script>

	<script>
		$(document).ready(function() {
			App.init();
			TableManageResponsive.init();
			Highlight.init();
		});

	</script>
</body>
</html>
