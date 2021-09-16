<?php
 include('../Condition.php');	 
 include('./SearchProd.php');
?>
<html>
 <head>
  <title>Delete Product</title>
  <link rel="stylesheet" href="../CSS/StyleTable.css">
  <script src="../Js/CheckAll.js"></script>
  <style>
   #f1{position:relative;top:10;left:70;}
   #table{position:relative;top:15;left:10;width: 100%;}
   input[type="text"]{height:40; Width:200; border-radius:10px; text-align:center;}
   table td{text-align:center;}
   .b{ width:120; height:40; border-radius:10px;}
   .b:hover{background-color:#2bab0d; color:white;}
   img:hover{height:200;width:200;}
  </style>
 </head>
 <body>
  <br><form id="f1" action="./DelProd.php" method="post">
   <input type="text" name="search" placeholder="Search Product" autocomplete="off" required>
   <input class="b" type="submit" value="Search">
  </form><br>
  <center><table id="table"></center>
  <tr id="tr1">
  <th>Image</th>
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
  <?php if($_SESSION['User']=="Admin"){?>
   <th>SelectAll<br><input type="checkbox" id="select" onclick="SelectAll()"></th>   
  <?php }?>
  </tr>
  <form action="./DB/Deletion.php" method="post" >
  <?php
   for($i=1;$i<=$n;$i++)
   { 
    $row=mysqli_fetch_array($r);
  ?>   
   <tr id="tr2">
     <td> <img src="./DB/PImg/<?php echo $row['Image'];?>" height="100px" width="100px"></td> 
     <td> <?php echo $row['PId']?></td>
     <td> <?php echo $row['Pname']?></td>
     <td> <?php echo $row['Color']?></td>
     <td> <?php echo $row['Dimension'];?></td>
     <td> <?php echo $row['Material'];?></td>
     <td> <?php echo $row['Brand'];?></td>
     <td> <?php echo $row['Price'];?></td>
     <td> <?php echo $row['Qty'];?></td>
     <td> <?php echo $row['SPrice'];?></td>
	 <?php
	  $d=$row['PDate'];
	  $d=explode("-",$d);
	  $D=explode(" ",$d[2]);
	  $PD=$D[0]."-".$d[1]."-".$d[0];
	 ?>
     <td> <?php echo $PD;?></td>
	<?php if($_SESSION['User']=="Admin"){?>
     <th> <input id="chk" type="checkbox" name="D<?php echo $i;?>" value="<?php echo $row['PId'];?>"></th>
	<?php } ?>
   </tr>
  <?php
   }
   ?>
  </table>
  <br><br><input class="b" type="submit" value="Delete">
  </form>
 </body>
</html>
