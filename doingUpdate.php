<?php
include("connection.php");

$cod = $_GET['cod'];
$sql = "SELECT * FROM employees WHERE id='$cod'";
$results = mysqli_query($connect,$sql);

$row = mysqli_fetch_array($results);
?>

!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Updating</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">First Name</label>
                <input class="form-control" type="text" name="firstName" value="<?php echo $row['firstName'] ?>" placeholder="Aa" aria-label="default input example">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                <input class="form-control" type="text" name="lastName" value="<?php echo $row['lastName'] ?>" placeholder="Aa" aria-label="default input example">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" name="email" value="<?php echo $row['email'] ?>" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>