<?php
	session_start();
?>
<html>
	<head>
		<style>
			header, #main {
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
				height: 85%;
				flex-direction: column;
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
			
			#userbtn {
				float: right;
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
				
			
			.btn:hover {background-color: darkgrey}
		</style>
		<title>Reviews Found</title>
	</head>
	
	<body>
		<header>Reviews Found</header>
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
				$title = $_POST['title'];

				$sql = "SELECT username, title, gameplay, graphics, worldbuilding, comments from Reviews
				WHERE title = '$title';";
				
				$result = $conn->query($sql);
				
				if ($result->num_rows == 0) {?>
					<div>No Reviews found. Click <a href = "https://codd.cs.gsu.edu/~alyon4/finalReviews.php">here</a> to search again.</div>
			<?php }
				else {
					$header = $result->fetch_assoc();?>
					<h1 id = "head">Reviews for: <?= $header["title"]?></h1>
					<div id = "reviewList">
						<div class = "review">
						<p>Author of Review: <?= $header["username"]?><br>
							Gameplay: <?= $header["gameplay"]?>/5<br>
							Graphics: <?= $header["graphics"]?>/5<br>
							Worldbuilding: <?= $header["worldbuilding"]?>/5<br></p>
						<p>Comments: <?= $header["comments"]?></p></div>
						<!--Add section for publisher revenue and game total sales as
						% revenue-->
					<?php while($row = $result->fetch_assoc()) {?>
						<div class = "review">
							<p>Author of Review: <?= $row["username"]?><br>
							Gameplay: <?= $row["gameplay"]?>/5<br>
							Graphics: <?= $row["graphics"]?>/5<br>
							Worldbuilding: <?= $row["worldbuilding"]?>/5<br></p>
							<p>Comments: <?= $row["comments"]?></p></div>
					<?php }?></div><?php
				}?>
		</div>
	</body>
</html>