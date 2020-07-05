<?php
  include "connection.php";
  include "navbar.php";

?>
<!--
<!DOCTYPE html>
<html>
<head>

  <title>Student Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
  
</head>
<body>
<header style="height: 90px;">
  
<div class="logo">
      <h1 style="color: white; font-size: 25px;word-spacing: 10px; line-height: 80px;margin-top: 20px;">ONLINE LIBRARY MANAGEMENT SYSTEM</h1>
    </div>

      <nav>
        <ul>
          <li> <a href="index.php">HOME</a></li>
              <li><a href="books.php">BOOKS</a></li>
              <li> <a href="login.php">STUDENT-LOGIN</a></li>
              <li> <a href="">ADMIN-LOGIN</a></li>
              <li> <a href="feedback.html">FEEDBACK</a></li>
        </ul>
      </nav>
</header>
--
<section>
  <div class="reg_img">

    <div class="box2">
        <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;">Library Management System</h1><br>
        <h1 style="text-align: center; font-size: 25px;">User Registration Form</h1><br>
      <form name="Registration" action="" method="post">
        <br><br>
        <div class="login">
          <input type="text" name="first" placeholder="First Name" required=""> <br><br>
          <input type="text" name="last" placeholder="Last Name" required=""> <br><br>
          <input type="text" name="username" placeholder="Username" required=""> <br><br>
          <input type="password" name="password" placeholder="Password" required=""> <br><br>
          <input type="text" name="roll" placeholder="Roll No" required=""><br><br>
          <input type="text" name="contact" placeholder="Phone No" required=""><br><br>
          <input type="text" name="email" placeholder="Email" required=""><br><br>

          <input class="btn-btn-default" type="Button" name="submit" value="Sign Up"></div>
      </form>
     
    </div>
  </div>
</section>
  

  



</body>
</html>

-->

<!DOCTYPE html>
<html>
  <head>

    <title>Admin Registration</title>

    
  </head>
  <style type="text/css">
          section {
            margin-top: -20px;
            }         
        </style>
  <body>
    <section>
      <div class="reg_img">

        <div class="box2">
            <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;"> &nbsp  Library Management System</h1>
            <h1 style="text-align: center; font-size: 25px;">Admin Registration Form</h1>
          <form name="Registration" action="" method="post">
            
            <div class="login">
              <input class="form-control" type="text" name="first" placeholder="First Name" required=""> <br>
              <input class="form-control" type="text" name="last" placeholder="Last Name" required=""> <br>
              <input class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
              <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
              <input class="form-control" type="number" name="contact" placeholder="Phone No" required=""><br>
              <input class="form-control" type="text" name="email" placeholder="Email" required=""><br>
              <input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="background-color: white; width: 70px; height: 30px"> 
            </div>
          </form>
        </div>
      </div>
    </section>
      <?php

        if(isset($_POST['submit']))
        {
          $count=0;
          $sql="SELECT username from `admin`";
          $res=mysqli_query($db,$sql);
          while ($row=mysqli_fetch_assoc($res)) 
            
          {
             if($row['username']==$_POST['username'])
             {
              $count=$count+1;

             } 
          }
          if($count==0)
          {
             mysqli_query($db,"INSERT INTO `admin` VALUES('', '$_POST[first]', '$_POST[last]', '$_POST[username]', '$_POST[password]', '$_POST[contact]', '$_POST[email]','user1.jpg');");

      ?>
      <script type="text/javascript">
      alert("Registration Sucessfull");
      </script>
      <?php
    }
        else
        {
          ?>
          <script type="text/javascript">
          alert("Username Already Exist");
          </script>
          <?php
        }
      }
      ?>
  </body>
</html>
