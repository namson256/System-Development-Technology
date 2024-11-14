<?php
session_start();
if(!isset($_SESSION['username'])){ // if session is not set then redirect to login page
    header("Location: login.php"); // redirecting to login page
    exit(); // stop script
}
?>

<html>

    <head>
        <title>Update User</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    </head>
    <body>

        <?php
            include "db_conn.php";

            if(isset($_GET['id'])) // check if id parameter is available ambik kat url
            {
                $id = $_GET['id']; //get the id parameter value 
                $sql = "SELECT * FROM users WHERE id=$id"; // SQL query to select user data based on id
                $result = mysqli_query($conn,$sql); // execute the query
                $row = mysqli_fetch_assoc($result); // Fetch the result set into an associative array
            }
        ?>

        <div class="text-center">
            <h1 class="bg-light">Update User</h1>
            <div class="row justify-content-center my-5">
                <div class="col-md-6 col-lg-4">
                    <form action="update.php?id=<?php echo $row['id']; ?>" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="<?php echo $row['name']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" name="email" placeholder="<?php echo $row['email']; ?>" required>
                        </div>
                        <button type="submit" class="btn btn-outline-success w-100">Update User</button>
                    </form>
                    <a href="index.php">
                        <button class="btn btn-outline-primary w-100 mt-3">Back</button>
                    </a>
                </div>
            </div>
        </div>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $name = $_POST['name'];
            $email = $_POST['email'];

            $sql = "UPDATE users SET name = '$name' , email = '$email' WHERE id = $id";

            if(mysqli_query($conn,$sql))
            {
                echo "<script>alert('User updated successfully!'); window.location.href='index.php';</script>";
            }
            else
            {
                echo "Error:". $sql . "<br>". mysqli_error($conn);
            }
        }


        ?>
        <br>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>

</html>