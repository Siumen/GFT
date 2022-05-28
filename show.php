<?php
include("connection.php");

$sql = "SELECT id, firstName, lastName, email FROM employees";
$results = mysqli_query($connect, $sql);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employees</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
        
            <div class="col-md-3">
                <h2>Fill the fields</h2>
                <form action="register.php" method="POST">
                    <?php /*<div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">ID</label>
                        <input class="form-control" type="text" name="id" placeholder="#" aria-label="default input example">
                    </div> */ ?>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">First Name</label>
                        <input class="form-control" type="text" name="firstName" placeholder="Aa" aria-label="default input example">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Last Name</label>
                        <input class="form-control" type="text" name="lastName" placeholder="Aa" aria-label="default input example">
                    </div>
                    <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

            <div class="col-md-8">
                <h2>Registered employees</h2>

                <form action="deleteMultiple.php" method="POST">
                <table class="table">
                    <thead class="table-info table-striped">
                        <tr>
                        <th></th>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">E-mail</th>
                        <th></th>
                        <th colspan="2"><button type="submit" name="deleteMultiple" class="btn btn-dark">Delete Selected</button></th>
                        </tr>
                    </thead>
                    <tbody>
                    <div class="form-check">
                        <?php
                            while ($row = mysqli_fetch_array($results)) { ?>                                
                                <tr>
                                <th><input class="form-check-input" type="checkbox" name="deleteId[]" value="<?= $row['id']; ?>" id="flexCheckDefault"></th>
                                <th><?php echo $row['id'] ?></th>
                                <th><?php echo $row['firstName'], " ", $row['lastName'] ?></th>
                                <th><?php echo $row['email'] ?></th>
                                <th><a class="btn btn-warning" href="doingUpdate.php?cod=<?php echo $row['id'] ?>">Edit</a></th>
                                <th><a class="btn btn-danger" href="delete.php?cod=<?php echo $row['id'] ?>">Delete</a></th>
                                <th></th>
                                </tr>
                    </div>
                            <?php
                            } ?>
                    </tbody>
                </table>
                </form>
            </div>
        </div>
    </div>
  </body>
  </html>