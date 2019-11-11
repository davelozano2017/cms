<?php extract($data)?>  

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?=website_name?></title>
	<link href="<?=base_url()?>assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
  <!------ Include the above in your HEAD tag ---------->
</head>
<body onload="print()">
  

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row p-3">
                        <div class="col-md-6">
                            <h4><?=$user[0]['name']?></h4>
                        </div>

                        <div class="col-md-6" style="text-align:right">
                            <h4><?=date('F d, Y g:i A',strtotime($result[0]['date']))?></h4>
                        </div>
                    </div>
                    <div class="row p-2">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">#</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Product Name</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Price</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php $total=0; $i=1; foreach($result as $key => $value) { ?> 
                                      <?php $total += $value['line_total'];?>
                                    <tr>
                                        <td><?=$i++?></td>
                                        <td><?=$value['products_name']?></td>
                                        <td>₱<?=number_format($value['products_price'],2)?></td>
                                        <td><?=$value['quantity']?></td>
                                        <td>₱<?=number_format($value['line_total'],2)?></td>
                                    </tr>
                                  <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Total</div>
                            <div class="h2 font-weight-light">₱<?=number_format($total,2)?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



</body>
</html>