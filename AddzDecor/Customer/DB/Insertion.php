<?php include('../../Condition.php');
 include("../Invoice.php");
 $con=mysqli_connect('localhost','root','','AddzDecor');
 $PID=$_POST['PId'];
 $PName=$_POST['PName'];
 $r=mysqli_query($con,"select Pname from product where Pname='$PName' ");
 $n=mysqli_num_rows($r);
 $Mob=$_POST['Mob'];
 if($n!=1)	
  header ("location:http://localhost/AddzDecor/Customer/AddCus.php");
 else
 {
  $CName=$_POST['Name'];
  $Email=$_POST['Email'];
  $qty=$_POST['qty'];
  $Amt=$_POST['Amt'];
  $Tax=$_POST['Tax'];
  $TAmt=$_POST['TAmt'];
  $PDate=$_POST['PDate'];
  $Add=$_POST['Add'];
  $Rem=$_POST['Rem'];
  $q="insert into Customer(CName,Email,Mob,PName,qty,Amt,Tax,TAmt,PDate,Address,Rem)
     values('$CName','$Email','$Mob','$PName',$qty,$Amt,$Tax,$TAmt,'$PDate','$Add','$Rem')";
  $r=mysqli_query($con,$q);
  if($r==1)
  {
    mysqli_query($con,"update Product set qty=qty-$qty where PId='$PID'");
	//makebill("$CName","$Email","$PName",$qty,$Amt,$Tax,$TAmt,"$PDate");
  }
  else
   die("<br>Unable to send Invoice");
 }
  echo "<script>alert('Thank you! For purchassing Product')</script>";
  echo "<h2>Want To Purchase More?</h2>";
  echo "<a href='../AddCus.php'>ClickHere</a>";
 mysqli_close($con);
?>