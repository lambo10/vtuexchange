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
	include 'api/connect.php';
    ?>
		
		<main id="content" class="content">

			<section class="vc_row pt-50 pb-50 bg-cover bg-center" style="background: rgb(228, 228, 240);">
				
				
				<div class="container">
					<div class="row" style="padding-left: 20px; padding-right: 20px;">
						
						<div class="lqd-column col-md-12 px-4 pt-45 pb-30 bg-white box-shadow-1">
							
							<div class="lqd-column-inner bg-white border-radius-6 px-3 px-md-4 pt-40 pb-40">

								<header class="fancy-title">
                                    <div><img src="images/tv.svg" style="width: 80px; height: 80px;" /><span style="font-size: 25px;">Tv Subscription</span></div>
								</header><!-- /.fancy-title -->

								<div class="contact-form contact-form-button-block font-size-14">
									<form novalidate="novalidate">

                                        <div class="row d-flex flex-wrap">
                                            <div class="lqd-column col-md-6 mb-20">
                                                <select id="netWorkSelection" class="bg-gray text-dark mb-30" aria-required="true" aria-invalid="false" >
                                                    <option value="-Tv Subscription-">-Tv Subscription-</option>
                                                    <?php 

											$handle2 = "SELECT * FROM networks WHERE status='1' AND type='TV_SUB'";
											$result2 = $conn->query($handle2);
											if ($result2->num_rows > 0) {
												while($row = $result2->fetch_assoc()) {
													echo '<option value="'.$row["name"].'">'.$row["name"].'</option>';
												}
											}
													?>
                                                </select>
                                                <select id="Bouquet_Package" class="bg-gray text-dark mb-30" aria-required="true" aria-invalid="false" >
                                                    <option>-Bouquet/Package-</option>
                                                </select>
                                                <input id="smartCard_iucNo" class="bg-gray text-dark mb-30" type="text" aria-required="true" aria-invalid="false" placeholder="SMARTCARD/IUC NUMBER ->" required>
                                               
                                            </div><!-- /.col-md-6 -->
                                            <div class="lqd-column col-md-6 mb-20">
                                                <input id="amountToPay" class="bg-gray text-dark mb-30" type="text" name="amountToPay" aria-required="true" aria-invalid="false" placeholder="AMOUNT TO PAY (4% Discount)" required>
                                                <select class="bg-gray text-dark mb-30" aria-required="true" aria-invalid="false" >
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
			var Bouquet_PackageRaw = $("#Bouquet_Package").val();
			var autoRenewRaw = $("#autoRenew").val();
			var smartCard_iucNo = $("#smartCard_iucNo").val();

			if(smartCard_iucNo.length > 0){
			if(Bouquet_PackageRaw === "-Bouquet/Package-"){
				$.fn.confirm("Pls Select a Bouquet_Package ","red",function(){});
			}else{
				var Bouquet_Package = Bouquet_PackageRaw.split("|");
				if(autoRenewRaw === "-Auto Renew-"){
					autoRenewRaw = "NO";
				}

				dispSubmitBtnLoader();
				$.get( "api/process_buyService.php",{
				serviceID: Bouquet_Package[0],
				autoRenew: autoRenewRaw,
				smartCard_iucNo: smartCard_iucNo
				}, function( result ) {
					if(result === "100111"){
						$.fn.notification("Erro purchasing Bouquet -- Pls try again","red");
						clearSubmitBtnLoader();
					}else if(result === "100119"){
						$.fn.notification("Insufficient Balance","red");
						clearSubmitBtnLoader();
					}else{
						$.fn.notification("Bouquet purchase successsfull","green");
						clearSubmitBtnLoader();
					}
				});

			}
		}else{
			$.fn.confirm("Enter SMARTCARD/IUC NUMBER","red",function(){});
		}
			
		 }
		 $.fn.getDataBouquet_Packages = function(){ 
			var val = $("#netWorkSelection").val();
			
			$.get( "api/get_profit_margin.php",{
				networkProvider: val,
				serviceType: "TV_SUB",
			}, function( profitMargin ) {
				$.get( "api/getServices.php",{
				networkProvider: val,
				serviceType: "TV_SUB",
			}, function( data ) {
				if(data.length > 0){
				var json_data = JSON.parse(data);
				var optionsCollections = "<option>-Bouquet/Package-</option>"
          json_data.forEach((element) => {
				var wrkStr = '<option value="'+element.id+'|'+(parseInt(element.cost) + parseInt(JSON.parse(profitMargin)[0].profit) )+'">'+element.type+'    =    ₦ '+(parseInt(element.cost) + parseInt(JSON.parse(profitMargin)[0].profit) )+'   '+element.validity+'</option>';
				optionsCollections = optionsCollections + wrkStr;
		  });		
		  $("#Bouquet_Package").html(optionsCollections);
		}else{
					$("#Bouquet_Package").html("<option>-Bouquet/Package-</option>");
				}	
			});

			});
		 }
		 
		 $("#netWorkSelection").change(function () {
			$.fn.getDataBouquet_Packages();
		 });
		 $("#Bouquet_Package").change(function(){
			var val = $(this).val();
			if(val === "-Bouquet/Package-"){
			}else{
			var cost = val.split("|");
			getE("amountToPay").value = "₦ "+cost[1];
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