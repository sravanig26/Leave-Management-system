<?php

session_start();
?>
<html>

	
<style>
	body {
  background-color:#000;
}
	.det{
    text-align:center;
    position:absolute;
		left:140%;
		top:0%;
		width:200px;
		height:45px;
		background-color:#e6e6e6;
		border:2px solid black;
		border-radius: 15px;
		padding:35px;
    font-size: 25px;

	}
	.img{
      width:90%;
      position:absolute;
      left:5%;
      font color:white;
    }
    .back {
  position:absolute;
  background-color: #005ce6;
  border:none;
  color: white;
  padding: 12px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  position:absolute;
  left:45%;
  
  transition: 0.6s ease;
  box-shadow: -20px,-20px,50px,black,20px,20px,50px,black;
  border-radius:5px;
}

.back:hover {
  background-color: #fff;
  color:#1ab2f0 ;
}

.table{
  position:absolute;
  left:25%;
  top:50%;

  background-color:#fff;
  
}

</style>



<body>
<img src="banner2.jpg" alt="Banner Image" class="img"/>
<h1 style="position:absolute;top:35%;left:40%;color:white;font-size: 40px;"> LEAVE STATUS </h1>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_lms";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$userid=$_SESSION['login_user'];

$sql = "SELECT * FROM classes c join leaves l WHERE c.leaveid=l.leaveid and l.userid='$userid'";
$result = mysqli_query($conn, $sql);
?>
<div class="table">
      <table width ="400px" border="1" height="125px" padding="2px">
        <tr>
          <th align="center">AdjustedID</th>
          <th align="center">status</th>
      
        </tr>
<?php 
if($result){
while($row = mysqli_fetch_assoc($result)) {
  $facstatus=$row['fac_status'];
  if($facstatus==0){
       $facstatus= "pending";
            }
       if($facstatus==1){
        $facstatus= "Accepted";
       }
       else if($facstatus==2){
        $facstatus= "Rejected";
       }
  echo "<tr><td align=center>". $row["adjusted_id"]."</td><td align=center>".$facstatus."</td></tr>";

}
//hod status
$sql1 = "SELECT * FROM leaves WHERE userid='$userid'";
$result1 = mysqli_query($conn, $sql1);
if($result1){
  while($row1 = mysqli_fetch_assoc($result1)) {
echo "<div class=det>";
echo " HOD STATUS:<br>";
       $hod_status=$row1['hod_status'];
       if($hod_status==0){
        echo "<span style=color:blue>Pending</span>";
            }
       else if($hod_status==1){
        echo "<span style=color:blue>Accepted</span>";
       }
       else if($hod_status==2){
          echo "<span style=color:blue>Rejected</span>";
       }
    }
}
//echo "<a href=Home.html><button class=back><b>Back</b></button></a>";
mysqli_close($conn);

}
else{
  echo "Connection failed";
}
?>
</table>
</div>






</body>
</html>
