<?php		

		##if((isset($_SESSION['User_ID']) && $_SESSION['User_ID'] == "Graham")){
		##header("location: index4.php");
		##}
		##else{
		##header("location: index.php");
		##}
?>

<head>
	<link rel="stylesheet" href="css/style.css"/> <!--Connects to the CSS -->
<body>
	<header class="page-header">
		<div class = "header">				
			<h1 style="font-size:3vw;">ROK Music</h1>
			<div class="link">
				<ul>
					<li><a href="admin.php" style="font-size:2vw;"><h4>Home</h4></a></li>
					<li><a href="admin2.php" style="font-size:2vw;"><h4>Queries</h4></a></li>
					<li><a href="index4.php" style="font-size:2vw;"><h4>Settings</h4></a></li>
					<li><a href="index3.php" style="font-size:2vw;"><h4>Log Out</h4></a></li>
				</ul>
			</div>
		</div>
	</header>

		<div class = "container">				
		
			<div class = "banner">
			
			</div>
		
			<div class = "section">
				<h1 style="font-size:2vw;">User Settings</h1><hr>
				<div class = "page">
					<ul>
						<li><a href="user/update.php" style="font-size:2vw;"><h4>Update</h4></a></li>
						<li><a href="user/delete.php" style="font-size:2vw;"><h4>Delete</h4></a></li>
						<li><a href="user/show.php" style="font-size:2vw;"><h4>Show User</h4></a></li>
					</ul>						
				</div>
			</div>
		</div>
			<script type="text/javascript" src="js/topup.js"></script>
</body>
