<?php
require "../dp.php";
if(empty($_FILES['new-image']['name'])){
	$file_name = $_POST['old_image'];
}
else{
	$errors=array();
		$file_name = $_FILES['new-image']['name'];
		$file_size = $_FILES['new-image']['size'];
		$file_tmp = $_FILES['new-image']['tmp_name'];
		$file_type = $_FILES['new-image']['type'];
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
$sql = "UPDATE post SET ptitle ='{$_POST["post_title"]}',pdetail ='{$_POST["postdesc"]}',category ='{$_POST["category"]}',ppic ='{$file_name}' WHERE id ={$_POST["post_id"]}";
$result = mysqli_query($con, $sql);
if($result){
	header("Location:post.php");
}

?>