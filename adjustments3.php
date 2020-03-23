<?php

session_start();
?>
<!DOCTYPE html>
<html>
<head>
<style>
	body {
  background-color:#000;
}
	.img{
      width:90%;
      position:absolute;
      left:5%;
      font color:white;
    }
	.t{
      position: absolute;
      top: 45%;
      left: 15%;
    }
    table, th, td {
      border: 1px solid black;
    }
    th, td {
		padding: 15px;
	}
    th {
      text-align: left;
    }
    
    table {
      text-align: center;
      background:white;
    }
    .t{
      position: absolute;
      min-height: 200px;
      top: 50%;
      font-size:20;
      font color: white;
      left:28%;
      padding-bottom: 10px;
    }
    .submit{
      position:absolute;
      background-color:#005ce6;
      color:white;
      padding:10px 25px;
      text-align:center;
      text-decoration:none;
      display:inline-block;
      font-size:16px;
      position: absolute;
      left:45%;
      box-shadow:-20px,-20px,50px,black,20px,20px,50px,black;
      border-radius:5px;

    }
    .submit:hover{
      position: absolute;
      top: 90%;
      background-color: #fff;
      color:#007a99;
    }
</style>
</head>
<body>
	<img src="banner2.jpg" alt="Banner Image" class="img">
  <BR>
  <br>
  <h1 style="position:absolute;top:40%;left:8%;"><b> REQUESTS </b></h1>
<div class="t">
<TABLE id="dataTable" width ="550px" border="1" padding="4px" align="center">

<a href="hfacdetails.php"><button type="submit" >Submit</button></a>
 
<?php
$conn = mysqli_connect("localhost", "root", "", "project_lms");

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$userid=$_SESSION['login_user'];
$req=$_SERVER['QUERY_STRING'];
if (strlen($req)>0)
{
	$val=explode('=',$req);
	$result=explode('+',end($val));
	$act=(int)strtolower(end($result));
	$class_id_to_act = $result[0];
	$query = 'update classes set fac_status = '.$act.' where classid = '.$class_id_to_act;
	if($conn->query($query))
	{
		//echo "Success";
	}

}
$sql = "SELECT classid,userid,dte,year,section,period FROM classes join leaves on classes.leaveid=leaves.leaveid where adjusted_id='$userid' and fac_status=0";
$result = $conn->query($sql);
$str ="";
$count = mysqli_num_rows($result);
if($count == 0)
{
	echo "<span style=color:blue;position:absolute;top:50%;left:40%;font-size:50px;>No Requests</span>";
}
else{
?>
<tr>
	<th>FacultyId</th>
    <th>Date</th>
    <th>year</th>
    <th>section</th>
    <th>period</th>
    <th colspan = 2>confirm</th>

</tr>
<?php
while ($row = mysqli_fetch_array($result)) {
?>
   <div>
<?php
   echo "<tr><td>" . $row["userid"]. "</td><td>" . $row["dte"]. "</td><td>" . $row["year"] . "</td><td>"
		. $row["section"]. "</td><td>" . $row["period"]. "</td>";
?>
   <td><a  href="adjustments3.php?classid=<?php echo $row['classid'].'+1' ?>">Accept</a> </td>
   <td><a  href="adjustments3.php?classid=<?php echo $row['classid'].'+2' ?>">Reject</a> </td></tr>
   </div>
<?php
 }
}
echo "</table>";

$conn->close();
?>
</div>
</TABLE>
</div>
</html>
