		<!-- begin #content -->
    <?php extract($data);?>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="javascript:;">Customer</a></li>
				<li class="breadcrumb-item">Content Management</li>
				<li class="breadcrumb-item active">Categories</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Categories</h1>
			<!-- end page-header -->
			
			<?= !isset($_SESSION['message']) ? '' : '<div class="alert bg-info text-white alert-styled-left alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>'.$_SESSION['message'].'</a></div>'; unset($_SESSION['message']);?>  
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Category Information</h4>
				</div>
				<div class="panel-body">
					<form method="POST" action="<?=site_url('categories/AddCategories')?>" class="form-horizontal" data-parsley-validate="true" name="demo-form">
						<div class="form-group row m-b-15">
							<label class="col-md-4 col-sm-4 col-form-label" for="fullname">Category:</label>
							<div class="col-md-8 col-sm-8">
								<input class="form-control" type="text" id="category_name" name="category_name" data-parsley-required="true" />
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
													<th class="text-nowrap">Category</th>
													<th class="text-nowrap"></th>
											</tr>
									</thead>
									<tbody>
										<?php $i = 1; foreach($query as $row) { ?> 
											<tr>
												<td width="1%" class="f-s-600 text-inverse"><?=$i++?></td>
												<td><?=$row['category_name']?></td>
												<td style="width:1%;text-align:center"><a class="btn btn-primary" href="<?=site_url('categories/view/'.encode($row['categories_id']))?>"><i class="fa fa-eye"></a></td>
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