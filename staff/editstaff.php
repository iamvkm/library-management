<?php

session_start();
if (isset($_SESSION['uid1'])) echo "";
else header('location: ../login.php');

$name = $_REQUEST['name'];

include('../dbconn.php');
$qry = "SELECT * FROM `staff` WHERE `name` = '$name'";
$run = mysqli_query($conn, $qry);
$row = mysqli_num_rows($run);

if ($row == true) {
     $data = mysqli_fetch_assoc($run);
     $sid = $data['sid'];
     $username = $data['username'];
     $password = $data['password'];
     $email = $data['email'];
}

if (isset($_POST['update'])) {
     include('../dbconn.php');

     $name = $_POST['name'];
     $username = $_POST['username'];
     $password = $_POST['password'];
     $email = $_POST['email'];
 
     $qry = "UPDATE staff SET sid='$sid',name='$name',username='$username',password='$password',email='$email' WHERE sid='$sid'";
     $run = mysqli_query($conn, $qry);
 
     if ($run == true) echo "
         <script>
         confirm('Staff Account Updated! Redirecting to Dashboard.');
         window.open('staffdash.php','_self');
         </script>
     ";
     else echo ("error: " . mysqli_error($conn));
 }

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <title>Edit Staff Details / Library Management System</title>
     <meta content="text/html; charset=utf-8" http-equiv=Content-Type>
     <meta name="viewport" content="width=device-width, initial-scale=1, 
          user-scalable=no, maximum-scale=1, minimum-scale=1">
          
     <!-- Bootstrap core CSS -->
     <link rel="stylesheet" href="https://bootswatch.com/4/pulse/bootstrap.min.css">
     <!-- Custom styles for this template -->
     <link href="https://fonts.googleapis.com/css?family=Noto+Sans|Roboto" rel="stylesheet">
     <link href="../style.css" rel="stylesheet" />

     <style type="text/css">

          body {
            background-color: #eee;
            padding: 5%;
          }

          #admindash {
              background-color: #eee;
              padding: 5%;
              width: 60%;
              margin: auto;
              box-shadow: 1px -2px 24px -1px rgba(0,0,0,0.75);
              border-radius: 10px;
          }

          .form input {
          width: 100%;
          }
      
          .form button {
          width: 100%;
          }

     </style>
</head>

<body>
     <div class="container">
          <div class="row">
               <div id="admindash">
                    <h3>Welcome <?php echo $name; ?>!</h3>
                    <p class="lead">Edit your profile details below to update them.</p>
                    <h6>
                         <a href="staffdash.php">Go Back</a> / 
                         <a href="../logout.php">Log Out</a>
                    </h6>
                    <br><br>
                    <div class="login-page">
                         <div class="form">
                              <form class="login-form" action="editstaff.php" method="post">
                              <div class="form-group">
                                   <h6><label>Name</label></h6>
                                   <input type="text" name="name" required value="<?php echo $name; ?>"/>
                              </div>
                              <div class="form-group">
                                   <h6><label>Username</label></h6>
                                   <input type="text" name="username" required value="<?php echo $username; ?>"/>
                              </div>
                              <div class="form-group">
                                   <h6><label>Password</label></h6>
                                   <input type="text" name="password" required value="<?php echo $password; ?>"/>
                              </div>
                              <div class="form-group">
                                   <h6><label>Email Id</label></h6>
                                   <input type="email" name="email" required value="<?php echo $email; ?>"/>
                              </div>
                              <button type="submit" class="btn btn-primary" name="update">
                                   Update Details
                              </button>
                              <br><br>
                         </form>
                    </div>
               </div>
          </div>
     </div>
     <!-- Bootstrap core JavaScript -->
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>

</html>
