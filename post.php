<?php
 require ('dp.php');
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
    <?php include_once('includes/nav.php'); ?>    
<div>
    <div class="container m-auto mt-3 row">
        <div class="col-12">
            <div class="card mb-3">
            <?php
                $pid=$_GET['id'];

      
                $iddata = "SELECT * FROM post
                LEFT JOIN category ON post.category = category.cid
                LEFT JOIN users ON post.aurhor = users.uid
                WHERE id=$pid";
                $result = mysqli_query($con, $iddata);
                $p_data = mysqli_fetch_assoc($result);
                
            ?>
                <div class="card-body">
                  <h2 class="card-title"><?=$p_data['ptitle']?></h2>
                  <span class="badge bg-dark">Author <?=$p_data['name']?></span>
                  <span class="badge bg-primary ">Posted at <?=date('l jS  F Y h:i A',strtotime($p_data['p_date']))?></span>
                  <span class="badge bg-danger"><?=$p_data['ctype']?></span>
              
                  <div class="border-bottom mt-3"></div>
                  <img src="admin/upload/<?=$p_data['ppic']?>" alt="..."  style="width: 100%;height: 60vh;"> 
                  <p class="card-text"><?=$p_data['pdetail']?>
                  </p>

                </div>
              </div>
        
              <div class="container p-5">
                  <h4>Related Posts</h4>
                  <?php 
                  $pid=$_GET['id'];

                  $cty=$_GET['ct'];
                  $sqlr = "SELECT * FROM post WHERE category={$cty}";
                  $resultr = mysqli_query($con, $sqlr);
                  while ($rowr= mysqli_fetch_assoc($resultr)) {
                    if ($rowr['id'] == $pid) {
                      continue;
                    }
                  
                  ?>
                <div class="card mb-3" >
                    <div class="card mb-3">
                        <div class="row g-0">
                          <div class="col-md-4">
                            <img src="admin/upload/<?=$rowr['ppic']?>" alt="blog-pic" style="width: 100%;height: 200px;"> 
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h5 class="card-title"><?=$rowr['ptitle']?></h5>
                              <p class="card-text"><?=substr($rowr['pdetail'],0,140)."...";?></p>
                              <p class="card-text"><small class="text-muted">Posted At <br><?=date('l jS \of F Y h:i:s A',strtotime($rowr['p_date']))?></small></p>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  <?php 
                  }
                  ?> 
                    
              </div>
        
    </div>
    </div>

  
      
      
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-top">
          <div class="container m-auto">
            <a href="#" class="m-auto" style="text-decoration: none;">Developed by Mohsin</a>
          </div>
        </nav>
      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>    
</body>
</html>