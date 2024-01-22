<!--
Mark Witt
CSD440 Server Side Scripting
Module 3 Assignment 
8/25/23
-->


<html lang="en"
    <head>
        <link href="witt.css" type="text/css" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;700&display=swap" rel="stylesheet">
        
        <title>CSD 440 Server Side Scripting - Mark Witt - Module 3</title>

        <?php require('MarkWittFunctions.php'); ?>

    </head>
    <body>
    <header>
        <h1>CSD-440 Server Side Scripting</h1>
        <h2>Assignment 3: Starting with the PHP table created in Module 2, write a function that will be used to generate the value to be displayed in each cell. </br>
        The function will take two random numbers as the parameters and will then return the sum. The function is to be placed in an external file.</h2>
        <p>*For ease of testing, random numbers generated are limited to values under 20.*</p>
    </header>
        <div class="navbar">
        </div><center>
            <div class="card"><center>
                <div id="container">
                    <h2>Your Numbers Are:</h2><br>
                    <table border="1">
                        <?php
                        $rows = 3; // Number of rows
                        $cols = 7; // Number of columns

                        for ($i = 0; $i < $rows; $i++) {
                            ?> <tr> <?php ;
                            for ($j = 0; $j < $cols; $j++) {
                                $firstNumber = rand(1, 20); // Generate a random number between 1 and 20
                                $secondNumber = rand(1, 20); // Generate a random number between 1 and 20
                                    ?> <td> 
                                        <?php 
                                        echo(getSum($firstNumber, $secondNumber)) ?> </td> <?php ;
                            }
                            ?> </tr> <?php ;
                        }
                        ?>
                    </table>
                    <br><button onClick="window.location.reload();">New Numbers</button><br><br>
                </center>
            </div>
        </div></center>
    </body>
</html>