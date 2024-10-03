<?php 
session_start();
include("connection.php");

$id = $_POST["id"];
$a = $_POST["a"];
$b = $_POST["b"];
$c = $_POST["c"];
$d = $_POST["d"];
$sql = "INSERT INTO Quiz(Quiz_id,Quiz_name,Quiz_author,Quiz_available,Quiz_duration) values ('$id','$a','$b','$c','$d')";
$res = mysqli_query($conn, $sql);

if(is_numeric($id)){
    if($res){
        echo "Good Add!";
    }else{
        echo "Fail Add!";
    }
}else{
    echo "Fail Add! Qiuz_id is number!";
}

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
	<title>Add Quiz</title>
</head>
<body>

    <style type="text/css">

        #button{
            padding: 10px;
            width: 100px;
            color: white;
            background-color: black;
            border: none;
            border-radius: 5px;
            }
    </style>

    <form method="post">
        <h1> Add Quiz </h1>
        <div> 
            <label>Quiz id: <input type="text" name="id"></label>
            <br><br>
            <label>Quiz Name: <input type="text" name="a"></label>
            <br><br>
            <label>Quiz Author: <input type="text" name="b"></label>
            <br><br>
            <label>Quiz Available: <input type="text" name="c"></label>
            <br><br>
            <label>Quiz Duration: <input type="text" name="d"></label>
            <br><br>
            <button id="button" type="submit" name="submit">ADD</button>
            <br><br>
            <a href="index.php">Back</a>
            <br><br>
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
</body>
</html>