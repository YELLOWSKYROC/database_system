<?php 
session_start();
include("connection.php");
mysqli_query($conn, "set names utf8");
$id = $_POST["id"];
$qid = $_POST["qid"];

if($_POST["Submit"]){
    $sql1= "DELETE FROM `Question` WHERE `Question`.`Quiz_id` = $id AND `Question`.`Question_id` = $qid";
    
    $res= mysqli_query($conn, $sql1);

    if($res){
        echo "Good Delete!";
    } else {
        echo "Fail Delete!";
    }
}

$sql="select * from `Question`";
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
        <h1> Delete Question </h1>
        <div> 
            <label>Quiz id:<input type="text" name="id"></label>
            <label>Question id:<input type="text" name="qid"></label>
            <br><br>
            <input id="button" type="submit" name="Submit"/>
            <br><br>
            <a href="index.php">Back</a>
            <br><br>
            <table>
                <tr>
                    <th>Quiz id</th>
                    <th>Question id</th>
                    <th>Questions</th>
                </tr>
            <?php
                do{
            ?>
                    <tr>
                        <td><?php echo $info['Quiz_id']; ?></td>
                        <td><?php echo $info['Question_id']; ?></td>
                        <td><?php echo $info['Questions']; ?></td>
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