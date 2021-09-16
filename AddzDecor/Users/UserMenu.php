<?php include('../Condition.php') ?>
<html>
 <head>
  <title>Users</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../CSS/HeadBar.css">
  <style>
	iframe{height:700px;width:1500px;}
  </style>
 </head>
 <body>
  <div id="bar">
   <ul>
    <li class="active"><a href="../Home.php"><i class="fa fa-home"></i></li>
    <li><a href="./CreateUser.php" target="User">Register</a>
    <li><a href="./DelUser.php" target="User"><i class="fa fa-trash" aria-hidden="true"></i></a> 
    <li><a href="./UpdateUser.php" target="User"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
    <li><a href="../Logout.php"><i class="fa fa-sign-out"></i></a></li>
   </ul>   
 </div>
 <iframe src="" name="User"></iframe>
 </body>
</html>