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
		body {
		  font-family: "Lato", sans-serif;
		  transition: background-color .5s;
		  background-image: url("image/book3.jpg");
		  background-repeat: no-repeat;
		 
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
			height: 800px;
			background-color: black;
			opacity: .8;
			color: white;
			margin-top: -35px;
		}
		.srch{
			padding-left:70%;
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
			<div style="float: left; padding: 25px;">
				<form method="post">
					<button class="btn btn-default" style="background-color: #06861a; color: yellow;" name="return" type="submit">RETURNED</button> &nbsp &nbsp
					<button class="btn btn-default" style="background-color: red; color: yellow;" name="expire" type="submit">EXPIRED</button>
				</form>
			</div>
			<div class="srch"></div>
			<?php
				if(isset($_SESSION['login_user']))
				{
					?>
					<div class="srch">
						<form method="post" action="" name="form1">
						<br>
						<input type="text" name="username" class="form-control" placeholder="Username" required=""></br>
						<input type="text" name="book_id" class="form-control" placeholder="Book ID" required=""><br>
						<button class="btn btn-default" name="submit">Submit</button>
						</form>
					</div><br><br>
					<?php
					/*if(isset($_POST['submit']))
					{
						$res=mysqli_query($db,"SELECT * from `issue_book` where username='$_POST[username]' and book_id='$_POST[book_id]' ;");
						      while($row=mysqli_fetch_assoc($res))
						      {
						        $d= strtotime($row['return']);
						        $c= strtotime(date("Y-m-d"));
						        $diff= $c-$d;

						        if($diff>=0)
						        {
						          $day=floor($diff/(60*60*24));
						          $fine=$day*.10;
						      }
  					}
						$x=date("Y-m-d");
						mysqli_query($db,"INSERT INTO `fine` VALUES('$_POST[username]', '$_POST[book_id]', '$x', '$day', 'not paid') ;");
*/
					        if(isset($_POST['submit']))
        {

          $res=mysqli_query($db,"SELECT * FROM `issue_book` where username='$_POST[username]' and book_id='$_POST[book_id]' ;");
      
      while($row=mysqli_fetch_assoc($res))
      {
        $d= strtotime($row['return']);
        $c= strtotime(date("Y-m-d"));
        $diff= $c-$d;

        if($diff>=0)
        {
          $day= floor($diff/(60*60*24)); 
          $fine= $day*5;
        }
      }
          $x= date("Y-m-d"); 
          mysqli_query($db,"INSERT INTO `fine` VALUES ('$_POST[username]', '$_POST[book_id]', '$x', '$day', '$fine','not paid') ;");
						$var1='<p style="color:yellow; background-color:green;">Returned</p>';
						mysqli_query($db,"UPDATE issue_book SET approve='$var1' where username='$_POST[username]' and book_id='$_POST[book_id]'; ");	
						 mysqli_query($db,"UPDATE books SET quantity = quantity+1 where book_id='$_POST[book_id]' ");
					}
				}
			?>
			<!--<h3 style="text-align: center;">Date Expired list Of Students</h3>-->
			<?php
			$c=0;
				if(isset($_SESSION['login_user']))
				{
					$ret='<p style="color:yellow; background-color:green;">Returned</p>';
					$exp='<p style="color:yellow; background-color:red;">Expired</p>';
					if(isset($_POST['expire']))
					{
						$sql="SELECT student.username,roll,books.book_id,name,author,edition,approve,issue,issue_book.return From student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.book_id=books.book_id WHERE issue_book.approve = '$exp' ORDER BY `issue_book`.`return` DESC";
						$res=mysqli_query($db,$sql);
					}
					else if(isset($_POST['return']))
					{
						$sql="SELECT student.username,roll,books.book_id,name,author,edition,approve,issue,issue_book.return From student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.book_id=books.book_id WHERE issue_book.approve = '$ret' ORDER BY `issue_book`.`return` DESC";
						$res=mysqli_query($db,$sql);	
					}
					else
					{
						$sql="SELECT student.username,roll,books.book_id,name,author,edition,approve,issue,issue_book.return From student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.book_id=books.book_id WHERE issue_book.approve != '' and issue_book.approve !='Yes' ORDER BY `issue_book`.`return` DESC";
						$res=mysqli_query($db,$sql);
					}
					echo "<table class='table table-bordered' style='width:100%'>";
						echo "<tr style='background-color:#5e62ef;'>";
							//table header
								echo "<th>"; echo "Student Username"; echo "</th>";
								echo "<th>"; echo " Roll NO"; echo "</th>";
								echo "<th>"; echo "Book ID"; echo "</th>";
								echo "<th>"; echo "Book Name"; echo "</th>";
								echo "<th>"; echo "Author Name"; echo "</th>";
								echo "<th>"; echo "Edition"; echo "</th>";
								echo "<th>"; echo "Approve"; echo "</th>";
								echo "<th>"; echo "Issue Date"; echo "</th>";
								echo "<th>"; echo "Return Date"; echo "</th>";
						echo "</tr>";
					echo "</table>";
					echo "<div class='scroll'>";
						echo "<table class='table table-bordered'>";
						while ($row=mysqli_fetch_assoc($res))
						{
							echo "<tr>";
							echo "<td>"; echo  $row['username']; echo "</td>";	
							echo "<td>"; echo  $row['roll']; echo "</td>";
							echo "<td>"; echo  $row['book_id']; echo "</td>";
							echo "<td>"; echo  $row['name']; echo "</td>";
							echo "<td>"; echo  $row['author']; echo "</td>";
							echo "<td>"; echo  $row['edition']; echo "</td>";
							echo "<td>"; echo  $row['approve']; echo "</td>";
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