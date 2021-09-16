<?php include('Condition.php') ?>
<html>
 <head>
  <title>Home</title>
  <style>
   body{
	background-image: url("./Images/adolfo-felix-uo7AHIpjOu0-unsplash.jpg");
    background-repeat: no-repeat;
	background-size: 100% 720px;
   }
   #home{position:relative;top:100;left:650;text-align:center;height:200;width:200;}
   #home button{height:25;width:80;}
   h1,h2{color:red;}
  </style>
 </head>
 <body>
  <h1 style="text-align:center;"><i>Addz Decor</i></h1>
  <div id="home">
   <h2>Welcome <?php echo $_SESSION['login']; ?></h2>
   <a href="./Product/ProdInfo.php"><button>Product</button></a> 
   <?php if($_SESSION['User']=="Admin"){?>
    <a href="./Employee/EmpInfo.php"><button>Employee</button></a> <br>
   <?php }?>
   <br><a href="./Customer/CustInfo.php"><button>Customer</button></a>
   <a href="LogOut.php"><button>Logout</button></a>
  </div>
 </body>
</html>