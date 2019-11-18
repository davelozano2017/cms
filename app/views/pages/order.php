<?php extract($data);?>
  <!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li class="breadcrumb-item"><a href="javascript:;">Dashboard</a></li>
				<li class="breadcrumb-item active">Order</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Order</h1>
			<!-- end page-header -->
			
			<?= !isset($_SESSION['message']) ? '' : '<div class="alert bg-info text-white alert-styled-left alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>'.$_SESSION['message'].'</a></div>'; unset($_SESSION['message']);?>  
			<!-- begin panel -->
			<div class="row">
				<div class="col-md-7">
					<div class="panel panel-inverse">
						<div class="panel-body">
							<table id="data-table-responsive" class="table table-striped table-bordered">
									<thead>
											<tr>
												<th width="1%">#</th>
													<th class="text-nowrap">Product</th>
													<th class="text-nowrap">Category</th>
													<th class="text-nowrap">Price</th>
													<th class="text-nowrap" width="1%">Stocks</th>
													<th class="text-nowrap">Quantity</th>
													<th class="text-nowrap"></th>
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
												<td>
													<input style="width:100%" type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" id="quantity<?=($row['products_id'])?>" class="form-control" name="quantity" value=1>
												</td>
												<td style="width:1%;text-align:center"><button type="submit" onclick="addToCart(<?=$row['products_id']?>)" class="btn btn-primary"><i class="fa fa-cart-plus"></i></button></td>
											</tr>
										<?php } ?>
									</tbody>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-5">
					<div class="panel panel-inverse">
						<div class="panel-body">
								<label for="">Your Orders</label>
								<table id="data-table-responsive" class="table table-striped table-bordered">
									<thead>
											<tr>
												<th width="1%">#</th>
													<th class="text-nowrap">Product</th>
													<th class="text-nowrap" width="1%">Price</th>
													<th class="text-nowrap" width="1%">QTY</th>
											</tr>
									</thead>
									<tbody>
										<?php if(!isset($_SESSION['cart'])) { ?>
											<tr>
												<td colspan=4 style="text-align:center">No Record Found</td>
											</tr>
										<?php } else { ?>
											<?php $i = 1; foreach($_SESSION['cart'] as $key => $value) { ?> 
												<tr>
													<td width="1%" class="f-s-600 text-inverse"><?=$i++?></td>
													<td><?=$value['products_name']?></td>
													<td>&#x20b1;<?=number_format($value['products_price'],2)?></td>
													<td><?=$value['products_quantity']?></td>
												</tr>
												<?php } ?>
										<?php } ?>
									</tbody>
							</table>
							<form method="POST" action="<?=site_url('order/CompleteTransaction')?>">
									<div class="form-group">
										<label for="customer">Customer</label>
										<select name="accounts_id" id="customer" class="form-control">
											<?php foreach($customers as $rows){ ?>
												<option value="<?=encode($rows['accounts_id'])?>"><?=$rows['name']?></option>
											<?php } ?>
										</select>	
									</div>	

									<div class="form-group pull-right">
										<input type="submit" class="btn btn-primary" value="Submit">
									</div>	
							</form>
						</div>
					</div>				

				</div>
			</div>
			<!-- end panel -->
		</div>

		
		<!-- end #content -->

		</div>
	<!-- end page container -->