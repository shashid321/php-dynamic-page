<?php
session_start();
if($_SESSION['user']){

}
else{
	header("location :index.php");
}

if($_SERVER['REQUEST_METHOD'] == "GET")
{
	echo $_SESSION['id'];
	$id = $_GET["id"];
	$conn = mysqli_connect("localhost","root","","project");
	mysqli_query($conn, "DELETE FROM reg2 WHERE id ='$id'");
	header("location:home.php");
}

?>