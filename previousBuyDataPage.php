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
	<link rel="stylesheet" href="assets/css/theme.css" />
	<link rel="stylesheet" href="assets/css/themes/seo.css" />
	<link rel="stylesheet" href="css/jBox.all.min.css" />
	<link rel="stylesheet" href="css/nl_addition.css" />
	
	<!-- Head Libs -->
	<script async src="assets/vendors/modernizr.min.js"></script>
	
</head>
<body data-mobile-nav-trigger-alignment="right" data-mobile-nav-align="left" data-mobile-nav-style="modern" data-mobile-nav-shceme="gray" data-mobile-header-scheme="gray" data-mobile-nav-breakpoint="1199">
	
	<div id="wrap">
	<div class="titlebar scheme-light" data-parallax="true" data-parallax-options='{ "parallaxBG": true }' style="background-image: url(images/people/5.jpg);">
			
		<?php
		include 'header.php';
		include 'api/connect.php';
		include 'api/clearReset_key_table.php';
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
											<span class="keyword active">Data</span>
											<span class="keyword">Airtime</span>
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
									<h6 class="font-size-14 font-weight-medium text-uppercase ltr-sp-2">Buy Data</h6>
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
												<?php 

											$handle2 = "SELECT * FROM networks WHERE status='1' AND type='DATA_AIRTIME'";
											$result2 = $conn->query($handle2);
											if ($result2->num_rows > 0) {
												while($row = $result2->fetch_assoc()) {
													echo '<option value="'.$row["name"].'">'.$row["name"].'</option>';
												}
											}
													?>
											</select>
											<select id="plans" class="bg-gray text-dark mb-30" aria-required="true" aria-invalid="false" >
												<option>-Data Plan-</option>
											</select>
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
											<button id="submitBTN" class="lamboSubmitBTN" style="cursor: pointer;" onclick="$.fn.submit_data()" type="button"><span id="submitBtnTxt">BUY NOW </span><img id="submitBTNLoaderImg" src="images/loading.gif" style="width: 50px; height:50px; display:none" /></button>
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
<script src="./assets/js/theme.js"></script>
<script src="./assets/js/liquidAjaxMailchimp.min.js"></script>
<script>
		 $.fn.submit_data = function(){ 
			var userEmail = "<?php echo $email; ?>";
			 if(userEmail.length <= 0){
				 window.location = "login.php";
			 }else{
			var planRaw = $("#plans").val();
			var autoRenewRaw = $("#autoRenew").val();
			var phoneNo = $("#phoneNo").val();

			if(phoneNo.length > 0){
			if(planRaw === "-Data Plan-"){
				$.fn.confirm("Pls Select a Data Plan ","red",function(){});
			}else{
				var plan = planRaw.split("|");
				if(autoRenewRaw === "-Auto Renew-"){
					autoRenewRaw = "NO";
				}

				dispSubmitBtnLoader();
				$.get( "api/process_buyService.php",{
				serviceID: plan[0],
				autoRenew: autoRenewRaw,
				phoneNo: phoneNo
				}, function( result ) {
					if(result === "100111"){
						$.fn.notification("Erro purchasing data -- Pls try again","red");
						clearSubmitBtnLoader();
					}else if(result === "100119"){
						$.fn.notification("Insufficient Balance","red");
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
			
		 }
		 $.fn.getDataPlans = function(){ 
			var val = $("#netWorkSelection").val();
			
			$.get( "api/get_profit_margin.php",{
				networkProvider: val,
				serviceType: "DATA",
			}, function( profitMargin ) {
				$.get( "api/getServices.php",{
				networkProvider: val,
				serviceType: "DATA",
			}, function( data ) {
				if(data.length > 0){
					try{
						var json_data = JSON.parse(data);
				var optionsCollections = "<option>-Data Plan-</option>"
          json_data.forEach((element) => {
				var wrkStr = '<option value="'+element.id+'|'+(parseInt(element.cost) + parseInt(JSON.parse(profitMargin)[0].profit) )+'">'+element.type+'    =    ₦ '+(parseInt(element.cost) + parseInt(JSON.parse(profitMargin)[0].profit) )+'   '+element.validity+'</option>';
				optionsCollections = optionsCollections + wrkStr;
		  });	
		  $("#plans").html(optionsCollections);
					}catch(e){
		console.log(e);
					}
				}else{
					$("#plans").html("<option>-Data Plan-</option>");
				}
			});

			});
		 }
		 
		 $("#netWorkSelection").change(function () {
			$.fn.getDataPlans();
		 });
		 $("#plans").change(function(){
			var val = $(this).val();
			if(val === "-Data Plan-"){
			}else{
			var cost = val.split("|");
			var cost_sub = <?php 
			 $accType = "";

			 $handle2 = "SELECT accType FROM users WHERE email='$email'";
		 $result2 = $conn->query($handle2);
		 if ($result2->num_rows > 0) {
			 while($row = $result2->fetch_assoc()) {
				 $accType = $row["accType"];
				 if(strcmp($accType,"Enduser") == 0){
					 $accType = "0";
					}else if(strcmp($accType,"Reseller") == 0){
						$accType = "8.9";
					   }else if(strcmp($accType,"Portal-Owner") == 0){
						$accType = "12";
					   }
					   echo ((int)$accType/100);
			 }
		 }else{
			 echo "0";
		 }
			?> * cost[1];
			var calcost = cost[1] - cost_sub;
			getE("amountToPay").value = "₦ "+calcost;
			}
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
<?php
	include 'api/footerAdditions.php'
	?>
</body>
</html>