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
$username = $_SESSION['username'];
$title = $_POST['title'];
$gameplay = $_POST['gameplay'];
$graphics = $_POST['graphics'];
$worldbuilding = $_POST['worldbuilding'];
$comments = $_POST['comments'];

$title = str_replace("'", "''", $title);
$comments = str_replace("'", "''", $comments);

$sql = "INSERT INTO Reviews (email, username, title, gameplay, graphics, worldbuilding, comments)
VALUES ('$email', '$username', '$title', '$gameplay', '$graphics', '$worldbuilding', '$comments');";

if ($conn->query($sql) === TRUE) {
	header("Location: https://codd.cs.gsu.edu/~alyon4/finalSubmitSuccess.php");
	exit();
}
else {
	echo "Error submitting review: " . $conn->error;
}
?>