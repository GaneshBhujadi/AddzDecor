<?php
 $s=sizeof($_POST);
 $j=1;
 for($i=1;$i<=$s;$i++,$j++)
 {
  $index="D".$j;
  if(isset($_POST[$index]))
   $d[$i]=$_POST[$index];
  else
   $i--;
 }
 $con=mysqli_connect("localhost","root","","AddzDecor");
 for($i=1;$i<=$s;$i++)
 {
  $r=mysqli_query($con,"delete from Login where SrNo=$d[$i]");
 }
 mysqli_close($con);
 if($r==1)
  echo "$r User Deleted";
 else 
  echo mysqli_error($con);
?>