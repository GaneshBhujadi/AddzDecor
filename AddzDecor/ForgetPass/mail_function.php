<?php	
 function sendOTP($Email,$otp)
 {
  $r=0;
  $to=$Email;
  $sub="Login credentials";
  $body="Your OTP\n $otp";
  $headers="From: ganeshbhujadi@outlook.com";
  if(mail($to,$sub,$body,$headers))
   $r=1;
  return $r;
 }
?>