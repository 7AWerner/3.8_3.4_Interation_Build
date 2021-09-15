<?php
		session_start();
		if(!isset($_SESSION['login_user'])){
				header("location:index3.php");
				}
		else{
			$User = $_SESSION['login_user'];
		}
?>

<head>
	<link rel="stylesheet" href="css/style.css"/>
</head>

<body>
	<div id="stop"></div>
	<header class="page-header">
		<div class = "header">				
		<h1 style="font-size:3vw;">ROK Music</h1>	
			<div class="link">
				<ul>
					<li><a href="index.php" style="font-size:2vw;"><h4>Home</h4></a></li>
					<li><a href="index2.php" style="font-size:2vw;"><h4>Genres</h4></a></li>
					<li><a href="index3.php" style="font-size:2vw;"><h4>Sign In</h4></a></li>
					<li><a href="index4.php" style="font-size:2vw;"><h4>Users</h4></a></li>
				</ul>
			</div>

		</div>
	</header>

	<div class = "container">	
		
		<div class = "section">
				<h1 style="font-size:2vw;">All Our Music</h1>	
				
				<heading1>
					<SongID1><h4>Song ID</h4></SongID1>
					<Title1><h4>Title</h4></Title1>
					<Artist1><h4>Artist</h4></Artist1>
					<Album1><h4>Album</h4></Album1>
					<Genre1><h4>Genre</h4></Genre1>
					<Duration1><h4>Duration</h4></Duration1>
					<Space></Space>
				</heading1>		
				
				<?php
						require "../connect.php";

						//Creates a varible to store the sql query
						$query = ("SELECT s.Song_ID, t.Title, a.Artist, b.Album, e.Genre, s.Duration 
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
					
					<heading>
						<SongID2><p><?php echo $output['Song_ID']; ?></p></SongID2>
						<Title2><p><?php echo $output['Title']; ?></p></Title2>
						<Artist2><p><?php echo $output['Artist']; ?></p></Artist2>
						<Album2><p><?php echo $output['Album']; ?></p></Album2>
						<Genre2><p><?php echo $output['Genre']; ?></p></Genre2>
						<Duration2><p><?php echo $output['Duration']; ?></p></Duration2>
						<Space></Space>
					</heading>
					<?php
					//Closes the output while loop
					}
					?>
			
			<a href="index.php#stop" class="top-link">
				<img src = "../images/top.png">
			</a>
		</div>
	</div>
</body>
