<?php
require "../dp.php";
$errors=array();

if(isset($_FILES['fileToUpload'])){
	$file_name = $_FILES['fileToUpload']['name'];
	$file_size = $_FILES['fileToUpload']['size'];
	$file_tmp = $_FILES['fileToUpload']['tmp_name'];
	$file_type = $_FILES['fileToUpload']['type'];
	$file_ext = strtolower(end(explode('.', $file_name)));
	$ext = array("jpeg","jpg","png");
	if(in_array($file_ext, $ext) === false)
	{
		$errors[] = "please enter pic in correct format";
	}
	if($file_size > 2097152){
		$errors[] = "please enter pic in correct format";
	}
	if(empty($errors)){
		move_uploaded_file($file_tmp, "upload/".$file_name);
	}else{
		print_r(errors);
	
	}
}



$title = mysqli_real_escape_string($con, $_POST['post_title']);
$desc = mysqli_real_escape_string($con, $_POST['postdesc']);
$cate = mysqli_real_escape_string($con, $_POST['category']); 
session_start();
$author = $_SESSION['id'];

$sql = "INSERT INTO post(ptitle,pdetail,aurhor,category,ppic)
        VALUES('{$title}','{$desc}',{$author},'{$cate}','{$file_name}');";
$sql .="UPDATE category SET post = post + 1 WHERE cid = {$cate}";
if(mysqli_multi_query($con, $sql)){
	header("Location: post.php");
}else
{
	echo "Query Failed";
}
?>