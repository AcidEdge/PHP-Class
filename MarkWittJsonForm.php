<!--
Mark Witt
CSD440 Server Side Scripting
Module 10 Assignment 
9/29/23
Write a form program that prompts a user to enter a minimum of 8 different fields of data.
When the form is submitted to your PHP CGI, use the function json_encode to encode your data into a JSON format.
Then, in your return, display the data in the JSON format inside a well-formatted output display, 
otherwise you will return an error display to report the problem.
-->

<html lang="en"
    <head>
        <link href="wittMod9.css" type="text/css" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;700&display=swap" rel="stylesheet">
        
        <title>CSD 440 Server Side Scripting - Mark Witt - Module 10</title>

        <?php
            $json_data = "";
            $error_message = "";

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $data = [
                    "contactName" => $_POST["contactName"],
                    "orgName" => $_POST["orgName"],
                    "date" => $_POST["date"],
                    "start" => $_POST["start"],
                    "end" => $_POST["end"],
                    "numOfChars" => $_POST["numOfChars"],
                    "aboutEvent" => $_POST["aboutEvent"],
                    "location" => $_POST["location"]
                ];
                
                $json_data = json_encode($data);

                
                if ($json_data === false) {
                    $error_message = "An error occurred while encoding the data as JSON.";
                }
            }

        ?>



    </head>
    <header>
        <h1>CSD-440 Server Side Scripting - Module 10</h1>
        <h2>Form with PHP handling and returing JSON:
        </br>Write a form program that prompts a user to enter a minimum of 8 different fields of data.
        <br>When the form is submitted to your PHP CGI, use the function json_encode to encode your data into a JSON format.
        </br>Then, in your return, display the data in the JSON format inside a well-formatted output display, 
        </br>otherwise you will return an error display to report the problem.</h2>
    </header>
    <body>
        <div class="navbar">
        </div></br>
        <center>
            <?php if(!empty($json_data)){ ?>
            <div class="card"><center>
                <div id="container"></br>
                    <?php 
                    if (!empty($json_data)){ 
                        echo "<h2>Appearance Request Recieved!</h2>";
                        $results = json_decode($json_data, true);
                        echo "Contact Name: " . $results["contactName"] . "<br>";
                        echo "Organization Name: " . $results["orgName"] . "<br>";
                        echo "Event Date: " . $results["date"] . "<br>";
                        echo "Event Start Time: " . $results["start"] . "<br>";
                        echo "Event End Time: " . $results["end"] . "<br>";
                        echo "Number of Characters Resuested: " . $results["numOfChars"] . "<br>";
                        echo "Briefly Describe the Event: " . $results["aboutEvent"] . "<br>";
                        echo "Event Location: " . $results["location"] . "<br>";
                        echo "<br>";
                    }
                    if (!empty($error_message)) {
                        echo "<h2>Error:</h2>";
                        echo "<p>" . htmlspecialchars($error_message) . "</p>";
                    } ?>
                    </center>
                </div>
            </div> <?php } ?>
        </center></br>
        <center>
            <div class="card"><center>
                <div id="container"></br>
                    <h2>Request an appearance!</h2>
                    <h3>If you would like to request an appearance by the 501st Legion at your event, please fill out the information below.<br>
                    If we are able to find members able to attend, someone will contact you soon to make arrangments.</h3>
                    <form action="MarkWittJsonForm.php" method="post">
                        <label for="contactName">Contact Name:</label>
                        <input type="text" name="contactName" required><br><br>

                        <label for="orgName">Organization Name:</label>
                        <input type="text" name="orgName" required><br><br>

                        <label for="date">Event Date:</label>
                        <input type="date" name="date" required><br><br>

                        <label for="start">Event Start Time:</label>
                        <input type="time" name="start" required><br><br>

                        <label for="end">Event End Time:</label>
                        <input type="time" name="end" required><br><br>

                        <label for="numOfChars">Number of Characters Resuested:</label>
                        <input type="number" name="numOfChars" required><br><br>

                        <label for="aboutEvent">Briefly Describe the Event:</label>
                        <input type="text" name="aboutEvent" required><br><br>

                        <label for="location">Event Location:</label>
                        <input type="text" name="location" required><br><br>

                        <input type="submit" value="Submit">
                    </form>
                   </br>
                    </center>
                </div>
            </div>
        </center></br>
        
    </body>