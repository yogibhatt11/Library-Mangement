<?php
	include "connection.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		.srch{
			padding-left: 1000px;
		}
body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
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
.img-circle{
	margin-left: 30px;
}
.h:hover{
	color: white;
	width:300px;
	height:50px;
	background-color:#00544c;
}

	</style>
}
</head>
<body>
	<!--------------Side NAV--------->
	<div id="mySidenav" class="sidenav">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	  <div style="color: white; margin-left: 45px; font-size: 20px;">
	        <?php
	        if(isset($_SESSION['login_user']))
	        {
	         echo "<img class='img-circle profile_img' height=100 width=100 src='image/".$_SESSION['pic']." '>";
	         echo "</br></br>";
	         echo "Welcome  ". $_SESSION['login_user'];
	    	 }
	         ?>

	   </div> <br><br>
	<div class="h">  <a href="add.php">Add Books</a>  </div>
	<div class="h">   <a href="delte.php">Delete Books</a>  </div>
	 <div class="h">  <a href="#">Book Request</a>  </div>
	 <div class="h">  <a href="#">Issue Information</a>  </div>
	</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
</div>

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
</body>
</html>