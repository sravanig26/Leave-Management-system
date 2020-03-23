<!DOCTYPE html>
<html>
<head>
	<title>leavestatus</title>
	<link rel="stylesheet" type="text/css" href="hleavereq.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<meta charset="UTF-8">
</head>
<body bgcolor="#333">
	<?php
		$conn = new mysqli('localhost','root','','project_lms');
		if($conn->connect_error){
			die("Connection failed:".$conn->connect_error);
		}
		$sql="select leaveid,name,from_date,to_date,type,reason,hod_status from leaves l join users u on u.userid=l.userid where leaveid in(SELECT leaveid FROM classes c1 where fac_status=1 group by leaveid having count(*)=(select count(*) from classes c2 where c2.leaveid=c1.leaveid)) and hod_status=0";
	?>
	<img src="banner2.jpg" class="y">
	<div class="navbar">
		<a href="hleavereq.php"><b>Leave Requests</b></a>
		<a href="hfacdetails.php"><b>Faculty Details</b></a>
		<div class="dropdown">
			<button class="dropbtn"><b>Leave Records </b></button>
			<div class="dropdown-content">
				<a href="dateleaverecords.php">All Leave Records </a>
				<a href="leaverecords.php">Faculty Leave Records</a>	
			</div>
		</div>
		<a href="logout.php"><b>Log Out</b></a>
	</div>
	<div style="position:absolute;height:50%;width:80%;left:10%;top:50%;">
		<table width="1000px" border="2" style="position: absolute;left: 3.5%;color:white;">
			<th>leaveid<td align="center">name</td><td align="center">from date</td><td align="center">to date</td><td align="center">type</td><td align="center">reason</td><td align="center">status</td></th>
			<tbody><form>
		<?php
			$result = $conn->query($sql);
			$count=mysqli_num_rows($result);
			if($count>0){
				while($row=$result->fetch_assoc()){
					echo 
					"<form method='post'><tr style=color:white>
						<td align='center' name='leaveid'>{$row['leaveid']}</td>
						<td align='center'>{$row['name']}</td>
						<td align='center'>{$row['from_date']}</td>
						<td align='center'>{$row['to_date']}</td>
						<td align='center'>{$row['type']}</td>
						<td align='center'>{$row['reason']}</td>
						<td align='center'>
						<select name='status' style=border-radius:10px;padding-left:4px>
							<option class=opt1 value=pending>Pending</option>
							<option class=opt2 value=accept>Accept</option>
							<option class=opt3 value=reject>Reject</option>
						</select>
						<button type='submit' name='submit'>submit</button>	
					</form>";
					if(isset($_POST["submit"])){
						$leaveid=$_POST['leaveid'];
						$status=$_POST['submit'];
						if($status=='pending')
							$k=0;
						else if($status=='accept')
							$k=1;
						else
							$k=2;
						mysql_query("update leaves set hod_status='$k' where leaveid='$leaveid'");
					}			
					echo "</td>
					</tr>\n";
				}
			}
			else{
				echo "0 results";
			}
			$conn->close();
		?>
		<script>
			function func(){
				<?php
					$sql="";
				?>
			}
		</script>
			</tbody>
		</table>
	</div>
	<div class="b"></div>
</body>
</html>