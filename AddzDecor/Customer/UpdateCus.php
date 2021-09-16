<?php
 include('./SearchCus.php');
 include('../Condition.php');
?>
<html>
 <head>
  <title>Update Product</title>
  <link rel="stylesheet" href="../CSS/StyleTable.css">
  <style>
   #table{width: 100%;}
   #f1,#d{position:relative;left:30;top:30;}
   #d{overflow-x:auto;overflow-y:auto;}
   #b{width:100;height:30;}
   #b:hover{background-color:Green;color:white;}
  </style>
 </head>
 <body>
  <form id="f1" action="./ViewCus.php" method="post">
   <input type="text" name="search" placeholder="Search Product" autocomplete="off" required>
   <input type="submit" value="Search">
  </form><br>
   <div id="d">
   <table id="table" cellspacing='5' cellpadding="10">
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
     <th>Date & Time</th>
     <th>Address</th>
    </tr>
    <form action="./Db/Updation.php" method="post">
    <?php
     for($i=1;$i<=$n;$i++)
     {
      $row=mysqli_fetch_array($r);
    ?>
    <tr id="tr2">
     <td><?php echo $row['CId'];?><input type="hidden" name="CId<?php echo $i?>" value="<?php echo $row['CId'];?>"></td>
     <td><input type="text" name="CName<?php echo $i?>" value="<?php echo $row['CName'];?>"></td>
     <td><input type="text" name="Email<?php echo $i?>" value="<?php echo $row['Email'];?>"></td>
     <td><input type="text" name="Mob<?php echo $i?>" value="<?php echo $row['Mob'];?>"></td>
     <td><input type="text" name="PName<?php echo $i?>" value="<?php echo $row['PName'];?>"></td>
     <td><input type="text" name="qty<?php echo $i?>" value="<?php echo $row['qty'];?>"></td>
     <td><input type="text" name="Amt<?php echo $i?>" value="<?php echo $row['Amt'];?>"></td>
     <td><input type="text" name="Tax<?php echo $i?>" value="<?php echo $row['Tax'];?>"></td>
     <td><input type="text" name="TAmt<?php echo $i?>" value="<?php echo $row['TAmt'];?>"></td>
     <td><?php echo $row['PDate'];?></td>
	 <td><?php echo $row['Address'];?></td>
    </tr>
    <?php
     }
    ?>
  </table><br>
   <input id="b" type="submit" value="Update">
  </form>
 </body>
</html>