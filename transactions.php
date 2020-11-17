<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="theme-color" content="#3ed2a7">
	
	<link rel="shortcut icon" href="./favicon.png" />
	
	<title>diligentmart</title>

	<link rel="stylesheet" href="https://use.typekit.net/scc6wwx.css">
	<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" href="assets/vendors/liquid-icon/liquid-icon.min.css" />
	<link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="assets/css/theme-vendors.min.css" />
	<link rel="stylesheet" href="assets/css/theme.min.css" />
	<link rel="stylesheet" href="assets/css/themes/seo.css" />
	<link rel="stylesheet" href="css/jBox.all.min.css" />
    <link href="css/footable.standalone.min.css" rel="stylesheet">
	
	<!-- Head Libs -->
	<script async src="assets/vendors/modernizr.min.js"></script>

	<style>
		.btn > span {display: -webkit-inline-box;display: inline-flex;padding: 0px;border-radius: inherit;border-color: inherit;-webkit-box-orient: horizontal;-webkit-box-direction: normal;flex-flow: row wrap;-webkit-box-align: center;align-items: center;}
	</style>
	
</head>
<body data-mobile-nav-trigger-alignment="right" data-mobile-nav-align="left" data-mobile-nav-style="modern" data-mobile-nav-shceme="gray" data-mobile-header-scheme="gray" data-mobile-nav-breakpoint="1199">
	
	<div id="wrap">
		<?php 
    include 'header2.php';
    ?>
		
		<main id="content" class="content">
			
			<section class="vc_row pt-50 pb-50 bg-cover bg-center" style="background: rgb(228, 228, 240);">
			
				<div class="container">
					<div class="row" style="padding-left: 20px; padding-right: 20px;">
						
						<div class="lqd-column col-md-12 px-4 pt-45 pb-30 bg-white box-shadow-1">
							
							<div class="lqd-column-inner bg-white border-radius-6 px-3 px-md-4 pt-40 pb-40">
								<div><img src="images/transaction.svg" style="width: 80px; height: 80px;" /><span style="font-size: 25px;">Transactions</span></div><br>
								<div>Click to view details</div>
								<div style="font-size: 18px;">DATA</div>
								<table id="dataPurchaseHistory" class="table" data-show-toggle="false" data-paging="true" data-sorting="true" data-filtering="true" data-paging-size="5">
								</table><br>
								
								<div style="font-size: 18px;">AIRTIME</div>
								<table id="airtimePurchaseHistory" class="table" data-show-toggle="false" data-paging="true" data-sorting="true" data-filtering="true" data-paging-size="5">
								</table><br>
								
								<div style="font-size: 18px;">TV SUBSCRIPTION</div>
								<table id="tv_subPurchaseHistory" class="table" data-show-toggle="false" data-paging="true" data-sorting="true" data-filtering="true" data-paging-size="5">
								</table><br>
								
								<div style="font-size: 18px;">POWER PURCHASE</div>
								<table id="powerPurchaseHistory" class="table" data-show-toggle="false" data-paging="true" data-sorting="true" data-filtering="true" data-paging-size="5">
								</table>
								
								<div style="font-size: 18px;">TRANSFER</div>
								<table id="transferHistory" class="table" data-show-toggle="false" data-paging="true" data-sorting="true" data-filtering="true" data-paging-size="5">
                                </table>

							</div><!-- /.lqd-column-inner -->

						</div><!-- /.lqd-column col-md-5 col-md-offset-7 -->

					</div><!-- /.row -->
					
				</div><!-- /.container -->
			</section>
			
		</main><!-- /#content.content -->
		
		<?php
        include 'footer.php';
        ?>
	
</div><!-- /#wrap -->

<script src="js/jquery.min.js"></script>
<script src="js/jbox.all.min.js"></script>
<script src="js/footable.min.js" type="text/javascript"></script>
<script src="./assets/js/theme-vendors.js"></script>
<script src="./assets/js/theme.min.js"></script>
<script src="./assets/js/liquidAjaxMailchimp.min.js"></script>
<script>
   $.fn.get_dataPurchaseHistory = function(){ 
		var resultJson = null;
	$.get('api/get_data_purchase_history.php',{},function(result){
		resultJson = JSON.parse(result);
		$('#dataPurchaseHistory').footable({
                          "columns": $.get('json/transactions_column.json'),
                          "rows": resultJson
						});
						
	});
	}
	$.fn.get_airtimePurchaseHistory = function(){ 
		var resultJson = null;
	$.get('api/get_airtime_purchase_history.php',{},function(result){
		resultJson = JSON.parse(result);
		$('#airtimePurchaseHistory').footable({
                          "columns": $.get('json/transactions_column.json'),
                          "rows": resultJson
						});
						
	});
	}
	$.fn.get_tv_subPurchaseHistory = function(){ 
		var resultJson = null;
	$.get('api/get_tv_sub_purchase_history.php',{},function(result){
		resultJson = JSON.parse(result);
		$('#tv_subPurchaseHistory').footable({
                          "columns": $.get('json/transactions_column.json'),
                          "rows": resultJson
						});
						
	});
	}
	$.fn.get_powerPurchaseHistory = function(){ 
		var resultJson = null;
	$.get('api/get_power_purchase_history.php',{},function(result){
		resultJson = JSON.parse(result);
		$('#powerPurchaseHistory').footable({
                          "columns": $.get('json/transactions_column.json'),
                          "rows": resultJson
						});
						
	});
	}
	$.fn.get_transferHistory = function(){ 
		var resultJson = null;
	$.get('api/get_transferHistory.php',{},function(result){
		resultJson = JSON.parse(result);
		$('#transferHistory').footable({
                          "columns": $.get('json/transactions_column.json'),
                          "rows": resultJson
						});
						
	});
	}
	$.fn.get_dataPurchaseHistory();
	$.fn.get_airtimePurchaseHistory();
	$.fn.get_tv_subPurchaseHistory();
	$.fn.get_powerPurchaseHistory();
	$.fn.get_transferHistory();
	
	$(".fooicon-search").css({"padding": "0px"});

	$("#dataPurchaseHistory").on("click","td:not(.footable-first-column)",function(e){
    var row=$( this ).parent();
    if(!row.hasClass('footable-paging')){
      var collected_id = row.closest('tr').children('td:first').text();
	  
	  $.get('api/get_fullTransactionInfo.php',{
		  id:collected_id
	  },function(result){
		var resultJson_array = JSON.parse(result);
		var resultJson = resultJson_array[0];
		
		var confirm_remove = new jBox('Confirm', {
        confirmButton:"OK",
        cancelButton:"CANCEL",
		content:`<div style='font-size:18px; text-align:left' class='row'>
		<div class='col-md-5'>RefID: `+resultJson.refID+` </div>
		<div class='col-md-5'>Cost: `+resultJson.cost+`</div><div class='col-md-5'>No: `+resultJson.meter_pnone_iuc_No+`</div>
		<div class='col-md-5'>Network: `+resultJson.network+`</div><div class='col-md-5'>Date: `+resultJson.date+`</div>
		</div>`,
        blockScroll:false,
        confirm: function(){
          
        }
      });
      confirm_remove.open();
						
	});
      
    }
    return false;
  });

  $("#airtimePurchaseHistory").on("click","td:not(.footable-first-column)",function(e){
    var row=$( this ).parent();
    if(!row.hasClass('footable-paging')){
      var collected_id = row.closest('tr').children('td:first').text();
	  
	  $.get('api/get_fullTransactionInfo.php',{
		  id:collected_id
	  },function(result){
		var resultJson_array = JSON.parse(result);
		var resultJson = resultJson_array[0];
		
		var confirm_remove = new jBox('Confirm', {
        confirmButton:"OK",
        cancelButton:"CANCEL",
		content:`<div style='font-size:18px; text-align:left' class='row'>
		<div class='col-md-5'>RefID: `+resultJson.refID+` </div>
		<div class='col-md-5'>Cost: `+resultJson.cost+`</div><div class='col-md-5'>No: `+resultJson.meter_pnone_iuc_No+`</div>
		<div class='col-md-5'>Network: `+resultJson.network+`</div><div class='col-md-5'>Date: `+resultJson.date+`</div>
		</div>`,
        blockScroll:false,
        confirm: function(){
          
        }
      });
      confirm_remove.open();
						
	});
      
    }
    return false;
  });

  $("#tv_subPurchaseHistory").on("click","td:not(.footable-first-column)",function(e){
    var row=$( this ).parent();
    if(!row.hasClass('footable-paging')){
      var collected_id = row.closest('tr').children('td:first').text();
	  
	  $.get('api/get_fullTransactionInfo.php',{
		  id:collected_id
	  },function(result){
		var resultJson_array = JSON.parse(result);
		var resultJson = resultJson_array[0];
		
		var confirm_remove = new jBox('Confirm', {
        confirmButton:"OK",
        cancelButton:"CANCEL",
		content:`<div style='font-size:18px; text-align:left' class='row'>
		<div class='col-md-5'>RefID: `+resultJson.refID+` </div>
		<div class='col-md-5'>Cost: `+resultJson.cost+`</div><div class='col-md-5'>No: `+resultJson.meter_pnone_iuc_No+`</div>
		<div class='col-md-5'>Network: `+resultJson.network+`</div><div class='col-md-5'>Date: `+resultJson.date+`</div>
		</div>`,
        blockScroll:false,
        confirm: function(){
          
        }
      });
      confirm_remove.open();
						
	});
      
    }
    return false;
  });

  $("#powerPurchaseHistory").on("click","td:not(.footable-first-column)",function(e){
    var row=$( this ).parent();
    if(!row.hasClass('footable-paging')){
      var collected_id = row.closest('tr').children('td:first').text();
	  
	  $.get('api/get_fullTransactionInfo.php',{
		  id:collected_id
	  },function(result){
		var resultJson_array = JSON.parse(result);
		var resultJson = resultJson_array[0];
		
		var confirm_remove = new jBox('Confirm', {
        confirmButton:"OK",
        cancelButton:"CANCEL",
		content:`<div style='font-size:18px; text-align:left' class='row'>
		<div class='col-md-5'>RefID: `+resultJson.refID+` </div>
		<div class='col-md-5'>Cost: `+resultJson.cost+`</div><div class='col-md-5'>No: `+resultJson.meter_pnone_iuc_No+`</div>
		<div class='col-md-5'>Network: `+resultJson.network+`</div><div class='col-md-5'>Date: `+resultJson.date+`</div>
		</div>`,
        blockScroll:false,
        confirm: function(){
          
        }
      });
      confirm_remove.open();
						
	});
      
    }
    return false;
  });

  $("#transferHistory").on("click","td:not(.footable-first-column)",function(e){
    var row=$( this ).parent();
    if(!row.hasClass('footable-paging')){
      var collected_id = row.closest('tr').children('td:first').text();
	  
	  $.get('api/get_fullTransactionInfo.php',{
		  id:collected_id
	  },function(result){
		var resultJson_array = JSON.parse(result);
		var resultJson = resultJson_array[0];
		
		var confirm_remove = new jBox('Confirm', {
        confirmButton:"OK",
        cancelButton:"CANCEL",
		content:`<div style='font-size:18px; text-align:left' class='row'>
		<div class='col-md-5'>RefID: `+resultJson.refID+` </div>
		<div class='col-md-5'>Cost: `+resultJson.cost+`</div><div class='col-md-5'>No: `+resultJson.meter_pnone_iuc_No+`</div>
		<div class='col-md-5'>Network: `+resultJson.network+`</div><div class='col-md-5'>Date: `+resultJson.date+`</div>
		</div>`,
        blockScroll:false,
        confirm: function(){
          
        }
      });
      confirm_remove.open();
						
	});
      
    }
    return false;
  });
</script>
<?php
	include 'api/footerAdditions.php'
	?>
</body>
</html>