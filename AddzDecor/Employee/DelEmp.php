<?php 
 include('../Condition.php'); 
 include('./SearchEmp.php'); ?>
<html>
 <head>
  <title>Delete Employee</title>
  <style>
   form{position:relative;left:20;}
   #table{width:100%;}
   form input[type="text"]{width:250; padding:10px 10px; border-radius:15px;}
   input[type="submit"]{height:35; width:100;border-radius:10px;}
   input[type="submit"]:hover{background:#2c7ac5; color:white;}

  </style>
  <link rel="stylesheet" href="../CSS/StyleTable.css">
  <script src="../Js/CheckAll.js"></script>
 </head>
 <body> 
  <br><form action="./ViewEmp.php" method="post">
   <input type="text" placeholder="Search Name" name="search" autocomplete="off"> 
   <input type='submit' value='Search'>
  </form><br>
  <form action="./DB/Deletion.php" method="post">
  <table id="table">
   <tr id="tr1">
    <th>Eid</th>
    <th>FirstName</th>
    <th>MiddleName</th>
    <th>LastName</th>
    <th>Email</th>
    <th>MobNo</th>
    <th>Joining Date</th>
    <th>Salary</th>
    <th>Designation</th>
    <th>BankName</th>
    <th>Account No</th>
    <th>IFSC</th>
    <th>SelectAll<input type="checkbox" id="select" onclick="SelectAll()"></th>
   </tr>
   <?php
   for($i=1;$i<=$n;$i++)
    {
    $row=mysqli_fetch_array($r);
   ?>
   <tr id="tr2">
    <td><?php echo $row['Eid'];?></td>
    <td><?php echo $row['FName'];?></td>
    <td><?php echo $row['MName'];?></td>
    <td><?php echo $row['LName'];?></td>
    <td><?php echo $row['Email'];?></td>
    <td><?php echo $row['Mob'];?></td>
    <td><?php echo $row['JDate'];?></td>
    <td><?php echo $row['Sal']."₹";?></td>
    <td><?php echo $row['Design'];?></td>
    <td><?php echo $row['BName'];?></td>
    <td><?php echo $row['AccNo']; ?></td>
    <td><?php echo $row['IFSC']; ?></td>
    <th><input id="chk" type="checkbox" name="D<?php echo $i;?>" value="<?php echo $row['Eid'];?>"></th>
   </tr>
   <?php
    }
   ?>
  </table><br>
	<input type="submit" value="Remove" >
   </form>
 </body>
</html>