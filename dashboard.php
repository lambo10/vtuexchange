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
	<link rel="stylesheet" href="css/nl_addition.css" />
	
	<!-- Head Libs -->
	<script async src="assets/vendors/modernizr.min.js"></script>
	
</head>
<body onload="$.fn.disp_welcome_msg()" data-mobile-nav-trigger-alignment="right" data-mobile-nav-align="left" data-mobile-nav-style="modern" data-mobile-nav-shceme="gray" data-mobile-header-scheme="gray" data-mobile-nav-breakpoint="1199">
	
	<div id="wrap">
	<div class="titlebar scheme-light" data-parallax="true" data-parallax-options='{ "parallaxBG": true }' style="background-image: url(images/people/11.jpg);">
			
        <?php
        include 'api/connect.php';
        include 'header.php';
        include 'api/clearReset_key_table.php';
        
        $phone = "";
        $AccBalance = "";
        $whoReferredID = "";
        $referralID = "";
        $accType = "";

        $handle2 = "SELECT * FROM users WHERE email='$email'";
    $result2 = $conn->query($handle2);
    if ($result2->num_rows > 0) {
        while($row = $result2->fetch_assoc()) {
            $phone = $row["phone"];
            $AccBalance = $row["AccBalance"];
            $whoReferredID = $row["whoReferredID"];
            $referralID = $row["referralID"];
            $commission = $row["commission"];
            $accType = $row["accType"];

            
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
							
							<div class="lqd-column-inner bg-white border-radius-6 px-3 px-md-4 pt-40 pb-10">


								<div class="contact-form contact-form-button-block font-size-14">
									<form novalidate="novalidate">
                                    <div class="">

<div class="iconbox text-left iconbox-semiround iconbox-xl iconbox-filled iconbox-filled  iconbox-scale-bg" style="width:100%; background: #0F79BD; color:white">
    <div class="contents" style="width: 100%;">
    <div>
        <span style="font-size: 22px;" class="fa fa-user"></span>
        <span style="font-size: 22px;"><?php echo $name; ?></span>
        <p><?php echo $email; ?></p>
        <p><?php echo $phone; ?></p>
        <p><span><a href="api/logout.php" style="color: #DAE1E5;">(logout)</a></span></p>
        
    </div>
    </div>
    <!-- /.contents -->
</div><!-- /.iconbox -->

</div>
                                        <div class="row d-flex flex-wrap">
                                            
                                            <div class="lqd-column col-md-6 mb-20">

                                            <div class="iconbox text-left iconbox-semiround iconbox-xl iconbox-filled iconbox-filled  iconbox-scale-bg" style="width:100%; background: #8756DE; color:white">
    
                                            <div class="contents" style="width:100%">
                                            <span style="font-size: 23px;" class="fas fa-wallet"></span>
                                            <span style="text-align: left; font-size:23px;">Wallet</span>
                                                <p style="text-align: left; font-size: 25px;">₦<?php echo $AccBalance; ?></p>
                                                <p style="text-align: left;">
                                                <p><span><a href="fundAccount.php" style="color: #DAE1E5;">Deposit Money</a></span></p>
                                                <p><span><a href="deposite.php" style="color: #DAE1E5;">View Deposit History</a></span></p>
                                                </p>
                                            </div><!-- /.contents -->
                                        </div><!-- /.iconbox -->

                                                                                          </div><!-- /.col-md-6 -->
                                            <div class="lqd-column col-md-6 mb-20">
                                            <div class="iconbox text-left iconbox-semiround iconbox-xl iconbox-filled iconbox-filled  iconbox-scale-bg" style="width:100%; background: #EF2019; color:white">
    
    <div class="contents" style="width:100%">
    <span style="font-size: 23px;" class="fa fa-money"></span>
    <span style="text-align: left; font-size:23px;">Commission</span>
        <p style="text-align: left; font-size: 25px;">₦<?php echo $commission; ?></p>
        <p  style="text-align: left;">
        <p class=""><span><a href="withdrawCommission.php" style="color: #DAE1E5;">Withdraw Commission</a></span></div>
        <p class=""><span><a href="referral.php" style="color: #DAE1E5;">View Referral/Downline</a></span></div>
        </p>
        
    </div><!-- /.contents -->
</div><!-- /.iconbox -->
                                            </div><!-- /.col-md-12 -->
                                        </div><!-- /.row -->
                                    </form>
                                    <div style="text-align: center;">
                                        For issues, compliants and support regarding any transactions kindly contact us via: <a href="mailto:support@diligentmart.com"><span style="color: blue;"><b>support@diligentmart.com</b></span></a>
                                    </div>
									<div class="contact-form-result hidden"></div><!-- /.contact-form-result -->
                                </div><!-- /.contact-form -->
                                
                    </div><!-- /.row -->
                    <hr>
                    <div class="row" style="padding-left: 20px; padding-right: 20px;">
                    
                    <div class="lqd-column col-md-12 px-4 pb-30 bg-white box-shadow-1">
                    
							<div class="lqd-column-inner bg-white border-radius-6 px-3 px-md-4 pt-40 pb-10">
                            <div>Account Type</div><br>
								<div class="row">

                                    <?php
                                if(strcmp($accType,"Enduser") == 0){

                                    $handle2 = "SELECT * FROM site_operation_var WHERE operation_name='Enduser'";
                                    $result2 = $conn->query($handle2);
                                    if ($result2->num_rows > 0) {
                                        while($row = $result2->fetch_assoc()) {
                                            $instruction_or_data = $row["instruction_or_data"];
                                        }
                                    }

                                    echo ' <div class="col-md-4"><span>Enduser </span><input name="accType" type="radio" value="Enduser" <?php if(strcmp($accType,"Enduser") == 0){echo "checked";} ?> > <b>0% OFF</b></div>
                                    <div class="col-md-4"><span>Reseller </span><input name="accType" type="radio" value="Reseller" <?php if(strcmp($accType,"Reseller") == 0){echo "checked";} ?> > <b>8.9% OFF</b></div>';
                                }
                                    ?>
                                   
                                    <!-- <div class="col-md-4"><span>Portal-Owner </span><input name="accType" type="radio" value="Portal-Owner" <?php if(strcmp($accType,"Portal-Owner") == 0){echo "checked";} ?> > <b>12% OFF</b></div> -->
                                </div>

							</div><!-- /.lqd-column-inner -->

						</div><!-- /.lqd-column col-md-5 col-md-offset-7 -->
                    </div>
                    <hr>
				<div>
					<div class="row" style="padding-left: 20px; padding-right: 20px;">
						
						<div class="lqd-column col-md-12 px-4 pb-10 bg-white box-shadow-1">
							
							<div class="lqd-column-inner bg-white border-radius-6 px-3 px-md-4 pt-10 pb-10">
							<br>
                            <div class="row" data-liquid-masonry="true">
                                
                            <div class="lqd-column col-md-12">

							<div class="liquid-blog-posts">
								<div class="liquid-blog-grid row" data-liquid-masonry="true">
                                <div class="lqd-column col-md-4 col-sm-6 masonry-item">.</div>
								<?php
								$handle2 = "SELECT * FROM adverts ORDER BY id DESC LIMIT 1";
								$result2 = $conn->query($handle2);
								if ($result2->num_rows > 0) {
									while($row = $result2->fetch_assoc()) {
										$shortend_title = substr($row["title"],0,50);
										echo '<div class="lqd-column col-md-4 col-sm-6 masonry-item">

										<article class="liquid-lp mb-40">
								
                                            <figure class="liquid-lp-media">
												<a href="'.$row["ad_link"].'">
													<img style="height: 250px;" src="./api/uploads/avert_pics/'.$row["id"].'/post_pic.jpg" alt="Lates Post">
												</a>
											</figure>
										
											<header class="liquid-lp-header" style="height: 50px;">
												<h3 class="liquid-lp-title h4 font-size-19"><a href="'.$row["ad_link"].'" style="color:#808291">'.$shortend_title.'</a></h3>
											</header>
										
										</article>
								
									</div><!-- /.col-md-3 col-sm-6 -->';
									}
								}
								?>
									
	
									
								</div><!-- /.liquid-blog-grid row -->
							</div><!-- /.liquid-blog-posts -->

						</div><!-- /.col-md-12 -->
									
	
									
                                </div><!-- /.liquid-blog-grid row -->

							</div><!-- /.lqd-column-inner -->

						</div><!-- /.lqd-column col-md-5 col-md-offset-7 -->

					</div><!-- /.row -->
				</div><!-- /.container -->
            <hr>
                    <div class="row" style="padding-left: 20px; padding-right: 20px;">
                    
                    <div class="lqd-column col-md-12 px-4 pb-30 bg-white box-shadow-1">
                    
							<div class="lqd-column-inner bg-white border-radius-6 px-3 px-md-4 pt-40 pb-10">
                            <div>Services</div><br>
								<div class="row">
                                    
                                    <span class="col-md-2">
                                        <a href="buyAirtime.php"><span style="border-radius: 50px; width:150px; background:rgb(228, 228, 240); color:blue; padding-left:10px;">
                                    <span class="fa fa-mobile"></span> Purchase Airtime 
                                    </span></a>
                                    </span>

                                    <span class="col-md-2">
                                        <a href="buyData.php"><span style="border-radius: 50px; width:130px; background:rgb(228, 228, 240); color:blue; padding-left:10px;">
                                    <span class="fa fa-wifi"></span> Data Topup 
                                    </span></a>
                                    </span>

                                    <span class="col-md-2">
                                        <a href="buyCableTvSub.php"><span style="border-radius: 50px; width:130px; background:rgb(228, 228, 240); color:blue; padding-left:10px;">
                                    <span class="fa fa-tv"></span> CableTV Sub 
                                    </span></a>
                                    </span>

                                    <span class="col-md-2">
                                        <a href="buyPower.php"><span style="border-radius: 50px; width:130px; background:rgb(228, 228, 240); color:blue; padding-left:10px;">
                                    <span class="fa fa-bolt"></span> Buy Power 
                                    </span></a>
                                    </span>

                                    <span class="col-md-2">
                                        <a href="fundAccount.php"><span style="border-radius: 50px; width:150px; background:rgb(228, 228, 240); color:blue; padding-left:10px;">
                                    <span class="fas fa-wallet"></span> Fund Account 
                                    </span></a>
                                    </span>

                                    <span class="col-md-2">
                                        <a href="transferFund.php"><span style="border-radius: 50px; width:140px; background:rgb(228, 228, 240); color:blue; padding-left:10px;">
                                    <span class="fas fa-arrows-alt-h"></span> Funds Transfer 
                                    </span></a>
                                    </span>

                                    <span class="col-md-2">
                                        <a href="referral.php"><span style="border-radius: 50px; width:100px; background:rgb(228, 228, 240); color:blue; padding-left:10px;">
                                    <span class="fa fa-group"></span> Referrals 
                                    </span></a>
                                    </span>

                                    <span class="col-md-2">
                                        <a href="product-main.php"><span style="border-radius: 50px; width:160px; background:rgb(228, 228, 240); color:blue; padding-left:10px;">
                                    <span class="fa fa-shopping-cart"></span> Shop Online 
                                    </span></a>
                                    </span>

                                    <span class="col-md-2">
                                        <a href="paymentHistory.php"><span style="border-radius: 50px; width:160px; background:rgb(228, 228, 240); color:blue; padding-left:10px;">
                                    <span class="fa fa-history"></span> Payment History 
                                    </span></a>
                                    </span>

                                    <span class="col-md-2">
                                        <a href="transactions.php"><span style="border-radius: 50px; width:160px; background:rgb(228, 228, 240); color:blue; padding-left:10px;">
                                    <span class="fa fa-handshake-o"></span> Transactions 
                                    </span></a>
                                    </span>

                                    <span class="col-md-2">
                                        <a href="blog-main.php"><span style="border-radius: 50px; width:90px; background:rgb(228, 228, 240); color:blue; padding-left:10px;">
                                    <span class="fa fa-newspaper-o"></span> Blog 
                                    </span></a>
                                    </span>
                                    
                                </div>

							</div><!-- /.lqd-column-inner -->

						</div><!-- /.lqd-column col-md-5 col-md-offset-7 -->
                    </div>
                   
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
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script>
	$.fn.disp_welcome_msg = function(){ 
			$.fn.confirm("Only MTN and 9MOBILE DATA is available for now. we are making upgrades on other services to serve you better","green",function(){});
         }

    $('input[type=radio][name=accType]').change(function() {
        var accType = this.value;
        $.post( "api/process_change_account_type.php",{
                accType:accType
			}, function( data ) {
			if(data === "11111"){
                $.fn.notification("Saved Successfully","green");
                location.reload();
			}else if(data === "100111"){
				$.fn.notification("Erro Changing Account Type","red");
			}else if(data === "100112"){
				$.fn.notification("Access Denied","red");
			}
			});
});
         
         
</script>
<?php
	include 'api/footerAdditions.php'
	?>
</body>
</html>