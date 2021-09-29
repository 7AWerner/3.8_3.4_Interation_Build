<?php
		//This insures that the user has to sing in before gaining access to all the content.
		session_start();
		if(!isset($_SESSION['login_user'])){
				header("location:index3.php");
				}
		else{
			$User = $_SESSION['login_user'];
		}
?>

<head>
	<!--This connects the page to  the css-->
	<link rel="stylesheet" href="css/style.css"/>
	<title>ROK Music</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	<header class="page-header">
		<div class = "header">				
		<h1 style="font-size:3vw;">ROK Music</h1>	
			<!--This is the nav that links to other pages-->
			<div class="link">
				<ul>
					<!--The font-size:2vw; allows the text to auto adjust to the size of the page-->
					<li><a href="admin.php" style="font-size:2vw;"><h4>Home</h4></a></li>
					<li><a href="admin2.php" style="font-size:2vw;"><h4>Queries</h4></a></li>
					<li><a style="font-size:2vw;"><h4>Settings</h4></a>
						<ul>
							<li><a href="user/delete.php">Delete User</a></li>
							<li><a href="user/update.php">Update User</a></li>
							<li><a href="user/logadd.php">Add User</a></li>
						</ul>
					</li>
					<li><a href="index3.php" style="font-size:2vw;"><h4>Log Out</h4></a></li>
					<!--<li><a href="index3.php" style="font-size:2vw;"></a><img src = "images/logout.png"></li>-->
					
				</ul>
			</div>
		</div>
	</header>

	<div class = "container">		
		<div class = "section">
			<div id="stop"></div>
				<h1 style="font-size:2vw;">All Of Graeme's Music</h1>	
				
				<!--The titles of the content-->
				<heading1 style="font-size:1.5vw;">
					<SongID1><h4>No.</h4></SongID1>
					<Title1><h4>Title</h4></Title1>
					<Artist1><h4>Artist</h4></Artist1>
					<Album1><h4>Album</h4></Album1>
					<Genre1><h4>Genre</h4></Genre1>
					<Duration1><h4>Duration</h4></Duration1>
					<Space></Space>
				</heading1>		
				<hr>
				<?php
						//Connects this page with my database on PHPMyAdmin
						require "connect.php";

						//Creates a varible to store the sql query
						$query = ("SELECT s.Song_ID, t.Title, a.Artist, b.Album, e.Genre, SEC_TO_TIME((`Duration`)) AS Duration  
						FROM SongDetails s

						JOIN SongArtist j ON s.Song_ID = j.Song_ID
						JOIN Artist_ID a ON a.Artist_ID = j.Artist_ID

						JOIN SongGenre g ON s.Song_ID = g.Song_ID
						JOIN Genre_ID e ON e.Genre_ID = g.Genre_ID

						JOIN Title_ID t ON s.Title_ID = t.Title_ID
						JOIN Album_ID b ON s.Album_ID = b.Album_ID

						ORDER BY s.Song_ID ASC");

						//Runs and stores the query using the varibles $con (see nav.php) and $query
						$result = mysqli_query($conn,$query);
						//runs in a 'while' loop
						while($output=mysqli_fetch_array($result))
						{
					?>
					<!--php is above. HTML is below. Used to output the query results-->
						
					<heading style="font-size:1.1vw;">
						<SongID2><p><?php echo $output['Song_ID']; ?></p></SongID2>
						<Title2><div><p style= "border-right: 0.1vw solid grey;"><?php echo $output['Title']; ?></p></div></Title2>
						<Artist2><p><?php echo $output['Artist']; ?></p></Artist2>
						<Album2><p><?php echo $output['Album']; ?></p></Album2>
						<Genre2><p><?php echo $output['Genre']; ?></p></Genre2>
						<Duration2><p><?php echo $output['Duration']; ?></p></Duration2>
					</heading>
					
					<?php
					//Closes the output while loop
					}
					?>
			<!--To top button that quickly takes the user to the top of the page-->
			<a href="admin.php#stop" class="top-link">
				<img src = "images/top.png">
			</a>
		</div>
	</div>
</body>
