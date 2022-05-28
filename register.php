<?php
    include("connection.php");

   function validateEmail($str) {
         return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
   }

if (strlen($_POST['firstName']) >= 1 
&& strlen($_POST['lastName']) >= 1
&& strlen($_POST['email']) >= 1
&& validateEmail($_POST['email'])) {
    #trim para evitar espacios en blanco innecesarios    
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $email = trim($_POST['email']);
    $sql = "INSERT INTO employees(firstName, lastName, email) 
    VALUES ('$firstName','$lastName','$email')";
    $results = mysqli_query($connect,$sql);
    if ($results) {
        header("Location: show.php");
    } else {

    }
} elseif (strlen($_POST['firstName']) < 1 
    && strlen($_POST['lastName']) < 1
    && strlen($_POST['email']) < 1) {
        header("Location: blank.php");
} elseif (!validateEmail($_POST['email'])) {
        header("Location: invalid.php");
}
