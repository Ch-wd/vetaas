<?php
    session_start();
    $servername = 'localhost';
    $username = 'charan';
    $password = 'Charan2527#';
    $databasename = 'Vetaas';

    $conn = mysqli_connect($servername,$username,$password,$databasename);
    if ($conn == FALSE) {
            die("Connection failed: " . $conn->connect_error);
    }
    else{
        echo("connection successful");
    }
		

?>