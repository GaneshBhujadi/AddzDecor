<?php session_start();
 if(isset($_SESSION['Failed']))
  echo "<script>alert('Enter valid UserName & Password');</script>";
 session_destroy();
?>
<html>
 <head>
  <title>Login</title>
  <script src="./Js/show.js"></script>
  <link rel="stylesheet" href="./CSS/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>
 <body>
  <div class="container">
   <img src="./Images/Logo.jpg"/>
   <form  action="Valid.php" method="post">
	<div class="form-input">
	 <input type="text" name="User" placeholder="User" autocomplete="off" autofocus required />
	</div>
	<div class="form-input">
   	 <input id="p1" type="password" name="Pass" placeholder="Password" required />
     <b class="fa fa-eye" aria-hidden="true" onclick="Show()"> </b><br>
	 <a style="text-decoration:none; font-size: 1.3em;" href="./ForgetPass/ForgetPass.php">ForgetPassword?</a>
	</div><br>
	 <input class="btn-login" type="submit" value="LOGIN"/>
   </form>
  </div>
 </body>
</html>
