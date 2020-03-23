<html>
	<head>
		<title> Leave Records </title>
		<link rel="stylesheet" href="leaverecordscss.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<div >
			<img src="banner2.jpg" alt="banner" class="image1" >
		</div>
		<div class="nav">
			<ul>
				<li><a  href="#home"><b>HOME</b></a></li>
				<li><a href="#"><b>FACULTY</b></a></li>
				<li><a class="active" href="#"><b>HOD</b></a></li>
				<li><a href="#"><b>ABOUT</b></a></li>
			</ul>
			
		</div>
		<div class="box" >
			<form method='POST'>
			<p class="records"><b>Faculty ID : </b><input type="text" name="fid"></p>
			<input type="submit" name="submit" value="Enter"> 
			</form>
		</div>
		
		<div class="table">
			<table width ="500px" border="1" padding="2px">
				
				<?php
					if(isset($_POST['submit']))
					{
						$fid=$_POST['fid'];
						$conn = mysqli_connect("localhost","root","","project_lms");
						if (mysqli_connect_errno()) {
							die(sprintf("Connect failed: %s\n", mysqli_connect_error()));
						}
						$sql = "SELECT  from_date, to_date, reason, type from leaves WHERE userid ='$fid'";
						$result = mysqli_query($conn, $sql);
						$count = mysqli_num_rows($result);
						if($count == 0)
						{
							echo "<span style=color:blue;position:absolute;top:50%;left:40%;font-size:50px;>No Leaves</span>";
						}
						else{
						?>
						<tr>
						<th>FROM-DATE</th>
						<th>TO-DATE</th>
						<th>REASON</th>
						<th>TYPE</th>
						</tr>
						<?php
						}
						while ($row = mysqli_fetch_array($result)) {
							echo "<tr><td>". $row["from_date"] ."</td><td>". $row["to_date"] ."</td><td>". $row["reason"] ."</td><td>". $row["type"] ."</td></tr>";
						}			
					
					mysqli_close($conn);
					}
				?>
			</table>
		</div>
		
	</body>
</html>