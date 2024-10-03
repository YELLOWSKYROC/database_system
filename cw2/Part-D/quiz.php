<?php 
session_start();
include("connection.php");
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
	<title>Quiz</title>
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
        <h1> Quiz </h1>
        <div> 
            <table border:1>
                <tr>
                    <th>Quiz id</th>
                    <th>Quiz Name</th>
                    <th>Quiz Author </th>
                    <th>Quiz Available</th>
                    <th>Quiz Duration</th>
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
            <a href="index.php">Back</a>
        </div>
    </form>
</body>
</html>