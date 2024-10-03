<?php 
include("connection.php");
session_start();

$sql="select * from `Quiz`";
$val = mysqli_query($conn, $sql);
$info = mysqli_fetch_array($val);
if($info==false){
    echo "NO information";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
</head>
<body>

	<style type="text/css">
	#button{

		padding: 20px;
		width: 150px;
		color: white;
		background-color: black;
		border: none;
		border-radius: 5px;
		text-align: center;
	}
	</style>

	<div>
		<form method="post">
			<a  href="logout.php">Logout</a>
			<h1 > Hello! <?php echo $_SESSION["name"] ?>! </h1>
			<h3 > Start your own Quiz! </h3>
			<div >
			<button onclick="location.href='addQuiz.php'" type="button" id="button" name="submit"> Add Quiz </button>
			<button onclick="location.href='delectQuiz.php'" type="button" id="button" name="submit"> Delete Quiz </button>
			<button onclick="location.href='selectQuiz.php'" type="button" id="button" name="submit"> Select Quiz </button><br><br>
			<button onclick="location.href='addQuestion.php'" type="button" id="button" name="submit"> Add Question </button>
			<button onclick="location.href='delectQuestion.php'" type="button" id="button" name="submit"> Delete Question </button><br><br>
			<button onclick="location.href='view.php'" type="button" id="button" name="submit"> View </button><br><br>
			<table>
                <tr>
                    <th>Quiz id</th><th>Quiz Name</th><th>Quiz Author </th><th>Quiz Available</th><th>Quiz Duration</th>
                </tr>
            <?php
                do{
            ?>
                    <tr>
                        <td><?php echo $info['Quiz_id']; ?></td>
                        <td><?php echo $info['Quiz_name']; ?></td>
                        <td><?php echo $info['Quiz_author']; ?></td>
                        <td><?php echo $info['Quiz_available']; ?></td>
                        <td><?php echo $info['Quiz_duration']; ?></td>
                    </tr>
            <?php
                }while($info=mysqli_fetch_array($val));
                mysqli_close($conn);
            ?>
            </table>
			</div>
		</form>
	</div>
</body>
</html>