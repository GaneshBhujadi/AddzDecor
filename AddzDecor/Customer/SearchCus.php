<?php
 function search($q)
 {
  $con=mysqli_connect('localhost','root','','AddzDecor');
  $r=mysqli_query($con,$q);
  mysqli_close($con);
  return($r);
 }
 if(isset($_POST['search']))
 {
  $s=$_POST['search'];
  $q="select customer where CName like '%$s%' || Mob like '%$s%'";
  $r=search($q);
  $n=mysqli_num_rows($r);
 }
 else
 {
  $q="select * from customer";
  $r=search($q);
  $n=mysqli_num_rows($r);
 }
?>