<?php include "header.php"; 
require "../dp.php";

$pid =$_GET['id'];

$sql = "SELECT * FROM post
LEFT JOIN category ON post.category = category.cid
LEFT JOIN users ON post.aurhor = users.uid 
WHERE post.id = {$pid} ";

$result = mysqli_query($con, $sql) or die("post update query failed!");
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){



?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <!-- Form for show edit-->
        <form action="save-update-post.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value="<?=$row['id']?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="post_title"  class="form-control" id="exampleInputUsername" value="<?=$row['ptitle']?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>
                <textarea name="postdesc" class="form-control"  required rows="5">
                   <?=$row['pdetail']?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputCategory">Category</label>
                <select class="form-control" name="category">
                    <option disabled>Select category</option>
                      <?php
                      require "../dp.php";
                     $sql1 = "SELECT * FROM category";
                     $result1 = mysqli_query($con, $sql1);
                     if (mysqli_num_rows($result1) > 0 ) {
                       // code...
                     
                     while($row1 = mysqli_fetch_assoc($result1)){

                      echo "<option value='{$row1['cid']}'>{$row1['ctype']}</option>";


                     }
                    }

                      ?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="new-image">
                <img  src="upload/<?=$row['ppic']?>" height="150px">
                <input type="hidden" name="old_image" value="">
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->
    <?php }
}else{
    echo "Result not found";
}
?>

      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
