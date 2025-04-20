<?php
	session_start();
?>
<html>
	<head>
		<style>
			header, footer, #main {
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
			
			header {
				height: 10%;
			}
			
			footer, #nav {
				height: 5%;
			}
			
			#main {
				flex-direction: column;
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
			
			#chartTitle {
				font-size: 25px;
				font-weight: bold;
			}
			
			#chartSubtitle {
				font-size: 20px;
				font-weight: normal;
				margin-top: -5px;
			}
			
			#chartContainer {
				margin-top: -20px;
			}
			
			#newSearch {
				margin-top: 100px;
			}
			
			#searchlabel {
				font-size: 30px;
				font-weight: bold;
			}
			
			.btn:hover {background-color: darkgrey}
		</style>
		<script type="text/javascript">
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
				
				$sql =  "SELECT v.title, v.Publisher, v.TotalSales, y.Revenue, v.ReleaseYear
						FROM VideoGame v JOIN YearlyRev y ON v.ReleaseYear = y.Year
						WHERE v.title = '$title';";
				
				$result = $conn->query($sql);
				$header = $result->fetch_assoc();
				
				$dataPoints = array(
									array("label"=>"Other", "y"=>($header["Revenue"] - $header["TotalSales"])),
									array("label"=>$header["title"], "y"=>$header["TotalSales"])
									)
				?>
			window.onload = function () {
				var chart = new CanvasJS.Chart("chartContainer",
				{
					legend: {
						maxWidth: 350,
						itemWidth: 120
					},
					backgroundColor: "lightgray",
					data: [
					{
						type: "pie",
						showInLegend: true,
						legendText: "{label} ({y})",
						dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK);?>
					}
					]
				});
				chart.render();
			}
		</script>
		<title>This is the charts page.</title>
	</head>
	
	<body>
		<header>Information lookup.</header>
		<div id = "nav">
			<div id = "empty">
				<a class = "emptyBtn" href = "finalDestroy.php">Logout&nbsp&nbsp&nbsp<?= $_SESSION['username']?></a>
			</div>
			<div id = "flexContainer1">
				<a class = 'btn' id = "home" href = "finalHome.php">Home</a>
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
		<div id = "main">
			<h1 id = "chartTitle">Total Revenue for <?= $header["Publisher"]?> in Release Year of <?= $header["title"]?> (<?= $header["ReleaseYear"]?>)</h1>
			<h2 id = "chartSubtitle">$<?= $header["Revenue"]?></h2> 
			<div id="chartContainer" style="height: 300px; width: 80%;"></div>
			<div id = "newSearch">
				<label for "search" id = "searchlabel">Search for another game</label>
				<form id = "search" action = "finalCharts.php" method = "post">
					<label for = "title">Game Title:</label>
					<input type = "text" id = "title" name = "title"><br>
					<input type = "submit" id = "submit" value = "Search">
				</form>
			</div>
		</div>
		<script src="canvasjs-chart-3.12.10/canvasjs.min.js"></script>
		<footer>Thank you for visiting!</footer>
	</body>
</html>