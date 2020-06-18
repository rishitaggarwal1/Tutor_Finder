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
	include ('src/header.php');
	include('db/db.php');
	$id=$_SESSION['user_id'];
	$sql="SELECT * from users where user_id='$id';";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($result);
	date_default_timezone_set("Asia/Calcutta");
	$time=date("h");
	$a_p=date("a");
	if($time>5 && $time <12 && $a_p=="am")
		$greet="Good Morning!";
	else if($time>=0 && $time <6 && $a_p=="pm")
		$greet="Good Afternoon!";
	else if($time>=6 && $time <12 && $a_p=="pm")
		$greet="Good Evening!";
	else
		$greet="Good Night!";
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
						<li class="nav-item active"><a class="nav-link" href="student_dashboard.php">Home</a></li>
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
	
	<div class="all-title-box">
		<div class="container text-center">
			<h1>Best Tutor<span class="m_1">Find a way for your Success.</span></h1>
		</div>
	</div>
	
    <div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <p class="lead font_color_change"><?php echo $greet; echo ' '.$row['name']; ?></p>
                    <p>Here are some of our Top Rated Teacher.</p>
                </div>
            </div><!-- end title -->

            <hr class="invis"> 
            <div class="row">

            	<?php
            		include('db/db.php');
            		$sql="Select * from user_information, users where user_information.user_id=users.user_id ORDER BY rating DESC;";
            		$res=mysqli_query($con,$sql);
            		while($row=mysqli_fetch_array($res,MYSQLI_ASSOC))
            		{
            		?>

            	<div class="col-lg-4 col-md-6 col-12" style="margin-bottom: 20px;">
                    <div class="course-item">
						<div class="image-blog">
							<img src="images/tutor/<?php echo $row['profile_image']; ?>" style="width:100%; height:40vh;" alt="" class="img-fluid">
						</div>
						<div class="course-br">
							<div class="course-title">
								<h2><a href="#" title=""><?php echo $row['name']; ?><i> (<?php echo $row['highest_qualification']; ?>)</i></a></h2>
							</div>
							<div class="course-desc">
								<p style="margin-bottom:0px;">Subject: <span class="font_color_change"> <?php echo $row['subject1']; ?></span>,<span class="font_color_change"> <?php echo $row['subject2']; ?></span>,<span class="font_color_change"> <?php echo $row['subject3']; ?></span></p>
								<p style="margin-bottom:0px;">Class: <span class="font_color_change"> Above <?php echo $row['above_class']; ?></span></p>
								<p style="margin-bottom:0px;">Average Fees:<span class="font_color_change"> <?php echo $row['average_tution_fees']; ?>/month</span></p>
							</div>
							<div class="course-rating " style="margin-bottom:5px;">
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
							<div>
								<button class="btn btn-success" style="width:100%;"><a style="width:100%; color:white;" href="<?php echo 'teacher_info.php?view_id='; echo $row['user_id']; ?>" style="color:white;">View Details</a></button>
							</div>
						</div>
						<div class="course-meta-bot">
							<ul>
								<li class="font_color_change" style="font-size:12pt;"> <?php echo $row['district']; echo ' (';echo $row['state']; ?>)</li>
							</ul>
						</div>
					</div>
                </div>

            		<?php
            		}
            	?>
   
        </div><!-- end row -->			
    </div><!-- end container -->
</div><!-- end section -->


    <?php
    	include('src/footer.php');
    ?>

</body>
</html>