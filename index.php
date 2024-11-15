
<?
  include 'db.php';
  if(isset($_POST['submit']))
  {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $term_cond = $_POST['term_cond'];
    $pass = $_POST['pass'];
    
    if($term_cond==1)
    {
       $checkEmail = "SELECT email from registration where email='$email'";
       $emEx = mysqli_query($con,$checkEmail);
       $count = mysqli_num_rows($emEx);
       if($count>0)
       {
        echo "<script>alert('Email Already Exists...')</script>";
       } else {
            $insert = "INSERT INTO registration (name,email,phone,terms_cond,pass) values('$name','$email','$phone','$term_cond','$pass')";
            $ex = mysqli_query($con,$insert);
            if($ex)
            {
            echo "<script>alert('Registration success')</script>";
            }else{
            echo "<script>alert('Registration Failed')</script>";
            }
       }
      
    }else{
        echo "<script>alert('Need to select terms & conditions...')</script>";
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
    <h1 class="bg-dark text-white p-2 text-center">Social Media Registration Form </h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <form method="post">
                    <label for="">Enter Your  Name</label>
                    <input type="text" placeholder="write..."name="name" class="form-control"> 
                    <label for="">Enter Your  Email</label>
                    <input type="text" placeholder="write..."name="email" class="form-control"> 
                    <label for="">Enter Your  Phone</label>
                    <input type="number" placeholder="write..."name="phone" class="form-control"> 
                    <label for="">Enter Your  Password</label>
                    <input type="password" placeholder="write..."name="pass" class="form-control"> 
                    <label for="">Accept Terms & Conditions</label>
                    <input type="checkbox" value="1" name="term_cond">
                    <button class="btn btn-primary p-2" name="submit">Submit</button> 

                </form>
                    <a href="login.php">Login</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>