<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Post Detail</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      
                      <tbody>
                        <?php
                        require "../dp.php";
                        if($_SESSION['role'] == '1'){
                          $sql = "SELECT * FROM post
                          LEFT JOIN category ON post.category = category.cid
                          LEFT JOIN users ON post.aurhor = users.uid ORDER BY post.id DESC";
                        }elseif($_SESSION['role'] == '0'){
                          $sql = "SELECT * FROM post
                          LEFT JOIN category ON post.category = category.cid
                          LEFT JOIN users ON post.aurhor = users.uid 
                          WHERE post.aurhor = {$_SESSION['id']}
                          ORDER BY post.id DESC";
                        }
  
                        $result = mysqli_query($con, $sql);
                        while($row = mysqli_fetch_assoc($result)){
                          ?>
                          <tr>
                              <td class='id'><?=$row['id']?></td>
                              <td><?=$row['ptitle']?></td>
                              <td><?=$row['pdetail']?></td>
                              
                              <td><?=$row['ctype']?></td>
                              <td><?=$row['p_date']?></td>
                              <td><?=$row['name']?></td>
                              
                              
                              <td class='edit'><a href='update-post.php?id=<?=$row["id"]?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-post.php?id=<?=$row["id"]?>&catid=<?=$row['cid']?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                        <?php } ?>  
                      </tbody>
                  </table>
                  
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
