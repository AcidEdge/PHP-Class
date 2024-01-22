<!--
    Mark Witt
    CSD-440
    Module  Assignment
    Search Table with PHP
    9/20/23
-->

<?php 

function playerSearch($searchInput){
    $serverName = 'localhost';
    $username = 'student1';
    $password = 'pass';
    $database = 'baseball_01';

    $connection = new mysqli($serverName, $username, $password, $database);

    if ($connection->connect_error) {
        die("Database connection failed: " . $connection->connect_error);
    }

    $search = strtolower('%' . $searchInput . '%');
        $query = "SELECT * FROM players WHERE LOWER(name) LIKE ? OR LOWER(team) LIKE ? OR LOWER(position) LIKE ?";
    $statement = $connection->prepare($query);
    $statement->bind_param("sss", $search, $search, $search);
    $statement->execute();
    $searchResults = $statement->get_result();

    
    
    $connection->close();

    return $searchResults;
}

