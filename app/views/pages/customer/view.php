		<!-- begin #content -->
    <?php extract($data);?>
    <?php foreach($query as $row){}?>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
				<li class="breadcrumb-item active">Customer</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header"><?=$row['name']?></h1>
			<!-- end page-header -->
			
				<?= !isset($_SESSION['message']) ? '' : '<div class="alert bg-info text-white alert-styled-left alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>'.$_SESSION['message'].'</a></div>'; unset($_SESSION['message']);?>  
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Customer Information</h4>
				</div>
				<div class="panel-body">
          <form method="POST" action="<?=site_url('accounts/UpdateUsersByAccountsId')?>" class="form-horizontal" data-parsley-validate="true" name="demo-form">
            <input type="hidden" name="accounts_id" value="<?=encode($row['accounts_id'])?>">
						<div class="form-group row m-b-15">
							<label class="col-md-4 col-sm-4 col-form-label" for="fullname">Full Name:</label>
							<div class="col-md-8 col-sm-8">
								<input class="form-control" type="text" id="fullname" value="<?=$row['name']?>" name="name" data-parsley-required="true" />
							</div>
						</div>

						<div class="form-group row m-b-15">
							<label class="col-md-4 col-sm-4 col-form-label" for="email">Email Address:</label>
							<div class="col-md-8 col-sm-8">
								<input class="form-control" type="text" id="email" name="email" value="<?=$row['email']?>" data-parsley-type="email" data-parsley-required="true" />
							</div>
						</div>

						<div class="form-group row m-b-15">
							<label class="col-md-4 col-sm-4 col-form-label" for="message">Contact Number:</label>
							<div class="col-md-8 col-sm-8">
								<input class="form-control" type="text" id="digits" value="<?=$row['contact']?>" name="contact" data-parsley-type="digits" data-parsley-required="true"/>
							</div>
						</div>
				
						<div class="form-group row m-b-15">
							<label class="col-md-4 col-sm-4 col-form-label" for="message">Address:</label>
							<div class="col-md-8 col-sm-8">
								<textarea class="form-control" id="message" name="address" style="resize:none;height:100px" data-parsley-required="true"><?=$row['address']?></textarea>
							</div>
						</div>
						
						<div class="form-group row m-b-0">
							<label class="col-md-4 col-sm-4 col-form-label">&nbsp;</label>
							<div class="col-md-8 col-sm-8">
								<button type="submit" class="btn btn-primary">Save Changes</button>
								<a href="<?=site_url('customer')?>" class="btn btn-primary">Back</a>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- end panel -->

		</div>
		<!-- end #content -->

		</div>
	<!-- end page container -->