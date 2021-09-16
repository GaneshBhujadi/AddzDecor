<?php
 session_start();
 if(isset($_SESSION["Contact"]))
 {
  $Mob=$_SESSION["Contact"];
  $con=mysqli_connect("localhost","root","","AddzDecor");
  $SAVE=mysqli_query($con,"select Save from Cart where Mob='$Mob'");
  $n=mysqli_num_rows($SAVE);
  for($i=1;$i<=$n;$i++)
  {
   $status[$i]=mysqli_fetch_array($SAVE);
   if($status[$i]['Save']=='No')
   {
    $show=$status[$i]['Save'];
    $r1=mysqli_query($con,"select * from Cart where Mob='$Mob' and Save='$show'");
    $num1=mysqli_num_rows($r1);
   }	 
   else if($status[$i]['Save']=='Yes')
   {
    $hide=$status[$i]['Save'];
    $r2=mysqli_query($con,"select * from Cart where Mob='$Mob' and Save='$hide'");
    $num2=mysqli_num_rows($r2);
    $Saved=1;
   }
  }
 }
  if(!isset($num1))
	  $num1=0;
  if(!isset($num2))
	  $Saved=0;
 ?>
<html>
 <head>
  <title>Cart</title>
  <link rel="stylesheet" href="../CSS/CartStyle.css">
  <link href="../CSS/CartStyle.css">
  <script>
   function Inc()
   {
    document.getElementById("num").stepUp();
   }
   function Dec()
   {
	document.getElementById("num").stepDown();
   }
  </script>
 </head>
 <body>
  <div id="header">
   <ul>
     <li> <a href="../Shop.php"><br>Products<br></a> </li>
	 <?php if(isset($_SESSION["Contact"])){?>
	 <li> <a href="./AddressManager.php"><br>Address</a></li>
	 <?php } ?>
   </ul>
  </div>
  <div id="view">
   <h2>My Cart <?php if(isset($num1)) echo "($num1)"; ?></h2>
   <?php if($num1<1) {?>
    <center><br><img src="../Images/shopping-logo.jpg" height="180" width="250"></img><br><br>
	<?php if(!isset($Mob))
	  echo '<br><a href="../Login.php"><button id="b">Login</button></a></center>';
      }
     else{
	 echo "<table cellspacing='10' cellpadding='20'>";
      for($i=1;$i<=$num1;$i++)
	  {
	   $row1=mysqli_fetch_array($r1);
	   $Img1[$i]=$row1["PImg"];
	   ?>
	   <div id="item">
	    <tr>
	     <td><img src="../Product/DB/PImg/<?php echo $Img1[$i];?>" height="120" width="112"></img></td>
		  <?php $Info=mysqli_query($con,"select Pname,SPrice from Product where Image='$Img1[$i]'");
		   $PP=mysqli_fetch_array($Info);
		   $SP[$i]=$PP['SPrice'];
		   $Pname[$i]=$PP['Pname']
		  ?>
		 <td> <?php echo $Pname[$i]."<br><br> ₹".$SP[$i]; ?></td>
		</tr>
		<tr>
		 <td><button id="Qtybtn" onclick="Dec()">-</button> <input id="num" type="number" value="1">
		  <button id="Qtybtn" onclick="Inc()">+</button>
		 </td>
		 <th>
		  <form action="./SaveCart.php" method="post">
		   <input type="hidden" name="Img" value="<?php echo $Img1[$i];?>">
		   <input type="hidden" name="save" value="Yes">
		   <input id="SubmitBtn" type="submit" value="SAVE FOR LATER">
		  </form>
		 </th>
		 <th>
		  <form action="./SaveCart.php" method="post">
		   <input type="hidden" name="Delete" value="<?php echo $Img1[$i];?>">
		   <input id="SubmitBtn" type="submit" value="REMOVE">
		  </form>
		 </th>
		</tr>
	   </div>
	<?php }
	 echo "</table>";}?>
	 <?php
	  if(isset($Mob) && $num1>=1){ 
      $sum=0;
	  $discount=0;
	  $disPer=10;
	  $Tax=49;
      for($i=1;$i<=$num1;$i++)
	  {
	   $sum=$sum+$SP[$i];
	   $discount=$discount+$SP[$i]/100*$disPer;
	  }
      $Total=$sum+$Tax-$discount;	
	  ?>
	  <div id="ORDERContainer">
	   <form action="./PlaceOrder.php" method="post">
	   <?php for($i=1;$i<=$num1;$i++){?>
	     <input type="hidden" name="Pname<?php echo $i;?>" value="<?php echo $Pname[$i];?>">
	     <input type="hidden" name="Price<?php echo $i;?>" value="<?php echo $SP[$i]?>">
		 <input type="hidden" name="Tax" value="<?php echo $Tax;?>">
		 <input type="hidden" name="discount" value="<?php echo $discount;?>">
	   <?php }?>
	     <input class="OrderBtn" type="submit" value="PLACE ORDER">
	   </form>
	  </div>
	  <?php }?>
  </div>
  <?php if($Saved==1){?>
   <div id="SaveForLatter">
    <h2>Saved For Latter (<?php echo $num2; ?>)</h2>
	<table>
	 <?php
      for($i=1;$i<=$num2;$i++)
	  {
	   $row2=mysqli_fetch_array($r2);
	   $img2[$i]=$row2['PImg'];
	 ?>
     <tr>
	  <td><img src="../Product/DB/PImg/<?php echo $img2[$i];?>" height="120" width="112"></img></td>
	  <?php $info=mysqli_query($con,"select Pname,SPrice from Product where Image='$img2[$i]'");
	   $pp=mysqli_fetch_array($info);
	  ?>
	  <td> <?php echo $pp['Pname']."<br><br> ₹".$pp['SPrice']; ?> </td>
	 </tr>
	 <tr>
	  <th>
	   <br>
	   <form action="./SaveCart.php" method="post">
	    <input type="hidden" name="Img" value="<?php echo $img2[$i];?>">
		<input type="hidden" name="save" value="No">
	    <input id="SubmitBtn" type="submit" value="MOVE TO CART">
	   </form>
	  </th>
	  <th>
	   <br>
	   <form action="./SaveCart.php" method="post">
	    <input type="hidden" name="Delete" value="<?php echo $img2[$i];?>">
	    <input id="SubmitBtn" type="submit" value="REMOVE">
	   </form>
	  </th>
	  </tr>
	  <?php } ?>
	</table>
   </div>
  <?php }
    if($num1>=1){ ?>
  <div id="PriceContainer">
	  <h3>PRICE DETAILS</h3>
	  <table cellspacing="30">
	   <tr>
	   <th>Price (<?php echo $num1;?>)</th>
	   <td><?php echo $sum."/-";?></td>
	   </tr>
	   <tr>
	    <th>Discount</th>
		<td><?php echo $discount." /-";?></td>
	   </tr>
	   <tr>
	    <th>Delivery Charges</th>
		<td><?php echo $Tax." /-";?></td>
	   </tr>
	   <tr>
	     <th>Total Amount</th>
		 <td><?php echo $Total." /-";?></td>
	   </tr>
	   <tr>
	    <th>You will save <?php echo $discount;?> on this order</th>
	   </tr>
	  </table>
  </div> <?php }?>
 </body>
</html>