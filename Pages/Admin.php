<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>VIEW USERS</title>
</head>
<h3> <center> Colewice Pharmaceuticals</center></h3>
    <hr>
<header>
<nav id="example-4">
  <ul>
    <li class="active"><a href="Home.php">Home</a></li>
    <li><a href="View_patients.php">View Patients</a></li>
    <li><a href="logout.php">Logout</a></li>
    
  </ul>
</nav>
<br>




</header>
<body>
      

<h2><center>View Users</center></h2>

<div class="container">
<table>
    <tr>
    <th>ID</th>
    <th>Username</th>
    <th>Email</th>

    </tr>

    <br>
    <tr>

    <?php
    include "Connect.php";
    include "dbhandler.php";
        $count=1;
        $sel_query="Select * from tbl_userr ORDER BY id;";
        $result = mysqli_query($conn,$sel_query);
        while($row = mysqli_fetch_assoc($result)) { ?>
        <tr><td><?php echo $count; ?></td>
        <td ><?php echo $row["username"]; ?></td>
        <td ><?php echo $row["email"]; ?></td>
        <td >
       <button class="btn btn-info"><a href="Edit.php?id=<?php echo $row["id"]; ?>">Edit</a>
        </button>         
        </td>
        <td >
       <button class="btn btn-danger"><a href="delete.php?id=<?php echo $row["id"]; ?>">Delete</a></button> 
        </td>
        </tr>
        <?php $count++; } ?>
    
    </tr>


</table>
</div>    


</body>
</html>