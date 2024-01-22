<!--
    Mark Witt
    CSD-440
    Module 8 Assignment
    Add player to MySQL database with php 
    input from hmtl form on index page, this backend saves input form to database
    9/21/23
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

    $name = $_POST['name'];
    $team = $_POST['team'];
    $position = $_POST['position'];
    $rbi = $_POST['rbi'];
    $batting_avg = $_POST['batting_avg'];

    $sqlScript = "INSERT INTO players (name, team, position, rbi, batting_avg) VALUES (?, ?, ?, ?, ?)";
    $statement = $connection->prepare($sqlScript);
    $statement->bind_param("sssid", $name, $team, $position, $rbi, $batting_avg);
    $results = $statement->execute();

    header("Location: MarkWittBaseballIndex.php?success=" . $name . "'s+information+has+been+saved+successfully");
    exit();
?>