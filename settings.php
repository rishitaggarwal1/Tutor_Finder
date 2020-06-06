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
						<li class="nav-item"><a class="nav-link" href="<?php echo $dashboard; ?>">Home</a></li>
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
			<h1>Your Profile<span class="m_1">All About You!</span></h1>
		</div>
	</div>

	<div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <p class="lead">Your Profile!</p>
                </div>
            </div>
            <?php
            if(isset($_GET['msg']))
            {
            	$msg=$_GET['msg'];
            	if($msg=="profile_updated")
            	{
            	?>
            <div class="row justify-content-center">
	            <div class="col-lg-8 col-md-8 col-sm-10 col-12">
	            	<div class="alert alert-success alert-dismissible fade show" role="alert">
					  <strong>Success!</strong> Your profile has successfully updated.
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
					  <strong>Error!</strong> Your profile has not updated.
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
            <div class="row">
            		
            		<?php
            			if($type=="Student")
            			{
            		?>
            		<div class="col-lg-1 col-md-1"></div>
            			<div class="col-lg-10 col-md-10 col-sm-12 col-12">
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
					</div>
					<?php
						}
						else if($type=="Tutor")
						{
						$sql="SELECT * from user_information where user_id='$id';";
            			$result=mysqli_query($con,$sql);
            			$row1=mysqli_fetch_assoc($result);
					?>
					<div class="col-lg-1 col-md-1"></div>
					<div class="col-lg-10 col-md-10 col-sm-12 col-12">
					  <div class="nav-wrapper">
					    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-text" role="tablist">
					      <li class="nav-item">
					        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-text-1-tab" data-toggle="tab" href="#tabs-text-1" role="tab" aria-controls="tabs-text-1" aria-selected="true">Personal Details</a>
					      </li>
					      <li class="nav-item">
					        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-2-tab" data-toggle="tab" href="#tabs-text-2" role="tab" aria-controls="tabs-text-2" aria-selected="false">Academics Details</a>
					      </li>
					    </ul>
					  </div>
					  <br>
					<div class="tab-content" id="myTabContent1">

					<!-- Personal Details Tab -->
					  <div class="tab-pane fade show active" id="tabs-text-1" role="tabpanel" aria-labelledby="tabs-text-1-tab">
					  	<form action="src/main.php" method="post">
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
							<div class="form-group">
						    <label for="exampleInputEmail1">Gender:</label>
								<select class="form-control" name="gender" value="<?php echo $row1['gender']; ?>">
									<option value="" selected="selected" disabled="">Select</option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">About:</label>
						    <input type="text" class="form-control" name="about" placeholder="<?php echo $row1['about']; ?>" value="<?php echo $row1['about']; ?>" aria-describedby="emailHelp">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Address:</label>
						    <input type="text" class="form-control" name="address" placeholder="<?php echo $row1['address']; ?>" value="<?php echo $row1['address']; ?>" aria-describedby="emailHelp">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">District:</label>
						    <input type="text" class="form-control" name="district" placeholder="<?php echo $row1['district']; ?>" value="<?php echo $row1['district']; ?>" aria-describedby="emailHelp">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">State:</label>
						    <input type="text" class="form-control" name="state" placeholder="<?php echo $row1['state']; ?>" value="<?php echo $row1['state']; ?>" aria-describedby="emailHelp">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Profile Image:</label>
						    <input type="file" class="form-control" value="0" aria-describedby="emailHelp">
						  </div>
						<div class="text-center">
							<button class="btn btn-success" type="submit" name="personal_detail_submit" style="width:80%;">Submit</button>
						</div>
					</form>
					</div>
						<!-- Academics Details -->
						<div class="tab-pane fade" id="tabs-text-2" role="tabpanel" aria-labelledby="tabs-text-2-tab">

						<form action="src/main.php" method="post">
						  <div class="form-group">
						    <label for="exampleInputEmail1">Highest Qualification:</label>
						    <input type="text" name="highest_qualification" class="form-control" placeholder="<?php echo $row1['highest_qualification']; ?>" value="<?php echo $row1['highest_qualification']; ?>" aria-describedby="emailHelp">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">School in which you Teach:</label>
						    <input type="text" name="school" class="form-control" placeholder="<?php echo $row1['recent_school']; ?>" value="<?php echo $row1['recent_school']; ?>" aria-describedby="emailHelp">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Class Above you Teach:</label>
						    <input type="text" name="class_teaches" class="form-control" placeholder="<?php echo $row1['above_class']; ?>" value="<?php echo $row1['above_class']; ?>" aria-describedby="emailHelp">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Subject You Teach</label>
						    <div class="row">
						    	<div class="col-lg-4 col-md-4 col-sm-6 col-12">
						    		<input type="text" name="subject1" class="form-control" placeholder="<?php echo $row1['subject1'];?>" value="<?php echo $row1['subject1']; ?>" aria-describedby="emailHelp">
						    	</div>
						    	<div class="col-lg-4 col-md-4 col-sm-6 col-12">
						    		<input type="text" name="subject2" class="form-control" placeholder="<?php echo $row1['subject2'];?>" value="<?php echo $row1['subject2']; ?>" aria-describedby="emailHelp">
						    	</div>
						    	<div class="col-lg-4 col-md-4 col-sm-6 col-12">
						    		<input type="text" name="subject3" class="form-control" placeholder="<?php echo $row1['subject3'];?>" value="<?php echo $row1['subject3']; ?>" aria-describedby="emailHelp">
						    	</div>
							</div>
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Average Tution Fees (Per Month):</label>
						    <input type="text" name="fees" class="form-control" placeholder="<?php echo $row1['average_tution_fees']; ?>" value="<?php echo $row1['average_tution_fees']; ?>" aria-describedby="emailHelp">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputEmail1">Your Rating:</label>
						    <input type="text" class="form-control" placeholder="<?php echo $row1['rating']; ?>" value="<?php echo $row1['rating']; ?>" aria-describedby="emailHelp" disabled>
						  </div>
						<div class="text-center">
							<button class="btn btn-success" type="submit" name="academic_detail_submit" style="width:80%;">Submit</button>
						</div>
					</form>

						</div>

					</div>
				</div>
					<?php
					}
					?>
            </div>
        </div>
    </div>




    <?php
    	include('src/footer.php');
    ?>

</body>
</html>