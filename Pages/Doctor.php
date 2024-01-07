<?php
include 'Connect.php';
include "dbhandler.php";

//Take the value from the form
if($_SERVER['REQUEST_METHOD']==='POST'){
$username=$_REQUEST['username'];
$Formula=$_REQUEST['Formula'];
$Price=$_REQUEST['Price'];
$Frequency=$_REQUEST['Frequency'];
$Trade_Name=$_REQUEST['Trade_Name'];

//Perform the INSERT query
$sql="INSERT INTO `tbl_prescription`( `username`, `Formula`, `Price`, `Frequency`,`Trade_Name`) VALUES ('$username', '$Formula', '$Price','$Frequency','$Trade_Name')";
if(mysqli_query($conn, $sql)){
    echo "<div class='alert alert-success'>Precription added successfully!</div>";

    
} else{
    echo "<div class='alert alert-danger'>Prescription added unsuccessfully!</div> $sql. "
        . mysqli_error($conn);
}
mysqli_close($conn);
}
?>
<html>
<Head>
<title>Add Prescription</title>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</Head>
<Body>
<nav id="example-4">
  <ul>
    <li class="active"><a href="Home.php">Home</a></li>
    <li><a href="View_patients.php">View Patients</a></li>
    <li><a href="Add_patients.php">Add Patients</a></li>
    <li><a href="logout.php">Logout</a></li>
    <li><a href="View_prescription.php">View Prescription</a></li>
  </ul>
</nav>
<br>
    
    <h3><center>Add Prescription</center> </h3>
        <hr>
        <div class="container">

        <form method="POST"  action="Doctor.php">
            <div class="form-group">
        <label for="username">Username</label>
        
        <input type="text" name="username" id="Trade_Name" class="form-control">

        
    
    </div>
        <div class="form-group">
        <label for="Formula">Formula</label>  
        <input type="text" name="Formula" id="Formula" class="form-control">
        
        </div>

        <div class="form-group">
        <label for="Price">Price</label>
        <input type="text" name="Price" class="form-control">
        
      </div>
      <div class="form-group">
        <label for="Frequency">Frequency</label>
        <input type="text" name="Frequency" class="form-control">
        
      </div>

      <div class="form-group">
        <label for="Trade_Name">Trade Name</label>
        <input type="text" name="Trade_Name" class="form-control">
        
      </div>
      
        <div class="form-btn">
            <input type="submit" class="btn btn-primary" value="submit" name="submit">
        </div>
    <br>

   
        </form>
    </div>

</Body>
</html>

