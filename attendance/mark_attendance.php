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
	<title>Mark attendance</title>
	<style type="text/css">
		.reg{
			width: 320px;
			height: 400px;
			top: 65%;
			left: 51%;
			position: absolute;
			transform: translate(-56%,-56%);
			box-sizing: border-box;
			background: #999966;
			color: #fff;
			font-family: sans-serif;
			text-align: center;
		}
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
		input[type=submit] {
			width: 100%;
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
			background: red;
		}
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
<h3><div  style="margin-top: 30px; margin-left: 600px">Date: <?php  echo date("Y-m-d");  ?></div></h3>
<?php 
		include("connection.php");
		$username = $_SESSION['username'];
		
	
	$query = "select * from student where username = '".$username."'";
	
	$result = mysqli_query($conn,$query);
	if($result)
	{

		while ($show=mysqli_fetch_array($result)) 
		{
	
	

?>

	<div class="reg">
		<h2>Name</h2>
		<?php echo $show['student_name']; ?>
		<h2>Username</h2>
		<?php echo $show['username']; ?>
		<h2>Email</h2>
		<?php echo $show['student_email']; ?>
		<h2>Attendance</h2>
		<form action="mark_attendance.php" method="post">
			<div>
				Present
				<input type="radio" name="attendance" value="Present">
				Absent
				<input type="radio" name="attendance" value="Absent"><br><br>
			</div>
			<input type="submit" name="submit" value="submit attendance">
		</form>
		
	</div>
	

<?php
$id = $show['student_id'];

}  

if (isset($_POST['submit'])) {
				$value = $_POST['attendance'];
				if($_SERVER['REQUEST_METHOD']=='POST'){
				$date = date("Y-m-d");
				$query = "select distinct date from attend";
				$result = $conn->query($query);
				$b=false;
				if($result){
					while ($check=$result->fetch_assoc()) {
						if($date==$check['date']){
						$b=true;
						echo "<script>  alert('Attendance Already taken today')  </script>";
					}
					}
					if(!$b){


				$query = "insert into attend (date,value,student_id) values ('$date','$value','$id')";
				$result = $conn->query($query);
				if($result)
				{
					echo "<script>  alert('Attendance Taken')  </script>";
				}
				else{ echo "<script>  alert('hhh')  </script>";  }
					}


				}
			}



			}

}		?>

</body>
</html>


<?php } ?>