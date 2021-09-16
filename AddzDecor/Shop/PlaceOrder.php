<?php
 session_start();
 $mob=$_SESSION["Contact"];
 $con=mysqli_connect("localhost","root","","AddzDecor");
 $address=mysqli_query($con,"select Address from login where Mob='$mob'");
 $ADD=mysqli_fetch_array($address);
 $add=$ADD["Address"];
 if($add=="")
  die(header("Location:http://localhost/AddzDecor/Shop/AddressManager.php"));
 $n=sizeof($_POST)/3;
 for($i=1;$i<=$n;$i++)
 {
  $index1="Pname".$i;
  $Pname[$i]=$_POST[$index1];
  $index2="Price".$i;
  $Price[$i]=$_POST[$index2];
 }
 $Tax=$_POST["Tax"];
 $discount=$_POST["discount"];
 $r=mysqli_query($con,"select Fname,Lname,User from login where Mob='$mob'");
 $row=mysqli_fetch_array($r);
 $fname=$row["Fname"];
 $Lname=$row["Lname"];
 $User=$row["User"];
 if(strpos($User,"@AddzDecor.com")!==false)
 {
	$name=substr($User,0,strrpos($User,"@"));
	$User="$name@gmail.com";
 }
 $M=mysqli_query($con,"select Email from Employee where Design='Manager'");
 if($m=mysqli_fetch_array($M))
 {
  $manager=$m["Email"];
  for($i=1;$i<=$n;$i++)
  {
    $TAmt=$Price[$i]+$Tax;
    $q="insert into customer(CName,Email,Mob,Pname,qty,Amt,Tax,TAmt,Address)
    values('$fname $Lname','$User','$mob','$Pname[$i]',1,$Price[$i],$Tax,$TAmt,'$add')";
    if(mysqli_query($con,$q))
    {
     $to=$manager;
     $sub="Product Delivery";
     $body="Hi,\n We have new order! \n Please check the below details.
 	  \n Customer Name : $fname $Lname\n Email : $User\t Mob : $mob\n Product : $Pname[$i]\t Price : $Price[$i]
	  Qty : 1\t Tax : $Tax\n Total : $TAmt\n\nAddress : $add";
     $headers="From: ganeshbhujadi@outlook.com";
     if(mail($to,$sub,$body,$headers))
	 {
	  mysqli_query($con,"update Product set qty=qty-1 where Pname='$Pname[$i]'");
	  mysqli_query($con,"delete from cart where Save='No' and Mob='$mob'");
	  echo "<script>alert('Thank you for ordering the product');</script>";
	 }
	 else
	 {
	  mysqli_query($con,"delete from customer where Pname='$Pname[$i]' and Mob='$mob'");
	  echo "<script>alert('Product ordering failed');</script>";
	 }
    }   
  }
 }
 else
	echo "<script>alert('Server busy can't place order');</script>"; 
?>