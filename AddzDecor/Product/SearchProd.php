<?php
 $con="";
 function Search($q)
 {
  global $con;
  $con=mysqli_connect('localhost','root','','AddzDecor');
  $r=mysqli_query($con,$q);
  return($r);
 }
 if(isset($_POST['search']))
 {
  $s=$_POST['search'];
  $q="select * from Product where Pid like '$s' || Pname like '%$s%' "; 
  $r=Search($q);
  $n=mysqli_num_rows($r);
 }
 else
 {
  $q="select * from Product";
  $r=Search($q);
  $n=mysqli_num_rows($r);
 }
?>