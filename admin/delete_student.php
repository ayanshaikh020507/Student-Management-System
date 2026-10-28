<?php 

include '../config/database.php';

$id = $_GET['id'];

$query = "delete from students where Id={$id}";

$result = mysqli_query($conn, $query);

header("Location: ../Admin/Dashboard.php");

?>