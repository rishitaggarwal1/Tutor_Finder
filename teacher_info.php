<!-- Copyright (c) Rishit Aggarwal -->
<?php
	session_start();
	include ('src/header.php');
	$id=$_SESSION['user_id'];
?>
<body class="host_version"> 

	<!-- Modal -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header tit-up">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Customer Login</h4>
			</div>
			<div class="modal-body customer-box">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs">
					<li><a class="active" href="#Login" data-toggle="tab">Login</a></li>
					<li><a href="#Registration" data-toggle="tab">Registration</a></li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content">
					<div class="tab-pane active" id="Login">
						<form role="form" class="form-horizontal">
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="email1" placeholder="Name" type="text">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="exampleInputPassword1" placeholder="Email" type="email">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-10">
									<button type="submit" class="btn btn-light btn-radius btn-brd grd1">
										Submit
									</button>
									<a class="for-pwd" href="javascript:;">Forgot your password?</a>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="Registration">
						<form role="form" class="form-horizontal">
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" placeholder="Name" type="text">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="email" placeholder="Email" type="email">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="mobile" placeholder="Mobile" type="email">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" id="password" placeholder="Password" type="password">
								</div>
							</div>
							<div class="row">							
								<div class="col-sm-10">
									<button type="button" class="btn btn-light btn-radius btn-brd grd1">
										Save &amp; Continue
									</button>
									<button type="button" class="btn btn-light btn-radius btn-brd grd1">
										Cancel</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	  </div>
	</div>

    <!-- LOADER -->
	<div id="preloader">
		<div class="loader-container">
			<div class="progress-br float shadow">
				<div class="progress__item"></div>
			</div>
		</div>
	</div>
	<!-- END LOADER -->	

    <!-- Start header -->
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.php" style="margin-right:0px;">
					<img src="images/logo.png" alt="" />
				</a>
				<h1 style="margin-top:5px;color:white; font-weight: bold; font-size:20pt;">Tutor-<span style="color:#eea412; font-size:24pt;">Finder</span></h1>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-host">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="student_dashboard.php">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="my_request.php">Requests</a></li>
						<li class="nav-item"><a class="nav-link" href="settings.php">Settings</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
                        <li><a class="hover-btn-new log" href="index.php""><span>LOG OUT</span></a></li>
                    </ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	<div class="all-title-box">
		<div class="container text-center">
			<h1>Teacher Information<span class="m_1">Check the complete information.</span></h1>
		</div>
	</div>
	
    <div id="overviews" class="section wb">
        <div class="container">
            <div class="row"> 
                <div class="col-lg-9 blog-post-single">
                    <div class="blog-item">
						<div class="post-content">
							<div class="post-date">
								<span class="day">Rs 5000</span>
								<span class="month">/ Month</span>
							</div>
							<!-- <div class="meta-info-blog">
								<span><i class="fa fa-calendar"></i> <a href="#">May 11, 2015</a> </span>
								<span><i class="fa fa-tag"></i>  <a href="#">News</a> </span>
								<span><i class="fa fa-comments"></i> <a href="#">12 Comments</a></span>
							</div> -->
							<div class="blog-title">
								<div class="course-title">
									<h1 class="font_color_change" style="font-weight: bold;">Rishit Aggarwal (B.Tech)</h1>
								</div>
							</div>
							<div class="blog-desc">
								<p>Lorem ipsum door sit amet, fugiat deicata avise id cum, no quo maiorum intel ogrets geuiat operts elicata libere avisse id cumlegebat, liber regione eu sit.... </p>
								<blockquote class="default">
									<p style="margin-bottom:0px;"><b>Gender: </b><span class="font_color_change">Male</span></p>
									<p style="margin-bottom:0px;"><b>School Teaches In: </b><span class="font_color_change">Arya Senior Secondary School</span></p>
									<p style="margin-bottom:0px;"><b>Class He Teaches: </b><span class="font_color_change">Above 10th</span></p>
								</blockquote>
								<div class="row">
									<div class="col-lg-3 col-md-3 col-sm-3 col-1"></div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-10">
										<p class="font_color_change" style="margin-bottom:0px;">Rupesh Electrical and Works, Railway Road, Gharaunda</p>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-3 col-md-3 col-sm-3 col-1"></div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-10 text-center">
										<p><span class="font_color_change">Karnal</span> <span class="font_color_change">Haryana</span></p>
									</div>
								</div>
							</div>							
						</div>
					</div>
					<hr class="hr3">
					
					<div class="comments-form">
						<h4>Give Your Valueable Feedback</h4>
						<div class="comment-form-main">
							<form action="#">
								<div class="row">
									<div class="col-md-12 col-sm-12 col-lg-12 col-12">
										<div class="form-group">
											<select class="form-control" name="gender" value="<?php echo $row1['gender']; ?>">
												<option value="" selected="selected" disabled="">Rating</option>
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
											</select>
										</div>
									</div>
									<div class="col-md-12 col-lg-12 col-sm-12 col-12">
										<div class="form-group">
											<textarea class="form-control" name="commenter-message" placeholder="Message" id="commenter-message" cols="30" rows="2"></textarea>
										</div>
									</div>
									<div class="col-md-12 post-btn">
										<button class="hover-btn-new orange"><span>Send</span></button>
									</div>
								</div>
							</form>
						</div>
					</div>
					
                </div><!-- end col -->
				<div class="col-lg-3 col-12 right-single">
					<div class="widget-search" style="margin-bottom: 10px;">
						<div class="image-blog">
							<img src="images/tutor/1.jpg" alt="" class="img-fluid">
						</div>
					</div>
					<div class="course-rating text-center" style="margin-bottom:5px;">
						<span class="font_color_change">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</span>							
					</div>
					<div class="widget-categories">
						<h3 class="widget-title">Subject:</h3>
						<ul>
							<li><a href="#">Physics</a></li>
							<li><a href="#">Chemistry</a></li>
							<li><a href="#">Maths</a></li>
						</ul>
					</div>
				</div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
    <?php
    	include 'src/footer.php';
    ?>

</body>
</html>