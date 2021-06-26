<?php include "header.php"; 
    require "../dp.php";
    if ($con->connect_error) {
        die("Connection failed: " . $con->connect_error);
    }
    if($_SESSION['role'] == '0'){ 
    header("Location:post.php");}
     
 if(isset($_POST['submit'])){
  $userid = mysqli_real_escape_string($con, $_POST['user_id']);
  
  $name = mysqli_real_escape_string($con, $_POST['f_name']);
  $user = mysqli_real_escape_string($con, $_POST['username']);
  
  $role = mysqli_real_escape_string($con, $_POST['role']);
  //echo "<pre>";print_r($userid);
   

  $sql1 = "UPDATE users SET name = '{$name}',uname = '{$user}',  role = '{$role}' WHERE uid = {$userid}";
  //$res = mysql_query($con, $sql1) or trigger_error(mysql_error()." in ".$sql1);
  if(mysqli_query($con, $sql1)){
    header("Location: users.php");
  }

  }
 
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                <?php
                $uid = $_GET['id'];
                $sql = "SELECT * FROM users WHERE uid={$uid}";
                $result = mysqli_query($con, $sql) or die("Update querry failed!!!");
                if(mysqli_num_rows($result) > 0){
                  while($row = mysqli_fetch_assoc($result)){
                ?>
                  
                
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF']; ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="<?=$row['uid'] ?>" placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>Name</label>
                          <input type="text" name="f_name" class="form-control" value="<?=$row['name']?>" placeholder="" required>
                      </div>
                      
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?=$row['uname']?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" value="<?php echo $row['role']; ?>">
                            <?php 
                            if($row['role'] == 1){
                                echo "<option value='0'>normal User</option>
                              <option value='1' selected >Admin</option>";
                              }else{
                                echo "<option value='0' selected>Normal User</option>
                              <option value='1'>Admin</option>";
                            }
                             ?> 
                          </select>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
                <?php }
              } ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
