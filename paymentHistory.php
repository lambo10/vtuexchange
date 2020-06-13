<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="theme-color" content="#3ed2a7">
	
	<link rel="shortcut icon" href="./favicon.png" />
	
	<title>smartvtu</title>

	<link rel="stylesheet" href="https://use.typekit.net/scc6wwx.css">
	<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" href="assets/vendors/liquid-icon/liquid-icon.min.css" />
	<link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="assets/css/theme-vendors.min.css" />
	<link rel="stylesheet" href="assets/css/theme.min.css" />
    <link rel="stylesheet" href="assets/css/themes/seo.css" />
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
			
			<section class="vc_row pt-50 pb-50 bg-cover bg-center" style="background: rgb(241, 241, 241);">
				<div class="lqd-particles-bg-wrap">

					<div class="ld-particles-container">
						<div
							class="ld-particles-inner"
							id="ld-particles-1"
							data-particles="true"
							data-particles-options='{"particles":{"number":{"value":2,"density":1},"color":{"value":["#b9dee2","#ffe3dd"]},"shape":{"type":["circle"]},"size":{"value":450},"move":{"enable":true,"direction":"top","speed":2,"random":true,"out_mode":"out"}},"interactivity":[]}'>
						</div><!-- /.ld-particles-inner -->
					</div><!-- /.ld-particles-container -->
					
				</div><!-- /.lqd-particles-bg-wrap -->

				<div class="container">
					<div class="row" style="padding-left: 20px; padding-right: 20px;">
						
						<div class="lqd-column col-md-12 px-4 pt-45 pb-30 bg-white box-shadow-1">
							
							<div class="lqd-column-inner bg-white border-radius-6 px-3 px-md-4 pt-40 pb-40">
								<div><img src="images/history.svg" style="width: 80px; height: 80px;" /><span style="font-size: 25px;">Payment History</span></div><br>
								<table id="transactionTable" style="cursor: pointer;" class="table" data-show-toggle="false" data-paging="true" data-sorting="true" data-filtering="true" data-paging-size="5">
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
<script src="js/footable.min.js" type="text/javascript"></script>
<script src="./assets/js/theme-vendors.js"></script>
<script src="./assets/js/theme.min.js"></script>
<script src="./assets/js/liquidAjaxMailchimp.min.js"></script>
<script>
    $('#transactionTable').footable({
                          "columns": $.get('json/transaction_column.json'),
                          "rows": ""
						});
	
	$(".fooicon-search").css({"padding": "0px"});
</script>
</body>
</html>