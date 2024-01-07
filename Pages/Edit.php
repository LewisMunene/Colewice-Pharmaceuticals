<?php
include "Connect.php";
include "dbhandler.php";
$id=$_REQUEST['id'];
$query = "SELECT * from tbl_userr where id='".$id."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error($conn));
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Users</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<p><a href="Admin.php">Admin</a> 
| <a href="Register.php">Register New User</a> 
| <a href="logout.php">Logout</a></p>
<h1><center>Update Record</center> </h1>
<?php
$status = "";
if(isset($_POST['new']) && $_POST['new']==1)
{
$id=$_REQUEST['id'];
$trn_date = date("Y-m-d H:i:s");
$username =$_REQUEST['username'];
$email =$_REQUEST['email'];
$submittedby = $_SESSION["username"];
$update="update new_record set trn_date='".$trn_date."',
username='".$username."', email='".$email."',
submittedby='".$submittedby."' where id='".$id."'";
mysqli_query($conn, $update) or die(mysqli_error($conn));
$status = "Record Updated Successfully. </br></br>
<a href='view.php'>View Updated Record</a>";
echo '<p style="color:#FF0000;">'.$status.'</p>';
}else {
?>
<div class="container">

<form name="form" method="post" action=""> 
<input type="hidden" name="new" value="1" />
<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
<p><input type="text" name="username" placeholder="Enter Name" 
required value="<?php echo $row['username'];?>" /></p>
<p><input type="text" name="email" placeholder="Enter Email" 
required value="<?php echo $row['email'];?>" /></p>
<button class="btn btn-info"name="submit" type="submit" value="Update">Update</button>
</form>
<?php } ?>
</div>
</div>
</body>
</html>