<?php
 session_start();
 if(isset($_SESSION['uname'])){
    header("Location: post.php");
 }
?>

<?php 
include_once('../base.php');
require_once('../dp.php');

if (isset($_POST['uname']) && isset($_POST['password'])) {
    $uname = ($_POST['uname']);
    $pass = md5($_POST['password']);
    

    
    $sql = "SELECT * FROM users WHERE uname='$uname' AND password='$pass'";

    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['uname'] === $uname && $row['password'] === $pass) {
            session_start();
            $_SESSION['uname'] = $row['uname'];
            
            $_SESSION['id'] = $row['uid'];
            $_SESSION['role'] = $row['role'];
            header("Location: users.php");
            exit();
        }
        else{
            echo '<div class="alert alert-danger" role="alert">Record Not Found!!!</div>';
            
        }
    }
    else{
        echo '<div class="alert alert-danger" role="alert">Please Enter correct UserName and Password!!!</div>';
        
    
    }
}
?>


<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN | Login</title>
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
        <link rel="stylesheet" href="../css/style.css">
    </head>

   <body>
    <div class="container mt-5">
      
        <div class="row">
          <div class="col-md-4 offset-md-4">
            <h1 class="text-center my-5" style="font-weight: 900;">SignIn</h1>
            <form method="post" action="">
              <div class="form-group">
                  <label for="inputAddress">Username</label>
                  <input type="text" class="form-control" id="inputAddress" placeholder="username" name='uname'>
               </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name='password'>
              </div>
              
              
              <button type="submit" class="btn btn-primary btn-block">Submit</button>
              <div class="text-center mt-3">
                 <a  style="font-weight: 700; font-size: 15px;padding: 5px;"href="../index.php">Go to Blogsite </a>
 
              </div>
            </form>

          </div>

        </div>
        
    </div>
        
    </body>
</html>
