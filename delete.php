<?php
include("connection.php");

$id = $_GET['cod'];
$sql = "DELETE FROM employees WHERE id='$id'";
$results = mysqli_query($connect,$sql);

if($results){
    header("Location: show.php");
}
?>