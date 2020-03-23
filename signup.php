<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<body bgcolor="#333">
	<img src="banner2.jpg" class="y">
	<div class="x" style="padding: 20px 40px 20px 40px;position: absolute;top: 45%;">
	<h1 style="color: black"><center>SignUp Form</center></h1><br>
	<form name="form" action="signupconn.php" method="post">
		<p>Name</p>
		<input type="text" style="border-radius:10px;padding-left:4px" name="name" placeholder="Enter Name" required><br><br>
		<p>ID</p>
		<input type="text" style="border-radius:10px;padding-left:4px" name="id" placeholder="Enter ID" required><br><br>
		<p>Mobile No.</p>
		<input type="number" style="border-radius:10px;padding-left:4px" name="mobno" placeholder="Enter Mobile Number" onclick="IsCorrect(document.form.id)" required><br><br>
		<p>Age</p>
		<input type="number" style="border-radius:10px;padding-left:4px" name="age" placeholder="age" onclick="IsMob(document.form.mobno)" required><br><br>
		<p>Gender</p>
		<select name="gender" style="border-radius:10px;padding-left:4px">
		<option class="opt1" value="male"> Male</option>
		<option class="opt2" value="female"> Female</option>
		</select><br><br>
		<p>Email</p>
		<input type="email" style="border-radius:10px;padding-left:4px" name="email" placeholder="Enter Email" onclick="IsAge(document.form.age)"><br><br>
		<p>Date of Joining</p>
		<input type="date" style="border-radius:10px;padding-left:4px" name="doj" onclick="IsEmail(document.form.email)" required/><br><br>
		<p>Password</p>
		<input type="password" style="border-radius:10px;padding-left:4px" name="password" placeholder="Enter Password" required/><br><br>
		<p>Confirm Password</p>
		<input type="password" style="border-radius:10px;padding-left:4px" name="password1" placeholder="Enter Confirm Password" required><br><br><br>
		<input type="submit" class="btn" style="position:absolute;top:87%;" value="Signup" onclick="ValidateEmail(document.form.email);phonenumber(document.form.mobno);"><br><br>
		<div class="al">
			<a href="login.php">Already have an account?</a>
		</div>
	</form>
	</div>
	<div class="b" style="position: absolute;top: 151%"></div>
</body>
</html>
<script type="text/javascript">
	function IsCorrect(inputtxt){
		var letters=/^\(?(ANIL)\)?([0-9]{4})$/;
		if(!inputtxt.value.match(letters)){
			alert('please enter USER ID as ANIL****');
		}
	}
	function IsMob(inputtxt){
		var no=/^\d{10}$/;
		if(!inputtxt.value.match(no)){
			alert("wrong format, insufficient size");
		}
	}
	function IsAge(inputtxt){
		var no=/^\d{1,2}$/;
		if(!inputtxt.value.match(no)){
			alert("age can't be greater than 99yrs.");
		}
	}
	function IsEmail(inputtxt){
		var mailformat=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		if(!inputtxt.value.match(mailformat)){
			alert("You have entered an invalid email address!");
		}
	}
</script>