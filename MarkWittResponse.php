<!--
Mark Witt
CSD440 Server Side Scripting
Module  Assignment 
9/7/23
File containing php response from form.
Assignment:
Write a form program that prompts a user to enter seven different fields of data, using a minimum of four different data type entries.
When the form is submitted to your PHP CGI, you are then to verify all fields were populated and the data was correctly entered.
Then, in your return, display the data entered in a well formatted page, otherwise you will return an error display to report the problem.
-->

<html lang="en"
    <head>
        <link href="witt.css" type="text/css" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;700&display=swap" rel="stylesheet">
        
        <title>CSD 440 Server Side Scripting - Mark Witt - Module 6</title>
        <?php 
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $age = $_POST['age'];
        $birthday = $_POST['birthdate'];
        $employed = $_POST['employed'];
        $about = $_POST['about'];
        $currentDate = date("Y-m-d");
        ?> 
    </head>
    <body>
    <header>
        <h1>CSD-440 Server Side Scripting - Module 7</h1>
        <h2>Write a form program that prompts a user to enter seven different fields of data, using a minimum of four different data type entries. 
        </br>When the form is submitted to your PHP CGI, you are then to verify all fields were populated and the data was correctly entered.
        </br>Then, in your return, display the data entered in a well formatted page, otherwise you will return an error display to report the problem.</h2>
    </header>
        <div class="navbar">
        </div></br>

        
        <center>
            <div class="card"><center>
                <div id="container"></br>
                    <h2>Your Information:</h2>
                    <p><i>As entered on form</i></p>
                    <?php 
                    if ($birthday > $currentDate){
                        echo "<p style='color: red;'>Error: Birthday cannot be in the future.</br>Please enter a valid Birthday.</p>";
                    } else {
                        if($first_name && $last_name && $email && $age && $birthday && $employed){
                            echo "<p><strong>Name: </strong>$first_name&nbsp$last_name</p>";
                            echo "<p><strong>Email: </strong>$email</p>";
                            echo "<p><strong>Age: </strong>$age</p>";
                            echo "<p><strong>Birthday: </strong>$birthday";
                            echo "<p><strong>Employment Status: </strong>$employed";
                            echo "<p><strong>About You: </strong>$about";
                        } else {
                            echo "<p style='color: red;'>Error: Please fill out all required fields.</p>";
                    }} ?></br></br>
                    <button onclick="window.location.href='MarkWittForm.php';">Try Form Again</button></br></br>
                </div>
            </div>
        </center></br>
    </body>
</html>