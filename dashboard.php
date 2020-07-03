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
	<div class="titlebar scheme-light" data-parallax="true" data-parallax-options='{ "parallaxBG": true }' style="background-image: url(images/people/11.jpg);">
			
        <?php
        include 'api/connect.php';
        include 'header.php';
        
        $phone = "";
        $AccBalance = "";
        $whoReferredID = "";
        $referralID = "";

        $handle2 = "SELECT * FROM users WHERE email='$email'";
    $result2 = $conn->query($handle2);
    if ($result2->num_rows > 0) {
        while($row = $result2->fetch_assoc()) {
            $phone = $row["phone"];
            $AccBalance = $row["AccBalance"];
            $whoReferredID = $row["whoReferredID"];
            $referralID = $row["referralID"];
        }
    }
		?>

<div>
<br><br>
</div>

			<div class="titlebar-inner py-0 mt-0" >
				<div class="container titlebar-container">
					<div class="row titlebar-container" style="padding-left: 20px; padding-right: 20px;">

						<div class="titlebar-col col-md-12 bg-white pt-10 bg-white box-shadow-1">
							<div class="row">

								<div class="col-md-2 col-md-offset-1">
									<h6 class="font-size-14 font-weight-medium text-uppercase ltr-sp-2">Dashboard</h6>
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
                                    <div class="">

<div class="iconbox text-left iconbox-semiround iconbox-xl iconbox-filled iconbox-filled  iconbox-scale-bg" style="width:100%; box-shadow:0 25px 70px rgba(0, 0, 0, 0.3); padding:25px 3%">
    
    <div class="contents">
        <h3><?php echo $name; ?></h3>
        <p><span><a href="api/logout.php" style="color: red;">(logout)</a></span></p>
        
    </div><!-- /.contents -->
</div><!-- /.iconbox -->

</div>
                                        <div class="row d-flex flex-wrap">
                                            
                                            <div class="lqd-column col-md-6 mb-20">

                                            <div class="iconbox text-left iconbox-semiround iconbox-xl iconbox-filled iconbox-filled  iconbox-scale-bg" style="width:100%; box-shadow:0 25px 70px rgba(0, 0, 0, 0.3); padding:25px 3%">
    
                                            <div class="contents" style="width:100%">
                                            <div class="label label-success">Wallet</div>
                                                <div style="text-align: center;"><h3>₦ <?php echo $AccBalance; ?></h3></div>
                                                <p><span><a href="fundAccount.php" style="color: blue;"><u>Deposit Money</u></a></span></p>
                                                <p><span><a href="deposite.php" style="color: blue;"><u>View Deposit History</u></a></span></p>
                                            </div><!-- /.contents -->
                                        </div><!-- /.iconbox -->

                                                                                          </div><!-- /.col-md-6 -->
                                            <div class="lqd-column col-md-6 mb-20">
                                            <div class="iconbox text-left iconbox-semiround iconbox-xl iconbox-filled iconbox-filled  iconbox-scale-bg" style="width:100%; box-shadow:0 25px 70px rgba(0, 0, 0, 0.3); padding:25px 3%">
    
    <div class="contents" style="width:100%">
    <div class="label label-success">Commission</div>
        <div style="text-align: center;"><h3>N0.00</h3></div>
        <div class="row">
        <div class="col-md-4"><span><a href="deposite.php" style="color: blue;"><u>Withdraw Commission</u></a></span></div>
        <div class="col-md-5"><span><a href="deposite.php" style="color: blue;"><u>View Commission History</u></a></span></div>
        <div class="col-md-5"><span><a href="deposite.php" style="color: blue;"><u>View Referral/Downline</u></a></span></div>
        </div>
        
    </div><!-- /.contents -->
</div><!-- /.iconbox -->
                                            </div><!-- /.col-md-12 -->
                                        </div><!-- /.row -->
                                    </form>
                                    <div class="row d-flex flex-wrap">
                                            
                                            <div class="lqd-column col-md-6 mb-20">

                                            <div class="iconbox text-left iconbox-semiround iconbox-xl iconbox-filled iconbox-filled  iconbox-scale-bg" style="width:100%; box-shadow:0 25px 70px rgba(0, 0, 0, 0.3); padding:25px 3%">
    
                                            <div class="contents" style="width:100%">
                                                <div style="text-align: left;"><h3>SELF SERVICE</h3></div>
                                                <p>Instantly resolve issues with</p>
                                                <p><span><a href="deposite.php" style="color: #f51f8a;"><span>ATMCard</span></a></span>, <span><a href="deposite.php" style="color: #f51f8a;">BankDeposit</a></span>, 
                                                <span><a href="deposite.php" style="color: #f51f8a;"><span>Airtime</span></a></span>, <span><a href="deposite.php" style="color: #f51f8a;">Databundle</a></span>, 
                                                <span><a href="deposite.php" style="color: #f51f8a;"><span>CableTV</span></a></span>, <span><a href="deposite.php" style="color: #f51f8a;">Electricity</a></span></p>
                                            </div><!-- /.contents -->
                                        </div><!-- /.iconbox -->

                                                                                          </div><!-- /.col-md-6 -->
                                            <div class="lqd-column col-md-6 mb-20">
                                            <div class="iconbox text-left iconbox-semiround iconbox-xl iconbox-filled iconbox-filled  iconbox-scale-bg" style="width:100%; box-shadow:0 25px 70px rgba(0, 0, 0, 0.3); padding:25px 3%">
    
    <div class="contents" style="width:100%">
        <div style="text-align: left;"><h3>DEPOSIT NOTIFICATION</h3></div>
        <p>Have you made a payment but your wallet was not credited? <br> >> <a href="#" style="color: #f51f8a;">NOTIFY US</a></p>
        
    </div><!-- /.contents -->
</div><!-- /.iconbox -->
                                            </div><!-- /.col-md-12 -->
                                        </div><!-- /.row -->

                                        <div class="iconbox text-left iconbox-semiround iconbox-xl iconbox-filled iconbox-filled  iconbox-scale-bg alert-info" style="width:100%; box-shadow:0 25px 70px rgba(0, 0, 0, 0.3); padding:25px 3%">
    
    <div class="contents">
        
        <p>Join Our Referral Program To Earn Extra Income... >> <span><a href="referral.php" style="color: red;"> CLICK HERE</a></span></p>
        <p>Start your own recharge card printing business today >> <span><a href="printRechargeCard.php" style="color: red;"> CLICK HERE</a></span></p>
        <br>
        <p>Pay DStv, GOtv & StarTimes Subscription - instant activation >> <span><a href="buyCableTvSub.php" style="color: red;"> CLICK HERE</a></span></p>
        <p>Electricity Bill Payment e.g EKEDC, IKEDC, AEDC, PHEDC e.t.c - instant activation >> <span><a href="buyPower.php" style="color: red;"> CLICK HERE</a></span></p>
        <br>
        <p>Transfer Money From Wallet to Wallet >> <span><a href="transferFund.php" style="color: red;"> CLICK HERE</a></span></p>
        <br>
        <p>Developer API >> <span><a href="developer.php" style="color: red;"> CLICK HERE</a></span></p>
        <br>
        <p>Referral Link: https://www.clubkonnect.com/?id=CK100062353<span></p>
        <br>
        <p><a style="color: red;" href="edithProfile.php">Edit Profile</a> <> <a style="color: red;" href="changePassword.php">Change Password</a></p>     
    </div><!-- /.contents -->
</div><!-- /.iconbox -->
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
<script src="./assets/js/theme-vendors.js"></script>
<script src="./assets/js/theme.min.js"></script>
<script src="./assets/js/liquidAjaxMailchimp.min.js"></script>
<script>
	$.fn.submit_data = function(){ 
			var networkProvider = $("#netWorkSelection").val();
			var airtimeValue = $("#airtimeValue").val();
			var mobileNo = $("#mobileNo").val();
			alert(networkProvider);
		 }
</script>
</body>
</html>