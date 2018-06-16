

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

    $user_id=$_GET['id'];

    $query="SELECT * FROM `user` WHERE `user_id` LIKE '$user_id'";
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
        	</div>
        </div>
        <div class="col-md-7">
        	<div class="white-bg p-10">
                <?php
                if(isset($_GET['msg']))
                {
                    if($_GET['msg']==1)
                    {
                        echo "Message sent successfully!";
                    }
                    else
                    {
                        echo "Some error occured";
                    }
                }

                ?>
				<table>
					<tr>
						<td>Name: </td>
						<td><?php echo $row['name']; ?></td>
					</tr>
					<tr>
						<td>Email: </td>
						<td><?php echo $row['email']; ?></td>
					</tr>
					<tr>
						<td>City: </td>
						<td><?php echo $row['city']; ?></td>
					</tr>
					<tr>
						<td>Gender: </td>
						<td><?php echo $row['gender']; ?></td>
					</tr>
				</table>
                <form class="mt-50" action="send_message.php" method="POST">
                    <label>Message <?php echo $row['name']?></label><br>
                    <textarea class="form-control" name="message"></textarea><br>
                    <input type="hidden" name="received_by" value="<?php echo $user_id; ?>">
                    <input type="submit" value="Send" class="btn btn-danger">
                </form>
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
