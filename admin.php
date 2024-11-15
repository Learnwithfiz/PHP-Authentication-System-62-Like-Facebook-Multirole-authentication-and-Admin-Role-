<?php
session_start();
include 'db.php';
$email = "";
$user_id = "";
 if($_SESSION['email']==true)
 {
   $email=$_SESSION['email'];
   $user_id = $_SESSION['id'] ;
 } else{
    header("location:login.php");
 }
  
 if(isset($_POST['postBtn']))
 {
   $title = $_POST['title'];
   $context = $_POST['context'];
   $insert = "INSERT INTO post(post_title,post_context,user_id) 
   VALUES('$title','$context','$user_id')";
   $ex = mysqli_query($con,$insert);
   if($ex)
   {
    echo "<script>alert('post created')</script>";
   }else{
    echo "<script>alert('post failed')</script>";
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
    <h1 class="bg-dark text-white p-2 text-center">Welcome Admin <?php echo $email . $user_id; ?></h1>
    <div class="container">
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4">
                <form method="post">
                  
                    <label for="">Write Your Post Title</label>
                    <input type="text" placeholder="write..."name="title" class="form-control"> 
                   
                    <label for="">Write Your Post Context</label>
                    <input type="text" placeholder="write..."name="context" class="form-control"> 
                    
                    <button class="btn btn-primary p-2" name="postBtn">Post</button> 

                </form>
                    <a href="logout.php">Logout</a>
            </div>
            <div class="col-lg-4">
                <table class="table">
                    <thead>
                    <th>Post Title</th>
                    <th>Post Content</th>
                    <?php
                    if($user_id==100)
                    {
                        ?>
                            <th>User Name </th>
                        <?
                    }
                    ?>
                    
                    </thead>

                    <tbody>
                        <?php
                            if($user_id==100)
                            {
                                $sel = "SELECT * FROM post a , registration b where a.user_id=b.id";
                            }else{
                                $sel = "SELECT * FROM post where user_id = $user_id";
                            }
                            
                            $ex = mysqli_query($con,$sel);
                            while($row=mysqli_fetch_array($ex))
                            {  
                                ?>
                                    <tr>

                                        <td><?php echo $row['post_title']; ?></td>
                                        <td><?php echo $row['post_context']; ?></td>
                                        <?php
                                         if($user_id==100)
                                         {
                                            ?>
                                              <td><?php echo $row['name'] ?></td>
                                            <?
                                         }
                                        ?>
                                    </tr>
                                <?
                                }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>