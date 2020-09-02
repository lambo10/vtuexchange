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
	<link rel="stylesheet" href="assets/css/theme.css" />
	<link rel="stylesheet" href="assets/css/themes/seo.css" />
	<link rel="stylesheet" href="css/jBox.all.min.css" />
	<link rel="stylesheet" href="css/nl_addition.css" />
	
	<!-- Head Libs -->
	<script async src="assets/vendors/modernizr.min.js"></script>
	
</head>
<body data-mobile-nav-trigger-alignment="right" data-mobile-nav-align="left" data-mobile-nav-style="modern" data-mobile-nav-shceme="gray" data-mobile-header-scheme="gray" data-mobile-nav-breakpoint="1199">
	
	<div id="wrap">
    <?php 
	include 'header2.php';
	include 'api/connect.php'
    ?>
		
		<main id="content" class="content">

			<section class="vc_row pt-50 pb-50 bg-cover bg-center" style="background: rgb(228, 228, 240);">
				
				<div class="lqd-particles-bg-wrap">
					
				</div><!-- /.lqd-particles-bg-wrap -->
				
				<div class="container">
					<div class="row" style="padding-left: 20px; padding-right: 20px;">
						
						<div class="lqd-column col-md-12 px-4 pt-45 pb-30 bg-white box-shadow-1">
							
							<div class="lqd-column-inner bg-white border-radius-6 px-3 px-md-4 pt-40 pb-40">

								<header class="fancy-title">
                                    <div><img src="images/power.svg" style="width: 80px; height: 80px;" /><span style="font-size: 25px;">Buy Power</span></div>
								</header><!-- /.fancy-title -->

								<div class="contact-form contact-form-button-block font-size-14">
									<form novalidate="novalidate">

                                        <div class="row d-flex flex-wrap">
                                            <div class="lqd-column col-md-6 mb-20">
                                                <select id="ElectricCompany" class="bg-gray text-dark mb-30" aria-required="true" aria-invalid="false" >
                                                    <option>-Electricity Company-</option>
                                                    <?php 

											$handle2 = "SELECT * FROM networks WHERE status='1' AND type='POWER'";
											$result2 = $conn->query($handle2);
											if ($result2->num_rows > 0) {
												while($row = $result2->fetch_assoc()) {
													echo '<option value="'.$row["name"].'">'.$row["name"].'</option>';
												}
											}
													?>
                                                </select>
                                                <select id="meterType" class="bg-gray text-dark mb-30" aria-required="true" aria-invalid="false" >
                                                    <option value="00">-Meter Type-</option>
                                                    <option value="01">Prepaid</option>
                                                    <option value="02">Postpaid</option>
                                                </select>
                                                <input id="meterNumber" class="bg-gray text-dark mb-30" type="number" name="meter_no" aria-required="true" aria-invalid="false" placeholder="METER NUMBER -> " required>
                                            </div><!-- /.col-md-6 -->
                                            <div class="lqd-column col-md-6 mb-20">
                                                
                                                <input id="phoneNo" class="bg-gray text-dark mb-30" type="number" name="phone_no" aria-required="true" aria-invalid="false" placeholder="PHONE NUMBER -> " required>
                                                <input id="sub_amount" class="bg-gray text-dark mb-30" type="number" name="amount" aria-required="true" aria-invalid="false" placeholder="Amount" required>
                                                <select class="bg-gray text-dark mb-30" aria-required="true" aria-invalid="false" >
                                                    <option>-Auto Renew-</option>
                                                    <option>NO</option>
                                                    <option>YES</option>
                                                </select>
                                            </div><!-- /.col-md-12 -->
                                            <div class="lqd-column col-md-6 text-md-right" style="padding-top: 10px;">
                                            <button id="verifyBTN" class="lamboSubmitBTN" style="cursor: pointer;" onclick="$.fn.verifyMeterNo()" type="button"><span id="verifyBtnTxt">VERIFY METER NUMBER </span><img id="verifyBTNLoaderImg" src="images/loading.gif" style="width: 50px; height:50px; display:none" /></button>

                                            </div><!-- /.col-md-6 -->
                                            <div class="lqd-column col-md-6 text-md-right" style="padding-top: 10px;">
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
	var static_data = {
		serviceID:""
	};

	$.fn.verifyMeterNo = function(){ 
            var ElectricCompany = $("#ElectricCompany").val();
            var meterNumber = $("#meterNumber").val();

                if(meterNumber.length <= 0){
                    $.fn.confirm("Enter Meter Number ","red",function(){});
                    }else{
                        if(ElectricCompany === "-Electricity Company-"){
                        $.fn.confirm("Pls Select -Electricity Company- ","red",function(){});
                        }else{

				dispVerifyBtnLoader();
				$.get( "api/process_buyService.php",{
                ElectricCompany: ElectricCompany,
                meterNumber: meterNumber,
                sub_service_type:"VERIFY_METER_NO"
				}, function( result ) {
					if(result === "100111"){
						$.fn.notification("Erro Verifying Meter No -- Pls try again","red");
						clearVerifyBtnLoader();
					}else{
						$.fn.confirm(result,"#808291",function(){});
						clearVerifyBtnLoader();
					}
				});

			
            }
            }
			
		 }

		 $.fn.submit_data = function(){ 
			var sub_amount = $("#sub_amount").val();
			var autoRenewRaw = $("#autoRenew").val();
			var phoneNo = $("#phoneNo").val();
            var ElectricCompany = $("#ElectricCompany").val();
            var meterType = $("#meterType").val();
            var meterNumber = $("#meterNumber").val();

			if(phoneNo.length > 0){
                if(meterType === "00"){
                    $.fn.confirm("Pls Select -Meter Type- ","red",function(){});
                    }else{
                        if(ElectricCompany === "-Electricity Company-"){
                        $.fn.confirm("Pls Select -Electricity Company- ","red",function(){});
                        }else{
			if(sub_amount.length <= 0){
				$.fn.confirm("Pls Enter Amount ","red",function(){});
			}else{
				
				if(autoRenewRaw === "-Auto Renew-"){
					autoRenewRaw = "NO";
				}

				dispSubmitBtnLoader();
				$.get( "api/process_buyService.php",{
                ElectricCompany: ElectricCompany,
                meterType: meterType,
                meterNumber: meterNumber,
				autoRenew: autoRenewRaw,
				phoneNo: phoneNo,
				sub_amount: sub_amount,
                sub_service_type:"POWER"
				}, function( result ) {
					if(result === "100111"){
						$.fn.notification("Erro purchasing Power -- Pls try again","red");
						clearSubmitBtnLoader();
					}else if(result === "100119"){
						$.fn.notification("Insufficient Balance","red");
						clearSubmitBtnLoader();
					}else{
						$.fn.notification("Power purchase successsfull","green");
						clearSubmitBtnLoader();
					}
				});

			}
            }
            }
		}else{
			$.fn.confirm("Enter mobile number","red",function(){});
		}
			
		 }

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

		 function dispVerifyBtnLoader(){
			 getE("verifyBTNLoaderImg").style.display = "block";
			 getE("verifyBtnTxt").style.display = "none";
			 getE("verifyBTN").disabled = true;
			 getE("verifyBTN").style.cursor = "not-allowed";
		 }

		 function clearVerifyBtnLoader(){
			 getE("verifyBTNLoaderImg").style.display = "none";
			 getE("verifyBtnTxt").style.display = "block";
			 getE("verifyBTN").disabled = false;
			 getE("verifyBTN").style.cursor = "pointer";
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