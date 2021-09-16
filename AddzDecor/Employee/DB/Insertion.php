<?php
 function SendMail($usr,$p,$FName,$Email)
 {
  $to=$Email;
  $sub="Login credentials";
  $body="Hi".$FName.",\n This mail is for your login credentials for AddzDecor.\n User\t".$usr."\n Password\t".$p;
  $headers="From: ganeshbhujadi@outlook.com";
  if(mail($to,$sub,$body,$headers))
   echo "Email successfully sent to $to...";
  else
   echo "Email sending failed...";
 }
 $FName=$_POST['FName'];
 $MName=$_POST['MName'];
 $Email=$_POST['Email'];
 $LName=$_POST['LName'];
 $Mob=$_POST['Mob'];
 $JDate=$_POST['JDate'];
 $Sal=$_POST['Sal'];
 $Design=$_POST['Design'];
 $BName=$_POST['BName'];
 $Acc= $_POST['Acc'];
 $IFSC=$_POST['IFSC'];
 $con=mysqli_connect('localhost','root','','AddzDecor');
 $q="insert into Employee(FName,MName,LName,Email,Mob,JDate,Sal,Design,BName,AccNo,IFSC)
 values('$FName','$MName','$LName','$Email','$Mob','$JDate','$Sal','$Design','$BName','$Acc','$IFSC')"; 
 $r=mysqli_query($con,$q);
 if($r==1)
 {
  echo "<script>alert('Employee Information Inserted Successfully!');</script>";
  $d=explode("-",$JDate);
  $fn=substr($Email,0,strrpos($Email,"@"));
  $usr="$fn@AddzDecor.com";
  $p="$fn@$d[1]$d[2]";
  $q="insert into login(FName,LName,Mob,User,Pass)values('$FName','$LName','$Mob','$usr','$p')";
  $result=mysqli_query($con,$q);
  if($result==1)
   SendMail($usr,$p,$FName,$Email);
  else
   echo mysqli_error($con);
 }
 else
 {
  echo "<script>alert('Employee Information Insertion Failed!');</script>";  
  echo "<h1>".mysqli_error($con)."</h1>";
 }
 mysqli_close($con);
 echo "<br><b>Want To Add Employee Information Again?<br>";
 echo "<a href='http://localhost/AddzDecor/Employee/AddEmp.html'>ClickHere</a>";
?>