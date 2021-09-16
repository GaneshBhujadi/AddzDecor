<?php include("./chkCredentials .php");?>
<html>
 <head>
  <title>Forget Password</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../CSS/Forget_Frm.css">
  <script src="../Js/show.js"></script>
 </head>
 <body>
  <?php function fail($error,$c,$time){ ?>
			<div id="error">
				<div class="msg"><?php echo $error; ?></div>
			</div>
  <?php if($c==1)
		  VerifyOTP($time);
		} ?>
	<div class="frmUer">
		<?php if($show==1){ ?>
				<form method="post">
					<h2>Enter Your Login Email</h2><br>
					<br><label for="OTP"></label> <input class="login-input" type="text" placeholder="Email" name="email" autofocus autocomplete="off" required /><br>
					<br><input class="btnSubmit" type="submit"> <a href="http://localhost/AddzDecor/Login.php">Back</a>
				</form>
	</div>
	<?php } function VerifyOTP($time){?>
			<div class="frmUer">
				<form method="post">
					<h2>Enter OTP</h2><br>
					<p style="color:#31ab00;">Check your email for the OTP</p>
					<br><label for="OTP"></label> <input id="OTP" class="login-input" type="text" placeholder="One Time Password" name="OTP1" autofocus autocomplete="off" required /><br>
					<input type="hidden" name="time" value="<?php echo $time;?>">
					<br><input class="btnSubmit" type="submit"> <a href="http://localhost/AddzDecor/ForgetPass/ForgetPass.php">Back</a>
				</form>
			</div>
	<?php } function chngPass(){ ?>
			<div class="frmUer">
				<form method="post">
					<h2>Set New Password</h2><br>
					<br><label>New Password</label> <input id="p1" class="login-input" type="password" placeholder="Password" name="P1" autofocus autocomplete="off" required />
					<b class="fa fa-eye" aria-hidden="true" onclick="Show()"> </b><br>
					<br><label>Confirm Password</label> <input id="p1" class="login-input" type="password" placeholder="Password " name="P2" autocomplete="off" required /><br>
					<br><input class="btnSubmit" type="submit"><a href="http://localhost/AddzDecor/Login.php">Exit</a>  
				</form>
	</div>
	<?php } function success(){ ?>
		<div class="frmUer">
			<div class="msg">Your Password changed successfully<br><p><a href="http://localhost/AddzDecor/Login.php">Login</a></p></div>
		</div>
	<?php }?> 
 </body>
</html>
