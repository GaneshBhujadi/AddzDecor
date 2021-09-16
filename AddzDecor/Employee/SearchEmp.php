<?php
 function Search($q)
 {
  $con=mysqli_connect('localhost','root','','AddzDecor');
  $r=mysqli_query($con,$q);
  mysqli_close($con);
  return($r);
 }
 if(isset($_POST['search']))
 {
  $s=$_POST['search'];
  $q="select * from Employee where Fname like '%$s%' || Mname like '%$s%' || Lname like'%$s%' ";
  $r=Search($q);
  $n=mysqli_num_rows($r);
 }
 else
 {
  $q="select * from Employee";
  $r=Search($q);
  $n=mysqli_num_rows($r);
 }
?>