<?php

session_start();
if (isset($_SESSION['uid1'])) echo "";
else header('location: ../login.php');

$name = $_SESSION['uid1'];

include('../dbconn.php');
if (isset($_POST['fetch'])) {

     $usn = $_POST['usn'];

     $qry = "SELECT * FROM student WHERE usn='$usn'";
     $run = mysqli_query($conn, $qry);
     $row = mysqli_num_rows($run);

     if ($row == true) header("location: ../studentdetails.php?usn=$usn");
     else {
          ?>
               <script type="text/javascript">
                    alert("USN does not exist!");
                    window.open('staffdash.php', '_self');
               </script>
          <?php
     }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <title>Staff Dashboard / Library Management System</title>
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
            padding: 10%;
          }

          #admindash {
              background-color: #eee;
              padding: 5%;
              width: 60%;
              margin: auto;
              box-shadow: 1px -2px 24px -1px rgba(0,0,0,0.75);
              border-radius: 10px;
              text-align: center;
          }
     </style>
</head>

<body>
     <div class="container">
          <div class="row">
               <div id="admindash">
                    <h3>Welcome <?php echo $_SESSION['uid1']; ?>!</h3>
                    <p class="lead">Enter student details to fetch all information.</p>
                    <br><br>
                    <div class="login-page">
                          <div class="form">
                              <form class="login-form" action="staffdash.php" method="post">
                                  <input type="text" placeholder="Enter University Seat Number" name="usn" required />
                                  <button type="submit" class="btn btn-primary" name="fetch">
                                      Fetch Details
                                  </button>
                                  <br><br>
                              </form>
                          </div>
                    </div>
                    <h6>
                         <a href="../addstudent.php">Add Student</a> / 
                         <a href="editstaff.php?name=<?php echo $name ?>">Edit Details</a> / 
                         <a href="../logout.php">Log Out</a>
                    </h6>
               </div>
          </div>
     </div>
     <!-- Bootstrap core JavaScript -->
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>

</html>
