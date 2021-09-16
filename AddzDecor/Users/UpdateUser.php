<?php include("../Condition.php");
 $con=mysqli_connect("localhost","root","","AddzDecor");
 $r=mysqli_query($con,"select * from login");
 $n=mysqli_num_rows($r);
 mysqli_close($con);
?>
<html>
 <head>
  <title>Users</title>
  <link rel="stylesheet" href="../CSS/StyleTable.css">
  <style>
   #b{position:relative;left:310;width:100;height:25;}
   #b:hover{background-color:Green;color:white;}
  </style>
 </head>
 <body>
 <form action="./DB/Updation.php" method="post">
  <center><table id="table" cellpadding="10">
   <tr id="tr1">
    <th>SrNo</th>   
    <th>Fisrt Name</th>
    <th>Last Name</th>
    <th>Contact</th>
    <th>User</th>
    <th>Password</th>
   </tr>
   <?php 
    for($i=1;$i<=$n;$i++)
	{
     $row=mysqli_fetch_array($r);
   ?>
   <tr id="tr2">
    <td><input type="hidden" name="SrNo<?php echo $i ?>" value="<?php echo $row['SrNo']; ?>"><?php echo $row['SrNo']; ?></td>
    <td><input type="text" name="FName<?php echo $i ?>" value="<?php echo $row['FName']; ?>"></td>
    <td><input type="text" name="LName<?php echo $i ?>" value="<?php echo $row['LName']; ?>"></td>
    <td><input type="number" name="Mob<?php echo $i ?>" value="<?php echo $row['Mob']; ?>"></td>
    <td><input type="text" name="User<?php echo $i ?>" value="<?php echo $row['User']; ?>"></td>
    <td><input type="text" name="Pass<?php echo $i ?>" value="<?php echo $row['Pass']; ?>"></td>
   </tr>
   <?php
	}
   ?>
  </table></center>
   <input id="b" type="submit" value="Update">
  </form>
 </body>
</html>
