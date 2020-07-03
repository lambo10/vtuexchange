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
	<link rel="stylesheet" href="css/jBox.all.min.css" />
	<link rel="stylesheet" href="css/nl_addition.css" />
	
	<!-- Head Libs -->
	<script async src="assets/vendors/modernizr.min.js"></script>
	
</head>
<body data-mobile-nav-trigger-alignment="right" data-mobile-nav-align="left" data-mobile-nav-style="modern" data-mobile-nav-shceme="gray" data-mobile-header-scheme="gray" data-mobile-nav-breakpoint="1199">
	
	<div id="wrap">
	<div class="titlebar scheme-light" data-parallax="true" data-parallax-options='{ "parallaxBG": true }' style="background-image: url(images/people/6.jpg);">
			
		<?php
		include 'header.php'
		?>

<div>
<div class="ld-fancy-heading" style="text-align: center;">
								<h2
								class="text-white ltr-sp--015"
								data-fittext="true"
								data-fittext-options='{"compressor":0.675,"maxFontSize":"90","minFontSize":"50"}'
								data-split-text="true"
								data-split-options='{ "type": "chars, words" }'
								data-text-rotator="true"
								data-custom-animations="true"
								data-ca-options='{ "triggerHandler":"inview", "animationTarget":"all-childs", "duration":"1200", "delay":"60", "startDelay": 500, "easing":"easeOutQuint", "direction":"forward", "initValues":{"translateY": 20,"rotateZ": 9,"opacity": 0}, "animations":{"translateY":0,"rotateZ":0,"opacity":1} }'>
									<span class="ld-fh-txt">
										Buy Cheap
										<span class="txt-rotate-keywords">
											<span class="keyword active">Airtime</span>
											<span class="keyword">Data</span>
											<span class="keyword">Power</span>
										</span>
									</span>
								</h2>
							</div><!-- /.ld-fancy-heading -->
</div>

			<div class="titlebar-inner py-0 mt-0" >
				<div class="container titlebar-container">
					<div class="row titlebar-container" style="padding-left: 20px; padding-right: 20px;">

						<div class="titlebar-col col-md-12 bg-white pt-10 bg-white box-shadow-1">
							<div class="row">

								<div class="col-md-2 col-md-offset-1">
									<h6 class="font-size-14 font-weight-medium text-uppercase ltr-sp-2">Buy Airtime</h6>
								</div><!-- /.col-md-2 -->


							</div><!-- /.row -->
						</div><!-- /.col-md-12 -->

					</div><!-- /.titlebar-row -->
				</div><!-- /.titlebar-container -->
			</div><!-- /.titlebar-inner -->
			
		</div><!-- /.titlebar -->
	
		
		<main id="content" class="content">
					
			<section class="vc_row pb-50 bg-cover bg-center" style="background: rgb(228, 228, 240);">
				
				<div class="container">
					<div class="row" style="padding-left: 20px; padding-right: 20px;">
						
						<div class="lqd-column col-md-12 px-4 pb-30 bg-white box-shadow-1">
							
							<div class="lqd-column-inner bg-white border-radius-6 px-3 px-md-4 pt-40 pb-40">


								<div class="contact-form contact-form-button-block font-size-14">
									<form novalidate="novalidate">

                                        <div class="row d-flex flex-wrap">
                                            <div class="lqd-column col-md-6 mb-20">
											<select id="netWorkSelection" class="bg-gray text-dark mb-30" aria-required="true" aria-invalid="false" >
												<option>-Select Network Provider-</option>
												<option value="MTN">MTN</option>
												<option value="GLO">GLO</option>
												<option value="AIRTEL">AIRTEL</option>
												<option value="9MOBILE">9MOBILE</option>
											</select>
                                                <input class="bg-gray text-dark mb-30" id="airtimeValue" type="text" name="airtimeValue" aria-required="true" aria-invalid="false" placeholder="AIRTIME VALUE (50-50,000)" required>
                                                <input id="phoneNo" class="bg-gray text-dark mb-30" type="email" name="mobileNo" aria-required="true" aria-invalid="false" placeholder="ENTER MOBILE NUMBER" required>
                                               
                                            </div><!-- /.col-md-6 -->
                                            <div class="lqd-column col-md-6 mb-20">
											<input id="amountToPay" disabled="true" style="cursor: not-allowed;" class="bg-gray text-dark mb-30" type="text" name="amountToPay" aria-required="true" aria-invalid="false" placeholder="AMOUNT TO PAY (4% Discount)" required>
												<select id="autoRenew" class="bg-gray text-dark mb-30" aria-required="true" aria-invalid="false" >
												<option>-Auto Renew-</option>
												<option>NO</option>
												<option>YES</option>
											</select>
                                            </div><!-- /.col-md-12 -->
                                            <div class="lqd-column col-md-6 text-md-right">
											<button id="submitBTN" style="cursor: pointer;" onclick="$.fn.submit_data()" type="button"><span id="submitBtnTxt">BUY NOW </span><img id="submitBTNLoaderImg" src="images/loading.gif" style="width: 50px; height:50px; display:none" /></button>
                                            </div><!-- /.col-md-6 -->
                                        </div><!-- /.row -->
									</form>
									<div class="contact-form-result hidden"></div><!-- /.contact-form-result -->
								</div><!-- /.contact-form -->

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
<script src="js/generalOp.js"></script>
<script src="./assets/js/theme-vendors.js"></script>
<script src="./assets/js/theme.min.js"></script>
<script src="./assets/js/liquidAjaxMailchimp.min.js"></script>

<script>
	var static_data = {
		serviceID:""
	};
		 $.fn.submit_data = function(){ 
			var airTime_amount = $("#airtimeValue").val();
			var autoRenewRaw = $("#autoRenew").val();
			var phoneNo = $("#phoneNo").val();

			if(phoneNo.length > 0){
			if(airTime_amount.length <= 0){
				$.fn.confirm("Pls Enter Airtime Amount ","red",function(){});
			}else{
				
				if(autoRenewRaw === "-Auto Renew-"){
					autoRenewRaw = "NO";
				}

				dispSubmitBtnLoader();
				$.get( "api/process_buyService.php",{
				serviceID: static_data.serviceID,
				autoRenew: autoRenewRaw,
				phoneNo: phoneNo,
				airTime_amount: airTime_amount
				}, function( result ) {
					if(result === "100111"){
						$.fn.notification("Erro purchasing data -- Pls try again","red");
						clearSubmitBtnLoader();
					}else{
						$.fn.notification("Data purchase successsfull","green");
						clearSubmitBtnLoader();
					}
				});

			}
		}else{
			$.fn.confirm("Enter mobile number","red",function(){});
		}
			
		 }
		 $.fn.getServiceID_and_setAmtp = function(){ 
			var val = $("#netWorkSelection").val();
			
			$.get( "api/get_profit_margin.php",{
				networkProvider: val,
				serviceType: "AIRTIME",
			}, function( profitMargin ) {
				$.get( "api/getServices.php",{
				networkProvider: val,
				serviceType: "AIRTIME",
			}, function( data ) {
				var json_data = JSON.parse(data);
					static_data.serviceID = json_data[0].id;
		  getE("amountToPay").value = (parseInt($("#airtimeValue").val()) - (parseFloat(json_data[0].cost) * parseInt($("#airtimeValue").val())) )+ parseInt(JSON.parse(profitMargin)[0].profit);	
			
		});

			});
		 }
		 
		 $("#airtimeValue").keypress(function (event) {
			$.fn.getServiceID_and_setAmtp();
		 });

		 function dispSubmitBtnLoader(){
			 getE("submitBTNLoaderImg").style.display = "block";
			 getE("submitBtnTxt").style.display = "none";
			 getE("submitBTN").disabled = true;
			 getE("submitBTN").style.cursor = "not-allowed";
		 }

		 function clearSubmitBtnLoader(){
			 getE("submitBTNLoaderImg").style.display = "none";
			 getE("submitBtnTxt").style.display = "block";
			 getE("submitBTN").disabled = false;
			 getE("submitBTN").style.cursor = "pointer";
		 }

		 function getE(id){
			 return document.getElementById(id);
		 }
</script>
</body>
</html>