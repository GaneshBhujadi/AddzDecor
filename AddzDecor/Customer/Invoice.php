<?php
 session_start();
 if(isset($_POST["Image"]))
 {
  $Mob=$_SESSION['Contact'];
  $con=mysqli_connect("localhost","root","","AddzDecor");
  $r=mysqli_query($con,"select FName,LName,User from Login where Mob='$Mob'");
  $row=mysqli_fetch_array($r);
  $e=$row["User"];
  echo strrpos($e,"@")."<br>";
  $Image=$_POST["Image"];
  $Price=$_POST["Price"];
  $Qty=$_POST["Qty"];
  echo $Image." ".$Price." ".$Qty;
 }
 function makebill($CName,$Email,$PName,$qty,$Amt,$Tax,$TAmt,$PDate)
 {
?>
<html>
 <head>
  <title>Invoice</title>
  <style>
   #D{width:600; height:850; text-align:left; padding:40; border:3px solid black; box-shadow:0 0 20px rgba(0,0,0,0.15);}
    table{background-color:#dddddd;}
	table #tr2 td{text-align:center;}
   #D #amt{text-align:right;}
   #D h3{position:relative; top:40; left:290; }
  </style>
 </head>
 <body>
  <center><div id='D'>
   <h1>Addz Decor</h1>
   <b>Nutan Colony Road,<br>Opposite Hotel Moonlight,<br> Aurangabad,<br>Maharashtra 431001</b>
   <p><b>Email:</b> kapadiadivyesh@gmail.com</p>
   <table border='1' cellspacing='0' cellpadding='10'>
    <tr>
     <td colspan='10'><b>Customer Name:</b> <br><br><b>Address:</b><br></td>
    </tr>
    <tr>
     <td colspan='10'> </td>
    </tr>
    <tr>
     <th>SrNo</th>
     <th colspan='4'>Description</th>
     <th>Qty</th>
     <th>Rate</th>
     <th>Amount</th>
    </tr>
	<?php for($i=1;$i<=10;$i++){?>
	<tr id="tr2">
	 <td><?php echo $i;?>)</td>
	 <td colspan="4"></td>
	 <td></td>
	 <td></td>
	 <td></td>
	</tr>
	<?php } ?>
	<tr id='amt'>
	 <td colspan='10'><b>Tax </b><br><b>Total</b> </td>
	</tr>
   </table>
  </div></center>
 </body>
</html>
 <?php
 }
?>