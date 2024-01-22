<!--
Mark Witt
CSD440 Server Side Scripting
Module 2 Assignment 
8/19/23
-->


<html lang="en"
    <head>
        <link href="witt.css" type="text/css" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;700&display=swap" rel="stylesheet">
        
        <title>CSD 440 Server Side Scripting - Mark Witt - Module 2</title>

    </head>
    <body>
    <header>
        <h1>CSD-440 Server Side Scripting</h1>
        <h2>Assignment 2: Build and HTML table with nested PHP and random numbers</h2>
    </header>
        <div class="navbar">
        </div><center>
            <div class="card"><center>
                <div id="container">
                    <h2>Your Lucky Numbers Are:</h2><br>
                    <table border="1">
                        <?php
                        $rows = 3; // Number of rows
                        $cols = 7; // Number of columns

                        for ($i = 0; $i < $rows; $i++) {
                            ?> <tr> <?php ;
                            for ($j = 0; $j < $cols; $j++) {
                                $randomNumber = rand(1, 75); // Generate a random number between 1 and 75
                                if ($j < ($cols - 1)){
                                    ?> <td> <?php echo $randomNumber ?> </td> <?php ;
                                }
                                else {
                                    ?> <td style="color: red; font-weight: bold;"> <?php echo $randomNumber ?> </td> <?php ;
                                }
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