<?php include "header.php"; 
if($_SESSION['role'] == '0'){ 
header("Location:post.php");}
?>

  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-user.php">add user</a>
              </div>

              <div class="col-md-12">
                <?php 
                require_once "../dp.php";

                $sql = "SELECT * FROM users ORDER BY uid DESC";
                $result = mysqli_query($con, $sql) or die("users not fetch");
                if(mysqli_num_rows($result) > 0){
                  ?>
                
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                          ?>
                        
                          <tr>
                              <td class='id'><?=$row['uid'] ?></td>
                              <td><?=$row['name'] ?></td>
                              <td><?=$row['uname'] ?></td>
                              <td><?php 
                              if($row['role'] == 1){
                                echo "Admin";
                              }else{
                                echo "Normal";
                              }

                            ?></td>
                              <td class='edit'><a href='update-user.php?id=<?=$row["uid"]?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-user.php?id=<?=$row["uid"]?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                        <?php } ?>  
                      </tbody>
                  </table>
                <?php } ?>
                  
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
