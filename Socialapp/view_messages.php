

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Social App</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
  </head>

  <body style="background-color:#E2E2E2">

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="#">SocialApp</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </nav>

    <?php

    include "includes/dbconnect.php";
    session_start();

    $email=$_SESSION['email'];

    $query="SELECT * FROM `user` WHERE `email` LIKE '$email'";
    $result=mysqli_query($connection, $query);

    $row=mysqli_fetch_array($result);


    ?>

    <main role="main" class="container">

      <div class="row">
        <div class="col-md-offset-1 col-md-3">
        	<div class="row">
        		<div class="col-md-12">
        			<img src="uploads/<?php echo $row['profile_pic']; ?>" style="width:100%;height:250px">
        		</div>
        		<div class="col-md-12">
        			<div class="white-bg p-10">
        				<ul class="mt-50">
	        				<li><a href="profile.php">My Profile</a></li>
	        				<li><a href="view_all_users.php">View Users</a></li>
	        				<li><a href="profile.php">View Messages</a></li>
	        				<li><a href="profile.php">Edit Profile</a></li>
	        				<li><a href="logout.php">Logout</a></li>
	        			</ul>
        			</div>
        			
        		</div>
        	</div>
        </div>
        <div class="col-md-7">
        	<div class="white-bg p-10">
				<?php

                include "includes/dbconnect.php";

                $user_id=$_SESSION['user_id'];

                $query="SELECT * FROM `message` m JOIN `user` u ON u.`user_id`=m.`send_user_id` WHERE m.`received_user_id` LIKE '$user_id'";
                $result=mysqli_query($connection, $query);

                while($row=mysqli_fetch_array($result))
                {
                    echo '<p>Sent By: '.$row['name'].'</p>
                        <p>'.$row['message_text'].'</p><hr>';
                }


                ?>
			</div>
        </div>
      </div>

    </main><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
