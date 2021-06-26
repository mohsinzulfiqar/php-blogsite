<?php include "header.php";
if($_SESSION['role'] == '0'){ 
header("Location:post.php");} ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>No. of Posts</th>
                        
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php
                        require "../dp.php";

                        $sql = "SELECT * FROM category";
                        $result = mysqli_query($con, $sql);
                        if($result){
                            while ($row = mysqli_fetch_assoc($result)) {
                                // code...
                        ?>
                        <tr>

                            <td class='id'><?=$row['cid']?></td>
                            <td><?=$row['ctype']?></td>
                            <td><?=$row['post']?></td>
                            
                            <td class='delete'><a href='delete-category.php?id=<?=$row['cid']?>'><i class='fa fa-trash-o'></i></a></td>
                        </tr>
                 <?php   }
                }
                ?>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
