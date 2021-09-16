<?php
  session_start();
  $Mob=$_SESSION["Contact"];
  $con=mysqli_connect("localhost","root","","AddzDecor");
  if(isset($_POST["Img"]))
  {
   $Img=$_POST["Img"];
   $save=$_POST["save"];
   mysqli_query($con,"update cart set Save='$save' where Mob='$Mob' and PImg='$Img'");
   header("location:http://localhost/AddzDecor/Product/DB/Cart.php");
  }
  if(isset($_POST["Delete"]))
  {
   $d=$_POST["Delete"];
   mysqli_query($con,"Delete from Cart where PImg='$d' and Mob='$Mob'");
   header("location:http://localhost/AddzDecor/Product/DB/Cart.php");
  }
  mysqli_close($con);
  /*if(isset($_POST["qty"]))
  {
    $qty=$_POST["qty"];
    $Image=$_POST["Image"];
    mysqli_query($con,"Update Cart set Qty='$qty' where PImg='$Image' and Mob='$Mob'");
  }*/
?>