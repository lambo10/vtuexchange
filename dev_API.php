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
	<link href="css/footable.standalone.min.css" rel="stylesheet">
	
	<!-- Head Libs -->
    <script async src="assets/vendors/modernizr.min.js"></script>
    <style>
        .hoverAction:hover{
            background: #fd5c4c;
            color: white;
        }
        .hoverAction:hover .bigNo{
            color: white;
        }
        .bigNo{
            color: #2D323D;
		}
		.btn > span {display: -webkit-inline-box;display: inline-flex;padding: 0px;border-radius: inherit;border-color: inherit;-webkit-box-orient: horizontal;-webkit-box-direction: normal;flex-flow: row wrap;-webkit-box-align: center;align-items: center;}

        
    </style>
	
</head>
<body data-mobile-nav-trigger-alignment="right" data-mobile-nav-align="left" data-mobile-nav-style="modern" data-mobile-nav-shceme="gray" data-mobile-header-scheme="gray" data-mobile-nav-breakpoint="1199">
	
	<div id="wrap">
    <?php 
	include 'header2.php';
	include 'api/connect.php';
	$handle2 = "SELECT apiKey  FROM users WHERE email='$email'";
	$result2 = $conn->query($handle2);
	$apiKey = "";
	if ($result2->num_rows > 0) {
		while($row = $result2->fetch_assoc()) {
		$apiKey = $row["apiKey"];
		}
	}
    ?>
		
		<main id="content" class="content">

			<section class="vc_row pt-50 pb-50 bg-cover bg-center" style="background: rgb(228, 228, 240);">
				
				<div class="lqd-particles-bg-wrap">
					
				</div><!-- /.lqd-particles-bg-wrap -->
				
				<div class="container">
					<div class="row" style="padding-left: 20px; padding-right: 20px;">
						
						<div class="lqd-column col-md-12 px-4 pt-10 pb-10 bg-white box-shadow-1">
							
							<div class="lqd-column-inner bg-white border-radius-6 px-3 px-md-4 pt-40 pb-40">

								<div style="font-size: 20px; color:#2D323D"><b>API integration</b></div>
								<div>Our HTTPS GET API is excellent option to integrate with various e-channels such as Website, Mobile App, USSD, ATM e.t.c.</div>
								<br>
								<div style="color:#2D323D">UserID: <?php echo $refID; ?></div>
								<div style="color:#2D323D">APIKey: <?php echo $apiKey; ?></div>
								<a style="outline: none !important; color: rgb(0, 136, 204); text-decoration: none; cursor:pointer" onclick="$.fn.generate_api_key()">Generate New Key</a>
								<div></div>
							</div><!-- /.lqd-column-inner -->

						</div><!-- /.lqd-column col-md-5 col-md-offset-7 -->

					</div><!-- /.row -->
				</div><!-- /.container -->
			</section>
			
		<section class="vc_row pb-50 bg-cover bg-center" style="background: rgb(228, 228, 240);">
				
				<div class="lqd-particles-bg-wrap">
					
				</div><!-- /.lqd-particles-bg-wrap -->
				
				<div class="container">
					<div class="row" style="padding-left: 20px; padding-right: 20px;">
						
						<div class="lqd-column col-md-12 px-4 pt-10 pb-10 bg-white box-shadow-1">
							
							<div class="lqd-column-inner bg-white border-radius-6 px-3 px-md-4 pt-40 pb-40">

								<div style="font-size: 20px; color:#2D323D"><b>Check Wallet Balance </b></div><br>
								<textarea style="width: 100%;border-color:#808291">https://diligentmart.com/api/api.php?userID=<?php echo $refID; ?>&apiKey=<?php echo $apiKey; ?>&sub_service_type=CHECK_BALANCE</textarea>
								<br>
								<div style="color:#2D323D"><b>Sample Codes </b></div>
								<textarea style="width: 100%;border-color:#808291">https://diligentmart.com/api/api.php?userID=qe3r4&apiKey=ruey23jf&sub_service_type=CHECK_BALANCE</textarea>
								<div style="color:#2D323D">JSON Response</div>
								<div>{"date":"15th-Oct-2017", "id":"qe3r4", "balance":"3500"}</div>
								<br>
								<div style="font-size: 20px; color:#2D323D"><b>Here is a description of the parameters used in the URL above</b></div>
								<table style="outline: none !important; max-width: 100%; border-collapse: separate; border-spacing: 0px; margin-bottom: 20px; border-width: 1px 1px 1px 0px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-top-color: rgb(221, 221, 221); border-right-color: rgb(221, 221, 221); border-bottom-color: rgb(221, 221, 221); border-radius: 4px; color: rgb(51, 51, 51); font-family: Ubuntu, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">
	<thead style="outline: none !important;">
		<tr>
			<td style="border-left:1px solid rgb(221, 221, 221); border-top:1px solid rgb(221, 221, 221); outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; ">
			userID</td>
			<td style="border-left:1px solid rgb(221, 221, 221); border-top:1px solid rgb(221, 221, 221); outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; ">
			<?php echo $refID; ?></td>
		</tr>
		<tr>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			apiKey</td>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			<?php echo $apiKey; ?></td>
		</tr>
		<tr>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			sub_service_type</td>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			CHECK_BALANCE</td>
		</tr>
	</thead>
	<tbody style="outline: none !important;">
		</tbody></table>
		<div style="color:#2D323D"><b>API Responses </b></div>
		<div>
		<p class="MsoNormal" style="line-height: 15.0pt; margin-bottom: 7.5pt; background: white">
<span style="font-size: 10.5pt; font-family: Arial,sans-serif; color: #333333">
The following responses will indicate if your message was received - success, or 
if there was an error in your </span></p>
<p class="MsoNormal" style="line-height: 15.0pt; margin-bottom: 7.5pt; background: white">
<span style="font-size: 10.5pt; font-family: Arial,sans-serif; color: #333333">
request - failure. Importantly, you must be aware that errors that have to do 
with recipient numbers are </span></p>
<p class="MsoNormal" style="line-height: 15.0pt; margin-bottom: 7.5pt; background: white">
<span style="font-size: 10.5pt; font-family: Arial,sans-serif; color: #333333">
permanent and such messages should not be resent. For errors relating to the 
message format and actual message you could modify the message and resend it.</span></p>
<br>

<table style="outline: none !important; max-width: 100%; border-collapse: separate; border-spacing: 0px; margin-bottom: 20px; border-width: 1px 1px 1px 0px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-top-color: rgb(221, 221, 221); border-right-color: rgb(221, 221, 221); border-bottom-color: rgb(221, 221, 221); border-radius: 4px; color: rgb(51, 51, 51); font-family: Ubuntu, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">
	<thead style="outline: none !important;">
		<tr>
			<td style="border-left:1px solid rgb(221, 221, 221); border-top:1px solid rgb(221, 221, 221); outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; ">
			<b>STATUS</b></td>
			<td style="border-left:1px solid rgb(221, 221, 221); border-top:1px solid rgb(221, 221, 221); outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; ">
			<b>RESPONSE</b></td>
			<td style="border-left:1px solid rgb(221, 221, 221); border-top:1px solid rgb(221, 221, 221); outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; ">
			<b>DESCRIPTION</b></td>
		</tr>
		<tr>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			500</td>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			INVALID USERID OR APIKEY</td>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			The UserID and API key combination is not correct.</td>
		</tr>
		<tr>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			500</td>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			OPERATION ERRO</td>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			Erro occured during operation.</td>
		</tr>
		<tr>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			200</td>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			SUCCESS</td>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			The operation was successful.</td>
		</tr>
	</thead>
	<tbody style="outline: none !important;">
		</tbody></table>

		</div>
							</div><!-- /.lqd-column-inner -->

						</div><!-- /.lqd-column col-md-5 col-md-offset-7 -->

					</div><!-- /.row -->
				</div><!-- /.container -->
			</section>

			
			<section class="vc_row pb-50 bg-cover bg-center" style="background: rgb(228, 228, 240);">
				
				<div class="lqd-particles-bg-wrap">
					
				</div><!-- /.lqd-particles-bg-wrap -->
				
				<div class="container">
					<div class="row" style="padding-left: 20px; padding-right: 20px;">
						
						<div class="lqd-column col-md-12 px-4 pt-10 pb-10 bg-white box-shadow-1">
							
							<div class="lqd-column-inner bg-white border-radius-6 px-3 px-md-4 pt-40 pb-40">

								<div style="font-size: 20px; color:#2D323D"><b>Buy Data </b></div><br>
								<textarea style="width: 100%;border-color:#808291">https://diligentmart.com/api/api.php?userID=<?php echo $refID; ?>&apiKey=<?php echo $apiKey; ?>&serviceID=ID&phoneNo=PHONE_NO</textarea>
								<br>
								<div style="color:#2D323D"><b>Sample Codes </b></div>
								<textarea style="width: 100%;border-color:#808291">https://diligentmart.com/api/api.php?userID=qe3r4&apiKey=ruey23jf&serviceID=4&phoneNo=07069497582</textarea>
								<div style="color:#2D323D">JSON Response</div>
								<div>{"date":"2020-08-15", "id":"qe3r4", "status":"success"}</div>
								<br>
								<div style="font-size: 20px; color:#2D323D"><b>Here is a description of the parameters used in the URL above</b></div>
								<table style="outline: none !important; max-width: 100%; border-collapse: separate; border-spacing: 0px; margin-bottom: 20px; border-width: 1px 1px 1px 0px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-top-color: rgb(221, 221, 221); border-right-color: rgb(221, 221, 221); border-bottom-color: rgb(221, 221, 221); border-radius: 4px; color: rgb(51, 51, 51); font-family: Ubuntu, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">
	<thead style="outline: none !important;">
		<tr>
			<td style="border-left:1px solid rgb(221, 221, 221); border-top:1px solid rgb(221, 221, 221); outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; ">
			userID</td>
			<td style="border-left:1px solid rgb(221, 221, 221); border-top:1px solid rgb(221, 221, 221); outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; ">
			Your userID</td>
		</tr>
		<tr>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			apiKey</td>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			Your APIKey</td>
		</tr>
		<tr>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			serviceID</td>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			serviceID</td>
		</tr>
		<tr>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			phoneNo</td>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			Phone No to purchase for</td>
		</tr>
	</thead>
	<tbody style="outline: none !important;">
		</tbody></table>
		<br>
	<div>
	<div style="font-size: 20px; color:#2D323D"><b>Services</b></div>
	<table id="dataServiceTable" class="table" data-show-toggle="false" data-paging="true" data-sorting="true" data-filtering="true" data-paging-size="30">
                                </table>
	</div>
		<div style="color:#2D323D"><b>API Responses </b></div>
		<div>
		<p class="MsoNormal" style="line-height: 15.0pt; margin-bottom: 7.5pt; background: white">
<span style="font-size: 10.5pt; font-family: Arial,sans-serif; color: #333333">
The following responses will indicate if your message was received - success, or 
if there was an error in your </span></p>
<p class="MsoNormal" style="line-height: 15.0pt; margin-bottom: 7.5pt; background: white">
<span style="font-size: 10.5pt; font-family: Arial,sans-serif; color: #333333">
request - failure. Importantly, you must be aware that errors that have to do 
with recipient numbers are </span></p>
<p class="MsoNormal" style="line-height: 15.0pt; margin-bottom: 7.5pt; background: white">
<span style="font-size: 10.5pt; font-family: Arial,sans-serif; color: #333333">
permanent and such messages should not be resent. For errors relating to the 
message format and actual message you could modify the message and resend it.</span></p>
<br>

<table style="outline: none !important; max-width: 100%; border-collapse: separate; border-spacing: 0px; margin-bottom: 20px; border-width: 1px 1px 1px 0px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-top-color: rgb(221, 221, 221); border-right-color: rgb(221, 221, 221); border-bottom-color: rgb(221, 221, 221); border-radius: 4px; color: rgb(51, 51, 51); font-family: Ubuntu, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">
	<thead style="outline: none !important;">
		<tr>
			<td style="border-left:1px solid rgb(221, 221, 221); border-top:1px solid rgb(221, 221, 221); outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; ">
			<b>STATUS</b></td>
			<td style="border-left:1px solid rgb(221, 221, 221); border-top:1px solid rgb(221, 221, 221); outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; ">
			<b>RESPONSE</b></td>
			<td style="border-left:1px solid rgb(221, 221, 221); border-top:1px solid rgb(221, 221, 221); outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; ">
			<b>DESCRIPTION</b></td>
		</tr>
		<tr>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			500</td>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			INVALID USERID OR APIKEY</td>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			The UserID and API key combination is not correct.</td>
		</tr>
		<tr>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			500</td>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			OPERATION ERRO</td>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			Erro occured during operation.</td>
		</tr>
		<tr>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			500</td>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			INSUFFICIENT FUNDS</td>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			Insufficient wallet balance.</td>
		</tr>
		<tr>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			200</td>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			SUCCESS</td>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			The operation was successful.</td>
		</tr>
	</thead>
	<tbody style="outline: none !important;">
		</tbody></table>

		</div>
							</div><!-- /.lqd-column-inner -->

						</div><!-- /.lqd-column col-md-5 col-md-offset-7 -->

					</div><!-- /.row -->
				</div><!-- /.container -->
			</section>


			<section class="vc_row pb-50 bg-cover bg-center" style="background: rgb(228, 228, 240);">
				
				<div class="lqd-particles-bg-wrap">
					
				</div><!-- /.lqd-particles-bg-wrap -->
				
				<div class="container">
					<div class="row" style="padding-left: 20px; padding-right: 20px;">
						
						<div class="lqd-column col-md-12 px-4 pt-10 pb-10 bg-white box-shadow-1">
							
							<div class="lqd-column-inner bg-white border-radius-6 px-3 px-md-4 pt-40 pb-40">

								<div style="font-size: 20px; color:#2D323D"><b>Buy Airtime </b></div><br>
								<textarea style="width: 100%;border-color:#808291">https://diligentmart.com/api/api.php?userID=<?php echo $refID; ?>&apiKey=<?php echo $apiKey; ?>&serviceID=ID&phoneNo=PHONE_NO&airTime_amount=1000</textarea>
								<br>
								<div style="color:#2D323D"><b>Sample Codes </b></div>
								<textarea style="width: 100%;border-color:#808291">https://diligentmart.com/api/api.php?userID=qe3r4&apiKey=ruey23jf&serviceID=25&phoneNo=07069497582&airTime_amount=1000</textarea>
								<div style="color:#2D323D">JSON Response</div>
								<div>{"date":"2020-08-15", "id":"qe3r4", "status":"success"}</div>
								<br>
								<div style="font-size: 20px; color:#2D323D"><b>Here is a description of the parameters used in the URL above</b></div>
								<table style="outline: none !important; max-width: 100%; border-collapse: separate; border-spacing: 0px; margin-bottom: 20px; border-width: 1px 1px 1px 0px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-top-color: rgb(221, 221, 221); border-right-color: rgb(221, 221, 221); border-bottom-color: rgb(221, 221, 221); border-radius: 4px; color: rgb(51, 51, 51); font-family: Ubuntu, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">
	<thead style="outline: none !important;">
		<tr>
			<td style="border-left:1px solid rgb(221, 221, 221); border-top:1px solid rgb(221, 221, 221); outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; ">
			userID</td>
			<td style="border-left:1px solid rgb(221, 221, 221); border-top:1px solid rgb(221, 221, 221); outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; ">
			Your userID</td>
		</tr>
		<tr>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			apiKey</td>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			Your APIKey</td>
		</tr>
		<tr>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			serviceID</td>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			serviceID</td>
		</tr>
		<tr>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			airTime_amount</td>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			Amount to purchase</td>
		</tr>
		<tr>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			phoneNo</td>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			Phone No to purchase for</td>
		</tr>
	</thead>
	<tbody style="outline: none !important;">
		</tbody></table>
		<br>
	<div>
	<div style="font-size: 20px; color:#2D323D"><b>Services</b></div>
	<table id="airtimeServiceTable" class="table" data-show-toggle="false" data-paging="true" data-sorting="true" data-filtering="true" data-paging-size="10">
                                </table>
	</div>
		<div style="color:#2D323D"><b>API Responses </b></div>
		<div>
		<p class="MsoNormal" style="line-height: 15.0pt; margin-bottom: 7.5pt; background: white">
<span style="font-size: 10.5pt; font-family: Arial,sans-serif; color: #333333">
The following responses will indicate if your message was received - success, or 
if there was an error in your </span></p>
<p class="MsoNormal" style="line-height: 15.0pt; margin-bottom: 7.5pt; background: white">
<span style="font-size: 10.5pt; font-family: Arial,sans-serif; color: #333333">
request - failure. Importantly, you must be aware that errors that have to do 
with recipient numbers are </span></p>
<p class="MsoNormal" style="line-height: 15.0pt; margin-bottom: 7.5pt; background: white">
<span style="font-size: 10.5pt; font-family: Arial,sans-serif; color: #333333">
permanent and such messages should not be resent. For errors relating to the 
message format and actual message you could modify the message and resend it.</span></p>
<br>

<table style="outline: none !important; max-width: 100%; border-collapse: separate; border-spacing: 0px; margin-bottom: 20px; border-width: 1px 1px 1px 0px; border-top-style: solid; border-right-style: solid; border-bottom-style: solid; border-top-color: rgb(221, 221, 221); border-right-color: rgb(221, 221, 221); border-bottom-color: rgb(221, 221, 221); border-radius: 4px; color: rgb(51, 51, 51); font-family: Ubuntu, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 20px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);">
	<thead style="outline: none !important;">
		<tr>
			<td style="border-left:1px solid rgb(221, 221, 221); border-top:1px solid rgb(221, 221, 221); outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; ">
			<b>STATUS</b></td>
			<td style="border-left:1px solid rgb(221, 221, 221); border-top:1px solid rgb(221, 221, 221); outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; ">
			<b>RESPONSE</b></td>
			<td style="border-left:1px solid rgb(221, 221, 221); border-top:1px solid rgb(221, 221, 221); outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; ">
			<b>DESCRIPTION</b></td>
		</tr>
		<tr>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			500</td>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			INVALID USERID OR APIKEY</td>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			The UserID and API key combination is not correct.</td>
		</tr>
		<tr>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			500</td>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			OPERATION ERRO</td>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			Erro occured during operation.</td>
		</tr>
		<tr>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			500</td>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			INSUFFICIENT FUNDS</td>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			Insufficient wallet balance.</td>
		</tr>
		<tr>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			200</td>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			SUCCESS</td>
			<td style="outline: none !important; padding: 8px; line-height: 20px; text-align: left; vertical-align: top; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(221, 221, 221); border-left-width: 1px; border-left-style: solid; border-left-color: rgb(221, 221, 221);">
			The operation was successful.</td>
		</tr>
	</thead>
	<tbody style="outline: none !important;">
		</tbody></table>
		

		</div>
							</div><!-- /.lqd-column-inner -->

						</div><!-- /.lqd-column col-md-5 col-md-offset-7 -->

					</div><!-- /.row -->
				</div><!-- /.container -->
			</section>


		</main>
		
		<?php
        include 'footer.php';
        ?>
	
</div><!-- /#wrap -->

<script src="./assets/vendors/jquery.min.js"></script>
<script src="./assets/js/theme-vendors.js"></script>
<script src="./assets/js/theme.min.js"></script>
<script src="./assets/js/liquidAjaxMailchimp.min.js"></script>
<script src="js/jquery.min.js"></script>
	<script src="js/jbox.all.min.js"></script>
	<script src="js/footable.min.js" type="text/javascript"></script>
	<script src="js/generalOp.js"></script>
	<script>
		$.get('api/get_airtime_services.php',{},function(result){
		resultJson = JSON.parse(result);
			$('#airtimeServiceTable').footable({
                          "columns": $.get('json/airtime_services_devApi_page.json'),
                          "rows": resultJson
						});
		});
		$.get('api/get_data_services.php',{},function(result){
		resultJson = JSON.parse(result);
			$('#dataServiceTable').footable({
                          "columns": $.get('json/data_services_devApi_page.json'),
                          "rows": resultJson
						});
		});
		$.fn.generate_api_key = function(){
            $.get( "api/generate_new_api_key.php",{
			}, function( data ) {
			if(data === "11111"){
				location.reload();
			}else if(data === "100112"){
				$.fn.notification("Erro Generating key -- Try again","red");
			}
			});
         
		 }
		 
	</script>
	<?php
	include 'api/footerAdditions.php'
	?>
</body>
</html>