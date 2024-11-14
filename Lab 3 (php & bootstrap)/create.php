<?php
session_start();
if(!isset($_SESSION['username'])){ // if session is not set then redirect to login page
    header("Location: login.php"); // redirecting to login page
    exit(); // stop script
}
?>

<html>

    <head>
         <title>Add Users</title>
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="create.php" >Add New Student</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="index.php">Home Page</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active text-white" aria-current="page" href="create.php">Add New Student</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-muted text-white" href="logout.php">Logout</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>

        <div class="text-center">
            <h1 class="bg-light">Add User</h1>
            <div class="row justify-content-center my-5">
                <div class="col-md-6 col-lg-4">
                    <form action="create.php" method="POST" class="text-start"> <!-- Align form content to start -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" placeholder="e.g. ayam" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" placeholder="e.g. ayam@example.com" name="email" required>
                        </div>
                        <button type="submit" class="btn btn-outline-success w-100">Add User</button>
                    </form>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>

</html>

<?php

include "db_conn.php";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "INSERT INTO users (name, email) VALUES ('$name','$email')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>alert('Add Student successfully!'); window.location.href='index.php';</script>";
    }
    else
    {
        echo "Error:". $sql . "<br>". mysqli_error($conn);
    }
}

?>