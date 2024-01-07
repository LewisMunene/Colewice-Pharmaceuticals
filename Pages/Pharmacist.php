<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav id="example-4">
  <ul>
    <li class="active"><a href="Home.php">Home</a></li>
    <li><a href="View_patients.php">View Patients</a></li>
    <li><a href="Add_drug.php">Add Drug</a></li>
    <li><a href="logout.php">Logout</a></li>
    <li><a href="View_prescription.php">View Prescription</a></li>

  </ul>
</nav>
<br>
<h2><center>View Inventory</center></h2>

<div class="container">
<table>
    <tr>
    <th>ID</th>    
    <th>Trade Name</th>
    <th>Formula</th>
    <th>Price</th>

    </tr>

    <br>
    <tr>
    <?php
    include "Connect.php";
    include "dbhandler.php";
    $count=1;
        $sel_query="Select * from drugs;";
        $result = mysqli_query($conn,$sel_query);
        while($row = mysqli_fetch_assoc($result)) { ?>
        <tr><td><?php echo $count; ?></td>
       
        <td ><?php echo $row["Trade_Name"]; ?></td>
        <td ><?php echo $row["Formula"]; ?></td>
        <td ><?php echo $row["Price"]; ?></td>
        <td >
       <button class="btn btn-info"><a href="Edit.php?Trade_Name=<?php echo $row["Trade_Name"]; ?>">Edit</a>
        </button>         
        </td>
        <td >
       <button class="btn btn-danger"><a href="deleted.php?Trade_Name=<?php echo $row["Trade_Name"]; ?>">Delete</a></button> 
        </td>
        </tr>
        <?php $count++; } ?>
    
    </tr>

