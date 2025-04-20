<?php
	session_start();
?>
<html>
	<head>
		<style>
			#main {
				height: 80%;
				border: 1px solid black;
				background-color: lightgray;
			}
			
			header, footer, #main, #asideleft, #asideright, #maincenter {
				box-sizing: border-box;
				display: flex;
				justify-content: center;
				align-items: center;
			}
			
			#nav {
				box-sizing: border-box;
				display: flex;
				align-items: center;
				justify-content: space-between;
			}
			
			#flexContainer1 {
				display: flex;
				align-items: center;
				justify-content: center;
			}
			
			#flexContainer2 {
				display: flex;
				alight-items: center;
				justify-content: flex-end;
			}
			
			#username {
				margin-right: 10px;
				margin-top: 5px;
			}
			
			.emptyBtn {
				text-decoration: none;
				border: 1px solid;
				color: black;
				margin-right: 5px;
				padding: 4px 5px;
				visibility: hidden;
			}
			
			#asideleft, #asideright, #maincenter {
				height: 100%;
				font-size: 1.5em;
			}
			
			#nav, footer {
				height 10%;
				font-size: 1.5em;
			}
			
			header {
				height: 10%;
				border: 5px double black;
				font-size: 30px;
				background-color: green;
			}
			
			#asideleft {
				width: 10%;
				float: left;
				border-right: 1px solid black;
			}
			
			#asideright {
				width: 10%;
				float: right;
				border-left: 1px solid black;
			}
			
			#maincenter {
				float: left;
				flex-direction: column;
			}
			
			#nav, footer {
				background-color: lightgray;
				border: 1px solid black;
			}
			
			#submit {
				margin-top: 5px;
			}
			
			#searchlabel {
				font-size: 30px;
				font-weight: bold;
				margin-bottom: 7px;
			}
			
			#submit {
				margin-bottom: 70px;
			}
			
			h3 {
				margin-bottom: -20px;
			}
			
			.btn {
				text-decoration: none;
				border: 1px solid;
				color: black;
				margin-right: 5px;
				padding: 4px 5px;
				margin-top: 2px;
				margin-bottom: 2px;
			}
			
			#mainP {
				font-size: 35px;
				font-weight: bold;
				margin-bottom: 100px;
			}
			
			.btn:hover {background-color: darkgrey}			
			
		</style>
		<title>Reviews page.</title>
	</head>
	
	<body>
		<header>Revenue Search Page</header>
		<div id="nav">
			<div id = "empty">
				<a class = "emptyBtn" href = "finalDestroy.php">Logout&nbsp&nbsp&nbsp<?= $_SESSION['username']?></a>
			</div>
			<div id = "flexContainer1">
				<a class = 'btn' id = "home" href = "finalHome.php">Home</a>
				<a class = 'btn' id = "upcoming" href = "finalUpcoming.php">Upcoming Releases</a>
				<a class = "btn" id = "about" href = "finalAbout.php">About</a>
				<?php if(isset($_SESSION['username'])){?>
					<a class = "btn" id = "user" href = "finalUser.php">User Profile</a>
				<?php }?>
			</div>
			<div id = "flexContainer2">
				<?php if(!isset($_SESSION['username'])){?>
					<a class = "btn" id = "login" href = "finalLogin.html">Login</a>
				<?php }?>
				<?php if(isset($_SESSION['username'])){?>
					<div id = "username"><?= $_SESSION['username']?></div>
				<?php }?>
				<?php if(isset($_SESSION['username'])){?>
					<a class = "btn" id = "logout" href = "finalDestroy.php">Logout</a>
				<?php }?>
			</div>
		</div>
		<div id="main">
			<div id="maincenter">
				<p id = "mainP">Look up a game's release year sales as a part of the publisher's revenue.</p>
				<label for "search" id = "searchlabel">Enter a game</label>
				<form id = "search" action = "finalCharts.php" method = "post">
					<label for = "title">Game Title:</label>
					<input type = "text" id = "title" name = "title"><br>
					<input type = "submit" id = "submit" value = "Search">
				</form>
			</div>
		</div>
		<footer>Thank you for your visit!</footer>
	</body>
</html>