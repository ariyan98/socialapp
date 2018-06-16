<?php

session_start();
include "includes/dbconnect.php";


$name=$_POST['name'];
$password=$_POST['password'];
$gender=$_POST['gender'];
$city=$_POST['city'];

$user_id=$_SESSION['user_id'];

$query="UPDATE `user` SET `name`='$name', `password`='$password', `gender`='$gender', `city`='$city' WHERE `user_id` LIKE '$user_id'";

if(mysqli_query($connection, $query))
{
	header('Location: edit_profile.php?msg=1');
}
else
{
	header('Location: edit_profile.php?msg=0');
}


?>