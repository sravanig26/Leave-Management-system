<?php

session_start();
?>
<html>
<head>
	<title> home page </title>
	<link rel="stylesheet" href="facdetailscss.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
	<img src="banner2.jpg" alt="banner" class="image1">
	<!--<div class="vl"></div>-->
	<div class="tab">
		<a href="leavestatus.php" style="text-decoration:none;"><button class="leavestatus"><b>Leave Status</b></button></a>
		<a href="adjustments3.php" style="text-decoration:none;"><button class="Adjustments"><b>Adjustments</b></button></a>
	</div>
	<?php 
		$conn = mysqli_connect("localhost","root","","project_lms");
		if (mysqli_connect_errno()) {
			die(sprintf("Connect failed: %s\n", mysqli_connect_error()));
		}
		$userid=$_SESSION['login_user'];
		$sql = "SELECT userid, name, gender, email, mobile from users WHERE userid ='$userid'";
		
		$result = mysqli_query($conn, $sql);
		if ($result==false)
		{
			echo "Something Wrong!";
		}
		else  {
		$count=mysqli_num_rows($result);
		
		
	?>
	<div class="details"> 
		
		<?php if($count==1)
		{
			$row = mysqli_fetch_array($result);
		?>
		<br><b>Emp id: <?php echo $row["userid"] ?> </b><br><br>
		<b>Name: <?php echo $row["name"] ?> </b><br><br>
		<b>Gender: <?php echo $row["gender"] ?> </b><br><br>
		<b>Mail id: <?php echo $row["email"] ?> </b><br><br>
		<b>Contact: <?php echo $row["mobile"] ?> </b><br><br>
		<?php
			}
		}
		?>
	</div>
	<a href="logout.php"><button class="logout"><b>Log Out</b></button></a>
	<a href="reason.php"><button class="leave"><b>Apply Leave</b></button></a>
	<div class="footer"></div>
</body>
</html>
