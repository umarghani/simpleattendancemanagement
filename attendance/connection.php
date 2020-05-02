<?php
$servername = "localhost";
$username = "root";
$password = "";
$attendance = "attendance";
$conn = new mysqli($servername, $username, $password);
mysqli_select_db($conn,"attendance");
?>