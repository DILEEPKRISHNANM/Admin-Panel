<?php
session_start();
// Check if the user is logged in or not
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: loginpage.php");
    exit;
}
?>
<?php
require_once "connect.php";

$eid = $_POST['event_id'];
$sql="update event set flag=true where e_id=$eid";
if ($link->query($sql) === TRUE) {
  header ("Location: ../index.php");
}
$link->close();
?>