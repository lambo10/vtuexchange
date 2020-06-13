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
    include 'header.php';
    ?>
	
		<main id="content" class="content">
			<section class="vc_row bg-cover bg-center d-flex align-items-center py-5" style="height: 300px;" data-row-bg="images/people/2.jpg">

				<span class="row-bg-loader"></span>

				<div class="container">
					<div class="row d-flex flex-wrap align-items-center">
						
						<div class="lqd-column col-md-8 col-md-offset-2 text-md-center mt-md-9">

							<div class="ld-fancy-heading">
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

							<div
							class="lqd-column-inner"
							data-custom-animations="true"
							data-ca-options='{ "triggerHandler":"inview", "animationTarget":"all-childs", "duration":"1200", "startDelay": 900, "easing":"easeOutQuint", "direction":"forward", "initValues":{"translateY": 50, "opacity": 0}, "animations":{"translateY":0,"opacity":1} }'>

							</div><!-- /.lqd-column-inner -->

						</div><!-- /.col-md-8 -->

					</div><!-- /.row -->
				</div><!-- /.container -->

			</section>
			
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
									<h2 class="mb-2 font-size-30 font-weight-light">Login</h2>
									<p class="mt-0"></p>
								</header><!-- /.fancy-title -->

								<div class="contact-form contact-form-inputs-filled contact-form-button-block font-size-14">
									<form action="assets/php/mailer.php" method="post" novalidate="novalidate">

                                        <div class="row d-flex flex-wrap">
                                            <div class="lqd-column col-md-12 mb-20">
                                                <input class="bg-gray text-dark mb-30" type="email" name="email" aria-required="true" aria-invalid="false" placeholder="Your email address" required>
                                                <input class="bg-gray text-dark mb-30" type="password" name="pasword" aria-required="true" aria-invalid="false" placeholder="Password" required>
                                                <p class="font-size-16 opacity-07">Forgot Password? <a href="#">Click here</a>.</p><br>
                                                <input type="submit" value="Login">
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