<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index Page</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="course css.css">

</head>
<body>
<header>
	<ul>
		<img style="float:left" src="images/logo.PNG" alt="logo">
		<li><a href="ATTENDANCE.html">Attendance</a></li>
		<li><a href="MARKS.html">Marks</a></li>
 		<li><a href="FEE.html">Fee</a></li>
		<li><a href="TIME TABLE.html">Time Table</a></li>
		<li><a href="HOME.html">Home</a></li>
	</ul>
</header>

<main>
<div class="indexContainer">
	
	<button class="Box" id="Box1" onclick="document.location= 'TIME TABLE.html'">
	Time Table
	</button>
	<button class="Box" id="Box2" onclick="document.location= 'FEE.html'">
	Fee Structure
	</button>
	<button class="Box" id="Box3" onclick="document.location= 'MARKS.html'">
	Marks
	</button>
	<button class="Box" id="Box4" onclick="document.location= 'ATTENDANCE.html'">
	Attendance
	</button>


</div>
	<br><br><br><br><br>

</main>

<br><hr><br>
    <footer>
        <div class="paragraph"><strong>&copy; 2024 Government Graduate College, Civil Lines, Sheikhupura</strong>
        <h3>Contact Information:</h3>
            
            <b>Address:</b> Government Graduate College, Civil Lines, Sheikhupura 39350
            <br><br>
            <b>Phone:</b> (056)3783030
            <br><br>
            <b>Email:</b> info@gcbskp.edu.pk
        </div>
    </footer>

	<?php
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "college";


			$conn = new mysqli($servername, $username, $password, $dbname);


			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}


			if ($_SERVER["REQUEST_METHOD"] == "POST") {

				$std_id = $_POST['std_id'];
				$std_name = $_POST['std_name'];
				$password = $_POST['password'];


				$stmt = $conn->prepare("SELECT * FROM enrollments WHERE student_id = ? AND student_name = ? AND password = ?");
				$stmt->bind_param("iss", $std_id, $std_name, $password);


				$stmt->execute();
				

				$result = $stmt->get_result();


				if ($result->num_rows > 0) {

					session_start();
					$_SESSION['student_id'] = $std_id;
					echo "Sign In Successful! Welcome, " . htmlspecialchars($std_name);

				} else {
					echo "Invalid Student ID or Password!";
				}

				
				$stmt->close();
			}


			$conn->close();
		?>
</body>
</html>