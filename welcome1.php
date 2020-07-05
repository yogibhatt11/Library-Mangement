WELCOME
<?php
echo $_POST["username"];
echo $_POST["password"];
echo $_POST["first"];
echo $_POST["last"];
echo $_POST["contact"];
echo $_POST["email"];
?>
<?php
	include "connection.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Approve Request</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		.srch{
			padding-left: 1000px;
		}
		header{
			height: 55px;
		}
		body {
		  font-family: "Lato", sans-serif;
		  transition: background-color .5s;
		  background-image: url("image/book2.jpg");
		 
		}

		.sidenav {
		  height: 100%;
		  margin-top: 50px;
		  width: 0;
		  position: fixed;
		  z-index: 1;
		  top: 0;
		  left: 0;
		  background-color: #333;
		  overflow-x: hidden;
		  transition: 0.5s;
		  padding-top: 60px;
		}

		.sidenav a {
		  padding: 8px 8px 8px 32px;
		  text-decoration: none;
		  font-size: 25px;
		  color: #818181;
		  display: block;
		  transition: 0.3s;
		}

		.sidenav a:hover {
		  color: #f1f1f1;
		}

		.sidenav .closebtn {
		  position: absolute;
		  top: 0;
		  right: 25px;
		  font-size: 36px;
		  margin-left: 50px;
		}

		#main {
		  transition: margin-left .5s;
		  padding: 16px;
		}

		@media screen and (max-height: 450px) {
		  .sidenav {padding-top: 15px;}
		  .sidenav a {font-size: 18px;}
		}
		.h:hover{
			color: white;
			width:300px;
			height:50px;
			background-color:#00544c;
		}
		.container{
			height: 600px;
			background-color: black;
			opacity: .8;
			color: white;
		}
		.srch{
			padding-left: 850px;
		}
		.form-control{
			width: 300px;
			height: 40px;
			background-color: black;
		}
		.approve{
			margin-left: 420px;
		}
	</style>
</head>
<body>
	<!--------------Side NAV--------->
	<div id="mySidenav" class="sidenav">
  		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  		<div style="color: white; margin-left: 80px;">
            <?php
	            if(isset($_SESSION['login_user']))
		        {
	                 echo "<img class='img-circle profile_img' height=100 width=100 src='image/".$_SESSION['pic']." '>";
	                 echo "</br>";
	                 echo "Welcome  ". $_SESSION['login_user'];
	            }        
            ?>
        </div>
  		<br><br>
		<div class="h">   <a href="books.php">Books</a>  </div>
		<div class="h">  <a href="request.php">Book Request</a>  </div>
		<div class="h">  <a href="issue_info.php">Issue Information</a>  </div>
	</div>

	<div id="main">
 		<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;Open</span>
		<script>
			function openNav() {
			  document.getElementById("mySidenav").style.width = "300px";
			  document.getElementById("main").style.marginLeft = "300px";
			  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
			}

			function closeNav() {
			  document.getElementById("mySidenav").style.width = "0";
			  document.getElementById("main").style.marginLeft= "0";
			  document.body.style.backgroundColor = "white";
			}
		</script>
		<div class="container">
			<br><br><h3 style="text-align: center;">Approve Request</h3><br><br>
			<form class="approve" action="" method="post">
				<input type="text" class="form-control" name="approve" placeholder="Approve or not" required=""><br>
				<input type="text" class="form-control" name="issue" placeholder="Issue Date YYYY-MM-DD" required=""><br>
				<input type="text" class="form-control" name="return" placeholder="Return  Date YYYY-MM-DD" required=""><br>
				<button class="btn btn-default" name="submit">Submit</button>
			</form>
		</div>
	</div>
	<?php
	  if(isset($_POST['submit']))
	  {
	    mysqli_query($db,"UPDATE  `issue_book` SET  `approve` =  '$_POST[approve]', `issue` =  '$_POST[issue]', `return` =  '$_POST[return]' WHERE username='$_SESSION[username]' and book_id='$_SESSION[book_id]';");

	    mysqli_query($db,"UPDATE books SET quantity = quantity-1 where bid='$_SESSION[book_id]' ;");

	    $res=mysqli_query($db,"SELECT quantity from books where book_id='$_SESSION[book_id];");

	    while($row=mysqli_fetch_assoc($res))
	    {
	      if($row['quantity']==0)
	      {
	        mysqli_query($db,"UPDATE books SET status='not-available' where book_id='$_SESSION[book_id]';");
	      }
	    }
	    ?>
	      <script type="text/javascript">
	        alert("Updated successfully.");
	        window.location="request.php";
	      </script>
	    <?php
	  }
	?>
</body>
</html>

--------------------

<?php
	include "connection.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Approve Request</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		.srch{
			padding-left: 1000px;
		}
		header{
			height: 55px;
		}
		body {
		  font-family: "Lato", sans-serif;
		  transition: background-color .5s;
		  background-image: url("image/book2.jpg");
		 
		}

		.sidenav {
		  height: 100%;
		  margin-top: 50px;
		  width: 0;
		  position: fixed;
		  z-index: 1;
		  top: 0;
		  left: 0;
		  background-color: #333;
		  overflow-x: hidden;
		  transition: 0.5s;
		  padding-top: 60px;
		}

		.sidenav a {
		  padding: 8px 8px 8px 32px;
		  text-decoration: none;
		  font-size: 25px;
		  color: #818181;
		  display: block;
		  transition: 0.3s;
		}

		.sidenav a:hover {
		  color: #f1f1f1;
		}

		.sidenav .closebtn {
		  position: absolute;
		  top: 0;
		  right: 25px;
		  font-size: 36px;
		  margin-left: 50px;
		}

		#main {
		  transition: margin-left .5s;
		  padding: 16px;
		}

		@media screen and (max-height: 450px) {
		  .sidenav {padding-top: 15px;}
		  .sidenav a {font-size: 18px;}
		}
		.h:hover{
			color: white;
			width:300px;
			height:50px;
			background-color:#00544c;
		}
		.container{
			height: 600px;
			background-color: black;
			opacity: .8;
			color: white;
		}
		.srch{
			padding-left: 850px;
		}
		.form-control{
			width: 300px;
			height: 40px;
			background-color: black;
		}
		.approve{
			margin-left: 420px;
		}
	</style>
</head>
<body>
	<!--------------Side NAV--------->
	<div id="mySidenav" class="sidenav">
  		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  		<div style="color: white; margin-left: 80px;">
            <?php
	            if(isset($_SESSION['login_user']))
		        {
	                 echo "<img class='img-circle profile_img' height=100 width=100 src='image/".$_SESSION['pic']." '>";
	                 echo "</br>";
	                 echo "Welcome  ". $_SESSION['login_user'];
	            }        
            ?>
        </div>
  		<br><br>
		<div class="h">   <a href="books.php">Books</a>  </div>
		<div class="h">  <a href="request.php">Book Request</a>  </div>
		<div class="h">  <a href="issue_info.php">Issue Information</a>  </div>
	</div>

	<div id="main">
 		<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;Open</span>
		<script>
			function openNav() {
			  document.getElementById("mySidenav").style.width = "300px";
			  document.getElementById("main").style.marginLeft = "300px";
			  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
			}

			function closeNav() {
			  document.getElementById("mySidenav").style.width = "0";
			  document.getElementById("main").style.marginLeft= "0";
			  document.body.style.backgroundColor = "white";
			}
		</script>
		<div class="container">
			<br><br><h3 style="text-align: center;">Approve Request</h3><br><br>
			<form class="approve" action="" method="post">
				<input type="text" class="form-control" name="approve" placeholder="Approve or not" required=""><br>
				<input type="text" class="form-control" name="issue" placeholder="Issue Date YYYY-MM-DD" required=""><br>
				<input type="text" class="form-control" name="return" placeholder="Return  Date YYYY-MM-DD" required=""><br>
				<button class="btn btn-default" name="submit">Submit</button>
			</form>
		</div>
	</div>
	<?php
	  if(isset($_POST['submit']))
	  {
	    mysqli_query($db,"UPDATE  `issue_book` SET  `approve` =  '$_POST[approve]', `issue` =  '$_POST[issue]', `return` =  '$_POST[return]' WHERE username='$_SESSION[st_name]' and book_id='$_SESSION[book_id]';");

	    mysqli_query($db,"UPDATE books SET quantity = quantity-1 where book_id='$_SESSION[book_id]' ;");

	    $res=mysqli_query($db,"SELECT quantity from books where book_id='$_SESSION[book_id];");

	    while($row=mysqli_fetch_assoc($res))
	    {
	      if($row['quantity']==0)
	      {
	        mysqli_query($db,"UPDATE `books` SET `status`='not-available' where book_id='$_SESSION[book_id]';");
	      }
	    }
	    ?>
	      <script type="text/javascript">
	        alert("Updated successfully.");
	        window.location="request.php";
	      </script>
	    <?php
	  }
	?>
</body>
</html>