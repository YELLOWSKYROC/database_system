<?php 
session_start();
include("connection.php");
mysqli_query($conn, "set names utf8");
$id = $_POST["id"];

if($_POST["Submit"]){
    $sql1= "DELETE FROM `Quiz` WHERE `Quiz`.`Quiz_id` = $id";
    $sql3= "DELETE FROM `Answer` WHERE `Answer`.`Quiz_id` = $id";

    $res1= mysqli_query($conn, $sql1);
    $res3= mysqli_query($conn, $sql3);

    if(is_numeric($id)){
        if($res1 && $res3){
            echo "Good Delete!";
        }else{
            echo "Fail Delete!";
        }
    }else{
        echo "Fail Delete! ID need number!";
    }
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
	<title>Delete Quiz</title>
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
        <h1> Delete Quiz </h1>
        <div> 
            <label>Quiz id:<input type="text" name="id"></label>
            <br><br>
            <input id="button" type="submit" name="Submit"/>
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