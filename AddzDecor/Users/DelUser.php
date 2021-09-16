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
   #b{position:relative;left:250;}
  </style>
  <script src="../Js/CheckAll.js"></script>
 </head>
 <body>
   <form action="./DB/Deletion.php" method="post">
  <center><table id="table" cellpadding="10">
   <tr id="tr1">
    <th>SrNo</th>   
    <th>Fisrt Name</th>
    <th>Last Name</th>
    <th>Contact</th>
    <th>User</th>
    <th>Password</th>
    <th>Select All<input type="checkbox" id="select" onclick="SelectAll()"></th>
   </tr>
   <?php 
    for($i=1;$i<=$n;$i++)
	{
     $row=mysqli_fetch_array($r);
   ?>
   <tr id="tr2">
    <td><?php echo $row['SrNo']; ?></td>
    <td><?php echo $row['FName']; ?></td>
    <td><?php echo $row['LName']; ?></td>
    <td><?php echo $row['Mob']; ?></td>
    <td><?php echo $row['User']; ?></td>
    <td><?php echo $row['Pass']; ?></td>
    <th><input id="chk" type="checkbox" name="D<?php echo $i;?>" value="<?php echo $row['SrNo']?>"></th>
   </tr>
   <?php
	}
   ?>
  </table></center>
   <input id="b" type="submit" value="Remove">
   </form>
 </body>
</html>
