<?php
include 'api/connect.php';
$id = $_GET["id"];

$title = "";
$author = "";
$body = "";
$date = "";

$handle2 = "SELECT * FROM blog_posts WHERE id='$id'";
								$result2 = $conn->query($handle2);
								if ($result2->num_rows > 0) {
									while($row = $result2->fetch_assoc()) {
										$title = $row["title"];
										$author = $row["author"];
										$body = $row["body"];
										$date = $row["date"];
									}
								}
?>
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
    <link href="css/footable.standalone.min.css" rel="stylesheet">
    <link href="css/dropzone.css" rel="stylesheet">
	
	<!-- Head Libs -->
	<script async src="assets/vendors/modernizr.min.js"></script>
	
</head>
<body class="blog blog-single-default blog-scheme-dark" data-mobile-nav-trigger-alignment="right" data-mobile-nav-align="left" data-mobile-nav-style="modern" data-mobile-nav-shceme="gray" data-mobile-header-scheme="gray" data-mobile-nav-breakpoint="1199">
	
	<div id="wrap">
		
	<?php 
    include 'header.php';
    ?>
	
		<main id="content" class="content py-0">
			
			<div class="blog-single-cover scheme-light" data-fullheight="true" data-inview="true" data-inview-options='{ "onImagesLoaded": true }' style="background-color: #666871;">

				<figure class="blog-single-media" data-responsive-bg="true" data-parallax="true" data-parallax-options='{ "parallaxBG": true, "triggerHook": "onLeave" }' data-parallax-from='{ "translateY": "0%" }' data-parallax-to='{ "translateY": "20%" }'>
					<img src="./api/uploads/blog_post_pic/<?php echo $id; ?>/post_pic.jpg" alt="Blog single">
				</figure>
				
				<div class="blog-single-details">
					
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								
								<header class="entry-header blog-single-header" data-parallax="true" data-parallax-to='{ "opacity": 0, "translateY": "30%" }' data-parallax-options='{ "triggerHook": "0.3" }'>
									<h1 class="blog-single-title entry-title h2" data-split-text="true" data-split-options='{ "type": "lines" }'><?php echo $title; ?></h1>
									<div class="post-meta">
										<span class="byline">
											<span class="block text-uppercase ltr-sp-1">Author:</span>
											<span class="author vcard">
												<a class="url fn n" href="#"><?php echo $author; ?></a>
											</span>
										</span>
										<span class="posted-on">
											<span class="block text-uppercase ltr-sp-1">Published on:</span>
											<a href="#" rel="bookmark">
												<time class="entry-date published updated" datetime="<?php echo $date; ?>"><?php echo $date; ?></time>
											</a>
										</span>
									</div><!-- /.post-meta -->
								</header><!-- /.blog-single-header -->
								
							</div><!-- /.col-md-6 -->
						</div><!-- /.row -->
					</div><!-- /.container -->
					
				</div><!-- /.blog-single-details -->
				
			</div><!-- /.blog-single-cover -->
			
			<article class="blog-single">
				
				<div class="container">
					
					<div class="row">
						
						<div class="col-md-8 col-md-offset-2">
							
							<div class="blog-single-content entry-content pull-up expanded">
								
								<p class="add-dropcap">
									<?php echo $body; ?>	
								</p>
						
														</div><!-- /.blog-single-content entry-content -->
							
							<footer class="blog-single-footer entry-footer">
								
								<span class="tags-links">
								</span>
								
								<!-- <span class="share-links">
									<span class="text-uppercase ltr-sp-1">Share On</span>
									<ul class="social-icon circle branded social-icon-sm">
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-google"></i></a></li>
										<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
									</ul>
								</span> -->
								
							</footer><!-- /.blog-single-footer entry-footer -->
							
						
					</div><!-- /.row -->
				</div><!-- /.container -->
				
				<div id="comments" class="comments-area">
					
					<div id="respond" class="comment-respond filled">
						
						<div class="container">
							<div class="row">
								<div class="col-md-8 col-md-offset-2">
									
									<h3 id="reply-title" class="comment-reply-title">Leave a comment</h3>
									
									<form action="#" method="post" id="commentform" class="comment-form" novalidate="">
										<!-- <p class="comment-notes">
											<span id="email-notes">Your email address will not be published.</span> Required fields are marked
											<span class="required">*</span>
										</p> -->
										<div class="row">
											<div class="col-md-6 col-sm-6">
												<p class="comment-form-author">
													<input id="comment_name" value="<?php if(empty($name)){}else{echo $name;} ?>" name="author" type="text" size="30" maxlength="245" aria-required="true" required="required" placeholder="Name*">
													
												</p>
											</div><!-- /.col-md-4 col-sm-6 -->
											<div class="col-md-6 col-sm-6">
												<p class="comment-form-email">
													<input id="comment_email" value="<?php if(empty($email)){}else{echo $email;} ?>" name="email" type="email" size="30" maxlength="100" aria-describedby="email-notes" aria-required="true" required="required" placeholder="Email*">
													
												</p>
											</div><!-- /.col-md-4 col-sm-6 -->
											<div class="col-sm-12">
												<p class="comment-form-comment">
													<textarea id="comment_comment" name="comment" cols="45" rows="5" maxlength="65525" aria-required="true" required="required" placeholder="Comment*"></textarea>
													
												</p>
											</div><!-- /.col-sm-12 -->
											<div class="col-sm-12 text-right">
												<p class="form-submit">
													<button id="submitBTN" class="lamboSubmitBTN" style="cursor: pointer;" onclick="$.fn.submit_data()" type="button"><span id="submitBtnTxt">SUBMIT </span><img id="submitBTNLoaderImg" src="images/loading.gif" style="width: 50px; height:50px; display:none" /></button>
												</p>
											</div><!-- /.col-sm-12 -->
										</div><!-- /.row -->
									</form>
									
								</div><!-- /.col-md-8 col-md-offset-2 -->
							</div><!-- /.row -->
						</div><!-- /.container -->
						
					</div><!-- /.comment-form -->
					
					<div class="container">
						<div class="row" id="comments_container">

						<?php 
					
					$handle3 = "SELECT * FROM comments WHERE postID='$id' ORDER BY id DESC";
					$result3 = $conn->query($handle3);
					if ($result3->num_rows > 0) {
						while($row = $result3->fetch_assoc()) {
							
							echo '<div class="col-md-8 col-md-offset-2">
								
							<ol class="comment-list">
								
								<li class="comment">
									<article class="comment-body">
										<footer class="comment-meta">
											<div class="comment-author vcard">
                                            <img alt="Avatar" src="./assets/demo/avatars/avatar-4.jpg" class="avatar">
												<b class="fn">
													<a href="#" rel="external nofollow" class="url">'.$row["name"].'</a>
												</b>
												<span class="says">says:</span>
											</div> <!-- .comment-author -->
											
											<div class="comment-metadata">
												<a href="#">
													<time datetime="'.$row["date"].'">'.$row["date"].'</time>
												</a>
											</div> <!-- .comment-metadata -->
										</footer> <!-- .comment-meta -->
										
										<div class="comment-content">
											<p>'.$row["comment"].'</p>
										</div> <!-- .comment-content -->
										
									</article> <!-- .comment-body -->
								</li> <!-- #comment-## -->
							</ol>
							
						</div>';
						}
					}
							?>

							
						</div><!-- /.row -->
					</div><!-- /.container -->
					
				</div><!-- /.comments-area -->

				<div class="lqd-column col-md-12 pt-85" style="border-top: 3px solid #000">

					<div class="liquid-blog-posts">
						<div class="liquid-blog-grid row" data-liquid-masonry="true">
					<?php 
					
					$handle2 = "SELECT * FROM blog_posts ORDER BY id DESC LIMIT 4";
					$result2 = $conn->query($handle2);
					if ($result2->num_rows > 0) {
						while($row = $result2->fetch_assoc()) {
							$shortend_title = substr($row["title"],0,50);
							$shortend_body = substr($row["body"],0,100);
							echo '<div class="lqd-column col-md-3 col-sm-6 masonry-item">

							<article class="liquid-lp mb-40">

								<figure class="liquid-lp-media">
									<a href="blog-post.php?id='.$row["id"].'">
										<img src="./api/uploads/blog_post_pic/'.$row["id"].'/post_pic.jpg" alt="Lates Post">
									</a>
								</figure>
							
								<header class="liquid-lp-header">
									<h2 class="liquid-lp-title h4 font-size-19"><a href="#">'.$shortend_title.'</a></h2>
								</header>
							
								<div class="liquid-lp-excerpt">
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
					</div><!-- /.liquid-blog-posts -->

				</div><!-- /.col-md-12 -->
				
			</article><!-- /.blog-single -->
			
		</main><!-- /#content.content -->
		
		<?php
        include 'footer.php';
        ?>
	
	</div><!-- /#wrap -->

	<script src="js/jquery.min.js"></script>
<script src="js/jbox.all.min.js"></script>
<script src="js/footable.min.js" type="text/javascript"></script>
<script src="js/generalOp.js"></script>
<script type="text/javascript" src="js/dropzone.js"></script>
<script src="./assets/js/theme-vendors.js"></script>
<script src="./assets/js/theme.min.js"></script>
<script src="./assets/js/liquidAjaxMailchimp.min.js"></script>
	<script>
		$.fn.get_comments = function(){
			$.get( "api/get_comments.php",{
				id:"<?php echo $id ?>"
			},function(result){
				$("#comments_container").html(result);
			})
		}
		$.fn.submit_data = function(){
		dispSubmitBtnLoader();
            var comment_email = $("#comment_email").val();
			var comment_name = $("#comment_name").val();
            var comment_comment = $("#comment_comment").val();
			
			if(comment_name.length <= 0){
                $.fn.confirm("Pls Enter Name","red",function(){});
				clearSubmitBtnLoader();
			}else{

                if(comment_comment.length <= 0){
                $.fn.confirm("Pls Enter Comment","red",function(){});
				clearSubmitBtnLoader();
                }else{
                    dispSubmitBtnLoader();
                    $.post( "api/process_comment_submit.php",{
                        email: comment_email,
                        name: comment_name,
						comment: comment_comment,
						postID: "<?php echo $id; ?>"
				
			}, function( data ) {
			if(data === "100112"){
				$.fn.notification("Erro making post","red");
				clearSubmitBtnLoader();
			}else if(data === "100111"){
				$.fn.notification("User does not exsist -- Try loging in first","red");
				clearSubmitBtnLoader();
			}else if(data === "11111"){
				clearSubmitBtnLoader();
				$.fn.notification("Submited Successfully","green");
				$.fn.get_comments();
            }
			});
                }

			}
         
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