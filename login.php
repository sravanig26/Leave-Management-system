
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body bgcolor="#333">
	<img src="banner2.jpg" class="y">	
	<div class="x">
		<center>
		<img src="login2.webp" alt="logo" class="avatar"><br><br><br>
		<form method="POST" name="form1" action="loginconn.php">
			<p align="left">USER ID</p>
			<input type="text" style="border-radius: 10px" name="uid" placeholder=" Enter USER ID" required>
			<br><br>
			<p align="left">Password</p>
			<input type="password" style="border-radius: 10px" name="pwd" placeholder=" Enter Password" onkeypress="IsCorrect(document.form1.uid)" onclick="IsCorrect(document.form1.uid)" required>
			<br><br>
			<a href="signup.php" style="color: white"> New user?</a>
			<br>
			<a href="forgot.html" style="color:white">forgot password</a>
			<input type="submit" class="btn" value="Login">
			</center>
		</form>
	</div>
	<div class="b"></div>
</body>
</html>
<script type="text/javascript">
	function IsCorrect(inputtxt){
		var letters=/^\(?(ANIL)\)?([0-9]{4})$/;
		if(!inputtxt.value.match(letters)){
			alert('please enter USER ID as ANIL****');
		}
	}
</script>

