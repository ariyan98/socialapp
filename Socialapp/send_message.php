<?php

session_start();
include "includes/dbconnect.php";

$sent_by=$_SESSION['user_id'];
$recevied_by=$_POST['received_by'];
$message=$_POST['message'];

echo $query="INSERT INTO `message` (`message_id`, `send_user_id`, `received_user_id`, `message_text`) VALUES (NULL, '$sent_by', '$recevied_by', '$message')";

if(mysqli_query($connection, $query))
{
	header('Location: view_others_profile.php?msg=1&id='.$recevied_by);
}
else
{
	header('Location: view_others_profile.php?msg=0&id='.$recevied_by);
}


?>