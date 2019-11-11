		<!-- begin #content -->
    <?php extract($data);?>
    <?php foreach($query as $row){}?>
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="javascript:;">Customer</a></li>
				<li class="breadcrumb-item">Content Management</li>
				<li class="breadcrumb-item">Categories</li>
				<li class="breadcrumb-item"><?=$row['category_name']?></li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Categories </h1>
			<!-- end page-header -->
			
				<?= !isset($_SESSION['message']) ? '' : '<div class="alert bg-info text-white alert-styled-left alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>'.$_SESSION['message'].'</a></div>'; unset($_SESSION['message']);?>  
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Details</h4>
				</div>
				<div class="panel-body">
          <form method="POST" action="<?=site_url('categories/UpdateCategoryByCategoriesId')?>" class="form-horizontal" data-parsley-validate="true" name="demo-form">
            <input type="hidden" name="categories_id" value="<?=encode($row['categories_id'])?>">
						<div class="form-group row m-b-15">
							<label class="col-md-4 col-sm-4 col-form-label" for="category">Category:</label>
							<div class="col-md-8 col-sm-8">
								<input class="form-control" type="text" id="category" value="<?=$row['category_name']?>" name="category_name" data-parsley-required="true" />
							</div>
						</div>

						<div class="form-group row m-b-0">
							<label class="col-md-4 col-sm-4 col-form-label">&nbsp;</label>
							<div class="col-md-8 col-sm-8">
								<button type="submit" class="btn btn-primary">Save Changes</button>
								<a href="<?=site_url('categories')?>" class="btn btn-primary">Back</a>
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