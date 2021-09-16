<?php
 $size=sizeof($_POST);
 $records=$size/11;
 for($i=1;$i<=$records;$i++)
 {
  $index="Eid$i";
  $Eid[$i]=$_POST[$index];  
  $index1="FName$i";
  $FName[$i]=$_POST[$index1];
  $index2="MName$i";
  $MName[$i]=$_POST[$index2];
  $index3="LName$i";
  $LName[$i]=$_POST[$index3];  
  $index4="Email$i";
  $Email[$i]=$_POST[$index4];
  $index5="Mob$i";
  $Mob[$i]=$_POST[$index5];
  $index7="Sal$i";
  $Sal[$i]=$_POST[$index7];
  $index8="Design$i";
  $Design[$i]=$_POST[$index8];
  $index9="BName$i";
  $BName[$i]=$_POST[$index9];
  $index10="AccNo$i";
  $AccNo[$i]=$_POST[$index10];
  $index11="IFSC$i";
  $IFSC[$i]=$_POST[$index11];
 }
 $con=mysqli_connect('localhost','root','','AddzDecor');
 for($i=1;$i<=$records;$i++)
 {
  $l[$i]=strlen($Mob[$i]);
  if($l[$i]==10)
  {
   $q="update Employee SET 
   FName='$FName[$i]',MName='$MName[$i]',LName='$LName[$i]',Email='$Email[$i]', 
   Mob='$Mob[$i]',Sal=$Sal[$i],Design='$Design[$i]',
   BName='$BName[$i]',AccNo='$AccNo[$i]',IFSC='$IFSC[$i]' where Eid='$Eid[$i]'";
   mysqli_query($con,$q);
  }
  else
  {
   header("location:http://localhost/AddzDecor/Employee/UpdateEmp.php");
   break;
  }
 }
 echo "<script>alert('Records Updated!')</script>";
 echo "<b>Want to go back</b><br>";
 echo "<a href='../UpdateEmp.php'>ClickHere</a>";
?>