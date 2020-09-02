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
									<h6 class="font-size-14 font-weight-medium text-uppercase ltr-sp-2">Password_Recovery</h6>
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
										<div class="lqd-column col-md-12 mb-20" id="email_confirmContainer">
											<input class="bg-gray text-dark mb-30" type="email" id="email" aria-required="true" aria-invalid="false" placeholder="Enter email address" required><br>
											<button id="submitBTN" style="cursor: pointer;" onclick="$.fn.submit_data()" type="button"><span id="submitBtnTxt">SEND </span><img id="submitBTNLoaderImg" src="images/loading.gif" style="width: 50px; height:50px; display:none" /></button>
										
                                        </div><!-- /.col-md-12 -->
                                        <div class="lqd-column col-md-12 mb-20" id="code_confirmContainer" style="display: none;">
                                            <div><span>A five digit was sent to</span> <span id="inputed_Email" style="color: blue;"></span>. <span>Please enter the code to reset your password</span></div>
											<input class="bg-gray text-dark mb-30" type="password" id="confirmation_code" aria-required="true" aria-invalid="false" placeholder="Enter Code"><br>
											<button id="submitBTN2" style="cursor: pointer;" onclick="$.fn.submit_code()" type="button"><span id="submitBtnTxt2">SEND </span><img id="submitBTNLoaderImg2" src="images/loading.gif" style="width: 50px; height:50px; display:none" /></button>
										
                                        </div><!-- /.col-md-12 -->
                                        <div class="lqd-column col-md-12 mb-20" id="newPass_enterContainer" style="display: none;">
                                            <input class="bg-gray text-dark mb-30" type="password" id="new_password" aria-required="true" aria-invalid="false" placeholder="New Password" required>
                                            <input class="bg-gray text-dark mb-30" type="password" id="new_password2" aria-required="true" aria-invalid="false" placeholder="Re-Type Password" required>
                                            <br>
											<button id="submitBTN3" style="cursor: pointer;" onclick="$.fn.submit_new_pass()" type="button"><span id="submitBtnTxt3">SEND </span><img id="submitBTNLoaderImg3" src="images/loading.gif" style="width: 50px; height:50px; display:none" /></button>
										
                                        </div><!-- /.col-md-12 -->
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
    $.fn.submit_new_pass = function(){
            var password1 = $("#new_password").val();
            var password2 = $("#new_password2").val();
			
			if(password1.length == 0 || password2.length == 0){
				$.fn.confirm("No field can be left empty ","red",function(){});
			}else{
                if(password1 === password2){
                    dispSubmitBtnLoader3();
					$.post( "api/process_password_recovery_layer3.php",{
                        password : password1,
                        code: $("#confirmation_code").val()
			}, function( data ) {
			if(data === "11111"){
                window.location = "login.php";
			}else if(data === "100012"){
				$.fn.notification("Erro Changing Password","red");
				clearSubmitBtnLoader3();
			}else if(data === "100113"){
				$.fn.notification("Code Incorrect","red");
				clearSubmitBtnLoader3();
			}else if(data === "100115"){
				$.fn.notification("Invalid Inputed Data","red");
				clearSubmitBtnLoader3();
			}
			});
                    
                }else{
                    $.fn.confirm("Re-Type Password does not match","red",function(){});
                }
				
				
			}
         
		 }
    	$.fn.submit_code = function(){
            var code = $("#confirmation_code").val();
			
			if(code.length == 0){
				$.fn.confirm("Enter 5 digit code ","red",function(){});
			}else{
				dispSubmitBtnLoader2();
					$.post( "api/process_password_recovery_layer2.php",{
				code : code
			}, function( data ) {
			if(data === "11111"){
                getE("email_confirmContainer").style.display = "none";
                getE("code_confirmContainer").style.display = "none";
                getE("newPass_enterContainer").style.display = "block";
			}else if(data === "100113"){
				$.fn.notification("Code Incorrect","red");
				clearSubmitBtnLoader2();
			}else if(data === "100115"){
				$.fn.notification("Invalid Inputed Data","red");
				clearSubmitBtnLoader2();
			}
			});
				
			}
         
		 }
	$.fn.submit_data = function(){
            var email = $("#email").val();
			
			if(email.length == 0){
				$.fn.confirm("Enter email address ","red",function(){});
			}else{
				dispSubmitBtnLoader();
					$.post( "api/process_password_recovery_layer1.php",{
				email : email
			}, function( data ) {
			if(data === "11111"){
                $("#inputed_Email").html($("#email").val());
                getE("email_confirmContainer").style.display = "none";
                getE("newPass_enterContainer").style.display = "none";
                getE("code_confirmContainer").style.display = "block";
			}else if(data === "100113"){
				$.fn.notification("Email does not exsist","red");
				clearSubmitBtnLoader();
			}else if(data === "100115"){
				$.fn.notification("Invalid Inputed Data","red");
				clearSubmitBtnLoader();
			}
			});
				
			}
         
         }
         
         function dispSubmitBtnLoader3(){
			 getE("submitBTNLoaderImg3").style.display = "block";
			 getE("submitBtnTxt3").style.display = "none";
			 getE("submitBTN3").disabled = true;
			 getE("submitBTN3").style.cursor = "not-allowed";
		 }

		 function clearSubmitBtnLoader3(){
			 getE("submitBTNLoaderImg3").style.display = "none";
			 getE("submitBtnTxt3").style.display = "block";
			 getE("submitBTN3").disabled = false;
			 getE("submitBTN3").style.cursor = "pointer";
		 }

         function dispSubmitBtnLoader2(){
			 getE("submitBTNLoaderImg2").style.display = "block";
			 getE("submitBtnTxt2").style.display = "none";
			 getE("submitBTN2").disabled = true;
			 getE("submitBTN2").style.cursor = "not-allowed";
		 }

		 function clearSubmitBtnLoader2(){
			 getE("submitBTNLoaderImg2").style.display = "none";
			 getE("submitBtnTxt2").style.display = "block";
			 getE("submitBTN2").disabled = false;
			 getE("submitBTN2").style.cursor = "pointer";
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