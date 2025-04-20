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
			
			#main {
				box-sizing: border-box;
				display: flex;
				justify-content: left;
				overflow: auto;
				white-space: nowrap;
				height: 60%;
				border-bottom: 1px solid black;
				padding-right: 10px;
				padding-left: 10px;
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
				font-size: 1.4em;
			}
			
			.emptyBtn {
				text-decoration: none;
				border: 1px solid;
				color: black;
				margin-right: 5px;
				padding: 4px 5px;
				visibility: hidden;
			}
			
			#nav, #main {
				border-left: 1px solid black;
				border-right: 1px solid black;
				background-color: lightgrey;
			}
			
			.upcoming {
				display: flex;
				flex-direction: column;
				margin: 5px;
				width: 200px;
			}
			
			.title {
				text-wrap: wrap;
				margin-bottom: 7px;
			}
			
			header {
				height: 10%;
			}
			
			footer, #nav {
				height: 5%;
			}
			
			header {
				border: 5px double black;
				font-size: 30px;
				background-color: green;
			}
			
			footer {
				border: 1px solid black;
				font-size: 20px;
				background-color: lightgray;
			}
			
			#space {
				border-left: 1px solid black;
				border-right: 1px solid black;
				height: 20%;
				background-color: lightgray;
				border-top: 1px solid black;
			}
			
			.btn {
				text-decoration: none;
				border: 1px solid;
				color: black;
				margin-right: 5px;
				padding: 4px 5px;
				font-size: 1.4em;
			}
			
			.btn:hover {background-color: darkgrey}
		</style>
		<title>Upcoming Releases.</title>
	</head>
	
	<body>
		<header>Upcoming Releases</header>
		<div id = "nav">
		    <div id = "empty">
				<a class = "emptyBtn" href = "finalDestroy.php">Logout&nbsp&nbsp&nbsp<?= $_SESSION['username']?></a>
			</div>
			<div id = "flexContainer1">
				<a class = 'btn' id = "home" href = "finalHome.php">Home</a>
				<a class = "btn" id = "reviews" href = "finalReviews.php">Reviews</a>
				<a class = "btn" id = "chart" href = "finalPubSearch.php">Game Data</a>
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
		<div id = "space"></div>
		<div id="main">
			<div class = "upcoming">
				<img src = "Like_a_Dragon_Pirate_Yakuza_in_Hawaii_Cover_Art.jpg" alt = "Video game" width = "200" height = "200">
				<div class = "title">Like a Dragon: Pirate Yakuza in Hawaii</div>
				<div class = "date">21 Feb 2025</div>
			</div>
			<div class = "upcoming">
				<img src = "Ninja Five-O.webp" alt = "Video game" width = "200" height = "200">
				<div class = "title">Ninja Five-O</div>
				<div class = "date">25 Feb 2025</div>
			</div>
			<div class = "upcoming">
				<img src = "Monster Hunter Wilds.webp" alt = "Video game" width = "200" height = "200">
				<div class = "title">Monster Hunter: Wilds</div>
				<div class = "date">28 Feb 2025</div>
			</div>
			<div class = "upcoming">
				<img src = "Dragonkin.avif" alt = "Video game" width = "200" height = "200">
				<div class = "title">Dragonkin: The Banished</div>
				<div class = "date">6 Mar 2025</div>
			</div>
			<div class = "upcoming">
				<img src = "Rise of the Ronin.avif" alt = "Video game" width = "200" height = "200">
				<div class = "title">Rise of the Ronin</div>
				<div class = "date">11 Mar 2025</div>
			</div>
			<div class = "upcoming">
				<img src = "Bionic Bay.jpg" alt = "Video game" width = "200" height = "200">
				<div class = "title">Bionic Bay</div>
				<div class = "date">13 Mar 2025</div>
			</div>
			<div class = "upcoming">
				<img src = "Assassins Creed Shadows.webp" alt = "Video game" width = "200" height = "200">
				<div class = "title">Assassin's Creed: Shadows</div>
				<div class = "date">20 Mar 2025</div>
			</div>
		</div>
		<footer>Thank you for visiting!</footer>
	</body>
</html>