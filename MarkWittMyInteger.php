<!--
Mark Witt
CSD440 Server Side Scripting
Module 6 Assignment 
9/3/23
Write a program that defines a class titled MyInteger. The class is to hold a single integer that is set in the constructor by a parameter. The class is to have methods isEven(int) and isOdd(int).
In addition, the class will have an isPrime() method.
Lastly, you are to have a getter and setter method.
-->

<html lang="en"
    <head>
        <link href="wittMod5.css" type="text/css" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;700&display=swap" rel="stylesheet">
        
        <title>CSD 440 Server Side Scripting - Mark Witt - Module 6</title>
        <?php require('MarkWittFunctions.php'); //include functions file, holding the class MarkWittMyInteger
         
         $newLine =  '<br />'; //variable to create new line

        //input from user/from server. calls search method, then sets $output
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $input = $_POST["input"];
            $output = new MarkWittMyInteger($input);
        } else{}?> 
    </head>
    <body>
    <header>
        <h1>CSD-440 Server Side Scripting - Module 6</h1>
        <h2>Write a program that defines a class titled MyInteger. The class is to hold a single integer that is set in the constructor by a parameter. 
        </br>The class is to have methods isEven(int) and isOdd(int).
        </br>In addition, the class will have an isPrime() method.
        </br>Lastly, you are to have a getter and setter method.</h2>
    </header>
        <div class="navbar">
        </div></br>

        <!--first instance of myInteger-->
        <?php $instance1 = new MarkWittMyInteger(6); ?>
        <center>
            <div class="card"><center>
                <div id="container"></br>
                    <h2>Instance 1:</h2>
                    <p> <?php echo "Value: " . $instance1->getValue() . $newLine;
                              echo "Is Even: " . ($instance1->isEven() ? "Yes" : "No") . $newLine;
                              echo "Is Odd: " . ($instance1->isOdd() ? "Yes" : "No") . $newLine;
                              echo "Is Prime: " . ($instance1->isPrime() ? "Yes" : "No") . $newLine; ?></p>
                   </br>
                    </center>
                </div>
            </div>
        </center></br>
        <!--Second instance of myInteger-->
        <?php $instance2 = new MarkWittMyInteger(13); ?>
        <center>
            <div class="card"><center>
                <div id="container"></br>
                    <h2>Instance 2:</h2>
                    <p> <?php echo "Value: " . $instance2->getValue() . $newLine;
                              echo "Is Even: " . ($instance2->isEven() ? "Yes" : "No") . $newLine;
                              echo "Is Odd: " . ($instance2->isOdd() ? "Yes" : "No") . $newLine;
                              echo "Is Prime: " . ($instance2->isPrime() ? "Yes" : "No") . $newLine; ?></p>
                   </br>
                    </center>
                </div>
            </div>
        </center></br>
        <!--Third Instance of myInteger, taking in user supplied int variable-->
        <center>
            <div class="card"><center>
                <div id="container"></br>
                    <h2>Try Your Own!</h2>
                    <p>Enter an Integer:</p>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            Your value: <input type="text" name="input">
                                <input type="submit" value="Submit">
                    </form>
                    <?php if (isset($output)) { ?>
                    <h2>Instance 3 - Your Number:</h2>
                    <p> <?php echo "Value: " . $output->getValue() . $newLine;
                              echo "Is Even: " . ($output->isEven() ? "Yes" : "No") . $newLine;
                              echo "Is Odd: " . ($output->isOdd() ? "Yes" : "No") . $newLine;
                              echo "Is Prime: " . ($output->isPrime() ? "Yes" : "No") . $newLine; ?></p>
                   </br>
                        <?php } ?>
                    </table></br>
                    </center>
                </div>
            </div>
        </center></br>
    </body>
</html>