<html>
<head>
<style>


table {	
	font-style: bold;
	line-height: 26.4px;
	color: white;
	font-family: fantasy;
	font-size:25px;

}
th {
    background-color: #4CAF50;
    color: white;
}
body{
background: url("18.jpg");
background-attachment:fixed;
    background-size: 100%;
    background-repeat: no-repeat;
    }
h1{
  top=50px;
  left=50px;
}


div {
    height: 200px;
    width: 400px;
    background: black;

    position: fixed;
    top: 50%;
    left: 50%;
    margin-top: -100px;
    margin-left: -200px;
}


</style>
</head>
<body >
</body>
</html> 
<center>

	<?php
	if($_SERVER["REQUEST_METHOD"] == "POST") {

			$servername = "localhost";
			$username = "root";
			$password = "nokia730";
		
			$dbname = "Bus data";
	$conn = new mysqli($servername, $username, $password, $dbname);
      $from = strtoupper(mysqli_real_escape_string($conn,$_POST['from']));
      $to = strtoupper(mysqli_real_escape_string($conn,$_POST['to']));
      $time = strtoupper(mysqli_real_escape_string($conn,$_POST['time']));
			// Create connection
			
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			$sql = "SELECT * FROM `TABLE 1` WHERE `COL 4` = '$from' AND `COL 5` = '$to' AND `COL 7`>='$time' ";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
				echo "<table border=5>";
		echo "<tr>";
			echo "<th width=\"15%\" >SCHEDULE.NO</th><th width=\"15%\" >FROM</th><th width=\"15%\" align=\"center\">TO</th><th width=\"15%\" align=\"center\">DEPARTURE</th><th width=\"15%\" >ARRIVAL</th><th width=\"15%\" >DISTANCE(KM)</th>
		</tr>";
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<tr><td align='center'>" . $row["COL 1"]. "</td><td align='center'>" . $row["COL 4"]. "</td><td align='center'>" . $row["COL 5"]. " </td><td align='center'>" . $row["COL 7"]. "</td><td align='center'>" . $row["COL 8"].  "</td><td align='center'>" . $row["COL 6"]. "</tr>";
				}
				echo "</table>";
			}
			else{
				echo "
					<div>
						<center><font color=\"white\"><h1>No bus available from '$from' to '$to'<br>We are sorry<h1></font></center>
					</div>";
			}
			$conn->close();
	}
			?>
	
</center>
