<?php
session_start();
if (isset($_SESSION["user"])) {
   header("Location: Inventory.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["submit"])) {
           $Username = $_POST["username"];
           $email = $_POST["email"];
           $password = $_POST["password"];
           $passwordConf = $_POST["passwordconf"];
           
           $passwordHash = password_hash($password, PASSWORD_DEFAULT);

           $errors = [];
           
           if (empty($Username) OR empty($email) OR empty($password) OR empty($passwordConf)) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($password)<8) {
            array_push($errors,"Password must be at least 8 charactes long");
           }
           if ($password!==$passwordConf) {
            array_push($errors,"Password does not match");
           }
           require_once "Connect.php";
           $sql = "SELECT * FROM tbl_pharm WHERE email = '$email'";
           $result = mysqli_query($conn, $sql);
           $rowCount = mysqli_num_rows($result);
           if ($rowCount>0) {
            array_push($errors,"Email already exists!");
           }
           if (count($errors)>0) {
            foreach ($errors as  $error) {
                echo "<div class='alert alert-danger'>$error</div>";
            }
           }else{
            
            $sql = "INSERT INTO tbl_pharm (username, email, password) VALUES ( ?, ?, ? )";
            $stmt = mysqli_stmt_init($conn);
            $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
            if ($prepareStmt) {
                mysqli_stmt_bind_param($stmt,"sss",$Username, $email, $passwordHash);
                mysqli_stmt_execute($stmt);
                echo "<div class='alert alert-success'>You are registered successfully.</div>";
            }else{
                die("Something went wrong");
            }
           }
          

        }
        ?>
        <h3><center>Register as Pharmacist </center> </h3>
        <hr>
        <br>
        <form action="Register_Pharm.php" method="post">
            <div class="form-group">
            <p>Full Name:</p>
                <input type="text" class="form-control" name="username" placeholder="Enter your Full Name:">
            </div>
            <div class="form-group">
            <p>Email:</p>
                
                <input type="email" class="form-control" name="email" placeholder="Enter your Email:">
            </div>
            <div class="form-group">
            <p>Password:</p>
                
                <input type="password" class="form-control" name="password" placeholder="Password:">
            </div>
            <div class="form-group">
                <p>Confirm Password:</p>
                
                <input type="password" class="form-control" name="passwordconf" placeholder="Repeat Password:">
            </div>
            <div class="form-btn">
                <input type="submit" class="btn btn-primary" value="Register" name="submit">
            </div>
        </form>
        <div>
        <div><p>Already Registered <a href="Login.php">Login Here</a></p></div>
      </div>
    </div>
</body>
</html>
