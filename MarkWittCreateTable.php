<!--
    Mark Witt
    CSD-440
    Module 8 Assignment
    Create Table with PHP
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


$createTable = "CREATE TABLE IF NOT EXISTS players (id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(100) NOT NULL,
                team VARCHAR(100) NOT NULL,
                rbi INT,
                position ENUM('Pitcher', 'Catcher', 'First Base', 'Second Base', 'Third Base', 'Shortstop', 'Left Field', 'Center Field', 'Right Field', 'Designated Hitter') NOT NULL,
                batting_avg DECIMAL(4, 3)
                )";

if ($connection->query($createTable) === TRUE) {
    echo "<br> Players table created successfully! <br><br>";
} else {
    echo "There was an error creating the table: " . $connection->error;
}

$connection->close();
?>