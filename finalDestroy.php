<?php
	session_start();
	session_unset();
	session_destroy();
	header("Location: https://codd.cs.gsu.edu/~alyon4/finalHome.php");
?>