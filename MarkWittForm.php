<!--
Mark Witt
CSD440 Server Side Scripting
Module 7 Assignment 
9/7/23
File containing html form.
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
        
        <title>CSD 440 Server Side Scripting - Mark Witt - Module 7</title>
        
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

        <!--my form-->
        <center>
            <div class="card"><center>
                <div id="container"></br>
                    <h2>Please Enter your Information:</h2>
                    <p><i>* indicates a required field</i></p>
                    <form action="MarkWittResponse.php" method="post">
                        <label for="first_name">*First Name:</label>
                        <input type="text" name="first_name" required><br><br>

                        <label for="last_name">*Last Name:</label>
                        <input type="text" name="last_name" required><br><br>

                        <label for="email">*Email:</label>
                        <input type="email" name="email" required><br><br>

                        <label for="age">*Age:</label>
                        <input type="number" name="age" required><br><br>

                        <label for="birthdate">*Date of Birth:</label>
                        <input type="date" name="birthdate"required ><br><br>

                        <label for="employed">*Employment Status</label>
                        <select name="employed" required>
                            <option value="Unemployed">Unemployed</option>
                            <option value="Part Time">Part Time</option>
                            <option value="Full Time">Full Time</option>
                            <option value="Other">Other</option>
                        </select><br><br>

                        <label for="about">Tell us about you:</label><br>
                        <textarea name="about" rows="4" cols="50"></textarea><br><br>

                        <input type="submit" value="Submit"></br></br>
                    </form>
                </div>
            </div>
        </center></br>
    </body>
</html>