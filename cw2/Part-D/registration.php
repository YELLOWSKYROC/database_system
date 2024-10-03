<?php 
session_start();
include("connection.php");

$name = $_POST["name"];
$pw = $_POST["pw"];
$position = $_POST["position"];

if($position == "Staff"){
	if (isset($_POST['submit'])){
		if(!empty($name) && !empty($pw) && !is_numeric($name)){
			if ($_POST['pw'] == $_POST['repw']){
				$query = "INSERT INTO Staff (Staff_name, Staff_password) values ('$name','$pw')";
				$result= mysqli_query($conn, $query);

				if($result){
					echo "Good Register!";
				}else{
					echo "Fail Register!";
				}
	
			}else 
			{
				echo "NO equal";
			}
		}
	}
}
if($position == "Student"){
	if (isset($_POST['submit'])){
		if(!empty($name) && !empty($pw) && !is_numeric($name)){
			if ($_POST['pw'] == $_POST['repw']){
				$query = "INSERT INTO Student (Student_name, Student_password) values ('$name','$pw')";
				$result= mysqli_query($conn, $query);
	
				if($result){
					 echo "Good Register!";
				 }else{
					 echo "Fail Register!";
				 }
	
			}else 
			{
				echo "NO equal";
			}
		}
	}
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Sign-up</title>
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
			<div style="font-size: 40px; margin: 10px; color: white;">Register</div>
			<label>Username:<input id="text" type="text" name="name"></label>
			<br><br>
			<label>Password:<input id="text" type="password" name="pw"></label>
			<br><br>
			<label>Password Again:<input id="text" type="password" name="repw"></label>
			<br><br>
			<td>
				<input style= "font-size: 20px;" type= "radio" name="position" value="Staff">
				Staff<br><br>
				<input style= "font-size: 20px;" type= "radio" name="position" value="Student">
				Student<br><br>
			</td>
			<button id="button" type="submit" name="submit"> Register</button>
			<br><br>
			<a href="login.php">Click to Login</a>
			<br><br>
		</form>
	</div>
</body>
</html>