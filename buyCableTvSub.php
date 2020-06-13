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
	
	<!-- Head Libs -->
	<script async src="assets/vendors/modernizr.min.js"></script>
	
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

								<header class="fancy-title">
                                    <div><img src="images/tv.svg" style="width: 80px; height: 80px;" /><span style="font-size: 25px;">Tv Subscription</span></div>
								</header><!-- /.fancy-title -->

								<div class="contact-form contact-form-inputs-filled contact-form-button-block font-size-14">
									<form action="assets/php/mailer.php" method="post" novalidate="novalidate">

                                        <div class="row d-flex flex-wrap">
                                            <div class="lqd-column col-md-6 mb-20">
                                                <select class="bg-gray text-dark mb-30" aria-required="true" aria-invalid="false" >
                                                    <option>-Tv Subscription-</option>
                                                    <option>DSTV</option>
                                                    <option>GOTV</option>
                                                    <option>StarTimes</option>
                                                </select>
                                                <select class="bg-gray text-dark mb-30" aria-required="true" aria-invalid="false" >
                                                    <option>-Bouquet/Package-</option>
                                                    <option>DSTV Padi - N1,850.00</option>
                                                    <option>DSTV Yanga - N2,565.00</option>
                                                    <option>DSTV Confam - N4,618.00</option>
                                                    <option>DSTV Compact - N6,975.00</option>
                                                </select>
                                                <input class="bg-gray text-dark mb-30" type="text" name="smartcard_or_iuc" aria-required="true" aria-invalid="false" placeholder="SMARTCARD/IUC NUMBER ->" required>
                                               
                                            </div><!-- /.col-md-6 -->
                                            <div class="lqd-column col-md-6 mb-20">
                                                <input class="bg-gray text-dark mb-30" type="text" name="amountToPay" aria-required="true" aria-invalid="false" placeholder="AMOUNT TO PAY (4% Discount)" required>
                                                <select class="bg-gray text-dark mb-30" aria-required="true" aria-invalid="false" >
                                                    <option>-Auto Renew-</option>
                                                    <option>NO</option>
                                                    <option>YES</option>
                                                </select>
                                            </div><!-- /.col-md-12 -->
                                            <div class="lqd-column col-md-6 text-md-right">
                                                <input type="submit" value="BUY NOW">
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

<script src="./assets/vendors/jquery.min.js"></script>
<script src="./assets/js/theme-vendors.js"></script>
<script src="./assets/js/theme.min.js"></script>
<script src="./assets/js/liquidAjaxMailchimp.min.js"></script>

</body>
</html>