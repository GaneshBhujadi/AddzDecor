<?php 
include('../Condition.php');
include('./SearchCus.php');
?>
<html>
 <head>
  <title>Remove Customer</title>
  <link rel="stylesheet" href="../CSS/StyleTable.css">
  <script src="../Js/CheckAll.js"></script>
  <style>
   #table{position:relative;top:15;left:10;width: 100%;}
   #d{overflow-x:auto;overflow-y:auto;}
   #b{width:100;height:40;}
   #b:hover{background-color:Green;color:white;}
   #table{overflow-x:auto;}
  </style>
 </head>
 <body>
  <br><form id="f1" action="./DelCus.php" method="post">
   <input type="text" name="search" placeholder="Search Product" autocomplete="off" required>
   <input type="submit" value="Search">
  </form>
  <div id="d">
   <table id="table" cellpadding="10">
   <tr id="tr1">
    <th>CId</th>
    <th>Customer</th>
    <th>Email</th>
    <th>Mob</th>
    <th>Product</th>
    <th>Qty</th>
    <th>Price</th>
    <th>Tax</th>
    <th>Total Amount</th>
    <th>Date</th>
    <th>Address</th>
    <th>Remark</th>
	<?php if($_SESSION['User']=="Admin"){?>
     <th>SelectAll<input type="checkbox" id="select" onclick="SelectAll()"></th>
	<?php }?>
   </tr>
   <form action="./DB/deletion.php" method="post">
   <?php
    for($i=1;$i<=$n;$i++)
    {
     $row=mysqli_fetch_array($r);
	 $d=explode("-",$row['PDate']);
   ?>
   <tr id="tr2">
    <td><?php echo $row['CId'];?></td>
    <td><?php echo $row['CName'];?></td>
    <td><?php echo $row['Email'];?></td>
    <td><?php echo $row['Mob'];?></td>
    <td><?php echo $row['PName'];?></td>
    <td><?php echo $row['qty'];?></td>
    <td><?php echo $row['Amt'];?></td>
    <td><?php echo $row['Tax'];?></td>
    <td><?php echo $row['TAmt'];?></td>
    <td><?php echo $d[2]."/".$d[1]."/".$d[0]?></td>
    <td><?php echo $row['Address'];?></td>
    <td><?php echo $row['Rem'];?></td>
	<?php if($_SESSION['User']=="Admin"){?>
     <th><input id="chk" type="checkbox" name="c<?php echo $i;?>" value="<?php echo $row['CId'];?>"></th>
	<?php }?>
   </tr>
   <?php
    }
   ?>
  </table><br>
  <?php if($_SESSION['User']=="Admin"){?>
   <br><input id="b" type="submit" value="Remove">
  <?php }?>
   </div>
   </form>
 </body>
</html>