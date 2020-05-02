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
	<article>
		
		
		<?php 
		include("../connection.php");
			$edit_id = @$_GET['edit'];

			$query = "select * from student where student_id='$edit_id'";
			$result = $conn->query($query);
			if($result){
				while ($show=mysqli_fetch_array($result)) {
?>
				<div class="reg">
				<h2>Name</h2>
		<?php echo $show['student_name']; ?>
		<h2>Username</h2>
		<?php echo $show['username']; ?>
		<h2>Email</h2>
		<?php echo $show['student_email']; ?>
		<h2>Attendance</h2>
		<?php
				}
			}
		?>
		<?php 

			$date = @$_GET['date'];
			$query = "select value from attend where student_id='$edit_id' and date='$date'";
			$result = $conn->query($query);
			while ($show=mysqli_fetch_array($result))
			{
				$value = $show['value'];

			


		?>

		<form action="edit_rec.php?student=<?php echo $edit_id; ?>&dt=<?php echo $date; ?>" method="post">
			
			<div>
				Present
				<input type="radio" name="attendance" value="Present" <?php if($show['value'] == 'Present'){echo "checked";} ?> >
				Absent
				<input type="radio" name="attendance" value="Absent" <?php if($show['value'] == 'Absent'){echo "checked";} ?>><br><br>
			</div>
		
			<input type="submit" name="submit" value="Edit attendance">

			


		</form>
		<?php  } ?>

	</div>


	</article>

</body>
</html>

	<?php 
				if(isset($_POST['submit']))
				{
					$value = $_POST['attendance'];
					$edit_id =  $_GET['student'];
					$date = $_GET['dt'];
					$query ="update attend set value = '".$value."' where student_id='".$edit_id."' and date='".$date."'";
					$result = $conn->query($query);
					if($result)
					{
						echo "<script>  alert('Data has been updated')  </script>";
					}
					else{
						echo "<script>  alert('Data Not Inserted')  </script>";
					}
				}
			?>
