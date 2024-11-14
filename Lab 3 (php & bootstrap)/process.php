<?php

//isset = data tu ade ke tak
// $_GET = nak ambik data dari url
// if (isset($_GET['name']))
// {
//     echo 'hello, '. $_GET['name'].'!';
// }

if (isset($_POST['name']))
{
    $name = $_POST['name'];

    // echo 'hello, '. $_POST['name'].'!';
    echo 'hello, '. $name.'!';
}



?>