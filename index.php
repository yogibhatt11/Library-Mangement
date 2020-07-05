<?php
	session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Library Management System</title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style type="text/css">
        	nav
				{
				    float:right;
				    word-spacing: 30px; 
				    padding: 30px;    
				}
				nav li
				{
				    display: inline-block;
				    line-height: 80px;
				}
				nav a{
					color: white ;
				}
				header{
					height: 130px;
					background-color: black;
				}
        </style>
    </head>
    <body>
    	<div class="wrap">
    		
    
	    	<header>
	    		<div class="logo">
	    			<img src="image/image1.png" height= "110px" width="110px">
	    			<h1 style="color: white">ONLINE LIBRARY MANAGEMENT SYSTEM</h1>
	    		</div>
	    		<?php
	    		if(isset($_SESSION['login_user']))
	    		{
	    			?>
		    		<nav>
		    			<ul class="nav navbar-nav">
		    				<li> <a href="index.php">HOME</a></li>
		    				<li><a href="books.php">BOOKS</a></li>
		    				<li> <a href="logout.php">LOGOUT</a></li>
		    				<li> <a href="feedback.php">FEEDBACK</a></li>
		    			</ul>
		    		</nav>
	    		<?php
	    		}
	    		else
	    		{
	    			?>
	    			<nav>
		    			<ul class="nav navbar-nav">
		    				<li> <a href="index.php">HOME</a></li>
		    				<li><a href="books.php">BOOKS</a></li>
		    				<li> <a href="admin_login.php">LOGIN</a></li>
		    				<li> <a href="feedback.php">FEEDBACK</a></li>
		    			</ul>
	    			</nav>
	    		<?php
	    		}
	    		?>

	    		
	    		
	    	</header>
	    	<section>
		    	<div class="sec_img">
		    		<br/><br/>	<br/><br/>
		    		<div class="box">
		    				<br/><br/>	<br/><br/>
		    			<h1 style="text-align: center; font-size: 35px;">Welcome to library</h1><br/>	<br/><br/>
		    			<h1  style="text-align: center;font-size: 25px;">Opens at: 09:00</h1>	<br/>
		    			<h1  style="text-align: center;font-size: 25px;">Closes at: 15:00</h1>
		    		</div>
		    	</div>
	    	</section>
	    	<footer>
	    		<p style="color: white; text-align:center;">
	    			<br/><br/>
	    			Email: &nbsp yogeshchandrabhatt11@gmail.com<br/><br/>
	    			Mobile:&nbsp &nbsp +91-6397382709
	    		</p>
	    	</footer>
        </div>
    </body>
</html>