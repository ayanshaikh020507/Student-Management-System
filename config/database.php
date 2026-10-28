<?php 

$username="root";
$password="";
$server="localhost";
$db="student_management";

$conn = mysqli_connect($server,$username,$password,$db);

if(!$conn){
    die("Connection Error." . mysqli_connect_error());
}

?>