<?php 
 include('../Condition.php');
 include('./SearchEmp.php');
?>
<html>
 <head>
  <title>Update Employee</title>
  <link rel="stylesheet" href="../CSS/StyleTable.css">
  <style>
   form{position:relative; left:20;}
   form input[type="text"]{width:250; padding:10px 10px; border-radius:15px;}
   #table{width:100%;}
   form table input[type="text"],[type="number"],[type="date"]{width:170; text-align:center; border:none; background:none; height:30;}
   input[type="submit"]{height:35; width:100;border-radius:10px;}
   input[type="submit"]:hover{background:#2c7ac5; color:white;}
  </style>
 </head>
 <body> 
  <br><form action="./UpdateEmp.php" method="post">
   <input type="text" placeholder="Enter Name" name="search" autocomplete="off">
   <input type="submit" value="Search">
  </form><br><br>
  <?php if($n==0) echo "<script>alert('Employee does not Exists');</script>";
    else {  
  ?>
  <div style="overflow-x:auto;">
  <form action="./DB/Updation.php" method="post" >
  <table id="table" cellspacing="5" cellpadding="6">
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
   </tr>
   <?php
   for($i=1;$i<=$n;$i++)
    {
    $row=mysqli_fetch_array($r);
   ?>
   <tr id="tr2">
    <td> <?php echo $row['Eid'];?><input type="hidden" name="Eid<?php echo $i;?>" value="<?php echo $row['Eid'];?>"> </td>
    <td> <input type="text" name="FName<?php echo $i;?>" value="<?php echo $row['FName'];?>" autocomplete="off" required> </td>
    <td> <input type="text" name="MName<?php echo $i;?>" value="<?php echo $row['MName'];?>" autocomplete="off" required> </td>
    <td> <input type="text" name="LName<?php echo $i;?>" value="<?php echo $row['LName'];?>" autocomplete="off" required> </td>
    <td> <input type="text" name="Email<?php echo $i;?>" value="<?php echo $row['Email'];?>" autocomplete="off" required> </td>
    <td> <input type="number" name="Mob<?php echo $i;?>" value="<?php echo $row['Mob'];?>" autocomplete="off" required> </td>
	<?php
	 $d=$row['JDate'];
	 $d=explode("-",$d);
	 $D=explode(" ",$d[2]);
	 $JD=$D[0]."-".$d[1]."-".$d[0];
	?>
    <td> <?php echo $JD;?></td>
    <td> <input type="number" name="Sal<?php echo $i;?>" value="<?php echo $row['Sal'];?>" autocomplete="off" required> </td>
    <td> <input type="text" name="Design<?php echo $i;?>" value="<?php echo $row['Design'];?>" autocomplete="off" required> </td>
    <td> <input type="text" name="BName<?php echo $i;?>" value="<?php echo $row['BName'];?>" autocomplete="off"> </td>
    <td> <input type="text" name="AccNo<?php echo $i;?>" value="<?php echo $row['AccNo']; ?>" autocomplete="off"> </td>
    <td> <input type="text" name="IFSC<?php echo $i;?>"  value="<?php echo $row['IFSC']; ?>" autocomplete="off"> </td>
   </tr>
   <?php
    }
   ?>
  </table><br>
	<center><input type="submit" value="Update"></center>
  </div><br>
   </form>
	<?php }?>
 </body>
</html>