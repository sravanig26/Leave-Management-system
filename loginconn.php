<?php

session_start();
?>
<?php
 
  $conn = new mysqli('localhost','root','','project_lms');
  if($conn->connect_error){
    die("Connection failed:".$conn->connect_error);
  }
  if($_SERVER["REQUEST_METHOD"]=="POST"){
    $user=$_POST['uid'];
    $password=$_POST['pwd'];
	$pws=md5($password);
	
    $sql="select usertype from users where userid='$user' and pwd='$pws'";
	
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	$count=mysqli_num_rows($result);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	
	
	
    if($count==1){
      $_SESSION["login_user"]=$user;
      if($row['usertype']=="faculty"){
        header('Location:facdetails.php');
      }
      else if($row['usertype']=="hod"){
        header('Location:hleavereq.php');
      }
    }
  }
    else{
?>
<script>
  alert("username or password is invalid");
  window.location.href="login.php";
</script>
<?php
    }
  
  $conn->close();
?>