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
	<link rel="stylesheet" href="css/jBox.all.min.css" />
	
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
								<div class="liquid-blog-grid row" data-liquid-masonry="true">
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


								$handle2 = "SELECT * FROM blog_posts ORDER BY id DESC LIMIT $offset, $no_of_records_per_page";
								$result2 = $conn->query($handle2);
								if ($result2->num_rows > 0) {
									while($row = $result2->fetch_assoc()) {
										$shortend_title = substr($row["title"],0,50);
										$shortend_body = substr($row["body"],0,100);
										echo '<div class="lqd-column col-md-3 col-sm-6 masonry-item">

										<article class="liquid-lp mb-40">
								
											<figure class="liquid-lp-media">
												<a href="blog-post.php?id='.$row["id"].'">
													<img style="height: 250px;" src="./api/uploads/blog_post_pic/'.$row["id"].'/post_pic.jpg" alt="Lates Post">
												</a>
											</figure>
										
											<header class="liquid-lp-header" style="height: 50px;">
												<h2 class="liquid-lp-title h4 font-size-19"><a href="#">'.$shortend_title.'</a></h2>
											</header>
										
											<div class="liquid-lp-excerpt" style="height: 50px;">
												<p>'.$shortend_body.'</p>
											</div><!-- /.latest-post-excerptc -->
										
											<footer class="liquid-lp-footer">
												<a href="blog-post.php?id='.$row["id"].'" class="btn btn-naked liquid-lp-read-more font-weight-bold">
													<span>
														<a href="blog-post.php?id='.$row["id"].'"><span class="btn-txt">Read more</span></a>
														<span class="btn-icon">
															<i class="fa fa-angle-right"></i>
														</span>
													</span>
												</a>
											</footer>
										
										</article>
								
									</div><!-- /.col-md-3 col-sm-6 -->';
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
	<script src="js/jquery.min.js"></script>
	<script src="js/jbox.all.min.js"></script>
	<script src="js/generalOp.js"></script>
	<?php
	include 'api/footerAdditions.php'
	?>

</body>
</html>