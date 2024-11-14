

<html>
    <head>
        <title>Register</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    </head>
    <body class="bg-light d-flex justify-content-center align-items-center vh-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div class="card-body">   
                        <h2 class="text-center mb-4">Register</h2>
            
                        <form action="register.php" method="POST">
                            <div class="mb-3">
                                <label for="name">Username:</label>
                                <input type="text" name="username" id="username" required><br>
                            </div>
                            <div class="mb-3">
                                <label for="password">Password:</label>
                                <input type="password" name="password" id="password" required><br>
                            </div>
                                <input type="submit" value="Register" class="btn btn-outline-primary w-100 "><br>
                                <a href="login.php">Already have an account? Login here.</a>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </body>
</html>

<?php
include "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $username = mysqli_real_escape_string($conn,$_POST['username']); // function mysqli_real_escape_string = untuk tak letak special char for security purpose
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT); //function password_hash = untk encrpt password 

            $sql = "INSERT INTO users_reg (username, password) VALUES ('$username' , '$password')";

            if(mysqli_query($conn,$sql))
            {
                echo "<script>alert('Register successfully!'); window.location.href='login.php';</script>";
            }
            else
            {
                echo "Error:". $sql . "<br>". mysqli_error($conn);
            }
        }



?>