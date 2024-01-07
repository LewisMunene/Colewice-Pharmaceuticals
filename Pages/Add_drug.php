<?php
include 'Connect.php';
include "dbhandler.php";

//Take the value from the form
if($_SERVER['REQUEST_METHOD']==='POST'){
$Trade_Name=$_REQUEST['Trade_Name'];
$Formula=$_REQUEST['Formula'];
$Price=$_REQUEST['Price'];

//Perform the INSERT query
$sql="INSERT INTO `drugs` (`Trade_Name`, `Formula`, `Price`) VALUES ('$Trade_Name', '$Formula', '$Price')";
if(mysqli_query($conn, $sql)){
    echo "<div class='alert alert-success'>Drug added successfully!</div>";

    
} else{
    echo "<div class='alert alert-danger'>Drug added successfully!</div> $sql. "
        . mysqli_error($conn);
}
mysqli_close($conn);
}
?>
<html>
<Head>
<title>Add Drug</title>
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
    <li><a href="Register.php">Register</a></li>
    <li><a href="logout.php">Logout</a></li>
    <li><a href="Inventory.php">View Prescription</a></li>
  </ul>
</nav>
<br>
    
    <h3><center>Add Drug</center> </h3>
        <hr>
        <div class="container">

        <form method="POST"  action="Add_drug.php">
            <div class="form-group">
        <label for="Trade_Name">Trade Name</label>
        
        <input type="text" name="Trade_Name" id="Trade_Name" class="form-control">
    
    </div>
        <div class="form-group">
        <label for="Formula">Formula</label>  
        <input type="text" name="Formula" id="Formula" class="form-control">
        
        </div>

        <div class="form-group">
        <label for="Price">Price</label>
        <input type="text" name="Price" class="form-control">
        
      </div>

      
        <div class="form-btn">
            <input type="submit" class="btn btn-primary" value="submit" name="submit">
        </div>
    <br>

   
        </form>
    </div>

</Body>
</html>

