<?php
  session_start();
  $show=1;
  $con=mysqli_connect("localhost","root","","AddzDecor");
  if(isset($_POST["email"])) //To verify email in DB
  {
		$email=$_POST['email'];
		$q="SELECT User FROM login WHERE User LIKE BINARY '$email'";
		$r=mysqli_query($con,$q);
		$n=mysqli_num_rows($r);
		if($n==1) 
		{
			$row=mysqli_fetch_array($r);
			$_SESSION['usr']=$row["User"];
			$Domain=strstr($email,"@");
			if($Domain=="@AddzDecor.com")//To check User is Employee or not
			{
			 $e=substr($email,0,strrpos($email,"@"));
			 $r=mysqli_query($con,"select Email from employee where Email like '$e%' ");
			 $row=mysqli_fetch_array($r);
			 $email=$row['Email'];
			}
			$otp=rand(1000,9999);
			require_once("mail_function.php");
			$mail_status=sendOTP($email,$otp);
			if($mail_status==1)
			{
				$time=date("H:i:s");
				mysqli_query($con,"insert into OTP_tb values($otp,'$time')");
				$show=0;
				VerifyOTP($time);
			}
			else
			{
				$error="<b>No Internet!<br>Please check your Network connetion.</b>";
				fail($error,0,0);
			}
		}
		else
		{
			$error="<b>Email does not exists!</b>";
			fail($error,0,0);
		}
  }
  //to check OTP
  else if(isset($_POST["OTP1"])) 
  {
	    $time=$_POST['time'];
		$r=mysqli_query($con,"select * from OTP_tb where DnT='$time'");
		$row=mysqli_fetch_array($r);
		$otp=$row["OTP"];	
		$OTP=$_POST["OTP1"];
		if($otp==$OTP)
		{
		 $show=0;
		 chngPass();
		}
		else
		{
		 $error="<b>Invalid OTP!</b>";
		 $show=0;
		 fail($error,1,$time);
		}
  }
  else if(isset($_POST["P1"]))
  {
	    $usr=$_SESSION['usr'];
		session_destroy();
		$pass=$_POST["P1"];
		$q="update login set Pass='$pass' where User='$usr'";
		$show=0;
		$r=mysqli_query($con,$q);
		if($r==1)
		{
		 success();
		 mysqli_query($con,"delete from OTP_tb");
		}
  }  
  mysqli_close($con);
?>