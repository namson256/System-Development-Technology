<?php
session_start(); // starting session
session_unset(); // unset session 
session_destroy(); // Destroy the session

echo "<script>
            alert('You have successfully logged out!'); //JavaScript function triggers a pop-up alert with the message that the user has successfully logged out.
            window.location.href='login.php'; // redirect after alert
      </script>";

exit();
?>