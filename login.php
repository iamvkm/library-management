<?php

session_start();
if (isset($_SESSION['uid'])) header('location: admindash.php');
else if (isset($_SESSION['uid1'])) header('location: staff/staffdash.php');
else echo "";

include('dbconn.php');
if (isset($_POST['login'])) {

     $username = $_POST['username'];
     $password = $_POST['password'];

     $qry = "call adminlogin('$username','$password')";
     $run = mysqli_query($conn, $qry);
     $row = mysqli_num_rows($run);

     if ($row < 1) {
      header("location: staff/stafflogin.php?username=$username&password=$password");
    } else {
          $data = mysqli_fetch_assoc($run);
          $id = $data['username'];
          $_SESSION['uid'] = $id;
          header('location: admindash.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <title>Log In / Library Management System</title>

    <!-- Bootstrap core CSS -->
    <link
      href="https://bootswatch.com/4/pulse/bootstrap.min.css"
      rel="stylesheet"
    />

    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet" />

    <style type="text/css">
      .login-page {
          background-color: #eee;
          padding: 5%;
          width: 60%;
          margin: auto;
          box-shadow: 1px -2px 24px -1px rgba(0,0,0,0.75);
          border-radius: 10px;
          text-align: center;
      }
      body {
        padding: 10%;
      }
    </style>

  </head>

    <body>
        <div class="container">
            <div class="login-page">
                <div class="form">
                    <form class="login-form" action="login.php" method="post">
                        <h3>Welcome User</h3><br><br>
                        <input type="text" placeholder="Username" name="username" required />
                        <input type="password" placeholder="Password" name="password" required />
                        <button type="submit" class="btn btn-primary" name="login" value="Login">
                            Log In
                        </button>
                        <br><br>
                    </form>
                </div>
            </div>
        </div>
  </body>
  
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
</html>
