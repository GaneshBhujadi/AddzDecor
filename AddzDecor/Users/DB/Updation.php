<?php
 $s=sizeOf($_POST);
 $r=$s/6;
 for($i=1;$i<=$r;$i++)
 {
  $index1="SrNo".$i;
  $SrNo[$i]=$_POST[$index1];
  $index2="FName".$i;
  $FName[$i]=$_POST[$index2];
  $index3="LName".$i;
  $LName[$i]=$_POST[$index3];
  $index4="Mob".$i;
  $Mob[$i]=$_POST[$index4];  
  $index5="User".$i;
  $User[$i]=$_POST[$index5];
  $index6="Pass".$i;
  $Pass[$i]=$_POST[$index6];
 }
 $con=mysqli_connect("localhost","root","","AddzDecor");
 for($i=1;$i<=$r;$i++)
 {
  $q="UPDATE Login SET FName='$FName[$i]',LName='$LName[$i]',Mob='$Mob[$i]',User='$User[$i]',Pass='$Pass[$i]' where SrNo=$SrNo[$i]";
  $r=mysqli_query($con,$q);
 }
 echo "<br>".$r;
 echo "<br>".mysqli_error($con);
 mysqli_close($con);
?>