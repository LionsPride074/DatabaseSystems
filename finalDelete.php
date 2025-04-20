<?php
session_start();

$host = "localhost";
$user = "alyon4";
$pass = "alyon4";
$dbname = "alyon4";

//Create connection
$conn = new mysqli($host,$user,$pass,$dbname);
//Check connection
if($conn->connect_error)
{
	echo "Could not connect to server\n";
	die("Connection failed: ". $conn->connect_error);
}

$email = $_SESSION['email'];
$title = $_POST['delete'];
$sql = "DELETE FROM Reviews WHERE email = '$email' AND title = '$title'";
$result = $conn->query($sql);

if (!$result) {
	die("Error executing query: ($conn->errno) $conn->error");
}
else {
	header("Location: https://codd.cs.gsu.edu/~alyon4/finalUser.php");
	exit();
}
?>