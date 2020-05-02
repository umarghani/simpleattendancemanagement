<!DOCTYPE html>
<html>
<head>
	<title>Register Yourself</title>
	<style type="text/css">
		.reg{
			width: 320px;
			height: 470px;
			top: 65%;
			left: 51%;
			position: absolute;
			transform: translate(-56%,-56%);
			box-sizing: border-box;
			background: #001a00;
			color: #fff;
			font-family: sans-serif;
		}
		.reg p{
			margin-left:50px;
			font-weight: bold;
		}
		.reg input{
			width: 65%;
			margin-left:  50px;

		}
		.reg a{
			margin-left: 65px;
		}
		.reg a:hover{
			color: white;
		}
		.reg input[type="text"], input[type="password"]
		{
			border:none;
			border-bottom: 1px solid #fff;
			background: transparent;
			outline: none;
			color: #fff;  
		}
		.top{
			width: 100%;
			height: 20px;
			color: black;
		}
		header{
			width: 1306px;
			height: 50px;
			background-color: #001a00;
			padding: 30px;
    		text-align: center;
    		font-size: 35px;
    		color: white;
    		font-family: sans-serif;


		}
		body{
			padding: 0;
			margin: 0;
		}
	</style>

</head>
<body style="background-color: #d6d6c2;">
	<header>Attendance Management System</header>
	<div class="reg">
		<h1 align="center">Register Here!</h1>
		<form action="register.php" method="post">
			<p>Name</p>
			<input type="text" name="name" placeholder="Enter Name" required><br>
			<p>Username</p>
			<input type="text" name="username" placeholder="Enter Userame" required><br>
			<p>Email</p>
			<input type="text" name="email" placeholder="Enter Email" required><br>
			<p>Password</p>
			<input type="password" name="password" placeholder="Enter Password" required><br><br><br>
			<input type="submit" name="submit" value="Register"><br><br>
			
			<a href="../login/login.php">Already have an account?</a><br> 
		</form> 
	</div>
</body>
</html>

<?php 
	include('../connection.php');
	if(isset($_POST['submit']))
	{
	$name = $_POST['name'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	$insert = "insert into student (student_name,username,student_email,student_password) values('$name','$username','$email','$password')";

	if (mysqli_query($conn,$insert)) {
		echo "<script> alert('User has been registered') </script>";
	}
}

?>