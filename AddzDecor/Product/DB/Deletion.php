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
 $con=mysqli_connect('localhost','root','','AddzDecor');
 for($i=1,$t=0;$i<=$s;$i++)
 {
  $r=mysqli_query($con,"select image from product where Pid='$d[$i]'");
  $row=mysqli_fetch_array($r);
  $t=mysqli_query($con,"delete from Product where PId='$d[$i]'");
 }
 mysqli_close($con);
 if($t==1)
 {
  unlink("PImg/".$row['image']);
  echo "<h2>$s Records Deleted</h2>";
 }
 else
  echo  "<h2>$s Recored deleted<h2>";  
 echo "Want to Delete More Products?<br>";
 echo "<a href='../DelProd.php'>ClickHere</a><br>";
?>