<?php
$name=$_POST['name'];
$id=$_POST['id'];
$mobno=$_POST['mobno'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$doj=$_POST['doj'];
$password=$_POST['password'];
$password1=$_POST['password1'];
$password2=md5($password);
$password3=md5($password1);
$conn = new mysqli('localhost','root','','project_lms');
if($conn->connect_error){
  die("Connection failed:".$conn->connect_error);
}
if ($password2==$password3){
  $sql="INSERT INTO users(name,userid,mobile,age,gender,email,pwd,doj) VALUES('$name','$id',$mobno,$age,'$gender','$email','$password2','$doj')";
  if ($conn->query($sql) == TRUE){
?>
<script>
 	alert("Sign Up successful");
  window.location.href="login.php";
</script>
<?php
    //-include("first.php");
    //echo "New record created successfully";
  }
  else{
    echo "Error:".$sql."<br>".$conn->error;
  }
}
else{
  echo "password not matched";
}
$conn->close();
?>