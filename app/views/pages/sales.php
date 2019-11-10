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
			<h1 class="page-header">Sales</h1>
			<!-- end page-header -->
			
				<?= !isset($_SESSION['message']) ? '' : '<div class="alert bg-info text-white alert-styled-left alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>'.$_SESSION['message'].'</a></div>'; unset($_SESSION['message']);?>  
			<!-- begin panel -->
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-inverse">
						<div class="panel-body">
							<form method="POST" action="<?=site_url('sales/result')?>">
									<div class="form-group">
										<label for="customer">Customer</label>
										<select name="accounts_id" id="customer" class="form-control">
											<?php foreach($customers as $rows){ ?>
												<option value="<?=encode($rows['accounts_id'])?>"><?=$rows['name']?></option>
											<?php } ?>
										</select>	
									</div>	

									<div class="form-group">
										<input type="submit" class="btn btn-primary" value="Submit">
									</div>	
							</form>
							<?php if(!isset($result)) { ?> 
								<div class="alert alert-info">No Result Found</div>
							<?php } else { ?> 
											<!-- begin invoice -->
							<div class="invoice">
								<!-- begin invoice-company -->
								<div class="invoice-company text-inverse f-w-600">
										<span class="pull-right hidden-print">
										<a href="javascript:;" onclick="window.print()" class="btn btn-sm btn-white m-b-10 p-l-5"><i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print</a>
										</span>
										<?=$result[0]['name']?>
								</div>
								<!-- end invoice-company -->
								<div class="invoice-content">
									<!-- begin table-responsive -->
										<div class="table-responsive">
												<table class="table table-invoice">
														<thead>
																<tr>
																		<th>PRODUCT NAME</th>
																		<th class="text-center" width="10%">PRICE</th>
																		<th class="text-center" width="10%">QUANTITY</th>
																		<th class="text-right" width="20%">SUBTOTAL</th>
																</tr>
														</thead>
														<tbody>
																<?php foreach($result as $key => $value) { ?> 
																	<tr>
																			<td>
																					<span class="text-inverse"><?=$value['products_name']?></span><br />
																			</td>
																			<td class="text-center">₱<?=number_format($value['products_price'],2)?></td>
																			<td class="text-center"><?=$value['quantity']?></td>
																			<td class="text-right"><?=$value['line_total']?></td>
																	</tr>
																<?php } ?>
														</tbody>
												</table>
										</div>
									<!-- end table-responsive -->
									<!-- begin invoice-price -->
										<div class="invoice-price">
												<div class="invoice-price-left">
														<div class="invoice-price-row">
																<div class="sub-price">
																		<small>SUBTOTAL</small>
																		<span class="text-inverse">$4,500.00</span>
																</div>
																<div class="sub-price">
																		<i class="fa fa-plus text-muted"></i>
																</div>
																<div class="sub-price">
																		<small>PAYPAL FEE (5.4%)</small>
																		<span class="text-inverse">$108.00</span>
																</div>
														</div>
												</div>
												<div class="invoice-price-right">
														<small>TOTAL</small> <span class="f-w-600">$4508.00</span>
												</div>
										</div>
									<!-- end invoice-price -->
								</div>
								<!-- end invoice-content -->
						</div>
							<!-- end invoice -->
						<?php } ?>
						</div>
					</div>				

				</div>
			</div>
			<!-- end panel -->
		</div>

		
		<!-- end #content -->

		</div>
	<!-- end page container -->