<?php
 $size=sizeof($_POST);
 echo $records=$size/9;
 for($i=1;$i<=$records;$i++)
 {
  $index1="PId".$i;
  $Pid[$i]=$_POST[$index1];
  $index2="Pname".$i;
  $Pname[$i]=$_POST[$index2];
  $index3="Clr".$i;
  $Color[$i]=$_POST[$index3];
  $index4="Price".$i;
  $Price[$i]=$_POST[$index4]; 
  $index5="Qty".$i;
  $qty[$i]=$_POST[$index5]; 
  $index6="SPrice".$i;
  $SPrice[$i]=$_POST[$index6];
 }
 $con=mysqli_connect('localhost','root','','AddzDecor');
 for($i=1;$i<=$records;$i++)
 {
   $q="UPDATE product SET Pname='$Pname[$i]', Color='$Color[$i]', Price=$Price[$i], Qty=$qty[$i], SPrice=$SPrice[$i]
   where Pid='$Pid[$i]' ";
   mysqli_query($con,$q);
 }	
 echo mysqli_error($con)."<br>";
 mysqli_close($con);
 echo "<script>alert('Product Information Updated!');</script>";
 echo "Want To Go Back?<br>";
 echo "<a href='http://localhost/AddzDecor/Product/UpdateProd.php'>ClickHere</a>";
?>