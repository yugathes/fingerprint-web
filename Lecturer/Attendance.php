<?php
session_start();
//if session exists
if(isset ($_SESSION["username"])) //call this function to check if session exists or not
{
	include "Header.php";
	$user = $_SESSION['username'];
	?>
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <style>
  .output{display:none}
  .output2{display:none}
.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 0px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 30%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 70%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=date] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}
input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}
select {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}
label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}
.btn_add{
    padding: 15px;
    font-size: 15px;
    background: #1D96D1;
    border-style: outset;
    border-radius: 10px;
    cursor: pointer;
  color: white;
  width: 15%;
	float: right;
}

.btn_add:hover {
  background-color: darkgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}

.tooltip {
    position: relative;
    display: inline-block;
    border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
	top: -70px;
    left: 150px;
    /* Position the tooltip */
    position: absolute;
    z-index: 1;
}
.tooltip .tooltiptext img{
	width: 120px;
	height:120px;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
}
.mid{
	margin: auto;
	width: 50%;
	padding: 10px;
	
}
.content2 {
	margin: auto;
	width: 100%;
	padding: 20px;
	border: 1px solid #483235;
	background: white;
	border-radius: 10px 10px 10px 10px;
}
.input-group2 {
  margin: 10px 0px 10px 0px;
}
.input-group2 label {
	display: inline;  
    margin-bottom: 10px;
	text-align: left;
	margin: 3px;
}

.input-group2 textarea {
	display: inline;
	float: right;
	width: 50%;
	padding: 5px 10px;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
}
.input-group2 select {
	display: inline;
	float: right;
	width: 50%;
	padding: 5px 10px;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
	margin-bottom: 0px;
}
input[type=text] {
	margin-bottom: 0px;
}
.content button{
	display: block;
	float: right;	
}
.txt-center {
	text-align: center;
	display: inline;
    left: 50%;
    position: absolute;
}
</style>
</head>

<body>
<?php
$queryGet = "select * from class where lecturer='".$user."'";
$resultGet = mysqli_query($link,$queryGet);
if(!$resultGet)
{
	die ("Invalid Query - get Register List: ". mysqli_error($link));
}
else 
{	
	$queryGet1 = "select * from class where lecturer='".$user."'";
	$resultGet1 = mysqli_query($link,$queryGet1);
	if(!$resultGet1)
	{
		die ("Invalid Query - get Register List: ". mysqli_error($link));
	}
	else 
	{
	$no=0;
	?>
	<h2 style="text-align:center;color:Black"></h2>
	<div class="row" style="margin-left: 0px;">
	<div class="col-75">
    <div class="container">
		<form action="" method="GET">
			<center><h3>Attendance</h3></center>
			<div class="row">
				<div class="col-50">
					<label for="cname">Class</label>
					<select id="class" name="class" required>
						<option value="" selected>Choose one</option>
						<?php	while($baris= mysqli_fetch_array($resultGet, MYSQLI_BOTH))	{?>	
						<option value="<?php echo $baris['cID']; ?>" >
							<?php echo $baris['name'];
					${'time'.$no} =array($baris['timeSlot'],$baris['timeSlot2']);
					?>
						</option>
						<?php	$no++;}?>
					</select>
				</div>
				<div class="col-50">
					<label for="cname">Time</label>		
<?php			$n=0;
				while($baris1= mysqli_fetch_array($resultGet1, MYSQLI_BOTH))	{?>	
					<select name="time" id="<?php echo $baris1['cID'];?>" class="output">
						<option value="" selected>Choose one</option>						
						<option value="<?php echo ${'time'.$n}[0]; ?>" ><?php echo ${'time'.$n}[0];?></option>
						<option value="<?php echo ${'time'.$n}[1]; ?>" ><?php echo ${'time'.$n}[1];?></option>
					</select>
<?php	$n++;}	}	}?>  
				</div>
			</div>	
			<div class="row">
				<div class="col-50"> 
					<input type="submit" value="Take Attendance" name="Attendance" class="btn" id="myBn" style="margin-top: 30px;">
				</div>
				<div class="col-50"> 
					<input type="submit" value="Check Attendance" name="Check" class="btn" id="myBn" style="margin-top: 30px;">
				</div>
			</div>
		</form>		
	</div>
	</div>
	</div>
<?php	
if(isset($_GET['Attendance'])){
	$class = $_GET['class'];
	if(isset($_GET['time'])){
	$time = $_GET['time'];
	$link = "http://".$ip.":5000/attendance?cID=$class&time=$time";
	echo "<script type='text/javascript'>
		window.onload = function () 
		{ 
		alert('Attendance Will Taking...');
		open('$link','_top');
		}
		</script>";
	}
}
if(isset($_GET['AttendanceStop'])){

	$link = "http://".$ip.":5000/attendance?stop=1";
	echo "<script type='text/javascript'>
		window.onload = function () 
		{ 
		alert('Attendance Will Stop...');
		open('$link','_top');
		}
		</script>";
}
if(isset($_GET['Check']))
{	$class = $_GET['class'];
	$time = $_GET['time'];
	$queryGet = "select * from attendance where cID = '$class' AND time = '$time'";	
	$resultGet = mysqli_query($link,$queryGet);
	if(!$resultGet)
	{	die ("Invalid Query - get Items List: ". mysqli_error($link));	}
	else{	?>
		<center><h3>Attendance List</h3></center>
		<table id="table" border="1" align="center">
			<tr>
				<th>No</th>
				<th>Student ID</th>
				<th>Name</th>
				<th>Date</th>
			</tr>
<?php				if(mysqli_num_rows($resultGet)<=0){	?>
			<tr>
				<td colspan="4">No Student Registered</td>
			</tr><?php	}
			else{
				$no=1;
				while($row1= mysqli_fetch_array($resultGet, MYSQLI_BOTH))
				{	
					$queryGe1 = "select * from users where uid = '".$row1['usrID']."'";	
					$resultGe1 = mysqli_query($link,$queryGe1);
					if(!$resultGe1)
					{	die ("Invalid Query - get Items List: ". mysqli_error($link));	}
					else{	while($ro1= mysqli_fetch_array($resultGe1, MYSQLI_BOTH)){
			?>
			<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $ro1['id'];?></td>
				<td><?php echo $ro1['name'];$no++;?></td>
				<td><?php echo $row1['date'];$no++;?></td>
			</tr><?php	}	}	}	}?>
		</table>
<?php	}	}?>
	<script>
		$("#class").on("change", function(){
		  var package = $(this).val();
		  $(".output").hide().prop("disabled", true)
		  $("#" + package).show().prop("disabled", false);
		});

	</script>
	<?php	
}
else{
    echo "No session exists or session has expired. Please log in again ";
	echo "Page will be redirect in 2 seconds";
	header('Refresh: 2; ../Auth/Login.php');
}				
?>
 
	 
</body>
</html>
