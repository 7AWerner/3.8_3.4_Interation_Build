<head>
	<link rel="stylesheet" href="../css/styleQ.css"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	<header>
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

	<div class = "content">
		<div class = "section">
				<form method="post" id="add.php">
					<h1>Add User</h1>
					<?php
						//connect.php (tells where to connect severname, username, password, dbaseName)
						require "../connect.php";
						print "<p class = 'grey'>Connected to server</p>";

						if(isset($_POST['Add']))
							{
							$UserID = $_POST['username'];
							$PW = $_POST['password'];

							// create a variable to store sql code for the 'Add Users' query
							$insertquery = "INSERT INTO User_ID(User, Password) VALUES( '$UserID', '$PW' )";

							if (mysqli_query($conn,$insertquery))
								{
								echo "<p class = 'grey'>Record inserted:</p>";
								}
							else
								{
							echo "<p class = 'grey'>Error inserting record:</p>";
								}
							}
					?>
					<div class="info">
						<h4><Label for = 'login'>Username:</Label>
						<input type ="text" name= "username" placeholder = "Enter user name"/></h4>
					</div>
					<div class="info">
						<h4><label for = 'login'>Password:</label>
						<input type = "password" name="password" placeholder = "Enter user password"/></h4><br>
					</div>
					<h4><input type="submit" value="Insert" name="Add" class="button" onclick="return confirm('Are you sure you want to add this user?');"/></h4><br>
				</form>
			<img class="side" src="../images/sideimg2.jpg">
		</div>
	</div>
</body>
