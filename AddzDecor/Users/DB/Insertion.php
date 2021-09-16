<?php
 session_start();
 $FName=$_POST['FName'];
 $LName=$_POST['LName'];
 $Mob=$_POST['Mob'];
 $User=$_POST['Email'];
 $Pass1=$_POST['Pass1'];
 $Pass2=$_POST['Pass2'];
 $c=strcmp($Pass1,$Pass2);
  if(filter_var($User, FILTER_VALIDATE_EMAIL))
  {
   if($c!=0)
   {
	$_SESSION["Password"]="Password does not match";
    die(header("location:http://localhost/AddzDecor/Users/CreateUser.php"));
   }
   else
   {
    $con=mysqli_connect("localhost","root","","AddzDecor");
    $q="insert into login(FName,LName,Mob,User,Pass) values('$FName','$LName','$Mob','$User','$Pass1')";   
    $r=mysqli_query($con,$q);
    if($r==1)
	{
     echo "<script>alert('Registration Successfull!');</script>";
	 echo "<a href='../../Login.php'>Login</a>";
	}
    echo mysqli_error($con);
    mysqli_close($con);
   }
  }
  else
  {
   $_SESSION["Email"]="Enter valid Email";
   header("location:http://localhost/AddzDecor/Users/CreateUser.php");    
  }
?>