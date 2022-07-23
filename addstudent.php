<?php

session_start();
if (isset($_SESSION['uid1'])) echo "";
else header('location: ../login.php');

if (isset($_POST['addstudent'])) {

     include('dbconn.php');
     $usn = $_POST['usn'];
     $name = $_POST['name'];
     $email = $_POST['email'];
     $phone = $_POST['phone'];
 
     $qry = "INSERT INTO student " . "(usn,name,email,phone)" . " VALUES "
         . "('$usn','$name','$email','$phone')";
     $run = mysqli_query($conn, $qry);
 
     if ($run == true) echo "
         <script>
             confirm('Student Account Added! Redirecting to Dashboard.');
             window.open('staff/staffdash.php','_self');
         </script>
     ";
     else echo ("error: " . mysqli_error($conn));
 }

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <title>Add Staff / Library Management System</title>
     <meta content="text/html; charset=utf-8" http-equiv=Content-Type>
     <meta name="viewport" content="width=device-width, initial-scale=1, 
          user-scalable=no, maximum-scale=1, minimum-scale=1">
          
     <!-- Bootstrap core CSS -->
     <link rel="stylesheet" href="https://bootswatch.com/4/pulse/bootstrap.min.css">
     <!-- Custom styles for this template -->
     <link href="https://fonts.googleapis.com/css?family=Noto+Sans|Roboto" rel="stylesheet">
     <link href="style.css" rel="stylesheet" />

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
                    <h3>Welcome <?php echo $_SESSION['uid1']; ?>!</h3>
                    <p class="lead">Fill the information to add a New Student to the database</p>
                    <h6>
                         <a href="staff/staffdash.php">Go Back</a> / 
                         <a href="../logout.php">Log Out</a>
                    </h6>
                    <br><br>
                    <div class="login-page">
                         <div class="form">
                              <form class="login-form" action="addstudent.php" method="post">
                              <input type="text" placeholder="USN" name="usn" required />
                              <input type="text" placeholder="Name" name="name" required />
                              <input type="email" placeholder="Email" name="email" required />
                              <input type="text" placeholder="Phone" name="phone" required />
                              <button type="submit" class="btn btn-primary" name="addstudent">
                                   Add Student
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
