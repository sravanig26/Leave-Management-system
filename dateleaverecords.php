<!DOCTYPE html>
<html>
<head>
	<title>leaverecords</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="UTF-8">
</head>
<body bgcolor="#333">
	<img src="banner2.jpg" class="y">
	<div style="position:absolute;height:50%;width:80%;left:10%;top:40%;">
		<form method="post"><center>
			from:<input type="date" name="abc">
			to:<input type="date" name="xyz">
			<input type="submit" class="btn" name="submit" value="get details" style="position: absolute;top: 14%;left:46.5%;">
		</center></form>
	</div>
	<div style="position:absolute;height:50%;width:80%;left:10%;top:58%;">
		<table width="1000px" border="2" style="position: absolute;left: 3.5%;color:white;">
			<th><b>USERID</b><td align="center"><b>REASON</b></td><td align="center"><b>FROM DATE</b></td><td align="center"><b>TO DATE</b></td><td align="center"><b>TYPE</b></td></th>
			<tbody style="color:white;">
				<?php
					$conn = new mysqli('localhost','root','','project_lms');
					if($conn->connect_error){
						die("Connection failed:".$conn->connect_error);
					}
					if(isset($_POST['submit'])){
						$from=$_POST['abc'];
						$to=$_POST['xyz'];
						$sql = "SELECT userid,from_date,to_date,reason,type FROM leaves where from_date >= '$from' and from_date <= '$to'";
					}
					else{
						$sql = "SELECT userid,from_date,to_date,reason,type FROM leaves ORDER BY from_date DESC LIMIT 10";
					}
					$result = $conn->query($sql);
					$count=mysqli_num_rows($result);
					if($count>0){
						while($row=$result->fetch_assoc()){
							echo '<tr>
							<td align="center">'.$row['userid'].'</td>
							<td align="center">'.$row['reason'].'</td>
							<td align="center">'.$row['from_date'].'</td>
							<td align="center">'.$row['to_date'].'</td>
							<td align="center">'.$row['type'].'</td>
							</tr>';
						}
					}
					else{
						echo 'query failed';
					}
					$conn->close();
				?>
			</tbody>
		</table>
	</div>
	<div class="b"></div>
</body>
</html>