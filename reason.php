<?php

session_start();
?>
<html>
	<head>
		<title>Reason</title>
		<link rel="stylesheet" href="reasoncss.css">
	</head>
	<body>
		<img src="banner2.jpg" alt="banner" class="image1">
		<br><br><br><br>
		<div class ="box">
			<form action="" method="post">
			<br>
			
			From: <input type="date" name="from" required>
			<br><br>
			To: <input type="date" name="to" style="position:absolute;left:26.5%;" required>
			<br><br>
			Leave Type: <input type="text" name="type" required >
			<br><br>
			<p>Reason: </p>
			<br>
			<textarea rows="6" cols="40" name="reason" required>
			</textarea>
			<br><br>
			
			<input class="next" type="submit" name="submit" value="Next"> 
			</form>
			<a href="facdetails.html"><button class="back"><b>Back</b></button></a>
			
		</div>
		<div class="footer"></div>
		<?php
			if(isset($_POST['submit']))
			{
				$userid=$_SESSION['login_user'];
				
				$fromdate=$_POST['from'];
				$todate=$_POST['to'];
				$type=$_POST['type'];
				$reason=$_POST['reason'];
				$conn = mysqli_connect("localhost","root","","project_lms");
				if (mysqli_connect_errno()) {
					die(sprintf("Connect failed: %s\n", mysqli_connect_error()));
				}
				$sql = "INSERT into leaves (userid, from_date, to_date, reason, type) VALUES ('$userid', '$fromdate', '$todate', '$reason', '$type')";
				if (mysqli_query($conn, $sql))
				{
					$loc='Location:allotments.php';
					header($loc);
				}
				else {
					echo "not inserted";
				}
				mysqli_close($conn);
			}
		?>
	</body>
</html>