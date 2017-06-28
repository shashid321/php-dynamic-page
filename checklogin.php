<?php

session_start();

$conn = mysqli_connect("localhost","root","","project");
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = md5(mysqli_real_escape_string($conn, $_POST['password']));

$query = mysqli_query($conn, "SELECT * FROM register WHERE username = '$username'") or die(mysqli_error());
$exists = mysqli_num_rows($query);
echo $exists;
$table_username = "";
$table_password = "";

if($exists > 0)
{
	while($rows = mysqli_fetch_assoc($query))
	{
		$table_username = $rows['username'];
		$table_password = $rows['password'];
	}
	if($username == $table_username && $password == $table_password)
	{
		$_SESSION['user'] = $username;
		header("location:home.php");
	}
	else
	{
		print '<script> alert("Username and Password are incorrect");</script>';
		print '<script> window.location.assign("login.php");</script>';
	}
}
else
{
	print '<script> alert("Incorrect Username ");</script>';
	print '<script> window.location.assign("login.php");</script>';
}

?>