		<!-- begin #content -->
    <?php extract($data);?>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item">Customer</li>
				<li class="breadcrumb-item">Content Management</li>
				<li class="breadcrumb-item">Products</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Products</h1>
			<!-- end page-header -->
			
			<?= !isset($_SESSION['message']) ? '' : '<div class="alert bg-info text-white alert-styled-left alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>'.$_SESSION['message'].'</a></div>'; unset($_SESSION['message']);?>  
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Product Descriptions</h4>
				</div>
				<div class="panel-body">
					<form method="POST" action="<?=site_url('products/AddProducts')?>" class="form-horizontal" data-parsley-validate="true" name="demo-form">
						
						<div class="form-group row m-b-15">
							<label class="col-md-4 col-sm-4 col-form-label" for="products_name">Item Name:</label>
							<div class="col-md-8 col-sm-8">
								<input class="form-control" type="text" id="products_name" name="products_name" data-parsley-required="true" />
							</div>
						</div>

						<div class="form-group row m-b-15">
							<label class="col-md-4 col-sm-4 col-form-label" for="products_price">Price:</label>
							<div class="col-md-8 col-sm-8">
								<input class="form-control" type="number" id="products_price" name="products_price" data-parsley-required="true" />
							</div>
						</div>


						<div class="form-group row m-b-15">
							<label class="col-md-4 col-sm-4 col-form-label" for="products_stocks">Stocks:</label>
							<div class="col-md-8 col-sm-8">
								<input class="form-control" type="number" id="products_stocks" name="products_stocks" data-parsley-required="true" />
							</div>
						</div>


						<div class="form-group row m-b-15">
							<label class="col-md-4 col-sm-4 col-form-label" for="categories_id">Category Name:</label>
							<div class="col-md-8 col-sm-8">
								<select name="categories_id" class="form-control" id="categories_id">
									<?php foreach($category as $rows){ ?>
										<option value="<?=encode($rows['categories_id'])?>"><?=$rows['category_name']?></option>
									<?php } ?>
								</select>
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
													<th class="text-nowrap">Item</th>
													<th class="text-nowrap">Category</th>
													<th class="text-nowrap" width=1%>Price</th>
													<th class="text-nowrap" width=1%>Stocks</th>
													<th class="text-nowrap">Action</th>
											</tr>
									</thead>
									<tbody>
										<?php $i = 1; foreach($query as $row) { ?> 
											<tr>
												<td width="1%" class="f-s-600 text-inverse"><?=$i++?></td>
												<td><?=$row['products_name']?></td>
												<td><?=$row['category_name']?></td>
												<td>&#x20b1;<?=number_format($row['products_price'],2)?></td>
												<td><?=$row['products_stocks']?></td>
												<td style="width:1%;text-align:center"><a href="<?=site_url('products/view/'.encode($row['products_id']))?>">View</a></td>
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