

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

    <main role="main" class="container">

      <div class="row">
        <?php
        session_start();
        include "includes/dbconnect.php";
        $email=$_SESSION['email'];
        $query="SELECT * FROM `user` WHERE `email` NOT LIKE '$email'";

        $result=mysqli_query($connection, $query);

        while($row=mysqli_fetch_assoc($result))
        {
            echo '<div class="col-md-3">
                    <div class="white-bg">
                        <img src="uploads/'.$row['profile_pic'].'" style="width:100%;height:150px">
                        <p class="text-center">'.$row['name'].'</p>
                        <a href="view_others_profile.php?id='.$row['user_id'].'" class="btn btn-danger btn-block">View Profile</a>
                    </div>
                </div>';
        }

        ?>
        
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
