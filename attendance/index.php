<?php 
	session_start();

	if (!isset($_SESSION['username'])) {
		header("location: login/login.php");
	}
	else
	{
	
	

?>


<!DOCTYPE html>
<html>
<head>
	<title>Attendance Management System</title>
	<style type="text/css">
		header{
			width: 1290px;
			height: 50px;
			background-color: #001a00;
			padding: 30px;
			text-align: center;
    		font-size: 35px;
    		color: white;
    		font-family: sans-serif;
    	
		}
		aside{
			float: left;
			width: 200px;
			height: 500px;
			background-color: #999966;
			text-align: center;
			font-size: 20px;
			color: white;
			font-family: sans-serif;
		}
		a{
			color: white;
			text-decoration: none;
		}
		a:hover{
			background-color: #444422;
		}
	</style>
</head>
<body style="background-color: #d6d6c2;">

<header>Attendance Management System</header>
<aside>
	<br>
<a href="mark_attendance.php">Mark Attendance</a><br><br>
<a href="#">Mark Leave</a><br><br>
<a href="view.php">View</a><br><br>
<a href="login/logout.php">Logut</a>
</aside>
<article>
<h1>
<div align="center" >
Welcome
<?php 
	
	include("connection.php");
	$username = $_SESSION['username'];
	$query = "select student_name from student where username = '".$username."'";
	$result = $conn->query($query);
	while ($show=mysqli_fetch_array($result)) 
		{
			echo $show['student_name'];
		}
 ?>
</div>
</h1>

</article>
</body>
</html>

<?php } ?>