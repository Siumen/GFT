<?php
include("connection.php");

if(isset($_POST['deleteMultiple'])) {
    $allID = $_POST['deleteId'];
    $extractId = implode(',' , $allID);

    $sql = "DELETE FROM employees WHERE id IN($extractId) ";
    $results = mysqli_query($connect, $sql);

    if($results){
        header("Location: show.php");
    }
}