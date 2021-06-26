<?php 
include_once('base.php');
require_once('dp.php');

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
        	
        	$_SESSION['id'] = $row['id'];
        	header("Location: index.php");
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
	  	  
	  	  
	  	  <button type="submit" class="btn btn-primary">Submit</button>
	  	</form>
	  </div>
	</div>
</div>