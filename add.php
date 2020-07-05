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
    background-color: #024629;
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

  .img-circle{
  	margin-left: 30px;
  }
  .h:hover{
  	color: white;
  	width:300px;
  	height:50px;
  	background-color:#00544c;
  }

  .book{
    width: 400px;
    margin:0px auto;

  }
  .form-control{
    background-color: #080707;
    color: white;
    height: 40px;
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
     <div class="h">  <a href="request.php">Book Request</a>  </div>
     <div class="h">  <a href="issue_info.php">Issue Information</a>  </div>
     <div class="h">  <a href="expired.php">Date Expired list</a></div>
	</div>
  <div id="main">
    <span style="font-size:30px;cursor:pointer; color: black;" onclick="openNav()">&#9776;</span>
    <div class="container" style="text-align: center;">
      <h2 style="color: black; font-family: Lucida Console; text-align: center;">Add New Book</h2>   
      <form class="book" action="" method="post" >
         <input type="text" name="bid" class="form-control" placeholder="Book ID" required=""><br>
          <input type="text" name="name" class="form-control" placeholder="Book Name" required=""><br>
          <input type="text" name="author" class="form-control" placeholder="Author Name" required=""><br>
          <input type="text" name="edition" class="form-control" placeholder="Edition" required=""><br>
          <input type="text" name="status" class="form-control" placeholder="Status" required=""><br>
          <input type="text" name="quantity" class="form-control" placeholder="Quantity" required=""><br>
          <input type="text" name="department" class="form-control" placeholder="Department" required=""><br>
          <button  class="btn btn-default" type="submit" name="submit">ADD</button>
      </form>
    </div>
      <?php
        if(isset($_POST['submit']))
        {
          if(isset($_SESSION['login_user']))
          {
            mysqli_query($db,"INSERT INTO books VALUES ('$_POST[bid]', '$_POST[name]', '$_POST[author]', '$_POST[edition]', '$_POST[status]', '$_POST[quantity]', '$_POST[department]') ;");
            ?>
            <script type="text/javascript">
              alert("Book Added Successfully.");
            </script>

            <?php
          }
          else
          {
            ?>
              <script type="text/javascript">
                alert("You should log in first.");
              </script>
            <?php
          }
        }
      ?>
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
      document.body.style.backgroundColor = "#024629";
    }
  </script>
</body>
</html>
