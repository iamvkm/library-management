<?php

session_start();
if (isset($_SESSION['uid1'])) echo "";
else header('location: login.php');

$usn = $_REQUEST['usn'];

include('dbconn.php');
$qry = "SELECT * FROM `student` WHERE `usn` = '$usn'";
$run = mysqli_query($conn, $qry);
$row = mysqli_num_rows($run);

if ($row == true) {
     $data = mysqli_fetch_assoc($run);
     $name = $data['name'];
}

$qry = "SELECT * FROM `books` WHERE `usn` = '$usn'";
$run = mysqli_query($conn, $qry);
$row = mysqli_num_rows($run);

if ($row == true) {
     $data = mysqli_fetch_assoc($run);
     $book_id = $data['book_id'];
     $book_name = $data['book_name'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <title>Student Details / Library Management System</title>
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
                    <h3><?php echo $name; ?> - <?php echo $usn; ?></h3>
                    <p class="lead">Below are the details of books issued</p><br>
                    <table class="table table-striped">
                         <thead>
                              <tr>
                                   <th scope="col">Book Id</th>
                                   <th scope="col">Book Name</th>
                                   <th scope="col">Remove</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php
                                   $count = 0;
                                   include('dbconn.php');
                                   $qry = "SELECT * FROM `books` WHERE `usn` = '$usn'";
                                   $run = mysqli_query($conn, $qry);
                                   while($row = mysqli_fetch_array($run)) {
                                        ?>
                                             <tr>
                                                  <td><?php echo $row['book_id']?></td>
                                                  <td><?php echo $row['book_name']?></td>
                                                  <td> 
                                                       <a href='removebook.php?bid=<?php echo $row['book_id'] ?>&usn=<?php echo $usn ?>'> 
                                                       <i class='fa fa-trash' aria-hidden='true'> 
                                                       </i> 
                                                       </a> 
                                                  </td>
                                             </tr>
                                        <?php
                                        $count++;
                                   }
                              ?>
                         </tbody>
                    </table><br>
                    <h6>
                    <a href="issuebook.php?usn=<?php echo $usn ?>&name=<?php echo $name ?>&count=<?php echo $count ?>">Issue New Book</a> / 
                    <a href="staff/staffdash.php">Go Back</a> / 
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
