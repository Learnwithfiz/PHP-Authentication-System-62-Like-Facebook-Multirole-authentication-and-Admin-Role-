<?php
  include 'db.php';
  session_start();
  
  if(isset($_POST['LoginBtn']))
  {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $checkUser = "SELECT email,pass,id from registration WHERE email='$email' and pass='$pass'";
    $ex = mysqli_query($con,$checkUser);
    $row = mysqli_fetch_array($ex);
    $count = mysqli_num_rows($ex);
    if($count)
    {
       $_SESSION['email'] = $row['email'];
       $_SESSION['id'] = $row['id']; 
        header("location:admin.php");
    }else{
        echo "<script>alert('Invalid user and password')</script>";
    }

  }

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="bg-dark text-white p-2 text-center">Social Media Login </h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <form method="post">
                  
                    <label for="">Enter Your  Email</label>
                    <input type="text" placeholder="write..."name="email" class="form-control"> 
                   
                    <label for="">Enter Your  Password</label>
                    <input type="password" placeholder="write..."name="pass" class="form-control"> 
                    
                    <button class="btn btn-primary p-2" name="LoginBtn">Login</button> 

                </form>
                    <a href="login.php">Login</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>