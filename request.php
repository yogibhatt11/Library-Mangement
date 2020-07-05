<?php
	include "connection.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Request Books</title>
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
		<div class="h">  <a href="expired.php">Date Expired list</a></div>
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
			<div class="srch">
				<form method="post" action="" name="form1">
					<br>
					<input type="text" name="username" class="form-control" placeholder="Username" required=""></br>
					<input type="text" name="book_id" class="form-control" placeholder="Book ID" required=""><br>
					<button class="btn btn-default" name="submit">Submit</button>
				</form>
			</div>
			<h3 style="text-align: center;">Request Of Book</h3>
			<?php
			if(isset($_SESSION['login_user']))
			{
				$sql="SELECT student.username,roll,books.book_id,name,author,edition,status From student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.book_id=books.book_id WHERE issue_book.approve= ''";
				$res=mysqli_query($db,$sql);
				if(mysqli_num_rows($res)==0)
				{	
					echo "<h2><b>There is no pending request.</b></h2>";
				}
				else
				{
					echo "<table class='table table-bordered'>";
					echo "<tr style='background-color:#5e62ef;'>";
						//table header
							echo "<th>"; echo "Student Username"; echo "</th>";
							echo "<th>"; echo " Roll NO"; echo "</th>";
							echo "<th>"; echo "Book ID"; echo "</th>";
							echo "<th>"; echo "Book Name"; echo "</th>";
							echo "<th>"; echo "Author Name"; echo "</th>";
							echo "<th>"; echo "Edition"; echo "</th>";
							echo "<th>"; echo "Status"; echo "</th>";

						echo "</tr>";

						while ($row=mysqli_fetch_assoc($res))
						 {
							echo "<tr>";
							echo "<td>"; echo  $row['username']; echo "</td>";	
							echo "<td>"; echo  $row['roll']; echo "</td>";
							echo "<td>"; echo  $row['book_id']; echo "</td>";
							echo "<td>"; echo  $row['name']; echo "</td>";
							echo "<td>"; echo  $row['author']; echo "</td>";
							echo "<td>"; echo  $row['edition']; echo "</td>";
							echo "<td>"; echo  $row['status']; echo "</td>";
							echo "</tr>";
						}

					echo "</table>";
				}
			}
			else
			{
				?>
				<h4 style="text-align: center; color: yellow;">You should login first.</h4>
				<?php
			}
		if(isset($_POST['submit']))
		{
			$_SESSION['st_name']=$_POST['username'];
			$_SESSION['book_id']=$_POST['book_id'];
			?>
			<script type="text/javascript">
				window.location="approve.php";
			</script>

			<?php

		}
	?>
	</div>
</body>
</html>