<?php
session_start();
if(!isset($_SESSION['username'])){ // if session is not set then redirect to login page
    header("Location: login.php"); // redirecting to login page
    exit(); // stop script
}

// $username = $_SESSION['username'];
?>

<html>

    <head>
        <title>Users List</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    </head>

    <body>

    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="index.php">Home Page</a>
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

    <div class=" text-center bg-light ">
        <h1>
            <div> List Student </div> 
        </h1>
        
    </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                    <thead class="table-dark">
                    <tr>
                        <td> ID </td>
                        <td> Name </td>
                        <td> Email </td>
                        <td style="width: 5%;"> Edit </td>
                        <td style="width: 5%;"> Delete </td>
                    </tr>
                    </thead>
                </div>
            </div>
        </div>
    </div>

            <?php
            include "db_conn.php";

            $sql = "SELECT * FROM users"; // ni kita nak select all data yang ade kat dalam database nama users
            $result = mysqli_query($conn,$sql); //

            if(mysqli_num_rows($result) > 0) // ni nak check dalam database ade data ke x 
            {
                while($row = mysqli_fetch_assoc($result)) // akan fetch data 1 by 1 masuk kedalam row 
                {
                    echo "<tr>";
                    echo "<td>". $row['id'] . "</td>"; // "" == '' (kena open dan tutup)
                    echo "<td>". $row['name']. "</td>";
                    echo "<td>". $row['email']. "</td>";
                    echo "<td> <a href='update.php?id= ". $row['id'] . "'> 
                        <button type='button' class='btn btn-outline-success btn-sm '>Edit</button> 
                        </a> </td>";
                    echo "<td> <a href='delete.php?id= ". $row['id']. "'>
                        <button type='button' class='btn btn-outline-danger btn-sm'>delete</button> 
                        </a> </td>";
                    echo "</tr>";
                }
            }
            else
            {
                echo "<tr> <td colspan = '5'> No Data Found </td></tr>" ;
            }
            ?>

        </table>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    </body>
</html>