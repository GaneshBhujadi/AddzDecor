<?php 
 session_start();
 include('./Product/SearchProd.php');
 global $con;
 if(isset($_SESSION["Contact"]))
 {
  $Mob=$_SESSION["Contact"];
  $c=mysqli_query($con,"select SrNo from Cart where Mob='$Mob' and Save='No' ");
  $num=mysqli_num_rows($c);
 }
 else
 {
  $num=0;
  $Mob=0;
 }
 if(isset($_POST["PImage"]))
 {
  if(!isset($_SESSION["Contact"]))
	echo "<script>alert('Please Login First');</script>";
  else
  {
   $PImg=$_POST["PImage"];
   $search=mysqli_query($con,"select PImg from cart where Mob='$Mob' and PImg='$PImg'");
   if(mysqli_num_rows($search))
    echo "<script>alert('Product already added in your cart');</script>";
   else
   {
     mysqli_query($con,"insert into Cart(PImg,Mob,Qty)values('$PImg','$Mob',1)");
	 header("location:http://localhost/AddzDecor/Shop.php");
   }
   mysqli_close($con);
  }
 }
 ?>