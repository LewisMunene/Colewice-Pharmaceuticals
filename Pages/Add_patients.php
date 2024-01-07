<?php
include "Connect.php";
include "dbhandler.php";

if($_SERVER['REQUEST_METHOD']==='POST'){

    $Patient_FName = $_REQUEST["FName"];
    $Patient_LName = $_REQUEST["LName"];
    $Patient_Email = $_REQUEST["email"];
    $Patient_Tel = $_REQUEST["Tel"];
    $Patient_DOB = $_REQUEST["DOB"];
    $Patient_Address=$_REQUEST["Address"];
    $Patient_Gender = $_REQUEST["Gender"];
    
   
    $sql= "INSERT INTO `patient`( `Patient_FName`, `Patient_LName`, `Patient_Email`, `Patient_Tel`, `Patient_DOB`, `Patient_Address`, `Patient_Gender`)
    VALUES('$Patient_FName','$Patient_LName','$Patient_Email','$Patient_Tel','$Patient_DOB',
    '$Patient_Address','$Patient_Gender')";
    
   
    if(mysqli_query($conn, $sql)){
        echo "<div class='alert alert-success'>Patient added successfully!</div>";
    
        
    } else{
        echo "<div class='alert alert-danger'>Patient added successfully!</div> $sql. "
            . mysqli_error($conn);
    }
    mysqli_close($conn);
    }
         
        
        

?>
<html>
<Head>
<title>PATIENTS</title>
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
    <li><a href="Inventory.php">View Prescription</a></li>
  </ul>
</nav>
<br>
    
    <h3><center>Add Patient</center> </h3>
        <hr>
        <div class="container">

        <form method="POST"  action="Add_patients.php">
            <div class="form-group">
        <p>First Name:</p>
        
        <input type="text" name="FName" id="FName" class="form-control">
    
    </div>
        <div class="form-group">
        <p>Last Name:</p>   
        <input type="text" name="LName" id="LName" class="form-control">
        
        </div>

        <div class="form-group">
        <p>Email:</p>
        <input type="email" name="email" class="form-control">
        
      </div>

      <div class="form-group">
        <p>Tel No.:</p>
        <input type="tel" name="Tel" class="form-control">
      </div>

        <div class="form-group">  
        <p>Date of birth:</p>
        <input type="date" name="DOB" id="DOB" class="form-control">
        
        </div>

        <div class="form-group">
        <p>Address</p>
        <input type="text" name="Address" class="form-control">
    
        </div>


        <div class="form-group">
        <p>Gender</p>
        <label for="Male">Male</label>
        <input type="radio" name="Gender" id="Male" value="Male">

        <label for="Female">Female</label>
        <input type="radio" name="Gender" id="Female" value="Female">

    
        </div>
        <br>
        <div class="form-btn">
            <input type="submit" class="btn btn-primary" value="submit" name="submit">
        </div>

        </form>
    </div>

</Body>
</html>