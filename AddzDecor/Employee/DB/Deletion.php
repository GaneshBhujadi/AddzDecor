<?php
 $size=sizeOf($_POST);
 for($i=1,$j=1;$i<=$size;$i++,$j++)
 {
  $index="D$j"	;
  if(isset($_POST[$index]))
	$d[$i]=$_POST[$index];
  else
	$i--;
 }
 $con=mysqli_connect('localhost','root','','AddzDecor');
 for($i=1,$t=0;$i<=$size;$i++)
 {
  $q="delete from Employee where Eid=$d[$i]";
  $t=mysqli_query($con,$q);
 }
 mysqli_close($con);
 if($t==1)
  echo "<h1>$size Records Deleted</h1>";
 else
  echo "<h1>$size Records Deleteded</h1>";
 echo "<b>Want to Delete More..?</b><br>";
 echo "<a href='../DelEmp.php'>ClickHere</a>";

?>