		<!-- begin #content -->
    <?php extract($data);?>
    <?php foreach($query as $row){}?>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="javascript:;">Customer</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Content Management</a></li>
				<li class="breadcrumb-item">Products</li>
				<li class="breadcrumb-item active"><?=$row['products_name']?></li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header"><?=$row['products_name']?></h1>
			<!-- end page-header -->
			
				<?= !isset($_SESSION['message']) ? '' : '<div class="alert bg-info text-white alert-styled-left alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>'.$_SESSION['message'].'</a></div>'; unset($_SESSION['message']);?>  
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Customer Information</h4>
				</div>
				<div class="panel-body">
          <form method="POST" action="<?=site_url('products/UpdateProductsByProductsId')?>" class="form-horizontal" data-parsley-validate="true" name="demo-form">
            <input type="hidden" name="products_id" value="<?=encode($row['products_id'])?>">
						
						<div class="form-group row m-b-15">
							<label class="col-md-4 col-sm-4 col-form-label" for="products_name">Item Name:</label>
							<div class="col-md-8 col-sm-8">
								<input class="form-control" type="text" id="products_name" value="<?=$row['products_name']?>" name="products_name" data-parsley-required="true" />
							</div>
						</div>

						<div class="form-group row m-b-15">
							<label class="col-md-4 col-sm-4 col-form-label" for="products_price">Price:</label>
							<div class="col-md-8 col-sm-8">
								<input class="form-control" type="number" id="products_price" value="<?=$row['products_price']?>" name="products_price" data-parsley-required="true" />
							</div>
						</div>


						<div class="form-group row m-b-15">
							<label class="col-md-4 col-sm-4 col-form-label" for="products_stocks">Stocks:</label>
							<div class="col-md-8 col-sm-8">
								<input class="form-control" type="number" id="products_stocks" value="<?=$row['products_stocks']?>" name="products_stocks" data-parsley-required="true" />
							</div>
						</div>


						<div class="form-group row m-b-15">
							<label class="col-md-4 col-sm-4 col-form-label" for="categories_id">Category Name:</label>
							<div class="col-md-8 col-sm-8">
								<select name="categories_id" class="form-control" id="categories_id">
										<option value="<?=encode($row['categories_id'])?>" selected><?=$row['category_name']?></option>
									<?php foreach($category as $rows){ ?>
										<option value="<?=encode($rows['categories_id'])?>"><?=$rows['category_name']?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						
						<div class="form-group row m-b-0">
							<label class="col-md-4 col-sm-4 col-form-label">&nbsp;</label>
							<div class="col-md-8 col-sm-8">
								<button type="submit" class="btn btn-primary">Save Changes</button>
								<a href="<?=site_url('products')?>" class="btn btn-primary">Back</a>
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