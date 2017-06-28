<?php

session_start();
if($_SESSION['user']){

}
else{
	header("location:index.php");
}

$conn = mysqli_connect("localhost","root","","project");
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$detail = mysqli_real_escape_string($conn, $_POST["details"]);
	$time = strftime("%X");
	$date = strftime("%B %d, %Y");
	$decision = "no";

	foreach($_POST['public'] as $each_check)
	{
		if($each_check != null){
			$decision = "yes";
		}
	}

	mysqli_query($conn, "INSERT INTO reg2 (detail, date_posted, time_posted, public) values('$detail', '$date', '$time', '$decision')");
	header("location:home.php");

}
else{
	header("location:home.php");
}
?>