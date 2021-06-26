<?php 


require "../dp.php";

$pid = $_GET['id'];

$sql = "DELETE FROM category WHERE cid = {$pid}";

if(mysqli_query($con, $sql)){
	echo '<div class="alert alert-danger" role="alert">Post Delete Success fully!!!</div>';
	header("Location: category.php");
}else
{
	echo "Post Not Delete!!!";
}
mysqli_close($con);

?>


