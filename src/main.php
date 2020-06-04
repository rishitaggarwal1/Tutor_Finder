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
				echo "1";
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
		// $sql="SELECT * from users where email_id='$email';";
		// $result=mysqli_query($con,$sql);
		// if(mysqli_num_rows($result)>0)
		// {
		// 	header('location:../index.php?msg=email_already_exist');
		// }
		$user_id=time();
		if($type=="Tutor")
		{
			$user_id="Tu_"+$user_id;
		}
		else
		{
			$user_id="S_"+$user_id;
		}
		$pass1=md5($pass1);
		$sql ="INSERT INTO users (user_id,name,email_id,password,mobile,type) VALUES ('$user_id','$name','$email', '$pass1', '$mobile','$type');";
		if (mysqli_query($con, $sql))
		{
			header('location:../index.php?msg=successfully_registered');
		}
		else
		{
			header('location:../index.php?msg=Error');
		}
	}

?>