<?php

session_start();
if (isset($_SESSION['uid'])) echo "";
else header('location: login.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <title>Admin Dashboard - Library Management System</title>
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
              width: 80%;
              margin: auto;
              box-shadow: 1px -2px 24px -1px rgba(0,0,0,0.75);
              border-radius: 10px;
          }
     </style>
     
     <script src="https://use.fontawesome.com/6b1ec90a67.js"></script>
</head>

<body>
     <div class="container">
          <div class="row">
               <div id="admindash">
                    <h3>Welcome Admin!</h3>
                    <p class="lead">Below are the details of all the staff</p>
                    <table class="table table-striped">
                         <thead>
                         <tr>
                              <th scope="col">Staff ID</th>
                              <th scope="col">Name</th>
                              <th scope="col">Username</th>
                              <th scope="col">Password</th>
                              <th scope="col">Email</th>
                              <th scope="col">Edit</th>
                         </tr>
                         </thead>
                         <tbody>
                              <?php
                                   $count = 1;
                                   include('dbconn.php');
                                   $qry = "SELECT * from staff";
                                   $run = mysqli_query($conn, $qry);
                                   while($row = mysqli_fetch_array($run)) {
                                        
                                        $sid = $row['sid'];
                                        $username = $row['username'];
                                        ?>
                                             <tr>
                                                  <td><?php echo $row['sid']?></td>
                                                  <td><?php echo $row['name']?></td>
                                                  <td><?php echo $row['username']?></td>
                                                  <td><?php echo $row['password']?></td>
                                                  <td><?php echo $row['email']?></td>
                                                  <td> 
                                                       <a href='staff/deletestaff.php?sid=<?php echo $sid; ?>&username=<?php echo $username; ?>'> 
                                                       <i class='fa fa-trash' aria-hidden='true'> 
                                                       </i> 
                                                       </a> 
                                                  </td>
                                             </tr>

                                        <?php
                                   }
                              ?>
                         </tbody>
                    </table>
                    <h6>
                         <a href="staff/addstaff.php">Add New Staff</a> / 
                         <a href="logout.php">Log Out</a>
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
