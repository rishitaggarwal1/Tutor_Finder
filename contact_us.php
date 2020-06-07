<!-- Copyright (c) Rishit Aggarwal -->
<!-- Header File Linking -->
<?php
	include('src/header.php');
?>
<body class="host_version"> 

	<!-- Modal -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header tit-up">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Login-Register</h4>
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
						<form method="post" class="form-horizontal" action="src/main.php">
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="login_email" id="email1" placeholder="Enter your Email..." type="email" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="login_pass" id="exampleInputPassword1" placeholder="Password" type="password" required>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-10">
									<button type="submit" name="login_btn" class="btn btn-light btn-radius btn-brd grd1">Submit</button>
									<a class="for-pwd" href="javascript:;">Forgot your password?</a>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane" id="Registration">
						<form method="post" class="form-horizontal" action="src/main.php">
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="register_name" placeholder="Name" type="text" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="register_email" id="email" placeholder="Enter your Email" type="email" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="register_mobile" id="mobile" placeholder="Phone Number" type="text" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="register_pass1" id="password" placeholder="Password" type="password" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<input class="form-control" name="register_pass2" id="password" placeholder="Re-type Password" type="password" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
								<select class="form-control" name="register_type" required>
									<option value="" selected="selected" disabled="">Type of Account</option>
									<option value="Student">Student/Parent</option>
									<option value="Tutor">Tutor</option>
								</select>
								</div>
							</div>
							<div class="row">							
								<div class="col-sm-10">
									<button type="submit" name="register_btn" class="btn btn-light btn-radius btn-brd grd1">Submit</button>
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
						<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
						<li class="nav-item active"><a class="nav-link" href="contact_us.php">Contact</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
                        <li><a class="hover-btn-new log" href="#" data-toggle="modal" data-target="#login"><span>LOGIN</span></a></li>
                    </ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	
	<div class="all-title-box">
		<div class="container text-center">
			<h1>Contact<span class="m_1">24X7 Available for You.</span></h1>
		</div>
	</div>
	
	<?php
		if(isset($_GET['msg']))
		{
			$msg=$_GET['msg'];
			if($msg=="mail_sent_successfully")
			{
			?>
			<br>
			<div class="row justify-content-center text-center">
	            <div class="col-lg-8 col-md-8 col-sm-10 col-12">
	            	<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <strong>Success!</strong> Your query has successfully sent.
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>
	            </div>
	        </div>

			<?php
			}
			else if($msg=="Error")
			{
			?>
			<br>
			<div class="row justify-content-center text-center">
            	<div class="col-lg-8 col-md-8 col-sm-10 col-12">
	            	<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <strong>Error!</strong> Your query has not sent.
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>
	            </div>
	        </div>
			<?php
			}
		}
	?>

    <div id="contact" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Need Help? Sure we are Online!</h3>
                <p class="lead">Feel Free to Email us anytime. We are here to solve your every query.<br>We are available 24X7 for you!</p>
            </div><!-- end title -->

            <div class="row justify-content-center">
                <div class="col-xl-8 col-md-12 col-sm-12">
                    <div class="contact_form">
                        <div id="message"></div>
                        <form id="contactform" action="src/main.php" method="post">
                            <div class="row row-fluid">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Your Email">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Your Phone">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <textarea class="form-control" name="comments" id="comments" rows="6" placeholder="Give us more details.."></textarea>
                                </div>
                                <div class="text-center pd">
                                    <button type="submit" value="SEND" id="submit" name="send_email" class="btn btn-light btn-radius btn-brd grd1 btn-block">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
	
	<!-- Footer File Linking -->
	<?php
    	include('src/footer.php');
    ?>

</body>
</html>