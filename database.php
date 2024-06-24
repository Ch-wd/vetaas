<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Create database tables</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
	
	<?php 
		echo "hello";
		$servername = 'localhost';
		$username = 'charan';
		$password = 'Charan2527#';
		$databasename = 'Vetaas';

		$conn = mysqli_connect($servername,$username,$password,$databasename);
		if ($conn == FALSE) {
 			 die("Connection failed: " . $conn->connect_error);
		}
		else {
			echo "Hi";
		}
		
		$sql = "CREATE TABLE IF NOT EXISTS testimonials (
			id int PRIMARY KEY,
			name varchar(255),
			sequ int UNIQUE AUTO_INCREMENT,
			role varchar(255),
			organisation varchar(255),
			comment varchar(2047) 

		)";
		if ($conn->query($sql) === TRUE) {
		  echo "table created successfully";
		} else {
		  echo "Error creating database: " . $conn->error;
		}


		$conn->close();
	?>
	<div class = "col-lg"></div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>