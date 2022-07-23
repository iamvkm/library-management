<?php
     include('dbconn.php');

     $usn = $_REQUEST['usn'];
     $bid = $_REQUEST['bid'];

     $qry = "DELETE FROM `books` WHERE book_id='$bid';";
     $run = mysqli_query($conn, $qry);

     if ($run == true) echo "
          <script>
          confirm('Book Record Deleted! Redirecting to Dashboard.');
          window.open('studentdetails.php?usn={$usn}','_self');
          </script>
     ";
     else echo ("error: " . mysqli_error($conn));
?>
