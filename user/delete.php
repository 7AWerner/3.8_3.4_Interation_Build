<head>
	<link rel="stylesheet" href="../css/styleQ.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<header class="page-header">
		<div class = "header">				
		<h1 style="font-size:3vw;">ROK Music</h1>	
			<div class="link">
				<ul>
					<!--The font-size:2vw; allows the text to auto adjust to the size of the page-->
					<li><a href="../admin.php" style="font-size:2vw;"><h4>Home</h4></a></li>
					<li><a href="../admin2.php" style="font-size:2vw;"><h4>Queries</h4></a></li>
					<li><a style="font-size:2vw;"><h4>Settings</h4></a>
						<ul>
							<li><a href="delete.php">Delete User</a></li>
							<li><a href="update.php">Update User</a></li>
							<li><a href="logadd.php">Add User</a></li>
						</ul>
					</li>
					<li><a href="../index3.php" style="font-size:2vw;"><h4>Log Out</h4></a></li>
				</ul>
			</div>
		</div>
	</header>
		<div class="content"><!-- Holds the main page content -->
			<div class="section3">
				<form method = "post" id = "delete.php">
					<h4><label for = 'login'>User Name:</label>
					<input type="text" name = "UserName" placeholder="Enter user name"/></h4>
					<h4><input type="submit" value="Delete" name="Delete" onclick="return confirm('Are you sure you want to delete this user?');"/><br></h4>
				</form>
					<?php
						require "../connect.php";
						print "<p class = 'grey'>Connected to server</p>";
						
						if(isset($_POST['Delete']))
							{
							$UserID = $_POST['UserName'];

							//create a varible to store sql code for the 'Add Users' query
							$deletequery = "DELETE FROM User_ID WHERE User = '$UserID'";

							if (mysqli_query($conn,$deletequery))
								{
								echo "<h3>Record deleted</h3> ";
								}
							else
								{
								echo "<h3>Error deleting record:</h3> ";
								}
							}
					?>	
			</div>
		</div>
			<script type="text/javascript" src="../js/topup.js"></script>
</body>



