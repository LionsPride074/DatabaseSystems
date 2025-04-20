<?php
	session_start();
?>
<html>
	<head>
		<style>
			header, footer {
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
			
			header {
				height: 10%;
			}
			
			footer, #nav {
				height: 5%;
			}
			
			#main {
				box-sizing: border-box;
				display: flex;
				flex-direction: column;
				justify-content: center;
				align-items: center;
				height: 80%;
			}
			
			header {
				border: 5px double black;
				font-size: 30px;
				background-color: green;
			}
			
			footer, #main, #nav{
				border: 1px solid black;
				font-size: 20px;
				background-color: lightgray;
			}
			
			.btn {
				text-decoration: none;
				border: 1px solid;
				color: black;
				margin-right: 5px;
				padding: 4px 5px;
			}
			
			.emptyBtn {
				text-decoration: none;
				border: 1px solid;
				color: black;
				margin-right: 5px;
				padding: 4px 5px;
				visibility: hidden;
			}
			
			h1 {
				text-align: center;
			}
			
			.btn:hover {background-color: darkgrey}
		</style>
		<title>This is the home page.</title>
	</head>
	
	<body>
		<header>Welcome to my site!</header>
		<div id = "nav">
			<div id = "empty">
				<a class = "emptyBtn" href = "finalDestroy.php">Logout&nbsp&nbsp&nbsp<?= $_SESSION['username']?></a>
			</div>
			<div id = "flexContainer1">
				<a class = "btn" id = "upcoming" href = "finalUpcoming.php">Upcoming Releases</a>
				<a class = "btn" id = "reviews" href = "finalReviews.php">Reviews</a>
				<a class = "btn" id = "chart" href = "finalPubSearch.php">Game Data</a>
				<a class = "btn" id = "about" href = "finalAbout.php">About</a>
				<?php if(isset($_SESSION['username'])){?>
					<a class = "btn" id = "user" href = "finalUser.php">User Profile</a>
				<?php }?>
			</div>
			<div id = "flexContainer2">
				<?php if(!isset($_SESSION['username'])){?>
					<a class = "btn" id = "login" href = "finalLogin.php">Login</a>
				<?php }?>
				<?php if(isset($_SESSION['username'])){?>
					<div id = "username"><?=$_SESSION['username']?></div>
				<?php }?>
				<?php if(isset($_SESSION['username'])){?>
					<a class = "btn" id = "logout" href = "finalDestroy.php">Logout</a>
				<?php }?>
			</div>
		</div>
		<div id="main">
			<h1>Using the navigation buttons above, you can view upcoming game releases and reviews.</h1>
		</div>
		<footer>Thank you for visiting!</footer>
	</body>
</html>