<?php
     include "db_conn.php";

        if(isset($_GET['id'])) // check if id parameter is available ambik kat url
        {
          $id = $_GET['id']; //get the id parameter value 
          $sql = "DELETE FROM users WHERE id=$id"; // SQL query to select user data based on id
          $result = mysqli_query($conn,$sql); // execute the query

          if ($result)
          {
            echo "<script> alert('User Deleted Successfully'); window.location='index.php'</script>";
          }
          else
            echo "<script> alert('User Not Deleted'); window.location='index.php'</script>";
         }
?>