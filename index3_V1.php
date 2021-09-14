<?php
	ob_start();
	session_start();
		$error = NULL;
		if($_SERVER["REQUEST_METHOD"] == "POST") {
			//connect.php (tells where to connect servername, dbaseName, username, password)
			require "../connect.php";
			//username and password sent from form
			$myusername = mysqli_real_escape_string($conn,$_POST['username']);
			$mypassword = mysqli_real_escape_string($conn,$_POST['password']);
			
			$query = "SELECT User FROM User_ID WHERE User = '$myusername' and Password = '$mypassword'";
			
			$result = mysqli_query($conn,$query);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			
			$count = mysqli_num_rows($result);
			
			// if result matched $myusername and $mypassword, table row must be 1 row
			if($count == 1) {
				$_SESSION['login_user'] = $myusername;
				header("location: index.php");
			} else { 
				$error = "ERROR! Your Login Name or Password is invalid";
				}
			}
	ob_end_flush();
?>

<head>
<link rel="stylesheet" href="css/style2.css"/>
</head>
<body>
	<header class="page-header">
		<div class = "header">				
		<h1 style="font-size:3vw;">ROK Music</h1>	

		</div>
	</header>
		<div class = "container">
			<div class = "nav">
				<img src="../images/banner2.jpg">
				<a  class="btn" href="index3.php"><h2 style="font-size:2vw;">Sign Up Today</h2></a>
  			</div>				
	
			<div class="section"><!-- Holds the main page content -->
				<h1 style="font-size:2vw;">Sign In</h1>
				<hr>
					<h1><form method = "post" id = "index3.php">
						<label for = 'login' style="font-size:2vw;">Username:</label>
						<input style="font-size:1vw;" type = "text" name  = "username" placeholder = "Enter username"/><br/>
						<label for = 'login' style="font-size:2vw;">Password:</label>
						<input style="font-size:1vw;" type = "password" name = "password" placeholder = "Enter password"/><br/>
						<button type = "submit" style="float: right;"><h2 style="font-size:1.5vw;">Login In</h2></button>
					</form></h1>
					<h3 class = "grey"><?php echo $error; ?></h3>
			</div>					
	</div>
</body>
