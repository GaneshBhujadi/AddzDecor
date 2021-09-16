<?php include('../Condition.php');
 $v=0;
 if(isset($_POST['PId']))
 {
  $PId=$_POST['PId'];
  $q=$_POST['qty'];
  $con=mysqli_connect('localhost','root','','AddzDecor');
  $r=mysqli_query($con,"select Image,PId,Pname,Color,SPrice,qty from Product where PId='$PId'");
  mysqli_close($con);
   $row=mysqli_fetch_array($r);
  if(mysqli_num_rows($r)!=1)
   echo "<script>alert('Enter valid Product Id');</script>";
  elseif(mysqli_num_rows($r)==1)
  {
   $avail=$row['qty'];
   if($avail<1)
    echo "<script>alert('The Product is out of stock')</script>";
   elseif($avail<$q)
	echo "<script>alert('We do not have enough products')</script>";
   else
   {
    $v=1;  
    $p=$row['SPrice']*$q;
    $t=$p/10;
    $total=$p+$t;
   }
  }
 }
 ?>
<html>
 <head>
  <title>Customer</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
   #Disp{position:relative;left:280; top:20;width:700; height:335;}
   .size{width:250;height:25;}
   .B{width:130;height:25;}
  </style>
 </head>
 <body>
  <div id="Disp">
   <form action="./AddCus.php" method="post">
    <input class="size" type="text" placeholder="Product Id" autocomplete="off" name="PId" required>
	<input class="size" type="number" placeholder="Qty" autocomplete="off" name="qty" required>
	<input type="submit" value="MakeBill">
   </form>
   <table>
   <form action="./DB/Insertion.php" method="post"> 
    <tr>
	 <td><input class="size" type="text" placeholder="Full Name" name="Name" autocomplete="off" required></td>
     <td><input class="size" type="text" placeholder="Email" name="Email" autocomplete="off" required></td>
	</tr>
    <tr>
	 <td><br><input class="size" type="number" placeholder="Contact" name="Mob" required></td>
	</tr>
	<?php if($v==1){ ?>
	<tr>
	 <th><br>Product Name</th><th><br>Amount</th>
	</tr>
	<tr>
	<th><br><?php echo $row['Pname']; ?>
	 <input type="hidden" name="PId" value="<?php echo $row['PId'];?>">
	 <input type="hidden" name="PName" value="<?php echo $row['Pname'];?>">
	</th>
     <th><br><?php echo $p?></th>
	 <td><input type="hidden" name="Amt" value="<?php echo $row['SPrice'];?>"></td>
	</tr>
	<tr>
	 <th><br>Qty<br><br><?php echo $q;?><input type="hidden" name="qty" value="<?php echo $q;?>"></th>
	 <th><br>Tax<br><br><?php echo $t;?><input type="hidden" name="Tax" value="<?php echo $t;?>"></th>
	</tr>
    <tr>
     <th><br>Total<br><br><?php echo $total;?> <i class="fa fa-inr" aria-hidden="true"></i>
	  <input type="hidden" name="TAmt" value="<?php echo $total;?>" >
	 </th>
	</tr>
    <tr>
	 <td><br>Purchase Date<br><input class="size" type="date" name="PDate" required></td>
	</tr>
	<?php }$v=0;?>
    <tr>
	 <td><br> <textarea  placeholder="Address" rows="3" cols="40" name="Add"></textarea></td>
     <td><br> <textarea  placeholder="Remark" rows="3" cols="40" name="Rem"></textarea></td>
    </tr>
    <tr>
	 <td><br><input class="B" type="submit" value="Purchase"> <input class="B" type="reset" value="Clear"></td>
    </tr>
  </form>
  </div>
 </body>
</html> 