<?php
	include "connection.php";
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Information of Issued Books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		.srch{
			padding-left: 70%;
		}
		header{
			height: 55px;
		}
		body {
		  font-family: "Lato", sans-serif;
		  transition: background-color .5s;
		  background-image: url("image/book3.jpg");
		 
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
		.scroll
		{
			width: 100%;
			height: 500px;
			overflow: auto;
		}
		th,td{
			width: 10%;
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
			<h3 style="text-align: center;">Information Of Borrowed Books</h3>
			<?php
			$c=0;
				if(isset($_SESSION['login_user']))
				{
					$sql="SELECT student.username,roll,books.book_id,name,author,edition,issue,issue_book.return From student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.book_id=books.book_id WHERE issue_book.approve= 'Yes' ORDER BY `issue_book`.`return` ASC";
					$res=mysqli_query($db,$sql);
					echo "<table class='table table-bordered' style='width:100%';>";
						echo "<tr style='background-color:#5e62ef;'>";
							//table header
								echo "<th>"; echo "Student Username"; echo "</th>";
								echo "<th>"; echo " Roll NO"; echo "</th>";
								echo "<th>"; echo "Book ID"; echo "</th>";
								echo "<th>"; echo "Book Name"; echo "</th>";
								echo "<th>"; echo "Author Name"; echo "</th>";
								echo "<th>"; echo "Edition"; echo "</th>";
								echo "<th>"; echo "Issue Date"; echo "</th>";
								echo "<th>"; echo "Return Date"; echo "</th>";
						echo "</tr>";
					echo "</table>";
					echo "<div class='scroll'>";
					echo "<table class='table table-bordered'>";
					while ($row=mysqli_fetch_assoc($res))
					{
						$d=date("Y-m-d");
						if($d > $row['return'])
						{
							$c=$c+1;
							$var='<p style="color:yellow; background-color:red;">Expired</p>';
							mysqli_query($db,"UPDATE issue_book SET approve='$var' where `return`='$row[return]' and approve='Yes' limit $c; ");
							echo $d."<br>";
						}
						
						echo "<tr>";
						echo "<td>"; echo  $row['username']; echo "</td>";	
						echo "<td>"; echo  $row['roll']; echo "</td>";
						echo "<td>"; echo  $row['book_id']; echo "</td>";
						echo "<td>"; echo  $row['name']; echo "</td>";
						echo "<td>"; echo  $row['author']; echo "</td>";
						echo "<td>"; echo  $row['edition']; echo "</td>";
						echo "<td>"; echo  $row['issue']; echo "</td>";
						echo "<td>"; echo  $row['return']; echo "</td>";
						echo "</tr>";
					}
					echo "</table>";
					echo "</div";
				}
				else
				{
					?>
					<h3 style="text-align: center;">Login to Information Of Borrowed Books</h3>
					<?php
				}
			?>
		</div>
	</div>
</body>
</html>