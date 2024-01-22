<!--
Mark Witt
CSD440 Server Side Scripting
Module 4 Assignment 
8/26/23
Create a function that checks if a string is a palindrome. uses function in external file, removes spaces and converts string to all lowercase first, 
then compares the two strings and returns result. html results for each sample word are displayed in table format - with test result. Last card 
allows the user to input any word they choose, and it will run the palindrome checker on the word submitted by the user. 
-->

<html lang="en"
    <head>
        <link href="witt.css" type="text/css" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;700&display=swap" rel="stylesheet">
        
        <title>CSD 440 Server Side Scripting - Mark Witt - Module 4</title>

        <?php require('MarkWittFunctions.php'); //require function file which holds reverse and palindrom checker functions
        
        //gets input from form, calls panlenrome check, returns value. sets $output as the returned value, 
        //so code later can check if $output has been set. if not set, output section does not display.
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $input = $_POST["input"];
            $output = isPalindrome($input);
        }
        ?>

    </head>
    <body>
    <header>
        <h1>CSD-440 Server Side Scripting - Module 4</h1>
        <h2>Write a program that checks to see if a string is a palindrome. Include six examples in your code that displays the string in both orders,</br>
        three being a palindrome and three not. Indicate in your display the resulting test in a function you have written to test each of the six strings.</h2>
    </header>
        <div class="navbar">
        </div></br>
        <?php 
            //setup strings, using an array of strings to itterate through:
            $strings = array('kayak', 'Monday', 'RaceCar', 'Johnathan Wick', 'Never Odd or Even', 'I am Batman');

            //for loop to iterate through strings and functions
            foreach ($strings as $string){ ?>
                <center><div class="card"><center>
                    <div id="container">
                    </br><table style="width: auto; border: none; text-align:center;">
                        <tr>
                            <th> Original String </th>
                            <th> Reversed String </th>
                        </tr>
                        <tr>
                            <td><i><?php echo $string; ?></i></td>
                            <td><i><?php echo(reverseString($string)); ?></i></td>
                        </tr>
                        <tr><td colspan="2">Function Test Result: <b><?php 
                            if (isPalindrome($string)){
                                echo "True: $string is a palindrome.";
                            } else {
                                echo "False: $string is NOT a palindrome.";
                            }
                        ?></b></td></tr>
                    </table></br>
                    </center>
                </div>
            </div></center></br>
        <?php } ?>
        <center> <!--Additional card/section for user to input their own word and run through palindrome checker
                    if submitted, runs checker and displays output like examples above, and on same card as input form.  -->
            <div class="card">
                <div id="container">
                    <center>
                        <b>Try your own!</b></br>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            Check your word: <input type="text" name="input">
                                <input type="submit" value="Submit">
                        </form></br>
                        
                        <?php if (isset($output)) { ?>
                            <table style="width: auto; border: none; text-align:center;">
                                <tr>
                                    <th> Original String </th>
                                    <th> Reversed String </th>
                                </tr>
                                <tr>
                                    <td><i><?php echo $input; ?></i></td>
                                    <td><i><?php echo(reverseString($input)); ?></i></td>
                                </tr>
                                <tr><td colspan="2">Function Test Result: <b><?php 
                                    if ($output){
                                        echo "True: $input is a palindrome.";
                                    } else {
                                        echo "False: $input is NOT a palindrome.";
                                    }
                                ?></b></td></tr>
                            </table></br><?php } ?>
                    </center>
                </div>
            </div>
            </div>
        </center>
    </body>
</html>