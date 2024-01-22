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

$query = "SELECT * FROM players";

$results = $connection->query($query);

if ($results) {
    if ($results->num_rows > 0) {
        echo "<br><table class='baseballTable'><caption><h2>All Player Results:<h2></caption><tr><th>Id #</th><th>Name</th><th>Team</th><th>Position</th><th>RBI's</th><th>Batting Avg</th></tr>";
        while ($row = $results->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["team"] . "</td>";
            echo "<td>" . $row["position"] . "</td>";
            echo "<td class='playerData'>" . $row["rbi"] . "</td>";
            echo "<td class='playerData'>" . $row["batting_avg"] . "</td>";
        }
        echo "</table><br><br>";
    }
    else {
        echo "players table is empty.";
    }
    $results->close();
}
else {
    echo "Error: " . $connection->error;
}

$connection->close();
?>