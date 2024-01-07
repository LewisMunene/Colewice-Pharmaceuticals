<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
        include "Connect.php";
        include "dbhandler.php";
        if($_SERVER['REQUEST_METHOD']==='POST'){
        $email = $_POST['email'];  
        $password = $_POST['password'];  
        //to prevent from mysqli injection  
        $email = stripcslashes($email);  
        $password = stripcslashes($password);  
        $email = mysqli_real_escape_string($conn, $email);  
        $password = mysqli_real_escape_string($conn, $password); 

       // if (isset($_POST["email"])) {
          // $email = $_POST["email"];
          // $password = $_POST["password"];
           
            $sql = "SELECT * FROM tbl_userr WHERE email = '$email'";
            

            $result = mysqli_query($conn, $sql);
            $username = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $count = mysqli_num_rows($result);  

            if($count == 1){  
                echo "<div class='alert alert-success'>Login Successfull</div>"; 
                session_start();
                $_SESSION["email"] = "$email";
                header("Location: Home.php");
            }  
            else{  
                echo "<div class='alert alert-danger'>Login Unsuccessfull</div>";  
            }  
        }   

        
    



        
           // if ($user) {
             //   if (password_verify($password, $user["password"])) {
               //     session_start();
                 //   $_SESSION["email"] = "yes";
                   // header("Location: Home.php");
                    //die();
                //}else{
                  //  echo "<div class='alert alert-danger'>Password does not match</div>";
                //}
            //}else{
              //  echo "<div class='alert alert-danger'>Email does not match</div>";
            //}
        //}
        ?>


    <div class="container">
        
            <div class="col md-4 offset-4">
                <h4>Log in</h4>
                <hr>

                <form action="Login.php" 
                    class="form"
                    method="POST"
                    >
                  
                    <div class="form-group">
                    <label for="email">Email</label>
                        <input type="text" 
                        class="form control"
                        name="email"
                        placeholder="Email here!">
            
                    </div>
                    

                    <div class="form-group">
                    <label for="password">Password</label>
                        <input type="password" 
                        class="form control"
                        name="password"
                        placeholder="Password here!">


                  
                   
                        <div class="form-btn">
                        <input type="submit" class="btn btn-primary" value="Sign In" name="submit">
                    </div>
                    </div>

                </form>
               
                <a href="Register.php">
                Create a new account?
                </a>


            </div>

        </div>



    </div>
    
</body>
</html>

