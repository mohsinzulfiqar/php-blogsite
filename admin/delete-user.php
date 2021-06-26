<?php
require "../dp.php";
if($_SESSION['role'] == '0'){ 
header("Location:post.php");}
$userid = $_GET['id'];

$sql = "DELETE FROM users WHERE uid={$userid}";
if(mysqli_query($con, $sql)){
	echo '<div class="alert alert-danger" role="alert">User Delete Success fully!!!</div>';
	header("Location: users.php");
}else
{
	echo "User Not Delete!!!";
}
mysqli_close($con);

?>