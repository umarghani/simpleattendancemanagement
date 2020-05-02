<?php session_start(); ?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<style type="text/css">
		.login{
			width: 320px;
			height: 420px;
			top: 65%;
			left: 51%;
			position: absolute;
			transform: translate(-56%,-56%);
			box-sizing: border-box;
			background: #000;
			color: #fff;
			font-family: sans-serif;
		}
		.login p{
			margin-left:50px;
			font-weight: bold;
		}
		.login input{
			width: 65%;
			margin-left:  50px;

		}
		.login a{
			margin-left: 75px;
		}
		.login a:hover{
			color: white;
		}
		.login input[type="text"], input[type="password"]
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
	<h1 align="center" style="font-family: sans-serif;">Admin Login</h1>
	<div class="login" >
		<h1 align="center">Login Here!</h1>
		<form action="login.php" method="post">
			<div style="margin-top: 50px;">
			<p>Username</p>
			<input type="text" name="username" placeholder="Enter Username"><br>
			<p>Password</p>
			<input type="password" name="password" placeholder="Enter Password"><br><br><br>
			<input type="submit" name="submit" value="Login"><br><br>
			
			
			</div>
		</form>
	</div>

</body>
</html>


<?php
	include('../connection.php');
	if (isset($_POST['submit'])) 
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = "select * from student where username='$username' AND student_password='$password'";

		$run = mysqli_query($conn,$query);
		if (mysqli_num_rows($run)>0)
		{
			$_SESSION['username'] = $username;
			header("location: index.php");
			
		}
		else
		{
			echo "<script> alert('Username or Password is incorrect') </script>";
		}
	}



?>