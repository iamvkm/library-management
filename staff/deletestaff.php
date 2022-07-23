<?php
     include('../dbconn.php');

     $sid = $_REQUEST['sid'];
     $username = $_REQUEST['username'];

     $qry = "DELETE FROM `staff` WHERE sid='$sid' AND username='$username';";
     $run = mysqli_query($conn, $qry);

     if ($run == true) echo "
          <script>
          confirm('Staff Account Deleted! Redirecting to Dashboard.');
          window.open('../admindash.php','_self');
          </script>
     ";
     else echo ("error: " . mysqli_error($conn));
?>
