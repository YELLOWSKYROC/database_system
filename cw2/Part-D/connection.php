<?php

$servername = "localhost";
$username = "b91185th";
$password = "b91185th";
// $dbname = "2020_comp10120_y8";

$conn = mysqli_connect($servername, $username, $password);

if(!$conn)
{
	die("failed to connect!".mysqli_connect_error());
}
?>