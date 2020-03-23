<HTML>
<HEAD>
<TITLE> Add/Remove dynamic rows in HTML table </TITLE>
<link rel="stylesheet" href="allotments.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

</HEAD>
<BODY>
  <!--<TABLE id="dataTable" width ="200px" border="1" padding="2px">""-->
  <style>
    table, th, td {
      border: 1px solid black;
    }
    th {
      text-align: left;
    }
  </style>
  <img src="banner2.jpg" alt="banner" class="image1">
  <h2 style="position:absolute;left:7%;color:#fff; top:43%;">ALLOTMENTS</h2>
  <div class="table">
    <TABLE id="dataTable" width ="200px" border="1" padding="2px">
      <tr>
        <th>S.NO</th>
		 <th>FACULTYID</th>
        <th>YEAR</th>
        <th>SECTION</th>
        <th>PERIOD</th>
        <th>DATE</th>
      </tr>
      <tr>
      <TD> 1 </TD>
      
          <form action="" method="POST">
		  <td>
        <input type="text" required placeholder="Faculty id" name="FACULTYID">
        </td>
        <td>
          <input type="text" required onclick="IsCorrect(document.form.id)"  onkeyup="this.value = this.value.replace(/[^1-4]/, '')" min="1" max="4" maxlength="1"
		  placeholder="Year" name="YEAR">
        </td>
        <td>
        <input type="text" required onkeyup="this.value = this.value.replace(/[^a-d A-D]/, '')" maxlength="1"
		placeholder="Section" name="SECTION">
        </td>
        <td>
        <input type="text" required onkeyup="this.value = this.value.replace(/[^1-7]/, '')"min="1" max="7" maxlength="1" 
		placeholder="Period" name="PERIOD">
        </td>
        
        <td>
        <input type="date" placeholder="DATE" required name="DATE">
        </td>
      </tr>
    </table>
    
    <a href="allotments.php"><button name="submit" class="add"><b>add</b></button></a>
  </div>
  </form>
  <?php
    $conn = mysqli_connect("localhost", "root", "", "project_lms");
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
	$sql1="select max(leaveid) as lid from leaves";
	$result1 = mysqli_query($conn, $sql1);
	$row1 = mysqli_fetch_array($result1);
	$lid=$row1['lid'];
	
    if(isset($_POST['submit'])){
      $str ="";
		
      $YEAR =$_POST['YEAR'];
      $SECTION =$_POST['SECTION'];
      $PERIOD =$_POST['PERIOD'];
      $FACULTYID =$_POST['FACULTYID'];
      $DATE = $_POST['DATE'];
      // Attempt insert query execution
      $sql = "INSERT INTO classes (leaveid,adjusted_id,year,section,period,dte) VALUES ($lid,'$FACULTYID','$YEAR','$SECTION', '$PERIOD','$DATE')";
      
      if(mysqli_query($conn, $sql)){
      }
      else{
         echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
      }
    }
    $conn->close();
  ?>
      <!--<td>
        <input type="text" placeholder="year" name="">
    </td>-->
	<a href="reload.html"><button name="Next" class="next"><b>Finish</b></button></a>
</BODY>
</HTML>
<script type="text/javascript">
	function IsCorrect(inputtxt){
		var letters=/^\(?(ANIL)\)?([0-9]{4})$/;
		if(!inputtxt.value.match(letters)){
			alert('please enter USER ID as ANIL****');
		}
	}
</script>