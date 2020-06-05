<!-- Copyright (c) Rishit Aggarwal -->
<?php 
	include 'db/db.php';
	session_start();
if (isset($_SESSION['user_id'])) {
} else {
    header("Location:index.php");
    exit();
}  
	include ('src/header.php');
	$id=$_SESSION['user_id'];
	$sql="SELECT * from users where user_id='$id';";
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_assoc($result);
	$type=$row['type'];
	if($type=="Student")
		$dashboard="student_dashboard.php";
	else
		$dashboard="tutor_dashboard.php";
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
						<li class="nav-item"><a class="nav-link" href="<?php echo $dashboard; ?>">Home</a></li>
						<li class="nav-item active"><a class="nav-link" href="my_request.php">Requests</a></li>
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
			<h1>Your Request<span class="m_1">The Requests.</span></h1>
		</div>
	</div>

<div class="row justify-content-center">
	<div class="col-md-8 col-lg-8 col-12 col-sm-10">
	<?php

		if(isset($_GET['msg']))
		{
			$msg=$_GET['msg'];
			if($msg=='successfully_sent')
			{
			?><br>
				<div class="alert alert-success alert-dismissible text-center fade show" role="alert">
				  <strong>Success!</strong> Your request has been sent. Please wait for the response.
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
			<?php
			}
		}

	?>
	</div>
</div>
	
    <div id="overviews" class="section wb">
        <div class="container">
            <div class="section-title row text-center">
                <div class="section-title row text-center">
                <div class="col-md-8 offset-md-2">
                    <p class="lead font_color_change"><?php echo $greet; echo ' '.$row['name']; ?></p>
                </div>
            </div>
            </div><!-- end title -->

            <hr class="invis"> 
           <?php
           	if($type=="Student")
           	{
           	?>
            <div class="row">
            	<table class="table table-hover">
				  <thead class="text-center">
				    <tr>
				      <th scope="col" style="width:20vw;vertical-align: top;">Tutor Name</th>
				      <th scope="col" style="width:20vw;vertical-align: top;">Qualification</th>
				      <th scope="col" style="width:10vw;vertical-align: top;">Gender</th>
				      <th scope="col" style="width:20vw;vertical-align: top;">District</th>
				      <th scope="col" style="width:15vw;vertical-align: top;">Tution Fees</th>
				      <th scope="col" style="width:15vw;vertical-align: top;">Request Accepted</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php
				  		$sql="SELECT * from tution_request where student_id='$id';";
				  		$result=mysqli_query($con,$sql);
				  		while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
				  		{
				  			$teacher_id=$row['tutor_id'];
				  			$s="SELECT * from users,user_information where user_information.user_id='$teacher_id' AND users.user_id='$teacher_id';";
				  			$res=mysqli_query($con,$s);
				  			$row1=mysqli_fetch_assoc($res);
				  		?>
				  		<tr class="text-center font_color_change">
				  			<td class="font_color_change" scope="col" style="width:20vw;vertical-align: top;"><?php echo $row1['name']; ?></td>
				  			<td scope="col" style="width:20vw;vertical-align: top;"><?php echo $row1['highest_qualification']; ?></td>
				  			<td scope="col" style="width:10vw;vertical-align: top;"><?php echo $row1['gender']; ?></td>
				  			<td scope="col" style="width:20vw;vertical-align: top;"><?php echo $row1['district']; ?></td>
				  			<td scope="col" style="width:15vw;vertical-align: top;"><?php echo 'Rs '.$row1['average_tution_fees']; ?></td>
				  		<?php
				  			if($row['is_accepted']==0)
				  			{
				  			?>
				  				<td scope="col" style="width:15vw;vertical-align: top;"><button class="btn btn-warning btn-sm">Not Seen</button></td>
				  			<?php
				  			}
				  			else if($row['is_accepted']==1)
				  			{
				  			?>
				  				<td scope="col" style="width:15vw;vertical-align: top;"><button class="btn btn-success btn-sm">Accepted</button></td>
				  			<?php
				  			}
				  			else
				  			{
				  			?>
				  				<td scope="col" style="width:15vw;vertical-align: top;"><button class="btn btn-danger btn-sm">Declined</button></td>
				  			<?php
				  			}
				  		?>
				  		</tr>
				  		<?php
				  		}
				  	?>
				  </tbody>
				</table>
            </div>
            <?php
        	}
        	else if($type=="Tutor")
        	{
        	?>
        <div class="row">
        	<div class="col-lg-1 col-md-1"></div>
        	<div class="col-lg-10 col-md-10 col-sm-12 col-12">
			  <div class="nav-wrapper">
			    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-text" role="tablist">
			      <li class="nav-item">
			        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-text-1-tab" data-toggle="tab" href="#tabs-text-1" role="tab" aria-controls="tabs-text-1" aria-selected="true">New Request</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-2-tab" data-toggle="tab" href="#tabs-text-2" role="tab" aria-controls="tabs-text-2" aria-selected="false">Accepted Requested</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-3-tab" data-toggle="tab" href="#tabs-text-3" role="tab" aria-controls="tabs-text-3" aria-selected="false">Declined Requested</a>
			      </li>
			    </ul>
			  </div>
			  <br>
			<div class="tab-content" id="myTabContent1">

				<!-- New Request Details Tab -->
				  <div class="tab-pane fade show active" id="tabs-text-1" role="tabpanel" aria-labelledby="tabs-text-1-tab">
				  	<div class="row">
            	<table class="table table-hover">
				  <thead class="text-center">
				    <tr>
				      <th scope="col" style="width:20vw;vertical-align: top;">Student Name</th>
				      <th scope="col" style="width:20vw;vertical-align: top;">Mobile Number</th>
				      <th scope="col" style="width:30vw;vertical-align: top;">Email Id</th>
				      <th scope="col" style="width:15vw;vertical-align: top;">Accept</th>
				      <th scope="col" style="width:15vw;vertical-align: top;">Decline</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php
				  		$sql="SELECT * from tution_request where tutor_id='$id' AND is_accepted=0;";
				  		$result=mysqli_query($con,$sql);
				  		$i=0;
				  		while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
				  		{
				  			$i++;
				  			$student_id=$row['student_id'];
				  			$s="SELECT * from users where user_id='$student_id';";
				  			$res=mysqli_query($con,$s);
				  			$row1=mysqli_fetch_assoc($res);
				  		?>
				  		<tr class="text-center font_color_change">
				  			<input type="text" name="student_id" value="<?php echo $student_id; ?>" id="student_id<?php echo $i; ?>" hidden>
				  			<td class="font_color_change" scope="col" style="width:20vw;vertical-align: top;"><?php echo $row1['name']; ?></td>
				  			<td scope="col" style="width:20vw;vertical-align: top;"><?php echo $row1['mobile']; ?></td>
				  			<td scope="col" style="width:30vw;vertical-align: top;"><?php echo $row1['email_id']; ?></td>
				  			<td scope="col" style="width:15vw;vertical-align: top;"><button class="btn btn-success btn-sm accept_button" id="A_<?php echo $i; ?>">Accept</button></td>
				  			<td scope="col" style="width:15vw;vertical-align: top;"><button id="D_<?php echo $i; ?>" class="btn btn-danger btn-sm decline_button">Decline</button></td>
				  		</tr>
				  		<?php
				  		}
				  	?>
				  </tbody>
				</table>
            	</div>
				</div>

				<!-- Accepted Details Tab -->
				  <div class="tab-pane fade show active" id="tabs-text-2" role="tabpane1" aria-labelledby="tabs-text-2-tab">
				  	<div class="row">
		            	<table class="table table-hover">
						  <thead class="text-center">
						    <tr>
						      <th scope="col" style="width:20vw;vertical-align: top;">Student Name</th>
						      <th scope="col" style="width:20vw;vertical-align: top;">Mobile Number</th>
						      <th scope="col" style="width:30vw;vertical-align: top;">Email Id</th>
						      <th scope="col" style="width:15vw;vertical-align: top;">Accept</th>
						      <th scope="col" style="width:15vw;vertical-align: top;">Decline</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php
						  		$sql="SELECT * from tution_request where tutor_id='$id' AND is_accepted=1;";
						  		$result=mysqli_query($con,$sql);
						  		$i=0;
						  		while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
						  		{
						  			$i++;
						  			$student_id=$row['student_id'];
						  			$s="SELECT * from users where user_id='$student_id';";
						  			$res=mysqli_query($con,$s);
						  			$row1=mysqli_fetch_assoc($res);
						  		?>
						  		<tr class="text-center font_color_change">
						  			<input type="text" name="student_id" value="<?php echo $student_id; ?>" id="student_id<?php echo $i; ?>" hidden>
						  			<td class="font_color_change" scope="col" style="width:20vw;vertical-align: top;"><?php echo $row1['name']; ?></td>
						  			<td scope="col" style="width:20vw;vertical-align: top;"><?php echo $row1['mobile']; ?></td>
						  			<td scope="col" style="width:30vw;vertical-align: top;"><?php echo $row1['email_id']; ?></td>
						  			<td scope="col" style="width:15vw;vertical-align: top;"><button class="btn btn-success btn-sm accept_button" id="A_<?php echo $i; ?>">Accept</button></td>
						  			<td scope="col" style="width:15vw;vertical-align: top;"><button id="D_<?php echo $i; ?>" class="btn btn-danger btn-sm decline_button">Decline</button></td>
						  		</tr>
						  		<?php
						  		}
						  	?>
						  </tbody>
						</table>
	            	</div>
					</div>

					<div class="tab-pane fade show active" id="tabs-text-3" role="tabpanel" aria-labelledby="tabs-text-3-tab">
						<div class="row">
		            	<table class="table table-hover">
						  <thead class="text-center">
						    <tr>
						      <th scope="col" style="width:20vw;vertical-align: top;">Student Name</th>
						      <th scope="col" style="width:20vw;vertical-align: top;">Mobile Number</th>
						      <th scope="col" style="width:30vw;vertical-align: top;">Email Id</th>
						      <th scope="col" style="width:15vw;vertical-align: top;">Accept</th>
						      <th scope="col" style="width:15vw;vertical-align: top;">Decline</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php
						  		$sql="SELECT * from tution_request where tutor_id='$id' AND is_accepted=-1;";
						  		$result=mysqli_query($con,$sql);
						  		$i=0;
						  		while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
						  		{
						  			$i++;
						  			$student_id=$row['student_id'];
						  			$s="SELECT * from users where user_id='$student_id';";
						  			$res=mysqli_query($con,$s);
						  			$row1=mysqli_fetch_assoc($res);
						  		?>
						  		<tr class="text-center font_color_change">
						  			<input type="text" name="student_id" value="<?php echo $student_id; ?>" id="student_id<?php echo $i; ?>" hidden>
						  			<td class="font_color_change" scope="col" style="width:20vw;vertical-align: top;"><?php echo $row1['name']; ?></td>
						  			<td scope="col" style="width:20vw;vertical-align: top;"><?php echo $row1['mobile']; ?></td>
						  			<td scope="col" style="width:30vw;vertical-align: top;"><?php echo $row1['email_id']; ?></td>
						  			<td scope="col" style="width:15vw;vertical-align: top;"><button class="btn btn-success btn-sm accept_button" id="A_<?php echo $i; ?>">Accept</button></td>
						  			<td scope="col" style="width:15vw;vertical-align: top;"><button id="D_<?php echo $i; ?>" class="btn btn-danger btn-sm decline_button">Decline</button></td>
						  		</tr>
						  		<?php
						  		}
						  	?>
						  </tbody>
						</table>
	            	</div>
					</div>

			</div>


			</div>

		</div>


        	<?php
        	}
            ?>



    </div><!-- end container -->
</div><!-- end section -->


    <?php
    	include('src/footer.php');
    ?>
    <script>
        $('.accept_button').click(function(e) {
            e.preventDefault();
            var opt = $(this).attr('id');
           	var str=opt.substring(2);
            var student_id_accept = $('#student_id' + str).val();
            $.ajax({
                url: "src/main.php",
                type: "POST",
                data: {student_id_accept: student_id_accept},
                success: function(data) {
                	location.reload();
                }
            });
        });
    </script>
    <script>
        $('.decline_button').click(function(e) {
            e.preventDefault();
            var opt = $(this).attr('id');
           	var str=opt.substring(2);
            var student_id_decline = $('#student_id' + str).val();
            $.ajax({
                url: "src/main.php",
                type: "POST",
                data: {student_id_decline: student_id_decline},
                success: function(data) {
                	location.reload();
                }
            });
        });
    </script>
</body>
</html>