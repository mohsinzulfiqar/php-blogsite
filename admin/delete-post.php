<?php
require "../dp.php";

$pid = $_GET['id'];
$cid = $_GET['catid'];

$sql1 = "SELECT * FROM post WHERE id={$pid}";
$result = mysqli_query($con, $sql1) or die("picture delete query not run");
$row = mysqli_fetch_assoc($result);
unlink("upload/".$row['ppic']);

$sql = "DELETE FROM post WHERE id={$pid};";
$sql .= "UPDATE category SET post = post-1 WHERE cid ={$cid}";
if(mysqli_multi_query($con, $sql)){
	echo '<div class="alert alert-danger" role="alert">Post Delete Success fully!!!</div>';
	header("Location: post.php");
}else
{
	echo "Post Not Delete!!!";
}
mysqli_close($con);

?>
?>