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
	<title>View Attendance</title>
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
			height: 1000px;
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
		input[type=submit] {
			width: 120px;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
input:hover[type="submit"] 
		{
			background: black;
			color:white;
		}
		#id {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 400px;
}

#id td, #id th {
    border: 1px solid #ddd;
    padding: 8px;
}

#id tr:nth-child(even){background-color: #f2f2f2;}

#id tr:hover {background-color: #ddd;}

#id th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}
	</style>
</head>
<body style="background-color: #d6d6c2;">
	<header>Attendance Management System</header>
<aside>
	<br>
<a href="mark_attendance.php">Mark Attendance</a><br><br>
<a href="#">Mark Leave</a><br><br>
<a href="#">View</a><br><br>
<a href="login/logout.php">Logut</a>
</aside>
<article>
	<form action="view.php" method="post">
		<h3><div align="center">
			From
		<input type="date" name="startdate">
			To
		<input type="date" name="enddate"><br><br>
		<input type="submit" name="submit" value="View Record">
	</div></h3>
	</form>

</article>

</body>
</html>
<?php 

		include("connection.php");
		$username = $_SESSION['username'];
		
	
	$query = "select * from student where username = '".$username."'";
	
	$result = mysqli_query($conn,$query);
	if($result)
	{

		while ($show=mysqli_fetch_array($result)) 
		{
			$id = $show['student_id'];
		}


}
?>
<?php

		

		if(isset($_POST['submit']))
		{
			$startdate = $_POST['startdate'];
			$enddate = $_POST['enddate'];
			$query = "select value,date from attend where date between '$startdate' and '$enddate' and student_id = '$id'";
			$result = mysqli_query($conn,$query);
			if($result){
				while($show=mysqli_fetch_array($result)){
					$value = $show['value'];
					$dt = $show['date'];
?>
					<table align="center" id="id" border="3">
						<tr>
							<td><h3>Attendance</h3></td>
							<td><h3>Value</h3></td>
						</tr>
						<tr>
							<td><?php echo $value; ?></td>
							<td><?php echo $dt;  ?></td>
						</tr>
					</table>
					<?php
				}
			}

		}
?>



<?php } ?>