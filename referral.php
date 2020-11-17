
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
	<link href="css/footable.standalone.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/jBox.all.min.css" />
	
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
			
		<section class="vc_row pb-50 bg-cover bg-center" style="background: rgb(228, 228, 240);">
				
				<div>
					<div class="lqd-column col-md-12" style="background: #003879; padding-top: 10px;padding-bottom: 30px; padding-left: 30px; padding-right: 30px;">
						
						<h2 class="mb-2 font-size-30 font-weight-light" style="color: white;">Refer Friends & Earn Cash</h2><br>
						<span class="mb-2 font-size-20 font-weight-light" style="color: white;">Introduce a friend to diligentmart and you will be credited 300 Naira to your account</span>
						
					</div>
					<div>
						<div class="lqd-column col-md-12 bg-white box-shadow-1">

							<div class="lqd-column-inner bg-white border-radius-6 px-3 px-md-4 pt-40 pb-40">

								<header class="fancy-title" style="padding-left: 30px;">
									<div>Commission</div>
									<h2 class="mb-2 font-size-30 font-weight-light">₦<span id="commison_div"></span></h2>
									<a href="withdrawCommission.php"><div style="color: #003879;">Withdraw</div></a>
								</header><!-- /.fancy-title -->
								<span class="font-size-20" style="padding-left: 30px;">Shear referral link with friends</span>
								<div class="ld-sf ld-sf--input-bordered ld-sf--button-solid ld-sf--size-sm ld-sf--circle ld-sf--border-thin ld-sf--button-show ld-sf--button-inside">
									<form id="ld_subscribe_form" class="ld_sf_form" action="https://liquid-themes.us20.list-manage.com/subscribe/post?u=7f582d555cef808a99ea001a7&amp;id=58ab120d89" name="mc-embedded-subscribe-form" method="post">
										<p class="ld_sf_paragraph pr-2">
											<input type="text" class="ld_sf_text" id="refLinkHolder" value="<?php echo 'https://diligentmart.com/register.php?refID='.$refID ?>">
										</p>
										<button onclick="copyToClipboard('refLinkHolder','Copied Link')" type="button" class="ld_sf_submit font-size-10">
											<span class="submit-icon">
												Copy
											</span>
										</button>
									</form>
									<div class="ld_sf_response"></div>
								</div><!-- /.ld-sf -->

							</div><!-- /.lqd-column-inner -->

						</div><!-- /.lqd-column col-md-5 col-md-offset-7 -->

					</div><!-- /.row -->
					
					<div class="container">
				
						<div class="row">
		
							<div class="lqd-column col-md-10 col-md-offset-1">
		
								<header class="fancy-title text-center mb-75" data-custom-animations="true" data-ca-options='{"triggerHandler":"inview","animationTarget":"all-childs","duration":1200,"delay":100,"initValues":{"translateY":80,"opacity":0},"animations":{"translateY":0,"opacity":1}}'>
		
									
								</header><!-- /.fancy-title -->
		
							</div><!-- /.col-md-8 col-md-offset-2 -->
		
						</div><!-- /.row -->
		
						<div class="row" data-custom-animations="true" data-ca-options='{"triggerHandler":"inview","animationTarget":"all-childs","duration":"1200","delay":"180","initValues":{"scale":0.8,"opacity":0},"animations":{"scale":1,"opacity":1}}'>
		
							<div class="lqd-column col-md-6">
		
								<div class="iconbox iconbox-side iconbox-semiround iconbox-shadow iconbox-heading-sm iconbox-filled" id="ld_icon_box_5c4e9c4475e68" data-plugin-options='{"color":"#3d59e8"}'>
									<div class="iconbox-icon-wrap">
										<span class="iconbox-icon-container">
											<img width="64px" height="64px" src="images/team.svg" />
										</span>
									</div><!-- /.iconbox-icon-container -->
									<div class="contents">
										<h3 class="mb-2">Referral Signups</h3>
										<div>How many people signed up with your referral link</div><br>
										<p style="font-size: 25px;"><span id="referral_s"></span></p>
									</div><!-- /.contents -->
								</div><!-- /.iconbox -->
		
							</div><!-- /.col-md-6 -->
		
							<div class="lqd-column col-md-6">
		
								<div class="iconbox iconbox-side iconbox-semiround iconbox-shadow iconbox-heading-sm iconbox-filled" id="ld_icon_box_5c4e9c4475e69" data-plugin-options='{"color":"#28d5a7"}'>
									<div class="iconbox-icon-wrap">
										<span class="iconbox-icon-container">
											<img width="64px" height="64px" src="images/handShake.svg" />
										</span>
									</div><!-- /.iconbox-icon-container -->
									<div class="contents">
										<h3 class="mb-2">Successful referral</h3>
										<div>How many people signed up with your referral link and have deposited a minimum of ₦2000</div>
										<p style="font-size: 25px;"><span id="successful_s"></span></p>
									</div><!-- /.contents -->
								</div><!-- /.iconbox -->
		
							</div><!-- /.col-md-6 -->
							
						</div><!-- /.row -->
						<br>
						<div class="row" data-custom-animations="true" data-ca-options='{"triggerHandler":"inview","animationTarget":"all-childs","duration":"1200","delay":"180","initValues":{"scale":0.8,"opacity":0},"animations":{"scale":1,"opacity":1}}'>
		
						<div class="lqd-column col-md-12 px-4 pt-10 pb-10 bg-white box-shadow-1">
							
							<div class="lqd-column-inner bg-white border-radius-6 px-3 px-md-4 pt-40 pb-40">
									
									<div class="contents">
										<div style="font-size: 19px;">
										<i class="fa fa-link"></i>
										<span class="mb-2">Downlines</span>
										</div>
										<div style="padding-top: 10px;">
									<table id="downlines" class="table" data-show-toggle="false" data-paging="true" data-sorting="true" data-filtering="true" data-paging-size="5">
                                		</table>
											
										</div>


									</div><!-- /.contents -->
								</div><!-- /.iconbox -->
		
							</div><!-- /.col-md-6 -->
							
						</div><!-- /.row -->
		
					</div><!-- /.container -->
					
				</div><!-- /.container -->
			</section>
			
		</main><!-- /#content.content -->
		
		<?php
        include 'footer.php';
        ?>
	
</div><!-- /#wrap -->

<script src="js/jquery.min.js"></script>
<script src="js/jbox.all.min.js"></script>
<script src="js/generalOp.js"></script>
<script src="js/footable.min.js" type="text/javascript"></script>
<script src="./assets/js/theme-vendors.js"></script>
<script src="./assets/js/theme.min.js"></script>
<script src="./assets/js/liquidAjaxMailchimp.min.js"></script>
<script>
  $.fn.get_referd_users = function(){ 
		var resultJson = null;
	$.get('api/get_reffered_users.php',{},function(result){
		if(result.length > 0){
			resultJson = JSON.parse(result);
		$('#downlines').footable({
                          "columns": $.get('json/referral_downline_column.json'),
                          "rows": resultJson
						});
		}
						
	});
	}
	$.fn.get_referd_users();

	$.fn.get_referral_p_aDetails = function(){ 
	$.get('api/referralPageAccDetails.php',{},function(result){
		var passedJson = JSON.parse(result);
		$("#commison_div").html(passedJson.commission);
		$("#referral_s").html(passedJson.referral_SignUps);
		$("#successful_s").html(passedJson.successful_referral);
	});
	}
	$.fn.get_referral_p_aDetails();

	function copyToClipboard(id,msg){
    var copyText = document.getElementById(id);

    copyText.select();
    copyText.setSelectionRange(0, 99999); 

    document.execCommand("copy");

    $.fn.notification(msg,"blue");
    }
	
</script>
<?php
	include 'api/footerAdditions.php'
	?>
</body>
</html>