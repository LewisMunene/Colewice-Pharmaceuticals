<?php
include "Connect.php";
include "dbhandler.php";
$id=$_REQUEST['id'];
$query = "DELETE FROM tbl_userr WHERE id=$id"; 



$result = mysqli_query($conn,$query) or die ( mysqli_error($conn));
header("Location: Admin.php");



exit();
?>