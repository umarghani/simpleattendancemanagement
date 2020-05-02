<!DOCTYPE html>
<html>
<head>
	<title>View Grades</title>
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
	<article><br><br>
		<div align="center"><h2>Enter the name of student to see Grade</h2>
			<form action="grades.php" method="post">
				<input type="text" name="name"><br><br>
				<input type="submit" name="submit" value="View Grade">

			</form>
		</div>
	</article>
</body>
</html>






<?php 
 include("../connection.php");
 if(isset($_POST['submit']))
 {
 	$name = $_POST['name'];
 	$query = "select * from student where student_name = '".$name."'";
 	$result = mysqli_query($conn,$query);
 	if($result)
	{

		while ($show=mysqli_fetch_array($result)) 
		{
			$id = $show['student_id'];
		}
	}

 




 $query = "select count(value) as num from attend where value='Present' and student_id='$id'";
 $result= $conn->query($query);
 if($result){
 	while($show=mysqli_fetch_array($result)){
 		$num = $show['num'];
 	}
 	if($num == 5)
 	{
 		echo " <h1 align='center'>Student Grade is A</h1> ";
 	}
 	elseif ($num == 4) {
 		echo " <h1 align='center'>Student Grade is B</h1> ";
 	}
 	elseif ($num == 3) {
 		echo " <h1 align='center'>Student Grade is C</h1> ";
 	}
 	elseif ($num == 2) {
 		echo " <h1 align='center'>Student Grade is D</h1> ";
 	}
 	elseif ($num == 1) {
 		echo " <h1 align='center'>Student Grade is F</h1> ";
 	}
 }
}

?>