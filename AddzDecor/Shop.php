<?php include("./Shop/AddToCart.php"); ?>
<html>
 <head>
  <title>Products</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./CSS/ShopStyle.css">
 </head>
 <body>
  <div id="Container">
		<div id="header">
		 <ul>
		   <li> <a href="./Shop.php"><br>Products<br></a> </li>
		   <li> <a href="./Shop/Cart.php"> 
		        <p><?php echo $num;?><br><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"></i></p> </a>
		   </li>
		  <?php if(!isset($_SESSION['login'])){?>
		      <li> <a href="./Login.php"><br>Login</a> </li>
		      <li> <a href="././Users/CreateUser.php"><br>NewUser?</a> </li>
		  <?php } else{?>
		      <li> <a href="./Logout.php"><br>LogOut <i class="fa fa-sign-out"></i> </a> </li><br>
		  <?php } ?>
		 </ul>
		</div>
		<center><form id="f1" action="./Shop.php" method="post">
		  <input type="text" name="search" placeholder="Search Product" autocomplete="off" required>
		  <input type="submit" value="Search">
		</form></center>
		<?php 
		if($n==0)
			echo "<script>alert('Product is not available');</script>";
		else{
		?>
		 <center><table id="table">
    	  <tr>
				<?php
				 for($i=1;$i<=$n;$i++)
				 {
				  $row=mysqli_fetch_array($r);
				  if($i%8==0)
				   echo "</tr> <tr>";
			    ?>
				<th>
			     <br>
				 <form action="./Shop/Details.php" method="post">
				  <button>
				  <img src="./Product/DB/PImg/<?php echo $row['Image'];?>" height="150px" width="150px" alt="Not Available">
				  <input type="hidden" name="PImg" value="<?php echo $row['Image'];?>">
				  <br><?php echo $row["Pname"];?><br></button>
				  <br><?php echo "₹".$row["SPrice"];?>
				 </form>
	   			 <form method="post">
				  <input type="hidden" name="PImage" value="<?php echo $row['Image'];?>">
				  <?php if($row['Qty']!=0){?>
				  <input class="cart" type="submit" value="Add to cart"><br><br>
				  <?php }
				  else
					echo "<b style='color:red;'>Out of stock</b>";
				  ?>
				 </form>
				</th>
			<?php
			} }
		    ?>
	      </tr>
		 </table></center>
  </div>
 </body>
</html>