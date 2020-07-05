<?php
	include "connection.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Student Information</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		.srch{
			padding-left: 850px;
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
		.scroll
		{
			width: 100%;
			height: 400px;
			overflow: auto;
		}
		th,td{
			width: 10%;
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
		 .h:hover{
		  	color: white;
		  	width:300px;
		  	height:50px;
		  	background-color:#00544c;
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
	</style>
</head>
<body>
		<!--------------Side NAV--------->
	<div id="mySidenav" class="sidenav">
	  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	  <div style="color: white; margin-left: 45px; font-size: 20px;">
	        <?php
	         echo "<img class='img-circle profile_img' height=100 width=100 src='image/".$_SESSION['pic']." '>";
	         echo "</br></br>";
	         echo "Welcome  ". $_SESSION['login_user'];
	         ?>

	   </div>  
	  <div class="h"> <a href="request.php">Book Request</a></div>
	  <div class="h"> <a href="issue_info.php">Issue Information</a></div>
	  <div class="h">  <a href="expired.php">Date Expired list</a></div>
	</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>

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
	<!--- Search BAr------->
	<div class="container">
	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			<div>
				<input class="form-control" type="text" name="search" placeholder="Search username..." required="">
				<button style='background-color:#5e62ef;' type="submit" name="submit" class="btn btn-default">
				<span class="glyphicon glyphicon-search"></span>
				</button>
			</div>
		</form>
	</div>
	<h1>List Of Students</h1>
	<?php
		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT first,last,username,roll,email,contact FROM `student` where username like '%$_POST[search]%' ");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry No sudents Found with that username.. Try Searching again..";
			}
			else
			{
				echo "<table class='table table-bordered table-hover'>";
				echo "<tr style='background-color:#5e62ef;'>";
					//table header
						echo "<th>"; echo "First Name"; echo "</th>";
						echo "<th>"; echo "Last Name"; echo "</th>";
						echo "<th>"; echo "Username"; echo "</th>";
						echo "<th>"; echo "Roll"; echo "</th>";
						echo "<th>"; echo "Contact"; echo "</th>";
						echo "<th>"; echo "Email"; echo "</th>";
					echo "</tr>";

					while ($row=mysqli_fetch_assoc($q))
					 {
						echo "<tr>";
						echo "<td>"; echo  $row['first']; echo "</td>";	
						echo "<td>"; echo  $row['last']; echo "</td>";	
						echo "<td>"; echo  $row['username']; echo "</td>";	
						echo "<td>"; echo  $row['roll']; echo "</td>";	
						echo "<td>"; echo  $row['contact']; echo "</td>";	
						echo "<td>"; echo  $row['email']; echo "</td>";						
						echo "</tr>";
					}

				echo "</table>";
			}
		}
		/* If button is not pressed.*/
		else
		{
			/*$q=mysqli_query($db,"SELECT first,last,username,roll,email,contact FROM `student` ORDER BY `student` , `first` ASC ;");*/
			$res=mysqli_query($db,"SELECT first,last,username,roll,email,contact FROM `student`;");

			echo "<table class='table table-bordered table-hover'>";
				echo "<tr style='background-color:#5e62ef;'>";
				//table header
					echo "<th>"; echo "First Name"; echo "</th>";
						echo "<th>"; echo "Last Name"; echo "</th>";
						echo "<th>"; echo "Username"; echo "</th>";
						echo "<th>"; echo "Roll"; echo "</th>";
						echo "<th>"; echo "Contact"; echo "</th>";
						echo "<th>"; echo "Email"; echo "</th>";
					echo "</tr>";
				echo "</table>";

			echo "<div class='scroll'>";
				echo "<table class='table table-bordered table-hover'>";
					echo "<tr style='background-color:#5e62ef;'>";
				while ($row=mysqli_fetch_assoc($res))
					 {
						echo "<tr>";
						echo "<td>"; echo  $row['first']; echo "</td>";	
						echo "<td>"; echo  $row['last']; echo "</td>";	
						echo "<td>"; echo  $row['username']; echo "</td>";	
						echo "<td>"; echo  $row['roll']; echo "</td>";	
						echo "<td>"; echo  $row['contact']; echo "</td>";	
						echo "<td>"; echo  $row['email']; echo "</td>";					
						echo "</tr>";
					}
				echo "</table>";
				echo "</div";

		}
	?>
	</div>
</body>
</html>