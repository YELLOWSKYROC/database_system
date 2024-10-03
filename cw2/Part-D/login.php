<?php 
session_start();
include("connection.php");

$name = $_POST['name'];
$password = $_POST['pw'];
$query1 = "SELECT * from Student where Student_name = '$name' and Student_password = '$password' ";
$result1 = mysqli_query($conn, $query1);
$x = mysqli_fetch_array($result1);
$query2 = "SELECT * from Staff where Staff_name = '$name' and Staff_password = '$password' ";
$result2 = mysqli_query($conn, $query2);
$y = mysqli_fetch_array($result2);

if(!empty($x)){
	$_SESSION['name'] = $_POST['name'];
	header("Location:index.php");
	die;
}
if(!empty($y)){
	$_SESSION['name'] = $_POST['name'];
	header("Location:index.php");
	die;
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 50px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: black;
		border: none;
		border-radius: 5px;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 500px;
		padding: 20px;
		border-radius: 10px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 40px; margin: 10px; color: white;">Login</div>
			<label>Username:<input id="text" type="text" name="name"></label>
			<br><br>
			<label>Password:<input id="text" type="password" name="pw"></label>
			<br><br>
			<button id="button" type="submit" name="submit"> Login </button>
			<br><br>
			<a href="registration.php">Click to Register</a>
			<br><br>
		</form>
	</div>
</body>
</html>