<!--
Mark Witt
CSD440 Server Side Scripting
Module 9 Assignment 
9/20/23
For this assignment the database you will use is the one created in Module 8. Using MySQLi, write PHP programs (3 files) that provide:
Index page with links to all following PHPs
Query page to search based on user form input
Form page for adding a record
Include all files from Module 8.
-->

<html lang="en"
    <head>
        <link href="wittMod9.css" type="text/css" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;700&display=swap" rel="stylesheet">
        
        <title>CSD 440 Server Side Scripting - Mark Witt - Module 6</title>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <?php 

        require('MarkWittSearchTable.php');

        #POST handling:
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $input = $_POST["searchinput"];
            $searchResults = playerSearch($input);
        } else{}
        ?> 

    </head>
    <header>
        <h1>CSD-440 Server Side Scripting - Module 9</h1>
        <h2>For this assignment the database you will use is the one created in Module 8. Using MySQLi, write PHP programs (3 files) that provide:
        </br>Index page with links to all following PHPs.
        <br>Query page to search based on user form input.
        </br>Form page for adding a record.
        </br>Include all files from Module 8.</h2>
    </header>
    <body>
        <div class="navbar">
        </div></br>
        <!--Card with menu links -->
        <center>
            <div class="card"><center>
                <div id="container"></br>
                    <h2>Baseball Stats Records System Menu:</h2>
                    <p><button id="deleteTableButton">Erase Table</button>
                    <button id="createTableButton">Create Table</button>
                    <button id="populateTableButton">Populate Table</button></br></br>
                    <button id="searchTableButton">Search Players</button>
                    <button id="addPlayerButton">Add New Player</button>
                    <button id="selectAllTableButton">Show All Players</button></p>
                   </br>
                    </center>
                </div>
            </div>
        </center></br>
        <div class="popup" id="popup">
            <div class="popup-content">
                <span class="close-button" id="closeButton">&times;</span>
                <div id="result"></div>
                </div>
            </div>
        </div>
        <div class="popup" id="searchpopup">
            <div class="popup-content">
                <div id="result">
                <span class="close-button" onclick="window.location.href='MarkWittBaseballIndex.php';">&times;</span>
                    <h2> Search Players</h2><h3>Enter a players first or last name, team, or position.</h3>
                        <div class="SearchForm">
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    Your Search: <input type="text" name="searchinput">
                                        <input type="submit" value="Search">
                        </form></br>
                        </div>
                </div>
            </div>
        </div>
        <div class="popup" id="addPlayerpopup">
            <div class="popup-content">
                <div id="result">
                <span class="close-button" onclick="window.location.href='MarkWittBaseballIndex.php';">&times;</span>
                    <h2> Add New Player</h2><h3>Enter a new players Name, Team, Position, RBI's, and Batting Average.</h3>
                        <div class="SearchForm">
                        <form method="post" action="MarkWittAddPlayer.php">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required><br><br>

                        <label for="team">Team:</label>
                        <input type="text" id="team" name="team" required><br><br>

                        <label for="position">Position:</label>
                        <select id="position" name="position">
                            <option value="Pitcher">Pitcher</option>
                            <option value="Catcher">Catcher</option>
                            <option value="First Base">First Base</option>
                            <option value="Second Base">Second Base</option>
                            <option value="Third Base">Third Base</option>
                            <option value="Shortstop">Shortstop</option>
                            <option value="Left Field">Left Field</option>
                            <option value="Center Field">Center Field</option>
                            <option value="Right Field">Right Field</option>
                            <option value="Designated Hitter">Designated Hitter</option>
                        </select><br><br>

                        <label for="rbi">RBI (Runs Batted In):</label>
                        <input type="number" id="rbi" name="rbi" required><br><br>

                        <label for="batting_avg">Batting Average:</label>
                        <input type="text" id="batting_avg" name="batting_avg" required><br><br>

                        <input type="submit" name="submit" value="Submit">
                        </form></br>
                        </div>
                </div>
            </div>
        </div>
        <center>
            <div class="card">
                <center>
                <div id="container">
                    <div id="form">
                   <?php if (isset($searchResults)) {
                                echo "<br><table class='baseballTable'><caption><h2>Player Search Results:</h2></caption><tr><th>Id #</th><th>Name</th><th>Team</th><th>Position</th><th>RBI's</th><th>Batting Avg</th></tr>";
                                foreach ($searchResults as $row) {
                                    echo "<tr>";
                                    echo "<td>" . $row["id"] . "</td>";
                                    echo "<td>" . $row["name"] . "</td>";
                                    echo "<td>" . $row["team"] . "</td>";
                                    echo "<td>" . $row["position"] . "</td>";
                                    echo "<td class='playerData'>" . $row["rbi"] . "</td>";
                                    echo "<td class='playerData'>" . $row["batting_avg"] . "</td>";
                                }
                                echo "</table><br><br>";
                            } ?>
                    </div>
                </div>
                </center>
            </div>
        </center></br>
    <script>
        $(document).ready(function() {
            $("#deleteTableButton").click(function() {
                $.ajax({
                    url: "MarkWittDropTable.php",
                    type: "POST",
                    success: function(response) {
                        $("#result").html(response); 
                        $("#popup").show();
                    }
                });
            });
            $("#createTableButton").click(function() {
                $.ajax({
                    url: "MarkWittCreateTable.php",
                    type: "POST",
                    success: function(response) {
                        $("#result").html(response);
                        $("#popup").show();
                    }
                });
            });
            $("#populateTableButton").click(function() {
                $.ajax({
                    url: "MarkWittPopulateTable.php",
                    type: "POST",
                    success: function(response) {
                        $("#result").html(response);
                        $("#popup").show();
                    }
                });
            });
            $("#searchTableButton").click(function() {
                $.ajax({
                    url: "MarkWittSearchTable.php",
                    type: "POST",
                    success: function(response) {
                        $("#searchpopup").show();
                        $("#form").html(response);
                    }
                });
            });
            $("#addPlayerButton").click(function() {
                $.ajax({
                    url: "MarkWittAddPlayer.php",
                    type: "POST",
                    success: function(response) {
                        $("#addPlayerpopup").show();
                        $("#form").html(response);
                    }
                });
            });
            $("#selectAllTableButton").click(function() {
                $.ajax({
                    url: "MarkWittQueryTable.php",
                    type: "POST",
                    success: function(response) {
                        $("#form").html(response);
                    }
                });
            });
            $("#closeButton").click(function() {
                $("#popup").hide();
            });
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('success')){
                const successMessage = decodeURIComponent(urlParams.get('success'));
                alert(successMessage);
            }
        });
    </script>
    </body>
</html>