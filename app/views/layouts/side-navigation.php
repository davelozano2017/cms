<?php extract($data)?>
	<!-- begin #page-container -->
	<div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		<div id="header" class="header navbar-default">
			<!-- begin navbar-header -->
			<div class="navbar-header">
				<a href="index.html" class="navbar-brand"><b>CUSTOMER</b> Management</a>
				<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- end navbar-header -->
			
		
		</div>
		<!-- end #header -->
		
		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<a href="javascript:;" data-toggle="nav-profile">
							<div class="cover with-shadow"></div>
							<div class="info">
								<b class="caret pull-right"></b>
								<?=$user[0]['name'];?>
								<small><?=$user[0]['role'];?></small>
							</div>
						</a>
					</li>
					<li>
						<ul class="nav nav-profile">
								<li><a href="<?=site_url('Accounts/logout')?>"> Logout</a></li>
						</ul>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav">
					<li class="has-sub <?=$title == 'Customer' ? 'active' : ''?>"> <a href="<?=site_url('customer')?>"><span>Customer</span></a></li>
					<li class="has-sub <?=$title == 'Order' ? 'active' : ''?>"> <a href="<?=site_url('order')?>"><span>Order</span></a></li>
					<li class="has-sub <?=$title == 'Sales' ? 'active' : ''?>"> <a href="<?=site_url('sales')?>"><span>Sales</span></a></li>
					<li class="has-sub <?=$title == 'Products' ? 'active' : ''?><?=$title == 'Categories' ? 'active' : ''?> ">
					<a href="javascript:;"><b class="caret"></b><span>Content Management</span></a>
						<ul class="sub-menu">
						    <li class=" <?=$title == 'Products' ? 'active' : ''?>"><a href="<?=site_url('products')?>">Products</a></li>
						    <li class=" <?=$title == 'Categories' ? 'active' : ''?>" ><a href="<?=site_url('categories')?>">Categories</a></li>
						</ul>
					</li>
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->