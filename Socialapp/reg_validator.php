<?php

include "includes/dbconnect.php";

session_start();

if($connection)
{
	if(isset($_POST['name']) && isset($_POST['password']))
	{
		$name=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$city=$_POST['city'];
		$gender=$_POST['gender'];
		echo $file_name=$_FILES['profile']['name'];
		$tmp_name=$_FILES['profile']['tmp_name'];

		$query="SELECT * FROM `user` WHERE `email` LIKE '$email' AND `password` LIKE '$password'";
		$result=mysqli_query($connection, $query);
		$num_rows=mysqli_num_rows($result);
		if($num_rows==1)
		{
			echo "User already exists";
		}
		else
		{
			$query1="INSERT INTO `user` (`user_id`, `name`, `email`, `password`, `city`, `gender`, `profile_pic`) VALUES (NULL, '$name', '$email', '$password', '$city', '$gender', '$file_name')";

			if(mysqli_query($connection, $query1))
			{
				$_SESSION['name']=$name;
				$_SESSION['email']=$email;
				$_SESSION['is_logged_in']=1;
				move_uploaded_file($tmp_name, "uploads/".$file_name);
				header('Location: profile.php');
			}
			else
			{
				echo "Some error occured.Kindly Try again!";
			}
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