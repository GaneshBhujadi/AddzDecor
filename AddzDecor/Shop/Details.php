<?php
 include("../Product/SearchProd.php");
 $PImg=$_POST['PImg'];
 $q="select * from Product where Image='$PImg'";
 $r=Search($q);
 $row=mysqli_fetch_array($r);
?>
<html>
 <head>
  <title>Product Details</title>
  <style>
  *{
  padding:0;
  margin:0;
  box-sizing:border-box;
  }
  body {
    font-size: 14px;
    background-color: #f1f3f6;
    color: #212121;
    line-height: 1.4;
  }
  #D1{background-color:#ffff; margin:80; width:300; height:300; border-style: groove; }
  #D1 img{margin:20;}
  #D2{position:absolute; top:80; left:400;}
  #D2 th{text-align:left;}
 .cart{
 	  padding:10px 20px; 
 	  width:150;
 	  background:orange;
 	  border:#d1e8ff 1px solid;
 	  color:#FFF;
 	  border-radius:100px;
 	 }
 .cart:hover{
 			background:#2c7ac5;
 		}
  </style>
 </head>
 <body>
  <div id="D1">
    <form action="./AddToCart.php" method="post">
	 <img src="../Product/DB/PImg/<?php echo $row['Image'];?>" width="250" height="250"><br>
	 <input type="hidden" name="PImage" value="<?php echo $row['Image'];?>">
	  <?php if($row['Qty']!=0){?>
	    <br><input class="cart" type="submit" value="Add to cart"><br><br>
	  <?php }
		 else
		  echo "<b style='color:red;'>Out of stock</b>";
		 ?>
	</form>
  </div>
  <div id="D2">
   <table cellspacing="20">
    <tr>
	 <th><?php echo "Name</th> <td>". $row['Pname']; ?></td>
    </tr>
	<tr>
     <th><?php echo "Color</th> <td>".$row['Color'];?></td>
	</tr>
	<tr>
	 <th><?php echo "Dimension</th><td>".$row['Dimension'];?></td>
	</tr>
	<tr>
	 <th><?php echo "Material</th><td>".$row['Material'];?></td>
	</tr>
	<tr>
	 <th><?php echo "Brand</th><td>".$row['Brand'];?></td>
	</tr>
	<tr>
	 <th><?php echo "Price</th><td>₹".$row['SPrice'];?></td>
	</tr>
   </table>
  </div>
 </body>
</html>
						 