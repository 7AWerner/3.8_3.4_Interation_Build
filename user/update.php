<?php
		session_start();
		if(!isset($_SESSION['login_user'])){
			header("location:../index3.php");
				}
		else{
			$User = $_SESSION['login_user'];
		}
?>

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
		<div class="content">
			<div class="section"><!--Hold the main page content -->
				<form method="post" id="update.php">
					<h1 style="font-size:2.5vw;">Update User</h1>
					<?php
						require "../connect.php";
						print "<p class = 'grey'>Connected to server</p>";
									
						if(isset($_POST['Update']))
							{
							$ExistingUserID = $_POST["ExistingUserName"];
							$NewUserID = $_POST["NewUserName"];

							//create a variable to store sql code for the 'Add Users; query
							$updatequery = "UPDATE User_ID SET `User` = '$NewUserID' WHERE `User` = '$ExistingUserID'";
							
							if (mysqli_query($conn,$updatequery))
								{
								echo "<h4>Record update</h4>";
								}
							else
								{
								echo "<h4>Error updating record:</h4>";
								}
							}
					?>
					<div class="info">
						<h4 style="font-size:1.1vw;"><label for = 'login'>Existing User Name:</label>
						<input type="text" name = "ExistingUserName" placeholder = "Enter existing user name"/></h4>
					</div>
					<div class="info">
						<h4 style="font-size:1.1vw;"><label for = 'login'>New User Name:</label>
						<input type="text" name = "NewUserName" placeholder = "Enter new user name"/></h4>
					</div>
					<input type="text" name="Update" value="1" style="display:none;" />
					<h4 style="font-size:0.5vw;"><input class="button" type="submit" value="Submit User"/></h4>
				</form>
				<img class="side" src="../images/sideimg.jpg">
			</div>	
		</div>
</body>


