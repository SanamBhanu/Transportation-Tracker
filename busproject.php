
<html>
<title> DHARWAD BUSES DETAILS</title>

<head>
  <link rel="stylesheet 1" href="bus.css">

 
</head>
<!--
<body >
<center>
<h1>Check The Details Of The Bus</h1>

	<form action='' method='POST'>
		<font color="white"><h2>FROM:</h2>
		<input type="text" name="from" >
		<br><br>
		<font color="white"><h2>TO:</h2>
		<input type="text" name="to" >
		<br><br>
		<br>
		<br>
		<input type="submit" value="Check">

	</form>

</body>
-->
<body >
 
<center>
<h1>DHARWAD BUS DETAILS</h1>
</center>
	<form id="form1" onsubmit="f()">
		<h2>FROM:</h2>
		<input type="text" style="position:fixed;  left:37%; top:24%; bottom:45%; border:1px solid slategray;" name="from" placeholder="Leaving from">
		<br><br>
		<h2>TO:</h2>
		<input type="text" style="position:fixed;  left:37%; top:34%; bottom:45%; border:1px solid slategray;" name="to" placeholder="Going to">
		<br>
		<br>
		<br>
		<center><input type="submit" style="position:fixed;  left:48%; top:41%; bottom:45%; border:1px solid slategray;" value="Check"></center>

	</form>


</body>


<style>
body {
    font-family: "Lato", sans-serif;
    transition: background-color .5s;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

#main {
    transition: margin-left .5s;
    padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="about.html">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>

<div id="main">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; <h3>OPEN_MENU</h3></span>
</div>


<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
}
</script>



</body>


</html>

</center>

<table>
		<tr>
			<th width="25%" >From</th><th width="25%" align="center">To</th><th width="25%" align="center">Arrival</th><th width="25%" >Departure</th>
		</tr>

	<?php
	if($_SERVER["REQUEST_METHOD"] == "POST") {

			$servername = "localhost";
			$username = "root";
			$password = "nokia730";
			$dbname = "CSV_DB";
	$conn = new mysqli($servername, $username, $password, $dbname);
      $from = strtoupper(mysqli_real_escape_string($conn,$_POST['from']));
      $to = strtoupper(mysqli_real_escape_string($conn,$_POST['to']));
			// Create connection
			
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			$sql = "SELECT * FROM `TBL_NAME` WHERE `COL 4` = '$from' AND `COL 5` = '$to' ";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<tr><td align='center'>" . $row["COL 4"]. "</td><td align='center'>" . $row["COL 5"]. " </td><td align='center'>" . $row["COL 7"]. "</td><td align='center'>" . $row["COL 8"]. " </td></tr>";
				}
			}
			$conn->close();
	}
			?>
	</table>
</center>
