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
	
	<!-- Head Libs -->
	<script async src="assets/vendors/modernizr.min.js"></script>
	
</head>
<body data-mobile-nav-trigger-alignment="right" data-mobile-nav-align="left" data-mobile-nav-style="modern" data-mobile-nav-shceme="gray" data-mobile-header-scheme="gray" data-mobile-nav-breakpoint="1199">
	
	<div id="wrap">
	<?php 
    include 'header2.php';
    ?>
		
		<main id="content" class="content">
			
			<section class="vc_row pt-50 pb-50 bg-cover bg-center" style="background: rgb(228, 228, 240);">
				
							
				<div class="container">
					<div class="row" style="padding-left: 20px; padding-right: 20px;">
						
						<div class="lqd-column col-md-12 px-4 pt-45 pb-30 bg-white box-shadow-1">
							
							<div class="lqd-column-inner bg-white border-radius-6 px-3 px-md-4 pt-40 pb-40">

								<header class="fancy-title">
									<div><img src="images/wallet.svg" style="width: 80px; height: 80px;" /><span style="font-size: 25px;">Fund</span></div>
									<div>Min Amount <?php 
									include 'api/connect.php';
											$accType = "";

											$handle2 = "SELECT accType FROM users WHERE email='$email'";
										$result2 = $conn->query($handle2);
										if ($result2->num_rows > 0) {
											while($row = $result2->fetch_assoc()) {
												$accType = $row["accType"];
												if(strcmp($accType,"Enduser") == 0){
													 echo "₦100";
													}else if(strcmp($accType,"Reseller") == 0){
														echo "₦2000";
													}else if(strcmp($accType,"Portal-Owner") == 0){
														echo "₦7000";
													}
											}
										}
											?></div>
								</header><!-- /.fancy-title -->

								<div class="contact-form contact-form-button-block font-size-14">
									<form novalidate="novalidate" id="paymentForm">

                                        <div class="row d-flex flex-wrap">
                                            <div class="lqd-column col-md-6 mb-20">
                                                <input class="bg-gray text-dark mb-30" id="email-address" type="email" name="email" aria-required="true" aria-invalid="false" disabled="true" style="cursor: not-allowed;" value="<?php echo $email; ?>" required>
                                                <input class="bg-gray text-dark mb-30" id="amount" type="tel" name="amount" aria-required="true" aria-invalid="false" placeholder="Amount" required>
                                                 
                                            </div><!-- /.col-md-6 -->
                                            <div class="lqd-column col-md-6 mb-20">
                                                <div><img src="images/paystack.png" style="width: 200px; height: 70px;" /><input type="radio" name="paymentOption" value="1" checked></div>
                                                <div><img src="images/Flutterwave.png" style="width: 200px; height: 100px;" /><input type="radio" name="paymentOption" value="2"></div>
                                            </div><!-- /.col-md-12 -->
                                                <div class="lqd-column col-md-6 text-md-right">
                                                <button type="button" onclick="startPayment()">Pay</button>
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
<script src="https://js.paystack.co/v1/inline.js"></script> 
<script src="https://checkout.flutterwave.com/v3.js"></script>
<script>

const paymentForm = document.getElementById('paymentForm');

function payWithPaystack(deposite_amount) {

  let handler = PaystackPop.setup({
    key: 'pk_live_e1a667ee839d8ae3dce180351a8f6dc30ab3c62c', // Replace with your public key
    email: document.getElementById("email-address").value,
	amount: deposite_amount * 100,
    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
    // label: "Optional string that replaces customer email"
    callback: function(response){
      let message = 'Payment complete! Reference: ' + response.reference;
      $.fn.notification(message,"green");
    }
  });
  handler.openIframe();

}

function paywithflutterwave(deposite_amount) {
    FlutterwaveCheckout({
      public_key: "FLWPUBK-12911e9c85d808aeb67fda2c3099d103-X",
      tx_ref: ''+Math.floor((Math.random() * 1000000000) + 1),
      amount: deposite_amount,
      currency: "NGN",
      country: "NG",
      payment_options: "card, banktransfer, ussd",
      meta: {
        consumer_id: 23,
        consumer_mac: "92a3-912ba-1192a",
      },
      customer: {
        email: document.getElementById("email-address").value,
        phone_number: "",
        name: "<?php echo $name; ?>",
      },
      redirect_url:"https://diligentmart.com/dashboard.php",
      onclose: function() {
        // close modal
      },
      customizations: {
        title: "diligentmart",
        description: "Fund Wallet",
        logo: "https://diligentmart.com/images/logoBlack.png",
      },
    });
  }

function startPayment(){
	var deposite_amount = document.getElementById("amount").value;
  var minamount = <?php if(strcmp($accType,"Enduser") == 0){
									echo "100";
								}else if(strcmp($accType,"Reseller") == 0){
									echo "2000";
								}else if(strcmp($accType,"Portal-Owner") == 0){
									echo "7000";
								}
								?>;
if(deposite_amount >= minamount){
	var inputsD = document.getElementsByName("paymentOption");
          if(inputsD[0].checked){
            payWithPaystack(deposite_amount);
          }
		  else if(inputsD[1].checked){
            paywithflutterwave(deposite_amount);
          }
}else{
	$.fn.notification("Amount below minimum amount","red");
}
}
</script>
<?php
	include 'api/footerAdditions.php'
	?>
</body>
</html>