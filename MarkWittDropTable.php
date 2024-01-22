<!--
    Mark Witt
    CSD-440
    Module 8 Assignment
    Drop Table with PHP
    9/14/23
    Updated Styling: 9/20/23
-->

<?php 
$serverName = 'localhost';
$username = 'student1';
$password = 'pass';
$database = 'baseball_01';

$connection = new mysqli($serverName, $username, $password, $database);

if ($connection->connect_error) {
    die("Database connection failed: " . $connection->connect_error);
}


$createTable = "DROP TABLE IF EXISTS players";

if ($connection->query($createTable) === TRUE) {
    echo "<br> Players table deleted successfully! </br></br>";
} else {
    echo "<br> There was an error dropping the table: <br>" . $connection->error;
}

$connection->close();
?>