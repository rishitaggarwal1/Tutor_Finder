<!-- Copyright (c) Rishit Aggarwal -->
<?php
	session_start();
	if (isset($_SESSION['user_id'])) {
		if(time()-$_SESSION['time']>600)
		{
			header('location:index.php');
		}
		else{}
	} 
	else {
    	header("Location:index.php");
    exit();
	} 
	$id=$_SESSION['user_id'];
	if(isset($_GET['view_id']))
	{
		$teacher_id=$_GET['view_id'];
	}
	else
	{
		header('location:student_dashboard.php');
	}
	include ('src/header.php');
	include('db/db.php');
	$sql="SELECT * from users where user_id='$id';";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($result);
	$type=$row['type'];
	if($type=="Student")
		$dashboard="student_dashboard.php";
	else
		$dashboard="tutor_dashboard.php";
?>
<body class="host_version"> 
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
						<li class="nav-item active"><a class="nav-link" href="<?php echo $dashboard; ?>">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="my_request.php">Requests</a></li>
						<li class="nav-item"><a class="nav-link" href="settings.php">Settings</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
                        <form action="src/main.php" method="post">
                        	<li><button type="submit" style="padding: 0px;" name="logout"><a class="hover-btn-new log"><span>LOG OUT</span></a></button></li>
                    	</form>
                    </ul>
				</div>
			</div>
		</nav>
	</header>
	<!-- End header -->
	<?php
		$sql="SELECT * from users, user_information where users.user_id='$teacher_id' AND users.user_id=user_information.user_id;";
		$result=mysqli_query($con,$sql);
		$row=mysqli_fetch_assoc($result);
	?>
	<div class="all-title-box">
		<div class="container text-center">
			<h1>Teacher Information<span class="m_1">Check the complete information.</span></h1>
		</div>
	</div>
	<br>
	<?php
		if(isset($_GET['msg']))
		{
			$msg=$_GET['msg'];
			if($msg=="successfully_given_feedback")
			{
			?>

			<div class="row justify-content-center">
	            <div class="col-lg-8 col-md-8 col-sm-10 col-12">
	            	<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <strong>Success!</strong> Your feedback has successfully sent.
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
			<div class="row justify-content-center">
            	<div class="col-lg-8 col-md-8 col-sm-10 col-12">
	            	<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <strong>Error!</strong> Your feedback has not sent.
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

    <div id="overviews" class="section wb">
        <div class="container">
            <div class="row"> 
                <div class="col-lg-9 blog-post-single">
                    <div class="blog-item">
						<div class="post-content">
							<div class="post-date">
								<span class="day">Rs <?php echo $row['average_tution_fees']; ?></span>
								<span class="month">/ Month</span>
							</div>
							<!-- <div class="meta-info-blog">
								<span><i class="fa fa-calendar"></i> <a href="#">May 11, 2015</a> </span>
								<span><i class="fa fa-tag"></i>  <a href="#">News</a> </span>
								<span><i class="fa fa-comments"></i> <a href="#">12 Comments</a></span>
							</div> -->
							<div class="blog-title">
								<div class="course-title">
									<h1 class="font_color_change" style="font-weight: bold;"><?php echo $row['name']; echo ' ( '; echo $row['highest_qualification']; echo ' )'; ?></h1>
								</div>
							</div>
							<div class="blog-desc">
								<p><?php echo $row['about']; ?></p>
								<blockquote class="default">
									<p style="margin-bottom:0px;"><b>Gender: </b><span class="font_color_change"><?php echo $row['gender']; ?></span></p>
									<p style="margin-bottom:0px;"><b>School Teaches In: </b><span class="font_color_change"><?php echo $row['recent_school']; ?></span></p>
									<p style="margin-bottom:0px;"><b>Class He Teaches: </b><span class="font_color_change">Above <?php echo $row['above_class']; ?></span></p>
								</blockquote>
								<div class="row">
									<div class="col-lg-3 col-md-3 col-sm-3 col-1"></div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-10 text-center">
										<p class="font_color_change" style="margin-bottom:0px;"><?php echo $row['address']; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-3 col-md-3 col-sm-3 col-1"></div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-10 text-center">
										<p><span class="font_color_change"><?php echo $row['district']; ?></span> <span class="font_color_change"><?php echo $row['state']; ?></span></p>
									</div>
								</div>
							</div>							
						</div>
					</div>
					<hr class="hr3">
					
					<div class="comments-form">
						<h4>Give Your Valueable Feedback</h4>
						<div class="comment-form-main">
							<form action="src/main.php" method="post">
								<div class="row">
									<div class="col-md-12 col-sm-12 col-lg-12 col-12">
										<input type="text" name="teacherid" hidden value="<?php echo $row['user_id']; ?>">
										<div class="form-group">
											<select class="form-control" name="rating"required>
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
											<textarea class="form-control" name="message" placeholder="Message" id="message" cols="30" rows="2"></textarea>
										</div>
									</div>
									<div class="col-md-12 post-btn">
										<button class="hover-btn-new orange" type="submit" name="teacher_rating"><span>Send</span></button>
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
								Rating: <span class="font_color_change"><?php 

									for ($x = 0; $x <$row['rating']; $x++)
									{
									?>
										<i class="fa fa-star"></i>
									<?php
									}
									echo ' (*';
									echo $row['people_rated'];
									echo ' )';
								?></span>							
							</div>
				<?php
					if($type=="Student")
					{
					?>
						<div>
						<input type="text" name="teacher_id" value="<?php echo $row['user_id']; ?>" id="teacher_id" hidden>
								<?php 
								$teacher_id=$_GET['view_id'];
								$s="SELECT * from tution_request where student_id='$id' AND tutor_id='$teacher_id' AND is_accepted=0;";
            					$res=mysqli_query($con,$s);
									if(mysqli_num_rows($res)==0)
									{
									?>
										<button class="btn btn-primary request_tution" id="1" style="width:100%;" name="get_teacher_info" type="submit">Request for Demo</button>
									<?php
									}
									else
									{
									?>
										<button class="btn btn-secondary" style="width:100%;" name="get_teacher_info" type="submit">Already Sent</button>
									<?php
									}
								?>
									
								</div>

					<?php
					}
				?>
					<br>
					<div class="widget-categories">
						<h3 class="widget-title">Subject:</h3>
						<ul>
							<li><a href="#"><?php echo $row['subject1']; ?></a></li>
							<li><a href="#"><?php echo $row['subject2']; ?></a></li>
							<li><a href="#"><?php echo $row['subject3']; ?></a></li>
						</ul>
					</div>
				</div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section -->
    <?php
    	include 'src/footer.php';
    ?>
    <script>
        $('.request_tution').click(function(e) {
            e.preventDefault();
            var teacher_id = $('#teacher_id').val();
            $.ajax({
                url: "src/main.php",
                type: "POST",
                data: {teacher_id: teacher_id},
                success: function(data) {
                	location.reload();
                }
            });
        });
    </script>

</body>
</html>