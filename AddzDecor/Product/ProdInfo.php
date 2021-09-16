<?php include('../Condition.php') ?>
<html>
 <head>
  <title>Product</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../CSS/HeadBar.css">
  <style>
	iframe{height:700px;width:1500px;}
  </style>
 </head>
 <body>
  <div id="bar">
   <ul>
    <li class="active"><a href="../Home.php"><i class="fa fa-home"></i></a></li>
    <li><a href="./AddProd.php" target="Product">NewProduct <i class="fa fa-gift" aria-hidden="true"></i></a></li>
    <li><a href="./DelProd.php" target="Product"><i class="fa fa-trash" aria-hidden="true"></i></a></li>
	<?php if($_SESSION['User']=="Admin"){?>
     <li><a href="./UpdateProd.php" target="Product"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></li>
	<?php }?>
    <li><a href="../Logout.php"><i class="fa fa-sign-out"></i></a></li>
   </ul>   
 </div>
 <iframe src="" name="Product"></iframe>
 </body>
</html>