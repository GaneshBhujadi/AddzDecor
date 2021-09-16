<?php
 $s=sizeof($_POST);
 $rec=$s/9;
 for($i=1;$i<=$rec;$i++)
 {
  $index1="CId".$i;
  $CId[$i]=$_POST[$index1];
  $index2="CName".$i;
  $CName[$i]=$_POST[$index2];
  $index3="Email".$i;
  $Email[$i]=$_POST[$index3];
  $index4="Mob".$i;
  $Mob[$i]=$_POST[$index4];
  $index5="PName".$i;
  $PName[$i]=$_POST[$index5];
  $index6="qty".$i;
  $qty[$i]=$_POST[$index6];
  $index7="Amt".$i;
  $Amt[$i]=$_POST[$index7];
  $index8="Tax".$i;
  $Tax[$i]=$_POST[$index8];
  $index9="TAmt".$i;
  $TAmt[$i]=$_POST[$index9];
 }
 $con=mysqli_connect('localhost','root','','AddzDecor');
 for($i=1;$i<=$rec;$i++)
 {
  $q="UPDATE Customer set CName='$CName[$i]', Email='$Email[$i]', Mob='$Mob[$i]',
      PName='$PName[$i]',qty=$qty[$i],Amt=$Amt[$i],Tax=$Tax[$i], TAmt=$TAmt[$i] where CId=$CId[$i] ";
  mysqli_query($con,$q);
 }
  echo mysqli_error($con);
  echo "<script>alert('Records Updated!')</script>";
?>