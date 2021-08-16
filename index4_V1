<?php		

		##if((isset($_SESSION['User_ID']) && $_SESSION['User_ID'] == "Graham")){
		##header("location: index4.php");
		##}
		##else{
		##header("location: index.php");
		##}
?>

<head>
	<link rel="stylesheet" href="css/styleQ.css"/> <!--Connects to the CSS -->
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
		<div class="section"><!--Hold the main page content -->
				<form method="post" id="update.php">
					<h1>Update User</h1>
					<?php
						require "connect.php";
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
					<h4 style="font-size:0.5vw;"><input class="button" type="submit"/></h4>
				</form>
			</div>
			<div class="section2">
				<form method = "post" id = "delete.php">
					<h1>Delete User</h1>
					<?php
						require "connect.php";
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
					
					<div class="info">
						<h4><label for = 'login'>User Name:</label>
						<input type="text" name = "UserName" placeholder="Enter user name"/></h4>
					</div>
					
					<h4><input type="submit" value="Delete" class="button" name="Delete" onclick="return confirm('Are you sure you want to delete this user?');"/><br></h4>
				</form>	
			</div>
		</div>
</body>
