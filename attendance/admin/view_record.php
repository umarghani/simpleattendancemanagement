
<!DOCTYPE html>
<html>
<head>
	<title>Edit</title>
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
		#id {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 400px;
}

#id td, #id th {
    border: 1px solid #ddd;
    padding: 8px;
}
#id th{
	background-color: #b5ceaf;
}

#id tr:nth-child(even){background-color: #f2f2f2;}

#id tr:hover {background-color: #ddd;}

#id a { color: black;  }
#id a:hover { color: white;  }
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
<article > <br><br>


			<table id="id" align="center" border="3">
	<tr>
		<th>Student Name</th>
		<th>Attendance</th>
		<th>Date</th>
			<th>Edit</th>
				<th>Delete</th>

	</tr>
	<?php 

		include("../connection.php");
		$query=" select * from student,attend where student.student_id=attend.student_id ";
		$result = $conn->query($query);
		if ($result)
		{
			while ($show=mysqli_fetch_assoc($result)) {
				$id = $show['student_id'];
				$name = $show['student_name'];
				$att = $show['value'];
				$date = $show['date'];


			?>
			<tr>
				<td><?php echo $name; ?></td> 
				<td><?php echo $att; ?></td>
				<td><?php echo $date; ?></td>
				<td><a href="edit_rec.php?date=<?php echo $date; ?>&edit=<?php echo $id; ?>">Edit</a></td>
				<td><a href="delete.php?del=<?php echo $id; ?>&dt=<?php echo $date ?>">Delete</a></td> 
			</tr>
<?php
		} } ?>
		</table>
		 


</article>
</body>
</html>

