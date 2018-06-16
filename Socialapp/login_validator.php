<?php

include "includes/dbconnect.php";
session_start();


if($connection)
{
	if(isset($_POST['email']) && isset($_POST['password']))
	{
		if(!empty($_POST['email']) && !empty($_POST['password']))
		{
			$email=$_POST['email'];
			$password=$_POST['password'];

			$query="SELECT * FROM `user` WHERE `email` LIKE '$email' AND `password` LIKE '$password'";

			$result=mysqli_query($connection, $query);

			$num_rows=mysqli_num_rows($result);

			if($num_rows==1)
			{
				$row=mysqli_fetch_array($result);
				$_SESSION['name']=$row['name'];
				$_SESSION['is_logged_in']=1;
				$_SESSION['email']=$row['email'];
				$_SESSION['user_id']=$row['user_id'];
				header('Location: profile.php');
			}
			else
			{
				echo "Incorrect Login";
			}




		}
		else
		{
			echo "You need to enter both the values";
		}
	}
	else
	{
		echo "Some error occured";
	}
}
else
{
	echo "Database error occured";
}


?>