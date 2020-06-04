<!-- Copyright (c) Rishit Aggarwal -->
<?php
	session_start();
	include ('src/header.php');
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
						<li class="nav-item"><a class="nav-link" href="student_dashboard.php">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="my_request.php">Requests</a></li>
						<li class="nav-item active"><a class="nav-link" href="settings.php">Settings</a></li>
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
			<h1>Your Profile<span class="m_1">All About You.</span></h1>
		</div>
	</div>

	<div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <p class="lead">Your Profile!</p>
                </div>
            </div>
            <div class="row">
            	<div class="col-lg-1 col-md-1"></div>
            	<div class="col-lg-10 col-md-10 col-sm-12 col-12">
            		
            		<?php
            			$id=$_SESSION['user_id'];
            			include('db/db.php');
            			$sql="SELECT * from users where user_id='$id';";
            			$result=mysqli_query($con,$sql);
            			$row=mysqli_fetch_assoc($result);
            			$name=$row['name'];
            			$email=$row['email_id'];
            			$mobile=$row['mobile'];
            			$type=$row['type'];
            			if($type=="Student")
            			{
            		?>
            			<form>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Name:</label>
						    <input type="text" class="form-control" placeholder="<?php echo $name; ?>" aria-describedby="emailHelp" disabled="disabled">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Email:</label>
						    <input type="text" class="form-control" placeholder="<?php echo $email; ?>" aria-describedby="emailHelp" disabled="disabled">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Mobile:</label>
						    <input type="text" class="form-control" placeholder="<?php echo $mobile; ?>" aria-describedby="emailHelp" disabled="disabled">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Type of Account:</label>
						    <input type="text" class="form-control" placeholder="<?php echo $type; ?>" aria-describedby="emailHelp" disabled="disabled">
						  </div>
						</form>
					<?php
						}
					?>
            	</div>
            </div>
        </div>
    </div>




    <?php
    	include('src/footer.php');
    ?>

</body>
</html>