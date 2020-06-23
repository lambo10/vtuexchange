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
	<div class="titlebar scheme-light" data-parallax="true" data-parallax-options='{ "parallaxBG": true }' style="background-image: url(images/people/12.jpg);">
			
		<?php
		include 'header.php'
		?>

<br><br>

			<div class="titlebar-inner py-0 mt-0" >
				<div class="container titlebar-container">
					<div class="row titlebar-container" style="padding-left: 20px; padding-right: 20px;">

						<div class="titlebar-col col-md-12 bg-white pt-10 bg-white box-shadow-1">
							<div class="row">

								<div class="col-md-2 col-md-offset-1">
									<h6 class="font-size-14 font-weight-medium text-uppercase ltr-sp-2">Edith Profile</h6>
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
											<input class="bg-gray text-dark mb-30" type="text" id="name" aria-required="true" aria-invalid="false" placeholder="Full Name" required>
											<input class="bg-gray text-dark mb-30" type="email" id="email" aria-required="true" aria-invalid="false" placeholder="Your email address" required>
											<input class="bg-gray text-dark mb-30" type="tel" id="phone" aria-required="true" aria-invalid="false" placeholder="Mobile no" required>
										</div><!-- /.col-md-6 -->
										<div class="lqd-column col-md-6 mb-20">
											<input class="bg-gray text-dark mb-30" type="text" id="password" aria-required="true" aria-invalid="false" placeholder="Company Name" required>
										</div><!-- /.col-md-12 -->
										<div class="lqd-column col-md-6 text-md-right">
											<input type="button" onclick="$.fn.submit_data()" value="Submit">
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
<script src="./assets/js/theme-vendors.js"></script>
<script src="./assets/js/theme.min.js"></script>
<script src="./assets/js/liquidAjaxMailchimp.min.js"></script>
<script>
	$.fn.submit_data = function(){
			var name = $("#name").val();
            var email = $("#email").val();
			var password = $("#password").val();
			var password2 = $("#password2").val();
			var phone = $("#phone").val();
			
			if(name.length == 0 || email.length == 0 || password.length == 0 || phone.length == 0){
				alert("No field can be left empty");
			}else{
				if(password === password2){
					$.post( "api/signUp_process.php",{
				name : name,
				email : email,
				password : password,
				phone : phone
			}, function( data ) {
			if(data === "11111"){
				$.fn.confirm("Registerd Successfully","",function (){window.location = "index.php";});
			}else if(data === "100113"){
				$.fn.notification("User with email already exsist","red");
			}else if(data === "100114" || data === "100115"){
				$.fn.notification("Invalid Inputed Data","red");
			}
			});
				}else{
					$.fn.notification("Re-type password does not match","red");
			}
			}
         
		 }
</script>
</body>
</html>