<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Attendance Portal</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style="background-color: #d6d6c2;">
	<header>Attendance Management System</header>
	<h1 align="center" style="font-family: sans-serif;">Student Login</h1>
	<div class="login" >
		<h1 align="center">Login Here!</h1>
		<form action="login.php" method="post">
			<div style="margin-top: 50px;">
			<p>Username</p>
			<input type="text" name="username" placeholder="Enter Username"><br>
			<p>Password</p>
			<input type="password" name="password" placeholder="Enter Password"><br><br><br>
			<input type="submit" name="login" value="Login"><br><br>
			
			<a href="../register/register.php">Dont have an account?</a><br> 
			</div>
		</form>
	</div>

</body>
</html>
<?php
	include('../connection.php');
	if (isset($_POST['login'])) 
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		$query = "select * from student where username='$username' AND student_password='$password'";

		$run = mysqli_query($conn,$query);
		if (mysqli_num_rows($run)>0)
		{
			$_SESSION['username'] = $username;
			header("location: ../index.php");
			
		}
		else
		{
			echo "<script> alert('Username or Password is incorrect') </script>";
		}
	}



?>


