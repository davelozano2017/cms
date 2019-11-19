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
			<h1 class="page-header"><?=$result[0]['allTransaction']['name']?></h1>
			<!-- end page-header -->
			
				<?= !isset($_SESSION['message']) ? '' : '<div class="alert bg-info text-white alert-styled-left alert-dismissible"><button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>'.$_SESSION['message'].'</a></div>'; unset($_SESSION['message']);?>  
			<!-- begin panel -->
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-inverse">
						<div class="panel-body">
							<table id="data-table-responsive" class="table table-striped table-bordered">
								<thead>
										<tr>
												<th width=1% class="border-0 text-uppercase small font-weight-bold">#</th>
												<th class="border-0 text-uppercase small font-weight-bold">Name</th>
												<th width=1% class="border-0 text-uppercase small font-weight-bold">Total</th>
												<th width=1% class="border-0 text-uppercase small font-weight-bold"></th>
										</tr>
								</thead>
								<tbody>
									<?php $total=0; $i=1; foreach($result as $row) { ?> 
										<tr>
												<td><?=$i++?></td>
												<td><?=$row['allTransaction']['products_name']?></td>
												<td><?=$row['allTransaction']['reference']?></td>
												<td><a href="<?=site_url('sales/result/'.encode($row['allTransaction']['reference']))?>" class="btn btn-primary"><i class="fa fa-print"></i></a></td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
							
						</div>
					</div>				

				</div>
			</div>
			<!-- end panel -->
		</div>

		
		<!-- end #content -->

		</div>
	<!-- end page container -->