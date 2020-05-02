
<?php 
	session_start();

	if (!isset($_SESSION['username'])) {
		header("location: login.php");
	}
	else
	{
	
	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
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
	<header>Attandance Management System</header>
	<aside><br><br>
		<a href="view_record.php">View Record</a><br><br>
		
		<a href="rep.php">Create Report</a><br><br>
		<a href="leave.php">View Leave Requests</a><br><br>
		<a href="grades.php">View Grades</a><br><br>
		<a href="logout.php">Logout</a><br><br>
	</aside>
<article > <br><br><div align="center" ><h1> Welcome to Admin Panel</h1></div><br><br> 

<h3 align="center"> <?php echo @$_GET['del']; ?></h3>
</article>
</body>
</html>

<?php } ?>

