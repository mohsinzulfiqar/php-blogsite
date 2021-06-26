<?php 
 require 'dp.php';
 
?>
<?php
if(isset($_GET['page'])){
  $page = $_GET['page'];
}else{
  $page=1;
}
$post_per_page= 5;
$result=($page-1)*$post_per_page;
?>
<?php
if(isset($_GET['search'])){
  $keyword = $_GET['search'];
  $allpost = "SELECT * FROM post WHERE ptitle LIKE '%$keyword%' ORDER BY id DESC LIMIT $result, $post_per_page";
}elseif(isset($_GET['id'])){
  $allpost = "SELECT * FROM post WHERE category='{$_GET["id"]}' ORDER BY id DESC LIMIT $result, $post_per_page";
}
else
{
 $allpost = "SELECT * FROM post ORDER BY id DESC LIMIT $result, $post_per_page";

}

$resultfinal = mysqli_query($con, $allpost);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Blog</title>
</head>
<body>
    <?php include_once'includes/nav.php' ?>  
    <div class="container-fluid ">
      <div class="row">
        <div class="col-2">
          <h3 style="font-weight:900;background:black;color: white;border-radius: 3px;letter-spacing: 5px;" class="py-2 text-center">Category</h3>
          <div class="list-group m-0">
            
            <?php
            $sql9 = "SELECT * FROM category";
            $result9 = mysqli_query($con, $sql9);
            while($row9 = mysqli_fetch_assoc($result9)){
            ?>
            <a href="index.php?id=<?=$row9['cid']?>" class="list-group-item list-group-item-action"><?=$row9['ctype']?></a>
          <?php
          }
          ?>
          </div>
        
        </div>
        <div class="col-8">
          <?php
            while ($row = mysqli_fetch_assoc($resultfinal)) {
          ?>
          <a href="post.php?id=<?=$row['id']?>&ct=<?=$row['category']?>" style="text-decoration: none;color: black;"> 
              <div class="card mb-3">
                  <div class="row g-0">
                    <div class="col-md-4">
                      <img src="admin/upload/<?=$row['ppic']?>" alt="blog-pic" style="width: 100%;height: 200px;"> 
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title"><?=$row['ptitle']?></h5>
                        <p class="card-text"><?=substr($row['pdetail'],0,140)."...";?></p>
                        <p class="card-text"><small class="text-muted">Posted At <br><?=date('l jS \of F Y h:i:s A',strtotime($row['p_date']))?></small></p>
                      </div>
                    </div>
                  </div>
                </div>
            </a>
            <?php } ?>
          </div>
          <div class="col-2">
            
            <img src="images/12.png" class="mx-auto d-flex">
          </div>
        </div>

        
        
      </div>

    </div>  

<div>
  <div class="container m-auto mt-3 row">
    <div class="col-12">
    
    </div>
<?php
$q = "SELECT * FROM post";
$r = mysqli_query($con,$q);
$total_posts = mysqli_num_rows($r);
$total_pages = ceil($total_posts/$post_per_page);
?>
<?php
 if($page>1){
  $paginate="";
 }else
 {
 $paginate="disabled"; } 
 if($page<$total_pages){
  $npaginate="";
 }else
 {
 $npaginate="disabled"; } 
?>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <li class="page-item <?=$paginate?>">
            <a class="page-link" href="?<?php if(isset($_GET['search'])){ echo "search=$keyword&";}?>page=<?=$page-1?>" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
<?php
for($ppage=1; $ppage<=$total_pages; $ppage++){
?>
          
          <li class="page-item"><a class="page-link" href="?<?php if(isset($_GET['search'])){ echo "search=$keyword&";}?>page=<?=$ppage?>"><?=$ppage?></a></li>
        
<?php
}
?>

          
          
          <li class="page-item <?=$npaginate?>" >
            <a class="page-link" href="?<?php if(isset($_GET['search'])){ echo "search=$keyword&";}?>page=<?=$page+1?>">Next</a>
          </li>
        </ul>
      </nav>
      
      
        <?php include_once'includes/footer.php' ?>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>    
</body>
</html>