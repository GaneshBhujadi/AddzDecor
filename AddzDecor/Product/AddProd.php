<?php include('../Condition.php') ?>
<html>
 <head>
  <title>Add Product</title>
  <style>
   h1{text-align:center;}
   .size{width:250;height:25;}
   .B:hover{background-color:#2bab0d;color:white;}
   .B{width:120;height:30;}
  </style> 	
 </head>
 <body>
  <form action="./DB/Insertion.php" method="post" enctype="multipart/form-data"> 
   <br><label for="Label">Upload Image: </label> <input id="Label" type="file" name="Img" required><br>
   <br><input class="size" type="text" placeholder="Product Code" name="PCode" autocomplete="off" autofocus required>
       <input class="size" type="text" placeholder="Product Name" name="PName" autocomplete="off" required><br>
   <br><input class="size" type="text" placeholder="Color" name="Color" autocomplete="off">
       <input class="size" type="text" placeholder="Size/Dimension" name="SD" autocomplete="off"><br>
   <br><input class="size" type="text" placeholder="Material" name="Mat" autocomplete="off">
       <input class="size" type="text" placeholder="Brand" name="Brand" autocomplete="off"><br>
   <br><input class="size" type="number" placeholder="Purchase Price" name="Price" required>
       <input class="size" type="number" placeholder="Qty" name="qty" required><br>
   <br><input class="size" type="number" placeholder="Selling Price" name="SPrice" required><br>
   <br><input class="B" type="submit" value="AddProduct"> <input class="B" type="reset" value="Clear">
  </form>
 </body>
</html>