
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
<body data-mobile-nav-trigger-alignment="right" data-mobile-nav-align="left" data-mobile-nav-style="modern" data-mobile-nav-shceme="gray" data-mobile-header-scheme="gray" data-mobile-nav-breakpoint="1199">
	
	<div id="wrap">
	<div class="titlebar scheme-light" data-parallax="true" data-parallax-options='{ "parallaxBG": true }' style="background-image: url(images/people/12.jpg);">
			
		<?php
		include 'header.php';
		include 'api/connect.php';
		$handle2 = "SELECT phone FROM users WHERE email='$email'";
		$result2 = $conn->query($handle2);
		$phone = "";
		if ($result2->num_rows > 0) {
			while($row = $result2->fetch_assoc()) {
				$phone = $row["phone"];
			}
		}
		?>

			<div class="titlebar-inner py-0 mt-0" >
				<div class="container titlebar-container">
					<div class="row titlebar-container" style="padding-left: 20px; padding-right: 20px;">

						<div class="titlebar-col col-md-12 bg-white pt-10 bg-white box-shadow-1">
							<div class="row">

								<div class="col-md-2 col-md-offset-1">
									<h6 class="font-size-14 font-weight-medium text-uppercase ltr-sp-2">EDITH PROFILE</h6>
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
											
										<input class="bg-gray text-dark mb-30" disabled = "true" style="cursor: not-allowed;" type="email" id="email" aria-required="true" aria-invalid="false" placeholder="<?php echo $email ?>" required>
											<input class="bg-gray text-dark mb-30" type="text" id="name" value="<?php echo $name ?>" aria-required="true" aria-invalid="false" placeholder="Full Name" required>
											<input class="bg-gray text-dark mb-30" type="tel" id="phone" value="<?php echo $phone ?>" aria-required="true" aria-invalid="false" placeholder="Mobile no" required>
											
										</div><!-- /.col-md-6 -->
										<div class="lqd-column col-md-6 mb-20">
										<select id="gender" class="bg-gray text-dark mb-30" aria-required="true" aria-invalid="false" >
												<option>-Gender-</option>
												<option>Male</option>
												<option>Female</option>
											</select>
										<select id="state" class="bg-gray text-dark mb-30" aria-required="true" aria-invalid="false" >
												<option>-State-</option>
												<option>ABUJA FCT</option>
												<option>ABIA</option>
												<option>ADAMAWA</option>
												<option>AKWA IBOM</option>
												<option>ANAMBRA</option>
												<option>BAUCHI</option>
												<option>BAYELSA</option>
												<option>BENUE</option>
												<option>BORNO</option>
												<option>CROSS RIVER</option>
												<option>DELTA</option>
												<option>EBONYI</option>
												<option>EDO</option>
												<option>EKITI</option>
												<option>ENUGU</option>
												<option>GOMBE</option>
												<option>IMO</option>
												<option>JIGAWA</option>
												<option>KADUNA</option>
												<option>KANO</option>
												<option>KATSINA</option>
												<option>KEBBI</option>
												<option>KOGI</option>
												<option>KWARA</option>
												<option>LAGOS</option>
												<option>NASSARAWA</option>
												<option>NIGER</option>
												<option>OGUN</option>
												<option>ONDO</option>
												<option>OSUN</option>
												<option>OYO</option>
												<option>PLATEAU</option>
												<option>RIVERS</option>
												<option>SOKOTO</option>
												<option>TARABA</option>
												<option>YOBE</option>
												<option>ZAMFARA</option>
											</select>
										</div><!-- /.col-md-12 -->
										<div class="lqd-column col-md-6">
											<p class="font-size-16 opacity-07">Pls make sure the inputed data is valid and correct before clicking save</p>
										</div><!-- /.col-md-6 -->
										<div class="lqd-column col-md-6 text-md-right">
										<button id="submitBTN" style="cursor: pointer;" onclick="$.fn.submit_data()" type="button"><span id="submitBtnTxt">SAVE </span><img id="submitBTNLoaderImg" src="images/loading.gif" style="width: 50px; height:50px; display:none" /></button>
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
<script src="./assets/js/theme.min.js"></script>
<script src="./assets/js/liquidAjaxMailchimp.min.js"></script>
<script>
	$.fn.submit_data = function(){
		dispSubmitBtnLoader();
			var name = $("#name").val();
			var phone = $("#phone").val();
			var gender = $("#gender").val();
			var state = $("#state").val();
			
			
			$.post( "api/process_update_user_profile.php",{
				name : name,
				phone : phone,
				gender: gender,
				state: state
				
			}, function( data ) {
			if(data === "11111"){
				$.fn.notification("Saved Successfully","green");
				clearSubmitBtnLoader();
			}else if(data === "100112"){
				$.fn.notification("Erro saving updates","red");
				clearSubmitBtnLoader();
			}else if(data === "100111"){
				$.fn.notification("User does not exsist -- Try loging in first","red");
				clearSubmitBtnLoader();
			}
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