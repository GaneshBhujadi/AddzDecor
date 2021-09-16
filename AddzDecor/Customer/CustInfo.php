<?php include('../Condition.php') ?>
<html>
 <head>
  <title>Customer</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../CSS/HeadBar.css">
  <style>iframe{height:700px;width:1550px;}</style>
 </head>
 <body>
  <div id="bar">
   <ul>
    <li class="active"><a href="../Home.php"><i class="fa fa-home"></i></a></li>   
    <li><a href="./AddCus.php" target="Customer">Purchase <i class="fa fa-usd" aria-hidden="true"></i></a> 
    <li><a href="./DelCus.php" target="Customer"><i class="fa fa-trash" aria-hidden="true"></i></a> 
    <?php if($_SESSION['User']=="Admin"){?>
	 <li><a href="./UpdateCus.php" target="Customer"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
	<?php }?>
	<li><a href="../Logout.php"><i class="fa fa-sign-out"></i></a></li>
   </ul>   
 </div>
 <iframe src="" name="Customer" scrolling="off"></iframe>
 </body>
</html>