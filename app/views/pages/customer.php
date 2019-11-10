		<!-- begin #content -->
    <?php extract($data);?>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
				<li class="breadcrumb-item active">Customer</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Customer</h1>
			<!-- end page-header -->
			
			<?= !isset($_SESSION['message']) ? '' : '<div class="alert bg-info text-white alert-styled-left alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>'.$_SESSION['message'].'</a></div>'; unset($_SESSION['message']);?>  
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Customer Information</h4>
				</div>
				<div class="panel-body">
					<form method="POST" action="<?=site_url('accounts/CreateNewUser')?>" class="form-horizontal" data-parsley-validate="true" name="demo-form">
						<div class="form-group row m-b-15">
							<label class="col-md-4 col-sm-4 col-form-label" for="fullname">Full Name:</label>
							<div class="col-md-8 col-sm-8">
								<input class="form-control" type="text" id="fullname" name="name" data-parsley-required="true" />
							</div>
						</div>

						<div class="form-group row m-b-15">
							<label class="col-md-4 col-sm-4 col-form-label" for="email">Email Address:</label>
							<div class="col-md-8 col-sm-8">
								<input class="form-control" type="text" id="email" name="email" data-parsley-type="email" data-parsley-required="true" />
							</div>
						</div>

						<div class="form-group row m-b-15">
							<label class="col-md-4 col-sm-4 col-form-label" for="message">Contact Number:</label>
							<div class="col-md-8 col-sm-8">
								<input class="form-control" type="text" id="digits" name="contact" data-parsley-type="digits" data-parsley-required="true"/>
							</div>
						</div>
				
						<div class="form-group row m-b-15">
							<label class="col-md-4 col-sm-4 col-form-label" for="message">Address:</label>
							<div class="col-md-8 col-sm-8">
								<textarea class="form-control" id="message" name="address" style="resize:none;height:100px" data-parsley-required="true"></textarea>
							</div>
						</div>
						
						<div class="form-group row m-b-0">
							<label class="col-md-4 col-sm-4 col-form-label">&nbsp;</label>
							<div class="col-md-8 col-sm-8">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- end panel -->

			 <!-- begin panel -->
			 <div class="panel panel-inverse">
					<div class="panel-body">
							<table id="data-table-responsive" class="table table-striped table-bordered">
									<thead>
											<tr>
													<th width="1%">#</th>
													<th class="text-nowrap">Name</th>
													<th class="text-nowrap">Address</th>
													<th class="text-nowrap">Contact</th>
													<th class="text-nowrap">Email</th>
													<th class="text-nowrap">Action</th>
											</tr>
									</thead>
									<tbody>
										<?php $i = 1; foreach($query as $row) { ?> 
											<tr>
												<td width="1%" class="f-s-600 text-inverse"><?=$i++?></td>
												<td><?=$row['name']?></td>
												<td><?=$row['address']?></td>
												<td><?=$row['email']?></td>
												<td><?=$row['contact']?></td>
												<td style="width:1%;text-align:center"><a href="<?=site_url('customer/view/'.encode($row['accounts_id']))?>">View</a></td>
											</tr>
										<?php } ?>
									</tbody>
							</table>
					</div>
					<!-- end panel-body -->
			</div>
			<!-- end panel -->
		</div>
		<!-- end #content -->

		</div>
	<!-- end page container -->