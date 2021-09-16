<?php
 session_start();
 if(isset($_SESSION["Password"]))
  echo "<script>alert('Password does not match');</script>"; 
 if(isset($_SESSION["Email"]))
  echo "<script>alert('Enter valid Email');</script>";
 session_destroy();
?>
<html>
 <head>
  <title>Create User</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
   input[type="text"],[type="password"],[type="number"] 
    { border:#CCC 2px solid; padding:10px 20px; border-radius:10px; }
   input[type="submit"]
    { padding:10px 20px; width:150; background:#2c7ac5; border:#d1e8ff 1px solid; color:#FFF; border-radius:15px; }
	  input[type="submit"]:hover{ background:orange; color:black;}
	#Register{margin:30;}
  </style>
  <script src="../Js/show.js"></script>
 </head>
 <body>
    <form action="./DB/Insertion.php" method="post">
     <input type="text" name="FName" placeholder="First Name" autocomplete="off" autofocus required><br>
     <br><input type="text" name="LName" placeholder="Last Name" autocomplete="off" required><br>
     <br><input type="number" name="Mob" placeholder="Contact" autocomplete="off" required><br><br>
	 <input type="text" name="Email" placeholder="Email" autocomplete="off" required>
	 <span id="email"> </span><br>
     <br><input id="p1" type="password" name="Pass1" placeholder="Password" autocomplete="off" required>
     <b class="fa fa-eye" aria-hidden="true" onclick="Show()"></b><br>
     <br><input id="p2" type="password" name="Pass2" placeholder="Confirm Password" autocomplete="off" required><br>
     <br><input type="submit" value="Register">
    </form>
  </div>
 </body>
</html>