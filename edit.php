<?php
	include "connection.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>EDIT PRofile</title>
	<style type="text/css">
		.form-control
		{
			width: 250px;
			height: 38px;
		}
		.wrapper{
			width: 250px;
			margin: 0 auto;
			color: white;
		}
		.form-control{
			height: 32px;
		}

	</style>
</head>
<body style="background-color: #004528">

	<h2 style="text-align: center; color: #fff;">Edit Info</h2>
	<?php
	$sql ="SELECT * from admin WHERE username='$_SESSION[login_user]'";
	$result = mysqli_query($db,$sql) or die (mysql_error());
	while($row = mysqli_fetch_assoc($result))
	{
		$first=$row['first'];
		$last=$row['last'];
		$username=$row['username'];
		$password=$row['password'];
		$email=$row['email'];
		$contact=$row['contact'];
	}
	?>
	<div class="profile_info" style="text-align: center;">
		<span style="color: white;">WELCOME,</span>
		<h5 style="color: white;"><?php echo $_SESSION['login_user'] ?></h5>		
	</div><br>
	<div class="wrapper">
	<form action="" method="post" enctype="multipart/form-data">
		<input class="form-control" type="file" name="file">
		<label><h5><b>First Name</b></h5></label>
		<input class="form-control" type="text" name="first" value="<?php echo $first ;?>">
		<label><h5><b>Last Name</b></h5></label>
		<input class="form-control" type="text" name="last" value="<?php echo $last ;?>">
		<label><h5><b>Username</b></h5></label>
		<input class="form-control" type="text" name="username" value="<?php echo $username;?>">
		<label><h5><b>Password</b></h5></label>
		<input class="form-control" type="text" name="password" value="<?php echo $password;?>">
		<label><h5><b>E-mail</b></h5></label>
		<input class="form-control" type="text" name="email" value="<?php echo $email;?>">
		<label><h5><b>Contact</b></h5></label>		
		<input class="form-control" type="text" name="contact" value="<?php echo $contact;?>"><br>	
		<div style="padding-left: 100px;"><button class="btn btn-default" type="submit" name="submit">SAVE</button></div>
	</form>
</div>
	<?php
		if(isset($_POST['submit']))
		{
			move_uploaded_file($_FILES['file']['tmp_name'],"image/".$_FILES['file']['name']);

			$first=$_POST['first'];
			$last=$_POST['last'];
			$username=$_POST['username'];
			$password=$_POST['password'];
			$email=$_POST['email'];
			$contact=$_POST['contact'];
			$pic=$_FILES['file']['name'];
			$sql1 = "UPDATE admin SET pic='$pic', first='$first', last='$last', username='$username', password='$password', email='$email', contact='$contact' WHERE username='".$_SESSION['login_user']."';";
			if(mysqli_query($db,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("SAved Successfully");
						window.location="profile.php";
					</script>
				<?php
			}
		}	
	?>
</body>
</html>