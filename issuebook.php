<?php

session_start();
if (isset($_SESSION['uid1'])) echo "";
else header('location: ../login.php');

$usn = $_REQUEST['usn'];
$name = $_REQUEST['name'];

$count = $_REQUEST['count'];
if ($count==3) {
    echo "
        <script>
            confirm('Maximum books issued! Remove some to issue more.');
            window.open('studentdetails.php?usn={$usn}','_self');
        </script>
    ";
}

if (isset($_POST['issuebook'])) {

    include('dbconn.php');

    $usn = $_POST['usn'];
    $bid = $_POST['bid'];
    $bname = $_POST['bname'];
 
    $qry = "INSERT INTO books " . "(usn,book_id,book_name)" . " VALUES " . "('$usn','$bid','$bname')";
    $run = mysqli_query($conn, $qry);
 
    if ($run == true) echo "
        <script>
            confirm('Book Issued! Redirecting to Dashboard.');
            window.open('studentdetails.php?usn={$usn}','_self');
        </script>
    ";
    else echo ("error: " . mysqli_error($conn));
 }

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <title>Issue Book / Library Management System</title>
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
                    <h3><?php echo $_REQUEST['name']; ?> - <?php echo $_REQUEST['usn']; ?></h3>
                    <p class="lead">Enter the details of books to be issued</p>
                    <h6>
                         <a href="../admindash.php">Go Back</a> / 
                         <a href="../logout.php">Log Out</a>
                    </h6>
                    <br><br>
                    <div class="login-page">
                         <div class="form">
                              <form class="login-form" action="issuebook.php" method="post">
                              <input type="text" name="usn" value="<?php echo $usn ?>" hidden />
                              <input type="text" placeholder="Book Id" name="bid" required />
                              <input type="text" placeholder="Book Name" name="bname" required />
                              <button type="submit" class="btn btn-primary" name="issuebook">
                                   Issue Book
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
