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
	<div class="titlebar scheme-light" data-parallax="true" data-parallax-options='{ "parallaxBG": true }' style="background-image: url(images/people/5.jpg);">
			
		<?php
		include 'header.php';
		include 'api/connect.php';
        include 'api/clearReset_key_table.php';
        
        
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
									<h6 class="font-size-14 font-weight-medium text-uppercase ltr-sp-2">Buy Data</h6>
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
                        <!-- <div class="lqd-column-inner bg-white border-radius-6 px-3 px-md-4 pt-40 pb-40">
                        <div class="col-md-6" style="padding:10px;">
                            <a href=""><div style="background: #003879; height:50px; width:100%; border-radius:5px; text-align:center; color:white;padding-top:5px;"><div style="padding-top:4px;">Daily</div></div></a>
                            </div>
                            <div class="col-md-6" style="padding:10px;">
                            <a href=""><div style="background: #003879; height:50px; width:100%; border-radius:5px; text-align:center; color:white;padding-top:5px;"><div style="padding-top:4px;">Monthly</div></div></a>
                            </div>
                        </div> -->
							<div class="lqd-column-inner bg-white border-radius-6 px-3 px-md-4 pt-40 pb-40">
                            <?php
$network = $_GET["network"];
$handle2 = "SELECT * FROM services WHERE serviceType='DATA' AND network='$network'";
$result2 = $conn->query($handle2);
$dbData = array();
if ($result2->num_rows > 0) {
    while($row = $result2->fetch_assoc()) {
		$profit_margin = getProfitMargin($conn,$serviceType,$networkProvider);
		$acc_type_pd = getAcc_Type_pd($conn,$accType);
		$cost = $row["cost"];
        echo '<div class="col-md-3" style="padding:10px;">
        <a href="enterBuyDataNum.php?serviceID='.$row["id"].'"><div style="background: #003879; height:150px; width:100%; border-radius:5px; text-align:center; color:white;padding-top:50px;"><div style="font-size:30px;"><b>'.$row["type"].'</b></div><div>N'.floor(((float)$profit_margin+(float)$cost-(((float)$acc_type_pd*((float)$profit_margin+(float)$cost))/100))).' - '.$row["validity"].'</div></div></a>
        </div>';
    }
}else{
		echo '<div class="col-md-12" style="padding:20px; text-align:center; font-size:30px">ComingSoon</div>';
}

function getProfitMargin($conn,$serviceType,$networkProvider){
    $handle2 = "SELECT profit FROM profits WHERE serviceType='$serviceType' AND network='$networkProvider'";
$result2 = $conn->query($handle2);
if ($result2->num_rows > 0) {
    while($row = $result2->fetch_assoc()) {
        $profit = $row["profit"];
        return $profit;
    }
    
}else{
    return -1;
}
}

function getAcc_Type_pd($conn,$name){
	$handle2 = "SELECT instruction_or_data FROM site_operation_var WHERE operation_name='$name' LIMIT 1";
    $result2 = $conn->query($handle2);
    if ($result2->num_rows > 0) {
        while($row = $result2->fetch_assoc()) {
          return $row["instruction_or_data"];
        }
    }else{
      return -1;
    }
}

?>
                            
                           

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

<?php
	include 'api/footerAdditions.php'
	?>
</body>
</html>