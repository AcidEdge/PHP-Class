<!--
Mark Witt
CSD440 Server Side Scripting
Module 5 Assignment 
9/1/23
Write a program that creates and displays an array of customers (minimum of 10 customers) that includes their first name, last name, age, and phone number.
Then, using array methods, find several records and display the customer information based on different data fields.
-->

<html lang="en"
    <head>
        <link href="wittMod5.css" type="text/css" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;700&display=swap" rel="stylesheet">
        
        <title>CSD 440 Server Side Scripting - Mark Witt - Module 5</title>
        <?php require('MarkWittFunctions.php'); 
         //setup array of customers:
         $customers = [
            ["first_name" => "John", "last_name" => "Doe", "age" => 29, "phone" => "555-123-7890"],
            ["first_name" => "Jane", "last_name" => "Doe", "age" => 30, "phone" => "555-123-7891"],
            ["first_name" => "Alex", "last_name" => "Johnson", "age" => 41, "phone" => "555-456-7890"],
            ["first_name" => "Olivia", "last_name" => "Smith", "age" => 29, "phone" => "555-778-4545"],
            ["first_name" => "Emma", "last_name" => "Brown", "age" => 28, "phone" => "555-224-7811"],
            ["first_name" => "Jackson", "last_name" => "Davis", "age" => 45, "phone" => "555-710-0102"],
            ["first_name" => "Lucas", "last_name" => "George", "age" => 62, "phone" => "555-232-6879"],
            ["first_name" => "John", "last_name" => "Williams", "age" => 68, "phone" => "555-789-6543"],
            ["first_name" => "Mia", "last_name" => "Anderson", "age" => 32, "phone" => "555-454-0012"],
            ["first_name" => "Ethan", "last_name" => "Johnson", "age" => 27, "phone" => "555-687-3524"],
        ]; 
        $minAge = 30;
        $maxAge = 39;
        //input from user/from server. calls search method, then sets $output
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $input = $_POST["input"];
            $output = customerSearch($customers, $input);
        } else{}?> 
    </head>
    <body>
    <header>
        <h1>CSD-440 Server Side Scripting - Module 5</h1>
        <h2>Write a program that creates and displays an array of customers (minimum of 10 customers) that includes their first name, last name, age, and phone number.</br>
        Then, using array methods, find several records and display the customer information based on different data fields.</h2>
    </header>
        <div class="navbar">
        </div></br>

        <!--display all customers in one table, looping through each-->
        <center>
            <div class="card"><center>
                <div id="container"></br>
                    <h2>All Customers</h2>
                    <table class="customer-table">
                        <tr>
                            <th>First Name</th>
                            <th> Last Name </th>
                            <th>Age</th>
                            <th>Phone Number</th>
                        </tr>
                        <?php foreach ($customers as $customer){ ?>
                        <tr>
                            <td><?php echo $customer["first_name"]; ?></td>
                            <td><?php echo $customer["last_name"]; ?></td>
                            <td><?php echo $customer["age"]; ?></td>
                            <td><?php echo $customer["phone"]; ?></td>
                        </tr>
                        <?php } ?>
                    </table></br>
                    </center>
                </div>
            </div>
        </center></br>
        <!--display all customers in their 30's, looping through each-->
        <?php $ageCustomers = array_filter($customers, "ageFilter"); ?>
        <center>
            <div class="card"><center>
                <div id="container"></br>
                    <h2>Customers between <?php echo $maxAge . " - " . $maxAge ?> years of age</h2>
                    <table class="customer-table">
                        <tr>
                            <th>First Name</th>
                            <th> Last Name </th>
                            <th>Age</th>
                            <th>Phone Number</th>
                        </tr>
                        <?php foreach ($ageCustomers as $customer){ ?>
                        <tr>
                            <td><?php echo $customer["first_name"]; ?></td>
                            <td><?php echo $customer["last_name"]; ?></td>
                            <td><?php echo $customer["age"]; ?></td>
                            <td><?php echo $customer["phone"]; ?></td>
                        </tr>
                        <?php } ?>
                    </table></br>
                    </center>
                </div>
            </div>
        </center></br>
        <?php 
        $minAge = 20;
        $maxAge = 29;
        $ageCustomers = array_filter($customers, "ageFilter"); ?>
        <center>
            <div class="card"><center>
                <div id="container"></br>
                    <h2>Customers between <?php echo $maxAge . " - " . $maxAge ?> years of age</h2>
                    <table class="customer-table">
                        <tr>
                            <th>First Name</th>
                            <th> Last Name </th>
                            <th>Age</th>
                            <th>Phone Number</th>
                        </tr>
                        <?php foreach ($ageCustomers as $customer){ ?>
                        <tr>
                            <td><?php echo $customer["first_name"]; ?></td>
                            <td><?php echo $customer["last_name"]; ?></td>
                            <td><?php echo $customer["age"]; ?></td>
                            <td><?php echo $customer["phone"]; ?></td>
                        </tr>
                        <?php } ?>
                    </table></br>
                    </center>
                </div>
            </div>
        </center></br>
        <?php 
        $lastName = "doe"; 
        $filteredCustomers = lastNameFilter($customers, ucfirst($lastName))?>
        <center>
            <div class="card"><center>
                <div id="container"></br>
                    <h2>Customers with last names of <?php echo ucfirst($lastName) ?>.</h2>
                    <table class="customer-table">
                        <tr>
                            <th>First Name</th>
                            <th> Last Name </th>
                            <th>Age</th>
                            <th>Phone Number</th>
                        </tr>
                        <?php foreach ($filteredCustomers as $customer){ ?>
                        <tr>
                            <td><?php echo $customer["first_name"]; ?></td>
                            <td><?php echo $customer["last_name"]; ?></td>
                            <td><?php echo $customer["age"]; ?></td>
                            <td><?php echo $customer["phone"]; ?></td>
                        </tr>
                        <?php } ?>
                    </table></br>
                    </center>
                </div>
            </div>
        </center></br>
        <?php 
        $phone = "78"; 
        $phoneCustomers = phoneSearch($customers, $phone)?>
        <center>
            <div class="card"><center>
                <div id="container"></br>
                    <h2>Customers with Phone Numbers containing: <?php echo $phone ?>.</h2>
                    <table class="customer-table">
                        <tr>
                            <th>First Name</th>
                            <th> Last Name </th>
                            <th>Age</th>
                            <th>Phone Number</th>
                        </tr>
                        <?php foreach ($phoneCustomers as $customer){ ?>
                        <tr>
                            <td><?php echo $customer["first_name"]; ?></td>
                            <td><?php echo $customer["last_name"]; ?></td>
                            <td><?php echo $customer["age"]; ?></td>
                            <td><?php echo $customer["phone"]; ?></td>
                        </tr>
                        <?php } ?>
                    </table></br>
                    </center>
                </div>
            </div>
        </center></br>
        <center>
            <div class="card"><center>
                <div id="container"></br>
                    <h2>Try Your own Search!</h2>
                    <p>Search by First Name, Last Name, Age, or Phone Number(full or partial).</p>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            Your Search: <input type="text" name="input">
                                <input type="submit" value="Submit">
                    </form></br>
                    <?php if (isset($output)) { ?>
                    <table class="customer-table">
                        <tr>
                            <th>First Name</th>
                            <th> Last Name </th>
                            <th>Age</th>
                            <th>Phone Number</th>
                        </tr>
                        <?php foreach ($output as $customer){ ?>
                        <tr>
                            <td><?php echo $customer["first_name"]; ?></td>
                            <td><?php echo $customer["last_name"]; ?></td>
                            <td><?php echo $customer["age"]; ?></td>
                            <td><?php echo $customer["phone"]; ?></td>
                        </tr>
                        <?php } ?>
                    </table></br> <?php } ?>
                    </center>
                </div>
            </div>
        </center></br>
    </body>
</html>