<?php

$servername="localhost";
$dbusername="root";
$dbpassword="";
$dbname="library";

$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
if ($conn->connect_error)
{
	die("Connection failed: " . $conn->connect_error);
}