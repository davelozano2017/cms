
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="<?=base_url()?>assets/plugins/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?=base_url()?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
	<script src="<?=base_url()?>assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
	<!--[if lt IE 9]>
		<script src="<?=base_url()?>assets/crossbrowserjs/html5shiv.js"></script>
		<script src="<?=base_url()?>assets/crossbrowserjs/respond.min.js"></script>
		<script src="<?=base_url()?>assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="<?=base_url()?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?=base_url()?>assets/plugins/js-cookie/js.cookie.js"></script>
	<script src="<?=base_url()?>assets/js/theme/default.min.js"></script>
	<script src="<?=base_url()?>assets/js/apps.min.js"></script>
	<!-- ================== END BASE JS ================== -->

	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?=base_url()?>assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
	<script src="<?=base_url()?>assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
	<script src="<?=base_url()?>assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?=base_url()?>assets/js/demo/table-manage-responsive.demo.min.js"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->

	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="<?=base_url()?>assets/plugins/parsley/dist/parsley.js"></script>
	<script src="<?=base_url()?>assets/plugins/highlight/highlight.common.js"></script>
	<script src="<?=base_url()?>assets/js/demo/render.highlight.js"></script>

	<script>
		$(document).ready(function() {
			App.init();
			TableManageResponsive.init();
			Highlight.init();
		});


		function addToCart(products_id) {
			var quantity = $('#quantity'+products_id).val();
			$.ajax({
				type: 'POST',
				url: '<?=site_url('order/AddOrUpdate')?>',
				data : {
					'products_id' : products_id,
					'quantity' : quantity
				},success:function(data) {
					 location.href='order';
				}
			}) 
		}
	</script>
</body>
</html>
