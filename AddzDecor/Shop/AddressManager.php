<?php
 session_start();
 $mob=$_SESSION["Contact"];
 $con=mysqli_connect("localhost","root","","AddzDecor");
 if(isset($_POST["Pincode"]))
 {
   $L=$_POST["Landmark"];
   $Add=$_POST["Address"];
   $city=$_POST["City"];
   $State=$_POST["State"];
   $Pincode=$_POST["Pincode"];
   $country=$_POST["country"];
   $q="update Login set Address='$L,$Add,$city,$State,$country-$Pincode' where Mob='$mob'";
   $r=mysqli_query($con,$q);
   echo mysqli_error($con);
 }
?>
<html>
 <head>
  <title>Address Manager</title>
  <style>
   input[type="submit"]{ border:#CCC 1px solid; color:red; height:30; width:180; border-radius:5px;}
   input[type="submit"]:hover{ background:#2c7ac5; color:white; }
  </style>
 </head>
 <body>
  <h2>Address Manager</h2>
  <form action="./AddressManager.php" method="post">
   <table>
    <tr>
     <th>Landmark</th><td><input type="text" name="Landmark" autofocus  autocomplete="off" required></td>
	</tr>
	<tr>
     <th>Address</th><td><input type="text" name="Address" autocomplete="off" required></td>
	</tr>
	<tr>
    <th>City</th><td><input type="text" name="City" autocomplete="off" required></td>
	</tr>
	<tr>
     <th>State</th><td><input type="text" name="State" autocomplete="off" required></td>
	</tr>
	<tr>
	 <th>Country</th><td><input type="text" name="country"></td>
	</tr>
	<tr>
     <th>Pincode</th><td><input type="text" name="Pincode" autocomplete="off" required></td>
	</tr>
	<tr>
	 <th colspan=2><br><input type="submit" value="Save"></th>
	</tr>
   </table>
  </form>
 </body>
</html>