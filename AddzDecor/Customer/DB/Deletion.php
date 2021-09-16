<?php
 $s=sizeof($_POST);
 $j=1;
 for($i=1;$i<=$s;$i++,$j++)
 {
   $index="c".$j;
   if(isset($_POST[$index]))
    $d[$i]=$_POST[$index];
   else
    $i--;
 }
 $con=mysqli_connect("localhost","root","","AddzDecor");
 for($k=1;$k<=$s;$k++)
 {
  $t=mysqli_query($con,"delete from customer where Cid=$d[$k]");
 }
 mysqli_close($con);
?>