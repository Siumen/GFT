<?php
include("connection.php");

function validateEmail($str) {
    return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}

$id = $_POST['id'];
if (strlen($_POST['firstName']) >= 1 
&& strlen($_POST['lastName']) >= 1
&& strlen($_POST['email']) >= 1
&& validateEmail($_POST['email'])) {
    #trim para evitar espacios en blanco innecesarios
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $sql = "UPDATE employees SET firstName='$firstName', lastName='$lastName', email='$email'
    WHERE id='$id'";
    $results = mysqli_query($connect,$sql);
    if ($results) {
        header("Location: show.php");
    }    
} elseif (strlen($_POST['firstName']) < 1 
    && strlen($_POST['lastName']) < 1
    && strlen($_POST['email']) < 1) {
        header("Location: blank.php");
} elseif (!validateEmail($_POST['email'])) {
        header("Location: invalid.php");
}
?>