
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
		<?php
		include 'header2.php';
		include 'api/connect.php';
		$commission = "";

        $handle2 = "SELECT commission FROM users WHERE email='$email'";
    $result2 = $conn->query($handle2);
    if ($result2->num_rows > 0) {
        while($row = $result2->fetch_assoc()) {
            $commission = $row["commission"];
        }
    }
		?>
		
		<main id="content" class="content">
			
			<section class="vc_row pt-50 pb-50 bg-cover bg-center" style="background: rgb(228, 228, 240);">
							
				<div class="container">
					<div class="row" style="padding-left: 20px; padding-right: 20px;">
						
						<div class="lqd-column col-md-12 px-4 pt-45 pb-30 bg-white box-shadow-1">
							
							<div class="lqd-column-inner bg-white border-radius-6 px-3 px-md-4 pt-40 pb-40">

								<header class="fancy-title">
									<div><span style="font-size: 25px;">Withdraw</span></div>
									<div>Commission Balance: ₦<span id="balanceDisp"><?php echo $commission; ?></span></div>
								</header><!-- /.fancy-title -->

								<div class="contact-form contact-form-button-block font-size-14">
									<form novalidate="novalidate">

                                        <div class="row d-flex flex-wrap">
                                            <div class="lqd-column col-md-12 mb-20">
                                                   <input class="bg-gray text-dark mb-30" type="number" id="amount" name="amount" aria-required="true" aria-invalid="false" placeholder="Amount" required>
												   <input class="bg-gray text-dark mb-30" type="text" id="AccountName" name="Account Name" aria-required="true" aria-invalid="false" placeholder="Account Name" required>
												   <input class="bg-gray text-dark mb-30" type="text" id="BankName" name="Bank Name" aria-required="true" aria-invalid="false" placeholder="Bank Name" required>
												   <input class="bg-gray text-dark mb-30" type="text" id="AccountNo" name="Account No" aria-required="true" aria-invalid="false" placeholder="Account No" required>
                                                
                                                <button id="submitBTN" class="lamboSubmitBTN" style="cursor: pointer;" onclick="$.fn.submit_data()" type="button"><span id="submitBtnTxt">Withdraw </span><img id="submitBTNLoaderImg" src="images/loading.gif" style="width: 50px; height:50px; display:none" /></button>
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
			var amount = $("#amount").val();
			var accountName = $("#AccountName").val();
			var bankName = $("#BankName").val();
			var accountNo = $("#AccountNo").val();

            if(amount.length <= 0){
				$.fn.confirm("Pls Enter Amount ","red",function(){});
			}else if(accountName.length <= 0){
				$.fn.confirm("Pls Enter Account Name ","red",function(){});
			}else if(bankName.length <= 0){
				$.fn.confirm("Pls Enter Bank Name ","red",function(){});
			}else if(accountNo.length <= 0){
				$.fn.confirm("Pls Enter Account No ","red",function(){});
			}
			else{
				dispSubmitBtnLoader();
				$.get( "api/process_commission_withdrawal.php",{
				amount: amount,
				accountName: accountName,
				bankName: bankName,
				accountNo: accountNo
				}, function( result ) {
					if(result === "100111" || result === "100012" || result === "100015"){
						$.fn.notification("Erro Transferring funds -- Pls try again","red");
						clearSubmitBtnLoader();
					}else if(result === "100013"){
						$.fn.notification("Not Enough funds","red");
						clearSubmitBtnLoader();
					}else if(result === "11111"){
						$.fn.notification("Request made successfully","green");
						clearSubmitBtnLoader();
					}else{
						$.fn.notification("Erro making request -- Pls try again","red");
						clearSubmitBtnLoader();
					}
					$.fn.get_AccBalance();
				});
			}
			
	 
	 }
	 $.fn.get_AccBalance = function(){ 
		$.get( "api/get_commission_balance.php",{},function(result){
			getE("balanceDisp").innerHTML = result;
			 });
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

		 function getE(id){
			 return document.getElementById(id);
		 }
</script>
<?php
	include 'api/footerAdditions.php'
	?>
</body>
</html>