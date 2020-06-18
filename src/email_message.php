<?php
	include('../db/db.php');
	use PHPMailer\PHPMailer\PHPMailer;

    include './PHPMailer/PHPMailer.php';
    include './PHPMailer/Exception.php';
    include './PHPMailer/SMTP.php';
	function request_demo($student_name,$student_email,$student_mobile,$to,$name)
	{
		$subject="Request for Joining Tution Classes.";
		$message='<html>
<head>
    <style>
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }
    
    td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }
    
    tr:nth-child(even) {
    background-color: #dddddd;
    }
    .center
    {
    	text-align: center;
    }
    </style>
</head>
<body style="margin:0px;padding: 0px; font-family:arial, sans-serif;">
        <div style="width:100%; background-color:#4c5a7d; text-align: center;">
			<h1 style="font-weight: bold;color:white; font-size: 20pt;">Tutor-<span style="font-weight: bold;color:#eea412; font-size: 24pt;">Finder</span></h1>
		</div>
		<div style="text-align:center;">
			<h1 style="font-weight: bold; font-size: 20pt;">Hello! <span style="font-weight: bold;color:#eea412; font-size: 24pt;">'.$name.'</span></h1>
		</div>
		<div>
			<h1 style="font-weight: bold; font-size: 20pt; text-align:center;">You have <span style="font-weight: bold;color:#eea412; font-size: 24pt;">New Request!</span></h1>
		</div>
		<br>
        <table>
        	<tr>
        		<td style="text-align: center; width: 50%;">Name:</td>
        		<td style="text-align: center; width: 50%;">'.$student_name.'</td>
			</tr>
        	<tr>
        		<td style="text-align: center; width: 50%;">Email Id:</td>
        		<td style="text-align: center; width: 50%;">'.$student_email.'</td>
			</tr>
        	<tr>
        		<td style="text-align: center; width: 50%;">Contact Number:</td>
        		<td style="text-align: center; width: 50%;">'.$student_mobile.'</td>
			</tr>
        </table>
        <br>
        <div style="width: 100%; text-align: center;">
        	<button style="width:50%; height:30px; color: white; font-weight: bold; background-color:green; border:solid 1px green;">Accept</button>
        </div>
                    <br><br>
                   	<div  style="width:100%; height:30px; background-color:#1f1f1f; text-align: center;">  
	                    <p style="color: white;"">All Rights Reserved. &copy; Design and Developed By : <a href="https://www.linkedin.com/in/rishit-aggarwal-372098180/" style="color:#F1B641;">Rishit Aggarwal</a></p>
	                </div>
				</body>
				</html>';
		return send_mail($to,$subject,$message);
	}
	function request_accepted($teacher_name,$teacher_email,$teacher_mobile,$to,$name)
	{
		$subject="Request Accepted for Tution Classes.";
		$message='<html>
<head>
    <style>
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }
    
    td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }
    
    tr:nth-child(even) {
    background-color: #dddddd;
    }
    .center
    {
    	text-align: center;
    }
    </style>
</head>
<body style="margin:0px;padding: 0px; font-family:arial, sans-serif;">
        <div style="width:100%; background-color:#4c5a7d; text-align: center;">
			<h1 style="font-weight: bold;color:white; font-size: 20pt;">Tutor-<span style="font-weight: bold;color:#eea412; font-size: 24pt;">Finder</span></h1>
		</div>
		<div style="text-align:center;">
			<h1 style="font-weight: bold; font-size: 20pt;">Hello! <span style="font-weight: bold;color:#eea412; font-size: 24pt;">'.$name.'</span></h1>
		</div>
		<div>
			<h1 style="font-weight: bold; font-size: 20pt; text-align:center;">Request <span style="font-weight: bold;color:#eea412; font-size: 24pt;">Accepted!</span></h1>
		</div>
		<div>
			<p style="font-weight: bold; font-size: 16pt; text-align:center;">You can now <span style="font-weight: bold;color:#eea412; font-size: 18pt; font-style:italic;"> Join Tution Classes.</span></p>
		</div>
		<br>
        <table>
        	<tr>
        		<td style="text-align: center; width: 50%;">Name:</td>
        		<td style="text-align: center; width: 50%;">'.$teacher_name.'</td>
			</tr>
        	<tr>
        		<td style="text-align: center; width: 50%;">Email Id:</td>
        		<td style="text-align: center; width: 50%;">'.$teacher_email.'</td>
			</tr>
        	<tr>
        		<td style="text-align: center; width: 50%;">Contact Number:</td>
        		<td style="text-align: center; width: 50%;">'.$teacher_mobile.'</td>
			</tr>
        </table>
        <br>
                    <br><br>
                   	<div  style="width:100%; height:30px; background-color:#1f1f1f; text-align: center;">  
	                    <p style="color: white;"">All Rights Reserved. &copy; Design and Developed By : <a href="https://www.linkedin.com/in/rishit-aggarwal-372098180/" style="color:#F1B641;">Rishit Aggarwal</a></p>
	                </div>
				</body>
				</html>';
		return send_mail($to,$subject,$message);
	}
	function feedback($to,$message,$name)
	{
		$subject="Feedback.";
		$message='<html>
<head>
    <style>
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }
    
    td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }
    
    tr:nth-child(even) {
    background-color: #dddddd;
    }
    .center
    {
    	text-align: center;
    }
    </style>
</head>
<body style="margin:0px;padding: 0px; font-family:arial, sans-serif;">
        <div style="width:100%; background-color:#4c5a7d; text-align: center;">
			<h1 style="font-weight: bold;color:white; font-size: 20pt;">Tutor-<span style="font-weight: bold;color:#eea412; font-size: 24pt;">Finder</span></h1>
		</div>
		<div style="text-align:center;">
			<h1 style="font-weight: bold; font-size: 20pt;">Hello! <span style="font-weight: bold;color:#eea412; font-size: 24pt;">'.$name.'</span></h1>
		</div>
		<div>
			<h1 style="font-weight: bold; font-size: 20pt; text-align:center;">New <span style="font-weight: bold;color:#eea412; font-size: 24pt;">Feedback!</span></h1>
		</div>
		<div>
			<p style="font-weight: bold; font-size: 16pt; text-align:center;">'.$message.'</p>
		</div>
		<br>
        <br>
       	<div  style="width:100%; height:30px; background-color:#1f1f1f; text-align: center;">  
            <p style="color: white;"">All Rights Reserved. &copy; Design and Developed By : <a href="https://www.linkedin.com/in/rishit-aggarwal-372098180/" style="color:#F1B641;">Rishit Aggarwal</a></p>
        </div>
				</body>
				</html>';
		return send_mail($to,$subject,$message);
	}
	function contact_query($name,$email,$phone,$message)
	{
		$to="rishitaggarwal1@gmail.com";
		$subject="Query for Tution-Finder.";
		$message='<html>
<head>
    <style>
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    }
    
    td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
    }
    
    tr:nth-child(even) {
    background-color: #dddddd;
    }
    .center
    {
    	text-align: center;
    }
    </style>
</head>
<body style="margin:0px;padding: 0px; font-family:arial, sans-serif;">
        <div style="width:100%; background-color:#4c5a7d; text-align: center;">
			<h1 style="font-weight: bold;color:white; font-size: 20pt;">Tutor-<span style="font-weight: bold;color:#eea412; font-size: 24pt;">Finder</span></h1>
		</div>
		<div>
			<h1 style="font-weight: bold; font-size: 20pt; text-align:center;"><span style="font-weight: bold;color:#eea412; font-size: 24pt;">New Query!</span></h1>
		</div>
		<br>
        <table>
        	<tr>
        		<td style="text-align: center; width: 50%;">Name:</td>
        		<td style="text-align: center; width: 50%;">'.$name.'</td>
			</tr>
        	<tr>
        		<td style="text-align: center; width: 50%;">Email Id:</td>
        		<td style="text-align: center; width: 50%;">'.$email.'</td>
			</tr>
        	<tr>
        		<td style="text-align: center; width: 50%;">Contact Number:</td>
        		<td style="text-align: center; width: 50%;">'.$phone.'</td>
			</tr>
        	<tr>
        		<td style="text-align: center; width: 50%;">Query:</td>
        		<td style="text-align: center; width: 50%;">'.$message.'</td>
			</tr>
        </table>
        <br>
       	<div  style="width:100%; height:30px; background-color:#1f1f1f; text-align: center;">  
            <p style="color: white;"">All Rights Reserved. &copy; Design and Developed By : <a href="https://www.linkedin.com/in/rishit-aggarwal-372098180/" style="color:#F1B641;">Rishit Aggarwal</a></p>
        </div>
				</body>
				</html>';
		send_mail($to,$subject,$message);
	}
	function send_mail($to,$subject,$body)
	{
		$mail = new PHPMailer();

		//SMTP settings
		$mail->isSMTP();
		$mail->isHTML(true);
		$mail->Host='smtp.gmail.com';
		$mail->SMTPAuth=true;
		$mail->Username='your_email@gmail.com';
		$mail->Password='your_password';
		$mail->Port=465;
		$mail->SMTPSecure='ssl';

		//Email Settings
		$mail->From = "tutor_finder@gmail.com";
        $mail->FromName = 'Tutor-Finder (no-reply)';
		$mail->addAddress($to);
		$mail->Subject=$subject;
		$mail->Body=$body;
		if($mail->send())
			return 1;
		else
			return 0;
	}
?>