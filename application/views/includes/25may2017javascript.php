<!--[if lt IE 9]>
<script src="<?php echo base_url();?>assets/global/plugins/respond.min.js"></script>
<script src="<?php echo base_url();?>assets/global/plugins/excanvas.min.js"></script> 
<script src="<?php echo base_url();?>assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo base_url();?>assets/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>

<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?php echo base_url();?>assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>assets/pages/scripts/dashboard.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script src="<?php echo base_url();?>assets/pages/scripts/table-datatables-managed.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/pages/scripts/table-datatables-ajax.js" type="text/javascript"></script>
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="<?php echo base_url();?>assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
<script type="application/javascript">
jQuery(function($){
	$('#country').change(function(){
		var countryID = $('#country').val();
		$.ajax({
			  url: '<?php echo base_url('users/getstateslist');?>',
			  type: 'post',
			  data: {countryID:countryID},
			  success: function(data) {
				   $('#state').html(data);
			  }
		});
	});
	
	$('#billin_country').change(function(){
		var countryID = $('#billin_country').val();
		$.ajax({
			  url: '<?php echo base_url('users/getstateslist');?>',
			  type: 'post',
			  data: {countryID:countryID},
			  success: function(data) {
				   $('#billin_state').html(data);
				   $('#shipping_state').html(data);
			  }
		});
	});
	
	$('#shipping_country').change(function(){
		var countryID = $('#shipping_country').val();
		$.ajax({
			  url: '<?php echo base_url('users/getstateslist');?>',
			  type: 'post',
			  data: {countryID:countryID},
			  success: function(data) {
				   $('#shipping_state').html(data);
			  }
		});
	});
	$('#Samebillingshipping').change(function() { 
		$('input:checkbox[name=Samebillingshipping]').each(function(){    
			if($(this).is(':checked')){
			  	//alert($(this).val());
				$('#shipping_first_name').val($('#billing_first_name').val());
				$('#shipping_last_name').val($('#billing_last_name').val());
				$('#shipping_address_1').val($('#billing_address_1').val());
				$('#shipping_address_2').val($('#billing_address_2').val());
				$('#shipping_city_name').val($('#billing_city_name').val());
				$('#shipping_zip_code').val($('#billing_zip_code').val());
				$('#shipping_country').val($('#billin_country').val());
				$('#shipping_state').val($('#billin_state').val());
			}else{
				$('#shipping_first_name').val('');
				$('#shipping_last_name').val('');
				$('#shipping_address_1').val('');
				$('#shipping_address_2').val('');
				$('#shipping_city_name').val('');
				$('#shipping_zip_code').val('');
				$('#shipping_country').val('');
				$('#shipping_state').val('');
			}
		});
	});
	$('#api_billing_country').change(function(){
		var countryID = $('#api_billing_country').val();
		$.ajax({
			  url: '<?php echo base_url('users/getstateslist');?>',
			  type: 'post',
			  data: {countryID:countryID},
			  success: function(data) {
				   $('#api_billing_state').html(data);
			  }
		});
	});
});
</script>