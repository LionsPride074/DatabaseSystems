<?php
	session_start();
	if (!isset($_SESSION['username'])) {
		header("Location: https://codd.cs.gsu.edu/~alyon4/finalStop.html");
		exit();
	}
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
				width: 80%;
				float: left;
				flex-direction: column;
			}
			
			#nav, footer {
				background-color: lightgray;
				border: 1px solid black;
			}
			
			.rdobtn {
				position: relative;
				right: 6px;
				bottom: 3px;
			}
			
			#submit {
				margin-top: 5px;
			}
			
			#newreviewlabel {
				position: relative;
				bottom: 20px;
				font-size: 40px;
			}
			
			#gameplayErr, #graphicsErr, #wbErr, #titleErr {
				visibility: hidden;
				font-size: 0.8em;
				color: red;
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
			
			#newreviewLabel {
				font-size: 2em;
				margin-bottom: 15px;
			}
			
			.btn:hover {background-color: darkgrey}			
			
		</style>
		<title>Review submission page.</title>
	</head>
	<script src = "finalValidate.js" defer></script>
	<body>
		<header>Submit a Review</header>
		<div id="nav">
			<div id = "empty">
				<a class = "emptyBtn" href = "finalDestroy.php">Logout&nbsp&nbsp&nbsp<?= $_SESSION['username']?></a>
			</div>
			<div id = "flexContainer1">
				<a class = 'btn' id = "home" href = "finalHome.php">Home</a>
				<a class = 'btn' id = "upcoming" href = "finalUpcoming.php">Upcoming Releases</a>
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
		<div id="main">
			<div id="asideleft"></div>
			<div id="maincenter">
				<label for = "newreview" id = "newreviewLabel">Submit your review below.</label>
				<form id = "newreview" action = "finalSubmit.php" method = "post">
					<div id = "gametitle">
					<label for = "title">Game Title:</label>
					<input type = "text" id = "title" name = "title">
					<span id = "titleErr">Please input a title.</span>
					</div><br>
					<label id = "gameplay">Gameplay:
						<div id = "gameplayrating">
						<label for = "gameplay1">1</label>
						<input type = "radio" class = "rdobtn" id = "gameplay1" name = "gameplay" value = "1">
						<label for = "gameplay2">2</label>
						<input type = "radio" class = "rdobtn" id = "gameplay2" name = "gameplay" value = "2">
						<label for = "gameplay3">3</label>
						<input type = "radio" class = "rdobtn" id = "gameplay3" name = "gameplay" value = "3">
						<label for = "gameplay4">4</label>
						<input type = "radio" class = "rdobtn" id = "gameplay4" name = "gameplay" value = "4">
						<label for = "gameplay5">5</label>
						<input type = "radio" class = "rdobtn" id = "gameplay5" name = "gameplay" value = "5">
						<span id = "gameplayErr">Please select a rating.</span>
						</div>
					</label><br>
					<label id = "graphics">Graphics:
						<div id = "graphicsrating">
						<label for = "graphics1">1</label>
						<input type = "radio" class = "rdobtn" id = "graphics1" name = "graphics" value = "1">
						<label for = "graphics2">2</label>
						<input type = "radio" class = "rdobtn" id = "graphics2" name = "graphics" value = "2">
						<label for = "graphics3">3</label>
						<input type = "radio" class = "rdobtn" id = "graphics3" name = "graphics" value = "3">
						<label for = "graphics4">4</label>
						<input type = "radio" class = "rdobtn" id = "graphics4" name = "graphics" value = "4">
						<label for = "graphics5">5</label>
						<input type = "radio" class = "rdobtn" id = "graphics5" name = "graphics" value = "5">
						<span id = "graphicsErr">Please select a rating.</span>
						</div>
					</label><br>
					<label id = "wb">Worldbuilding:
						<div id = "wbrating">
						<label for = "worldbuilding1">1</label>
						<input type = "radio" class = "rdobtn" id = "wb1" name = "worldbuilding" value = "1">
						<label for = "worldbuilding2">2</label>
						<input type = "radio" class = "rdobtn" id = "wb2" name = "worldbuilding" value = "2">
						<label for = "worldbuilding3">3</label>
						<input type = "radio" class = "rdobtn" id = "wb3" name = "worldbuilding" value = "3">
						<label for = "worldbuilding4">4</label>
						<input type = "radio" class = "rdobtn" id = "wb4" name = "worldbuilding" value = "4">
						<label for = "worldbuilding5">5</label>
						<input type = "radio" class = "rdobtn" id = "wb5" name = "worldbuilding" value = "5">
						<span id = "wbErr">Please select a rating.</span>
						</div>
					</label><br>
					<label for = "comments">Write your review:</label>
					<div id = "comments">
					<textarea rows = "4" cols = "40" name = "comments"></textarea>
					</div>
					<input type = "submit" id = "submit" value = "Submit">
				</form>
			</div>
			<div id="asideright"></div>
		</div>
		<footer>Thank you for your visit!</footer>
	</body>
</html>