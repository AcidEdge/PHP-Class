<!--
    Mark Witt
    CSD-440
    Module 8 Assignment
    Create Table with PHP
    9/16/23
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


$populateTable = "INSERT INTO players(name, team, rbi, position, batting_avg) VALUES ('Luis Arraez', 'MIA', 69, 'Second Base', 0.353),
                    ('Corey Seager', 'TEX', 92, 'Shortstop', 0.337),
                    ('Ronald Acuna', 'ATL', 98, 'Right Field', 0.337),
                    ('Freddie Freeman', 'LAD', 93, 'First Base', 0.335),
                    ('Yandy Diaz', 'TB', 73, 'First Base', 0.319);";

if ($connection->query($populateTable) === TRUE) {
    echo "<br>Players table populated successfully!<br><br>";
} else {
    echo "There was an error populating the table: " . $connection->error;
}

$connection->close();
?>