<?php 
 include('./SearchProd.php');
 include('../Condition.php');
 ?>
<html>
 <head>
  <title>Update Products</title>
  <link rel="stylesheet" href="../CSS/StyleTable.css">
  <style>
   #f1{position:relative;top:30;left:20;}
   table{position:relative;left:30;top:40;}
   img:hover{height:200; width:200;}
   form input[type="text"]{width:250; padding:10px 10px; border-radius:15px;}
   form table input[type="text"],[type="number"],[type="date"]{width:170; text-align:center; border:none; background:none; height:30;}
   #b{ height:35; width:100; border-radius:10px; }
   #b:hover{ background-color:#2bab0d; color:white; }
  </style>
 </head>
 <body>
  <form id="f1" action="./UpdateProd.php" method="post">
   <input type="text" name="search" placeholder="Search Product" autocomplete="off" required>
   <input id="b" type="submit" value="Search">
  </form>
    <center><form action="./DB/Updation.php" method="post">
	<table id="table" cellspacing="20">
    <tr id="tr1">
     <th>Images</th>
     <th>PId</th>
     <th>Product Name</th>
     <th>Color</th>
     <th>Size/Dimension</th>
     <th>Material</th>
     <th>Brand</th>
     <th>Price</th>
     <th>Qty</th>
     <th>Selling Price</th>
     <th>Purchase Date</th>
    </tr>
    <?php
     for($i=1;$i<=$n;$i++)
     {
      $row=mysqli_fetch_array($r);
    ?>
    <tr id="tr2">
     <td> <img src="./DB/PImg/<?php echo $row['Image']?>" height="100px" width="100px"><br>
	</td>
     <td><?php echo $row['PId']?>
	   <input type="hidden" Name="PId<?php echo $i;?>" value="<?php echo $row['PId']?>" />
	 </td>
     <td> <input type="text" Name="Pname<?php echo $i;?>" value="<?php echo $row['Pname']?>" /> </td>
	 <td> <input type="text" Name="Clr<?php echo $i;?>" value="<?php echo $row['Color']?>"> </td>
     <td><input type="text" Name="Dim<?php echo $i;?>" value="<?php echo $row['Dimension'];?>"> </td>
     <td><input type="text" Name="Mat<?php echo $i;?>" value="<?php echo $row['Material'];?>"> </td>
     <td><input type="text" Name="Brand<?php echo $i;?>" value="<?php echo $row['Brand'];?>"> </td>
     <td> <input type="number" Name="Price<?php echo $i;?>" value="<?php echo $row['Price']?>" /> </td>
     <td> <input type="number" Name="Qty<?php echo $i;?>" value="<?php echo $row['Qty']?>" /> </td>
     <td> <input type="number" Name="SPrice<?php echo $i;?>" value="<?php echo $row['SPrice']?>" /> </td>
	 <?php
	  $d=$row['PDate'];
	  $d=explode("-",$d);
	  $D=explode(" ",$d[2]);
	  $PD=$D[0]."-".$d[1]."-".$d[0];
	 ?>
     <td><?php echo $PD;?></td>
   </tr>
    <?php
     }
    ?>
   </table><br><br><br>
   <input id="b" type="submit" value="Update">
   </form></center>
 </body>
</html>