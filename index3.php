<?php

	ob_start();
	session_start();
		$error = NULL;
		if($_SERVER["REQUEST_METHOD"] == "POST") {
			//connect.php (tells where to connect servername, dbaseName, username, password)
			require "connect.php";
			//username and password sent from form
			$myusername = mysqli_real_escape_string($conn,$_POST['username']);
			$mypassword = mysqli_real_escape_string($conn,$_POST['password']);
			
			$query = "SELECT User FROM User_ID WHERE User = '$myusername' and Password = '$mypassword'";
			
			$result = mysqli_query($conn,$query);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
			
			$count = mysqli_num_rows($result);
			
			// if result matched $myusername and $mypassword, table row must be 1 row
			
			if($count == 1 && $_SESSION['index3.php'] = $myusername) {

				if($myusername == "Graeme") {
					$_SESSION['login_user'] = $myusername;
					header("location: index4.php");
				}

				else {
					$_SESSION['login_user'] = $myusername;
					header("location: index.php");
				}
			}

			// if result matched $myusername and $mypassword, table row must be 1 row
			
			else { 
				$error = "ERROR! Your Login Name or Password is invalid";
				}
			}
	ob_end_flush();
?>

<head>
<link rel="stylesheet" href="css/style2.css"/>
</head>
<body>
		<div class = "container">
			<div class = "nav">
				<img src="images/banner.jpg">
				<div style="font-size:3vw;" class="middle"><h1>ROK Music</h1></div>
  			</div>				
	
			<div class="section"><!-- Holds the main page content -->
				<h2 style="font-size:2vw;">Sign In</h2>
				<hr>
					<h2><form method = "post" id = "index3.php">
						<label for = 'login' style="font-size:2vw;">Username:</label>
						<input style="font-size:1vw;" type = "text" name  = "username" placeholder = "Enter username"/><br/>
						<label for = 'login' style="font-size:2vw;">Password:</label>
						<input style="font-size:1vw;" type = "password" name = "password" placeholder = "Enter password"/><br/>
						<button type = "submit" style="float: right;"><h2 style="font-size:1.5vw;">Login In</h2></button>
						<a href="user/add.php" style="float: right;"><h2 style="font-size:1.5vw;">Sign Up</h2></a>
					</form></h2>
					<h3 class = "grey"><?php echo $error; ?></h3>
			</div>					
	</div>
</body>
