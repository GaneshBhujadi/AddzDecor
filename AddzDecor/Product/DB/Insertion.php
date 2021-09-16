<?php
 $img=$_FILES['Img'];
 $ImgN=$img['name'];
 $PId=$_POST['PCode'];
 $PName=$_POST['PName'];
 $Color=$_POST['Color'];
 $sd=$_POST['SD'];
 $mat=$_POST['Mat'];
 $Brand=$_POST['Brand'];
 $Price=$_POST['Price'];
 $qty=$_POST['qty'];
 $SPrice=$_POST['SPrice'];
 $con=mysqli_connect('localhost','root','','AddzDecor');
 if(file_exists("PImg/".$img['name']))
  echo "<script>alert('Image Already Exists');</script>";
 if($img['type']=="image/jpeg" or $img['type']=="image/jpg" or $img['type']=="image/png")
 {
  move_uploaded_file($img['tmp_name'],"PImg/".$img['name']);
  $q="insert into Product(Image,PId,Pname,Color,Dimension,Material,Brand,Price,Qty,SPrice) 
  values('$ImgN','$PId','$PName','$Color','$sd','$mat','$Brand',$Price,$qty,$SPrice)";
  $r=mysqli_query($con,$q);   
  if($r==1)
   echo "<script>alert('Product Information Inserted Successfully!');</script>";
  else
  {
   echo "<script>alert('Product Insertion Faild:'); </script>";
   echo "<h3>".mysqli_error($con)."</h3>";
  }
 }
   mysqli_close($con);
  echo "<h2><a href='http://localhost/AddzDecor/Product/AddProd.php'>AddMore</a></h2>";
?>