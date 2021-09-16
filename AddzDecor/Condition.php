<?php
 session_start();
 if(!isset($_SESSION['login']))
  header("location:http://localhost/AddzDecor/Login.php");
?>
