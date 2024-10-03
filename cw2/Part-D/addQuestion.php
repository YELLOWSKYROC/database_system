<?php 
session_start();
include("connection.php");

$id = $_POST["id"];
$a = $_POST["a"];
$b = $_POST["b"];
$c = $_POST["c"];
$d = $_POST["d"];
$e = $_POST["e"];

$sql1 = "INSERT INTO Question(Quiz_id,Question_id,Questions) values ('$id','$a','$b')";
$sql2 = "INSERT INTO Answer(Quiz_id,Question_id,Options,Answer,Score) values ('$id','$a','$c','$d','$e')";

$res1 = mysqli_query($conn, $sql1);
$res2 = mysqli_query($conn, $sql2);

if($res1 && $res2){
    echo "Good Add!";
}else{
    echo "Fail Add!";
}

$sql="select * from `Answer`";
$val = mysqli_query($conn, $sql);
$info = mysqli_fetch_array($val);
if($info==false){
    echo "NO information";
}

$sqlp="select * from `Question`";
$valp = mysqli_query($conn, $sqlp);
$infop = mysqli_fetch_array($valp);
if($infop==false){
    echo "NO information";
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Question</title>
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
        <h1> Add Question </h1>
        <div> 
            <label>Quiz id: <input type="text" name="id"></label>
            <br><br>
            <label>Question id: <input type="text" name="a"></label>
            <br><br>
            <label>Question <input type="text" name="b"></label>
            <br><br>
            <label>Option: <input type="text" name="c"></label>
            <br><br>
            <label>Answer: <input type="text" name="d"></label>
            <br><br>
            <label>Score: <input type="text" name="e"></label>
            <br><br>
            <button id="button" type="submit" name="submit">ADD</button>
            <br><br>
            <a href="index.php">Back</a>
            <br><br>
        </div>
        <table>
                <tr>
                    <th>Quiz id</th>
                    <th>Question_id</th>
                    <th>Options</th>
                    <th>Answer</th>
                    <th>Score</th>
                </tr>
            <?php
                do{
            ?>
                    <tr>
                        <td><?php echo $info['Quiz_id']; ?></td>
                        <td><?php echo $info['Question_id']; ?></td>
                        <td><?php echo $info['Options']; ?></td>
                        <td><?php echo $info['Answer']; ?></td>
                        <td><?php echo $info['Score']; ?></td>
                    </tr>
            <?php
                }while($info=mysqli_fetch_array($val));
            ?>
            </table>
            <br>
            <div>
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
                        <td><?php echo $infop['Quiz_id']; ?></td>
                        <td><?php echo $infop['Question_id']; ?></td>
                        <td><?php echo $infop['Questions']; ?></td>
                    </tr>
            <?php
                }while($infop=mysqli_fetch_array($valp));
                mysqli_close($conn);
            ?>
            </table>
            </div>
    </form>
</body>
</html>