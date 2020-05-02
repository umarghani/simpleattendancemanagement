<?php 
include("../connection.php");
$student = $_GET['del'];
$date = $_GET['dt'];
$query = "delete from attend where student_id = '$student' and date = '$date'";
$result = $conn->query($query);
if($result){
	echo "<script> window.open('index.php?del=A post has been Deleted','_self') </script>";


}

?>