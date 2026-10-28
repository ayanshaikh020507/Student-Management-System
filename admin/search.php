<?php 

include '../config/database.php';

$val = $_GET['val'];

$query = "select * from students where Enrollment like '%{$val}%' or First_Name like '%{$val}%' or Last_Name like '%{$val}%' or Gender like '%{$val}%' or DOB like '%{$val}%' or Email like '%{$val}%' or Phone like '%{$val}%' or Address like '%{$val}%' or City like '%{$val}%' or Course like '%{$val}%' or Admission_Date like '%{$val}%' ";

$result = mysqli_query($conn, $query);

header("Location: ../Admin/Dashboard.php");

?>