<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h3> <center> Colewice Pharmaceuticals</center></h3>
    <hr>

<nav id="example-4">
  <ul>
    <li class="active"><a href="Home.php">Home</a></li>
    <li><a href="#">About</a></li>
    <li><a href="Register.php">Register</a></li>
    <li><a href="logout.php">Logout</a></li>
  </ul>
</nav>
<h2><center>View Patients</center></h2>


<table>
<tr>
    <th>ID</th>  
    <th>First Name</th>
    <th>Last Name</th>
    <th>Email</th>
    <th>Telephone Number</th>
    <th>Date of Birth</th>
    <th>Address</th>
    <th>Patient Gender</th>

    </tr>

    <br>

  <tr>
  <?php
include "connect.php";
include "dbhandler.php";
$count=1;
        $sel_query="Select * from patient;";
        $result = mysqli_query($conn,$sel_query);
        while($row = mysqli_fetch_assoc($result)) { ?>
        <tr><td><?php echo $count; ?></td>
        <td ><?php echo $row["Patient_FName"]; ?></td>
        <td ><?php echo $row["Patient_LName"]; ?></td>
        <td ><?php echo $row["Patient_Email"]; ?></td>
        <td ><?php echo $row["Patient_Tel"]; ?></td>
        <td ><?php echo $row["Patient_DOB"]; ?></td>
        <td ><?php echo $row["Patient_Address"]; ?></td>
        <td ><?php echo $row["Patient_Gender"]; ?></td>
        
      <td>
       <button class="btn btn-info"><a href="Edit.php?Patient_SSN=<?php echo $row["Patient_SSN"]; ?>">Edit</a>
        </button>         
        </td>
        <td >
       <button class="btn btn-danger"><a href="deleted.php?Patient_SSN=<?php echo $row["Patient_SSN"]; ?>">Delete</a></button> 
        </td>
        </tr>
        <?php $count++; } 

?>
  </tr>
</table>

</body>
</html>
 




