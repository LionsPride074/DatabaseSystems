<?php
	session_start();
?>
<html>
	<head>
		<style>
			header {
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
				height: 5%;
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
			
			header {
				height: 10%;
			}
			
			#main {
				display: flex;
				box-sizing: border-box;
				height: 85%;
				flex-direction: column;
				justify-content: center;
				align-items: center;
			}
			
			header {
				border: 5px double black;
				font-size: 30px;
				background-color: green;
			}
			
			#main, #nav{
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
			
			#head {
				font-size: 2em;
			}
			
			#reviewList {
				overflow-y: auto;
				margin-bottom: 10px;
				height: 70%;
				width: 50%;
			}

			.review {
				margin: 5px;
				border: 1px solid black;
				padding: 5px;
			}
			
			#reviewTitle {
				position: sticky;
				top: 0;
				padding: 5px;
				text-align: center;
				background-color: darkgrey;
				border: 5px solid black;
			}
			
			#userInfo {
				margin-top: 30px;
				margin-bottom: 80px;
			}
			
			.btn:hover {background-color: darkgrey}
		</style>
		<title>User Profile</title>
	</head>
	
	<body>
		<header>User Profile</header>
		<div id = "nav">
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
			<?php
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
				$username = $_SESSION['username'];
				$email = $_SESSION['email'];

				$sql = "SELECT email, username FROM FinalUsers
				WHERE email = '$email' AND username = '$username';";
				
				$result = $conn->query($sql);?>
				
				<?php
					$row = $result->fetch_assoc();
				?>
				<div id = "userInfo">
					<h2>Your profile information</h2>
					<label for = "email">Email: </label>
					<span id = "email"><?=$row['email']?></span><br>
					<label for = "username">Username: </label>
					<span id = "username"><?=$row['username']?></span>
				</div>
				<form action = "finalDelete.php" method = "post">
					<label for = "delete">Delete a Review: </label>
					<input type = "text" id = "delete" name = "delete" placeholder = "Game Title">
					<input type = "submit" id = "submit" value = "Delete"><br>
				</form>
					
				<div id = "reviewList">
					<h3 id = "reviewTitle">Your Reviews</h3>
					<?php
						$sql2 = "SELECT email, title, gameplay, graphics, worldbuilding, comments FROM Reviews
						WHERE email = '$email';";
						
						$result2 = $conn->query($sql2);
					
					while($row2 = $result2->fetch_assoc()) {?>
						<div class = "review">
							<p>Game Title: <?= $row2["title"]?><br>
							Gameplay: <?= $row2["gameplay"]?>/5<br>
							Graphics: <?= $row2["graphics"]?>/5<br>
							Worldbuilding: <?= $row2["worldbuilding"]?>/5<br></p>
							<p>Comments: <?= $row2["comments"]?></p>
						</div>
						<?php }?>
				</div>
					
		</div>
	</body>
</html>