<html>
	<head>
		<title> Fac Details</title>
		<link rel="stylesheet" href="hfacdetails.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body >
		<div >
			<img src="banner2.jpg" alt="banner" class="image1" >
		</div>
		
		<div class="box" >
			<form  action="" method='POST' onsubmit=return "IsCorrect(userid);">
			<br><br>
			<p class="details"><b>Enter Faculty ID :</b><input type="text" required name="userid" >
             <br>
             <br>
             <br>
			<input type="submit" name="submit" value="Submit">
			</form>
		</div>
		<a href="hleavereq.php"><button class="back"> Back </button>
		<style>
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
  left:10%;
  top:40%;
  transition: 0.6s ease;
  box-shadow: -20px,-20px,50px,black,20px,20px,50px,black;
  border-radius:5px;
}

.back:hover {
  background-color: #fff;
  color:#1ab2f0 ;
}
		</style>
    <script type="text/javascript">
            function IsCorrect(e){
              var let=/^\(?ANIL)\)?([0-9]{4})$/;
              if(!e.value.match(let)){
                alert('please enter Faculty ID as "ANIL****"');
                
              }
			  alert('inside fun');
          }
		  
      </script>

<?php

if(isset($_POST['submit']))
{
	$fid=$_POST['userid'];
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
	$sql = "SELECT * from users WHERE userid='$fid'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	
    echo "<div class =det style=font-size:20px;color:white;top:62%;left:37.5%;>
    <p>USERID</p>
   	<p>NAME</p>
   	<p>EMAIL</p>
   	<p>MOBILE</p>
   	<p>AGE</p>
   	<p>DEPARTMENT</p>
   	<div style=position:absolute;top:0%;left:48%;>
   	<p>:</p><p>:</p><p>:</p><p>:</p><p>:</p><p>:</p>
   	</div>
   	<div style=position:absolute;top:0%;left:55%;>
   	<p>".$row['userid']."</p>
   	<p>".$row['name']."</p>
   	<p>".$row['email']."</p>
   	<p>".$row['mobile']."</p>
   	<p>".$row['age']."</p>
   	<p>".$row['department']."</p>
   	</div>";
	
}
?>
</body>
</html>