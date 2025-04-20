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
$csrf = $_POST['csrf'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$sql = "SELECT email, username, password FROM FinalUsers WHERE username = '".$username."'";
$result = $conn->query($sql);

if (!$result) {
	die("Error executing query: ($conn->errno) $conn->error");
}
elseif ($result->num_rows == 0) {
	header("Location: https://codd.cs.gsu.edu/~alyon4/finalFailure.html");
	exit();
}
else {
	$row = $result->fetch_assoc();
	
	if ($password == $row['password']) {
		$_SESSION["username"] = $username;
		$_SESSION["email"] = $row["email"];
		$_SESSION["csrf"] = $csrf;
		header("Location: https://codd.cs.gsu.edu/~alyon4/finalHome.php");
		exit();
	}
	else {
		header("Location: https://codd.cs.gsu.edu/~alyon4/finalFailure.html");
		exit();
	}
}
?>