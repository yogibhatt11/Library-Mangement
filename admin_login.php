<?php
	include "navbar.php";
	include "connection.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Admin Login</title>
		<link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
	</head>
	<style type="text/css">
          section {
            margin-top: -20px;
            }         
        </style>
	<body>
		<section>
			<div class="login_img">
				<br/><br/><br/>
				<div class="box1">
					<h1 style="text-align: center; font-size: 35px; font-family: Lucida Console;">
						Library Management System</h1><br/>
					<h1 style="text-align: center; font-size: 25px;" >Admin Login Form</h1><br/>
					<form name="Login" action="" method="post" >
						<div class="login">
							<input class="form-control" type="text" name="username" placeholder="username" required=""><br/>
							<input class="form-control" type="password" name="password" placeholder="password" required=""><br/>
							<input class="btn btn-default" type="submit" name="submit" value="Login" style="background-color: white; width: 70px; height: 30px">
						</div>
							<p style="color: white; margin-left: 30px;">
							<br/>
							<a style="color: yellow;" href="update_password.php">Forget Password?</a> <br/>
							New to this website? &nbsp &nbsp &nbsp <a style="color: yellow;" href="registrationn.php">Sign Up</a>
							</p>
						</form>
				           <br/>
				          </div>
				<?php

					if(isset($_POST['submit']))
						{
						$count=0;
						$res=mysqli_query($db,"SELECT * FROM `admin` WHERE username='$_POST[username]' && password='$_POST[password]';");
						$row= mysqli_fetch_assoc($res);
						$count=mysqli_num_rows($res);
						if($count==0)
						{
							?>
							<!--
							<script type="text/javascript">
							alert("The username and password does not match");
							</script>
														-->
							<div class="alert alert-danger" style="width: 378px; margin-left: 570px; margin-top: 10px; color: red;">
								<strong>The username and password does not match</strong>
							</div>
								<?php
							}
							else
							{
								/*-----------------IF uername and password matches------*/
								$_SESSION['login_user']= $_POST['username'];
								$_SESSION['pic']=$row['pic'];
								?>
								<script type="text/javascript">
									window.location="index.php";
								</script>
								<?php
							}
						}
					?>
			</div>
		</section>
	</body>
</html>