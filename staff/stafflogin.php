<?php

session_start();
if (isset($_SESSION['uid1'])) header('location: manager/managerdash.php');

include('../dbconn.php');

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

$qry = "SELECT * FROM staff WHERE username='$username' AND password='$password'";
$run = mysqli_query($conn, $qry);
$row = mysqli_num_rows($run);

if ($row < 1) {
    ?>
    <script type="text/javascript">
        alert("Invalid Credentials!");
        window.open('../login.php', '_self');
    </script>
<?php
} else {
    $data = mysqli_fetch_assoc($run);
    $id = $data['name'];
    $_SESSION['uid1'] = $id;
    header("location: staffdash.php?sid=$id");
}
?>
