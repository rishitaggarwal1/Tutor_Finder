<!-- Copyright (c) Rishit Aggarwal -->
<?php
	include('../db/db.php');
	// Login Option
	if(isset($_POST['login_btn']) && !empty($_POST['login_email']) && !empty($_POST['login_pass']))
	{
		$email=$_POST['login_email'];
		$pass=$_POST['login_pass'];
		$pass=md5($pass);
		$sql="SELECT * from users where email_id='$email' AND password='$pass';";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result)==0)
		{
			header('location:../index.php?msg=wrong_credentials');
		}
		while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			$id=$row['user_id'];
			$type=$row['type'];
			if($type=="Tutor")
			{
				session_start();
                $_SESSION['user_id'] = $id;
				header("location:../tutor_dashboard.php?id=".$id);
			}
			else
			{
				session_start();
                $_SESSION['user_id'] = $id;
				header("location:../student_dashboard.php?id=".$id);
			}
		}
		
	}
	elseif (isset($_POST['register_btn']) && !empty($_POST['register_name']) && !empty($_POST['register_email']) && !empty($_POST['register_mobile']) && !empty($_POST['register_pass1'])) 
	{
		$name=$_POST['register_name'];
		$email=$_POST['register_email'];
		$pass1=$_POST['register_pass1'];
		$pass2=$_POST['register_pass2'];
		$mobile=$_POST['register_mobile'];
		$type=$_POST['register_type'];
		if($pass1!=$pass2)
		{
			header('location:../index.php?msg=password_do_not_matched');
		}
		$user_id=time();
		$pass1=md5($pass1);
		$sql ="INSERT INTO users (user_id,name,email_id,password,mobile,type) VALUES ('$user_id','$name','$email', '$pass1', '$mobile','$type');";
		if (mysqli_query($con, $sql))
		{
			header('location:../index.php?msg=successfully_registered');
		}
		else
		{
			header('location:../index.php?msg=email_already_exist');
		}
	}
	elseif(isset($_POST['personal_detail_submit']))
	{
		session_start();
		$id=$_SESSION['user_id'];
		$sql="SELECT * from user_information where user_id='$id';";
		$result=mysqli_query($con,$sql);
		$row=mysqli_num_rows($result);
		$gender=$_POST['gender'];
		$about=$_POST['about'];
		$address=$_POST['address'];
		$district=$_POST['district'];
		$state=$_POST['state'];
		if($row==0)
		{
			$sql="INSERT INTO user_information(`user_id`,`gender`,`address`,`district`,`state`,`about`,`profile_image`) VALUES ('$id','$gender','$address','$district','$state','$about','1.jpg');";
			$result=mysqli_query($con,$sql);
			if($result)
			{
				header('location:../settings.php?msg=profile_updated');
			}
			else
			{
				header('location:../settings.php?msg=Error');
			}
		}
		else
		{
			$sql="UPDATE user_information SET gender='$gender', address='$address', district='$district', state='$state', about='$about', profile_image='1.jpg' where user_id='$id';";
			$result=mysqli_query($con,$sql);
			if($result)
			{
				header('location:../settings.php?msg=profile_updated');
			}
			else
			{
				header('location:../settings.php?msg=Error');
			}
		}
	}
	else if(isset($_POST['academic_detail_submit']))
	{
		session_start();
		$id=$_SESSION['user_id'];
		$highest_qualification=$_POST['highest_qualification'];
		$school=$_POST['school'];
		$class_teaches=$_POST['class_teaches'];
		$subject1=$_POST['subject1'];
		$subject2=$_POST['subject2'];
		$subject3=$_POST['subject3'];
		$fees=$_POST['fees'];
		$sql="SELECT * from user_information where user_id='$id';";
		$result=mysqli_query($con,$sql);
		$row=mysqli_num_rows($result);
		if($row==0)
		{
			$sql="INSERT INTO user_information(`user_id`,`highest_qualification`,`recent_school`,`above_class`,`subject1`,`subject2`,`subject3`,`average_tution_fees`) VALUES ('$id','$highest_qualification','$school','$class_teaches','$subject1','$subject2','$subject3','$fees');";
			$result=mysqli_query($con,$sql);
			if($result)
			{
				header('location:../settings.php?msg=profile_updated');
			}
			else
			{
				header('location:../settings.php?msg=Error');
			}
		}
		else
		{
			$sql="UPDATE user_information SET highest_qualification='$highest_qualification', recent_school='$school', above_class='$class_teaches', subject1='$subject1', subject2='$subject2', subject3='$subject3',average_tution_fees='$fees'  where user_id='$id';";
			$result=mysqli_query($con,$sql);
			if($result)
			{
				header('location:../settings.php?msg=profile_updated');
			}
			else
			{
				header('location:../settings.php?msg=Error');
			}
		}
	}
?>