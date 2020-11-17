<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="theme-color" content="#3ed2a7">
	
	<link rel="shortcut icon" href="./favicon.png" />
	
	<title>diligentmart</title>
	
	<link rel="stylesheet" href="https://use.typekit.net/{YOUR_API_KEY}.css">
	
	<link rel="stylesheet" href="assets/vendors/liquid-icon/liquid-icon.min.css" />
	<link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css" />
	<link rel="stylesheet" href="assets/css/theme-vendors.min.css" />
	<link rel="stylesheet" href="assets/css/theme.min.css" />
	<link rel="stylesheet" href="assets/css/themes/seo.css" />
	
	<!-- Head Libs -->
	<script async src="assets/vendors/modernizr.min.js"></script>
	
</head>
<body class="blog" data-mobile-nav-trigger-alignment="right" data-mobile-nav-align="left" data-mobile-nav-style="modern" data-mobile-nav-shceme="gray" data-mobile-header-scheme="gray" data-mobile-nav-breakpoint="1199">
	
	<div id="wrap">

    <?php 
	include 'header3.php';
	include 'api/connect.php';
    ?>
	<br>
	<main id="content" class="content">
			
			<section class="vc_row">
				<div class="container">
					<div class="row">

						<div class="lqd-column col-md-12">

							<div class="liquid-blog-posts">
								<div class="row" data-liquid-masonry="true">
								<?php
								if (isset($_GET['pageno'])) {
									$pageno = $_GET['pageno'];
								} else {
									$pageno = 1;
								}
								$no_of_records_per_page = 8;
								$offset = ($pageno-1) * $no_of_records_per_page;

								
								$total_pages_sql = "SELECT COUNT(*) FROM blog_posts";
								$result = mysqli_query($conn,$total_pages_sql);
								$total_rows = mysqli_fetch_array($result)[0];
								$total_pages = ceil($total_rows / $no_of_records_per_page);


								$handle2 = "SELECT * FROM products_posts ORDER BY id DESC LIMIT $offset, $no_of_records_per_page";
								$result2 = $conn->query($handle2);
								if ($result2->num_rows > 0) {
									while($row = $result2->fetch_assoc()) {
										echo '<div class="lqd-column col-md-3 col-xs-6" style="height: 400px;">
				
		<div class="ld-sp pos-rel">
			<figure class="ld-sp-img">
				<a>
					<img class="nl_produImg" style="height: 200px;" src="./api/uploads/product_post/'.$row["id"].'/post_pic.jpg" alt="Product">
				</a>
			</figure>
			<div class="ld-sp-info">
				<h3>
					<div style="color: #808291; height: 50px;" >'.$row["name"].'</div>
				</h3>
				<p class="ld-sp-price">
					<span class="ld-sp-price-amount" style="color: #808291;">
						<span class="ld-sp-currency" >₦</span>'.$row["price"].'
					</span>
				</p>
				<p><a href="Tel:'.$row["phone"].'"><button type="button" class="btn ld_sf_button px-4">Call</button></a></p>
			</div><!-- /.ld-sp-info -->
		</div><!-- /.ld-sp -->

	</div>';
									}
								}
								?>
									
	
									
								</div><!-- /.liquid-blog-grid row -->
								<ul class="pagination">
								<li><a href="?pageno=1">First</a></li>
								<li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
									<a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
								</li>
								<li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
									<a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
								</li>
								<li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
							</ul>
							</div><!-- /.liquid-blog-posts -->

						</div><!-- /.col-md-12 -->

					</div><!-- /.row -->
				</div><!-- /.container -->
			</section><!-- /.vc_row -->
			
		</main><!-- /#content.content -->
		
		<?php
        include 'footer.php';
        ?>
	
	</div><!-- /#wrap -->

	<script src="./assets/vendors/jquery.min.js"></script>
	<script src="./assets/js/theme-vendors.js"></script>
	<script src="./assets/js/theme.min.js"></script>

</body>
</html>